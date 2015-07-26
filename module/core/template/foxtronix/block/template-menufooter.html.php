{if !Phpfox::getUserBy('profile_page_id')}
<div class="mac_footer_menu_link">
	{foreach from=$aFooterMenu key=iKey item=aMenu name=footer}
		<a href="{url link=''$aMenu.url''}" class="ajax_link{if $aMenu.url == 'mobile'} no_ajax_link{/if}">
		{phrase var=$aMenu.module'.'$aMenu.var_name}
		</a>
	{/foreach}					
	{if Phpfox::getUserParam('core.can_design_dnd')}

		{if !Phpfox::getService('theme')->isInDnDMode()}
			<a href="#" onclick="$.ajaxCall('core.designdnd', 'enable=1&amp;inline=1'); return false;">
				{phrase var='core.enable_dnd_mode'}
			</a>
		{else}
			<a href="#" onclick="$.ajaxCall('core.designdnd', 'enable=2&amp;inline=1'); return false;">
				{phrase var='core.disable_dnd_mode'}
			</a>
		{/if}
	{/if}
</div>
{/if}