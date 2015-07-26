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
 * @version 		$Id: search.class.php 2009-09-10 Nicolas $
 */
class Youtube_Component_Block_Search extends Phpfox_Component
{
	public function process()
	{		
		$this->template()->assign(array(
					'sHeader' => Phpfox::getPhrase('youtube.search'),
				)
		);
		return 'block';	
	}
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('youtube.component_block_search_clean')) ? eval($sPlugin) : false);
	}
}

?>