<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 25, 2015, 5:06 pm */ ?>
<div class="<?php if ($this->_aVars['sPrivacyFormType'] == 'mini'): ?>privacy_setting_mini<?php else: ?>privacy_setting<?php endif; ?> privacy_setting_div">
	<div><input type="hidden" id="<?php echo $this->_aVars['sPrivacyFormName']; ?>" name="val<?php if (! empty ( $this->_aVars['sPrivacyArray'] )): ?>[<?php echo $this->_aVars['sPrivacyArray']; ?>]<?php endif; ?>[<?php echo $this->_aVars['sPrivacyFormName']; ?>]" value="<?php echo $this->_aVars['aSelectedPrivacyControl']['value']; ?>" /></div>
	<a href="#" class="privacy_setting_active<?php if ($this->_aVars['sPrivacyFormType'] == 'mini'): ?> js_hover_title<?php endif; ?>"><?php echo $this->_aVars['aSelectedPrivacyControl']['phrase']; ?><span class="js_hover_info"><?php echo $this->_aVars['aSelectedPrivacyControl']['phrase']; ?></span></a>
	<div class="privacy_setting_holder">
		<ul>
<?php if (count((array)$this->_aVars['aPrivacyControls'])):  $this->_aPhpfoxVars['iteration']['privacycontrol'] = 0;  foreach ((array) $this->_aVars['aPrivacyControls'] as $this->_aVars['aPrivacyControl']):  $this->_aPhpfoxVars['iteration']['privacycontrol']++; ?>

<?php if ($this->_aVars['aPrivacyControl']['value'] == 0): ?>
		     <li class="bb_first_privacy_setting"></li>
<?php endif; ?>
		<li><a href="#"<?php if (isset ( $this->_aVars['aPrivacyControl']['onclick'] )): ?> onclick="<?php echo $this->_aVars['aPrivacyControl']['onclick']; ?> return false;"<?php endif; ?> rel="<?php echo $this->_aVars['aPrivacyControl']['value']; ?>" <?php if (( isset ( $this->_aVars['aPrivacyControl']['is_active'] ) ) || ( isset ( $this->_aVars['bNoActive'] ) && $this->_aVars['bNoActive'] && $this->_aPhpfoxVars['iteration']['privacycontrol'] == 1 )): ?>class="is_active_image"<?php endif; ?>>
<?php if ($this->_aVars['aPrivacyControl']['value'] == 0): ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'layout/everyone.png','style' => "margin:0px 8px -1px 0px;")); ?>
<?php elseif ($this->_aVars['aPrivacyControl']['value'] == 1): ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'layout/friends.png','style' => "margin:0px 7px -1px 0px;")); ?>
<?php elseif ($this->_aVars['aPrivacyControl']['value'] == 2): ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'layout/friends_of_friends.png','style' => "margin:0px 6px -1px -1px;")); ?>
<?php elseif ($this->_aVars['aPrivacyControl']['value'] == 3): ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'layout/only_me.png','style' => "margin:0px 9px -1px 2px;")); ?>
<?php elseif ($this->_aVars['aPrivacyControl']['value'] == 4): ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'layout/custom.png','style' => "margin:0px 8px 0px 2px;")); ?>
<?php endif; ?>
<?php echo $this->_aVars['aPrivacyControl']['phrase']; ?></a></li>
<?php if ($this->_aVars['aPrivacyControl']['value'] == 4): ?>
		     <li class="bb_last_privacy_setting"></li>
<?php endif; ?>
<?php endforeach; endif; ?>
		</ul>
	</div>
</div>
<?php if (! empty ( $this->_aVars['sPrivacyFormInfo'] )): ?>
<div class="extra_info">
<?php echo $this->_aVars['sPrivacyFormInfo']; ?>
</div>
<?php endif; ?>
