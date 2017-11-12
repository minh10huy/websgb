/* ----------------- Start Document ----------------- */
(function($){
"use strict";

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
	/*  Flexslider
	/*----------------------------------------------------*/
	$('.testimonials-slider').flexslider({
		 animation: "fade",
		 directionNav: false
	});


	$('.simple-slider').flexslider({
		animation: "fade",
		controlNav: false,
		prevText: "",           //String: Set the text for the "previous" directionNav item
		nextText: ""
	});


	/*----------------------------------------------------*/
	/*  Owl Carousel
	/*----------------------------------------------------*/
	$('.logo-carousel').owlCarousel({
	  loop: false,
	  margin:10,
	  nav:true,
	  responsive:{
			0:{
				 items:1
			},
			600:{
				 items:3
			},
			1000:{
				 items:5
			}
	  },
	  navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
	});

	$('.owl-carousel').owlCarousel({
	  loop: false,
	  margin:30,
	  nav:true,
	  responsive:{
			0:{
				 items:1
			},
			600:{
				 items:1
			},
			768:{
				 items:2
			},
			1000:{
				 items:3
			}
	  },
	  navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
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
	/*  Counters
	/*----------------------------------------------------*/
    $('.counter').counterUp({
        delay: 100,
        time: 1600
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
	/*  Projects Filtering
	/*----------------------------------------------------*/

	$('.option-set.alt li').on('click',function(event) {
	  event.preventDefault();

	  var item = $(".projects a"),
	  image = item.find('.projects a img');
	  item.removeClass('clickable unclickable');
	  image.stop().animate({opacity: 1});
	  var filter = $(this).children('a').data('filter');
	  item.filter(filter).addClass('clickable');
	  item.filter(':not('+filter+')').addClass('unclickable');
	  item.filter(':not('+filter+')').find('.themes-list a img').stop().animate({opacity: 0.2});
	});

	$('#filters a').click(function(e){
		 e.preventDefault();

		 //var selector = $(this).attr('data-filter');

		 $(this).parents('ul').find('a').removeClass('selected');
		 $(this).addClass('selected');
	});

	$('.projects a').on('click',function(e) {
	  if($(this).hasClass('unclickable')){
			e.preventDefault();
		}
	});

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

})(this.jQuery);
