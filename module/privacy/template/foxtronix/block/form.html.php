<div class="{if $sPrivacyFormType == 'mini'}privacy_setting_mini{else}privacy_setting{/if} privacy_setting_div">
	<div><input type="hidden" id="{$sPrivacyFormName}" name="val{if !empty($sPrivacyArray)}[{$sPrivacyArray}]{/if}[{$sPrivacyFormName}]" value="{$aSelectedPrivacyControl.value}" /></div>
	<a href="#" class="privacy_setting_active{if $sPrivacyFormType == 'mini'} js_hover_title{/if}">{$aSelectedPrivacyControl.phrase}<span class="js_hover_info">{$aSelectedPrivacyControl.phrase}</span></a>
	<div class="privacy_setting_holder">
		<ul>
		{foreach from=$aPrivacyControls name=privacycontrol item=aPrivacyControl}
			{if $aPrivacyControl.value == 0} 
			<li class="mac_first_privacy_setting"></li>
			{/if}
			<li>
				<a href="#"{if isset($aPrivacyControl.onclick)} onclick="{$aPrivacyControl.onclick} return false;"{/if} rel="{$aPrivacyControl.value}" {if (isset($aPrivacyControl.is_active)) || (isset($bNoActive) && $bNoActive && $phpfox.iteration.privacycontrol == 1)}class="is_active_image"{/if}>
					{if $aPrivacyControl.value == 0}
					<i class="icon-globe"></i>
					{elseif $aPrivacyControl.value == 1}
					<i class="icon-group"></i>
					{elseif $aPrivacyControl.value == 2}
					<i class="icon-group"></i>
					{elseif $aPrivacyControl.value == 3}
					<i class="icon-user"></i>
					{elseif $aPrivacyControl.value == 4}
					<i class="icon-cog"></i>
					{/if}
					{$aPrivacyControl.phrase}
				</a>
			</li>
			{if $aPrivacyControl.value == 4}
			<li class="mac_last_privacy_setting"></li>
			{/if}
		{/foreach}
		</ul>
	</div>
</div>
{if !empty($sPrivacyFormInfo)}
<div class="extra_info">
	{$sPrivacyFormInfo}
</div>
{/if}