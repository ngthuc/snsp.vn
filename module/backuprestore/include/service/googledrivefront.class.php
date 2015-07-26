<?php

/**
 * [PHPFOX_HEADER]
 */
/**
 * @company		SocialEnginePRO
 * @author  		Inomjon Narmatov
 * @package  		Module_Backuprestore
 */
class Backuprestore_Service_Googledrivefront extends Phpfox_Service {

    private $ClientId = null;     //'1022044551983.apps.googleusercontent.com';
    private $ClientSecret = null; //'PNNcSi38AXL2Qmyo6EJEZhvZ';
   // private $dev_key = 'AIzaSyBs0uSzSL_TpcioHfisVRyMWCkNPoZrumo';
    private $redirect_url =null;  // 'http://localhost/phpfox2/index.php?do=/backuprestore/continue/';
    private $SCOPES = array(
        'https://www.googleapis.com/auth/drive',
        'https://www.googleapis.com/auth/userinfo.email',
        'https://www.googleapis.com/auth/userinfo.profile',
    );
    
    private $btdbsett = null;
    private $tokens = null;
    private $client = null;
    
    public function __construct() {
        require_once('module/backuprestore/Google/Google_Client.php');
        require_once('module/backuprestore/Google/contrib/Google_DriveService.php');
        require_once('module/backuprestore/Google/contrib/Google_Oauth2Service.php');
        
        $this->btdbsett = PhpFox::getService('backuprestore.backuprestore');
        if(!$this->initClientKeys()){
            return; // Phpfox::addMessage('Error');
        }
        
        $this->client = new Google_Client();
        $this->client->setApplicationName(Phpfox::getPhrase('backuprestore.phpfox_backup_into_cloud'));
        $this->client->setScopes($this->SCOPES);       
        try {
            $this->init();
            //If we are in the access state and are still not authorized then unlink and re init
            if (!$this->is_authorized()) {
                throw new Exception;
            }
        } catch (Exception $e) {
              //Phpfox::addMessage(Phpfox::getPhrase('backuprestore.google_drive_error_when_requesting_access_token')); //re authorize user
        }
    }

    private function init() {      
        //Retrive Google DRive saved tokens from DB
        if ($savedtokens = $this->btdbsett->getBTDBSettingByName('googledrive_tokens')) {
            $savedtokens = unserialize(array_shift($savedtokens));
        }
        
        //Get Access Token usin refresh token
        if(isset($savedtokens['refresh_token'])){
           $this->tokens['access_token'] = $this->access_token($savedtokens['refresh_token']);
        }
      }

    public function initClientKeys() {
        //Values for edit
        if ($gdkeys = $this->btdbsett->getBTDBSettingByName('gdclient_keys')) {
            $gdkeys = unserialize(array_shift($gdkeys));

            $this->ClientSecret = $gdkeys['gdrive_clientsecret'];

            if (preg_match('/apps.googleusercontent.com/i', $gdkeys['gdrive_clientid'], $matches)) {
                $this->ClientId = $gdkeys['gdrive_clientid'];
            }
            if (substr($gdkeys['gdrive_redURI'], 0, 7) == 'http://' || substr($gdkeys['gdrive_redURI'], 0, 8) == 'https://') {
                $this->redirect_url = $gdkeys['gdrive_redURI'];
            }
            return true;
        } else {
            return false;
        }
    }
    
    public function getGoogleClient(){
        return $this->client;
    }
    
    // Acquire single-use authorization code from Google OAuth 2.0
    public function gdrive_auth_request() {
            // First, revoke any existing token, since Google doesn't appear to like issuing new ones
            if ($this->btdbsett->getBTDBSettingByName('googledrive_tokens') != "") self::gdrive_auth_revoke();
            
            // We use 'force' here for the approval_prompt, not 'auto', as that deals better with messy situations where the user authenticated, then changed settings
            try{
                $params = array(
                        'response_type' => 'code',
                        'client_id' => $this->ClientId,
                        'redirect_uri' => $this->redirect_url,
                        'scope' => 'https://www.googleapis.com/auth/drive https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile',
                        'state' => 'token',
                        'access_type' => 'offline',
                        'approval_prompt' => 'force'
                );
                header('Location: https://accounts.google.com/o/oauth2/auth?'.http_build_query($params));                
            }catch(Exception $e){
                throw $e;
            }
    }
    
    // Revoke a Google account refresh token
    public function gdrive_auth_revoke() {
     $this->btdbsett->deleteBTDBSetting('googledrive_tokens');
       try
        {
           $this->client->revokeToken();
        }
        catch(Exception $e){
            throw $e;
        }
    }
    
    /**
     * Exchange an authorization code for OAuth 2.0 credentials.
     *
     * @param String $authorizationCode Authorization code to exchange for OAuth 2.0
     *                                  credentials.
     * @return String Json representation of the OAuth 2.0 credentials.
     * @throws CodeExchangeException An error occurred.
     */
    public function exchangeCode($authorizationCode) {
        try {
            $client = new Google_Client();
            $client->setClientId($this->ClientId);
            $client->setClientSecret($this->ClientSecret);
            $client->setRedirectUri($this->redirect_url);
            $client->setAccessType('offline');
            $client->setApprovalPrompt('force');
            $_GET['code'] = $authorizationCode;
            return $client->authenticate();
        } catch (Google_AuthException $e) {
            print 'An error occurred: ' . $e->getMessage();
            throw new CodeExchangeException(null);
        }
    }
    
    public function access_token($refresh_token){
       $params = array(
           'refresh_token' => $refresh_token, 
           'client_id' => $this->ClientId, 
           'client_secret' => $this->ClientSecret, 
           'grant_type' => 'refresh_token',
        );
       
        $mReturn = Phpfox::getLib('request')->send('https://accounts.google.com/o/oauth2/token',$params);  
        $result = json_decode($mReturn,true);
        
        if(isset($result['access_token'])) {
            $this->client->setAccessToken($mReturn);
                if($newtokens = $this->client->getAccessToken()){
                    $tekens = json_decode($newtokens,true);
                    $tekens['created']=  Phpfox::getTime();
                    $newtokens = json_encode($tekens);
                    $userinfo = $this->getUserInfo($newtokens);
                    if($userinfo)
                    {
                        return $newtokens;
                    }
                }           
        }
        else{
            Phpfox::addMessage(Phpfox::getPhrase('backuprestore.access_token_not_exist'));
        }
    }
          
    /**
     * Send a request to the UserInfo API to retrieve the user's information.
     *
     * @param String credentials OAuth 2.0 credentials to authorize the request.
     * @return Userinfo User's information.
     * @throws NoUserIdException An error occurred.
     */
    function getUserInfo($credentials) {
        $apiClient = new Google_Client();
        $apiClient->setUseObjects(true);
        $apiClient->setAccessToken($credentials);
        $userInfoService = new Google_Oauth2Service($apiClient);
        $userInfo = null;
        try {
            $userInfo = $userInfoService->userinfo->get();
        } catch (Google_Exception $e) {
            print 'An error occurred: ' . $e->getMessage();
        }
        if ($userInfo != null && $userInfo->getId() != null) {
            return $userInfo;
        } else {
            throw new NoUserIdException();
        }
    }
    
     /**
     * Retrieved stored credentials for the provided user ID.
     *
     * @param String $userId User's ID.
     * @return String Json representation of the OAuth 2.0 credentials.
     */
    function getStoredCredentials($userId) {
        // TODO: Implement this function to work with your database.
        if($savedtokens = $this->btdbsett->getBTDBSettingByName($userId)){
            $valuedb = array_shift($savedtokens);
            $acess_token = unserialize($valuedb); 
            return json_encode($acess_token);
        }
        throw new RuntimeException('Not implemented!');
    }
    
    /**
     * Store OAuth 2.0 credentials in the application's database.
     *
     * @param String $userId User's ID.
     * @param String $credentials Json representation of the OAuth 2.0 credentials to
      store.
     */
    function storeCredentials($userId, $credentials) {
        $value = json_decode($credentials,true);
        if($this->btdbsett->getBTDBSettingByName($userId)){
            return $this->btdbsett->updateBTDBSetting($userId, serialize($value));
        }
        else{
            return $this->btdbsett->addBTDBSetting($userId, serialize($value));
        }
        throw new RuntimeException('Not implemented!');
    }
    
    /**
     * Retrieve the authorization URL.
     *
     * @param String $emailAddress User's e-mail address.
     * @param String $state State for the authorization URL.
     * @return String Authorization URL to redirect the user to.
     */
    function getAuthorizationUrl($emailAddress, $state) {
        $client = new Google_Client();
        $client->setClientId($this->ClientId);
        $client->setRedirectUri($this->redirect_url);
        $client->setAccessType('offline');
        $client->setApprovalPrompt('force');
        $client->setState($state);
        $client->setScopes($this->SCOPES);
        $tmpUrl = parse_url($client->createAuthUrl());
        $query = explode('&', $tmpUrl['query']);
        $query[] = 'user_id=' . urlencode($emailAddress);
        return $tmpUrl['scheme'] . '://' . $tmpUrl['host'] . $tmpUrl['port'] . $tmpUrl['path'] . '?' . implode('&', $query);
    }
    
     /**
     * Build a Drive service object.
     *
     * @param String credentials Json representation of the OAuth 2.0 credentials.
     * @return Google_DriveService service object.
     */
    function buildService($credentials) {
        $apiClient = new Google_Client();
        $apiClient->setUseObjects(true);
        $apiClient->setAccessToken($credentials);
        return new Google_DriveService($apiClient);
    }
    
    //Get users Google Drive Quota Values
    public function getAcountInfo($service) {
        try {
            $about = $service->about->get();
            $free_quata = $about->getQuotaBytesTotal() - $about->getQuotaBytesUsed();
            $about_details = array(
                'account_owner' => $about->getName(),
                'used_space' => round($free_quata / 1073741824, 1),
                'quota' => round($about->getQuotaBytesTotal() / 1073741824, 1),
            );
            $about_details['used_percent'] = round(($free_quata / $about->getQuotaBytesTotal()) * 100, 0);
            return $about_details;
        } catch (apiAuthException $apie) {
            // Credentials have been revoked.
            // TODO: Redirect the user to the authorization URL.
            throw new RuntimeException('Not implemented!');
        } catch (apiException $e) {
            print "An error occurred: " . $e->getMessage();
        }
    }
    
    //Upload file to Google DRive
    public function file_upload($drive, $path) {
        try {
            // Check file existence
            if (file_exists($path)) {
                $path_parts = pathinfo($path);
                
                if (extension_loaded('fileinfo')) {
                    $finfo = finfo_open();
                    $fileinfo = finfo_file($finfo, $path, FILEINFO_MIME);
                    finfo_close($finfo);
                } else {
                    $fileinfo = 'application/x-rar-compressed';
                }
                
                $file = new Google_DriveFile();
                $file->setMimeType($fileinfo);
                $file->setTitle($path_parts['basename']);
	            if ($location = Phpfox::getService('backuprestore.backuprestore')->getBTDBSettingByName('backup_setting')) {
		            $setting_value = unserialize($location['setting_value']);
		            if ($setting_value['sv_subfolder']) {
			            $root = $setting_value['sv_subfolder'];
		            }
	            }else{
		            $root = '';
	            }
                if($fileid = $this->createFolder($drive,$root)){
                 $parentId = $fileid;
                }
                
//               // Set the parent folder.
                if ($parentId != null) {
                  $parent = new Google_ParentReference();
                  $parent->setId($parentId);
                  $file->setParents(array($parent));
                }
                
                //file_get_contents — Читает содержимое файла в строку
                $data = file_get_contents($path);
            }
            
            $createdFile = $drive->files->insert($file, array(
                'data' => $data,
                'mimeType' => $fileinfo
                    ));
            return $createdFile->id;
            
        } catch (Exception $e) {
           
        }
        throw $e;
    }
    
    public function createFolder($drive,$filename){
        try{
            $about = $drive->about->get();
           // print "Root folder ID: " . $about->getRootFolderId();
            if(!$this->is_folder_exist($drive,$about->getRootFolderId(),$filename)){
                $file = new Google_DriveFile();
                $file->setMimeType('application/vnd.google-apps.folder');
                $file->setTitle($filename);
                $createdFile = $drive->files->insert($file, array(
                        'mimeType' => 'application/vnd.google-apps.folder'
                            ));
            //    print "<br>Created folder ID: " . $createdFile->id;
                if(isset($createdFile->id) && !empty($createdFile->id))
                {
                    Phpfox::getService('backuprestore.backuprestore')->saveSetting('app_folder',$createdFile->id);
                }
                return $createdFile->id;             
            }
            else{
                if($folderid = Phpfox::getService('backuprestore.backuprestore')->getBTDBSettingByName('app_folder')){
           //         print "<br>  saved folder ID: " . $folderid['setting_value'];
                    return $folderid['setting_value']; 
                }
            }
        }catch(Exception $e){
            throw $e;
        }
        
    }
    public function is_folder_exist($service,$folderid,$filename){
      $pageToken = NULL;
      $files = array();
      do {
        try {
          $parameters = array();
          if ($pageToken) {
            $parameters['pageToken'] = $pageToken;
          }
          $children = $service->children->listChildren($folderid, $parameters);
          
          foreach ($children->getItems() as $child) {
            $file = $service->files->get($child->getId());
            $files[] = $file->getTitle();
          }
          $pageToken = $children->getNextPageToken();
        } catch (Exception $e) {
          print "An error occurred: " . $e->getMessage();
          $pageToken = NULL;
        }
      } while ($pageToken);
      return in_array($filename, $files);
    }
        
     /**
     * Print a file's metadata.
     *
     * @param apiDriveService $service Drive API service instance.
     * @param string $fileId ID of the file to print metadata for.
     */
    function printFile($service, $fileId) {
        try {
            $file = $service->files->get($fileId);
            print "Title: " . $file->getTitle();
            print "Description: " . $file->getDescription();
            print "MIME type: " . $file->getMimeType();
            } catch (apiAuthException $apie) {
            // Credentials have been revoked.
            // TODO: Redirect the user to the authorization URL.
            throw new RuntimeException('Not implemented!');
        } catch (apiException $e) {
            print "An error occurred: " . $e->getMessage();
        }
    }

	function getFile($service, $fileId){
		$file = $service->files->get($fileId);
		return $file;

	}

	function deleteFile($service, $fileId) {
		try {
			$service->files->delete($fileId);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	function downloadFile($file) {
		$downloadUrl = $file->getDownloadUrl();

		if ($downloadUrl) {
			$request = new Google_HttpRequest($downloadUrl, 'GET', null, null);
			$httpRequest = Google_Client::$io->authenticatedRequest($request);
			if ($httpRequest->getResponseHttpCode() == 200) {
				return $httpRequest->getResponseBody();
			} else {
				// An error occurred.
				return null;
			}
		} else {
			// The file doesn't have any content stored on Drive.
			return null;
		}
	}
    public function is_authorized(){
      try{
        $drive = $this->buildService($this->tokens['access_token']);
        $this->getAcountInfo($drive);
        return true;
      }
      catch(Exception $ex){
          //Phpfox::addMessage($ex->getMessage());
          return false;
      }
    }
    
    public function getAccessTokens(){
        return $this->tokens['access_token'];
    }
}

?>