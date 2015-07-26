<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * @company		SocialEnginePRO
 * @author  		Inomjon Narmatov
 * @package  		Module_Backupdropbox
 */

class Backuprestore_Component_Controller_Admincp_Setting extends Phpfox_Component
{
    
    public function process() {
        error_reporting(E_ALL);
        if($aVals = $this->request()->get('val')){

            if (!empty($aVals['sv_subfolder'])) {
                if (preg_match('/[^A-Za-z0-9-_.\/]/', $aVals['sv_subfolder'])) {
                    $invalid_character = 'The sub directory must only contain alphanumeric characters.';
                    return Phpfox_Error::set($invalid_character);
                }
            }
            if (Phpfox_Error::isPassed()) {
             //Save backup settings
             Phpfox::getService('backuprestore.settings')->saveBackupSettings($aVals); 
            }
        }
        
        // Default time values
        if (!$setting = Phpfox::getService('backuprestore.settings')->getBackupSettings()) {
            Phpfox::getService('backuprestore.settings')->setDefaultSettings();
        }
        
        //Time settings
        $hours = array();
        $minutes = array();
        for ($i = 0; $i <= 24; $i++) {
            $hours[$i] = $i;
        }
        for ($i = 0; $i <= 59; $i++) {
            $minutes[$i] = $i;
        }
        
        $this->template()
                ->assign(array(
                    'timefreqs' => array('Each 6 hours','Daily', 'Every 3 days', 'Weakly', 'Monthly'),
                    'hours' => $hours,
                    'minutes' => $minutes,
                    'aForms' => Phpfox::getService('backuprestore.settings')->getBackupSettings()
                        )
        );

        $this->template()->setBreadcrumb(Phpfox::getPhrase('backuprestore.backup_settings'), $this->url()->makeUrl('admincp.backuprestore.setting'))
                ->setHeader(array(
                    'btdbstyles.css' => 'module_backuprestore',
                    'scripts.js' => 'module_backuprestore',
                        )
        );
    }         
        


}

?>