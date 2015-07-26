<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = array (
  1 => 
  array (
    'cron_id' => '1',
    'module_id' => 'log',
    'product_id' => 'phpfox',
    'next_run' => '1437911694',
    'last_run' => '1437908094',
    'type_id' => '2',
    'every' => '1',
    'is_active' => '1',
    'php_code' => 'Phpfox::getLib(\'phpfox.database\')->delete(Phpfox::getT(\'log_session\'), "last_activity < \'" . ((PHPFOX_TIME - (Phpfox::getParam(\'log.active_session\') * 60))) . "\'");
',
  ),
  2 => 
  array (
    'cron_id' => '2',
    'module_id' => 'mail',
    'product_id' => 'phpfox',
    'next_run' => '1440097244',
    'last_run' => '1437505244',
    'type_id' => '3',
    'every' => '30',
    'is_active' => '1',
    'php_code' => 'Phpfox::getService(\'mail.process\')->cronDeleteMessages();',
  ),
  3 => 
  array (
    'cron_id' => '3',
    'module_id' => 'shoutbox',
    'product_id' => 'phpfox',
    'next_run' => '1437939753',
    'last_run' => '1437853353',
    'type_id' => '3',
    'every' => '1',
    'is_active' => '1',
    'php_code' => 'Phpfox::getService(\'shoutbox.process\')->clear(Phpfox::getParam(\'shoutbox.shoutbox_total\'));
',
  ),
  4 => 
  array (
    'cron_id' => '4',
    'module_id' => 'subscribe',
    'product_id' => 'phpfox',
    'next_run' => '1437911694',
    'last_run' => '1437908094',
    'type_id' => '2',
    'every' => '1',
    'is_active' => '1',
    'php_code' => 'Phpfox::getService(\'subscribe.purchase.process\')->downgradeExpiredSubscribers();',
  ),
  5 => 
  array (
    'cron_id' => '5',
    'module_id' => 'backuprestore',
    'product_id' => 'Backup and Restore',
    'next_run' => '1438272655',
    'last_run' => '1437642588',
    'type_id' => '3',
    'every' => '7',
    'is_active' => '1',
    'php_code' => 'Phpfox::getService(\'backuprestore.process\')->backupCron();',
  ),
); ?>