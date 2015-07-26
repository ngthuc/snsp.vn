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

class Backuprestore_Service_History extends Phpfox_Service {

    public function __construct() {
        $this->_sTable = Phpfox::getT('backuprestore_history');
    }
    
    public function getBTDBallHistory() {
        $histories = $this->database()->select('bh.*')
                ->from($this->_sTable, 'bh')
                ->execute('getSlaveRows');
        if (!count($histories)) {
            return false;
        }
        return $histories;
    }
	
    public function getBTDBHistoryById($iId) {
        $history = $this->database()->select('hs.*')
                ->from($this->_sTable, 'hs')
                ->where('hs.history_id=' . $iId)
                ->execute('getRow');
        if (!count($history)) {
            return false;
        }
        return $history;
    }
    
    public function addBTDBHistory($file,$timestamp,$fileName, $backupTypes, $gdrive,$dropbox,$server_self,$fileSize,$type,$folder) {
        $oParse = Phpfox::getLib('parse.input');
	    $file= explode("/", $oParse->clean($file));
	    $aInsert = array(
		    'backed_file' => end($file),
		    'time_stamp' => $timestamp,
		    'import_database_name' => $fileName,
		    'backup_types' => $backupTypes,
		    'unique_gdrive'=> $gdrive,
		    'unique_dropbox'=>$dropbox,
		    'unique_server'=> (isset($server_self['setting_value']) && $server_self['setting_value'])? $server_self['setting_value'].'/'.end($file):'',
		    'file_size'=>$fileSize,
		    'type'=>$type,
		    'folder_in_service'=>$folder
	    );

	    //var_dump($aInsert);die;
	    // Insert in php_fox_Backuprestore
        $iId = $this->database()->insert($this->_sTable, $aInsert);
        return $iId;
    }

    public function updateBTDBHistory($file,$timestamp,$hsid) {
        $oParse = Phpfox::getLib('parse.input');

        $this->database()->update($this->_sTable, array(
            'backed_file' => $oParse->clean($file),
            'time_stamp' => $$timestamp,
                ), 'history_id='.$hsid);
        return true;
    }

    public function deleteBTDBHistory($hsid) {
        $history = $this->database()->select('hs.*')
                ->from($this->_sTable, 'hs')
                ->where('hs.history_id=' . $hsid)
                ->execute('getRow');
        if (!count($history )) {
            return false;
        }
        $this->deleteTemporaryFile($history['backed_file']);
        return ($this->database()->delete($this->_sTable, 'history_id='.(int)$hsid)) ? true : false; 
    }
    
   public function deleteTemporaryFile($file){           
        //delete saved bachup file
        if (!empty($file)) {
            $file_full_path = PHPFOX_DIR.Phpfox::getParam('backuprestore.backup_dir').$file;
          
            if (file_exists($file_full_path)) {
                Phpfox::getLib('file')->unlink(str_replace('\\', '/', $file_full_path));
            }
        }
    }
	public function checkImportFileName($name){
		$rest = substr($name, -3);
		if($rest == 'sql'){
			$name.='.gz';
		}
		$query = $this->database()->select('h.*')
			->from($this->_sTable, 'h')
			->where('h.import_database_name= '."'$name'")
			->execute('getRow');

		if (!count($query)) {
			return false;
		}
		return true;
	}
}

?>