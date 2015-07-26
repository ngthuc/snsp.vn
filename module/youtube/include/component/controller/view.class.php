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
 * @version 		$Id: view.class.php 2009-10-12 Nicolas $
 */
class Youtube_Component_Controller_View extends Phpfox_Component
{
	public function process()
	{		
		Phpfox::getUserParam('youtube.can_access_youtube', true);		
		$iVid = $this->request()->get('id');
		if($iVid){
			$aVideo = Phpfox::getService('youtube')->get($iVid);
			
			$aVideo['bookmark'] = $this->url()->makeUrl('youtube.view',array($iVid));			
			$aVideo['embed'] = htmlspecialchars($aVideo['embed_code']); 
			
			if(!empty($aVideo)){
				$this->template()->setTitle(Phpfox::getPhrase('youtube.title'))
					->setBreadcrumb(Phpfox::getPhrase('youtube.title'), $this->url()->makeUrl('youtube'))
					->setBreadcrumb($aVideo['title'], $this->url()->makeUrl('youtube.view',array($iVid)))
					->setHeader('cache', array(
							'pager.css' => 'style_css'
						)
					)
					->setHeader('cache', array(
							'switch_legend.js' => 'static_script',
							'switch_menu.js' => 'static_script'
						)
					)
					->assign(array(
							'aVideo' => $aVideo,
							'iVid' => $iVid
						)
					);
			}else{
				$sUrl = Phpfox::getLib('url')->makeUrl('youtube');
				$this->url()->send($sUrl);
			}
		}else{
			$sUrl = Phpfox::getLib('url')->makeUrl('youtube');
			$this->url()->send($sUrl);
		}
	}
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('youtube.component_controller_index_clean')) ? eval($sPlugin) : false);
	}
}

?>