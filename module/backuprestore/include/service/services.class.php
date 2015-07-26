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

class Backuprestore_Service_Services extends Phpfox_Service {
    private $btcsett = null;
    public function __construct() {
        $this->_sTable = Phpfox::getT('backuprestore');
        $this->btcsett = PhpFox::getService('backuprestore.backuprestore');
    }
    
    public function addSelectedService($service) {
        //$this->addServerFolder($aVals['server_folder']);
        if (!empty($service)) {
            if ($this->btcsett->getBTDBSettingByName('selected_services')) {
                return $this->btcsett->updateBTDBSetting('selected_services', serialize($service));
            } else {
                return $this->btcsett->addBTDBSetting('selected_services', serialize($service));
            }
            return false;
        }
    }
    
    public function getService(){
        if ($serveces = $this->btcsett->getBTDBSettingByName('selected_services')) {
            $serveces = unserialize(array_shift($serveces));
            return $serveces; 
        }
        return false;
    }
    
    public function addServerFolder($path){
      if (file_exists($path) && is_dir($path)) {
          $full_path = str_replace('\\', '/', realpath($path)); 
          $this->btcsett->saveSetting('server_folder',$full_path);
        } else {
            Phpfox_Error::set(Phpfox::getPhrase('backuprestore.path_not_exist'));
        }  
    }
    
    public function addUserEmail($email){
     if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->btcsett->saveSetting('user_email',$email);
        } else {
            Phpfox_Error::set(Phpfox::getPhrase('backuprestore.invalid_email_address'));
        }
    }
    
    public function getServicesForEdit(){
        //server folder if exist
        if ($server_folder = Phpfox::getService('backuprestore.backuprestore')->getBTDBSettingByName('server_folder')) {
            $server_folder = $server_folder['setting_value'];
        }
        
        //user email address
        if ($email_addrss = Phpfox::getService('backuprestore.backuprestore')->getBTDBSettingByName('user_email')) {
            $email_addrss = $email_addrss['setting_value'];
        }

        $service = array(
            'server_folder' => (!empty($server_folder) ? $server_folder : null),
            'email_address' => (!empty($email_addrss) ? $email_addrss : null)
        );
        return $service;
    }
}

?>