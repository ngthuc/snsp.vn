{plugin call='core.template_block_template_menu_1'}
						{if Phpfox::getUserBy('profile_page_id') <= 0}
						<ul>	
							{plugin call='theme_template_core_menu_list'}	
							{if isset($bForceLogoOnMenu)}
							<li>{logo}</li>
							{/if}
							{if ($iMenuCnt = 0)}{/if}
							{foreach from=$aMainMenus key=iKey item=aMainMenu name=menu}
							{if !isset($aMainMenu.is_force_hidden)}
							{iterate int=$iMenuCnt} 							
							{/if}
								<li rel="menu{$aMainMenu.menu_id}" {if (isset($iTotalHide) && isset($iMenuCnt) && $iMenuCnt > $iTotalHide)} style="display:none;" {/if} {if (($aMainMenu.url == 'apps' && count($aInstalledApps)) || (isset($aMainMenu.children) && count($aMainMenu.children))) || (isset($aMainMenu.is_force_hidden))}class="{if isset($aMainMenu.is_force_hidden) && isset($iTotalHide)}is_force_hidden{else}explore{/if}{if ($aMainMenu.url == 'apps' && count($aInstalledApps))} explore_apps{/if}"{/if}>
								
								<a {if !isset($aMainMenu.no_link) || $aMainMenu.no_link != true}href="{url link=$aMainMenu.url}" {else} href="#" onclick="return false;" {/if} class="{if isset($aMainMenu.is_selected) && $aMainMenu.is_selected} menu_is_selected {/if}{if isset($aMainMenu.external) && $aMainMenu.external == true}no_ajax_link {/if}ajax_link">
									
									{if $aMainMenu.url == 'friend'}
									<i class="icon-group"></i>
									{elseif $aMainMenu.url == 'user.browse'}
									<i class="icon-group"></i>
									{elseif $aMainMenu.url == 'pages'}
									<i class="icon-star"></i>
									{elseif $aMainMenu.url == 'blog'}
									<i class="icon-comments"></i>
									{elseif $aMainMenu.url == 'photo'}
									<i class="icon-camera"></i>
									{elseif $aMainMenu.url == 'forum'}
									<i class="icon-bullhorn"></i>
									{elseif $aMainMenu.url == 'video'}
									<i class="icon-facetime-video"></i>
									{elseif $aMainMenu.url == 'quiz'}
									<i class="icon-question-sign"></i>
									{elseif $aMainMenu.url == 'event'}
									<i class="icon-calendar"></i>
									{elseif $aMainMenu.url == 'music'}
									<i class="icon-music"></i>
									{elseif $aMainMenu.url == 'marketplace'}
									<i class="icon-shopping-cart"></i>
									{elseif $aMainMenu.url == 'apps'}
									<i class="icon-beaker"></i>									
									{elseif $aMainMenu.url == 'poll'}
									<i class="icon-tasks"></i>
									{elseif $aMainMenu.url == ''}
									<i class="icon-home"></i>
									{else}
									<i class="icon-circle"></i>
									{/if}

									{phrase var=$aMainMenu.module'.'$aMainMenu.var_name}{if isset($aMainMenu.suffix)}{$aMainMenu.suffix}{/if}
								</a>	
									{if isset($aMainMenu.children) && count($aMainMenu.children)}
									<ul>
										{foreach from=$aMainMenu.children item=aChild name=child_menu}
										<li{if $phpfox.iteration.child_menu == 1} class="first"{/if}><a href="{url link=$aChild.url}">{phrase var=$aChild.module'.'$aChild.var_name}</a></li>
										{/foreach}
									</ul>
									{else}								
									{if !isset($bForceLogoOnMenu) && $aMainMenu.url == 'apps' && count($aInstalledApps)}
									<ul>
										{foreach from=$aInstalledApps item=aInstalledApp}
										<li><a href="{permalink module='apps' id=$aInstalledApp.app_id title=$aInstalledApp.app_title}" title="{$aInstalledApp.app_title|clean}">{img server_id=0 path='app.url_image' file=$aInstalledApp.image_path suffix='_square' max_width=16 max_height=16 title=$aInstalledApp.app_title class='v_middle'} {$aInstalledApp.app_title|clean|shorten:22:'...'}</a></li>
										{/foreach}
									</ul>
									{/if}
									{/if}
								</li>
							{/foreach}	
							{*unset var1=$aMainMenus var2=$aMainMenu*}
							
							{if !isset($bForceLogoOnMenu) && count($aAppMenus)}
							<li class="explore"><a href="#" onclick="return false;">{phrase var='core.explore'} {img theme='layout/header_menu_explore_drop.png' class='v_middle'}</a>
								<ul>
								{foreach from=$aAppMenus key=iAppKey item=aAppMenu name=app_menu}
									<li><a href="{url link=$aAppMenu.url}" class="ajax_link">{phrase var=$aAppMenu.module'.'$aAppMenu.var_name}</a></li>
								{/foreach}
								</ul>
							</li>
							{/if}
							{*unset var=$aAppMenus*}		
						</ul>
						{/if}		
						{if isset($iTotalHide) && isset($iMenuCnt) && $iMenuCnt > $iTotalHide}
						<a href="#" class="js_view_more_features js_view_more" rel="more">{phrase var='theme.view_more'}</a>
						<a href="#" class="js_view_more_features js_view_less" rel="less" style="display:none;">{phrase var='theme.view_less'}</a>
						{/if}		
						<a href="#" class="js_add_more_menus" style="display:none;">{phrase var='theme.add_more'}</a>
						<a href="#" class="js_done_edit_mode" style="display:none;">{phrase var='theme.done'}</a>