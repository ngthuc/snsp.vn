<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 25, 2015, 5:06 pm */ ?>
<?php 
/**
 * [NULLED BY DARKGOTH 2014]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: template-footer.html.php 6519 2013-08-28 12:16:06Z Fern $
 */
 
 

?>
<?php if (! defined ( 'PHPFOX_SKIP_IM' )): ?>
                <div id="js_im_player"></div>
<?php Phpfox::getBlock('im.footer', array()); ?>
<?php echo $this->_aVars['sDebugInfo']; ?>
<?php endif; ?>
<?php echo $this->_sFooter; ?>
<?php (($sPlugin = Phpfox_Plugin::get('theme_template_body__end')) ? eval($sPlugin) : false); ?>
        
