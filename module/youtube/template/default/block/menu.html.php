<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		phpfoxguru.com
 * @author  		Nicolas
 * @package  		Module_Youtube
 * @version 		$Id: menu.html.php 2009-09-10 Nicolas $ 
 */
 
defined('PHPFOX') or exit('NO DICE!'); 
?>
<div class="sub_section_menu">
	<ul>
	{if $bKeyword}
		<li><a href="{url link='youtube.mostviewed'}" title="{phrase var='youtube.most_viewed'}">{phrase var='youtube.most_viewed'}</a></li>
		<li><a href="{url link='youtube.mostrecent'}" title="{phrase var='youtube.most_recent'}">{phrase var='youtube.most_recent'}</a></li>
		<li><a href="{url link='youtube.toprated'}" title="{phrase var='youtube.top_rated'}">{phrase var='youtube.top_rated'}</a></li>
		<li><a href="{url link='youtube.mostrelevance'}" title="{phrase var='youtube.most_relevance'}">{phrase var='youtube.most_relevance'}</a></li>
		
	</ul>
	{else}
	<ul>
		<li><a href="{url link='youtube.mostpopular'}" title="{phrase var='youtube.most_popular'}">{phrase var='youtube.most_popular'}</a></li>
		<li><a href="{url link='youtube.mostviewed'}" title="{phrase var='youtube.most_viewed'}">{phrase var='youtube.most_viewed'}</a></li>
		<li><a href="{url link='youtube.mostrecent'}" title="{phrase var='youtube.most_recent'}">{phrase var='youtube.most_recent'}</a></li>
		<li><a href="{url link='youtube.mostdiscussed'}" title="{phrase var='youtube.most_recent'}">{phrase var='youtube.most_discussed'}</a></li>
		<li><a href="{url link='youtube.mostresponded'}" title="{phrase var='youtube.most_recent'}">{phrase var='youtube.most_responded'}</a></li>
		<li><a href="{url link='youtube.toprated'}" title="{phrase var='youtube.most_recent'}">{phrase var='youtube.top_rated'}</a></li>
		<li><a href="{url link='youtube.topfavorites'}" title="{phrase var='youtube.most_recent'}">{phrase var='youtube.top_favorites'}</a></li>
		
	</ul>
	{/if}
</div>