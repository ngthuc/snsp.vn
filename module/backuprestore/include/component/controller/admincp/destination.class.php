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

class Backuprestore_Component_Controller_Admincp_Destination extends Phpfox_Component
{
    
    public function process() {
        //Get POST values
        if ($this->request()->get('select_service')) {  
            $aVals = $this->request()->getArray('val');

            if (!isset($aVals['dropbox']) && !isset($aVals['gdrive']) && !isset($aVals['email']) && !isset($aVals['folder'])) {
                Phpfox_Error::set(Phpfox::getPhrase('backuprestore.service_select_message'));
            }
            if (isset($aVals['dropbox']) && $aVals['dropbox'] == 1) {
                $service['dropbox'] = 1;
            }

            if (isset($aVals['gdrive']) && $aVals['gdrive'] == 1) {
                $service['gdrive'] = 1;
            }
            
            if (isset($aVals['email']) && $aVals['email'] == 1 && $aVals['email_address'] != "") {
                $service['email'] = 1;
            }

            if (isset($aVals['folder']) && $aVals['folder'] == 1 && $aVals['server_folder'] != "") {
                $service['folder'] = 1;
            }
            
            //save server folder
             if(isset($aVals['server_folder']) && !empty($aVals['server_folder'])){
                 Phpfox::getService('backuprestore.services')->addServerFolder($aVals['server_folder']);
             }
             
             //save email address
             if(isset($aVals['email_address']) && !empty($aVals['email_address'])){
                 Phpfox::getService('backuprestore.services')->addUserEmail($aVals['email_address']);
             }
             
            if (Phpfox_Error::isPassed()) {
             
            //Save selected services
             if(Phpfox::getService('backuprestore.services')->addSelectedService($service)){
                // success message
                Phpfox::addMessage(Phpfox::getPhrase('backuprestore.changes_updated_successfully'));
             } 
            }    
        }
        
        //Saved Selected services from DB 
	if ($selected_service = Phpfox::getService('backuprestore.backuprestore')->getBTDBSettingByName('selected_services')) {
           $selected_service = unserialize(array_shift($selected_service));
        }
        else{
           Phpfox::getService('backuprestore.backuprestore')->addBTDBSetting('selected_services', '');
        }

	    $this->template()
                ->assign(array(
                    'selected_service' => $selected_service,
                    'aForms'=> Phpfox::getService('backuprestore.services')->getServicesForEdit()
                        )
        );

        $this->template()->setBreadcrumb(Phpfox::getPhrase('backuprestore.backup_destination'),
	        $this->url()->makeUrl('admincp.backuprestore.destination'))
                ->setHeader(array(
                    'btdbstyles.css' => 'module_backuprestore',
                    'scripts.js' => 'module_backuprestore',
        ));
    }         
        


}

?>