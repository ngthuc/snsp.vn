<div class="main_break"></div>
{if count($aAlbums)}
{template file='photo.block.album-entry'}
{else}
<div class="extra_info">
	{phrase var='photo.no_public_photo_albums_found'}
</div>
{/if}