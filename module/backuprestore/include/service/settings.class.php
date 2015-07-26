<?php

defined('PHPFOX') or exit('NO DICE!');

/**
 * [PHPFOX_HEADER]
 */

/**
 * @company		SocialEnginePRO
 * @author  		Inomjon Narmatov
 * @package  		Module_Backuprestore
 */

class Backuprestore_Service_Settings extends Phpfox_Service {

    const HOUR_IN_SECONDS = 3600;
    const DAY_IN_SECONDS = 86400;
    const DAYS = 3;
    const WEEK_IN_DAYS = 7;
    const MONTH_IN_DAYS = 30;
    const MAX_HISTORY_ITEMS = 15;
    
    public function __construct() {
        $this->_sTable = Phpfox::getT('backuprestore');
    }
    
    public function getBackupSettings(){
        //Scheduled time values  
        if ($time = Phpfox::getService('backuprestore.backuprestore')->getBTDBSettingByName('backup_setting')) {
            $dbVal = unserialize(array_shift($time));
           // $gmt = Phpfox::getLib('date')->convertFromGmt($dbVal['backup_start_time'], $dbVal['backup_start_time_offset']); 
            $gmt = $dbVal['backup_start_time'];
            // Default sett values
            $iHour = date('H', $gmt);
            $iMinute = date('i', $gmt);
            
            //Next scheduled info
            $iDate = Phpfox::getTime('dmy', $gmt);
            $iHM = Phpfox::getTime(Phpfox::getParam('backuprestore.schedule_hour_min_format'), $gmt); 

            if ($iDate == Phpfox::getTime('dmy', time())) {
                $iDate = Phpfox::getPhrase('backuprestore.today');
            } elseif ($iDate == Phpfox::getTime('dmy', (time() + 86400))) {
                $iDate = Phpfox::getPhrase('backuprestore.tomorrow');
            } else {
                $iDate = Phpfox::getTime(Phpfox::getParam('backuprestore.tme_stamp'), $gmt);
            }
            
            $settings = array(
                'timefreq' => $dbVal['timefreq'],
                'hour' => $iHour,
                'minute' => $iMinute,
                'schedule_date' => $iDate,
                'schedule_HM' => $iHM,
                'save_backup'=>$dbVal['save_backup'],
                'auto_backup'=>$dbVal['auto_backup'],
                'send_email'=>$dbVal['send_email'],
                'sv_subfolder'=>(isset($dbVal['sv_subfolder'])? $dbVal['sv_subfolder']:''),    
            );
            
            return $settings;
        }
        return false;
    }
    
    //Save backup settings 
    public function saveBackupSettings($aVals){
        Phpfox::getService('ban')->checkAutomaticBan($aVals);        
        $currenttime = PHPFOX_TIME; //+(6*60*60)
        $month = date('n', $currenttime);
        $day = date('j', $currenttime);
        $year = date('Y', $currenttime);

        $iStartTime = Phpfox::getLib('date')->mktime($aVals['hour'], $aVals['minute'], 0, $month, $day, $year);
        $iCron = array();

        switch ($aVals['timefreq']) {
            case 'Each 6 hours':
                $aVals['start_time'] = $currenttime + 6*self::HOUR_IN_SECONDS; //start 1st backup after 6 hours and continue after each 6 hour 
                $iCron['type_id'] = 2;
                $iCron['every'] = 6;
                break;
            case 'Daily':
                // if setting time passed asume tumorrow in this time other way today
                if ($iStartTime < $currenttime) {
                    $aVals['start_time'] = $iStartTime + self::DAY_IN_SECONDS;
                } else {
                    $aVals['start_time'] = $iStartTime;
                }
                $iCron['type_id'] = 3;
                $iCron['every'] = 1;
                break;

            case 'Every 3 days':
                $aVals['start_time'] = $iStartTime + self::DAYS * self::DAY_IN_SECONDS;
                $iCron['type_id'] = 3;
                $iCron['every'] = 3;
                break;

            case 'Weakly':
                $aVals['start_time'] = $iStartTime + self::WEEK_IN_DAYS * self::DAY_IN_SECONDS;
                $iCron['type_id'] = 3;
                $iCron['every'] = 7;
                break;

            case 'Monthly':
                $aVals['start_time'] = $iStartTime + self::MONTH_IN_DAYS * self::DAY_IN_SECONDS;
                $iCron['type_id'] = 3;
                $iCron['every'] = 30;
                break;
            default :
                $aVals['start_time'] = $iStartTime + self::DAY_IN_SECONDS;
                $iCron['type_id'] = 3;
                $iCron['every'] = 1;
                break;
        }
        //$aVals['start_time'] = Phpfox::getLib('date')->convertToGmt($aVals['start_time']);
        //$gmtoffset = Phpfox::getLib('date')->getGmtOffset($aVals['start_time']);

        $aInsert = array(
            'timefreq' => $aVals['timefreq'],
            'hour' => $aVals['hour'],
            'minute' => $aVals['minute'],
            'backup_start_time' => $aVals['start_time'],
          //  'backup_start_time_offset'=>$gmtoffset,
            'save_backup'=>(isset($aVals['save_backup']) ? (int) $aVals['save_backup'] : 0),
            'auto_backup'=>(isset($aVals['auto_backup']) ? (int) $aVals['auto_backup'] : 0),
            'send_email'=>(isset($aVals['send_email']) ? (int) $aVals['send_email'] : 0),
            'sv_subfolder'=>(!empty($aVals['sv_subfolder'])? $aVals['sv_subfolder']: ''),
        );
         
        if (!empty($aInsert)) {
            //update cron values
            $iCron['is_active'] = $aInsert['auto_backup']; 
            $iCron['next_run'] = $aVals['start_time'];
            $this->setCronValues($iCron);
            
            //update/insert backup settings
            $savedset = Phpfox::getService('backuprestore.backuprestore')->getBTDBSettingByName('backup_setting');
            if (empty($savedset)) {
                $id = Phpfox::getService('backuprestore.backuprestore')->addBTDBSetting('backup_setting', serialize($aInsert));
                return $id; 
            }
            else {
                Phpfox::getService('backuprestore.backuprestore')->updateBTDBSetting('backup_setting', serialize($aInsert));
                return true;
            }
        }
    }
    
    public function setDefaultSettings()
    {
        $current_time=PHPFOX_TIME;
        
        $iHour = date('H', $current_time);
        $iMinute = date('i', $current_time);
        
        $aInsert_defaults = array(
            'timefreq' => 'Weakly',
            'hour' => $iHour,
            'minute' => $iMinute,
            'backup_start_time' => Phpfox::getTime() + 7*self::DAY_IN_SECONDS,
            'save_backup'=>0,
            'auto_backup'=>1,
            'send_email'=>1,
        );
        
        Phpfox::getService('backuprestore.backuprestore')->addBTDBSetting('backup_setting', serialize($aInsert_defaults)); 
        
        //update cron, every week after tomorrow
        $aCron = array(
            'type_id' => 3,
            'every' => 7,
            'is_active'=>(int)1,
            'next_run' => Phpfox::getTime() + 7*self::DAY_IN_SECONDS
        );
        
        $this->setCronValues($aCron);
    }
    
    public function setCronValues($iCron){
        //Update cron time
        $oDb = Phpfox::getLib('phpfox.database');
        $module_name = Phpfox::getLib('module')->getModuleName();
        $imoduleid = Phpfox::getLib('module')->getModuleId($module_name);

        $aCronEdit = $oDb
                ->select('*')
                ->from(Phpfox::getT('cron'))
                ->where('module_id = \'' . $imoduleid . '\'')
                ->execute('getSlaveRow');
        
        if (!empty($aCronEdit)) {
            $oDb->update(Phpfox::getT('cron'), $iCron, "cron_id = " . $aCronEdit['cron_id']);
        }
        
        //Recache Cron File
        Phpfox::getLib('cache')->remove(Phpfox::getParam('core.dir_cache') . 'cron.php', 'path');
    }
}

?>