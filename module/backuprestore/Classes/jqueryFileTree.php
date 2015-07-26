<?php
ob_start();
define('PHPFOX', true);

define('PHPFOX_NO_SESSION', true);
define('PHPFOX_NO_USER_SESSION', true);

define('PHPFOX_DS', DIRECTORY_SEPARATOR);
define('PHPFOX_DIR', dirname(dirname(dirname(dirname(__FILE__)))) . PHPFOX_DS);
include PHPFOX_DIR . 'include' . PHPFOX_DS . 'init.inc.php';

$file_list = new FileList();
$_POST['dir'] = urldecode($_POST['dir']);


$root = '';
if (file_exists($root . $_POST['dir'])) {
    $files = scandir($root . $_POST['dir']);
    natcasesort($files);
    if (count($files) > 2) { /* The 2 accounts for . and .. */
        echo "<ul class=\"jqueryFileTree\" style=\"display: none;\">";
        // All dirs
        foreach ($files as $file) {
            if (file_exists($root . $_POST['dir'] . $file) && $file != '.' && $file != '..' && is_dir($root . $_POST['dir'] . $file)) {

                $full_path = htmlentities($root.$_POST['dir'] . $file) . "/";
                $file = htmlentities($file);
                $class = $file_list->is_checked_file($full_path) ? 'checked' : '';
                // var_dump($full_path);
                echo "<li class=\"directory collapsed\">
                                            <a href=\"#\" rel=\"" . htmlentities($_POST['dir'] . $file) . "/\">" . htmlentities($file) . "</a>
                                            <a href='#' rel='$full_path' class='checkbox directory $class'></a>
                                      </li>";
            }
        }
        // All files
        foreach ($files as $file) {
            if (file_exists($root . $_POST['dir'] . $file) && $file != '.' && $file != '..' && !is_dir($root . $_POST['dir'] . $file)) {
                $ext = preg_replace('/^.*\./', '', $file);
                $full_path = htmlentities($root.$_POST['dir'] . $file);
                $file = htmlentities($file);
                $class = $file_list->is_checked_file($full_path) ? 'checked' : '';
                // var_dump($full_path);
                echo "<li class=\"file ext_$ext\">
                                            <a href=\"#\" rel=\"" . htmlentities($_POST['dir'] . $file) . "\">" . htmlentities($file) . "</a>
                                            <a href='#' rel='$full_path' class='checkbox $class'></a> 
                                         </li>";
            }
        }
        echo "</ul>";
    }
}
clearstatcache();

class FileList {
    protected $_paths = null;
    private $filesforzip = array();
    private $files = null;
    
    public function __construct() {
        $service = Phpfox::getService('backuprestore.backuprestore');
        if(!$service->getBTDBSettingByName('included_paths'))
        {
            //get files and folders of root directory
            $this->getRootDirContent();
        }
        $saved_paths = $service->getBTDBSettingByName('included_paths');
        $this->_paths = explode(',', unserialize(array_shift($saved_paths)));
    }
    public function is_checked_file($path) {
        $path = str_replace('\\', '/', $path);
        foreach ($this->_paths as $p) {
            if ($p === $path) {
                return true;
            }
        }
        return false;
    }
    public function getRootDirContent() {
            $path = PHPFOX_DIR;
            if (file_exists($path)) {
                if (is_dir($path)) {
                    $this->files = scandir($path); //folders
                    natcasesort($this->files);
                    //All dirs
                    foreach ($this->files as $file) {
                        if (file_exists($path . $file) && $file != '.' && $file != '..' && is_dir($path . $file)) {
                            $full_path = htmlentities($path . $file) . "/";
                            $this->filesforzip[] = str_replace('\\', '/', realpath($full_path)."/");
                            $file = htmlentities($file);
                        }
                    }

                    foreach ($this->files as $file) {
                        if (file_exists($path . $file) && $file != '.' && $file != '..' && !is_dir($path . $file)) {
                            $full_path = htmlentities($path . $file);
                            $this->filesforzip[] = str_replace('\\', '/', realpath($full_path));
                            $file = htmlentities($file);
                        }
                    }
                } else {
                    $this->filesforzip[] = $path; //files
                }
            }   
            //convert to string
            $comma_separated = implode(",", $this->filesforzip); 
            //add taken content to db
            Phpfox::getService('backuprestore.backuprestore')->addBTDBSetting('included_paths', serialize($comma_separated));
    }
}

?>