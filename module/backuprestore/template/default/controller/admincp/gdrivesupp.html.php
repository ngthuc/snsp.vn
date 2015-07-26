<?php
 defined('PHPFOX') or exit('NO DICE!');
 
 /**
 * @company		SocialEnginePRO
 * @author  		Inomjon Narmatov
 * @package  		Module_backuprestore
 */
 
?>
    {* Header Row *}
    <div class="table_header">
        {phrase var='backuprestore.configuring_google_drive_api_access_in_phpfox'}
    </div>
    <div class="table">
        <div class="table_row">
            To allow Phpfox Backup into Cloud to have access to your Google Drive account, <a href="https://code.google.com/apis/console/" target="_blank">click on the link to your API console</a> to take you to Google; then click on the <strong> “Create project…”</strong> link.
        </div>
        <div class="img_holder">
            <img  src="{param var = 'core.path'}module/backuprestore/static/image/gdrive-step1-300x276.png"/>
        </div>
        <div class="table_row">
            <p style="margin-top: 0.5em">Find <strong>‘Drive API’</strong> and <strong>'Drive SDK'</strong> on the list of services:<br></p>
            <p style="margin-top: 0.5em"><strong>Activate services</strong>, so that they become an active services:</p>
        </div>
        <div class="img_holder"> 
            <img  src="{param var = 'core.path'}module/backuprestore/static/image/gdrive-driveapi1.png"/> 
        </div>
        <div class="table_row">
            Move to the <strong>‘API Access’</strong> tab (from the left menu), and click on <strong>‘Create an OAuth 2.0 client ID’:</strong>
        </div>
        <div class="img_holder" >
            <img  src="{param var = 'core.path'}module/backuprestore/static/image/CreateClientIDButton.png"/>
        </div>
        <div class="table_row">
            The only <strong> ‘branding information’</strong> you need to enter is <strong>‘Phpfox Backup to Clood’ </strong>(or whatever other label you please):
        </div>
        <div class="img_holder" >
            <img  src="{param var = 'core.path'}module/backuprestore/static/image/EnterBrandingInformation.png"/>
        </div>
        
        <div class="img_holder">
           <p> On the next step, choose a <strong>‘Web Application’</strong></p>
        </div>
        <div class="img_holder" >
            <img  src="{param var = 'core.path'}module/backuprestore/static/image/SelectApplicationType.png"/>
        </div>
        <div class="img_holder">
            <p>  and  <strong>paste in the URL</strong> that was shown to you on your <strong>Google Drive Settings</strong> page {if isset($redirect_url)} or copy this link <strong>{$redirect_url}</strong>{/if}</p>
        </div>

        <div class="img_holder" >
            <img  src="{param var = 'core.path'}module/backuprestore/static/image/gdrive_redirect.png"/>
        </div>
        <div class="table_row">
            <ul>
                <li><p style="margin-top: 0.5em"> You should now have a client ID created. <strong>Paste the details back into the Google Drive Settings page admincp->modules->backuprestore/Goole Drive Settings page.</strong></p></li>
                <li><p style="margin-top: 0.5em"> Go to the <strong>Manage Cloud Settings </strong> page and click <strong> Authorize </strong> button under Google Drive header </p></li>
                <li><p style="margin-top: 0.5em;"> You should now see Google's Permission page for Application</p></li>
            </ul>
        </div>
        <div class="img_holder">
           <img  src="{param var = 'core.path'}module/backuprestore/static/image/gdrive-permission.png"/> 
        </div>
        <p>Then, you're done. </p>
        <div class="clear"></div>
    </div>
	

