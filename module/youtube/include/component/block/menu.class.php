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
 * @version 		$Id: menu.class.php 2009-09-10 Nicolas $
 */
class Youtube_Component_Block_Menu extends Phpfox_Component
{
	public function process()
	{	
		
		if(Phpfox::getParam('youtube.youtube_block_display_type')!='keyword'){
			$bKeyword = false;
		}
		else{
			$bKeyword = true;
		}
			
		$this->template()->assign(array(
					'bKeyword' => $bKeyword,
				)
		);
	}
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('youtube.component_block_menu_clean')) ? eval($sPlugin) : false);
	}
}

?>