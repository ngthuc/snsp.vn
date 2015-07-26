<?php

/**
  Author  :: Hossein Hatami
  Theme   :: Bookbulk
*/

defined('PHPFOX') or exit('NO DICE!');

// base path
$sFbBasePath = "http://".Phpfox::getParam('core.host').Phpfox::getParam('core.folder')."theme/frontend/Bookbulk/style/Bookbulk/";

/************************ load js **************************/

// load main script
$oTpl->setHeader('cache', array('main.js' => 'style_script','custom.js' => 'style_script'));

// load Bookbulk script
$oTpl->setHeader(array("<script type=\"text/javascript\" src=\"".$sFbBasePath."jscript/theme.js?v=" . Phpfox::getLib('template')->getStaticVersion() . "\"></script>"));

/************************ load css *************************/

// load font-awesome.css
$oTpl->setHeader(array('<link rel="stylesheet" href="'.$sFbBasePath.'css/font-awesome.css?v='.Phpfox::getLib('template')->getStaticVersion().'">'
));

// only for ie
$oTpl->setHeader(array('<!--[if IE 7]><link rel="stylesheet" href="'.$sFbBasePath.'css/font-awesome-ie7.css?v='.Phpfox::getLib('template')->getStaticVersion().'"><![endif]-->'));


?>