function dropbox_authorize(strUrl) {
	window.open(strUrl);
}

var control=0;
$(document).ready(function () {
	$.ajaxCall('backuprestore.getBaseDir');
	var paths = [];
	$('#sql_tables .checkbox').attr('checked',true);
	$('#js_check_box_all').attr('checked',true);
	$('#select_some_tables').live('click',function(){
		$('#sql_tables').fadeIn(1000);

	});

	$('#select_all_tables').live('click',function(){
		$('#sql_tables').fadeOut(1000);
		$('#sql_tables .checkbox').attr('checked',true);
		$('#js_check_box_all').attr('checked',true);

	});


	$('#database_submit').click(function(e){
		//console.log(oTranslations['backuprestore.tables_overwritten']);
		if(!confirm('Replacement tables will be overwritten, are you sure?')){
			e.preventDefault();
		}

	});


	$('.filesave').click(function (e) {
		$('.checked').each(function () {
			paths.push($(this).attr('rel'));
		});
				/*console.log(paths);
		e.preventDefault();*/
		$.ajaxCall('backuprestore.archive', 'text=' + paths);

			
		
		pause(3000);
		
		
		
		paths = [];
		//e.preventDefault();


	});

	$('.toggle').click(function () {
		switch ($(this).attr('name')) {
			case 'all':
				$('#file_tree .checkbox').click();
				return false;
				break
			case 'none':
				$('#file_tree .checkbox').removeClass('checked');
				return false;
				break
			case 'invert':
				console.log($(this).attr('name'));
				$('#file_tree .checkbox').not('.partial, .directory.expanded>.checkbox').click();
				return false;
				break
		}
	});

	$('#store_in_subfolder').click(function () {
		if ($('#store_in_subfolder').is(':checked')) {
			$('.dropbox_location').show('fast', function () {
				$('#dropbox_location').focus();
			});
			$('#dropbox_location').css('display', 'block');
		} else {
			$('#dropbox_location').val('');
			$('.dropbox_location').hide();
		}
	});
	if ($('#dropbox_location').val() == '') {
		$('#dropbox_location').css('display', 'none');
	}

	/* Time interval hide/show option */
	if ($('#time_period').val() == 'Each 6 hours') {
		$('#backup_min_hour').css('display', 'none');
	}
	else {
		$('#backup_min_hour').css('display', 'block');
	}

	$('#time_period').change(function () {
		if ($('#time_period').val() == 'Each 6 hours') {
			$('#backup_min_hour').css('display', 'none');
		}
		else {
			$('#backup_min_hour').css('display', 'block');
		}
	});

	$('.save_file_type').click(function () {
		if ($(this).hasClass('all')) {
			$('#file_tree_content').show();
			$('#sql_tables .checkbox').attr('checked',true);
			$('#select_all_tables').attr('checked', true);
		} else if ($(this).hasClass('files')) {
			$('#select_all_tables').attr('checked', false);
			$('#sql_tables .checkbox').attr('checked',false);
			$('#sql_tables').fadeOut(1000);
			$('#file_tree_content').fadeIn(1000);
		} else if ($(this).hasClass('database')) {
			$('.checked').each(function () {
				$(this).removeClass('checked');
			});
			$('#file_tree_content').fadeOut(1000);
			$('#select_all_tables').attr('checked', true);
		}

	});

	$('.delete_backup_file').live('click',function(event){
		if(!confirm('Are you sure?')){
			event.preventDefault();		}

	});

	$('#select_service_submit').click(function(event){
		var email = $('#email').attr('checked');
		var folder = $('#folder').attr('checked');
		var error = false;
		if(email == 'checked'){
			if($('#email_address').val() == ''){
				$('#email_address').css('border','1px solid #ff0000');
				error = true;
			}
		}
		if(folder == 'checked'){
			if($('#server_folder').val() == ''){
				$('#server_folder').css('border','1px solid #ff0000');
				error = true;
			}
		}
		if(error){
			event.preventDefault();
		}

	});

});

function pause(ms)
{
	var date = new Date();
	var curDate = null;
	do { curDate = new Date(); }
	while(curDate-date < ms);
}
function FileTreeUN(json) {
	if(control == 0){
		console.log(json);
		var path = '';
		$.each(json, function (i, item) {
			path += item;
		});
		$('#file_tree').fileTree({
			root:path,
			expandSpeed:1000,
			collapseSpeed:1000,
			multiFolder:false
		});
		control++;
	}
}