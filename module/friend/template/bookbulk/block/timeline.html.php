<div class="timeline_holder">
	<div class="timeline_friendlist_title">
		<a href="{$sFriendsLink}" class="timeline_friendlist_link">{phrase var='friend.see_all'}</a>		
		{phrase var='friend.friends'}
		<div class="extra_info"><span>·</span>
			{$aUser.total_friend|number_format}
		</div>
	</div>
	<div class="timeline_friendlist_content">
		{foreach from=$aFriends key=iKey name=friend item=aFriend}
		<div class="timeline_friendlist_row">
			<div class="timeline_friendlist_user">{$aFriend|user}</div>
			{img user=$aFriend suffix='_120_square' max_width=103 max_height=103}
		</div>
		{/foreach}
		<div class="clear"></div>
	</div>
</div>