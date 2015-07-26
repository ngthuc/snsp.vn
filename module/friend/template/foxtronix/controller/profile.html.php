{if count($aFriends)}
{foreach from=$aFriends name=friend item=aFriend}
<div id="js_friend_{$aFriend.friend_id}" class="go_left row_friend_browse" style="width:32%; padding-bottom:10px; position:relative;">
	<div class="t_center" style="width:80px; float:right;">
		{img user=$aFriend suffix='_75_square' max_width=75 max_height=75}				
	</div>
	<div style="margin-right:85px; position:relative;">
		<span class="row_title_link">{$aFriend|user:'':'':50}</span>
		{if defined('PHPFOX_IS_USER_PROFILE') && isset($aUser.user_id) && $aUser.user_id == Phpfox::getUserId()}		
		<div class="row_unfriend">
			<a href="#" onclick="$.ajaxCall('friend.delete', 'id={$aFriend.friend_id}'); return false;">{phrase var='friend.unfriend'}</a>
		</div>
		{/if}		
	</div>
	<div class="clear"></div>
</div>
{if is_int($phpfox.iteration.friend/3)}
<div class="clear"></div>
{/if}
{/foreach}
<div class="clear"></div>
{pager}
{else}

{if $sFriendView == 'online'}
<div class="extra_info">
	{phrase var='friend.no_friends_online'}
</div>
{else}

{if $aUser.user_id == Phpfox::getUserId()}
<div class="extra_info">{phrase var='friend.you_have_not_added_any_friends_yet'}</div>
<ul class="action">
	<li><a href="{url link='friend.find'}">{phrase var='friend.search_for_friends'}</a></li>
	<li><a href="{url link='user.browse'}">{phrase var='friend.browse_members'}</a></li>
</ul>
{else}
<div class="extra_info">{phrase var='friend.user_link_has_not_added_any_friends' user=$aUser}</div>
<ul class="action">	
	<li><a href="{url link='user.browse'}">{phrase var='friend.browse_other_members'}</a></li>
</ul>
{/if}

{/if}

{/if}