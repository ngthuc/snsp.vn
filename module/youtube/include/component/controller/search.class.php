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
 * @version 		$Id: search.class.php 2009-10-12 Nicolas $
 */
class Youtube_Component_Controller_Search extends Phpfox_Component
{
	public function process()
	{		
		Phpfox::getUserParam('youtube.can_access_youtube', true);
		
		$iPage = $this->request()->get('page',1);
		$iPageSize = Phpfox::getParam('youtube.youtube_page_size');
		
		if (($sKeyword = $this->request()->get('keyword')))
		{
			$oUrl = Phpfox::getLib('url');
			$oUrl->setParam('keyword', $sKeyword);
			list($iCnt,$aVideos) = Phpfox::getService('youtube')->search($sKeyword,$iPage,$iPageSize);
			Phpfox::getLib('pager')->set(array('page' => $iPage, 'size' => $iPageSize, 'count' => $iCnt));
		}else{
			$iCnt = 0;
			$aVideos = array();
		}
		
		$this->template()->setTitle(Phpfox::getPhrase('youtube.search'))
			->setBreadcrumb(Phpfox::getPhrase('youtube.title'), $this->url()->makeUrl('youtube'))
			->setBreadcrumb(Phpfox::getPhrase('youtube.search'). ' ' .$sKeyword)
			->setHeader('cache', array(
					'pager.css' => 'style_css'
				)
			)
			->assign(array(
					'aVideos' => $aVideos,
					'iCnt' => $iCnt,
					'sKeyword' => $sKeyword
				)
			);
	}
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('youtube.component_controller_search_clean')) ? eval($sPlugin) : false);
	}
}

?>