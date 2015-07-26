<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * @company		SocialEnginePRO
 * @author  		Inomjon Narmatov
 * @package  		Module_BackuptoCloud
 */

class Backuprestore_Component_Block_Authorize extends Phpfox_Component
{
        private $authorized = null;
	/**
	 * Class process method wnich is used to execute this component.
	 */
    
	public function process()
	{            
        //DROPBOX
        $canCall=false;
        if(!$this->request()->get('db_authorize'))
        {
            $this->dropbox = PhpFox::getService('backuprestore.dropboxfront');
            $canCall=true;
        }
        
        $dbauthorize = array();
        if($canCall){
            $dbauthorize['Url'] = $this->dropbox->get_authorize_url();
            if($this->dropbox->is_authorized()){
                 //User Dropbox info
                 $dbaccount_info = $this->dropbox->get_account_info();
                 $dbaccount_details = array(
                     'account_owner' => $dbaccount_info->display_name,
                     'used_space' => round(($dbaccount_info->quota_info->quota - ($dbaccount_info->quota_info->normal + $dbaccount_info->quota_info->shared)) / 1073741824, 1),
                     'quota' => round($dbaccount_info->quota_info->quota / 1073741824, 1),
                 );
                 $dbaccount_details['used_percent'] = round(($dbaccount_details['used_space'] / $dbaccount_details['quota']) * 100, 0);
                 $this->authorized['dropbox'] = 1;
            }
            else{
                  if ($this->request()->get('continue')) {
                     if (!$this->dropbox->is_authorized()) {
                         $dbauthorize['error_not_authorized'] = 'yes';
                     }
                     $dbauthorize['submitbutton'] = 'Authorize';
                 }
            }   
        }
        
        //Request Authorize Dropbox Account
        if($this->request()->get('db_authorize'))
        {
             $dbauthorize['submitbutton'] = 'Continue';
        }
        
       //Google DRIVE 
       $gdrive = PhpFox::getService('backuprestore.googledrivefront');
       $tokens = $gdrive->getAccessTokens();
       
       //Check Google drive User Authorization
        if($gdrive->is_authorized()){
            //User Google Drive info
            try {
                if (isset($tokens)) {
                    $drive = $gdrive->buildService($tokens);
                    $gdrive_info = $gdrive->getAcountInfo($drive);
                    $this->authorized['gdrive'] = 1;
                }
            } catch (Exception $e) {
                throw $e;
            }  
        } 
        
        // Google Drive Authorize
        if ($this->request()->get('gd_authorize')) {
            if(!$gdrive->initClientKeys()){
                $this->url()->forward($this->url()->makeUrl('admincp.backuprestore.gdrivesett'),'In order to use Google Drive Service fill below requirements');
            }
            try{
                $gdrive->gdrive_auth_request();
            }
            catch(Exception $e){
                Phpfox::addMessage($e->getMessage());
            }
        }
          
           $this->template()->assign(array(
                    'dbauthorize'=>$dbauthorize,
                    'gdrive_info' => (!empty($gdrive_info) ? $gdrive_info : null),
                    'DBADetails' =>(!empty($dbaccount_details) ? $dbaccount_details : null),
                    'authorized' => $this->authorized
                    )
            );		
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('video.component_block_detail_clean')) ? eval($sPlugin) : false);
	}
}

?>