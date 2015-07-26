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

class Backuprestore_Component_Controller_Admincp_Databaserestore extends Phpfox_Component
{
	public function process() {

		@include_once('phpMyImporter.php');
		$pass = Phpfox::getParam(array('db','pass'));
		$name = Phpfox::getParam(array('db','name'));
		$user = Phpfox::getParam(array('db','user'));
		$host = Phpfox::getParam(array('db','host'));
		$connection = @mysql_connect($host,$user,$pass);

		$process = Phpfox::getService('backuprestore.process');

		if($this->request()->get('database_restore')){
			$process->importDatabaseRestore($this->request()->get('fileId'));
		}

		$fileId = ($this->request()->get('fileId')) ? $this->request()->get('fileId'):0;
		$this->template()->assign(array(
			'fileId'=>$fileId
		));
		if($this->request()->get('database_submit')){
			$file = $this->request()->get('database_file');
			//var_dump($file['name']);die;

			$uniqueImport = Phpfox::getService('backuprestore.history');
			$import_name = $file['name'];
			//echo $file['name'];die;
		    /*if(!$uniqueImport->checkImportFileName($import_name)){
			    $err_txt = Phpfox::getPhrase('backuprestore.this_base_was_not_done_through_our_service');
			    return Phpfox_Error::set($err_txt);
		    }*/
			$upl = "file/cloudrestore/";
			if (!is_dir($upl)) {
				@mkdir($upl, 0777);
				@chmod($upl, 0777);
			}
			$uploaddir = realpath('file/cloudrestore/');
			$uploadfile = $uploaddir ."/". basename($file['name']);
			if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
				$dump = new phpMyImporter($name,$connection,$uploadfile, true);
				$dump->utf8 = true; // Uses UTF8 connection with MySQL server, default: true
				if($dump->doImport()){
					$process->clearDir('file/cloudrestore/');
					$success_txt = Phpfox::getPhrase('backuprestore.database_was_successfully_uploaded');
					return Phpfox::addMessage($success_txt);
				}else{
					$err_txt = Phpfox::getPhrase('backuprestore.error_loading_database');
					return Phpfox_Error::set($err_txt);
				}
			}
		}

		$this->template()->setBreadcrumb(Phpfox::getPhrase('backuprestore.databaserestore'),
			$this->url()->makeUrl('admincp.backuprestore.databaserestore'))
			->setHeader(array(
			'btdbstyles.css' => 'module_backuprestore',
			'scripts.js' => 'module_backuprestore',
		));



	}






}