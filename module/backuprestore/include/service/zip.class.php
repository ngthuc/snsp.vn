<?php

/**
 * [PHPFOX_HEADER]
 */
/**
 * @company        SocialEnginePRO
 * @author          Inomjon Narmatov
 * @package          Module_Backuprestore
 */
class Backuprestore_Service_Zip extends Phpfox_Service
{

	private $oZip = null;
	public $_sDestination;
	private $archivefile = null;
	private $btdbsett = null;

	public function __construct()
	{
		if (class_exists('ZipArchive')) {
			$this->oZip = new ZipArchive();
			$this->btdbsett = Phpfox::getService('backuprestore.backuprestore');
			$this->createZip();
		}
	}

	public function _addToArchive($paths, $database)
	{
		@ini_set('memory_limit', '2048M');

		$this->oZip->open($this->archivefile, ZipArchive::CREATE);
		if ($paths != '' || $paths) {
			$paths = explode(",", $paths);
			foreach ($paths as $source) {
				$source = str_replace('\\', '/', realpath($source));
				if (is_dir($source) === true) {
					$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);
					$arr = explode("/", $source);
					$maindir = $arr[count($arr) - 1];

					$source = "";
					for ($i = 0; $i < count($arr) - 1; $i++) {
						$source .= '/' . $arr[$i];
					}

					$source = substr($source, 1);

					$this->oZip->addEmptyDir($maindir);


					foreach ($files as $file) {
						$file = str_replace('\\', '/', $file);
						// Ignore "." and ".." folders
						if (in_array(substr($file, strrpos($file, '/') + 1), array('.', '..')))
							continue;

						//$file = realpath($file);
						if (is_dir($file) === true) {
							$this->oZip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
						} else if (is_file($file) === true) {
							$this->oZip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
						}
					}
				} else if (is_file($source) === true) {
					$this->oZip->addFromString(basename($source), file_get_contents($source));
				}
			}
		}

		$realname = pathinfo($database);
		$realname = $realname['basename'];
		chdir('file/tmpDatabaseRestore/');
		if($database != null){
			$this->oZip->addFile($realname);
		}
		chdir(PHPFOX_DIR);

		
		$this->saveLastZip($this->archivefile);
		return $this->oZip->close();
	}

	public function createZip()
	{
		if (!PHPFOX_SAFE_MODE && Phpfox::getParam('core.build_file_dir')) {
			$aParts = explode('/', Phpfox::getParam('core.build_format'));
			$this->_sDestination = Phpfox::getParam('backuprestore.backup_dir');
			$this->_sDestination = "file/tmpDatabaseRestore/";
			if (!is_dir($this->_sDestination)) {
				@mkdir($this->_sDestination, 0777);
				@chmod($this->_sDestination, 0777);
			}


		}
		$this->archivefile = $this->_sDestination . $this->_createZipName();
	}

	public function addToArchive($filepath)
	{

		$this->oZip->open($this->archivefile, ZipArchive::CREATE);
		//$source = str_replace('\\', '/', realpath($filepath));
		$source = str_replace('\\', '/', $filepath);
		if (is_dir($source)) {
			$path_length = strpos($source, '/');
			$source = substr($source, 0, $path_length);
			$this->addDir($source);
		} else {
			$this->oZip->addFile($source);
		}

		if ($this->saveLastZip($this->archivefile)) {

		}
		return $this->oZip->close();
	}

	public function addDir($path)
	{
		$this->oZip->addEmptyDir($path);
		$nodes = glob($path . '/*');
		foreach ($nodes as $node) {
			if (is_dir($node)) {
				$this->addDir($node);
			} else if (is_file($node)) {
				$this->oZip->addFile($node);
			}
		}
	}

	public function getLastZipDir()
	{

		$root = PHPFOX_DIR;
		if ($archivepath = $this->btdbsett->getBTDBSettingByName('last_archived_file')) {
			
			if (file_exists($archivepath['setting_value'])) {
				return realpath($root . $archivepath['setting_value']);
			}
		}
		return false;
	}

	protected function _createArchiveName()
	{
		$aa = "abcdefghijklmnopqrstuvwxyz";
		$a = rand(10, 99);
		$c = rand(100, 999);
		return $a . $aa[rand(0, strlen($aa) - 1)] . $aa[rand(0, strlen($aa) - 1)] . $c;
	}

	protected function _createZipName()
	{
		return date("Y-m-d-H-i-s") . '.zip';
	}

	public function saveLastZip($patharchive)
	{
		if (!$this->btdbsett->getBTDBSettingByName('last_archived_file')) {
			$this->btdbsett->addBTDBSetting('last_archived_file', $patharchive);
		} else {
			$this->btdbsett->updateBTDBSetting('last_archived_file', $patharchive);
		}
	}

}

?>