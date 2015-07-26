<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 25, 2015, 5:06 pm */ ?>
<li>
	<span class="holder_notify_count" id="js_total_new_notifications">0</span>
	<a href="#" title="<?php echo Phpfox::getPhrase('notification.notifications'); ?>" class="notification notify_drop_link" rel="notification.getAll"><?php echo Phpfox::getPhrase('notification.notifications'); ?></a>
	<div class="holder_notify_drop bb_holder_notify_drop_notification">
		<div class="bb_notify_drop_up_arrow bb_notify_drop_up_arrow_notification">
		</div>
                <div class="holder_notify_drop_content">
			<div class="holder_notify_drop_title"><?php echo Phpfox::getPhrase('notification.notifications'); ?></div>
			<div class="holder_notify_drop_data">
				<div class="holder_notify_drop_loader"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif')); ?></div>													
			</div>
		</div>											
	</div>
</li>
