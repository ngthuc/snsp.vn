<?php

/**
 * [PHPFOX_HEADER]
 */
/**
 * @company		SocialEnginePRO
 * @author  		Inomjon Narmatov
 * @package  		Module_Backuprestore
 */
class Backuprestore_Service_Googledriveauth extends Phpfox_Service {

    private $ClientId = '1022044551983.apps.googleusercontent.com';
    private $ClientSecret = 'PNNcSi38AXL2Qmyo6EJEZhvZ';
    private $dev_key = 'AIzaSyBs0uSzSL_TpcioHfisVRyMWCkNPoZrumo';
    private $redirect_url = 'http://localhost/phpfox2/index.php?do=/admincp/backuprestore/gdrivesett/';
    private $SCOPES = array(
            'https://www.googleapis.com/auth/drive',
            'https://www.googleapis.com/auth/userinfo.email',
            'https://www.googleapis.com/auth/userinfo.profile'
        );
    
    private $btdbsett=null;
    private $gdrive = null;
    private $tokens = null;
    private $oauth2 = null;
    private $client = null;
    protected $authorizationUrl;
    
    public function __construct() {
        require_once('module/backuprestore/Google/Google_Client.php');
        require_once('module/backuprestore/Google/contrib/Google_DriveService.php');
        require_once('module/backuprestore/Google/contrib/Google_Oauth2Service.php');
        
        $this->btdbsett = PhpFox::getService('backuprestore.backuprestore');
       
        $this->client = new Google_Client();
        $this->client->setApplicationName("PhpFox Backup");
        $this->client->setScopes($this->SCOPES);
        
        $this->client->setClientId($this->ClientId);
        $this->client->setClientSecret($this->ClientSecret);
        $this->client->setRedirectUri($this->redirect_url);  
        $this->client->setDeveloperKey($this->dev_key);
}

    private function init() {
         if (!$this->tokens) {
            $this->tokens = array(
                'access' => false,
                'access_token' => serialize(json_decode($this->client->getAccessToken())),
                'state' => 'request'
            );
            $this->btdbsett->addBTDBSetting('googledrive_tokens', serialize($this->tokens));
            $this->client->setAccessToken($this->tokens['access_token']);
        }
        $this->oauth2 = new Google_Oauth2Service($this->client);
        
        if (isset($this->tokens['access_token'])) {
            $this->client->setAccessType('offline');
            $this->client->setApprovalPrompt('force');
            $user = $this->oauth2->userinfo->get();
           
        }
       //  $this->dropbox = new API($this->oauth);
    }
    
    private function save_tokens() {
        $this->btdbsett->updateBTDBSetting('googledrive_tokens',serialize($this->tokens));  
    }
   ///////
      /**
     * Construct a GetCredentialsException.
     *
     * @param authorizationUrl The authorization URL to redirect the user to.
     */
    public function initauthorization($authorizationUrl) {
        $this->authorizationUrl = $authorizationUrl;
    }

    /**
     * @return the authorizationUrl.
     */
    public function getinitAuthorizationUrl() {
        return $this->authorizationUrl;
    }

    /**
     * Set the authorization URL.
     */
    public function setinitAuthorizationurl($authorizationUrl) {
        $this->authorizationUrl = $authorizationUrl;
    }
 /////////////////////////////////   
    /**
     * Retrieved stored credentials for the provided user ID.
     *
     * @param String $userId User's ID.
     * @return String Json representation of the OAuth 2.0 credentials.
     */
    function getStoredCredentials() {
        // TODO: Implement this function to work with your database.
        if($savedtokens = $this->btdbsett->getBTDBSettingByName('googledrive_tokens')){
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
     * Exchange an authorization code for OAuth 2.0 credentials.
     *
     * @param String $authorizationCode Authorization code to exchange for OAuth 2.0
     *                                  credentials.
     * @return String Json representation of the OAuth 2.0 credentials.
     * @throws CodeExchangeException An error occurred.
     */
    function exchangeCode($authorizationCode) {
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
        $client->setScopes($this->authorizationUrl);
        $tmpUrl = parse_url($client->createAuthUrl());
        $query = explode('&', $tmpUrl['query']);
        $query[] = 'user_id=' . urlencode($emailAddress);
        return
        $tmpUrl['scheme'] . '://' . $tmpUrl['host'] . $tmpUrl['port'] .
        $tmpUrl['path'] . '?' . implode('&', $query);
    }
    
    /**
     * Retrieve credentials using the provided authorization code.
     *
     * This function exchanges the authorization code for an access token and
     * queries the UserInfo API to retrieve the user's e-mail address. If a
     * refresh token has been retrieved along with an access token, it is stored
     * in the application database using the user's e-mail address as key. If no
     * refresh token has been retrieved, the function checks in the application
     * database for one and returns it if found or throws a NoRefreshTokenException
     * with the authorization URL to redirect the user to.
     *
     * @param String authorizationCode Authorization code to use to retrieve an access
     *                                 token.
     * @param String state State to set to the authorization URL in case of error.
     * @return String Json representation of the OAuth 2.0 credentials.
     * @throws NoRefreshTokenException No refresh token could be retrieved from
     *         the available sources.
     */
    function getCredentials($authorizationCode, $state) {
        $emailAddress = '';
        try {
            $credentials = $this->exchangeCode($authorizationCode);
            $userInfo = $this->getUserInfo($credentials);
            $emailAddress = $userInfo->getEmail();
            $userId = $userInfo->getId();
            $credentialsArray = json_decode($credentials, true);
            if (isset($credentialsArray['refresh_token'])) {
                $this->storeCredentials($userId, $credentials);
                return $credentials;
            } else {
                $credentials = $this->getStoredCredentials($userId);
                $credentialsArray = json_decode($credentials, true);
                if ($credentials != null &&
                        isset($credentialsArray['refresh_token'])) {
                    return $credentials;
                }
            }
        } catch (CodeExchangeException $e) {
            print 'An error occurred during code exchange.';
            // Drive apps should try to retrieve the user and credentials for the current
            // session.
            // If none is available, redirect the user to the authorization URL.
            $e->setAuthorizationUrl(getAuthorizationUrl($emailAddress, $state));
            throw $e;
        } catch (NoUserIdException $e) {
            print 'No e-mail address could be retrieved.';
        }
        // No refresh token has been retrieved.
        $authorizationUrl = getAuthorizationUrl($emailAddress, $state);
        throw new NoRefreshTokenException($authorizationUrl);
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
    
    /**
     * Retrieve a list of File resources.
     *
     * @param Google_DriveService $service Drive API service instance.
     * @return Array List of Google_DriveFile resources.
     */
    function retrieveAllFiles($service) {
        $result = array();
        $pageToken = NULL;

        do {
            try {
                $parameters = array();
                if ($pageToken) {
                    $parameters['pageToken'] = $pageToken;
                }
                $files = $service->files->listFiles($parameters);

                $result = array_merge($result, $files->getItems());
                $pageToken = $files->getNextPageToken();
            } catch (Exception $e) {
                print "An error occurred: " . $e->getMessage();
                $pageToken = NULL;
            }
        } while ($pageToken);
        return $result;
    }
    public function test(){
        //Retrive Google DRive saved tokens from DB
        if ($savedtokens = PhpFox::getService('backuprestore.backuprestore')->getBTDBSettingByName('googledrive_tokens')) {
            $savedtokens = json_encode(unserialize(array_shift($savedtokens)));
        }
        $savedtokens = json_decode($savedtokens,true);
        
        $params = array(
           'refresh_token' => $savedtokens['refresh_token'], 
           'client_id' => $this->ClientId, 
           'client_secret' => $this->ClientSecret, 
           'grant_type' => 'refresh_token'
        );
        $mReturn = Phpfox::getLib('request')->send('https://accounts.google.com/o/oauth2/token',$params);
        
        $result = json_decode($mReturn,true);
        $result['created'] = Phpfox::getTime();
        //var_dump($result);
        if (isset($result['access_token'])) {
            $this->client->setAccessToken($mReturn);
            try{
                if($newtokens = $this->client->getAccessToken()){
                    $tekens = json_decode($newtokens,true);
                    $tekens['created']=  Phpfox::getTime();
                    $newtokens = json_encode($tekens);
                    $userinfo = $this->getUserInfo($newtokens);
                    
                    $emailAddress =  $userinfo->getEmail();
                    $userId =  $userinfo->getId();
                    echo $emailAddress."<br>".$userId;
                    $service = $this->buildService($newtokens);
                    $abc = $this->getAcountInfo($service);
                }
            }catch(Exception $abc){
                $abc->getMessage();
            }
           
        } 
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
    function insertFile($service, $title, $description, $parentId, $mimeType, $filename) {
        $file = new Google_DriveFile();
        $file->setTitle($title);
        $file->setDescription($description);
        $file->setMimeType($mimeType);

        // Set the parent folder.
        if ($parentId != null) {
          $parent = new ParentReference();
          $parent->setId($parentId);
          $file->setParents(array($parent));
        }

        try {
          $data = file_get_contents($filename);

          $createdFile = $service->files->insert($file, array(
            'data' => $data,
            'mimeType' => $mimeType,
          ));

          // Uncomment the following line to print the File ID
          // print 'File ID: %s' % $createdFile->getId();

          return $createdFile;
        } catch (Exception $e) {
          print "An error occurred: " . $e->getMessage();
        }
    }
    
    function printFilesInFolder($service, $folderId) {
      $pageToken = NULL;
      do {
        try {
          $parameters = array();
          if ($pageToken) {
            $parameters['pageToken'] = $pageToken;
          }
          $children = $service->children->listChildren($folderId, $parameters);
          $files = array();
          foreach ($children->getItems() as $child) {
            $file = $service->files->get($child->getId());
            $files[] = $file->getTitle();
          }
          if(in_array('inomjon', $files)){
              echo 'exist';
          }
          $pageToken = $children->getNextPageToken();
        } catch (Exception $e) {
          print "An error occurred: " . $e->getMessage();
          $pageToken = NULL;
        }
      } while ($pageToken);
    }
    
     /**
     * Insert a file into a folder.
     *
     * @param Google_DriveService $service Drive API service instance.
     * @param String $folderId ID of the folder to insert the file into.
     * @param String $fileId ID of the file to insert.
     * @return Google_ChildReference The inserted child. NULL is returned if an API error occurred.
     */
    function insertFileIntoFolder($service, $folderId, $fileId) {
      $newChild = new Google_ChildReference();
      $newChild->setId($fileId);
      try {
        return $service->children->insert($folderId, $newChild);
      } catch (Exception $e) {
        print "An error occurred: " . $e->getMessage();
      }
      return false;
    }
}

/**
 * Exception thrown when an error occurred while retrieving credentials.
 */
class GetCredentialsException extends Exception {
  protected $authorizationUrl;

  /**
   * Construct a GetCredentialsException.
   *
   * @param authorizationUrl The authorization URL to redirect the user to.
   */
  public function __construct($authorizationUrl) {
    $this->authorizationUrl = $authorizationUrl;
  }

  /**
   * @return the authorizationUrl.
   */
  public function getAuthorizationUrl() {
    return $this->authorizationUrl;
  }

  /**
   * Set the authorization URL.
   */
  public function setAuthorizationurl($authorizationUrl) {
    $this->authorizationUrl = $authorizationUrl;
  }
}

/**
 * Exception thrown when no refresh token has been found.
 */
class NoRefreshTokenException extends GetCredentialsException {}

/**
 * Exception thrown when a code exchange has failed.
 */
class CodeExchangeException extends GetCredentialsException {}

/**
 * Exception thrown when no user ID could be retrieved.
 */
class NoUserIdException extends Exception {}
?>