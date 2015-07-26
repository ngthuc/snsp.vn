<div id="js_purchase_points">
	<form method="post" action="#">
		{phrase var='user.how_many_points_would_you_like_to_purchase'}
		<select name="purchase" onchange="$(this).ajaxCall('user.processPurchasePoints');">
			<option value="">{phrase var='user.select'}:</option>
			{foreach from=$aPurchasePoints item=iPurchasePoint}
			<option value="{$iPurchasePoint.id}">{$iPurchasePoint.cost}</option>
			{/foreach}
		</select>
	</form>
</div>