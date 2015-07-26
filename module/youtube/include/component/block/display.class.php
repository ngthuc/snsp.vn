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
 * @version 		$Id: display.class.php 2009-09-10 Nicolas $
 */
class Youtube_Component_Block_Display extends Phpfox_Component
{
	public function process()
	{	
		list($iCnt,$aVideos) = 	Phpfox::getService('youtube')->getBlockVideos();
		$this->template()->assign(array(
					'sHeader' => Phpfox::getPhrase('youtube.block_title'),
					'aVideos' => $aVideos,
					'aFooter' => array(
						 Phpfox::getPhrase('admincp.view_more') => $this->url()->makeUrl('youtube')
					)
				)
		);
		return 'block';	
	}
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('youtube.component_block_display_clean')) ? eval($sPlugin) : false);
	}
}

?>