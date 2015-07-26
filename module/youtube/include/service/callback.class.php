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
 * @version 		$Id: callback.class.php 2009-09-10 Nicolas $
 */
class Youtube_Service_Callback extends Phpfox_Service 
{
	public function __construct()
	{	
		$this->_sTable = Phpfox::getT('youtube');
	}
	
	public function getNewsFeed($aRow, $iUserId = null)
	{
		$aVideo = Phpfox::getService('youtube')->get($aRow['content']);
		if($aVideo){		
			$oUrl = Phpfox::getLib('url');
			$oParseOutput = Phpfox::getLib('parse.output');	
			$sLink = $oUrl->makeUrl('youtube.view',array('id'=>$aRow['content']));
			$aRow['text'] = Phpfox::getPhrase('youtube.a_href_user_link_owner_full_name_a_added_a_new_youtube_video', array(
				'owner_full_name' => $this->preParse()->clean($aRow['owner_full_name']),
				'title' => Phpfox::getService('feed')->shortenTitle($aVideo['title']),
				'user_link' => $oUrl->makeUrl($aRow['owner_user_name']),
				'title_link' => $sLink
			)
			);
			//ob_start();
			//Phpfox::getBlock('share.link', array('type' => 'video','display' => 'image','url' => $sLink,'title' => $aVideo['title']));		
			//$sShares = ob_get_contents();
			//ob_clean();
			
			$sFavorites = '<a href="#?call=youtube.addfavorite&amp;height=100&amp;width=400&amp;type=youtube&amp;id='.$aRow['content'].'" class="inlinePopup" title="Add to your Favorites">'.Phpfox::getPhrase('youtube.add_to_your_favorites').'</a>';

			$sImage = '<img src="'.$aVideo['thumb'].'">';
			//$sImage = '<a href="#" onclick="$(\'#youtube_video_'.$aRow['feed_id'].'\').show();return false;">' . $sImage . '</a>';
			//$aRow['text'] .= '<div class="p_4">' . $sImage . ' '. $sFavorites. ' '.$sShares.'</div>';
			$aRow['text'] .= '<div id="youtube_video_player_div_'.$aRow['feed_id'].'" class="p_4" style="cursor: pointer;position:relative;width:120px;height:90px;" onmouseover="$(\'#youtube_video_player_'.$aRow['feed_id'].'\').show();" onmouseout="$(\'#youtube_video_player_'.$aRow['feed_id'].'\').hide();" onclick="$(\'#youtube_video_'.$aRow['feed_id'].'\').show();$(\'#youtube_video_player_div_'.$aRow['feed_id'].'\').hide();return false;">';
			$aRow['text'] .= '<div id="youtube_video_player_'.$aRow['feed_id'].'" style="position:absolute;right:48px;top:36px;width:24px;display:none;">';
			$aRow['text'] .= '<img src="'.Phpfox::getParam('core.path').'module/youtube/static/image/play.png" alt="" />';
			$aRow['text'] .= '</div>';
			$aRow['text'] .= '' . $sImage . '</div>';
			
			$aRow['text'] .= '<div style="position:relative;display:none;" id="youtube_video_'.$aRow['feed_id'].'">'.$aVideo['embed_code'].'';
			$aRow['text'] .= '<div style="position:absolute;right:0;top:0;width:16px;">';
			$aRow['text'] .= '<a href="#" onclick="$(\'#youtube_video_'.$aRow['feed_id'].'\').hide();$(\'#youtube_video_player_div_'.$aRow['feed_id'].'\').show();return false;">';
			$aRow['text'] .= '<img src="' . Phpfox::getLib('template')->getStyle('image', 'misc/close.gif') . '" alt="" />';
			$aRow['text'] .= '</a>';
			$aRow['text'] .= '</div>';
			$aRow['text'] .= '</div>';
			
			$aRow['text'] .= $sFavorites;
			
			$aRow['icon'] = 'module/youtube.png';
			$aRow['enable_like'] = true;	
			return $aRow;
		}else{
			return false;
		}
	}
	
	
	public function verifyFavorite($iItemId)
	{
		$aItem = $this->database()->select('y.*')
			->from($this->_sTable, 'y')
			->where('y.youtube_id = ' . (int) $iItemId . '')
			->execute('getSlaveRow');
		if (!isset($aItem['youtube_id']))
		{
			return false;
		}
		return true;
	}
	
	public function getFavorite($aFavorites)
	{
		$oUrl = Phpfox::getLib('url');
		$aYoutubes = $this->database()->select('y.*')
				->from($this->_sTable, 'y')
				->where('y.youtube_id IN(' . implode(',', $aFavorites) .')')
				->execute('getSlaveRows');
		foreach ($aYoutubes as $iKey => $aYoutube)
		{
			$aVideo = Phpfox::getService('youtube')->get($aYoutube['video_id']);
			$sLink = $oUrl->makeUrl('youtube.view',array('id'=>$aYoutube['video_id']));
			$aYoutubes[$iKey]['thumb'] = $aVideo['thumb'];
			$aYoutubes[$iKey]['image'] = '<img src="'.$aVideo['thumb'].'" width="75">';
			$aYoutubes[$iKey]['title'] = Phpfox::getService('feed')->shortenTitle($aVideo['title']);
			$aYoutubes[$iKey]['link'] = $sLink;
			$aYoutubes[$iKey]['extra_info'] = '';
			$aYoutubes[$iKey]['time_stamp'] = PHPFOX_TIME;
							
		}
		return array(
			'title' => Phpfox::getPhrase('youtube.title'),
			'items' => $aYoutubes
		);		
	}

	public function __call($sMethod, $aArguments)
	{
		if ($sPlugin = Phpfox_Plugin::get('youtube.service_callback__call'))
		{
			return eval($sPlugin);
		}
		
		Phpfox_Error::trigger('Call to undefined method ' . __CLASS__ . '::' . $sMethod . '()', E_USER_ERROR);
	}	
}

?>