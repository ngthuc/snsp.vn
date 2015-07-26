<div id="menu">
	<ul>
		<li><a href="{$sTopFriendOnlineLink}" class="first">{phrase var='friend.view_friends_online'}</a></li>
		{if $aUser.user_id != Phpfox::getUserId()}
		<li><a href="{url link=''$aUser.user_name'.friend.mutual'}">{phrase var='friend.mutual_friends'}</a></li>
		{/if}
		{if $aUser.user_id == Phpfox::getUserId()}
		<li><a href="{url link='friend'}">{phrase var='friend.edit_top_friends'}</a></li>		
		{/if}
	</ul>						
</div>