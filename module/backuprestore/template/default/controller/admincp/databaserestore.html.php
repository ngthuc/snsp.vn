{* Header Row *}
<div class="table_header">
    Database restore
</div>

<div class="database_restore" xmlns="http://www.w3.org/1999/html">
    <div class="public_message" id="public_message" style="display: block;">
        {phrase var='backuprestore.database_restore_info'}
    </div>
    <form name="" method="post" enctype="multipart/form-data" action="{url link='admincp.backuprestore.databaserestore'}">

        {if $fileId !=0}
			<h3>
				{phrase var='backuprestore.tables_overwritten'}
            </h3>
	        <input type="hidden" value="{$fileId}" name="fileId">
            <input type="submit" class="button" name="database_restore"
                   value="{phrase var='backuprestore.admin_menu_database_restore'}">

            <input type="button" class="button" name="database_restore"
                   value="{phrase var='backuprestore.cancel'}" onclick='window.location="{url link='admincp.backuprestore.history' task=cancel_database'}"'>

        {else}
			<input type="file" name="database_file">
		    <input type="submit" value="import" name="database_submit" class="button" id="database_submit"/>
        {/if}
    </form>
</div>
