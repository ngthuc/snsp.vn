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

class Backuprestore_Component_Controller_Admincp_Gdrivesupp extends Phpfox_Component
{
    
    public function process() {
        
        
        $this->template()
                ->assign(array(
		        'redirect_url' =>$this->url()->makeUrl('admincp.backuprestore.gdrivesett')
                        )
        );

        $this->template()->setBreadcrumb(Phpfox::getPhrase('backuprestore.google_drive_support'), $this->url()->makeUrl('admincp.backuprestore.gdrivesupp'))
                ->setHeader(array(
                'btdbstyles.css' => 'module_backuprestore',
                'scripts.js' => 'module_backuprestore',
                )
        );
    }         
        


}

?>