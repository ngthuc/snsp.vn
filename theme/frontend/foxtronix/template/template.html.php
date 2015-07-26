{if !PHPFOX_IS_AJAX_PAGE}
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="{$sLocaleDirection}" lang="{$sLocaleCode}">
	<head>
		<title>{title}</title>	
		{header}
	</head>
  {if Phpfox::getLib('module')->getFullControllerName()=='forum.post' || Phpfox::getLib('module')->getFullControllerName()=='feed.index' || Phpfox::getLib('module')->getFullControllerName()=='error.404' || Phpfox::getLib('module')->getFullControllerName()=='mail.thread'}
  {assign var='bUseFullSite' value=true}
  {/if}
	<body class="{if $bUseFullSite}mac_is_full_page {/if}{if Phpfox::getUserId()}mac_body_member{else}mac_body_guest{/if} mac_page_{$sFullControllerName}{if Phpfox::getUserBy('profile_page_id')} mac_is_page_pages_view{/if}{if defined('PHPFOX_IS_USER_PROFILE')} mac_is_user_profile{/if}{if defined('PHPFOX_IS_USER_PROFILE') && !Phpfox::getService('profile')->timeline()} mac_is_user_profile_no_timeline{else} mac_is_user_profile_yes_timeline{/if}{if defined('PHPFOX_IS_USER_PROFILE') && Phpfox::getService('profile')->timeline()} mac_profile_timeline{/if}{if !$bUseFullSite && !defined('PHPFOX_IN_DESIGN_MODE') && !Phpfox::getService('profile')->timeline() && !defined('PHPFOX_IS_USER_PROFILE') && !defined('PHPFOX_IS_PAGES_VIEW') && Phpfox::isUser()} mac_is_favorites_menu{/if}">
	
		{body}	
		{block location='9'}
				
		<div id="header">	
			<div class="holder">
				{block location='10'}
				
				<div id="header_holder" class="clearfix{if !Phpfox::isUser()} header_logo{/if}">		
				
					<div id="header_left">
						<div id="holder_notify">																	
							{notification}
						</div>
						{if Phpfox::isUser() && !Phpfox::getUserBy('profile_page_id') && Phpfox::isModule('search')}
						<form id="mac_nav_form" method="post" action="{url link='search'}">
							<div class="mac_nav_form_wrap">
								<div class="mac_nav_form_wrap_cover">
									<div class="mac_nav_form_wrap_inner">
										<span class="mac_search_input_wrap">
											<span>
												<input autocomplete="off" type="text" value="" placeholder="جستوجو..." name="q" id="q" maxlength="100" class="mac_search_input">
												<button title="Search for people, places and things" type="submit"></button>
											</span>
										</span>
									</div>
								</div>
							</div>
						</form>
						{/if}
					</div>
					<div id="header_right">

						<div id="header_menu_holder">
							{if Phpfox::isUser()}
								{menu_account}
								<div class="clear"></div>	
							{else}
								{module name='user.login-header'}
							{/if}	
						</div>	
					</div>
					{block location='6'}
				</div>
			</div>	
			
			<!-- header menu -->
			
			<div id="header_menu_page_holder">	
				<div class="holder">
					<div id="header_menu">				
<script> var menuJSItems = '{"villages":{"url":"villages\\/view_my","module":"villages","class":"vilages","phrase":"custom1.villages"},"fundraising":{"url":"fundraising","module":"fundraising","class":"fundraising","phrase":"fundraising.fundraising"},"pages":{"url":"pages\\/view_my","module":"pages","class":"pages","phrase":"custom1.pages"},"friend":{"url":"friend","module":"user","class":"user","phrase":"custom1.friends"},"event":{"url":"event","module":"event","class":"meetups","phrase":"custom1.meetups"},"ptvd":{"url":"#","module":"ptvd","class":"ptvd","phrase":"custom1.photo_video","sub":{"photo":{"url":"photo\\/view_my","phrase":"villages.photos"},"video":{"url":"video\\/view_my","phrase":"search.videos"}}},"arcade":{"url":"arcade","module":"arcade","class":"games","phrase":"custom1.games"},"marketplace":{"url":"marketplace","module":"marketplace","phrase":"custom1.s_shop","class":"shop"},"apps":{"url":"apps","module":"apps","phrase":"custom1.services","class":"serv"}}';</script>
<div id="sub_menu">
     
     <ul>
             <li name="villages">
             <a href="/" class="vilages_after">
                 <i class="icon_sub_menu vilages"></i>خانه</a>
             </li>
             <li name="fundraising">
             <a href="/index.php?do=/friend/" class="fundraising_after">
                 <i class="icon_sub_menu fundraising"></i>دوستان</a>
             </li>
             <li name="pages">
             <a href="/index.php?do=/user/browse/" class="pages_after">
                 <i class="icon_sub_menu pages"></i>کاربران</a>
             </li>
             <li name="friend">
             <a href="/index.php?do=/pages/" class="user_after">
                 <i class="icon_sub_menu user"></i>صفحات</a>
             </li>
             <li name="event">
             <a href="/index.php?do=/blog/" class="meetups_after">
                 <i class="icon_sub_menu meetups"></i>بلاگ ها</a>
             </li>
             
             <li name="arcade">
             <a href="/index.php?do=/forum/" class="games_after">
                 <i class="icon_sub_menu games"></i>انجمن</a>
             </li>
			 
			 <li name="Photos">
             <a href="/index.php?do=/photo/" class="games_after">
                 <i class="icon_sub_menu photos"></i>تصاویر</a>
             </li>
			 
			 <li name="Videos">
             <a href="/index.php?do=/video/" class="games_after">
                 <i class="icon_sub_menu videos"></i>ویدئو ها</a>
             </li>
			 
			 <li name="Music">
             <a href="/index.php?do=/music/ class="games_after">
                 <i class="icon_sub_menu music"></i>موزیک</a>
             </li>
			 
             <li name="marketplace">
             <a href="/index.php?do=/marketplace/" class="shop_after">
                 <i class="icon_sub_menu shop"></i>فروشگاه</a>
             </li>
             <li name="apps">
             <a href="/index.php?do=/apps/" class="serv_after">
                 <i class="icon_sub_menu serv"></i>برنامه ها</a>
             </li>
			 <li name="ptvd">
             <a href="#" class="ptvd_after">
                 <i class="icon_sub_menu ptvd"></i>دیگر</a>
                     <ul>
						<li class="sub-menu-item"><a href="/index.php?do=/poll/">نظرسنجی</a></li>
						<li class="sub-menu-item"><a href="/index.php?do=/quiz/">آرمون ها</a></li>
                        <li class="sub-menu-item"><a href="/index.php?do=/event/">رویداد ها</a></li>
                     </ul>
             </li>
			<!-- <li name="Quizzes">
             <a href="/index.php?do=/quiz/" class="serv_after">
                 <i class="icon_sub_menu serv"></i>Quizzes</a>
             </li>
			 <li name="events">
             <a href="/index.php?do=/event/" class="serv_after">
                 <i class="icon_sub_menu serv"></i>Events</a>
             </li> -->
     </ul>
</div>
<div id="get-balance">
    <div class="balance-name">
        <a href="#core.activity">موجودی من</a>
    </div>
    <div class="balance-view" id="js_global_total_activity_points">{$iTotalActivityPoints|number_format}</div>
</div>
		
						<div class="clear"></div>
					</div>		
				</div>			
			</div>
					
					<!-- header menu
			
				<div id="header_home_tronix">
					<a href="http://localhost/index.php?do=/">Home</a>
				</div>	
													
				<div id="header_home_tronix3">
					<a href="http://localhost/index.php?do=/forum/">Forum</a>
				</div>-->
		</div>
		
		
		<div id="{if Phpfox::isUser()}main_core_body_holder{else}main_core_body_holder_guest{/if}">
		
			{block location='11'}

			<div id="main_content_holder">
			{/if}
				<div {holder_name}>		
					<div {is_page_view} class="holder">	
						
						{module name='profile.logo'}
						
						<div id="content_holder">		
							{block location='13'}
							{block location='7'}				
							{if !defined('PHPFOX_IS_USER_PROFILE') && !defined('PHPFOX_IS_PAGES_VIEW') && Phpfox::getUserBy('profile_page_id') == 0}
							{breadcrumb}
							{block location='12'}
							{/if}

							{if !$bUseFullSite}		
								{if defined('PHPFOX_IN_DESIGN_MODE') && Phpfox::getService('profile')->timeline()}
								
								{else}			
									<div id="left">
									
										{if defined('PHPFOX_IS_USER_PROFILE') || defined('PHPFOX_IS_PAGES_VIEW') || !Phpfox::isUser()}
											{menu_sub}
											{block location='1'}																
										{else}
											<div id="nb_name">
												<div class="nb_name_image">
													{img user=$aGlobalUser suffix='_50_square' max_width=50 max_height=50}
												</div>
												<div class="nb_name_info">
													<a href="{url link='profile.my'}" class="nb_name_link">{$sCurrentUserName}</a>
													<div class="nb_name_edit">
														<a href="{url link='user.profile'}">{phrase var='theme.edit_profile'}</a>
													</div>
													
												</div>
												
												<div id="profileurl">
													<div class="user_profile_link"><a href="{$sUserProfileUrl}">URL</a><div class="profile_url"><input type="text" value="{url link=$aUser.user_name}"/></div></div>
												</div>
												
												<div class="welcome_quick_link">
														<ul>
														
															<li class="total_friend">
																<a href="#core.info">
																	<div>اطلاعات</div>
																	<span>اکانت</span>
																</a>
															</li>

															<li class="total_view">
																<a href="{url link='profile'}">
																	<div>مشاهدات</div>
																	<span>{$iTotalProfileViews|number_format}</span>
																</a>
															</li>
															
															<li class="total_point">
																<a href="#core.activity">
																	<div>امتیازات</div>
																	<span id="js_global_total_activity_points">فعالیت</span>
																</a>
																<!--{$iTotalActivityPoints|number_format}-->
															</li>
															
														</ul>
													<div class="clear"></div>
												</div>
											
												
											</div>
											
											<div style="margin-top:0px"> <div class="block" id="js_block_border_core_vertical-menu">
	<div class="content">
		

<div class="lcmenu">
<ul>


<div id='update' onclick='$("#updatesub").slideToggle(200)' style='cursor: pointer;'>
<img src="../theme/frontend/foxtronix/style/foxtronix/image/misc/menuplus.png" alt='' class='v_middle imgtitle'> <li><a class="ajax_link"> آپدیت </a></li></div>
<div id='updatesub' style='display:block; margin-bottom:10px; padding-bottom:10px; border-bottom:1px dashed #979798;'>
<div class='hrule100' style='clear:both'></div>
<li><a href="/" class="ajax_link">همه چیز</a></li></div>

<div onclick='$("#videosub").hide(200);$("#friendsub").hide(200);$("#pagessub").hide(200);$("#pollsub").hide(200);$("#appssub").hide(200)'>
<div id='photo' onclick='$("#photosub").slideToggle(200)' style='cursor: pointer;'>
<img src="../theme/frontend/foxtronix/style/foxtronix/image/misc/menuplus.png" alt='' class='v_middle imgtitle'> <li><a class="ajax_link"> تصاویر </a></li></div>
<div id='photosub' style='display:none; margin-bottom:10px; padding-bottom:10px; border-bottom:1px dashed #979798;'>
<div class='hrule100' style='clear:both'></div>
<li><a href="/index.php?do=/photo/add/" class="ajax_link"> اشتراک گذاری تصویر جدید</a></li>
<li><a href="/index.php?do=/photo/albums/view_myalbums/" class="ajax_link"> آلبوم تصاویر</a></li>
<li><a href="/index.php?do=/photo/albums/view_myalbums/" class="ajax_link"> تصاویر وال</a></li>
<li><a href="/index.php?do=/photo/view_my/" class="ajax_link"> تصاویر پروفایل</a></li>
<li><a href="/index.php?do=/photo/view_friend/" class="ajax_link"> تصاویر دوستان</a></li></div>
</div>

<div onclick='$("#photosub").hide(200);$("#friendsub").hide(200);$("#pagessub").hide(200);$("#pollsub").hide(200);$("#appssub").hide(200)'>
<div id='video' onclick='$("#videosub").slideToggle(200)' style='cursor: pointer;'>
<img src="../theme/frontend/foxtronix/style/foxtronix/image/misc/menuplus.png" alt='' class='v_middle imgtitle'> <li><a class="ajax_link"> ویدیوها</a></li></div>
<div id='videosub' style='display:none; margin-bottom:10px; padding-bottom:10px; border-bottom:1px dashed #979798;'>
<div class='hrule100' style='clear:both'></div>
<li><a href="/index.php?do=/video/add/" class="ajax_link"> اشتراک گداری ویدیو جدید</a></li>
<li><a href="/index.php?do=/video/view_my/" class="ajax_link"> ویدیو های من</a></li>
<li><a href="/index.php?do=/video/view_friend/" class="ajax_link"> ویدیوهای دوستان </a></li></div>
</div>

<!--
<div id='message' style='cursor: pointer;'> <li><a href="/index.php?do=/mail/compose/" class="ajax_link"> پیغام ها </a></li></div> 
-->

<div onclick='$("#photosub").hide(200);$("#videosub").hide(200);$("#friendsub").hide(200);$("#pollsub").hide(200);$("#appssub").hide(200)'>
<div id='pages' onclick='$("#pagessub").slideToggle(200)' style='cursor: pointer;'>
<img src="../theme/frontend/foxtronix/style/foxtronix/image/misc/menuplus.png" alt='' class='v_middle imgtitle'> <li><a class="ajax_link"> صفحات </a></li></div>
<div id='pagessub' style='display:none; margin-bottom:10px; padding-bottom:10px; border-bottom:1px dashed #979798;'>
<div class='hrule100' style='clear:both'></div>
<li><a href="/index.php?do=/pages/add/" class="ajax_link"> ساحتن صفحه ی جدید </a></li>
<li><a href="/index.php?do=/pages/view_my/" class="ajax_link"> صفحات من</a></li>
<li><a href="/index.php?do=/pages/view_friend/" class="ajax_link"> صفحات دوستان</a></li></div>
</div>


<div id='invite_friend' style='cursor: pointer;'> <li><a href="/index.php?do=/user/browse/" class="ajax_link"> مرور کاربران </a></li></div>

<div onclick='$("#photosub").hide(200);$("#videosub").hide(200);$("#pagessub").hide(200);$("#pollsub").hide(200);$("#appssub").hide(200)'>
<div id='friend' onclick='$("#friendsub").slideToggle(200)' style='cursor: pointer;'>
<img src="../theme/frontend/foxtronix/style/foxtronix/image/misc/menuplus.png" alt='' class='v_middle imgtitle'> <li><a class="ajax_link"> دوستان </a></li></div>
<div id='friendsub' style='display:none; margin-bottom:10px; padding-bottom:10px; border-bottom:1px dashed #979798;'>
<div class='hrule100' style='clear:both'></div>
<li><a href="/index.php?do=/friend/" class="ajax_link"> دوستان من</a></li>
<li><a href="/index.php?do=/#friend-add-list/" class="ajax_link"> ساحتن لیست دوستان</a></li>
<li><a href="/index.php?do=/friend/accept/" class="ajax_link"> ذرخواست های دوستان</a></li>
<li><a href="/index.php?do=/friend/pending/" class="ajax_link"> درخواست های در انتظار تایید دوستان </a></li></div>
</div>

<!--<div id='games' style='cursor: pointer;'> <li><a href="/arcade/" class="ajax_link"> بازی ها </a></li></div>-->

<div onclick='$("#photosub").hide(200);$("#videosub").hide(200);$("#pagessub").hide(200);$("#friendsub").hide(200);$("#appssub").hide(200)'>
<div id='poll' onclick='$("#pollsub").slideToggle(200)' style='cursor: pointer;'>
<img src="../theme/frontend/foxtronix/style/foxtronix/image/misc/menuplus.png" alt='' class='v_middle imgtitle'> <li><a class="ajax_link"> نظرسنجی </a></li></div>
<div id='pollsub' style='display:none; margin-bottom:10px; padding-bottom:10px; border-bottom:1px dashed #979798;'>
<div class='hrule100' style='clear:both'></div>
<li><a href="/index.php?do=/poll/add/" class="ajax_link"> اضافه کردن نظرسنجی</a></li>
<li><a href="/index.php?do=/poll/" class="ajax_link"> مشاهده ی نظرسنجی ها</a></li>
<li><a href="/index.php?do=/poll/view_my/" class="ajax_link"> نظرسنجی های من</a></li>
<li><a href="/index.php?do=/poll/view_friend/" class="ajax_link"> نظرسنجی دوستان</a></li></div>
</div>

<div id='privacy_sett' style='cursor: pointer;'> <li><a href="/index.php?do=/user/setting/" class="ajax_link"> تنظیمات حریم خصوصی </a></li></div>
<div id='account_sett' style='cursor: pointer;'> <li><a href="/index.php?do=/user/privacy/" class="ajax_link"> تنظیمات اکانت </a></li></div>


</ul>
</div>


		
		
	</div>
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

										{if !$bUseFullSite && (count($aBlocks3) || count($aAdBlocks3))}
											<div id="right">								
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
					</div>							
				</div>			
			{if !PHPFOX_IS_AJAX_PAGE}
			</div>		
			<div id="main_footer_holder">
				<div class="holder">
					<div id="footer">		
						{menu_footer}					
						<div class="clear"></div>
						<div id="copyright">
							{copyright}
						</div>
						{block location='5'}
					</div>				
				</div>			
			</div>		
			{footer}		
		</div>

	</body>
</html>
{/if}