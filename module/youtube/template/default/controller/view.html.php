<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		phpfoxguru.com
 * @author  		Nicolas
 * @package  		Module_Youtube
 * @version 		$Id: view.html.php 2009-10-12 Nicolas $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div class="main_break"></div>
<div id="js_video_outer_body">
	<div class="t_center">
	{$aVideo.embed_code}
	</div>
	<div class="video_share_box">
		{if Phpfox::isModule('share')}
			{module name='share.link' type='video' display='image' url=$aVideo.bookmark title=$aVideo.title}	
		{/if}
		{if Phpfox::isModule('favorite')}
			<a href="#?call=youtube.addfavorite&amp;height=100&amp;width=400&amp;type=youtube&amp;id={$iVid}" class="inlinePopup" title="{phrase var='youtube.add_to_your_favorites'}">{img theme='misc/icn_save.png' class='v_middle'} {phrase var='youtube.add_to_your_favorites'}</a>
		{/if}
	</div>
	
	<div class="t_left">
		<b>{phrase var='youtube.category'}</b>: {$aVideo.category}
	</div>
	<div class="t_left">
		<b>{phrase var='youtube.keyword'}</b>: {$aVideo.keywords}
	</div>
	<div class="t_left">
		<b>{phrase var='youtube.description'}</b>
	</div>
	<p style="margin-top:5px;" id="js_video_text">
	{$aVideo.description|parse}
	</p>
	
	<div class="separate" style="margin-top:15px;"></div>

	<div class="p_top_4">
	{phrase var='video.url'}:
		<div class="p_4">
			<input name="#" value="{$aVideo.bookmark}" type="text" size="22" onfocus="this.select();" style="width:90%;" />
		</div>
	</div>
	
	<div class="p_top_4">
	{phrase var='video.embed'}:
		<div class="p_4">
			<input name="#" value="{$aVideo.embed}" type="text" size="22" onfocus="this.select();" style="width:90%;" />
		</div>
	</div>
</div>