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
 * @version 		$Id: index.class.php 2009-10-12 Nicolas $
 */
class Youtube_Component_Controller_Index extends Phpfox_Component
{
	public function process()
	{		
		Phpfox::getUserParam('youtube.can_access_youtube', true);
		
		$iPage = $this->request()->get('page',1);
		$iPageSize = Phpfox::getParam('youtube.youtube_page_size');
		
		if (!($sCategory = $this->request()->get('req2')))
		{
			$sCategory = 'mostviewed';
		}
		list($iCnt,$aVideos) = Phpfox::getService('youtube')->browse($sCategory,$iPage,$iPageSize);		
		
		Phpfox::getLib('pager')->set(array('page' => $iPage, 'size' => $iPageSize, 'count' => $iCnt));	
		
		$this->template()->setTitle(Phpfox::getPhrase('youtube.title'))
			->setBreadcrumb(Phpfox::getPhrase('youtube.title'), $this->url()->makeUrl('youtube'))
			->setBreadcrumb(Phpfox::getPhrase('youtube.title_'.$sCategory), $this->url()->makeUrl('youtube',array($sCategory)))
			->setHeader('cache', array(
					'pager.css' => 'style_css'
				)
			)
			->assign(array(
					'aVideos' => $aVideos,
					'iCnt' => $iCnt
				)
			);
		
		
	}
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('youtube.component_controller_index_clean')) ? eval($sPlugin) : false);
	}
}

?>