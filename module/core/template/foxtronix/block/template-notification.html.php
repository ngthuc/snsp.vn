<ul>
	<li id="mac_logo_wrap">{logo}</li>
	{if Phpfox::isUser() && !Phpfox::getUserBy('profile_page_id')}
		{if Phpfox::getUserBy('profile_page_id') <= 0}
			{if Phpfox::isModule('friend')}
				{module name='friend.notify'}
			{/if}
			{if Phpfox::isModule('mail')}
				{module name='mail.notify'}
			{/if}
		{/if}
		{if Phpfox::isModule('notification')}
			{module name='notification.notify'}
		{/if}
	{/if}
</ul>