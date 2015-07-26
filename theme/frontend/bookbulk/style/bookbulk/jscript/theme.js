$Behavior.fbThemeInit = function(){
	
  var fbAdBlock = $('.js_ad_space_parent'); // ad block
  var fbIndexMemberPage = $('#js_controller_core_index-member');
  
  //var fbUserImage = $('#nb_name');
  var fbFavorites = $('#nb_favorites');
  var fbFriendsOnline = $('#js_block_border_friend_mini');
  var fbLogLogin = $('#js_block_border_log_login');
  var fbRight = $('#right');
  var fbTop = fbRight.height();
  
  $(window).scroll(function (event) {
	var fbYpos = $(this).scrollTop();
	if (fbYpos >= fbTop) {
  
		if(fbAdBlock.length) { fbAdBlock.addClass('fb_fixed'); }
    
    if(fbIndexMemberPage.length) {
  		fbLogLogin.hide();
  		fbFriendsOnline.hide();
  		fbFavorites.addClass('fb_fixed');
    }

	} else {
		if(fbAdBlock.length) { fbAdBlock.removeClass('fb_fixed'); }
		
    if(fbIndexMemberPage.length) {
  		fbLogLogin.show();
  		fbFriendsOnline.show();
  		fbFavorites.removeClass('fb_fixed');
    }
	}
	
  });
};