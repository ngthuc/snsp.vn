<div class="{if $sPrivacyFormType == 'mini'}privacy_setting_mini{else}privacy_setting{/if} privacy_setting_div">
	<div><input type="hidden" id="{$sPrivacyFormName}" name="val{if !empty($sPrivacyArray)}[{$sPrivacyArray}]{/if}[{$sPrivacyFormName}]" value="{$aSelectedPrivacyControl.value}" /></div>
	<a href="#" class="privacy_setting_active{if $sPrivacyFormType == 'mini'} js_hover_title{/if}">{$aSelectedPrivacyControl.phrase}<span class="js_hover_info">{$aSelectedPrivacyControl.phrase}</span></a>
	<div class="privacy_setting_holder">
		<ul>
		{foreach from=$aPrivacyControls name=privacycontrol item=aPrivacyControl}
		{if $aPrivacyControl.value == 0} 
		     <li class="bb_first_privacy_setting"></li>
		{/if}
		<li><a href="#"{if isset($aPrivacyControl.onclick)} onclick="{$aPrivacyControl.onclick} return false;"{/if} rel="{$aPrivacyControl.value}" {if (isset($aPrivacyControl.is_active)) || (isset($bNoActive) && $bNoActive && $phpfox.iteration.privacycontrol == 1)}class="is_active_image"{/if}>
		     {if $aPrivacyControl.value == 0}
		     {img theme='layout/everyone.png' style="margin:0px 8px -1px 0px;"}
		     {elseif $aPrivacyControl.value == 1}
		     {img theme='layout/friends.png' style="margin:0px 7px -1px 0px;"}
		     {elseif $aPrivacyControl.value == 2}
		     {img theme='layout/friends_of_friends.png' style="margin:0px 6px -1px -1px;"}
		     {elseif $aPrivacyControl.value == 3}
		     {img theme='layout/only_me.png' style="margin:0px 9px -1px 2px;"}
		     {elseif $aPrivacyControl.value == 4}
		     {img theme='layout/custom.png' style="margin:0px 8px 0px 2px;"}
		     {/if}
		     {$aPrivacyControl.phrase}</a></li>
		     {if $aPrivacyControl.value == 4}
		     <li class="bb_last_privacy_setting"></li>
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