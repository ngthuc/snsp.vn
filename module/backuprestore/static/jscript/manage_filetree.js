
$(document).ready( function() {
    $.ajaxCall('backuprestore.getBaseDir');    
    var paths=[];
    
    $('.filesave').click(function(){
        $('.checked').each(function() { 
            paths.push($(this).attr('rel'));
        });
        $.ajaxCall('backuprestore.archive', 'text='+paths);
        paths=[];
    });
     
    $('.toggle').click(function(){
        switch($(this).attr('name'))
        {
            case 'all':
                console.log($(this).attr('name'));
                $('#file_tree .checkbox').click();
                return false;
                break
            case 'none':
                $('#file_tree .checkbox').removeClass('checked');
                console.log($(this).attr('name'));
                return false;
                break
            case 'invert':
                console.log($(this).attr('name'));
                $('#file_tree .checkbox').not('.partial, .directory.expanded>.checkbox').click();
                return false;
                break
        } 
    });   
});

function FileTreeUN(json){
    var path='';
    $.each(json, function(i, item) {
        path+=item;
    });
    $('#file_tree').fileTree({
        root:  path,  
        expandSpeed: 1000,
        collapseSpeed: 1000,
        multiFolder: false
    });
}