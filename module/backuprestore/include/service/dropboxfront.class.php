<?php

/**
 * [PHPFOX_HEADER]
 */
/**
 * @company		SocialEnginePRO
 * @author  		Inomjon Narmatov
 * @package  		Module_BackuptoCloud
 */
class Backuprestore_Service_Dropboxfront extends Phpfox_Service {

    private $app_key = '5gtfoebcl9zecai';
    private $app_secret = 'sgi4nlv2z938j0a';
    private $access_type = 'App folder';
    private $btdbsett=null;
    private $dropbox = null;
    private $tokens = null;
    private $oauth = null;
    private $account_info_cache = null;

    public function __construct() {
        
        require_once('module/backuprestore/Dropbox/API.php');
        require_once('module/backuprestore/Dropbox/OAuth/Consumer/ConsumerAbstract.class.php');
        require_once('module/backuprestore/Dropbox/OAuth/Consumer/Curl.class.php');
        
        $this->btdbsett = PhpFox::getService('backuprestore.backuprestore');
        
        if (!extension_loaded('curl')) {
            Phpfox_Error::set(Phpfox::getPhrase('testsearch.curl_not_loaded_message'));
        }
        $this->oauth = new Backuprestore_Dropbox_OAuth_Consumer_Curl($this->app_key, $this->app_secret);
        if($dbarray = $this->btdbsett->getBTDBSettingByName('dropbox_tokens')){
            $this->tokens = unserialize(array_shift($dbarray));    
        }
        //Convert array to stdClass for the new API
	if ($this->tokens && is_array($this->tokens['access'])) {
		$accessToken = new stdClass;
		$accessToken->oauth_token = $this->tokens['access']["token"];
		$accessToken->oauth_token_secret = $this->tokens['access']["token_secret"];
		$this->tokens['access'] = $accessToken;
		$this->tokens['state'] = 'access';
	}
        try {
            $this->init();
            //If we are in the access state and are still not authorized then unlink and re init
            if ($this->tokens['state'] == 'access' && !$this->is_authorized())
             { throw new Exception;} 
        } catch (Exception $e) {
            $this->unlink_account();
            $this->init();
        }
    }

    private function init() {
        //If we have not tokens then lets setup a new request
        if (!$this->tokens) {
            $this->tokens = array(
                'access' => false,
                'request' => $this->oauth->getRequestToken(),
                'state' => 'request',
            );

            $this->btdbsett->addBTDBSetting('dropbox_tokens', serialize($this->tokens));
            $this->oauth->setToken($this->tokens['request']);
        }
        //If there is no state then assume we have access
        if (!isset($this->tokens['state'])) {
            $this->tokens['state'] = 'access';
        }
        //Consume the set tokens
        if ($this->tokens['state'] == 'access') {
            $this->oauth->setToken($this->tokens['access']);
        } else if ($this->tokens['state'] == 'request') {
            $this->oauth->setToken($this->tokens['request']);
            //If we have not got an access token then we need to grab one
            try {
                $this->tokens['access'] = $this->oauth->getAccessToken();
                $this->tokens['state'] = 'access';
                $this->oauth->setToken($this->tokens['access']);
            } catch (Exception $e) {
                //Authorization failed so we are still pending
                $this->oauth->resetToken();
                $this->tokens['request'] = $this->oauth->getRequestToken();
                $this->tokens['state'] = 'request';
                $this->oauth->setToken($this->tokens['request']);
            }
            $this->save_tokens();
        }
        $this->dropbox = new API($this->oauth);
    }

    private function save_tokens() {
        $this->btdbsett->updateBTDBSetting('dropbox_tokens',serialize($this->tokens));  
    }

    public function is_authorized() {
        try {
            $this->get_account_info();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function get_account_info() {     
        if (!isset($this->account_info_cache)) {
            $response = $this->dropbox->accountInfo();
            $this->account_info_cache = $response['body'];
        }
        return $this->account_info_cache;
    }

    public function get_authorize_url() {
        return $this->oauth->getAuthoriseUrl();
    }
    
    public function unlink_account() {
       $this->tokens = false;
       $this->oauth->resetToken();
       $this->btdbsett->deleteBTDBSetting('dropbox_tokens');
       $this->init();
    }

    public function upload_file($path, $file) {
        try {
            return $this->dropbox->putFile($file, null, $path);
        } catch (Exception $e) {
            
        }

        throw $e;
    }
    
    public function is_authorized_FCron() {
        try {
            return $this->get_account_info();
        } catch (Exception $e) {
            
        }
        throw $e;
    }

	public function getDownloadFile($file){
		$outFile = false;
		try {
			// Download the file
			$file = $this->dropbox->getFile($file, $outFile);
			return $file;
		} catch (NotFoundException $e) {
			// The file wasn't found at the specified path/revision
			echo 'The file was not found at the specified path/revision';
		}

	}

	public function deleteFile($file){
		try {
			// Download the file
			if($this->dropbox->delete($file)){
				return $file;
			}else{
				return false;
			}
		} catch (NotFoundException $e) {
			return false;
		}

	}

}

?>