<?php

/**
 * [PHPFOX_HEADER]
 */
/**
 * @company        SocialEnginePRO
 * @author          Inomjon Narmatov
 * @package          Module_Backuprestore
 */
class Backuprestore_Service_Process extends Phpfox_Service
{

	private $filesforzip = array();
	private $btcsett = null;
	private $included_path = null;
	private $files = null;
	private $zip_name = null;
	private $databaseFile = null;
	private $importFilesName = null;
	private $backupTypes = array();
	const DAY_IN_SECONDS = 86400;
	const DAYS = 3;
	const WEEK_IN_DAYS = 7;
	const MONTH_IN_DAYS = 30;
	const MAX_HISTORY_ITEMS = 15;
	const PROJECT = 'project.zip';

	public function __construct()
	{
		$this->_sTable = Phpfox::getT('backuprestore');
		$this->btcsett = PhpFox::getService('backuprestore.backuprestore');
	}

	public function setFilesForArchive($paths)
	{
		//$paths = '';
		if (!extension_loaded('zip')) {
			return false;
		}
		$oZip = Phpfox::getService('backuprestore.zip');
		$oZip->_addToArchive($paths, $this->zip_name);
		if ($this->zip_name != null) {
			unlink($this->zip_name);
			unlink($this->databaseFile);
		}

		clearstatcache();
	}

	public function Zip($source, $destination, $overwrite = false)
	{
		if (!extension_loaded('zip') || !file_exists($source)) {
			return false;
		}

		$zip = new ZipArchive();

		if (!$zip->open($destination, $overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE)) {
			return false;
		}

		$source = str_replace('\\', '/', realpath($source));
		if (is_dir($source) === true) {

			$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

			foreach ($files as $file) {
				$file = str_replace('\\', '/', $file);

				// Ignore "." and ".." folders
				if (in_array(substr($file, strrpos($file, '/') + 1), array('.', '..')))
					continue;

				$file = realpath($file);

				if (is_dir($file) === true) {
					$zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
				} else if (is_file($file) === true) {
					$zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
				}
			}
		} else if (is_file($source) === true) {
			$zip->addFromString(basename($source), file_get_contents($source));
		}

		return $zip->close();
	}


	public function saveIncludedPath($path)
	{
		if (!empty($path)) {
			$path = str_replace('\\', '/', $path);
			$savedpath = $this->btcsett->getBTDBSettingByName('included_paths');
			if (empty($savedpath)) {
				$id = Phpfox::getService('backuprestore.backuprestore')->addBTDBSetting('included_paths', serialize($path));
				if ($id) {
					return TRUE;
				} else
					return FALSE;
			} else {
				$this->btcsett->updateBTDBSetting('included_paths', serialize($path));
				return true;
			}


		} else {
			$this->btcsett->updateBTDBSetting('included_paths', '');
		}
	}

	public function makeArchive()
	{
		$pathesforzip = $this->btcsett->getBTDBSettingByName('included_paths');

		if (!$pathesforzip) {
			$pathesforzip = array();
		}
		$this->included_path = unserialize(array_shift($pathesforzip));
		$this->setFilesForArchive($this->included_path);
		return true;
	}

	public function saveFrequencySettings(array $aVals = array())
	{
		if (!empty($aVals)) {
			$currenttime = Phpfox::getTime(); //+(6*60*60)
			$month = date('n', $currenttime);
			$day = date('j', $currenttime);
			$year = date('Y', $currenttime);

			$iStartTime = Phpfox::getLib('date')->mktime($aVals['hour'], $aVals['minute'], 0, $month, $day, $year);
			$iCron = array();

			switch ($aVals['timefreq']) {
				case 'Daily':
					// if setting time passed asume tumorrow in this time other way today
					if ($iStartTime < $currenttime) {
						$aVals['start_time'] = $iStartTime + self::DAY_IN_SECONDS;
					} else {
						$aVals['start_time'] = $iStartTime;
					}
					$iCron['type_id'] = 3;
					$iCron['every'] = 1;
					break;

				case 'Every 3 days':
					$aVals['start_time'] = $iStartTime + self::DAYS * self::DAY_IN_SECONDS;
					$iCron['type_id'] = 3;
					$iCron['every'] = 3;
					break;

				case 'Weakly':
					$aVals['start_time'] = $iStartTime + self::WEEK_IN_DAYS * self::DAY_IN_SECONDS;
					$iCron['type_id'] = 3;
					$iCron['every'] = 7;
					break;

				case 'Monthly':
					$aVals['start_time'] = $iStartTime + self::MONTH_IN_DAYS * self::DAY_IN_SECONDS;
					$iCron['type_id'] = 3;
					$iCron['every'] = 30;
					break;
				default :
					$aVals['start_time'] = $iStartTime + self::DAY_IN_SECONDS;
					$iCron['type_id'] = 3;
					$iCron['every'] = 1;
					break;
			}
			$aVals['start_time'] = Phpfox::getLib('date')->convertToGmt($aVals['start_time']);
			$gmtoffset = Phpfox::getLib('date')->getGmtOffset($aVals['start_time']);

			$iCron['next_run'] = $aVals['start_time'];

			//update cron values
			$this->setCronValues($iCron);

			$aInsert = array(
				'timefreq' => $aVals['timefreq'],
				'hour' => $aVals['hour'],
				'minute' => $aVals['minute'],
				'backup_start_time' => $aVals['start_time'],
				'backup_start_time_offset' => $gmtoffset
			);

			if (count($aInsert)) {
				$savedset = $this->btcsett->getBTDBSettingByName('backup_time');
				if (empty($savedset)) {
					$id = Phpfox::getService('backuprestore.backuprestore')->addBTDBSetting('backup_time', serialize($aInsert));
					if ($id) {
						return TRUE;
					} else
						return FALSE;
				} else {
					$this->btcsett->updateBTDBSetting('backup_time', serialize($aInsert));
					return true;
				}
			}
		}
	}

	public function log_finished_time($path, $backupTypes, $gdrive, $dropbox, $server_self, $type)
	{
		$path_parts = pathinfo($path);

		$fileSize = round(filesize($path) / 1024, 2);
		$pos_param_path = strpos($path_parts['dirname'], str_replace('/', '\\', Phpfox::getParam('backuprestore.backup_dir')));
		$length_param_path = strlen(str_replace('/', '\\', Phpfox::getParam('backuprestore.backup_dir')));
		$str_cut = substr($path_parts['dirname'], 0, $pos_param_path + $length_param_path);
        $location = Phpfox::getService('backuprestore.backuprestore')->getBTDBSettingByName('backup_setting');
		$setting_value = unserialize($location['setting_value']);
		if ($setting_value['sv_subfolder']) {
			$root = $setting_value['sv_subfolder'];
		}else{
			$root = '';
		}

		$length_start_pos = strlen($path_parts['dirname']) - strlen($str_cut);
		$str_needed = substr($path_parts['dirname'], $pos_param_path + $length_param_path, $length_start_pos);
		PhpFox::getService('backuprestore.history')->addBTDBHistory(str_replace('\\', '/', $str_needed) . '/' . $path_parts['basename'],
			time(),
			$this->importFilesName,
			serialize($backupTypes),
			$gdrive,
			$dropbox,
			$server_self,
			$fileSize,
			$type,
			$root
		);

		return $this;
	}


	public function get_History_log()
	{
		$history_log = PhpFox::getService('backuprestore.history')->getBTDBallHistory();

		if (count($history_log) > self::MAX_HISTORY_ITEMS) {
			reset($history_log);
			$first_entry = current($history_log);
			PhpFox::getService('backuprestore.history')->deleteBTDBHistory($first_entry['history_id']);
			array_shift($history_log);
		}
		if (!$history_log || !count($history_log)) {
			return FALSE;
		}

		foreach ($history_log as $history) {
			$historylog [] = array(
				'iDate' => Phpfox::getTime(Phpfox::getParam('backuprestore.tme_stamp'), $history['time_stamp']),
				'iHM' => Phpfox::getTime(Phpfox::getParam('backuprestore.schedule_hour_min_format'), $history['time_stamp']),
				'backed_file' => $history['backed_file']
			);
		}
		return $historylog;
	}

	public function clear_History_log()
	{
		$history_log = PhpFox::getService('backuprestore.history')->getBTDBallHistory();
		if (!count($history_log)) {
			return false;
		}
		if (!empty($history_log)) {
			foreach ($history_log as $history) {
				PhpFox::getService('backuprestore.history')->deleteBTDBHistory($history['history_id']);
			}
		}
	}

	public function dropboxBackup($zipath)
	{
		$dropbox = PhpFox::getService('backuprestore.dropboxfront');
		try {
			if ($dropbox->is_authorized_FCron()) {
				try {
					$root = '';
					//d(Phpfox::getService('backuprestore.backuprestore')->getBTDBSettingByName('backup_setting'));die;
					if ($dropbox_location = Phpfox::getService('backuprestore.backuprestore')->getBTDBSettingByName('backup_setting')) {
						$setting_value = unserialize($dropbox_location['setting_value']);
						if (isset($setting_value['sv_subfolder']) && $setting_value['sv_subfolder']) {
							$root = $setting_value['sv_subfolder'];
						}
					}
					if ($put = $dropbox->upload_file($root, $zipath)) {
						return $put;
						// Phpfox::addMessage(Phpfox::getPhrase('backuprestore.success'));
					}
				} catch (Exception $e) {
					Phpfox::addMessage($e->getMessage());
				}
			}
		} catch (Exception $eauth) {
			Phpfox_Error::set(Phpfox::getPhrase('backuprestore.authorize_exception'));
			Phpfox::addMessage($eauth->getMessage());
		}
	}

	public function addGDriveKeys($aVals)
	{
		Phpfox::getService('ban')->checkAutomaticBan($aVals);
		$aInsert = array(
			'gdrive_clientid' => $aVals['gdrive_clientid'],
			'gdrive_clientsecret' => $aVals['gdrive_clientsecret'],
			'gdrive_folderid' => $aVals['gdrive_folderid'],
			'gdrive_redURI' => $aVals['gdrive_redURI']
		);

		if (count($aInsert)) {
			if ($gdkeys = $this->btcsett->getBTDBSettingByName('gdclient_keys')) {
				$this->btcsett->updateBTDBSetting('gdclient_keys', serialize($aInsert));
				return true;
			} else {
				$id = $this->btcsett->addBTDBSetting('gdclient_keys', serialize($aInsert));
				return $id;
			}
		}
	}

	public function gdriveBackup($zipath)
	{
		$googledrive = PhpFox::getService('backuprestore.googledrivefront');
		$acess_tokens = $googledrive->getAccessTokens();

		// Get user Acount INfo
		try {
			$userInfo = $googledrive->getUserInfo($acess_tokens);
			$emailAddress = $userInfo->getEmail();
			$userId = $userInfo->getId();
			$email = filter_var($emailAddress, FILTER_SANITIZE_EMAIL);
			// echo $userId . "</br>" . $email . "</br>";
		} catch (NoUserIdException $e) {
			print 'No e-mail address could be retrieved.';
		}

		// file upload
		try {
			$drive = $googledrive->buildService($acess_tokens);
			if ($fileid = $googledrive->file_upload($drive, $zipath)) {
				return $fileid;
			}
		} catch (Exception $e) {
			Phpfox::addMessage($e->getMessage());
		}
	}


	public function backup()
	{
		
		if ($this->makeArchive()) {
			if (!$zipath = Phpfox::getService('backuprestore.zip')->getLastZipDir()) {
		
				$err_txt = Phpfox::getPhrase('backuprestore.file_not_exist') . " " . str_replace("\\", "/", PHPFOX_DIR) . Phpfox::getParam('backuprestore.backup_dir') . " " . Phpfox::getPhrase('backuprestore.location');
				return Phpfox_Error::set($err_txt);
			}
		}

		//Service to backup

		$gdrive = '';
		$dropbox = '';
		$server_self = '';
		if ($service = PhpFox::getService('backuprestore.services')->getService()) {
			
			if (isset($service['dropbox'])) {
				if ($this->dropboxBackup($zipath)) {
					$cucess['dropbox'] = 1;
					$pathInfo = pathinfo($zipath);
					$dropbox = $pathInfo['basename'];
				}
			}

			if (isset($service['gdrive'])) {
				if ($fileId = $this->gdriveBackup($zipath)) {
					$cucess['gdrive'] = 1;
					$gdrive = $fileId;

				}
			}

			if (isset($service['email'])) {
				if ($this->sendAttachEmail($this->get_user_email_for_send(), $zipath)) {
					$cucess['email'] = 1;
				}
			}

			$backup_setting = $this->btcsett->getBTDBSettingByName('backup_setting');
			$backup_setting = unserialize($backup_setting['setting_value']);
			if (isset($backup_setting['send_email']) && $backup_setting['send_email']) {
				if ($this->sendEmail($this->get_user_email_for_send())) {
					$cucess['send_email'] = 1;
				}

			}

			$backup_setting = $this->btcsett->getBTDBSettingByName('server_folder');
			if (isset($service['folder']) && $backup_setting['setting_value']) {
				if ($this->SaveBackupSelf($zipath)) {
					$cucess['save_self'] = 1;
					$server_self = Phpfox::getService('backuprestore.backuprestore')->getBTDBSettingByName('server_folder');
				}

			}
		}
		//Sucess message
		if (isset($cucess['gdrive']) || isset($cucess['dropbox']) || isset($cucess['email']) || isset($cucess['save_self'])) {
			//log finished time
			$this->log_finished_time($zipath, $cucess, $gdrive, $dropbox, $server_self, 'manual');
			Phpfox::addMessage(Phpfox::getPhrase('backuprestore.backup_process_complated'));
		}

		$this->clearDir('file/tmpDatabaseRestore/');

	}

	public function backupCron()
	{
		$savedpath = $this->btcsett->getBTDBSettingByName('backup_tables');
		if (isset($savedpath) && $savedpath) {
			$dbname = Phpfox::getParam(array('db', 'name'));
			$user = Phpfox::getParam(array('db', 'user'));
			$pass = Phpfox::getParam(array('db', 'pass'));
			$host = Phpfox::getParam(array('db', 'host'));
			$sql_file_name = $this->generate_unique_key(15);
			$this->backup_tables($sql_file_name . '.sql', $host, $user, $pass, $dbname, unserialize($savedpath['setting_value']), $sql_file_name);
		}
		$this->makeArchive();

		if (!$zipath = Phpfox::getService('backuprestore.zip')->getLastZipDir()) {
			$err_txt = Phpfox::getPhrase('backuprestore.file_not_exist') . " " . str_replace("\\", "/", PHPFOX_DIR) . Phpfox::getParam('backuprestore.backup_dir') . " " . Phpfox::getPhrase('backuprestore.location');
			return Phpfox_Error::set($err_txt);
		}
		//Service to backup

		$gdrive = '';
		$dropbox = '';
		$server_self = '';
		if ($service = PhpFox::getService('backuprestore.services')->getService()) {
			//var_dump($service);die;
			if (isset($service['dropbox'])) {
				if ($this->dropboxBackup($zipath)) {
					$cucess['dropbox'] = 1;
					$pathInfo = pathinfo($zipath);
					$dropbox = $pathInfo['basename'];

				}
			}

			if (isset($service['gdrive'])) {
				if ($fileId = $this->gdriveBackup($zipath)) {
					$cucess['gdrive'] = 1;
					$gdrive = $fileId;

				}
			}

			if (isset($service['email'])) {
				if ($this->sendAttachEmail($this->get_user_email_for_send(), $zipath)) {
					$cucess['email'] = 1;
				}
			}

			$backup_setting = $this->btcsett->getBTDBSettingByName('backup_setting');
			$backup_setting = unserialize($backup_setting['setting_value']);
			if (isset($backup_setting['send_email']) && $backup_setting['send_email']) {
				if ($this->sendEmail($this->get_user_email_for_send())) {
					$cucess['send_email'] = 1;
				}

			}

			$backup_setting = $this->btcsett->getBTDBSettingByName('server_folder');
			if (isset($service['folder']) && $backup_setting['setting_value']) {
				if ($this->SaveBackupSelf($zipath)) {
					$cucess['save_self'] = 1;
					$server_self = Phpfox::getService('backuprestore.backuprestore')->getBTDBSettingByName('server_folder');
				}

			}
		}
		//Sucess message
		if (isset($cucess['gdrive']) || isset($cucess['dropbox']) || isset($cucess['email']) || isset($cucess['save_self'])) {
			//log finished time
			$this->log_finished_time($zipath, $cucess, $gdrive, $dropbox, $server_self, 'auto');
			Phpfox::addMessage(Phpfox::getPhrase('backuprestore.backup_process_complated'));
		}

		$this->clearDir('file/tmpDatabaseRestore/');

	}

	public function get_user_email_for_send()
	{

		$user_email = $this->btcsett->getBTDBSettingByName('user_email');
		return $user_email['setting_value'];

	}

	public function backup_tables($file, $host, $user, $pass, $name, $aTables, $file_name)
	{
		//var_dump($aTables);die;

		$link = mysql_connect($host, $user, $pass);
		mysql_select_db($name, $link);
		file_put_contents($file, '');

		//получение списка таблиц
		$tables = array();
		$result = mysql_query('SHOW TABLES;', $link);
		while ($row = mysql_fetch_row($result)) {
			$tables[] = $row[0];
		}

		//обработка таблиц
		if (count($tables) > 0) {
			foreach ($tables as $table) {
				if (in_array($table, $aTables)) {
					$this->backup_table_structure($file, $table, $link);
					$this->backup_table_data($file, $table, $link);
				}
			}
		}

		$zip_name = $file_name . ".sql.gz";
		$this->zip_name = $this->importFilesName = $zip_name;
		$this->databaseFile = $file;
		$zp = gzopen($zip_name, "w9");
		gzwrite($zp, file_get_contents($file));
		gzclose($zp);
		$savedpath = $this->btcsett->getBTDBSettingByName('backup_tables');
		if (empty($savedpath)) {
			$id = Phpfox::getService('backuprestore.backuprestore')->addBTDBSetting('backup_tables', serialize($aTables));
			if ($id) {
				return TRUE;
			} else
				return FALSE;
		} else {
			$this->btcsett->updateBTDBSetting('backup_tables', serialize($aTables));
			return true;
		}

	}

	public function backup_table_structure($file, $table, $link)
	{
		//получение и сохранение структуры таблицы
		$content = 'DROP TABLE IF EXISTS `' . $table . "`;\n\n";
		$result = mysql_fetch_row(mysql_query('SHOW CREATE TABLE `' . $table . '`;', $link));
		$content .= $result[1] . ";\n\n";
		file_put_contents($file, $content, FILE_APPEND);
	}

	public function backup_table_data($file, $table, $link)
	{
		//получение и сохранение данных таблицы
		$result = mysql_fetch_row(mysql_query('SELECT COUNT(*) FROM `' . $table . '`;', $link));
		$count = $result[0];
		$delta = 500;

		//если данные существуют
		if ($count > 0) {
			//определяем не числовые поля
			$not_num = array();
			$result = mysql_query('SHOW COLUMNS FROM `' . $table . '`;', $link);
			$start = 0;
			while ($row = mysql_fetch_row($result)) {
				if (!preg_match("/^(tinyint|smallint|mediumint|bigint|int|float|double|real|decimal|numeric|year)/", $row[1])) {
					$not_num[$start] = 1;
				}
				$start++;
			}
			//начинаем производить выборки данных
			$start = 0;
			while ($count > 0) {
				$result = mysql_query('SELECT * FROM `' . $table . '` LIMIT ' . $start . ', ' . $delta . ';', $link);
				$content = 'INSERT INTO `' . $table . '` VALUES ';
				$first = true;
				while ($row = mysql_fetch_row($result)) {
					$content .= $first ? "\n(" : ",\n(";
					$first2 = true;
					foreach ($row as $index => $field) {
						if (isset($not_num[$index])) {
							if ($field == NULL || $field == "NULL") {
								$field = "NULL";
							}
							if ($field == '') {
								$field = '';
							}
							$field = addslashes($field);
							$field = preg_replace("/\n/", "/\\n/", $field);
							$content .= !$first2 ? (',"' . $field . '"') : ('"' . $field . '"');
						} else {
							if ($field == NULL || $field == "NULL") {
								$field = "NULL";
							}
							if ($field == '') {
								$field = '';
							}
							$content .= !$first2 ? (',' . $field) : $field;
						}
						$first2 = false;
					}
					$content .= ')';
					$first = false;
				}
				//сохраняем результаты выборки
				file_put_contents($file, $content . ";\n\n", FILE_APPEND);
				$count -= $delta;
				$start += $delta;
			}
		}
	}

	public function sendEmail($email)
	{
		$aEmails = explode(',', $email);
		foreach ($aEmails as $sEmail) {
			$sEmail = trim($sEmail);
			if (!Phpfox::getLib('mail')->checkEmail($sEmail)) {
				continue;
			}


			$sMessage = "Hello,\n\n" . Phpfox::getPhrase('backuprestore.full_name_send_you_message_title',
				array('full_name' => Phpfox::getUserBy('full_name'))
			);

			$sMessage .= "\n\n Backup process finished successfully below is backup details and backup file!";


			$oMail = Phpfox::getLib('mail');

			$oMail->fromEmail(Phpfox::getUserBy('email'))
				->fromName(Phpfox::getUserBy('full_name'));

			$bSent = $oMail->to($sEmail)
				->messageHeader(false)
				->subject('PhpFox backup and restore')
				->message($sMessage)
				->notification('mail.new_message')
				->send();


		}
	}

	public function sendAttachEmail($email, $filepath)
	{
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
			$fileatt_name = $path_parts['basename'];
			$file = fopen($filepath, 'rb');
			$data = fread($file, filesize($filepath));
			$data = chunk_split(base64_encode($data));
			$semi_rand = md5(time());
			fclose($file);
		}

		foreach ($aEmails as $sEmail) {
			$sEmail = trim($sEmail);
			if (!Phpfox::getLib('mail')->checkEmail($sEmail)) {
				continue;
			}

			$email_subject = 'PhpFox Backup and Restore';
			$headers = "From: " . Phpfox::getUserBy('full_name') . "<" . Phpfox::getUserBy('email') . ">";
			$email_message = "Hi!\r\n</br>" . $email_subject . " finished backup process. \r\n Below is backup information and backup file .</br>";
			$email_message .= "\r\ndfskjdfdjbsdfbsdfhs";
			$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

			$headers .= "\nMIME-Version: 1.0\n" .
				"Content-Type: multipart/mixed;\n" .
				" boundary=\"{$mime_boundary}\"";


			$email_message .= "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type:text/html; charset=\"iso-8859-1\"\n" .
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

			if ($ok) {
				$is_send = true;
				//echo "Secccess message";
			}
		}

		if ($is_send) {
			return true;
		}
		return false;
	}

	//Save backup file on server
	public function SaveBackupSelf($zipath)
	{
		//server folder if exist
		if ($server_folder = Phpfox::getService('backuprestore.backuprestore')->getBTDBSettingByName('server_folder')) {
			$server_folder = $server_folder['setting_value'];
		}

		$zipath = str_replace('\\', '/', $zipath);
		$path_parts = pathinfo($zipath);

		if (is_dir($server_folder)) {
			if (substr($server_folder, -1) == '/' || substr($server_folder, -1) == '\\') {
				$sTo = str_replace('\\', '/', $server_folder . $path_parts['basename']);
			} else {
				$sTo = str_replace('\\', '/', $server_folder . "/" . $path_parts['basename']);
			}
		}

		$oFile = Phpfox::getLib('file');
		if (file_exists($sTo)) {
			$oFile->unlink($sTo);
		}

		if (!$oFile->copy($zipath, $sTo)) {
			return Phpfox_Error::set(Phpfox::getPhrase('backuprestore.cannot_copy_file'));
		}
		return true;
	}

	public function downloadFileByPriority($fileId, $databaseRestore = false)
	{
		/**
		 * get file
		 */
		$historyObj = Phpfox::getService('backuprestore.history');
		$history = $historyObj->getBTDBHistoryById($fileId);
		$backupTypes = unserialize($history['backup_types']);

		/**
		 * @description First priority is self server
		 */
		if ($backupTypes['save_self'] && $history['unique_server']) {
			if (is_file($history['unique_server'])) {
				if ($databaseRestore)
					return $history['unique_server'];

				//var_dump($history['unique_server']);die;
				header('Content-type:  text/plain');
				header('Content-Disposition: attachment; filename="' . basename($history['unique_server']) . '"');
				readfile($history['unique_server']);
				return;
			}
		}
		/**
		 * @description Second priority is google drive
		 */

		if ($backupTypes['gdrive'] && $history['unique_gdrive']) {
			return $this->gdriveDownloadFile($history['unique_gdrive'], $databaseRestore);
		}

		/**
		 * @description Third priority is google drive
		 */

		if ($backupTypes['dropbox'] && $history['unique_dropbox']) {
			return $this->dropboxDownloadFile($history['unique_dropbox'], $databaseRestore, $history['folder_in_service']);

		}

	}

	/**
	 * @description Download from Google drive
	 * @param string $key
	 */
	public function gdriveDownloadFile($key, $databaseRestore = false)
	{
		//var_dump($key);die;
		$googledrive = PhpFox::getService('backuprestore.googledrivefront');
		$acess_tokens = $googledrive->getAccessTokens();
		$drive = $googledrive->buildService($acess_tokens);
		$file = $googledrive->getFile($drive, $key);
		@ini_set('memory_limit', '1024M');
		$filePath = $googledrive->downloadFile($file);
		$fp = fopen('data.zip', 'w');
		fwrite($fp, $filePath);
		fclose($fp);

		if ($databaseRestore)
			return 'data.zip';


		header('Content-type: ' . $file->getMimeType());
		header('Content-Disposition: attachment; filename="' . $file->getTitle() . '"');
		readfile('data.zip');
		unlink('data.zip');
		exit;
	}

	/**
	 * @description Download from Dropbox
	 * @param $key
	 */
	public function dropboxDownloadFile($key, $databaseRestore = false,$folder)
	{
		$dropbox = PhpFox::getService('backuprestore.dropboxfront');
		if($folder){
			$folder = trim($folder,'/');
			$folder = trim($folder,'\\');
			$folder = "/".$folder."/";
		}else{
			$folder = '/';
		}
		@ini_set('memory_limit', '1024M');
		$fileMetadata = $dropbox->getDownloadFile($folder. $key);

		header('Content-type: application/x-rar-compressed');
		header('Content-Disposition: attachment; filename="' . $fileMetadata['name'] . '"');
		$fp = fopen('data.zip', 'w');
		fwrite($fp, $fileMetadata['data']);
		fclose($fp);
		if ($databaseRestore)
			return 'data.zip';
		header('Content-type: application/x-rar-compressed');
		header('Content-Disposition: attachment; filename="' . $fileMetadata['name'] . '"');
		if(readfile('data.zip')){
			unlink('data.zip');
			exit;
		}


	}

	/**
	 * @description Database restore
	 * @param $fileId
	 */
	public function databaseRestore($fileId)
	{
		/**
		 * get file
		 */
		$historyObj = Phpfox::getService('backuprestore.history');
		$history = $historyObj->getBTDBHistoryById($fileId);


		$file = $this->downloadFileByPriority($fileId, true);
		/*$folder= "tmpDatabaseRestore/";
		if (!is_dir($folder)) {
			@mkdir($folder, 0777);
			@chmod($folder, 0777);
		}*/
		$zip = new ZipArchive();

		if ($zip->open($file) === true) {
			$zip->extractTo("file/tmpDatabaseRestore/");
			$zip->close();
		}

		unlink('data.zip');

		return $fileId;
	}

	/**
	 * @description Database restore
	 * @param $fileId
	 */
	public function importDatabaseRestore($fileId)
	{
		$historyObj = Phpfox::getService('backuprestore.history');
		$history = $historyObj->getBTDBHistoryById($fileId);

		include_once(Phpfox::getParam('core.path') . '/module/backuprestore/static/php/phpMyImporter.php');
		$pass = Phpfox::getParam(array('db', 'pass'));
		$name = Phpfox::getParam(array('db', 'name'));
		$user = Phpfox::getParam(array('db', 'user'));
		$host = Phpfox::getParam(array('db', 'host'));
		$connection = @mysql_connect($host, $user, $pass);

		$dump = new phpMyImporter($name, $connection, 'file/tmpDatabaseRestore/' . $history['import_database_name'], true);
		$dump->utf8 = true; // Uses UTF8 connection with MySQL server, default: true
		if ($dump->doImport()) {
			$success_txt = Phpfox::getPhrase('backuprestore.database_was_successfully_uploaded');
			$this->clearDir("file/tmpDatabaseRestore/");
			return Phpfox::addMessage($success_txt);
		} else {
			$err_txt = Phpfox::getPhrase('backuprestore.error_loading_database');
			return Phpfox_Error::set($err_txt);
		}


	}

	public function clearDir($dir)
	{
		if ($objs = glob($dir."/*")) {
			foreach($objs as $obj) {
				is_dir($obj) ? $this->clearDir($obj) : unlink($obj);
			}
		}
        rmdir($dir);
	}

	public function deleteBackupFile($fileId)
	{
		$historyObj = Phpfox::getService('backuprestore.history');
		$history = $historyObj->getBTDBHistoryById($fileId);
		$backupTypes = unserialize($history['backup_types']);
		if (isset($backupTypes['save_self']) && $history['unique_server']) {
			unlink($history['unique_server']);
		}
		if (isset($backupTypes['gdrive']) && $history['unique_gdrive']) {
			
			$this->deleteGoogleDriveFile($history['unique_gdrive']);
		}

		if (isset($backupTypes['dropbox']) && $history['unique_dropbox']) {

			$this->deleteDropboxFile($history['unique_dropbox'],$history['folder_in_service']);
		}

		$historyObj->deleteBTDBHistory($fileId);
	}

	private function deleteGoogleDriveFile($key)
	{
		//	var_dump($key);
		$googledrive = PhpFox::getService('backuprestore.googledrivefront');
		$acess_tokens = $googledrive->getAccessTokens();
		$drive = $googledrive->buildService($acess_tokens);
		$googledrive->deleteFile($drive, $key);

	}


	private function deleteDropboxFile($key,$folder)
	{
		if($folder){
			$folder = trim($folder,'/');
			$folder = trim($folder,'\\');
			$folder = "/".$folder."/";
		}else{
			$folder = '/';
		}
		$dropbox = PhpFox::getService('backuprestore.dropboxfront');
		if ($dropbox->deleteFile($folder.$key)) {
			return true;
		}
	}

	public function generate_unique_key($number)
	{
		$arr = array('a', 'b', 'c', 'd', 'e', 'f',
			'g', 'h', 'i', 'j', 'k', 'l',
			'm', 'n', 'o', 'p', 'r', 's',
			't', 'u', 'v', 'x', 'y', 'z',
			'A', 'B', 'C', 'D', 'E', 'F',
			'G', 'H', 'I', 'J', 'K', 'L',
			'M', 'N', 'O', 'P', 'R', 'S',
			'T', 'U', 'V', 'X', 'Y', 'Z',
			'1', '2', '3', '4', '5', '6',
			'7', '8', '9', '0');
		// Генерируем пароль
		$pass = "";
		for ($i = 0; $i < $number; $i++) {
			// Вычисляем случайный индекс массива
			$index = rand(0, count($arr) - 1);
			$pass .= $arr[$index];
		}
		return $pass;
	}
}

?>