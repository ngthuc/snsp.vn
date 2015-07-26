<div id="header_top">
	{if !Phpfox::getUserBy('profile_page_id') && Phpfox::isModule('search')}
		<div id="header_search">
			<div id="header_menu_space">
				<div id="header_sub_menu_search">
					<form method="post" id='header_search_form' action="{url link='search'}">
						<input type="text" name="q" value="{phrase var='core.search_dot'}" id="header_sub_menu_search_input" autocomplete="off" class="js_temp_friend_search_input" />
						<div id="header_sub_menu_search_input"></div>
						<a href="#" onclick='$("#header_search_form").submit(); return false;' id="header_search_button">{phrase var='core.search'}</a>
					</form>
				</div>
			</div>
		</div>
	{/if}
	<div id="header_menu_holder">
		{if Phpfox::isUser()}
			{menu_account}
			<div class="clear"></div>
		{else}
		<div>
			{module name='bootstraptheme.login-header'}
		</div>
		{/if}
	</div>
	{if Phpfox::isUser() && !Phpfox::getUserBy('profile_page_id')}
		<div id="holder_notify">
			{notification}
			<div class="clear"></div>
		</div>
	{/if}
</div>