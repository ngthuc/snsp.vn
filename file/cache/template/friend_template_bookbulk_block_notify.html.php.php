<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 25, 2015, 5:06 pm */ ?>
<li>	
	<span class="holder_notify_count" id="js_total_new_friend_requests">0</span>
	<a href="#" title="<?php echo Phpfox::getPhrase('friend.friend_requests'); ?>" class="friend_notification notify_drop_link" rel="friend.getRequests"><?php echo Phpfox::getPhrase('friend.friend_requests'); ?></a>
	<div class="holder_notify_drop bb_holder_notify_drop_friend">
		<div class="bb_notify_drop_up_arrow bb_notify_drop_up_arrow_friend">
		</div>
                <div class="holder_notify_drop_content">
			<div class="holder_notify_drop_title"><?php echo Phpfox::getPhrase('friend.friend_requests'); ?></div>
			<div class="holder_notify_drop_data">
				<div class="holder_notify_drop_loader"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif')); ?></div>													
			</div>
		</div>											
	</div>									
</li>
