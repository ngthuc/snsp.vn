<div class="{if isset($phpfox.iteration.minivideos)}{if is_int($phpfox.iteration.minivideos/2)}row1{else}row2{/if}{if $phpfox.iteration.minivideos == 1 && !isset($bIsLoadingMore)} row_first{/if}{else}row1 row_first row_no_border{/if}">
	<div style="width:120px;" class="t_center">
		<a href="{permalink module='video' id=$aMiniVideo.video_id title=$aMiniVideo.title}">
			{if !empty($aVideo.vidly_url_id) && defined('PHPFOX_IS_HOSTED_SCRIPT')}
			<img src="https://c197913.ssl.cf1.rackcdn.com/{$aMiniVideo.vidly_url_id}/thumbnail_1.jpg" alt="{$aVideo.title|clean}" style="max-width:120; max-height:90px;" class='js_mp_fix_width' />
			{else}
			{img server_id=$aMiniVideo.image_server_id path='video.url_image' file=$aMiniVideo.image_path suffix='_120' max_width=120 max_height=90 class='js_mp_fix_width' title=$aMiniVideo.title}
			{/if}
		</a>
	</div>
	<div style="width:120px;">
		<a href="{permalink module='video' id=$aMiniVideo.video_id title=$aMiniVideo.title}" class="row_sub_link">{$aMiniVideo.title|clean}</a>		
	</div>
	<div class="clear"></div>
</div>