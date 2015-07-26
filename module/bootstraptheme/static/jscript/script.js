$Behavior.bootstraptheme = function()
{
	/*
		SlidesJS 3.0.4 http://slidesjs.com
		(coffee) 2013 by Nathan Searles http://nathansearles.com
		Updated: June 26th, 2013
		Apache License: http://www.apache.org/licenses/LICENSE-2.0
	*/
	$("#slides").slidesjs({
		play: {
      active: true,
        // [boolean] Generate the play and stop buttons.
        // You cannot use your own buttons. Sorry.
      effect: "fade",
        // [string] Can be either "slide" or "fade".
      interval: 7000,
        // [number] Time spent on each slide in milliseconds.
      auto: true,
        // [boolean] Start playing the slideshow on load.
      swap: false,
        // [boolean] show/hide stop and play buttons
      pauseOnHover: true,
        // [boolean] pause a playing slideshow on hover
      restartDelay: 2500
        // [number] restart delay on inactive slideshow
    },
    navigation: {
      active: true,
        // [boolean] Generates next and previous buttons.
        // You can set to false and use your own buttons.
        // User defined buttons must have the following:
        // previous button: class="slidesjs-previous slidesjs-navigation"
        // next button: class="slidesjs-next slidesjs-navigation"
      effect: "fade"
        // [string] Can be either "slide" or "fade".
    },
     pagination: {
      active: false
        // [boolean] Create pagination items.
        // You cannot use your own pagination. Sorry.
    },
        width: 940,
        height: 335
      });
	$("#slides").mouseenter(function(){
		$('.slidesjs-previous').show();
		$('.slidesjs-next').show();
	}).mouseleave(function(){
		$('.slidesjs-previous').hide();
		$('.slidesjs-next').hide();
	});

};