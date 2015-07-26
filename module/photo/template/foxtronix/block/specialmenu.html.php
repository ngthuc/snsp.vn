<div class="profile_photo_special_menu">
    <a href="{$sLinkPhotos}" {if $bShowPhotos} class="active"{/if}>
    	<div>
			{$aInfo.total_photos}<span>{phrase var='photo.photos'}</span>
		</div>		    
    </a>
    <a href="{$sLinkAlbums}" {if !$bShowPhotos} class="active"{/if}>
    	<div>
			{$aInfo.total_albums}<span>{phrase var='photo.albums'}</span>
		</div> 
    </a>
</div>
<div class="clear"></div>