<div>
	<ul>		
		<li>
			<a href="#" onclick="if (confirm('{phrase var='core.are_you_sure'}'))$.ajaxCall('friend.delete', 'friend_user_id={$aUser.user_id}&reload=1'); return false;" class="no_ajax_link">
				{phrase var='friend.remove_friend'}
			</a>
		</li>		
	</ul>
</div>