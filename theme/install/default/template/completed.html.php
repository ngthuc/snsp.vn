<?php 
/**
 * [NULLED BY DARKGOTH 2014 - NULLCAMP.COM]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: completed.html.php 5350 2013-02-13 10:59:22Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div class="completed_message">
	{if $bIsUpgrade}
	Successfully upgraded to phpFox version {$sUpgradeVersion}.
	{else}
	Successfully installed phpFox {$sUpgradeVersion}.
	{/if}
	<div class="p_4">
<center>
Enjoy another fine phpFox release presented by <a href="http://nullcamp.com">Nullcamp.com</a>
</center>
			</div>
</div>

<a href="../index.php" class="installed_link">View Your Site</a>
<br />
