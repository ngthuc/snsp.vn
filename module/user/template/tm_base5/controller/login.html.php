{$sCreateJs}
<div class="main_break">	
	<div class="loginbox">
	<form method="post" action="{url link="user.login"}" id="js_login_form" onsubmit="{$sGetJsForm}">
		
		<div class="table">
			<div class="table_right">
				<input type="text" name="val[login]" id="login" value="{$sDefaultEmailInfo}" size="40" class="input_boxes" placeholder="{if Phpfox::getParam('user.login_type') == 'user_name'}{phrase var='user.user_name'}{elseif Phpfox::getParam('user.login_type') == 'email'}{phrase var='user.email'}{else}{phrase var='user.login'}{/if}"/>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="table">
			<div class="table_right">
				<input type="password" name="val[password]" id="password" value="" size="40" class="input_boxes" placeholder="{phrase var='user.password'}"/>
			</div>
			<div class="clear"></div>
		</div>
		
		{plugin call='user.template_controller_login_end'}
		
		<div class="table_clear login_button">
			<input type="submit" value="{phrase var='user.login_button'}" class="button" />
			{plugin call='user.template.login_header_set_var'}
			{if isset($bCustomLogin)}
			<div class="p_top_8">
				{phrase var='user.or_login_with'}:
				<div class="p_top_4">					
					{plugin call='user.template_controller_login_block__end'}
				</div>
			</div>
			{/if}
		</div>

		<div class="table_clear">
			<label><input type="checkbox" class="checkbox" name="val[remember_me]" value="" /> {phrase var='user.remember'}</label> &nbsp;&nbsp; <a href="{url link='user.password.request'}" class="forgot-password">{phrase var='user.forgot_your_password'}</a>
		</div>	
		
		<div class="table_clear">
			<a href="{url link='user.register'}">Sign up</a>
		</div>
		

	</form>	
	
	</div>
</div>