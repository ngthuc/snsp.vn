{if isset($sTime)}
	<div>
	{phrase var='user.the_link_that_brought_you_here_is_not_valid_it_may_already_have_expired' time=$sTime}
	</div>
{/if}

{if !isset($sTime)}
	<div>
		{phrase var='user.this_site_is_very_concerned_about_security'}
	</div>
	<div>
		<input type="button" value="{phrase var='user.resend_verification_email'}" class="button" onclick="$.ajaxCall('user.verifySendEmail', 'iUser={$iVerifyUserId}'); return false;" />
	</div>
{/if}