<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * 
 * 
 * @copyright		phpfoxguru.com
 * @author  		Nicolas
 * @package  		Module_Youtube
 * @version 		$Id: youtube.class.php 2009-09-10 Nicolas $
 */
class Youtube_Service_Youtube extends Phpfox_Service 
{
	public function __construct()
	{	
		$this->_sTable = Phpfox::getT('youtube');
	}
	
	public function getBlockVideos()
	{
		$iPage = 1;
		$iPageSize = Phpfox::getParam('youtube.youtube_block_display_limit');
		if(Phpfox::getParam('youtube.youtube_block_display_type')!='keyword'){
			return $this->browse(Phpfox::getParam('youtube.youtube_block_display_type'),$iPage,$iPageSize);
		}
		else{
			return $this->search(Phpfox::getParam('youtube.youtube_block_keyword'),$iPage,$iPageSize);
		}
	}
	
	public function getYoutubeById($iVid)
	{
		$aYoutube = $this->database()->select('*')
			->from($this->_sTable)
			->where("video_id = '" . $iVid . "'")
			->execute('getRow');
		if(!isset($aYoutube['youtube_id'])){
			$aSql = array(
				'video_id' => $iVid,
			);
			$this->database()->insert($this->_sTable, $aSql);
			
			$aYoutube = $this->database()->select('*')
				->from($this->_sTable)
				->where("video_id = '" . $iVid . "'")
				->execute('getRow');
		}
		return $aYoutube;
	}
	
	public function get($iVid)
	{
		$this->getYoutubeById($iVid);
		return $this-> _detail($iVid);
	}
	
	public function search($sKeyword,$iPage,$iPageSize)
	{
		$sFeedUrl = 'http://gdata.youtube.com/feeds/api/videos?q='.urlencode($sKeyword).'&v=2';
		$iTotal = $this->_searchTotal(Phpfox::getLib('request')->send($sFeedUrl.'&max-results=50', array(), 'GET'));	
		$sFeedUrl = $sFeedUrl.'&start-index='.(($iPage-1)*$iPageSize+1).'&max-results='.$iPageSize;
		$sXml = Phpfox::getLib('request')->send($sFeedUrl, array(), 'GET');
		$aVideos = $this->_searchBuild($sXml);
		
		return array($iTotal,$aVideos);
	}
	
	public function browse($sCategory,$iPage,$iPageSize)
	{
		$aVideos = array();
		
		if(Phpfox::getParam('youtube.youtube_block_display_type')!='keyword'){
			switch ($sCategory)
			{
				case 'mostpopular':
					$sFeedUrl = 'http://gdata.youtube.com/feeds/api/standardfeeds/most_popular?v=2&';
				break;
				case 'mostviewed':
					$sFeedUrl = 'http://gdata.youtube.com/feeds/api/standardfeeds/most_viewed?v=2&';
				break;
				case 'mostrecent':
					$sFeedUrl = 'http://gdata.youtube.com/feeds/api/standardfeeds/most_recent?v=2&';
				break;
				case 'mostdiscussed':
					$sFeedUrl = 'http://gdata.youtube.com/feeds/api/standardfeeds/most_discussed?v=2&';
				break;
				case 'mostresponded':
					$sFeedUrl = 'http://gdata.youtube.com/feeds/api/standardfeeds/most_responded?v=2&';
				break;
				case 'toprated':
					$sFeedUrl = 'http://gdata.youtube.com/feeds/api/standardfeeds/top_rated?v=2&';
				break;
				case 'topfavorites':
					$sFeedUrl = 'http://gdata.youtube.com/feeds/api/standardfeeds/top_favorites?v=2&';
				break;
				default:
					$sFeedUrl = 'http://gdata.youtube.com/feeds/api/standardfeeds/most_popular?v=2&';	
				break;
			}
		}
		else{
			$sFeedUrl = 'http://gdata.youtube.com/feeds/api/videos?q='.urlencode(Phpfox::getParam('youtube.youtube_block_keyword')).'&v=2';
			switch ($sCategory)
			{
				case 'mostviewed':
					$sFeedUrl .='&orderby=viewCount';
				break;
				case 'mostrecent':
					$sFeedUrl .='&orderby=published';
				break;
				case 'toprated':
					$sFeedUrl .='&orderby=rating';
				break;
				case 'mostrelevance ':
					$sFeedUrl = '&orderby=relevance';
				break;
				default:
					$sFeedUrl = $sFeedUrl.'';	
				break;
			}
		}
		$iTotal = $this->_total(Phpfox::getLib('request')->send($sFeedUrl.'&max-results=50', array(), 'GET'));			
		$sFeedUrl = $sFeedUrl.'&start-index='.(($iPage-1)*$iPageSize+1).'&max-results='.$iPageSize;
		$sXml = Phpfox::getLib('request')->send($sFeedUrl, array(), 'GET');
		
		$aVideos = $this->_build($sXml);
		return array($iTotal,$aVideos);
	}
	private function _searchTotal($sXml)
	{	
		$aIds = array();
		$iIndex = 0;
		if($sXml){
			if ( preg_match_all("/<yt\:videoid>(.+?)<\/yt\:videoid>/", $sXml, $aMatches)&& isset($aMatches['1']))
			{
				$aIds = $aMatches['1'];				
			}
		}
		return count($aIds);
	}
	
	private function _total($sXml)
	{	
		$aIds = array();
		$iIndex = 0;
		if($sXml){
			if ( preg_match_all("/<yt\:videoid>(.+?)<\/yt\:videoid>/", $sXml, $aMatches)&& isset($aMatches['1']))
			{
				$aIds = $aMatches['1'];				
			}
		}
		return count($aIds);
	}
	
	private function _searchBuild($sXml)
	{
		$aVideos = array();
		$aIds = array();
		$aTitles = array();
		$aDurations = array();
		$aThumbnails = array();
		$iIndex = 0;
		if($sXml){
			if ( preg_match_all("/<yt\:videoid>(.+?)<\/yt\:videoid>/", $sXml, $aMatches)&& isset($aMatches['1']))
			{
				$aIds = $aMatches['1'];				
			}
			if ( preg_match_all("/<media:title type='plain'>(.+?)<\/media:title>/smi", $sXml, $aMatches)&& isset($aMatches['1']))
			{
				$aTitles = $aMatches['1'];				
			}
			if ( preg_match_all("/<yt:duration seconds='(.+?)'\/>/smi", $sXml, $aMatches)&& isset($aMatches['1']))
			{
				$aDurations = $aMatches['1'];				
			}
			if(count($aIds)>0){
				foreach($aIds as $iKey=>$sId){
					$aVideos[$iIndex]['vid'] = $sId;
					$aVideos[$iIndex]['title'] = $aTitles[$iKey];
					$aVideos[$iIndex]['duration'] = $this->secondsToWords($aDurations[$iKey]);
					$aVideos[$iIndex]['thumb'] = 'http://i.ytimg.com/vi/'.$sId.'/1.jpg';
					$iIndex++;					
				}
			}	
		}
		return $aVideos;
	}
	
	private function _build($sXml)
	{
		$aVideos = array();
		$aIds = array();
		$aTitles = array();
		$aDurations = array();
		$aThumbnails = array();
		$iIndex = 0;
		if($sXml){
			if ( preg_match_all("/<yt\:videoid>(.+?)<\/yt\:videoid>/", $sXml, $aMatches)&& isset($aMatches['1']))
			{
				$aIds = $aMatches['1'];				
			}
			if ( preg_match_all("/<media:title type='plain'>(.+?)<\/media:title>/smi", $sXml, $aMatches)&& isset($aMatches['1']))
			{
				$aTitles = $aMatches['1'];				
			}
			if ( preg_match_all("/<yt:duration seconds='(.+?)'\/>/smi", $sXml, $aMatches)&& isset($aMatches['1']))
			{
				$aDurations = $aMatches['1'];				
			}
			if(count($aIds)>0){
				foreach($aIds as $iKey=>$sId){
					$aVideos[$iIndex]['vid'] = $sId;
					$aVideos[$iIndex]['title'] = $aTitles[$iKey];
					$aVideos[$iIndex]['duration'] = $this->secondsToWords($aDurations[$iKey]);
					$aVideos[$iIndex]['thumb'] = 'http://i.ytimg.com/vi/'.$sId.'/1.jpg';
					$iIndex++;					
				}
			}	
		}
		return $aVideos;
	}
	
	private function _detail($sId)
	{
		$aVideo = array();
		$sVideoDetailUrl = 'http://gdata.youtube.com/feeds/api/videos/'.$sId;
		$sVideoXml = Phpfox::getLib('request')->send($sVideoDetailUrl, array(), 'GET');
					
		if($sVideoXml){
				if ( preg_match("/<media:description type='plain'>(.*?)<\/media:description>/i", $sVideoXml, $aMatches)&& isset($aMatches['1']))
				{
					$aVideo['description'] = $aMatches['1'];
				}else{
					$aVideo['description'] = '';
				}
				if ( preg_match("/<media:title type='plain'>(.*)<\/media:title>/i", $sVideoXml, $aMatches)&& isset($aMatches['1']))
				{
					$aVideo['title'] = $aMatches['1'];
				}else{
					$aVideo['title'] = '';
				}
				if ( preg_match("/<yt:duration seconds='(\d+)'\/>/i", $sVideoXml, $aMatches)&& isset($aMatches['1']))
				{
					$aVideo['duration'] = $this->secondsToWords($aMatches['1']);
				}else{
					$aVideo['duration'] = '';
				}
				if ( preg_match("/<media:category label='(.*)' scheme='http:\/\/gdata.youtube.com\/schemas\/2007\/categories.cat'>(.*)<\/media:category>/i", $sVideoXml, $aMatches)&& isset($aMatches['1']))
				{						     
					$aVideo['category'] = $aMatches['1'];
				}else{
					$aVideo['category'] = '';
				}
				if ( preg_match("/<media:keywords>(.*)<\/media:keywords>/i", $sVideoXml, $aMatches)&& isset($aMatches['1']))
				{
					$aVideo['keywords'] = $aMatches['1'];
				}else{
					$aVideo['keywords'] = '';
				}
				$aVideo['thumb'] = 'http://i.ytimg.com/vi/' .$sId. '/1.jpg';
				
				//$aVideo['embed_code'] = '<object width="425" height="344"><param name="wmode" value="transparent"></param><param name="movie" value="http://www.youtube.com/v/' . $sId . '&autoplay=1&hl=en_US&fs=1&"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/' . $sId . '&autoplay=1&hl=en_US&fs=1&" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="425" height="344" wmode="transparent"></embed></object>';
		
				$aVideo['embed_code'] = '<object width="480" height="385"><param name="wmode" value="transparent"><param name="movie" value="http://www.youtube.com/v/' . $sId . '?fs=1&amp;hl=en_US"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/' . $sId . '?fs=1&amp;hl=en_US" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="480" height="385" wmode="transparent"></embed></object>';		
		}
		return $aVideo;		
	}
	
	
	public function postVideoProfile($iId)
	{
		if (Phpfox::isModule('feed'))
		{
			Phpfox::getService('feed.process')->add('youtube', Phpfox::getUserId(), $iId, Phpfox::getUserId());
		}
		return true;
	}
	public function isPostVideo($iId,$iUserId)
	{
		$iCnt = $this->database()->select('COUNT(*)')
			->from(Phpfox::getT('feed'), 'feed')
			->where('content="'.$iId.'" AND user_id='.$iUserId)
			->execute('getSlaveField');
		if($iCnt){
			return true;	
		}else{
			return false;	
		}	
	}
	function secondsToWords($seconds)
	{
	    $ret = "";
	    $mins = floor ($seconds / 60);
            $secs = $seconds % 60;
	    $ret = sprintf('%02d:%02d', $mins, $secs);	
	    return $ret;
	}
	public function __call($sMethod, $aArguments)
	{
		if ($sPlugin = Phpfox_Plugin::get('youtube.service_youtube__call'))
		{
			eval($sPlugin);
			return;
		}
		Phpfox_Error::trigger('Call to undefined method ' . __CLASS__ . '::' . $sMethod . '()', E_USER_ERROR);
	}	
}
?>