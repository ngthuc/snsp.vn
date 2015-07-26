<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 25, 2015, 5:06 pm */ ?>
<?php if (Phpfox ::getUserBy('profile_page_id') > 0): ?>
									<ul>
										<li>
											<a href="#" class="has_drop_down"><?php echo Phpfox::getPhrase('pages.account'); ?></a>
											<ul>
											<div class="drop_down"></div>
												<li class="header_menu_user_link">
													<div id="header_menu_user_image">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aGlobalUser'],'suffix' => '_50_square','max_width' => 50,'max_height' => 50)); ?>
													</div>
													<div id="header_menu_user_profile">
<?php echo '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aGlobalUser']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aGlobalUser']['user_name'], ((empty($this->_aVars['aGlobalUser']['user_name']) && isset($this->_aVars['aGlobalUser']['profile_page_id'])) ? $this->_aVars['aGlobalUser']['profile_page_id'] : null))) . '"10>' . Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getService('user')->getCurrentName($this->_aVars['aGlobalUser']['user_id'], $this->_aVars['aGlobalUser']['full_name']), 20, '...') . '</a></span>'; ?>
													</div>
												</li>	
												<li class="header_menu_user_link_page">
													<a href="#" onclick="$.ajaxCall('pages.logBackIn'); return false;">
														<div class="page_profile_image">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aGlobalProfilePageLogin'],'suffix' => '_50_square','max_width' => 32,'max_height' => 32,'no_link' => true)); ?>
														</div>
														<div class="page_profile_user">
<?php echo Phpfox::getPhrase('core.log_back_in_as_global_full_name', array('global_full_name' => Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aGlobalProfilePageLogin']['full_name']))); ?>
														</div>
													</a>
												</li>
												<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('pages.add', array('id' => $this->_aVars['iGlobalProfilePageId'])); ?>"><?php echo Phpfox::getPhrase('core.edit_page'); ?></a></li>
											</ul>
										</li>										
									</ul>
<?php else: ?>
									<ul>
									<li class="image_user" style="height: 32px;"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aGlobalUser'],'suffix' => '_50_square','max_width' => 30,'max_height' => 30)); ?>
                                                                        <div id="bammer"><?php echo Phpfox::getLib('phpfox.parse.output')->shorten('<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aGlobalUser']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aGlobalUser']['user_name'], ((empty($this->_aVars['aGlobalUser']['user_name']) && isset($this->_aVars['aGlobalUser']['profile_page_id'])) ? $this->_aVars['aGlobalUser']['profile_page_id'] : null))) . '">' . Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getService('user')->getCurrentName($this->_aVars['aGlobalUser']['user_id'], $this->_aVars['aGlobalUser']['full_name']), Phpfox::getParam('user.maximum_length_for_full_name')) . '</a></span>', 16, ''); ?></div>
                                                                        </li>
                                                                        <li class="head_divider"></li>
                                                                        <li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl(''); ?>"><?php echo Phpfox::getPhrase('core.menu_home'); ?></a>
                                                                        <div id="activity_feed_updates_link_holder">
                                                                        <a href="#" id="activity_feed_updates_link_single" class="activity_feed_updates_link" onclick="return $Core.loadMoreFeeds();"><?php echo Phpfox::getPhrase('feed.1_new_update'); ?></a>
			                                                <a href="#" id="activity_feed_updates_link_plural" class="activity_feed_updates_link" onclick="return $Core.loadMoreFeeds();"><?php echo Phpfox::getPhrase('feed.span_id_js_new_update_view_span_new_updates'); ?></a>
			                                                </div>
									</li>
                                                                        <li class="head_divider"></li>
									<li class="head_divider_menu"></li>
<?php if (count((array)$this->_aVars['aRightMenus'])):  foreach ((array) $this->_aVars['aRightMenus'] as $this->_aVars['iKey'] => $this->_aVars['aMenu']): ?>
										<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl($this->_aVars['aMenu']['url']); ?>"<?php if (isset ( $this->_aVars['aMenu']['children'] ) && count ( $this->_aVars['aMenu']['children'] ) && is_array ( $this->_aVars['aMenu']['children'] )): ?> class="has_drop_down no_ajax_link"<?php endif; ?>><?php echo Phpfox::getPhrase($this->_aVars['aMenu']['module'].'.'.$this->_aVars['aMenu']['var_name']);  if (isset ( $this->_aVars['aMenu']['suffix'] )):  echo $this->_aVars['aMenu']['suffix'];  endif; ?> </a>
<?php if (isset ( $this->_aVars['aMenu']['children'] ) && count ( $this->_aVars['aMenu']['children'] ) && is_array ( $this->_aVars['aMenu']['children'] )): ?>
											<ul>
											<div class="drop_down"></div>
<?php if (Phpfox ::isUser() && $this->_aVars['aMenu']['url'] == 'user.setting'): ?>
												<li class="header_menu_user_link">													
													<div id="header_menu_user_image">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aGlobalUser'],'suffix' => '_50_square','max_width' => 50,'max_height' => 50)); ?>
													</div>
													<div id="header_menu_user_profile">
<?php echo '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aGlobalUser']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aGlobalUser']['user_name'], ((empty($this->_aVars['aGlobalUser']['user_name']) && isset($this->_aVars['aGlobalUser']['profile_page_id'])) ? $this->_aVars['aGlobalUser']['profile_page_id'] : null))) . '">' . Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getService('user')->getCurrentName($this->_aVars['aGlobalUser']['user_id'], $this->_aVars['aGlobalUser']['full_name']), 20, '...') . '</a></span>'; ?>
													</div>
												</li>
<?php if (Phpfox ::isModule('pages') && Phpfox ::getUserParam('pages.can_add_new_pages')): ?>
												<li><a href="#" onclick="$Core.box('pages.login', 400); return false;"><?php echo Phpfox::getPhrase('core.login_as_page'); ?></a></li>
<?php endif; ?>
<?php endif; ?>
<?php if (count((array)$this->_aVars['aMenu']['children'])):  $this->_aPhpfoxVars['iteration']['child_menu'] = 0;  foreach ((array) $this->_aVars['aMenu']['children'] as $this->_aVars['aChild']):  $this->_aPhpfoxVars['iteration']['child_menu']++; ?>

												<li<?php if ($this->_aPhpfoxVars['iteration']['child_menu'] == 1): ?> class="first"<?php endif; ?>><a <?php if ($this->_aVars['aChild']['url'] == 'pages.login'): ?>id="js_login_as_page"<?php endif; ?> href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl($this->_aVars['aChild']['url']); ?>"<?php if ($this->_aVars['aChild']['url'] == 'profile.designer' || $this->_aVars['aChild']['url'] == 'pages.login'): ?> class="no_ajax_link"<?php endif; ?>><?php echo Phpfox::getPhrase($this->_aVars['aChild']['module'].'.'.$this->_aVars['aChild']['var_name']); ?></a></li>
<?php endforeach; endif; ?>
<?php if (Phpfox ::getUserBy('fb_user_id') && Phpfox ::isUser() && $this->_aVars['aMenu']['url'] == 'user.setting'): ?>
													<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('facebook.unlink'); ?>"><?php echo Phpfox::getPhrase('facebook.unlink_facebook_account'); ?></a>
<?php endif; ?>
											</ul>
<?php endif; ?>
										</li>
<?php endforeach; endif; ?>
<?php unset($this->_aVars['aRightMenus'], $this->_aVars['aMenu']); ?>
									</ul>
<?php endif; ?>