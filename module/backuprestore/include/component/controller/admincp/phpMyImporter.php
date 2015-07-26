<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Jenish
 * Date: 18.06.13
 * Time: 9:56
 * To change this template use File | Settings | File Templates.
 */
class phpMyImporter
{
	/**
	 * @access private
	 */
	var $database = null;
	var $connection = null;
	var $compress = null;
	var $utf8 = null;

	var $importFilename = null;

	/**
	 * Class constructor
	 * @param string $db The database name
	 * @param string $connection The database connection handler
	 * @param boolean $compress It defines if the output/import file is compressed (gzip) or not
	 * @param string $filepath The file where the dump will be written
	 */
	function phpMyImporter($db=null, $connection=null, $filepath='dump.sql', $compress=false) {
		$this->connection = $connection;
		$this->compress = $compress;
		$this->importFilename = $filepath;

		$this->utf8 = true;

		return $this->setDatabase($db);
	}

	/**
	 * Sets the database to work on
	 * @param string $db The database name
	 */
	function setDatabase($db){
		$this->database = $db;
		if ( !@mysql_select_db($this->database) )
			return false;
		return true;
	}

	/**
	 * Read from SQL file and make sql query
	 */
	function importSql($file) {
		// Reading SQL from file
		if ($this->compress) {
			$lines = gzfile($file);
		}
		else {
			$lines = file($file);
		}

		$x = 0;
		$importSql = "";
		$procent = 0;
		foreach ($lines as $line) {
			$x++;
			// Importing SQL
			$importSql .= $line;
			if ( substr(trim($line), strlen(trim($line))-1) == ";" ) {
				$query = @mysql_query($importSql, $this->connection);
				if (!$query)
					return false;
				$importSql = "";
			}
		}
		return true;
	}

	/**
	 * Import SQL file into selected database
	 */
	function doImport() {
		if ( !$this->setDatabase($this->database) ){
			return false;

		}

		if ( $this->utf8 ) {
			$encoding = @mysql_query("SET NAMES 'utf8'", $this->connection);
		}

		if ( $this->importFilename ) {
			$import = $this->importSql($this->importFilename);
			if (!$import){
				return false;
			}

			else{
				return $import;
			}

		}
		else {
			return false;
		}
	}
}
