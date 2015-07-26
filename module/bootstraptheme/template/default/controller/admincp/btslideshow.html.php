<div class="table_header">
	{phrase var='bootstraptheme.list_of_slides'}
</div>
<table id="js_drag_drop" cellpadding="0" cellspacing="0">
	<tr>
		<th></th>
		<th style="width:20px;"></th>
		<th style="width:200px;">{phrase var='bootstraptheme.slide_title'}</th>
		<th>{phrase var='bootstraptheme.slide_description'}</th>
		<th class="t_center" style="width:60px;">{phrase var='bootstraptheme.slide_active'}</th>
	</tr>
	{foreach from=$slides key=iKey item=slide}
	<tr class="checkRow{if is_int($iKey/2)} tr{else}{/if}">
		<td class="drag_handle"><input type="hidden" name="val[ordering][{$slide.slide_id}]" value="{$slide.ordering}" /></td>
		<td class="t_center" style="vertical-align: middle;">
			<a href="#" class="js_drop_down_link" title="{phrase var='bootstraptheme.slide_manage'}">{img theme='misc/bullet_arrow_down.png' alt=''}</a>
			<div class="link_menu">
				<ul>
					<li><a href="{url link='admincp.bootstraptheme.btaddslide' id={$slide.slide_id}">{phrase var='bootstraptheme.slide_edit'}</a></li>
					<li><a href="{url link='admincp.bootstraptheme.btaddslide' delete={$slide.slide_id}" onclick="return confirm('{phrase var='share.are_you_sure' phpfox_squote=true}');">{phrase var='bootstraptheme.slide_delete'}</a></li>
				</ul>
			</div>
		</td>
		<td>{$slide.slide_title}</td>
		<td>{$slide.slide_description}</td>
		<td class="t_center">
			<div class="js_item_is_active"{if !$slide.is_active} style="display:none;"{/if}>
				<a href="#?call=bootstraptheme.updateActivity&amp;id={$slide.slide_id}&amp;active=0" class="js_item_active_link" title="{phrase var='bootstraptheme.slide_deactivate'}">{img theme='misc/bullet_green.png' alt=''}</a>
			</div>
			<div class="js_item_is_not_active"{if $slide.is_active} style="display:none;"{/if}>
				<a href="#?call=bootstraptheme.updateActivity&amp;id={$slide.slide_id}&amp;active=1" class="js_item_active_link" title="{phrase var='bootstraptheme.slide_activate'}">{img theme='misc/bullet_red.png' alt=''}</a>
			</div>
		</td>
	</tr>
	{/foreach}
</table>