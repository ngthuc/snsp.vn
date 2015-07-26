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
 * @version 		$Id: addfavorite.class.php 2009-09-10 David $
 */
class Youtube_Component_Block_Addfavorite extends Phpfox_Component
{
	public function process()
	{		
		Phpfox::isUser(true);
		
		$aYoutube = Phpfox::getService('youtube')->getYoutubeById($this->request()->get('id'));
		
		if (Phpfox::getService('favorite.process')->add($this->request()->get('type'), $aYoutube['youtube_id']))
		{
			Phpfox::getLib('ajax')->call('<script type="text/javascript">$(\'#js_footer_bar_favorite_content\').html(\'<!-- EMPTY_FOOTER_BAR -->\');</script>');
		}
	}
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('youtube.component_block_addfavorite_clean')) ? eval($sPlugin) : false);
	}
}

?>