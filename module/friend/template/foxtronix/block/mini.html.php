{if count($aFriends)}
<div class="block_listing_inline">
<div class="ej_block_images">
	<ul>
{foreach from=$aFriends name=friend item=aFriend}
		<li>		
			{img user=$aFriend suffix='_50_square' max_width=40 max_height=40 class='js_hover_title'}
		</li>	
{/foreach}
	</ul>
	<div class="clear"></div>
</div>
</div>
{else}
<div class="extra_info">
	{phrase var='friend.no_friends_online'}
</div>
{/if}