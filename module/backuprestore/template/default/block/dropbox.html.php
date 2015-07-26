<?php 
 /**
 * @company		SocialEnginePRO
 * @author  		Inomjon Narmatov
 * @package  		Module_Backupto cloud
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
         
        {*Dropbox*}
        <div class="service_block">
        {if isset($authorized.dropbox)}
            {if isset($DBADetails)}
                <h3> {phrase var='backuprestore.dropbox_account_details'}</h3>

               <!-- Dropbox User Account Info -->
               <div>{$DBADetails.account_owner} {phrase var='backuprestore.you_have'} {$DBADetails.used_space}GB {phrase var='backuprestore.of'} {$DBADetails.quota}GB ({$DBADetails.used_percent})% {phrase var='backuprestore.free_space'}</div>

               <!-- Unlink Dropbox Account -->
               <div style="margin-top: 5px;"><input type="submit" value="{phrase var='backuprestore.unlink_acount'}" class="button" name="unlink" /></div>
               <div style="margin-top: 7px;"><label><input type="checkbox" name="val[dropbox]" id="dropbox" value="1" {value type='checkbox' id='dropbox' default='1'} {if isset($selected_service.dropbox)}checked="checked"{/if}>Save backups to dropbox</label></div>
            {/if}
        {else}
            <h3> {phrase var='backuprestore.dropbox'} </h3>       
            <div class="extra_info">{phrase var='backuprestore.product_use_desc'} </div>
            
            <!-- error message -->
           {if isset($dbauthorize.error_not_authorized)}
               <div class="error_message">{phrase var='backuprestore.authorize_error'}</div>
           {/if}

           <!-- Continue/Authoriza Buttons -->
           {if isset($dbauthorize.submitbutton) && $dbauthorize.submitbutton == 'Continue'}
               <div id="conitinue"> <input type="submit" value="{phrase var='backuprestore.continue'}" class="button" name="continue" /></div>
           {else}
               <div> <input type="submit" value="{phrase var='backuprestore.authorize'}" class="button" name="db_authorize" {if isset($dbauthorize.Url)} onclick="dropbox_authorize('{$dbauthorize.Url}');" {/if}/></div>
           {/if}
        {/if}
         
        </div>