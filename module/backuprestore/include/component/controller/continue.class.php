<?php

/**
 * [PHPFOX_HEADER]
 */
defined('PHPFOX') or exit('NO DICE!');

/**
 * 
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Search
 * @version 		$Id: index.class.php 4489 2012-07-10 08:57:27Z Raymond_Benc $
 */
class Backuprestore_Component_Controller_Continue extends Phpfox_Component {

    private $is_authorized = null;

    /**
     * Class process method wnich is used to execute this component.
     */
    public function process() {
       
        //get last archived file
        error_reporting(E_ALL);
        if (!$zipath = Phpfox::getService('backuprestore.zip')->getLastZipDir()) {
            $err_txt = Phpfox::getPhrase('backuprestore.file_not_exist') . " " . str_replace("\\", "/", PHPFOX_DIR) . Phpfox::getParam('backuprestore.backup_dir') . " " . Phpfox::getPhrase('backuprestore.location');
            return Phpfox_Error::set($err_txt);
        }
        
        //user email address
        if ($email_addrss = Phpfox::getService('backuprestore.backuprestore')->getBTDBSettingByName('user_email')) {
            $email_addrss = $email_addrss['setting_value'];
        }
              
        $this->template()
                ->assign(array(
                   
                ));
    }
    
    public function sendAttachEmail($email,$filepath){
        $oParseInput = Phpfox::getLib('parse.input');
        $is_send = false;
        $aEmails = explode(',', $email);
        
	// Check file existence
        if (file_exists($filepath)) {
            $path_parts = pathinfo($filepath);
            if (extension_loaded('fileinfo')) {
                $finfo = finfo_open();
                $fileinfo = finfo_file($finfo, $filepath, FILEINFO_MIME);
                finfo_close($finfo);
            } else {
                $fileinfo = 'application/x-rar-compressed';
            }
           
            $fileatt_type = $fileinfo;
            $fileatt_name =$path_parts['basename']; 
            $file = fopen($filepath,'rb');
            $data = fread($file,filesize($filepath));
            $data = chunk_split(base64_encode($data));
            $semi_rand = md5(time());
            fclose($file);
        }
        
        foreach ($aEmails as $sEmail)
        {
                $sEmail = trim($sEmail);
                if (!Phpfox::getLib('mail')->checkEmail($sEmail))
                {
                        continue;
                }
                
                $email_subject = 'PhpFox Backup and Restore';
		$headers = "From: ".Phpfox::getUserBy('full_name')."<".Phpfox::getUserBy('email').">";
                $email_message = "Hi!\r\n</br>".$email_subject." finished backup process. \r\n Below is backup information and backup file .</br>";
                $email_message.="\r\ndfskjdfdjbsdfbsdfhs";
		$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
            
                $headers .= "\nMIME-Version: 1.0\n" .  
                        "Content-Type: multipart/mixed;\n" .  
                        " boundary=\"{$mime_boundary}\"";
			
            
                $email_message .= "This is a multi-part message in MIME format.\n\n" ."--{$mime_boundary}\n" ."Content-Type:text/html; charset=\"iso-8859-1\"\n" .  
                           "Content-Transfer-Encoding: 7bit\n\n" .  
                $email_message .= "\n\n";
                $email_message .= "--{$mime_boundary}\n" .  
                  "Content-Type: {$fileatt_type};\n" .  
                  " name=\"{$fileatt_name}\"\n" .  
                  //"Content-Disposition: attachment;\n" .  
                  //" filename=\"{$fileatt_name}\"\n" .  
                  "Content-Transfer-Encoding: base64\n\n" .  
                 $data .= "\n\n" .  
                  "--{$mime_boundary}--\n";                   

                $ok = @mail($sEmail, $email_subject, $email_message, $headers);
           
                if($ok){
                     $is_send = true;
                }        
        }
        
        if($is_send){
            return true;
        }
        return false;          
    }
    
 
}

?>