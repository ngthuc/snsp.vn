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
 * @version 		$Id: ajax.class.php 2009-09-10 Nicolas $
 */
class Youtube_Component_Ajax_Ajax extends Phpfox_Ajax
{
	public function post()
	{
		Phpfox::isUser(true);
		if (($iVid = $this->get('id')))
		{	
			if (Phpfox::getService('youtube')->isPostVideo($iVid,Phpfox::getUserId()))
			{
				$this->alert(Phpfox::getPhrase('youtube.you_post_this_video_already'));
				return;
			}
			
			if (Phpfox::getService('youtube')->postVideoProfile($iVid))
			{
				$this->alert(Phpfox::getPhrase('youtube.video_successfully_post'));
				return;
			}
		}
	}
	
	
	public function addfavorite()
	{
		Phpfox::getBlock('youtube.addfavorite');
	}
}

?>