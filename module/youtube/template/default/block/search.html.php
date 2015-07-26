<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		phpfoxguru.com
 * @author  		Nicolas
 * @package  		Module_Youtube
 * @version 		$Id: search.html.php 2009-09-10 Nicolas $ 
 */
 
defined('PHPFOX') or exit('NO DICE!'); 
?>
<form method="post" action="{url link='youtube.search'}">
<div class="p_4"><input type="text" name="keyword" size="25" id="keyword" value="{if isset($sKeyword)}{$sKeyword}{/if}"/>
<input name="search[submit]" value="{phrase var='youtube.search'}" class="button" type="submit" /></div>
</form>