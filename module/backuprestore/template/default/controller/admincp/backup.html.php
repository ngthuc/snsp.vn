<?php
 defined('PHPFOX') or exit('NO DICE!');
 
 /**
 * @company		SocialEnginePRO
 * @author  		Inomjon Narmatov
 * @package  		Module_backuprestore
 */
 
?>
<form name="" method="post" enctype="multipart/form-data" action="{url link='admincp.backuprestore.backup'}">
    {* Header Row *}
    <div class="table_header">
        Site's content files and database tables  for backup.
    </div>
	{if $emptyServices}
	    <div id="core_js_messages">
	        <div class="error_message">
                {phrase var='backuprestore.for_backup_you_must_choose_at_least_one_service'}.
	            {phrase var='backuprestore.to_login_go_to'} <a href="{$authErrorUrl}">{phrase var='backuprestore.backup_destination'}</a>
	        </div>
	    </div>

	{else}
	    {if $dropboxAuthError  || $gdriveAuthError}
	    <div id="core_js_messages">
	        <div class="error_message">
			{if $gdriveAuthError}
			    {phrase var='backuprestore.google_drive_auth_failed'}.
			{/if}
			{if $dropboxAuthError}
			    {phrase var='backuprestore.dropbox_auth_failed'}.
			{/if}
	        {phrase var='backuprestore.to_login_go_to'} <a href="{$authErrorUrl}">{phrase var='backuprestore.backup_destination'}</a>

	        </div>
	    </div>

		{else}
	    {* Backup store option *}
	    <div class="table">
	        <div class="table_left">
	            Select backup file type
	        </div>
	        <div class="table_right">
	            <span><input type="radio" class="save_file_type all" name="val[save_backup]" value="1"
		            {value type='radio' id='save_backup' default='1' selected='true'}/> Files and Database</span>
	            <span><input type="radio" class="save_file_type files" name="val[save_backup]" value="0"
		            {value type='radio' id='save_backup' default='0'}/> Files</span>
	            <span><input type="radio" class="save_file_type database" name="val[save_backup]" value="0"
		            {value type='radio' id='save_backup' default='0'}/> Database</span>

	            <!--File tree-->

		        <div id="file_tree_content">
		            <h3>{phrase var='backuprestore.included_files_and_directories'}</h3>
		             <span class="extra_info">
		                {phrase var='backuprestore.file_tree_info'}<br />
		                </span>
		             <div class="solidblockmenu">
		                <ul>
		                    <li name="all" class="toggle"> <a href="#">{phrase var='backuprestore.all'}</a></li>
		                    <li name="none" class="toggle"> <a href="#">{phrase var='backuprestore.none'}</a></li>
		                    <li name="invert" class="toggle"> <a href="#">{phrase var='backuprestore.inverse'}</a> </li>
		                </ul>
		            </div>
		            <div id="file_tree" class="file_tree"></div>
	            </div>
	            <!-- Start Backup -->
	<!--            <div id="start_backup" style="margin-top: 5px;">
	                <input type="submit" value="{phrase var='backuprestore.start_backup'}" class="button filesave" name="backup" />
	            </div>-->
	        </div>
	        <div class="clear"></div>
	    </div>

	    {* Auto backup option *}
	    <div class="table">
	        <div class="table_left">
	            Database to Backup
	        </div>
	        <div class="table_right">
	            <span><input type="radio" name="val[auto_backup]" value="1" class="select_database_tables"
	                         id="select_all_tables" checked=""/>
		            <label for="select_all_tables">Select All Tables</label></span>
	            <span><input type="radio" name="val[auto_backup]" value="0" class="select_database_tables"
			            id="select_some_tables"/><label for="select_some_tables"> Exclude some Tables</label></span>
	        </div>
	        <div class="clear"></div>
	    </div>

	    <div id="sql_tables" style="display: none;">

		    {* Sql tables *}
		    <div class="message">
			{phrase var='admincp.database_size'}: {$iSize|filesize} - {phrase var='admincp.overhead'}: {$iOverhead|filesize} - {phrase var='admincp.total_tables'}: {$iCnt}
		    </div>

		    <table cellpadding="0" cellspacing="0">
		        <tr>
		            <th style="width:10px;"><input type="checkbox" name="val[id]" value="" id="js_check_box_all" class="main_checkbox" /></th>
		            <th>{phrase var='admincp.table'}</th>
		            <th class="t_center">{phrase var='admincp.records'}</th>
		            <th class="t_center">{phrase var='admincp.size'}</th>
		            <th class="t_center">{phrase var='admincp.overhead'}</th>
		        </tr>
		        {foreach from=$aItems key=iKey item=aItem}
			        <tr class="checkRow{if is_int($iKey/2)} tr{else}{/if}">
			            <td><input type="checkbox" name="tables[]" class="checkbox" value="{$aItem.Name}" id="js_id_row{$iKey}" /></td>
			            <td>{$aItem.Name}</td>
			            <td class="t_center">{$aItem.Rows}</td>
			            <td class="t_center">{$aItem.Data_length|filesize}</td>
			            <td class="t_center">{$aItem.Data_free|filesize}</td>
			        </tr>
		        {/foreach}
		    </table>


	    </div>
	    <div class="table_clear">
	        <input type="submit" value="{phrase var='backuprestore.save_changes'}" class="button filesave" name="save_settings"/>
	    </div>
		{/if}
	{/if}
</form>
	

