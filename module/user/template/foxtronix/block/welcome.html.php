<div class=onlin_member>
انلاین ها
</div>	
<div style="position: fixed; z-index: -1; top: 0px; left: 0px; width: 100%;">
		<img width="100%" height="100%" alt="" src="../theme/frontend/foxtronix/style/foxtronix/image/yaft/pengs2.jpg">
	</div>

<div id="js_registration_holder" class="main_breakproo">
<form method="post" action="{url link='user.login'}">
											<div class="header_menu_login_left">
												<div class="header_menu_login_label">{if Phpfox::getParam('user.login_type') == 'user_name'}{phrase var='user.user_name'}{elseif Phpfox::getParam('user.login_type') == 'email'}{phrase var='user.email'}{else}{phrase var='user.login'}{/if}:</div>
												<div class="table"><input placeholder="ایمیل شما" type="text" name="val[login]" value="" class="header_menu_login_input" tabindex="1" /></div>
												
											</div>
											<div class="header_menu_login_right">
												<!--<div class="header_menu_login_label">{phrase var='user.password'}:</div>-->
												<div class="table"><input placeholder="رمز عبور" type="password" name="val[password]" value="" class="header_menu_login_input" tabindex="2" /></div>
												<div class="header_menu_login_sub">
													<a href="{url link='user.password.request'}">{phrase var='user.forgot_your_password'}</a>
												</div>
												<div class="header_menu_login_subb">
													<label><input type="checkbox" name="val[remember_me]" value="" checked="checked" tabindex="4" /> {phrase var='user.keep_me_logged_in'}</label>
												</div>
											</div>
											<div class="table_clear">
												<input id="js_registration_submit" class="button_registerr" type="submit" value="{phrase var='user.login_singular'}" tabindex="3" />
											</div>
										</form>
				</div>