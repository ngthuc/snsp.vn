<?php
 defined('PHPFOX') or exit('NO DICE!');
 
 /**
 * @company		SocialEnginePRO
 * @author  		Inomjon Narmatov
 * @package  		Module_backuprestore
 */
 
?>
<form name="" method="post" enctype="multipart/form-data" action="{url link='admincp.backuprestore.gdrivesett'}">
 
    {* Header Row *}
    <div class="table_header">
        {phrase var='backuprestore.google_drive_settings_edit'}
    </div>
    <!--  redirect URI  -->
    <div class="table">
        <div class="table_left">
            Google Drive
        </div>
        <div class="table_right">
            <p style="margin-top: 0.5em" ><a href="https://code.google.com/apis/console/" target="_blank">{phrase var='backuprestore.api_console_descp'}</a></p> 
            <p class="extra_info" style="margin-top: 0.5em"> {phrase var='backuprestore.select_web_application_as_the_application_type'}</p>
            <p class="extra_info" style="margin-top: 0.5em">{phrase var='backuprestore.gdrive_keys_redirect_descp'}</p>
            <p style="margin-top: 0.5em"><strong><span style="font-size: 14px; margin: 5px;">{if isset($redirect_url)}{$redirect_url}{/if}</span></strong> </p>
            <p class="extra_info" style="margin-top: 0.5em">{phrase var='backuprestore.gdrive_keys_use_descp'}</p>
            <p style="margin-top: 0.5em" ><a href="{$support_page}">{phrase var='backuprestore.for_longer_help_including_screenshots_follow_this_link'}</a></p>
        </div>
        <div class="clear"></div>
    </div>
    
    <!-- Google Client ID -->
    <div class="table">
        <div class="table_left">
           {phrase var='backuprestore.google_drive_client_id'}
        </div>
        <div class="table_right">
               <input type="text" name="val[gdrive_clientid]" id="gdrive_clientid" value="{value type='input' id='gdrive_clientid'}" size="40" />
        </div>
        <div class="clear"></div>
    </div>
    
     <!-- Google Client Secret -->
    <div class="table">
        <div class="table_left">
           {phrase var='backuprestore.google_drive_client_secret'}
        </div>
        <div class="table_right">
            <input type="text" name="val[gdrive_clientsecret]" id="gdrive_clientsecret"  value="{value type='input' id='gdrive_clientsecret'}" size="40" />
        </div>
        <div class="clear"></div>
    </div>
     
    <!-- Google Drive Folder ID -->
    <div class="table">
        <div class="table_left">
             {phrase var='backuprestore.google_drive_redirect_uris'}
        </div>
        <div class="table_right">
               <textarea name='val[gdrive_redURI]' id='gdrive_redURI' cols='40' rows='4'>{value type='textarea' id='gdrive_redURI'}</textarea>
        </div>
        <div class="clear"></div>
    </div>
   
   <!-- Google Redirtecr URL --> 
   <div class="table_clear">
       <input type="submit" value="{phrase var='backuprestore.save_changes'}" class="button filesave" name="setting" />
   </div>
</form>
	

