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

class Backuprestore_Component_Controller_Admincp_Gdrivesett extends Phpfox_Component
{
    private $tokens = null;
    
    public function process() {
        
        $this->googledrive = PhpFox::getService('backuprestore.googledrivefront');
        $this->btdbsett = PhpFox::getService('backuprestore.backuprestore');
        //Clients deny for Application Register 
        if(isset($_GET['error']))
        {
            $this->url()->forward($this->url()->makeUrl('backuprestore.continue'),Phpfox::getPhrase('backuprestore.gd_auth_deny'));
        }
        
        //Get Access Tokens usung authorization code returnedfrom Google API
        if (isset($_GET['code'])) {
            try {
                $this->tokens['access_token'] = $this->googledrive->exchangeCode($_GET['code']);
                if (!empty($this->tokens['access_token'])) {
                    $this->btdbsett->addBTDBSetting('googledrive_tokens', serialize(json_decode($this->tokens['access_token'], true)));
                }
                
                //Redirct to main page
                $this->url()->forward($this->url()->makeUrl('admincp.backuprestore.destination'),Phpfox::getPhrase('backuprestore.gd_register_complete'));
                
            } catch (Exception $e) {
                $e->getMessage();
            }
        }
       
        //Insert GDrive client keys
        if ($aVals = $this->request()->getArray('val')) {
            if (empty($aVals['gdrive_clientid'])) {
                return Phpfox_Error::set(Phpfox::getPhrase('backuprestore.please_insert_your_application_client_id'));
            }

            if (empty($aVals['gdrive_clientsecret'])) {
                return Phpfox_Error::set(Phpfox::getPhrase('backuprestore.please_insert_your_application_client_secret_key'));
            }
            
            if (Phpfox_Error::isPassed()) {
                if ($gdrive = Phpfox::getService('backuprestore.process')->addGDriveKeys($aVals)) {
                  $this->url()->send('admincp.backuprestore.gdrivesett', null,Phpfox::getPhrase('backuprestore.changes_successfully_saved'));  
                }
            }
        }        
        
        //Values from DB for edit
        $gdkeys = Phpfox::getService('backuprestore.backuprestore')->getBTDBSettingByName('gdclient_keys');
        if(!empty($gdkeys)){
            $gdkeys = unserialize(array_shift($gdkeys));
            $this->template()->assign('aForms', $gdkeys);
        }
        $this->template()
                ->assign(array(
                  'redirect_url'=>'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],
                  'support_page' =>$this->url()->makeUrl('admincp.backuprestore.gdrivesupp')
                        )
        );

        $this->template()->setBreadcrumb(Phpfox::getPhrase('backuprestore.google_drive'), $this->url()->makeUrl('admincp.backuprestore.gdrivesett'))
                ->setHeader(array(
                'btdbstyles.css' => 'module_backuprestore',
                'scripts.js' => 'module_backuprestore',
                )
        );
    }         
        


}

?>