<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 *
 *
 * @copyright        [PHPFOX_COPYRIGHT]
 * @author          Inomjon  Narmatov
 * @package          Module_Backuprestore
 */
class Backuprestore_Component_Ajax_Ajax extends Phpfox_Ajax
{
	public function archive()
	{
		$patharray = $this->get('text');

		if (Phpfox::getService('backuprestore.process')->saveIncludedPath($patharray)) {
			$this->softNotice(Phpfox::getPhrase('backuprestore.included_files_and_folders_saved'));
		}
		return;
	}

	public function  getBaseDir()
	{
		$this->call("FileTreeUN(" . json_encode(PHPFOX_DIR) . ")");
		return;
	}


	public function not(){
		$this->softNotice(Phpfox::getPhrase('backuprestore.included_files_and_folders_saved'));
		return;
	}
}

?>