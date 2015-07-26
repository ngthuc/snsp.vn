{if !empty($sStyleLogo)}
						<a href="{url link=''}" id="logo" onclick="window.location='{url link=''}'"><img src="{$sStyleLogo}" class="v_middle" /></a>
						{else}
						<a href="{url link=''}" id="logo" onclick="window.location='{url link=''}'">{param var='core.site_title'}</a>
						{/if}