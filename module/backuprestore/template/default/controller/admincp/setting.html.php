<?php
 defined('PHPFOX') or exit('NO DICE!');
 
 /**
 * @company		SocialEnginePRO
 * @author  		Inomjon Narmatov
 * @package  		Module_backuprestore
 */
 
?>
<form name="" method="post" enctype="multipart/form-data" action="{url link='admincp.backuprestore.setting'}">
    {* Header Row *}
    <div class="table_header">
        {phrase var='backuprestore.site_global_settings'}
    </div>
    
    {* Backup store option *}
    <div class="table">
        <div class="table_left">
            All to Backup
        </div>
        <div class="table_right"> 
            <div class="item_is_active_holder">					
                    <span class="js_item_active item_is_active"><input type="radio" name="val[save_backup]" value="1" {value type='radio' id='save_backup' default='1' selected='true'}/> {phrase var='core.yes'}</span>
                    <span class="js_item_active item_is_not_active"><input type="radio" name="val[save_backup]" value="0" {value type='radio' id='save_backup' default='0'}/> {phrase var='core.no'}</span>
            </div>
            <div class="extra_info">
                    Disable this option to save copy of backup files on server.
            </div>
        </div>
        <div class="clear"></div>
    </div>
    
    {* Auto backup option *}
    <div class="table">
        <div class="table_left">
            Automatic Backup 
        </div>
        <div class="table_right"> 
            <div class="item_is_active_holder">					
                    <span class="js_item_active item_is_active"><input type="radio" name="val[auto_backup]" value="1" {value type='radio' id='auto_backup' default='1' selected='true'}/> {phrase var='core.yes'}</span>
                    <span class="js_item_active item_is_not_active"><input type="radio" name="val[auto_backup]" value="0" {value type='radio' id='auto_backup' default='0'}/> {phrase var='core.no'}</span>
            </div>
            <div class="extra_info">
                    Disable this option to turn off automatic backup..
            </div>
        </div>
        <div class="clear"></div>
    </div>
    
   {* Auto backup time interval *}
    <div class="table">
        <div class="table_left">
            Automatic Backup Time Period
        </div>
        <div class="table_right"> 
                <h3>{phrase var='backuprestore.next_scheduled'}</h3>
                <span class="extra_info" style="font-size: 12px; font-weight: bold; margin-left: 10px;"> {phrase var='backuprestore.next_backup_scheduled_for'} {$aForms.schedule_date} {phrase var='backuprestore.at'}  {$aForms.schedule_HM} </span>
                <h3>Day and Time</h3> 
                <div><div style="float: left;"><select name="val[timefreq]" id="time_period">
                    {foreach from=$timefreqs item=Timefreq}
                    <option value="{$Timefreq}" {if $Timefreq == $aForms.timefreq} selected="selected"{/if} >{$Timefreq}</option>
                    {/foreach}
                </select>
                </div>
                <div id="backup_min_hour" style="float:left;">
                <span>at</span>
                <select name="val[hour]">
                    {foreach from=$hours key=k item=Hour}
                    <option value="{$Hour}" {if $Hour == $aForms.hour} selected="selected"{/if} >{$Hour}</option>
                    {/foreach}
                </select>
                <span>:</span>
                <select name="val[minute]" >
                    {foreach from=$minutes key=k item=Minute}
                    <option value="{$Minute}" {if $Minute == $aForms.minute} selected="selected"{/if} >{$Minute}</option>
                    {/foreach}
                </select>                    
                </div>
                <div style="clear: both"></div>
                </div>
        </div>
        <div class="clear"></div>
    </div>
    
   {* Email Notifification *}
    <div class="table">
        <div class="table_left">
            Send Email Notification 
        </div>
        <div class="table_right"> 
            <div class="item_is_active_holder">					
                    <span class="js_item_active item_is_active"><input type="radio" name="val[send_email]" value="1" {value type='radio' id='send_email' default='1' selected='true'}/> {phrase var='core.yes'}</span>
                    <span class="js_item_active item_is_not_active"><input type="radio" name="val[send_email]" value="0" {value type='radio' id='send_email' default='0'}/> {phrase var='core.no'}</span>
            </div>
            <div class="extra_info">
                Send Email Notification about backup process.
            </div>
        </div>
        <div class="clear"></div>
    </div>
   
   {* Service subfolder *}
   <div class="table">
        <div class="table_left">
            <label for="sv_subfolder">Subfolder in Dropbox and Google Drive App</label> 
        </div>
        <div class="table_right"> 
            <input type="text" name="val[sv_subfolder]" value="{value type='input' id='sv_subfolder'}" id="sv_subfolder" />
        </div>
        <div class="clear"></div>
    </div>
   
    
   <div class="table_clear">
       <input type="submit" value="{phrase var='backuprestore.save_changes'}" class="button" name="save_settings" />
   </div>
    
</form>
	

