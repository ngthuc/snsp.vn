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

class Backuprestore_Component_Controller_Admincp_History extends Phpfox_Component
{
	public function process()
	{
	
		$histories = Phpfox::getService('backuprestore.history')->getBTDBallHistory();
		$process = Phpfox::getService('backuprestore.process');
		if($this->request()->get('task') == 'cancel_database'){
			$process->clearDir("file/tmpDatabaseRestore/");
		}


		if($this->request()->get('task') == 'download'){
			Phpfox::getService('backuprestore.process')->downloadFileByPriority($this->request()->get('fileId'));
			//$this->url()->send('admincp.backuprestore.history');
		}
		if($this->request()->get('task') == 'deleteFile'){
			Phpfox::getService('backuprestore.process')->deleteBackupFile($this->request()->get('fileId'));
			$this->url()->send('admincp.backuprestore.history');
		}

		if($this->request()->get('task') == 'databaserestore'){
			$fileId = Phpfox::getService('backuprestore.process')->databaseRestore($this->request()->get('fileId'));
			$this->url()->send('admincp.backuprestore.databaserestore', array('fileId'=>$fileId));

		}



		foreach ($histories as &$history) {
			$history['age'] = $this->getAge($history['time_stamp']);
			$history['time_stamp'] = date('d-m-Y',$history['time_stamp']);

			$backupTypes = unserialize($history['backup_types']);
			if($backupTypes['dropbox'])
				$history['dropbox'] = true;

			if($backupTypes['gdrive'])
				$history['gdrive'] = true;

			if($backupTypes['save_self'])
				$history['save_self'] = true;

		}

		//Phpfox::getService('backuprestore.process')->dropboxDownloadFile();
		//var_dump($histories);die;
		$this->template()->setBreadcrumb(Phpfox::getPhrase('backuprestore.history'),
			$this->url()->makeUrl('admincp.backuprestore.history'))
			->setHeader(array(
			'btdbstyles.css' => 'module_backuprestore',
			'scripts.js' => 'module_backuprestore',
		))->assign(array(
			'histories'=>$histories
		));



	}

	/**
	 * @param DateTime $time
	 * @return string
	 */
	private function getAge($time){
		$ageTime = time() - $time;
		$back = round($ageTime/60/60/24);
		if ($back >= 1){
			if($back == 1)
				return $back.' day';
			else
				return $back.' days';

		}
		$back = (int)($ageTime/60/60);
		if ($back >= 1){
			if($back == 1)
				return $back.' hour';
			else
				return $back.' hours';
		}


		$back = (int)($ageTime/60);
		if ($back >= 1){
			if($back == 1)
				return $back.' minute';
			else
				return $back.' minutes';
		}

		return $ageTime.' seconds';

	}




}
