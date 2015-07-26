{if !PHPFOX_IS_AJAX_PAGE}
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="{$sLocaleDirection}" lang="{$sLocaleCode}">
	<head>
		<title>{title}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />		
		{header}
		<link rel="stylesheet" type="text/css" href="{php} echo Phpfox::getLib('template')->getStyle('css', 'resolution.css')."?v=" . Phpfox::getLib('template')->getStaticVersion(); {/php}" />
		<link rel="stylesheet" type="text/css" href="{php} echo Phpfox::getLib('template')->getStyle('css', 'iphone.css')."?v=" . Phpfox::getLib('template')->getStaticVersion(); {/php}" />
		<link rel="stylesheet" type="text/css" href="{php} echo Phpfox::getLib('template')->getStyle('css', 'ipad.css')."?v=" . Phpfox::getLib('template')->getStaticVersion(); {/php}" />		
	</head>
	<body {if !Phpfox::isUser()}class="non-user-wrapper{if Phpfox::getLib('module')->getFullControllerName()=='core.index-visitor'} landing-page{/if}"{/if}>
		{body}	
		{block location='9'}
		<div id="header">			
			<div class="holder">
				{block location='10'}
				<div id="header_holder" {if !Phpfox::isUser()} class="header_logo"{/if}>				
					<div id="header_left">
						{logo} 
						{if Phpfox::getParam('user.hide_main_menu') && !Phpfox::isUser()}{else}
							<div id="mobile-menu"><a href="#" >{img theme='layout/mobile_menu.png'}</a></div>
							<div id="mobile-menu2"><a href="#" >{img theme='layout/mobile_menu.png'}</a></div>
						{/if}
					</div>
					<div id="header_right">						
						<div id="header_top">
							{if Phpfox::isUser()}<div id="mobile-more-options"><a href="#">{img theme='layout/mobile_menu_col_left.png'}</a></div>{/if}
							{if Phpfox::isUser() && !Phpfox::getUserBy('profile_page_id')}
							<div id="holder_notify">																	
								{notification}
								<div class="clear"></div>
							</div>
							{/if}
							<div id="header_menu_holder">
								{if Phpfox::isUser()}
                                    {menu_account}                                    	
                                {else}
                                    <ul class="top_buttons">
										{if Phpfox::getLib('module')->getFullControllerName()!='user.login'}
											<li><a href="{url link='user.login'}" class="top_button_login">{phrase var='user.login_button'}</a></li>	
										{/if}
										{if Phpfox::getLib('module')->getFullControllerName()!='core.index-visitor' && Phpfox::getLib('module')->getFullControllerName()!='user.register'}
											<li><a href="{url link='user.register'}" class="top_button_signup">{phrase var='user.sign_up'}</a></li>										
										{/if}
									</ul>                                                                        
								{/if}						
									<div class="clear"></div>
							</div>	

							{if Phpfox::isUser() && !Phpfox::getUserBy('profile_page_id') && Phpfox::isModule('search')}
							<div id="header_search">	
								<div id="header_menu_space">
									<div id="header_sub_menu_search" class="header_mobile_search_close">
										<form method="post" id='header_search_form' action="{url link='search'}">																						
											<input type="text" name="q" value="" id="header_sub_menu_search_input" autocomplete="off" class="js_temp_friend_search_input" placeholder="{phrase var='core.search_dot'}"/>											
											<div id="header_sub_menu_search_input"></div>
											<a href="#" id="header_search_button">{phrase var='core.search'}</a>											
										</form>
									</div>
								</div>
							</div>	
							{/if}													
							
						</div>
					</div>
					{block location='6'}
				</div>
			</div>
						
			{if Phpfox::getParam('user.hide_main_menu') && !Phpfox::isUser()}
			
			{else}
			<div id="header_menu_page_holder" class="mobile_menu_close">	
				
				<div class="holder">
					<div id="header_menu">	
						<nav>			
							{menu}
						</nav>
						<div class="clear"></div>
					</div>		
				</div>			
			</div>	
			{/if}					
		</div>
		
		<div id="{if Phpfox::isUser()}main_core_body_holder{else}main_core_body_holder_guest{/if}">
		
			{block location='11'}

			<div id="main_content_holder">
			{/if}
				<div {holder_name}>		
					<div {is_page_view} class="holder">	
						
						{module name='profile.logo'}						
						
						<div id="content_holder"{if isset($sMicroPropType)} itemscope itemtype="http://schema.org/{$sMicroPropType}"{/if}>		
							{block location='13'}
							{block location='7'}				
							{if !defined('PHPFOX_IS_USER_PROFILE') && !defined('PHPFOX_IS_PAGES_VIEW')}
							{breadcrumb}
							{block location='12'}
							{/if}

							{if !$bUseFullSite && (count($aBlocks1) || count($aAdBlocks1)) || (isset($aFilterMenus) && is_array($aFilterMenus) && count($aFilterMenus))}					
							<div id="left" class="content_column left_col_close">
								{if Phpfox::getLib('module')->getFullControllerName()!='blog.index'}
									{menu_sub}
								{/if}
								{block location='1'}
							</div>					
							{/if}

							<div id="main_content">
								{if !defined('PHPFOX_IS_USER_PROFILE') && !defined('PHPFOX_IS_PAGES_VIEW')}
								{search}
								{/if}																			
								<div id="main_content_padding">

									{if defined('PHPFOX_IS_USER_PROFILE') || defined('PHPFOX_IS_PAGES_VIEW') || (isset($aPage) && isset($aPage.use_timeline) && $aPage.use_timeline)}
									    {if $bLoadedProfileHeader = true}{/if}
									    {module name='profile.header'}
									{/if}
									{if defined('PHPFOX_IS_PAGES_VIEW') && !isset($bLoadedProfileHeader)}
									    {block location='12'}
									    {module name='pages.header'}
									{/if}							

									<div id="content_load_data">
										{if isset($bIsAjaxLoader) || defined('PHPFOX_IS_USER_PROFILE') || defined('PHPFOX_IS_PAGES_VIEW')}
										{search}
										{/if}								

										{if isset($aBreadCrumbTitle) && count($aBreadCrumbTitle)}
										<h1{if isset($sMicroPropType)} itemprop="name"{/if}><a href="{$aBreadCrumbTitle[1]}"{if isset($sMicroPropType)} itemprop="url"{/if}>{$aBreadCrumbTitle[0]|clean|split:30}</a></h1>
										{/if}

										<div id="content" {content_class}>
											{error}
											{block location='2'}
											{content}
											{block location='4'}
										</div>

										{if !$bUseFullSite && (count($aBlocks3) || count($aAdBlocks3))}
										<div id="right" class="content_column right_col_close">		
											{block location='3'}
										</div>
										{/if}

										<div class="clear"></div>							
									</div>												
								</div>				
							</div>
							<div class="clear"></div>			
						</div>		
						{block location='8'}
					</div>							
				</div>			
			{if !PHPFOX_IS_AJAX_PAGE}
			</div>		
			<div id="main_footer_holder">
				<div class="holder">
					<div id="footer">
						<footer>		
							<nav>
								{menu_footer}
							</nav>					
							<div id="copyright">
								{copyright}
							</div>
							<div class="clear"></div>				
							{block location='5'}
						</footer>
					</div>				
				</div>			
			</div>
                        
                        {footer}	
			{literal}
			<script type="text/javascript">
			$Behavior.leftSidebarArrow = function()
			{
				$('#mobile-menu a').click(function()
				{		
					$('#header_menu_page_holder').toggleClass('sidebar_open');					
					return false;
				});
				$('#mobile-menu2 a').click(function()
				{		
					$('#header_menu_page_holder').toggleClass('sidebar_open');					
					return false;
				});				
				$('#mobile-menu-col-left a').click(function()
				{		
					$('#left').toggleClass('left_col_open');	
					$('#right').removeClass('right_col_open');
					$('html,body').animate({scrollTop: "0px"}, 300);					
					return false;
				});
				$('#mobile-menu-col-right a').click(function()
				{		
					$('#right').toggleClass('right_col_open');		
					$('html,body').animate({scrollTop: "0px"}, 300);
					return false;
				});				
				$('#mobile-menu-filter a').click(function()
				{		
					$('#section-filter').toggleClass('filter_open');
					return false;
				});				
				$('a#header_search_button').click(function()
				{		
					$('#header_sub_menu_search').toggleClass('header_mobile_search_open');
					$('html,body').animate({scrollTop: "0px"}, 300);
					return false;
				});
				$('#mobile-more-options a').click(function()
				{		
					$('#left').toggleClass('more_options_open');						
					$('html,body').animate({scrollTop: "0px"}, 300);					
					return false;
				});				
			}
			</script>
			{/literal}			
						
			{if Phpfox::getLib('module')->getFullControllerName()!='core.index-visitor'}
			{literal}
			<script type="text/javascript">
			$(document).ready(function() {
					$(window).scroll(function(){ 
							if ($(window).scrollTop() > ($('#header').outerHeight())){
								$('#tm_scroll_top').show();
							} else {                
								$('#tm_scroll_top').hide();
							}
					});
			});
			$(function() {
			  $('#tm_scroll_top a').click(function() {				  
					$('html,body').animate({scrollTop: "0px"}, 300);
					return false;
			  });
			});			
			</script>
			{/literal}						
		</div>        
		<div id="tm_scroll_top">
			<a href="#">TOP</a>
		</div>
		{/if}
			
			<div id="mobile-bottom-menu">
				{if !$bUseFullSite && (count($aBlocks1) || count($aAdBlocks1)) || (isset($aFilterMenus) && is_array($aFilterMenus) && count($aFilterMenus))}
					<div id="mobile-menu-col-left"><a href="#" >{img theme='layout/mobile_menu_col_left.png'}</a></div>
				{/if}		
				{if !$bUseFullSite && (count($aBlocks3) || count($aAdBlocks3))}
					<div id="mobile-menu-col-right"><a href="#" >{img theme='layout/mobile_menu_col_right.png'}</a></div>
				{/if}
			</div>		
			
		</div>        
    </body>
</html>
{/if}