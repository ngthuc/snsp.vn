<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		phpfoxguru.com
 * @author  		Nicolas
 * @package  		Module_Youtube
 * @version 		$Id: addfavorite.html.php 2009-09-10 David $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{phrase var='favorite.successfully_added_to_your_favorites'}
<ul class="action">
	<li><a href="{url link='profile.favorite'}">{phrase var='favorite.view_your_favorites'}</a></li>
	<li><a href="#" onclick="tb_remove(); return false;">{phrase var='favorite.close'}</a></li>
</ul>