<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * @company        SocialEnginePRO
 * @author          Inomjon Narmatov
 * @package          Module_Backupdropbox
 */

class Backuprestore_Component_Controller_Admincp_Backup extends Phpfox_Component
{

	public function process()
	{
		error_reporting(E_ALL);

		$dbname = Phpfox::getParam(array('db', 'name'));
		$user = Phpfox::getParam(array('db', 'user'));
		$pass = Phpfox::getParam(array('db', 'pass'));
		$host = Phpfox::getParam(array('db', 'host'));
		$process = Phpfox::getService('backuprestore.process');
		$backuprestore = Phpfox::getService('backuprestore.backuprestore');
		Phpfox::getLib('database')->freeResult();
		$aItems = Phpfox::getLib('database')->getTableStatus();
		$iSize = 0;
		$iOverhead = 0;
		foreach ($aItems as $iKey => $aItem) {
			$iSize += $aItem['Data_length'];
			$iOverhead += $aItem['Data_free'];

			$aItems[$iKey]['Name'] = $aItems[$iKey]['Name'];
		}

		if ($this->request()->get('save_settings')) {
			$aTables = $this->request()->getArray('tables');
		
			$sql_file_name = $process->generate_unique_key(15);
				if (!is_dir('file/tmpDatabaseRestore/')) {
				@mkdir('file/tmpDatabaseRestore/', 0777);
				@chmod('file/tmpDatabaseRestore/', 0777);
			}
			$sql_file_name = "file/tmpDatabaseRestore/".$sql_file_name;
		

			if ($aTables) {
				$process->backup_tables($sql_file_name . '.sql', $host, $user, $pass, $dbname, $aTables, $sql_file_name);
			}

			$process->backup();
		}
		$gdriveAuthError = false;
		$dropboxAuthError = false;
		$emptyServices = false;
		$savedpath = $backuprestore->getBTDBSettingByName('selected_services');

		if ($savedpath['setting_value'] == '') {
			$emptyServices = true;
		} else {
			$backupsettings = unserialize($savedpath['setting_value']);
			$dropbox = PhpFox::getService('backuprestore.dropboxfront');
			//Google DRIVE
			$gdrive = PhpFox::getService('backuprestore.googledrivefront');
			$tokens = $gdrive->getAccessTokens();
			if (isset($backupsettings['gdrive']) && $backupsettings['gdrive']) {
				if (!$gdrive->is_authorized()) {
					$gdriveAuthError = true;
				} else {
					$gdriveAuthError = false;
				}
			}
			if (isset($backupsettings['dropbox']) && $backupsettings['dropbox']) {
				if (!$dropbox->is_authorized()) {
					$dropboxAuthError = true;
				} else {
					$dropboxAuthError = false;
				}
			}
		}
		$this->template()->assign(array(
				'aItems' => $aItems,
				'iSize' => $iSize,
				'gdriveAuthError' => $gdriveAuthError,
				'dropboxAuthError' => $dropboxAuthError,
				'emptyServices' => $emptyServices,
				'authErrorUrl' => $this->url()->makeUrl('admincp.backuprestore.destination'),
				'iOverhead' => $iOverhead,
				'iCnt' => count($aItems))
		);

		$this->template()->setBreadcrumb(Phpfox::getPhrase('backuprestore.take_backup_content'), $this->url()->makeUrl('admincp.backuprestore.backup'))
			->setHeader(array(
			'btdbstyles.css' => 'module_backuprestore',
			'jqueryFileTree.css' => 'module_backuprestore',
			'manage_filetree.js' => 'module_backuprestore',
			'jqueryFileTree.js' => 'module_backuprestore',
			'scripts.js' => 'module_backuprestore',
		));
	}


}

?>