{if isset($aFilterMenus) && is_array($aFilterMenus) && count($aFilterMenus)}
						<div class="sub_section_menu block">	
							<div class="title">Submenu</div>
							<div class="content">
							<ul id="mac_submenu">
								{foreach from=$aFilterMenus name=filtermenu item=aFilterMenu}
									{if !isset($aFilterMenu.name)}
									<li class="menu_line">&nbsp;</li>
									{else}
									<li class="{if $aFilterMenu.active}active{/if}"><a href="{$aFilterMenu.link}">{$aFilterMenu.name}</a></li>
									{/if}
								{/foreach}
							</ul>
							</div>
						</div>
{/if}