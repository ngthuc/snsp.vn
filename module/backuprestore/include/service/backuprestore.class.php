<?php

defined('PHPFOX') or exit('NO DICE!');

/**
 * [PHPFOX_HEADER]
 */

/**
 * @company        SocialEnginePRO
 * @author          Inomjon Narmatov
 * @package          Module_Onlinetv
 */

class Backuprestore_Service_Backuprestore extends Phpfox_Service
{

	public function __construct()
	{
		$this->_sTable = Phpfox::getT('backuprestore');
	}

	public function getBackupdbSettins()
	{
		$settings = $this->database()->select('btdb.*')
			->from($this->_sTable, 'btdb')
			->execute('getSlaveRows');
		if (!count($settings)) {
			return false;
		}
		return $settings;
	}

	public function getBTDBSettingById($iId)
	{
		$category = $this->database()->select('ct.*')
			->from($this->_sTable, 'ct')
			->where('ct.category_id=' . $iId)
			->execute('getRow');
		if (!count($category)) {
			return false;
		}
		return $category;
	}

	public function getBTDBSettingByName($iName)
	{
		$sett_name = $this->database()->select('btdb.setting_value')
			->from($this->_sTable, 'btdb')
			->where('btdb.setting_name=\'' . $iName . '\'')
			->execute('getRow');
		if (!count($sett_name)) {
			return false;
		}
		return $sett_name;
	}

	public function addBTDBSetting($settName, $setValue)
	{
		$oParse = Phpfox::getLib('parse.input');
		$aInsert = array(
			'setting_name' => $oParse->clean($settName),
			'setting_value' => $setValue
		);

		// Insert in php_fox_backuprestore
		$iId = $this->database()->insert($this->_sTable, $aInsert);
		return $iId;
	}

	public function updateBTDBSetting($settName, $setValue)
	{
		$oParse = Phpfox::getLib('parse.input');

		$this->database()->update($this->_sTable, array(
			'setting_name' => $oParse->clean($settName),
			'setting_value' => $setValue,
		), 'setting_name=\'' . $settName . '\'');
		return true;
	}

	public function deleteBTDBSetting($settName)
	{

		if (empty($settName)) {
			return false;
		}
		return ($this->database()->delete($this->_sTable, 'setting_name=\'' . $settName . '\'')) ? true : false;
	}

	public function saveSetting($settname, $setvalue)
	{
		if ($value = $this->getBTDBSettingByName($settname)) {
			return $this->updateBTDBSetting($settname, $setvalue);
		} else {
			return $this->addBTDBSetting($settname, $setvalue);
		}
	}

	public function restore_db_dump($file, $sqlserver, $user, $pass, $dest_db)
	{

		try{
			$sql = mysql_connect($sqlserver, $user, $pass);
			mysql_select_db($dest_db);
			$a = file($file);
			foreach ($a as $n => $l)
				if (substr($l, 0, 2) == '--') unset($a[$n]);

			$a = explode(";\n", implode("\n", $a));
			unset($a[count($a) - 1]);
			foreach ($a as $q) if ($q)
				if (!mysql_query($q)) {
					echo "Fail on '$q'";
					mysql_close($sql);
					return 0;
				}
			mysql_close($sql);
			return true;
		}catch (Exception $e){
			return false;
		}

	}

}

?>