<?php
/**
 * [NULLED BY DARKGOTH 2014]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * 
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox_Component
 * @version 		$Id: header.class.php 414 2009-04-17 23:31:59Z Raymond_Benc $
 */
class Group_Component_Block_Header extends Phpfox_Component
{
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{
		
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('group.component_block_header_clean')) ? eval($sPlugin) : false);
	}
}

?>