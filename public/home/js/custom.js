/* ----------------- Start Document ----------------- */
$(document).ready(function(){

	/*----------------------------------------------------*/
	/* Navigation
	/*----------------------------------------------------*/
	$('ul.menu').superfish({
		 delay:       200,                 // delay on mouseout
		 speed:       200,                         // faster animation speed
		 speedOut:    100,                         // speed of the closing animation
		 animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
		 autoArrows:  true,                        // disable generation of arrow mark-up
		 onShow: function() {
				 var borderSpan = $('<span style="display:none; top:0px;" class="hover-border"></span>');
			$( this ).append(borderSpan);
			},
			onHide: function() {
				 $( "span.hover-border" ).remove();
			},
	});

	// Search
	$('li.search').click(function(e){
		e.preventDefault();
		$('.search-container').fadeIn(150);
	});

	$('.search-container .close-search a').click(function(e){
		e.preventDefault();
		$('.search-container').fadeOut(150);
	});

	$(document).mouseup(function (e) {
		 var container = $(".search-container");
		 if (!container.is(e.target) && container.has(e.target).length === 0) { container.fadeOut(150); }
	});


	/*--------------------------------------------------*/
	/*  Mobile Navigation
	/*--------------------------------------------------*/
	var jPanelMenu = $.jPanelMenu({
	  menu: '#responsive',
	  animated: false,
	  duration: 200,
	  keyboardShortcuts: false,
	  closeOnContentClick: true
	});


	// Desktop devices
	$('.menu-trigger').click(function(){
	  var jpm = $(this);

	  if( jpm.hasClass('active') )
	  {
	    jPanelMenu.off();
	    jpm.removeClass('active');
	  }
	  else
	  {
	    jPanelMenu.on();
	    jPanelMenu.open();
	    jpm.addClass('active');
			// Removes SuperFish Styles
		$('#jPanelMenu-menu').removeClass('menu');
		$('ul#jPanelMenu-menu li').removeClass('dropdown');
		$('ul#jPanelMenu-menu li ul').removeAttr('style');
		$('ul#jPanelMenu-menu li div').removeClass('mega');
		$('ul#jPanelMenu-menu li div').removeAttr('style');
		$('ul#jPanelMenu-menu li div div').removeClass('mega-container');
	  }
	  return false;
	});

	$(window).resize(function (){
		var winWidth = $(window).width();
		if(winWidth>992) {
			jPanelMenu.close();
		}
	});


	// Mobile Search Menu Trigger
	$('.search-trigger')
	.on('click', function(){
		$('.responsive-search').slideToggle(200);
		$('.search-trigger').toggleClass("active");
	});

	/*----------------------------------------------------*/
	/*  Back to Top
	/*----------------------------------------------------*/
	  var pxShow = 400; // height on which the button will show
	  var fadeInTime = 400; // how slow / fast you want the button to show
	  var fadeOutTime = 400; // how slow / fast you want the button to hide
	  var scrollSpeed = 400; // how slow / fast you want the button to scroll to top.

	  $(window).scroll(function(){
		 if($(window).scrollTop() >= pxShow){
			$("#backtotop").fadeIn(fadeInTime);
		 } else {
			$("#backtotop").fadeOut(fadeOutTime);
		 }
	  });

	  $('#backtotop a').click(function(){
		 $('html, body').animate({scrollTop:0}, scrollSpeed);
		 return false;
	  });

		/*----------------------------------------------------*/
			/*  See All Projects Button
			/*----------------------------------------------------*/
			function resizeBox() {
				var divHeight = $('.projects.latest a img, .project-category img, .full-width.projects a img').height();
				$('.see-all').css('min-height', divHeight+'px');
			}

			$(window).load(boxfunction);
			$(window).on('resize',boxfunction);

			function boxfunction() {
			    resizeBox();
			}


	/*----------------------------------------------------*/
 	/*  LightBox
 	/*----------------------------------------------------*/
 	$(document).ready(function() {
 		var $gallery = $('.gallery a').simpleLightbox();
 	 });

 	/*----------------------------------------------------*/
 	/*  Tabs
 	/*----------------------------------------------------*/

 	var $tabsNav    = $('.tabs-nav'),
 	$tabsNavLis = $tabsNav.children('li');

 	$tabsNav.each(function() {
 		 var $this = $(this);

 		 $this.next().children('.tab-content').stop(true,true).hide()
 		 .first().show();

 		 $this.children('li').first().addClass('active').stop(true,true).show();
 	});

 	$tabsNavLis.on('click', function(e) {
 		 var $this = $(this);

 		 $this.siblings().removeClass('active').end()
 		 .addClass('active');

 		 $this.parent().next().children('.tab-content').stop(true,true).hide()
 		 .siblings( $this.find('a').attr('href') ).fadeIn();

 		 e.preventDefault();
 	});
 	var hash = window.location.hash;
 	var anchor = $('.tabs-nav a[href="' + hash + '"]');
 	if (anchor.length === 0) {
 		 $(".tabs-nav li:first").addClass("active").show(); //Activate first tab
 		 $(".tab-content:first").show(); //Show first tab content
 	} else {
 		 console.log(anchor);
 		 anchor.parent('li').click();
 	}

// ------------------ End Document ------------------ //

});
