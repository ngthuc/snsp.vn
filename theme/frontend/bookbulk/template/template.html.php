{if !PHPFOX_IS_AJAX_PAGE}
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="{$sLocaleDirection}" lang="{$sLocaleCode}">
	<head>
		<title>{title}</title>	
		{header}
	</head>
	<link type="text/css" href="/cometchat/cometchatcss.php" rel="stylesheet" charset="utf-8">
	<script type="text/javascript" src="/cometchat/cometchatjs.php" charset="utf-8"></script>
	<body class="{if $bUseFullSite}bb_is_full_page {/if}{if Phpfox::getUserId()}bb_body_member{else}bb_body_guest{/if} bb_page_{$sFullControllerName}{if Phpfox::getUserBy('profile_page_id')} bb_is_page_pages_view{/if}{if defined('PHPFOX_IS_USER_PROFILE')} bb_is_user_profile{/if}{if defined('PHPFOX_IS_USER_PROFILE') && !Phpfox::getService('profile')->timeline()} bb_is_user_profile_no_timeline{else} bb_is_user_profile_yes_timeline{/if}{if defined('PHPFOX_IS_USER_PROFILE') && Phpfox::getService('profile')->timeline()} bb_profile_timeline{/if}{if !$bUseFullSite && !defined('PHPFOX_IN_DESIGN_MODE') && !Phpfox::getService('profile')->timeline() && !defined('PHPFOX_IS_USER_PROFILE') && !defined('PHPFOX_IS_PAGES_VIEW') && Phpfox::isUser()} bb_is_favorites_menu{/if}">
	                
	                <div{if !Phpfox::isUser()} id="nb_body_holder_guest"{elseif defined('PHPFOX_IN_DESIGN_MODE')} id="nb_in_design"{/if}>
			{body}	
			{block location='9'}
		
			<div id="header" {if PHPFOX::isUser()}class="bookbulk_header {if $asideStatus} bookbulk_header_aside{/if}" {/if}>
			
				{if !Phpfox::isUser()}
				{if Phpfox::getParam('user.hide_main_menu')}

				{else}
				<div id="nb_header_menu">
					<div class="holder">
						{menu}
						<div class="clear"></div>
					</div>
				</div>
				{/if}
				{/if}		
			
				<div class="holder">
						
					{block location='10'}
					<div id="header_holder" {if !Phpfox::isUser()} class="header_logo"{/if}>				
						<div id="header_left">
							{logo}
						</div>
						<div id="header_right">
							<div id="header_top">
								{if Phpfox::isUser() && !Phpfox::getUserBy('profile_page_id')}
								<div id="holder_notify">																	
									{notification}
									<div class="clear"></div>
								</div>
								{/if}
								{if Phpfox::isUser() && !Phpfox::getUserBy('profile_page_id')}
								<div id="nb_features">
									<a href="#" id="nb_features_link">Features</a>
									<div id="nb_features_holder">
										{assign var='bNoAppsMenu' value=true}									
										{menu}
									</div>								
								</div>
								{/if}
								<div id="header_menu_holder">
									{if Phpfox::isUser()}
									{menu_account}
									<div class="clear"></div>	
									{else}
									{module name='user.login-header'}
									{/if}							
								</div>							
								{if Phpfox::isUser() && !Phpfox::getUserBy('profile_page_id') && Phpfox::isModule('search')}
								<div id="header_search">	
									<div id="header_menu_space">
										<div id="header_sub_menu_search">
											<form method="post" id='header_search_form' action="{url link='search'}">																						
												<input type="text" name="q" value="{phrase var='core.search_for_people_places_and_things'}" placeholder="{phrase var='core.search_for_people_places_and_things'}"  id="header_sub_menu_search_input" autocomplete="off" class="js_temp_friend_search_input" />											
												<div id="header_sub_menu_search_input"></div>
												<a href="#" onclick='$("#header_search_form").submit(); return false;' id="header_search_button">{phrase var='core.search'}</a>											
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
			</div>
			
			<div id="nb_body">		
				<div id="{if Phpfox::isUser()}main_core_body_holder{else}main_core_body_holder_guest{/if}" {if PHPFOX::isUser()}class="bookbulk_core_body {if $asideStatus} bookbulk_core_body_aside{/if}" {/if} >
					{block location='11'}
					<div id="main_content_holder">	
					{/if}
						<div {holder_name}>		
							<div {is_page_view} class="holder{if (defined('PHPFOX_IS_USER_PROFILE_INDEX') || defined('PHPFOX_IS_PAGES_IS_INDEX')) && Phpfox::getService('profile')->timeline()} js_is_profile_timeline{/if}">	
								
								{module name='profile.logo'}
								
								<div id="content_holder"{if isset($sMicroPropType)} itemscope itemtype="http://schema.org/{$sMicroPropType}"{/if}>
									{block location='13'}
									{block location='7'}				
									{if !defined('PHPFOX_IS_USER_PROFILE') && !defined('PHPFOX_IS_PAGES_VIEW')}
									
									{block location='12'}
									{/if}
		
									{if !$bUseFullSite}		
									{if defined('PHPFOX_IN_DESIGN_MODE') && Phpfox::getService('profile')->timeline()}
									
									{else}			
									<div id="left" class="content_column">
									
										{if defined('PHPFOX_IS_USER_PROFILE') || defined('PHPFOX_IS_PAGES_VIEW') || !Phpfox::isUser()}
										{menu_sub}
										{block location='1'}																
										{else}
										<div id="nb_name">
											<div class="nb_name_image">
												{img user=$aGlobalUser suffix='_50_square' max_width=40 max_height=40}
											</div>
											<div class="nb_name_info">
												<a href="{$sUserProfileUrl}" class="nb_name_link">{$sCurrentUserName}</a>
												<div class="nb_name_edit">
													<a href="{url link='user.profile'}">{phrase var='theme.edit_profile'}</a>
												</div>
											</div>
										</div>
										<div class="global_apps_title title">{phrase var='favorite.welcome_favorites'}</div>
<div class="sub_section_menu global_apps_title_padding"><ul>
<li class="active"><a href="{url link=''}" onclick="$('#js_menu').hide(); $.ajaxCall('core.event_page'); $('#js_menu_loader').show();">{img theme='favorites/news_feed.png' class='v_middle'}<span class="bar_menu_title">{phrase var='feed.news_feed'}</span><span id="js_menu_loader" class="menu_title_float">{img theme='ajax/add_menu.gif'}</span></a></li>
<li><a href="{url link='mail'}" onclick="$('#js_menu').hide(); $.ajaxCall('core.event_page'); $('#js_menu_loader2').show();">{img theme='favorites/mail.png' class='v_middle'}<span class="bar_menu_title">{phrase var='mail.messages_notify'}</span><span id="js_menu_loader2" class="menu_title_float">{img theme='ajax/add_menu.gif'}</span></a></li>
<li><a href="{url link='event'}" onclick="$('#js_menu').hide(); $.ajaxCall('core.event_page'); $('#js_menu_loader3').show();">{img theme='favorites/events.png' class='v_middle'}<span class="bar_menu_title">{phrase var='event.events'}</span><span id="js_menu_loader3" class="menu_title_float">{img theme='ajax/add_menu.gif'}</span></a></li>
<li><a href="{url link='photo'}" onclick="$('#js_menu').hide(); $.ajaxCall('core.event_page'); $('#js_menu_loader4').show();">{img theme='favorites/photos.png' class='v_middle'}<span class="bar_menu_title">{phrase var='user.photos'}</span><span id="js_menu_loader4" class="menu_title_float">{img theme='ajax/add_menu.gif'}</span></a></li>
</ul></div>

<div class="global_apps_title title">{phrase var='user.custom_interests'}</div>
<div class="sub_section_menu global_apps_title_padding"><ul>
<li><a href="{url link='user.browse'}" onclick="$('#js_menu').hide(); $.ajaxCall('core.event_page'); $('#js_menu_loader5').show();">{img theme='favorites/find_friends.png' class='v_middle'}<span class="bar_menu_title">{phrase var='invite.find_friends'}</span><span id="js_menu_loader5" class="menu_title_float">{img theme='ajax/add_menu.gif'}</span></a></li>
<!--<li><a href="{url link='listing'}" onclick="$('#js_menu').hide(); $.ajaxCall('core.event_page'); $('#js_menu_loader6').show();">{img theme='favorites/marketplace.png' class='v_middle'}<span class="bar_menu_title">{phrase var='search.listings'}</span><span id="js_menu_loader6" class="menu_title_float">{img theme='ajax/add_menu.gif'}</span></a></li>-->
<li><a href="{url link='video'}" onclick="$('#js_menu').hide(); $.ajaxCall('core.event_page'); $('#js_menu_loader7').show();">{img theme='favorites/videos.png' class='v_middle'}<span class="bar_menu_title">{phrase var='video.videos'}</span><span id="js_menu_loader7" class="menu_title_float">{img theme='ajax/add_menu.gif'}</span></a></li>
<li><a href="{url link='music'}" onclick="$('#js_menu').hide(); $.ajaxCall('core.event_page'); $('#js_menu_loader8').show();">{img theme='favorites/music.png' class='v_middle'}<span class="bar_menu_title">{phrase var='music.music'}</span><span id="js_menu_loader8" class="menu_title_float">{img theme='ajax/add_menu.gif'}</span></a></li>
</ul></div>

<table border=0 width=100%><tr>
<td><div align="left"><div class="global_apps_title title">{phrase var='apps.apps'}</div></div></td>
<td>{if count($aInstalledApps) > $iPageLimit}<div align="right"><div class="global_apps_title2 title"><a href="{url link='apps' view='installed'}">{phrase var='core.welcome_more'}</a></div></div>{/if}</td>
</tr></table>
<div class="sub_section_menu global_apps_title_padding">
<ul>
<li><a href="{url link='apps'}" onclick="$('#js_menu').hide(); $.ajaxCall('core.event_page'); $('#js_menu_loader9').show();">{img theme='favorites/create_an_app.png' class='v_middle'}<span class="bar_menu_title">{phrase var='apps.create_an_app'}</span><span id="js_menu_loader9" class="menu_title_float">{img theme='ajax/add_menu.gif'}</span></a></li>
{if is_array($aInstalledApps) && count($aInstalledApps)}	
{foreach from=$aInstalledApps item=aInstalledApp}
<li><a href="{permalink module='apps' id=$aInstalledApp.app_id title=$aInstalledApp.app_title}" title="{$aInstalledApp.app_title|clean}">{img server_id=0 path='app.url_image' file=$aInstalledApp.image_path suffix='_square' max_width=16 max_height=16 title=$aInstalledApp.app_title class='v_middle'}<span class="mntitle">{$aInstalledApp.app_title|clean|shorten:22:'...'}</span></a></li>
{/foreach}
{/if}
</ul>
</div>

<table border=0 width=100%>
<tr>
<td><div align="left"><div class="global_apps_title title">{phrase var='pages.module_pages'}</div></div></td>
<td>{if count($aInstalledPages) > $iPageLimit}<div align="right"><div class="global_apps_title2 title" style="margin-right:5px;"><a href="{url link='pages' view='my'}">{phrase var='pages.more'}</a></div></div>{/if}</td>
</tr>
</table>
<div class="sub_section_menu global_apps_title_padding">
<ul><li><a href="{url link='pages.add'}" onclick="$('#js_menu').hide(); $.ajaxCall('core.event_page'); $('#js_menu_loader10').show();">{img theme='favorites/create_a_page.png' class='v_middle'}<span class="bar_menu_title">{phrase var='pages.create_a_page'}</span><span id="js_menu_loader10" class="menu_title_float">{img theme='ajax/add_menu.gif'}</span></a></li>
<li><a href="{url link='pages'}" onclick="$('#js_menu').hide(); $.ajaxCall('core.event_page'); $('#js_menu_loader11').show();">{img theme='favorites/pages.png' class='v_middle'}<span class="bar_menu_title">{phrase var='pages.module_pages'}</span><span id="js_menu_loader11" class="menu_title_float">{img theme='ajax/add_menu.gif'}</span></a></li></ul></div>
										<div id="nb_favorites" class="block">
											<div class="title">
												<a href="#" class="nb_edit_block_title">{phrase var='theme.edit'}</a>
												{phrase var='theme.favorites'}
											</div>
											<div id="nb_main_menu">
												{assign var='iTotalHide' value=4}
												{menu}
											</div>		
										</div>
										
										{if Phpfox::getLib('module')->getFullControllerName() == 'core.index-member'}										
										{menu_sub}
										{block location='1'}
										
										<a href="{url link='core.index-member.customize'}" class="no_ajax_link nb_customize_dash">{phrase var='core.customize_dashboard'}</a>
										
										{/if}								
															
										{/if}
										
									</div>	
									{/if}				
									{/if}
		
									<div id="main_content">
												
										{if !defined('PHPFOX_IS_USER_PROFILE') && !defined('PHPFOX_IS_PAGES_VIEW')}
										{breadcrumb}
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
												<h1><a href="{$aBreadCrumbTitle[1]}">{$aBreadCrumbTitle[0]|clean|split:30}</a></h1>
												{/if}
		
												<div id="content" {content_class}>
													
													{error}
													{block location='2'}
													{content}
													{block location='4'}
															
												</div>
		
												{if !$bUseFullSite}
												
												<div id="right" class="content_column">
													{if !Phpfox::isUser() || Phpfox::getLib('module')->getFullControllerName() == 'core.index-member' || defined('PHPFOX_IS_USER_PROFILE') || defined('PHPFOX_IS_PAGES_VIEW')}
													
													{else}
													{menu_sub}
													{block location='1'}
													{/if}						
													{unset var=$aMenu}	
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
								
								<div class="holder{if $bUseFullSite} nb_footer_full{else}{if defined('PHPFOX_IS_USER_PROFILE_INDEX') && Phpfox::getService('profile')->timeline()} js_is_profile_timeline{/if}{/if}">
									<div id="nb_footer">
									{menu_footer}					
									<div id="nb_copyright">
										{copyright}
									</div>				
									{block location='5'}
									</div>				
								</div>
							</div>							
						</div>			
					{if !PHPFOX_IS_AJAX_PAGE}
					</div>				
                                        
					{footer}		
				</div>		
			</div>		
		</div>		
	

</body>
</html>
{/if}