<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Jenish
 * Date: 20.06.13
 * Time: 16:07
 * To change this template use File | Settings | File Templates.
 */
?>
{* Header Row *}
<div class="table_header">
    {phrase var='backuprestore.history'}
</div>
<div class="public_message" id="public_message" style="display: block;">
    {phrase var='backuprestore.history_info'}
</div>
<table cellpadding="0" cellspacing="0">
    <tr>
        <th style="width:10px;">{phrase var='backuprestore.backupid'}</th>
        <th class="t_center">{phrase var='backuprestore.backupfilename'}</th>
        <th class="t_center">{phrase var='backuprestore.backupdate'}</th>
        <th class="t_center">{phrase var='backuprestore.backupmethod'}</th>
        <th class="t_center">{phrase var='backuprestore.backuptype'}</th>
        <th class="t_center">{phrase var='backuprestore.backupage'}</th>
        <th class="t_center">{phrase var='backuprestore.backupfilesize'}</th>
        <th class="t_center">{phrase var='backuprestore.backupoptions'}</th>
        <th class="t_center"></th>
        <th class="t_center"></th>
    </tr>
	{if $histories}
	    {foreach from=$histories key=iKey item=aItem}
		    <tr class="checkRow{if is_int($iKey/2)} tr{else}{/if}">
		        <td>{$aItem.history_id}</td>
		        <td>{$aItem.backed_file}</td>
		        <td class="t_center">{$aItem.time_stamp}</td>
		        <td class="t_center">
			        {if $aItem.dropbox}
			            <img src="{param var = 'core.path'}module/backuprestore/static/image/backupdest/dropbox-icon.png">
			        {/if}
			        {if $aItem.gdrive}
			            <img src="{param var = 'core.path'}module/backuprestore/static/image/backupdest/google-drive-icon.png">
			        {/if}
			        {if $aItem.save_self}
			            <img src="{param var = 'core.path'}module/backuprestore/static/image/backupdest/server-folder-icon.png">
			        {/if}

		        </td>
		        <td class="t_center">{$aItem.type}</td>
		        <td class="t_center">{$aItem.age}</td>
		        <td class="t_center">
			        {if $aItem.file_size}
			            {$aItem.file_size} Kbytes
		            {/if}
		        </td>
		        <td class="t_center">
			        <a href="{url link='admincp.backuprestore.history' task=download fileId=$aItem.history_id'}">
			        {phrase var='backuprestore.backupdownload'}</a>
		        </td>
		        <td class="t_center">
			        {if $aItem.import_database_name}
	                <a href="{url link='admincp.backuprestore.history' task=databaserestore fileId=$aItem.history_id'}">
			        {phrase var='backuprestore.databaserestore'}</a>
			        {/if}
		        </td>
		        <td class="t_center">
	                <a href="{url link='admincp.backuprestore.history' task=deleteFile fileId=$aItem.history_id'}"
	                   class="delete_backup_file">
			        {phrase var='backuprestore.backupdelete'}
		             </a>
		        </td>
		    </tr>
	    {/foreach}
	{/if}
</table>