{if Phpfox::getService('profile')->timeline()}
    {if !empty($sProfileImage)}
	    <div class="profile_timeline_profile_photo">
		    <div class="profile_image">
			{if Phpfox::isModule('photo')}
				{if isset($aUser.user_name)}
				    <a href="{permalink module='photo.album.profile' id=$aUser.user_id title=$aUser.user_name}">{$sProfileImage}</a>
				{else}
				    <a href="{permalink module='photo.album.profile' id=$aUser.user_id}">{$sProfileImage}</a>
				{/if}
			{else}
				{$sProfileImage}
			{/if}
			{if Phpfox::getUserId() == $aUser.user_id}
			    <div class="p_4">
				    <a href="{if isset($aPage) && isset($aPage.page_id)}{url link='pages.add' id=$aPage.page_id}#photo{else}{url link='user.photo'}{/if}">{phrase var='profile.change_picture'}</a>
			    </div>
			{/if}	
		    </div>
	    </div>
    {/if}
{else}
{if !empty($sProfileImage)}
    <div class="profile_image">
	<div class="profile_image_holder">
	    {if Phpfox::isModule('photo')}
		{if isset($aUser.user_name)}
		    <a href="{permalink module='photo.album.profile' id=$aUser.user_id title=$aUser.user_name}">{$sProfileImage}</a>
		{else}
		    <a href="{permalink module='photo.album.profile' id=$aUser.user_id}">{$sProfileImage}</a>
		{/if}
	    {else}
		    {$sProfileImage}
	    {/if}
	</div>
	    {if Phpfox::getUserId() == $aUser.user_id}
	    <div class="p_4">
		    <a href="{url link='user.photo'}">{phrase var='profile.change_picture'}</a>
	    </div>
	    {/if}
    </div>
{/if}

<!--USER URL-->
<div id="profileurl">
<div class="user_profile_link"><a href="{$sUserProfileUrl}">URL</a><div class="profile_url"><input type="text" value="{url link=$aUser.user_name}"/></div></div>
</div>
<!--USER URL-->


	<!--bottun menu-->
	<div id="secmenu_nc" style=" {if defined('PHPFOX_IS_USER_PROFILE_INDEX')}width:197px;{else}width:197px;{/if} ">
		{if defined('PHPFOX_IS_USER_PROFILE_INDEX') || defined('PHPFOX_PROFILE_PRIVACY') || Phpfox::getLib('module')->getFullControllerName() == 'profile.info'}
		<ul>
			{if Phpfox::getUserId() == $aUser.user_id}
			{if Phpfox::getUserParam('profile.can_change_cover_photo')}
			<div onmouseover="$('#addcdropleft').show(); return false;" onmouseout="$('#addcdropleft').hide(); return false;">
			<li style="width:48%; text-align:center;"><a href="#" onmouseover="$('#addcdropleft').show(); return false;">{if empty($aUser.cover_photo)}{phrase var='user.add_a_cover'}{else}{phrase var='user.change_cover'}{/if}</a>
				<div id="addcdropleft">
				<div class="toparrowcvr"></div>
					<ul>
						<li><a href="{url link='profile.photo'}">{phrase var='user.choose_from_photos'}</a></li>
						<li><a href="#" onclick="$('#addcdropleft').hide(); $Core.box('profile.logo', 500); return false;">{phrase var='user.upload_photo'}</a></li>
						{if !empty($aUser.cover_photo)}
						<li><a href="{url link='profile' coverupdate='1'}">{phrase var='user.reposition'}</a></li>
						<li><a href="#" onclick="$('#addcdropleft').hide(); $.ajaxCall('user.removeLogo'); return false;">{phrase var='user.remove'}</a></li>
						{/if}
					</ul>
				</div>
			</li>
			</div>
			{else}<li style="width:48%; text-align:center;"><a href="{url link='user.privacy'}">Edit Privacy</a></li>{/if}
			<li style="{if Phpfox::getUserParam('profile.can_change_cover_photo')}width:48%;{else}width:48%;{/if} text-align:center;"><a href="{url link='user.profile'}">{phrase var='profile.edit_profile'}</a></li>
			{if Phpfox::getUserParam('profile.can_custom_design_own_profile')}
			
			{/if}
			{else}
				<!--{if Phpfox::isModule('mail') && Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'mail.send_message')}
				<li><a href="http://www.ejannat.com/gift/userid_{$aUser.user_id}/"><span style="background: transparent url(/images/button_gift.png) no-repeat left; padding-left: 15px; padding-top:1px; padding-bottom: 3px; padding-right: 0px;">{phrase var='gift.send_gift'}</span></a></li>
				{/if}-->
				{if Phpfox::isModule('friend') && (!$aUser.is_friend || $aUser.is_friend === 3)}
					<li style="width:50%;" id="js_add_friend_on_profile"{if $aUser.is_friend === 3} class="js_profile_online_friend_request"{/if}>
						<a href="#" onclick="return $Core.addAsFriend('{$aUser.user_id}');" title="{phrase var='profile.add_to_friends'}">
							{if $aUser.is_friend === 3}<span style="background: transparent url(/images/button_add_friend.png) no-repeat left; padding-left: 15px; padding-top:1px; padding-bottom: 3px; padding-right: 0px;">{if Phpfox::getLib('module')->getfullControllerName()=='profile.index'}{phrase var='profile.confirm_friend_request'}{else}Confirm{/if}</span>{else}<span style="background: transparent url(/images/button_add_friend.png) no-repeat left; padding-left: 15px; padding-top:1px; padding-bottom: 3px; padding-right: 0px;">{if Phpfox::getLib('module')->getfullControllerName()=='profile.index'}{phrase var='profile.add_to_friends'}{else} Friend{/if}</span>{/if}
						</a>
					</li>
				{else}
				
				{if $aUser.is_friend === 2}
				<li style="width:50%;" id="js_add_friend_on_profile"{if $aUser.is_friend === 2} class="js_profile_online_friend_request"{/if}>
						<a href="#" onclick="$('#friendunf').hide();" title="Request Sent">
							<span style="background: transparent url(/images/button_add_friend.png) no-repeat left; padding-left: 15px; padding-top:1px; padding-bottom: 3px; padding-right: 0px;">{if Phpfox::getLib('module')->getfullControllerName()=='profile.index'}Request Sent{else}Requested{/if}</span>
						</a>
				</li>
				{else}
				
				{if ($isFriend = "yes")}
				
					<div onmouseover="$('#friendunf').show(); return false;" onmouseout="$('#friendunf').hide(); return false;">
			<li style="width:49%; text-align:center;"><a href="#" onmouseover="$('#friendunf').show(); return false;"><span style="background: transparent url(/images/button_friends.png) no-repeat left; padding-left: 15px; padding-top:1px; padding-bottom: 3px; padding-right: 0px;">Friends</span></a>
				<div id="friendunf">
				<div class="toparrowfnf"></div>
					<ul>
						<li style="border-bottom:1px solid #BEBEBE;"><a href="#" onclick="$('#friendunf').hide(); $('#popup_box').show(); return false;" style="font-weight:bold;"><span style="background: transparent url(/images/button_remove_friend.png) no-repeat left; padding-left: 15px; padding-top:1px; padding-bottom: 3px; padding-right: 0px;">Unfriend</span></a></li>
						<li><a href="#" onclick="$('#friendunf').hide();">Add to List</a></li>
						
						<li><a href="#" onclick="$('#friendunf').hide(); $('#popup_box2').show(); return false;">Create New List</a></li>
						<li style="border-top:1px solid #e1e1e1; background:#f3f3f3;"><a href="/friend/" style="font-weight:bold;"><span style="background: transparent url(/images/allfriends.png) no-repeat left; padding-left: 16px; padding-top:1px; padding-bottom: 3px; padding-right: 0px;">All Friends</span></a></li>
						
					</ul>
				</div>
			</li>
			</div>{/if}
				{/if}
				{/if}
				
				{plugin call='profile.template_block_menu_more'}
				{if (Phpfox::getUserParam('user.can_block_other_members') && Phpfox::getUserGroupParam('' . $aUser.user_group_id . '', 'user.can_be_blocked_by_others'))
					|| (isset($aUser.is_online) && $aUser.is_online && Phpfox::isModule('im') && Phpfox::getParam('im.enable_im_in_footer_bar') && $aUser.is_friend == 1)
					|| (Phpfox::getUserParam('user.can_feature'))
					|| (isset($bPassMenuMore))
				}
			<div onmouseover="$('#section_menu_drop123').show(); return false;" onmouseout="$('#section_menu_drop123').hide(); return false;">
				<li style="width:45%;"><a href="#" onmouseover="$('#section_menu_drop123').show(); return false;"  id="section_menu_more" style="width:100%;" class="js_hover_title"><span class="section_menu_more_image" style="margin-left:33%;"></span><span class="js_hover_info">{phrase var='profile.more'}</span></a></li>
				
	
		<!--<div id="section_menu_drop123">
		<div class="sectoparrow"></div>
		<ul>
			{if Phpfox::getUserParam('user.can_block_other_members') && Phpfox::getUserGroupParam('' . $aUser.user_group_id . '', 'user.can_be_blocked_by_others')}		
			<li style="border-bottom:1px solid #BEBEBE;"><a href="#?call=user.block&amp;height=120&amp;width=400&amp;user_id={$aUser.user_id}" class="inlinePopup js_block_this_user" title="{if $bIsBlocked}{phrase var='profile.unblock_this_user'}{else}{phrase var='profile.block_this_user'}{/if}" style="font-weight:bold;"><span style="background: transparent url(/images/blockuser.png) no-repeat left; padding-left: 16px; padding-top:1px; padding-bottom: 3px; padding-right: 0px;">{if $bIsBlocked}{phrase var='profile.unblock_this_user'}{else}{phrase var='profile.block_this_user'}{/if}</span></a></li>
			{/if}
			{if isset($aUser.is_online) && $aUser.is_online && Phpfox::isModule('im') && Phpfox::getParam('im.enable_im_in_footer_bar') && $aUser.is_friend == 1}
			<li><a href="#" onclick="$.ajaxCall('im.chat', 'user_id={$aUser.user_id}'); console.log('im.chat from profile.template.block.header');return false;">{phrase var='profile.instant_chat'}</a></li>
			{/if}
			{if Phpfox::getUserParam('user.can_feature')}
			<li {if !$aUser.is_featured} style="display:none;" {/if} class="user_unfeature_member"><a href="#" title="{phrase var='profile.un_feature_this_member'}" onclick="$(this).parent().hide(); $(this).parents('#profile_nav_list:first').find('.user_feature_member:first').show(); $.ajaxCall('user.feature', 'user_id={$aUser.user_id}&amp;feature=0&amp;type=1'); return false;"><span style="background: transparent url(/images/unfeaturedm.png) no-repeat left; padding-left: 15px; padding-top:1px; padding-bottom: 3px; padding-right: 0px;">{phrase var='profile.unfeature'}</a></li>
			<li {if $aUser.is_featured} style="display:none;" {/if} class="user_feature_member"><a href="#" title="{phrase var='profile.feature_this_member'}" onclick="$(this).parent().hide(); $(this).parents('#profile_nav_list:first').find('.user_unfeature_member:first').show(); $.ajaxCall('user.feature', 'user_id={$aUser.user_id}&amp;feature=1&amp;type=1'); return false;"><span style="background: transparent url(/images/featuredm.png) no-repeat left; padding-left: 15px; padding-top:1px; padding-bottom: 3px; padding-right: 0px;">{phrase var='profile.feature'}</a></li>
			{/if}			
			{plugin call='profile.template_block_menu'}
		</ul>
	</div>
	</div>-->
				
				{else}<li style="width:46%; text-align:center;">
						<a href="#" id="section_poke" onclick="$Core.box('poke.poke', 400, 'user_id={$aUser.user_id}'); return false;"><span style="background: transparent url(/images/button_poke.png) no-repeat left; padding-left: 15px; padding-top:1px; padding-bottom: 3px; padding-right: 0px;">{phrase var='poke.poke' full_name=''}</span></a>
					</li>{/if}
				
				{if Phpfox::isModule('mail') && Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'mail.send_message')}
					<li style="width:100%; text-align:center; margin-bottom:15px;"><a href="#" onclick="$Core.composeMessage({left_curly}user_id: {$aUser.user_id}{right_curly}); return false;"><span style="background: transparent url(/images/button_msg.png) no-repeat left; padding-left: 15px; padding-top:0px; padding-bottom: 3px; padding-right: 0px;">{phrase var='profile.send_message'}</span></a></li>
				{/if}
				
				<!--{if $bCanPoke && Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'poke.can_send_poke')}
					<li id="liPoke">
						<a href="#" id="section_poke" onclick="$Core.box('poke.poke', 400, 'user_id={$aUser.user_id}'); return false;"><span style="background: transparent url(/images/button_poke.png) no-repeat left; padding-left: 15px; padding-top:1px; padding-bottom: 3px; padding-right: 0px;">{phrase var='poke.poke' full_name=''}</span></a>
					</li>
				{/if}-->
				
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
			<li><a href="{url link=$aSubMenu.url)}" class="ajax_link">{if substr($aSubMenu.url, -4) == '.add' || substr($aSubMenu.url, -7) == '.upload' || substr($aSubMenu.url, -8) == '.compose'}{img theme='layout/section_menu_add.png' class='v_middle'}{/if}{phrase var=$aSubMenu.module'.'$aSubMenu.var_name}</a></li>
			{/foreach}
		</ul>	
		{/if}
	</div>	
<!--bottum menu-->	



<div class="sub_section_menu"> 
	<ul>		                      
		{foreach from=$aProfileLinks item=aProfileLink}
			<li class="{if isset($aProfileLink.is_selected)} active{/if}">
      
				<a href="{url link=$aProfileLink.url}" class="ajax_link">
        
       {if strpos($aProfileLink.icon, 'video')!==false}
       <i class="icon-facetime-video"></i>
       {elseif strpos($aProfileLink.icon, 'comment')!==false}
       <i class="icon-comments"></i>
       {elseif strpos($aProfileLink.icon, 'application_view_list')!==false}
       <i class="icon-info-sign"></i>
       {elseif strpos($aProfileLink.icon, 'blog')!==false}
       <i class="icon-edit"></i>
       {elseif strpos($aProfileLink.icon, 'event')!==false}
       <i class="icon-calendar"></i>
       {elseif strpos($aProfileLink.icon, 'photo')!==false}
       <i class="icon-camera"></i>
       {elseif strpos($aProfileLink.icon, 'quiz')!==false}
       <i class="icon-question-sign"></i>
       {elseif strpos($aProfileLink.icon, 'group')!==false}
       <i class="icon-group"></i>
       {elseif strpos($aProfileLink.icon, 'poll')!==false}
       <i class="icon-tasks"></i>
       
       {elseif strpos($aProfileLink.icon, 'marketplace')!==false}
       <i class="icon-shopping-cart"></i>
       
       {elseif strpos($aProfileLink.icon, 'music')!==false}
       <i class="icon-music"></i>
	   {else}
	   
	   <i class="icon-circle"></i>
       {/if}
       
          {$aProfileLink.phrase}{if isset($aProfileLink.total)}<span>({$aProfileLink.total|number_format})</span>{/if}
        </a>
				{if isset($aProfileLink.sub_menu) && is_array($aProfileLink.sub_menu) && count($aProfileLink.sub_menu)}
				<ul>
				{foreach from=$aProfileLink.sub_menu item=aProfileLinkSub}
					<li class="{if isset($aProfileLinkSub.is_selected)} active{/if}"><a href="{$aProfileLinkSub.url}">{$aProfileLinkSub.phrase}{if isset($aProfileLinkSub.total) && $aProfileLinkSub.total > 0}<span class="pending">{$aProfileLinkSub.total|number_format}</span>{/if}</a></li>
				{/foreach}
				</ul>
				{/if}
			</li>
		{/foreach}
	</ul>
</div>
{/if}

    <div class="clear"></div>
    <div class="js_cache_check_on_content_block" style="display:none;"></div>
    <div class="js_cache_profile_id" style="display:none;">{$aUser.user_id}</div>
    <div class="js_cache_profile_user_name" style="display:none;">{if isset($aUser.user_name)}{$aUser.user_name}{/if}</div>