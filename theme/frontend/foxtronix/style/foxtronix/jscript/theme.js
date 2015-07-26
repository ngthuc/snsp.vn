$Behavior.macThemeInit = function(){
	
  var macAdBlock = $('.js_ad_space_parent'); // ad block
  var macIndexMemberPage = $('#js_controller_core_index-member');
  
  //var macUserImage = $('#nb_name');
  var macFavorites = $('#nb_favorites');
  var macFriendsOnline = $('#js_block_border_friend_mini');
  var macLogLogin = $('#js_block_border_log_login');
  var macRight = $('#right');
  var macTop = macRight.height();
  
  $(window).scroll(function (event) {
	var macYpos = $(this).scrollTop();
	if (macYpos >= macTop) {
  
		if(macAdBlock.length) { macAdBlock.addClass('mac_fixed'); }
    
    if(macIndexMemberPage.length) {
  		macLogLogin.hide();
  		macFriendsOnline.hide();
  		macFavorites.addClass('mac_fixed');
    }

	} else {
		if(macAdBlock.length) { macAdBlock.removeClass('mac_fixed'); }
		
    if(macIndexMemberPage.length) {
  		macLogLogin.show();
  		macFriendsOnline.show();
  		macFavorites.removeClass('mac_fixed');
    }
	}
	
  });
    
};