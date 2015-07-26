<?php
 defined('PHPFOX') or exit('NO DICE!');
 
 /**
 * @company		SocialEnginePRO
 * @author  		Inomjon Narmatov
 * @package  		Module_backuprestore
 */
 
?>
<form name="" method="post" enctype="multipart/form-data" action="{url link='admincp.backuprestore.destination'}">
    {* Header Row *}
    <div class="table_header">
        {phrase var='backuprestore.remote_storage_gateways'}
    </div>
    <div class="table">
        {*dropbox/gdrive icons*}
        <div class="table_row">
            <div class="service_holder">
                <div class="service_block">
                    <img src="{param var = 'core.path'}module/backuprestore/static/image/backupdest/logo_dropbox.png"/>  
                </div>
                <div class="service_block">
                    <img src="{param var = 'core.path'}module/backuprestore/static/image/backupdest/drive_logo.png"/> 
                </div>
                <div style="clear:both;"></div>
            </div>
        </div>
        
        {*dropbox/gdrive authorization*}
        <div class="table_row">
            {*Dropbox*}
                {module name='backuprestore.dropbox'}
            {*Googel Drive*}
                {module name='backuprestore.gdrive'}
            <div style="clear:both;"></div>
        </div>
        <div class="table_row">
            <div class="service_holder">
                <div class="service_block">
                    <img width="140px" height="65" src="{param var = 'core.path'}module/backuprestore/static/image/backupdest/email_down.png"/>
                </div>
                <div class="service_block">
                    <img width="120px" height="65" src="{param var = 'core.path'}module/backuprestore/static/image/backupdest/server_folder.png"/>
                </div>
                <div style="clear: both;"></div>
            </div>
        </div>
        
        <div class="table_row">
            <div class="service_holder">  
                {*Email*}
                <div class="service_block">
                    <div><label for="email_address"> Email: </label>
                    <input type="text" name="val[email_address]" value="{value type='input' id='email_address'}" id="email_address" size="30"/></div>
                    <p class="extra_info">Enter an address here to have a report sent (and the whole backup, if you choose) to it.</p>
                </div>

                {*Server Folder*}
                <div class="service_block">
                    <div><label for="server_folder">Folder Path</label>
                    <input type="text" name="val[server_folder]" value="{value type='input' id='server_folder'}" id="server_folder" size="40"/></div>
                    <p class="extra_info">Enter absolute path of folder in your server to save backups to it.</p>
                </div>
                <div style="clear:both;"></div>
            </div>
        </div>
        <div class="table_row">
            <div class="service_holder">
                <div class="service_block"><label><input type="checkbox" name="val[email]" id="email" value="1" {value type='checkbox' id='email' default='1'} {if isset($selected_service.email)}checked="checked"{/if}> Send backups to email</label></div>
                <div class="service_block"><label><input type="checkbox" name="val[folder]" id="folder" value="1" {value type='checkbox' id='folder' default='1'} {if isset($selected_service.folder)}checked="checked"{/if} >Save backups in site folder </label></div>
                <div style="clear:both;"></div>
            </div>
        </div>
       
       
       <div class="table_clear">
           <input type="submit" value="{phrase var='backuprestore.save_changes'}" class="button"
                  name="select_service" id="select_service_submit"/>
       </div>
    </div>
</form>
	

