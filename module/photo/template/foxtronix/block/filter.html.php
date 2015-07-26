<form method="post" action="{$sPhotoUrl}" id="js_photo_form">
	{phrase var='photo.search_for_keyword'}:
	<div class="p_4">
		{filter key='search'}
	</div>
	<div class="p_top_4">
	{phrase var='photo.display'}:
		<div class="p_4">
			{filter key='display'}
		</div>
	</div>	
	<div class="p_top_4">
	{phrase var='photo.sort'}:
		<div class="p_4">
			{filter key='sort'} {filter key='sort_by'}
		</div>
	</div>		
	<div class="p_top_8">
		<input type="submit" name="search[submit]" value="{phrase var='core.submit'}" class="button" />
		<input type="submit" name="search[reset]" value="{phrase var='core.reset'}" class="button" />	
	</div>
</form>