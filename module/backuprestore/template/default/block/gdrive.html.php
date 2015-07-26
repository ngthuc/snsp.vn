<?php 
 /**
 * @company		SocialEnginePRO
 * @author  		Inomjon Narmatov
 * @package  		Module_Backupto cloud
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
         
        {*Google drive*}
        <div class="service_block">
        {if isset($authorized.gdrive)}
            {if isset($gdrive_info)}
                <h3>{phrase var='backuprestore.google_drive_account_details'} </h3>
                <!-- Google DRive User Account Info -->
                <div>{$gdrive_info.account_owner} {phrase var='backuprestore.you_have'} {$gdrive_info.used_space}GB {phrase var='backuprestore.of'} {$gdrive_info.quota}GB ({$gdrive_info.used_percent})% {phrase var='backuprestore.free_space'} </div>
                
                <!-- Unlink Google Drive Account -->
                <div style="margin-top:5px;"><input type="submit" value="{phrase var='backuprestore.unlink_google_accont'}" class="button" name="gd_unauthorize"/></div>
                <div style="margin-top: 7px;"><label><input type="checkbox" name="val[gdrive]" id="gdrive" value="1" {value type='checkbox' id='gdrive' default='1'} {if isset($selected_service.gdrive)}checked="checked"{/if} >Save backups to Google Drive</label></div>
           {/if}
        {else}
           <h3>Google Drive </h3>
           <p class="extra_info">{phrase var='backuprestore.gdrive_authorize_message'}</p>
           <div id="authorize" style="margin-top: 5px;"> 
               <input type="submit" value="{phrase var='backuprestore.authorize'}" class="button" name="gd_authorize"/>
           </div>
        {/if} 
        </div>