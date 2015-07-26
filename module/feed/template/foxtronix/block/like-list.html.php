{foreach from=$aLikes name=like item=aLike}
<div class="{if is_int($phpfox.iteration.like/2)}row1{else}row2{/if}{if $phpfox.iteration.like == 1} row_first{/if}">
	<div class="go_left">
		{img user=$aLike suffix='_50' max_width=50 max_height=50}	
	</div>
	<div>
		{$aLike|user}
	</div>
	<div class="clear"></div>
</div>
{/foreach}