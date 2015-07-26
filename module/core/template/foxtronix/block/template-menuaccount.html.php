{if Phpfox::getUserBy('profile_page_id') > 0}								
									<ul>
										<li id="mac_top_page_account_menu">
											<a href="#" class="has_drop_down"><i class="icon-cog"></i></a>
											<div id="mac_account_drop_down_box">
												<ul>
												<div class="mac_account_drop_up_arrow mac_account_drop_up_arrow_page"></div>
													<li class="header_menu_user_link">
														<div id="header_menu_user_image">
															{img user=$aGlobalUser suffix='_50_square' max_width=50 max_height=50}
														</div>
														<div id="header_menu_user_profile">
															{$aGlobalUser|user:'':10:20}
														</div>
													</li>		
													<li class="header_menu_user_link_page">
														<a href="#" onclick="$.ajaxCall('pages.logBackIn'); return false;">
															<div class="page_profile_image">
																{img user=$aGlobalProfilePageLogin suffix='_50_square' max_width=32 max_height=32 no_link=true}
															</div>
															<div class="page_profile_user">
																{phrase var='core.log_back_in_as_global_full_name' global_full_name=$aGlobalProfilePageLogin.full_name|clean}														
															</div>
														</a>
													</li>
													<li><a href="{url link='pages.add' id=$iGlobalProfilePageId}">{phrase var='core.edit_page'}</a></li>
												</ul>
											</div>
										</li>										
									</ul>
									{else}
									<ul>										
									{foreach from=$aRightMenus key=iKey item=aMenu}
									{if Phpfox::isUser() && $aMenu.url == 'profile.my'}
									<li id="mac_top_user_pic">
										<a href="{url link=$aMenu.url}">
											<img src="{img file=$aGlobalUser.user_image path='core.url_user' suffix='_50_square' return_url=true}" alt=""> 
											{$aGlobalUser.user_name}
										</a>
									</li>
									{elseif Phpfox::isUser() && $aMenu.url == 'user.setting'}
									<li>
										<a href="{url link='user.privacy'}">
											<i class="icon-lock"></i>
										</a>
									</li>
									<li>
									<a href="{url link=$aMenu.url}"{if isset($aMenu.children) && count($aMenu.children) && is_array($aMenu.children)} class="has_drop_down no_ajax_link"{/if}>
										<i class="icon-cog"></i>
									</a>
										{if isset($aMenu.children) && count($aMenu.children) && is_array($aMenu.children)}
										
										<div id="mac_account_drop_down_box">
										<ul>
										<div class="mac_account_drop_up_arrow"></div>
											{if Phpfox::isModule('pages') && Phpfox::getUserParam('pages.can_add_new_pages')}
											<li>
												<div class="mac_login_as_page_title">منوی امکانات:</div>
											</li><br/>
											<li>
												<!-- list of my pages -->
												{if count($aMacMyAdminPages)}
												<div id="mac_pages_list_scroll">
												{foreach from=$aMacMyAdminPages name=pages item=aMacMyAdminPage}
												<a class="mac_login_as_page_link" href="{$aMacMyAdminPage.link}" onclick="$.ajaxCall('pages.processLogin', 'page_id={$aMacMyAdminPage.page_id}', 'GET');return false;" title="{phrase var='pages.switch'}">
													<img src="{img user=$aMacMyAdminPage suffix='_50_square' return_url=true}" alt="{$aMacMyAdminPage.title|clean|split:20}" />
													{$aMyAdminPage.title|clean|split:20} 
												</a>
												{/foreach}
												</div>
												{else}
												<a href="#" onclick="$Core.box('pages.login', 400); return false;">
													{phrase var='core.login_as_page'}
												</a>
												
												{/if}
												{unset var=$aMacMyAdminPages}
												{unset var=$aMacMyAdminPage}
												<!-- //list of my pages -->
												{*
												<a href="#" onclick="$Core.box('pages.login', 400); return false;">
													{phrase var='core.login_as_page'}
												</a>
												*}
											</li>
											{/if}
											{foreach from=$aMenu.children item=aChild name=child_menu}
												<li{if $phpfox.iteration.child_menu == 1} class="first"{/if}>
													<a {if $aChild.url == 'pages.login'}id="js_login_as_page"{/if} href="{url link=$aChild.url}"{if $aChild.url == 'profile.designer' || $aChild.url == 'pages.login'} class="no_ajax_link"{/if}>
													{phrase var=$aChild.module'.'$aChild.var_name}
													</a>
												</li>
											{/foreach}
											{if Phpfox::getUserBy('fb_user_id') && Phpfox::isUser() && $aMenu.url == 'user.setting'}
											<li>
												<a href="{url link='facebook.unlink'}">
												{phrase var='facebook.unlink_facebook_account'}
												</a>
											</li>
											{/if}
										</ul>
										</div>
										{/if}
									</li>
									{else}
										<li><a href="{url link=$aMenu.url}"{if isset($aMenu.children) && count($aMenu.children) && is_array($aMenu.children)} class="has_drop_down no_ajax_link"{/if}>{phrase var=$aMenu.module'.'$aMenu.var_name}{if isset($aMenu.suffix)}{$aMenu.suffix}{/if} </a>					
											{if isset($aMenu.children) && count($aMenu.children) && is_array($aMenu.children)}
											<ul>
												{foreach from=$aMenu.children item=aChild name=child_menu}
												<li{if $phpfox.iteration.child_menu == 1} class="first"{/if}>
													<a {if $aChild.url == 'pages.login'}id="js_login_as_page"{/if} href="{url link=$aChild.url}"{if $aChild.url == 'profile.designer' || $aChild.url == 'pages.login'} class="no_ajax_link"{/if}>
														{phrase var=$aChild.module'.'$aChild.var_name}
													</a>
												</li>
												{/foreach}												
											</ul>
											{/if}
										</li>
									{/if}
									{/foreach}									
									{unset var=$aRightMenus var1=$aMenu}
									</ul>
									{/if}