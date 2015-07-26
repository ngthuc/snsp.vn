{plugin call='user.template.login_header_set_var'}
	<div id="header_menu_login">
		{if isset($bCustomLogin)}
		<div id="header_menu_login_holder">
		{/if}
			<div class="bootstraptheme_custom_signin">
				<a href="{url link = 'user.login'}" style="padding: 8px 2px 6px 9px;">{phrase var='bootstraptheme.sign_in'}</a>
			</div>
			<div class="bootstraptheme_custom_signup">
				<a href="{url link = 'user.register'}" style="padding: 8px 9px 6px 2px;">{phrase var='bootstraptheme.sign_up'}</a>
			</div>
		{if isset($bCustomLogin)}
		</div>
		<div id="header_menu_login_custom">
		{if !Phpfox::getParam('user.force_user_to_upload_on_sign_up')}

			{if Phpfox::isModule('facebook') && Phpfox::getParam('facebook.enable_facebook_connect')}
				<div class="header_login_block">
					<fb:login-button scope="publish_stream,email,user_birthday" v="2"></fb:login-button>
				</div>
			{/if}
			{if Phpfox::isModule('janrain') && Phpfox::getParam('janrain.enable_janrain_login')}
			<div class="header_login_block">
				<a class="rpxnow" onclick="return false;" href="{$sJanrainUrl}">{img theme='layout/janrain-icons.png'}</a>
			</div>
			{/if}
		{/if}
		{plugin call='user.template.login_header_custom'}
		</div>
	{/if}
	</div>