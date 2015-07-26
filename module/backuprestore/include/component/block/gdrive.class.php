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

class Backuprestore_Component_Block_Gdrive extends Phpfox_Component
{
        private $authorized = null;
	/**
	 * Class process method wnich is used to execute this component.
	 */
    
	public function process()
	{            
        
        // Google Drive Authorize
        if ($this->request()->get('gd_authorize')) {
            if (!PhpFox::getService('backuprestore.googledrivefront')->initClientKeys()) {
                $this->url()->forward($this->url()->makeUrl('admincp.backuprestore.gdrivesett'), 'In order to use Google Drive Service fill below requirements');
            }
            try {
                PhpFox::getService('backuprestore.googledrivefront')->gdrive_auth_request();
            } catch (Exception $e) {
                Phpfox::addMessage($e->getMessage());
            }
        }
        
        // Google Drive Unauthorize
        if ($this->request()->get('gd_unauthorize')) {
            try{
                Phpfox::getService('backuprestore.googledrivefront')->gdrive_auth_revoke();
            }
            catch(Exception $re){
              
            }
        }
        
        $gdrive = PhpFox::getService('backuprestore.googledrivefront');
        $tokens = $gdrive->getAccessTokens();
        //Check Google drive User Authorization
        if ($gdrive->is_authorized()) {
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

        $this->template()->assign(array(
                    'gdrive_info' => (!empty($gdrive_info) ? $gdrive_info : null),
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