<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 25, 2015, 5:55 pm */ ?>
<?php 
/**
 * [NULLED BY DARKGOTH 2014]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: latest-admin-login.html.php 6189 2013-06-29 08:45:09Z Raymond_Benc $
 */
 
 

?>
<div class="table_header">
<?php echo Phpfox::getPhrase('admincp.admins'); ?>
</div>
<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo Phpfox::getPhrase('admincp.user'); ?></th>
		<th><?php echo Phpfox::getPhrase('admincp.ip_address'); ?></th>
		<th style="width:70px;" class="t_center"><?php echo Phpfox::getPhrase('admincp.attempt'); ?></th>
		<th><?php echo Phpfox::getPhrase('admincp.time_stamp'); ?></th>
	</tr>
<?php if (count((array)$this->_aVars['aUsers'])):  foreach ((array) $this->_aVars['aUsers'] as $this->_aVars['iKey'] => $this->_aVars['aUser']): ?>
	<tr class="checkRow<?php if (is_int ( $this->_aVars['iKey'] / 2 )): ?> tr<?php else:  endif; ?>">
		<td><?php echo '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aUser']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aUser']['user_name'], ((empty($this->_aVars['aUser']['user_name']) && isset($this->_aVars['aUser']['profile_page_id'])) ? $this->_aVars['aUser']['profile_page_id'] : null))) . '">' . Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getService('user')->getCurrentName($this->_aVars['aUser']['user_id'], $this->_aVars['aUser']['full_name']), Phpfox::getParam('user.maximum_length_for_full_name')) . '</a></span>'; ?></td>
		<td><?php echo $this->_aVars['aUser']['ip_address']; ?></td>
		<td class="t_center">
			<a href="#" title="<?php echo Phpfox::getPhrase('admincp.view_attempt'); ?>: <?php echo $this->_aVars['aUser']['attempt']; ?>" onclick="tb_show('<?php echo Phpfox::getPhrase('admincp.admincp_login_log', array('phpfox_squote' => true)); ?>', $.ajaxBox('core.admincp.viewAdminLogin', 'height=410&amp;width=600&amp;login_id=<?php echo $this->_aVars['aUser']['login_id']; ?>')); return false;">
<?php if ($this->_aVars['aUser']['is_failed']): ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/cross.png')); ?>
<?php else: ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/tick.png')); ?>
<?php endif; ?>
			</a>	
		</td>
		<td><?php echo Phpfox::getTime(Phpfox::getParam('core.extended_global_time_stamp'), $this->_aVars['aUser']['time_stamp']); ?></td>
	</tr>
<?php endforeach; endif; ?>
</table>
<?php if (!isset($this->_aVars['aPager'])): Phpfox::getLib('pager')->set(array('page' => Phpfox::getLib('request')->getInt('page'), 'size' => Phpfox::getLib('search')->getDisplay(), 'count' => Phpfox::getLib('search')->getCount())); endif;  $this->getLayout('pager'); ?>
