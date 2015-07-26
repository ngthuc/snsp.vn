<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		phpfoxguru.com
 * @author  		Nicolas
 * @package  		Module_Youtube
 * @version 		$Id: display.html.php 2009-09-10 Nicolas $ 
 */
 
defined('PHPFOX') or exit('NO DICE!'); 
?>
{if count($aVideos)}
<div id="js_video_outer_body">
	{foreach from=$aVideos name=videos item=aVideo}
			<div class="t_center js_video_parent" style="height:120px; width:31%; margin-bottom:10px; float:left; padding-top:5px; z-index:1; margin-right:2px; position:relative;" id="js_video_id_{$aVideo.vid}">		
			
			<div style="position:relative; width:120px; margin:auto;" class="js_outer_video_div js_mp_fix_holder image_hover_holder">
				{if !empty($aVideo.duration)}
				<div style="position:absolute; bottom:0; left:0; background:#000; color:#fff; font-size:8pt; margin-bottom:3px; padding:1px; font-weight:bold;">
					{$aVideo.duration}
				</div>
				{/if}
				<a href="{url link='youtube.view' id=$aVideo.vid}" class="js_video_title_{$aVideo.vid}"><img src="{$aVideo.thumb}" alt="{$aVideo.title}"></a>
			</div>
			
			<div class="p_4 t_left">
				<a href="{url link='youtube.view' id=$aVideo.vid}" class="js_video_title_{$aVideo.vid}" id="js_video_title_{$aVideo.vid}">{$aVideo.title|clean|shorten:30|split:20}</a>
			</div>	
			</div>
			{if is_int($phpfox.iteration.videos/3)}
			<div class="clear"></div>
			{/if}
	{/foreach}
	<div class="clear"></div>
	<div class="t_right">
		{pager}
	</div>
</div>
{/if}