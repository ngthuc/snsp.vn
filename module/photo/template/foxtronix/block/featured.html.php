<div class="t_center">
	<a href="{permalink module='photo' id=$aFeaturedImage.photo_id title=$aFeaturedImage.title}">
		{if (Phpfox::getLib('template')->getStyleFolder() == 'nebula')}
		{img server_id=$aFeaturedImage.server_id path='photo.url_photo' file=$aFeaturedImage.destination suffix='_240' max_width=170 max_height=240}
		{else}
		{img server_id=$aFeaturedImage.server_id path='photo.url_photo' file=$aFeaturedImage.destination suffix='_240' max_width=240 max_height=240}
		{/if}
	</a>
</div>
{if Phpfox::getParam('photo.ajax_refresh_on_featured_photos')}
<script type="text/javascript">
	setTimeout("$.ajaxCall('photo.refreshFeaturedImage', '', 'GET');", {$iRefreshTime});
</script>
{/if}