{if !$bIsUsersProfilePage && count($aSubMenus)}
	{if Phpfox::isMobile()}
		{if count($aSubMenus) == 1}
			{foreach from=$aSubMenus key=iKey name=submenu item=aSubMenu}
			<a href="{url link=$aSubMenu.url}" class="mobile_section_menu">{phrase var='core.add'}</a>
			{/foreach}
		{else}
			<a href="#" class="mobile_section_menu" onclick="$('#section_menu').toggle(); return false;">{phrase var='core.add'}</a>
		{/if}
		
	{/if}
	<div id="section_menu"{if Phpfox::isMobile()} style="display:none;"{/if}>
		<div class="button-group">
			{foreach from=$aSubMenus key=iKey name=submenu item=aSubMenu}
			<a href="{url link=$aSubMenu.url)}" {if isset($aSubMenu.css_name)}class="button {$aSubMenu.css_name} no_ajax_link {if substr($aSubMenu.url, -4) == '.add' || substr($aSubMenu.url, -7) == '.upload' || substr($aSubMenu.url, -6) == '.album' || substr($aSubMenu.url, -8) == '.compose'}icon add{/if}"{else} class="button {if substr($aSubMenu.url, -4) == '.add' || substr($aSubMenu.url, -7) == '.upload' || substr($aSubMenu.url, -6) == '.album' || substr($aSubMenu.url, -8) == '.compose'}icon add{/if}" {/if}>
			{phrase var=$aSubMenu.module'.'$aSubMenu.var_name}
			</a>
			{/foreach}
		</div>						
		<div class="clear"></div>
	</div>
	{if Phpfox::isMobile()}
	<div class="clear"></div>
	{/if}
	{/if}