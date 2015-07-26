{if count($aMutualFriends)}
<div class="p_4">
	<div class="go_left">
	{phrase var='friend.mutual_friends'}:
	</div>
	<div class="go_left">
		{foreach from=$aMutualFriends item=aMutualFriend}
		<div class="t_center go_left">
			{$aMutualFriend|user|shorten:10:'...'}
			<div class="p_2">
				{img user=$aMutualFriend suffix='_50_square' max_width=50 max_height=50}
			</div>	
		</div>
		{/foreach}
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
{/if}