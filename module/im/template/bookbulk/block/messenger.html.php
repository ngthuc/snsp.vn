<div id="js_footer_im_holder" class="im_holder js_footer_holder">
        <div class="im_apps_header" id="js_main_chat_apps_header">
        <div class="chat_your_apps">{phrase var='apps.your_apps'}</div><a href="{url link='apps' view='installed'}"><div class="chat_apps_more">{phrase var='pages.more'}</div></a>
                {module name='apps.menu'}
        </div>
        <div class="im_trailsystem_header" id="js_main_chat_trailsystem_header">
                {module name='trailsystem.trail'}
        </div>
	<div class="im_header" id="js_main_chat_header">
		{phrase var='im.chat'}		
	</div>
	<div style="overflow:auto; height:355px;" id="js_im_friend_list">
		{module name='im.list'}
	</div>
</div>