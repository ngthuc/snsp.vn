<?php

/**
  Author  :: P3rsianc4T 
  Theme   :: foxtronix
*/

defined('PHPFOX') or exit('NO DICE!');

// base path
$sMacBasePath = "http://".Phpfox::getParam('core.host').Phpfox::getParam('core.folder')."theme/frontend/foxtronix/style/foxtronix/";

/************************ load js **************************/

// load main script
$oTpl->setHeader('cache', array('main.js' => 'style_script'));

// load foxtronix script
$oTpl->setHeader(array("<script type=\"text/javascript\" src=\"".$sMacBasePath."jscript/theme.js?v=" . Phpfox::getLib('template')->getStaticVersion() . "\"></script>"));

/************************ load css *************************/

// load font-awesome.css
$oTpl->setHeader(array(
'<link rel="stylesheet" href="'.$sMacBasePath.'css/font-awesome.css?v='.Phpfox::getLib('template')->getStaticVersion().'">'
));

// only for ie
$oTpl->setHeader(array('<!--[if IE 7]><link rel="stylesheet" href="'.$sMacBasePath.'css/font-awesome-ie7.css?v='.Phpfox::getLib('template')->getStaticVersion().'"><![endif]-->'));


?>