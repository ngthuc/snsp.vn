<div{if Phpfox::getService('profile')->timeline()} class="profile_timeline_header_holder"{/if}>
		<div class="profile_header{if Phpfox::getService('profile')->timeline()} profile_timeline_header{/if}{if (empty($aUser.cover_photo) && (!isset($aUser.cover_photo_id) || $aUser.cover_photo_id < 1)) || (!Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'profile.view_profile'))} no_cover_photo {/if}">

                        {if Phpfox::getService('profile')->timeline()}
                        {if Phpfox::getUserId()}
                        {else}
                        <div class="guest_cover guest_has_cover">

                        <div class="user_name">{$aUser.full_name}<br>{phrase var='core.is_on'} {phrase var='core.website_name'}.</div>

                        <div class="user_header">{phrase var='profile.to_connect_with'} {$aUser.full_name}, {phrase var='profile.sign_up_for'} {phrase var='core.website_name'} {phrase var='profile.today'}.</div>

                        <div class="add_green"><a class="guest_buttons" href="{url link='user.register'}">{phrase var='user.sign'}</a></div>

                        <div class="login_button"><a class="guest_buttons" href="{url link='user.login'}">{phrase var='user.login_button'}</a></div>
                        </div>
                        {/if}
                        
                        {module name='profile.pic'}
			{/if}

			{if isset($aUser.page_user_id) && isset($aUser.use_timeline) && $aUser.use_timeline}
				{*
				<div style="float:right;margin-right: 155px;">
					{if (isset($aUser.is_app) && $aUser.is_app ) || ( isset($aPage) && isset($aPage.is_admin) && !$aPage.is_admin)}
						<div id="section_menu">
							<ul>								
								{if isset($aPage) && $aPage.is_app}
									<li><a href="{permalink module='apps' id=$aPage.app_id title=$aPage.title}">{phrase var='pages.go_to_app'}</a></li>
								{/if}
								{if Phpfox::getUserParam('pages.can_add_new_pages') && isset($aPage) && !$aPage.is_admin}
									<li><a href="{url link='pages.add'}">{phrase var='pages.create_a_page'}</a></li>		
								{/if}	
								
							</ul>
						</div>
					{/if}
				</div>
				*}
			    {else}
				{if isset($aPage.title)}
					<h1>
                        <a href="{$aPage.link}">{$aPage.title}</a>
					</h1>
				{/if}
			{/if}
			<div class="profile_header_inner{if Phpfox::getService('profile')->timeline()} profile_header_timeline{/if}">
				<div id="section_menu" {if $bRefreshPhoto}style="display:none;"{else}{/if}>
					{if defined('PHPFOX_IS_USER_PROFILE_INDEX') || defined('PHPFOX_PROFILE_PRIVACY') || Phpfox::getLib('module')->getFullControllerName() == 'profile.info'}
					<ul>						
						{if Phpfox::getUserId() == $aUser.user_id}
						    {if Phpfox::getUserParam('profile.can_change_cover_photo')}
								<li>
									<a href="#" id="js_change_cover_photo" onclick="$('#cover_section_menu_drop').toggle(); return false;">{img theme='layout/change_cover.png' style="margin: 0px 5px -1px 0px;"}
										{if empty($aUser.cover_photo)}{phrase var='user.add_a_cover'}{else}{phrase var='user.change_cover'}{/if}
									</a>
									<div id="cover_section_menu_drop">
										<ul>
											<li><a href="{url link='profile.photo'}">{phrase var='user.choose_from_photos'}</a></li>
											<li><a href="#" onclick="$('#cover_section_menu_drop').hide(); $Core.box('profile.logo', 500); return false;">{phrase var='user.upload_photo'}</a></li>
											{if !empty($aUser.cover_photo)}
												<li><a href="{url link='profile' coverupdate='1'}">{phrase var='user.reposition'}</a></li>
												<li><a href="#" onclick="$('#cover_section_menu_drop').hide(); $.ajaxCall('user.removeLogo'); return false;">{phrase var='user.remove'}</a></li>
											{/if}
										</ul>
									</div>
								</li>
						    {/if}
							<li><a href="{url link='user.profile'}">{phrase var='profile.edit_profile'}</a></li>
							{if Phpfox::getUserParam('profile.can_custom_design_own_profile')}
								<li><a href="{url link='profile.designer'}" class="no_ajax_link">{phrase var='profile.design_profile'}</a></li>
							{/if}
						{else}
							{if Phpfox::isModule('mail') && Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'mail.send_message')}
								<li><a href="#" onclick="$Core.composeMessage({left_curly}user_id: {$aUser.user_id}{right_curly}); return false;">{phrase var='profile.send_message'}</a></li>
							{/if}
							{if Phpfox::isUser() && Phpfox::isModule('friend') && Phpfox::getUserParam('friend.can_add_friends') && !$aUser.is_friend && $aUser.is_friend_request !== 2}
								<li id="js_add_friend_on_profile"{if !$aUser.is_friend && $aUser.is_friend_request === 3} class="js_profile_online_friend_request"{/if}>
									<a href="#" onclick="return $Core.addAsFriend('{$aUser.user_id}');" title="{phrase var='profile.add_to_friends'}">{img theme='layout/friend_profile.png' style="margin: 0px 5px 0px 0px;"}
										{if !$aUser.is_friend && $aUser.is_friend_request === 3}{phrase var='profile.confirm_friend_request'}{else}{phrase var='profile.add_to_friends'}{/if}
									</a>
								</li>
							{/if}
							{if $bCanPoke && Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'poke.can_send_poke')}
								<li id="liPoke">
									<a href="#" id="section_poke" onclick="$Core.box('poke.poke', 400, 'user_id={$aUser.user_id}'); return false;">{phrase var='poke.poke' full_name=''}</a>
								</li>
							{/if}
							{plugin call='profile.template_block_menu_more'}
							{if (Phpfox::getUserParam('user.can_block_other_members') && isset($aUser.user_group_id) && Phpfox::getUserGroupParam('' . $aUser.user_group_id . '', 'user.can_be_blocked_by_others'))
								|| (isset($aUser.is_online) && $aUser.is_online && Phpfox::isModule('im') && Phpfox::getParam('im.enable_im_in_footer_bar') && $aUser.is_friend == 1)
								|| (Phpfox::getUserParam('user.can_feature'))
								|| (isset($bPassMenuMore))
								|| (Phpfox::getUserParam('core.can_gift_points'))
							}
							<li><a href="#" id="section_menu_more" class="js_hover_title"><span class="section_menu_more_image"></span><span class="js_hover_info">{phrase var='profile.more'}</span></a></li>
							{/if}
						{/if}
					</ul>					
					{elseif Phpfox::getLib('module')->getFullControllerName() == 'friend.profile'}
					    {if Phpfox::getUserId() == $aUser.user_id}
					    <ul>
						    <li><a href="{url link='friend'}">{phrase var='profile.edit_friends'}</a></li>
					    </ul>
					    {/if}
					{else}
					    <ul>
						    {foreach from=$aSubMenus key=iKey name=submenu item=aSubMenu}
						    <li>
								<a href="{url link=$aSubMenu.url)}" class="ajax_link">
								    {if substr($aSubMenu.url, -4) == '.add' || substr($aSubMenu.url, -7) == '.upload' || substr($aSubMenu.url, -8) == '.compose'}
										{img theme='layout/section_menu_add.png' class='v_middle'}
									{/if}
									{if isset($aSubMenu.text)}
										{$aSubMenu.text}
									{else}
										{phrase var=$aSubMenu.module'.'$aSubMenu.var_name}
									{/if}
								</a>
						    </li>
						    {/foreach}
							{if (isset($aUser.is_app) && $aUser.is_app ) || ( isset($aPage) && isset($aPage.is_admin) && !$aPage.is_admin)}
								{if isset($aPage) && $aPage.is_app}
									<li><a href="{permalink module='apps' id=$aPage.app_id title=$aPage.title}">{phrase var='pages.go_to_app'}</a></li>
								{/if}
								{if Phpfox::getUserParam('pages.can_add_new_pages') && isset($aPage) && !$aPage.is_admin}
									<li><a href="{url link='pages.add'}">{phrase var='pages.create_a_page'}</a></li>
								{/if}
							{/if}
					    </ul>
					{/if}
				</div>
				{if Phpfox::getUserBy('profile_page_id') <= 0}
				<div id="section_menu_drop">
					<ul>
						{if Phpfox::getUserParam('user.can_block_other_members') && isset($aUser.user_group_id) && Phpfox::getUserGroupParam('' . $aUser.user_group_id . '', 'user.can_be_blocked_by_others')}
							<li><a href="#?call=user.block&amp;height=120&amp;width=400&amp;user_id={$aUser.user_id}" class="inlinePopup js_block_this_user" title="{if $bIsBlocked}{phrase var='profile.unblock_this_user'}{else}{phrase var='profile.block_this_user'}{/if}">{if $bIsBlocked}{phrase var='profile.unblock_this_user'}{else}{phrase var='profile.block_this_user'}{/if}</a></li>
						{/if}
						{if isset($aUser.is_online) && $aUser.is_online && Phpfox::isModule('im') && Phpfox::getParam('im.enable_im_in_footer_bar') && $aUser.is_friend == 1}
							<li><a href="#" onclick="$.ajaxCall('im.chat', 'user_id={$aUser.user_id}'); return false;">{phrase var='profile.instant_chat'}</a></li>
						{/if}
						{if Phpfox::getUserParam('user.can_feature')}
							<li {if isset($aUser.is_featured) && !$aUser.is_featured} style="display:none;" {/if} class="user_unfeature_member">
								<a href="#" title="{phrase var='profile.un_feature_this_member'}" onclick="$(this).parent().hide(); $(this).parents('#section_menu_drop').find('.user_feature_member:first').show(); $.ajaxCall('user.feature', 'user_id={$aUser.user_id}&amp;feature=0&amp;type=1'); return false;">{phrase var='profile.unfeature'}</a></li>
							<li {if isset($aUser.is_featured) && $aUser.is_featured} style="display:none;" {/if} class="user_feature_member">
								<a href="#" title="{phrase var='profile.feature_this_member'}" onclick="$(this).parent().hide(); $(this).parents('#section_menu_drop').find('.user_unfeature_member:first').show(); $.ajaxCall('user.feature', 'user_id={$aUser.user_id}&amp;feature=1&amp;type=1'); return false;">{phrase var='profile.feature'}</a></li>
						{/if}
						{if Phpfox::getUserParam('core.can_gift_points')}
							<li>
								<a href="#?call=core.showGiftPoints&amp;height=120&amp;width=400&amp;user_id={$aUser.user_id}" class="inlinePopup js_gift_points" title="{phrase var='core.gift_points'}">
									{phrase var='core.gift_points'}
								</a>
							</li>
						{/if}
						{if Phpfox::isModule('friend') && Phpfox::getUserParam('friend.link_to_remove_friend_on_profile') && isset($aUser.is_friend) && $aUser.is_friend === true}
							<li>
								<a href="#" onclick="if (confirm('{phrase var='core.are_you_sure'}'))$.ajaxCall('friend.delete', 'friend_user_id={$aUser.user_id}&reload=1'); return false;">
									{phrase var='friend.remove_friend'}
								</a>
							</li>
						{/if}
						{plugin call='profile.template_block_menu'}
					</ul>
				</div>
				{/if}
				
				{if (isset($aUser.is_online) && $aUser.is_online != 0) || $aUser.is_friend === 2 || $aUser.is_friend === 3}
					<span class="profile_online_status">
						{if !$aUser.is_friend && $aUser.is_friend_request === 2}
							<span class="js_profile_online_friend_request">{phrase var='profile.pending_friend_confirmation'}{if $aUser.is_online} &middot; {/if}</span>
						{elseif !$aUser.is_friend && $aUser.is_friend_request === 3}
							<span class="js_profile_online_friend_request">{phrase var='profile.pending_friend_request'}{if $aUser.is_online} &middot; {/if}</span>
						{/if}
						{if $aUser.is_online && $aUser.user_id != Phpfox::getUserId()}
							({phrase var='profile.online'})
						{/if}
					</span>
				{/if}
				
				{if Phpfox::getUserId()}
				<h1 {if $bRefreshPhoto}style="display:none;"{else}style="width:{if isset($aPage)}{else}400px{/if};{/if}">
					{if isset($aUser.user_name)}
					    <a href="{if isset($aUser.link) && !empty($aUser.link)}{url link=$aUser.link}{else}{url link=$aUser.user_name}{/if}" title="{$aUser.full_name|clean}">
						    {$aUser.full_name|clean|split:30|shorten:50:'...'}
					    </a>
					{/if}					
                    
                    {foreach from=$aBreadCrumbs key=sLink item=sCrumb name=link}{if $phpfox.iteration.link == 1}<span class="profile_breadcrumb">&#187;</span><a href="{$sLink}">{$sCrumb}</a>{/if}{/foreach}
				</h1>
				{else}
                                <div class="guest_name">{$aUser.full_name|clean|split:30|shorten:50:'...'}</div>
                                {/if}
				{if Phpfox::getUserId()}
				<h1 {if $bRefreshPhoto}style="display:none;"{else}style="width:{if isset($aPage)}{else}400px{/if};{/if}">
				<div class="profile_info">
					{if Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'profile.view_location') && (!empty($aUser.city_location) || !empty($aUser.country_child_id) || !empty($aUser.location))}
						{phrase var='profile.lives_in'} {if !empty($aUser.city_location)}{$aUser.city_location}{/if}
						{if !empty($aUser.city_location) && (!empty($aUser.country_child_id) || !empty($aUser.location))},{/if}
						{if !empty($aUser.country_child_id)}&nbsp;{$aUser.country_child_id|location_child}{/if} {if !empty($aUser.location)}{$aUser.location}{/if} &middot;
					{/if}
					{if isset($aUser.birthdate_display) && is_array($aUser.birthdate_display) && count($aUser.birthdate_display)}
						{foreach from=$aUser.birthdate_display key=sAgeType item=sBirthDisplay}
							{if $aUser.dob_setting == '2'}
								{phrase var='profile.age_years_old' age=$sBirthDisplay}
							{else}
								{phrase var='profile.born_on_birthday' birthday=$sBirthDisplay}
							{/if}
						{/foreach}
					{/if}
					{if Phpfox::getParam('user.enable_relationship_status') && isset($sRelationship) && $sRelationship != ''}&middot; {$sRelationship} {/if}
					
					{if isset($aUser.category_name)}{$aUser.category_name|convert}{/if}
				</div>
                            {/if}
		      </div>
		</div>
		{if Phpfox::getService('profile')->timeline() && (isset($aUser.page_id) || Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'profile.view_profile'))	}
			{if Phpfox::getUserId()}
                        <div class="navigate_menu" {if $bRefreshPhoto}style="display:none;"{else}{/if}>

                        <ul id="timeline_menu">
                        <li class="active"><a href="{if isset($aPage.title)}{$aPage.link}{else}{url link=$aUser.user_name}{/if}">{phrase var='user.timeline'}</a></li>
                        <li><a href="{if isset($aPage.title)}{$aPage.link}info{else}{url link=$aUser.user_name}info{/if}">{phrase var='core.menu_about'}</a></li>
                        <li><a href="{if isset($aPage.title)}{$aPage.link}photo{else}{url link=$aUser.user_name}photo{/if}"><span>{phrase var='user.photos'}</span><c class="text">{$aUser.total_photo|number_format}</c></a></li>
                        {if isset($aPage.title)}{else}<li><a href="{url link=$aUser.user_name}friend"><span>{phrase var='profile.friends'}</span><c class="text">{$aUser.total_friend|number_format}</c></a></li>{/if}

                        <li><a>{phrase var='profile.more'}<i class="profile_menu_more"></i></a>
                        <ul id="timeline_sub_menu">
                        {if isset($aPage.title)}{else}
                        <li class="Drop"><a href="{url link=$aUser.user_name}listing">{phrase var='listing.listings'}</a></li>
                        {/if}
                        <li class="Drop"><a href="{if isset($aPage.title)}{$aPage.link}video{else}{url link=$aUser.user_name}video{/if}">{phrase var='video.videos'}</a></li>
                        <li class="Drop"><a href="{if isset($aPage.title)}{$aPage.link}music{else}{url link=$aUser.user_name}music{/if}">{phrase var='music.music'}</a></li>
                        <li class="Drop"><a href="{if isset($aPage.title)}{$aPage.link}event{else}{url link=$aUser.user_name}event{/if}" {if isset($aPage.title)} class="DropLast"{else}{/if}>{phrase var='event.events'}</a></li>
{if isset($aPage.title)}{else}
                        <li class="Drop"><a href="{url link=$aUser.user_name}pages">{phrase var='pages.pages'}</a></li>
                        <li class="Drop"><a href="{url link=$aUser.user_name}poll">{phrase var='poll.polls'}</a></li>
                        {/if}
                        </ul>
                            </li>
                                </ul>
				<div class="clear"></div>
                                </div>
                           {else}{/if}
			</div>
		        {/if}
	
                        {block location='12'}

                        {if Phpfox::isUser() && Phpfox::isModule('friend') && Phpfox::getUserParam('friend.can_add_friends') && !$aUser.is_friend && $aUser.is_friend_request !== 2}
                        {if !$aUser.is_friend && $aUser.is_friend_request === 3}{else}
                        {if Phpfox::getService('profile')->timeline()}
                        {if Phpfox::getUserId() != $aUser.user_id}
                        {if Phpfox::getUserId() != $aUser.user_id && !$aUser.is_friend || $aUser.is_friend === 3}
                        {if !Phpfox::isUser()}{else}
                        <div class="timeline_holder_add_friend">
                        <div class="guead_one"><span class="add_friend_title">
                        {phrase var='user.do_you_know'} {$aUser.full_name|clean|split:30|shorten:50:'...'}?
                        </span></div>
                        <div class="guead_two">
                        <div class="add_friend_button">
                        <div class="friend_button">
			<li style="display:block;" id="js_add_friend_on_profile"{if !$aUser.is_friend && $aUser.is_friend_request === 3} class="js_profile_online_friend_request"{/if}>
			<a class="add_green friend" href="#" onclick="return $Core.addAsFriend('{$aUser.user_id}');" {if !$aUser.is_friend && $aUser.is_friend_request === 3}title="{phrase var='profile.confirm_friend_request'}"{else}title="{phrase var='profile.add_to_friends'}"{/if}>
			{if !$aUser.is_friend && $aUser.is_friend_request === 3}<i class="profile add_friend sticky_add_white"></i>{phrase var='profile.confirm_friend_request'}{else}<i class="profile add_friend sticky_add_white"></i>{phrase var='friend.add_friend'}{/if}
			</a>
			</li>
                        </div>
                        </div>
                        <div class="add_friend_contain">
                        <div class="add_friend_divider"></div>
                        <span class="add_friend_text">
                        {if Phpfox::getUserBy('gender') != $getGender = 1}{phrase var='friend.to_see_what_she_shares_with_friends'}{else}{phrase var='friend.to_see_what_she_shares_with_friends'}{/if},
			<a href="#?call=friend.request&amp;user_id={$aUser.user_id}&amp;width=420&amp;height=250" class="inlinePopup">{if $aUser.is_friend === 3}{phrase var='profile.confirm_the_friend_request'}{else}{phrase var='profile.send'} {if Phpfox::getUserBy('gender') != $getGender = 1}{phrase var='friend.send_her_a_friend_request'}{else}{phrase var='friend.send_her_a_friend_request'}{/if}{phrase var='profile.a_friend_request'}{/if}</a>.
                        </span>
                        <div class="footer_contain">

                        </div>
                        </div>
                        </div>
                        </div>
                        {/if}{/if}{/if}{/if}{/if}{/if}

                        {if Phpfox::getService('profile')->timeline()}
                        {if Phpfox::getUserId()}
                        <div class="timeline_main_menu">

                        <ul class="timeline_menu_username">	
                        <li class="timeline_capsule">{img user=$aUser suffix='_50_square' max_width=32 max_height=32 class="sticky_user_photo"}</li>
                        <span class="menu_button_group">
                        <li class="timeline_menu first"><a href="{if isset($aPage.title)}{$aPage.link}{else}{url link=$aUser.user_name}{/if}">{$aUser.full_name|clean|split:30|shorten:50:'...'}</a></li>
                        <li class="border_button_menu"><a href="{$sUserProfileUrl}photo">{phrase var='user.photos'}</a></li>
                        {if isset($aPage.title)}{else}
                        <li class="border_button_menu"><a href="{$sUserProfileUrl}friend">{phrase var='profile.friends'}</a></li>
                        {/if}
                        <li class="border_button_menu"><a href="{$sUserProfileUrl}video">{phrase var='video.videos'}</a></li>
                        <li class="timeline_menu last"><a href="{$sUserProfileUrl}music">{phrase var='profile.music'}</a></li>
                        </span>
                        </ul>
       			
                        {if Phpfox::isUser() && Phpfox::isModule('friend') && Phpfox::getUserParam('friend.can_add_friends') && !$aUser.is_friend && $aUser.is_friend_request !== 2}
                        {if Phpfox::getUserId() != $aUser.user_id && !$aUser.is_friend || $aUser.is_friend === 3}
                        <ul class="actions">
                        <span class="menu_button_group">
                        <li id="js_add_friend_on_profile" {if !$aUser.is_friend && $aUser.is_friend_request === 3} class="js_profile_online_friend_request"{/if} style="margin-left: 0px! important;"><a href="#?call=friend.request&amp;user_id={$aUser.user_id}&amp;width=420&amp;height=250" class="inlinePopup">{if !$aUser.is_friend && $aUser.is_friend_request === 3}<i class="profile add_friend sticky_add"></i>{phrase var='profile.confirm_friend_request'}{else}<i class="profile add_friend sticky_add"></i>{phrase var='friend.add_friend'}{/if}</a></li>
                        </span>
                             </ul>
                                {else}{/if}
                         {/if}

				<div class="clear"></div>
			</div>
		{/if}
         {/if}
	</div>