$(document).ready(function(){
	$('.screenshot_link').click(function(){
		$('#screenShot').fadeIn();
	});
	
	$('.title span').click(function(){
		$('#screenShot').fadeOut();
	});
	
	$('.toggle').click(function(){
		$('#navigation ul').slideToggle();
	});
	
	$(window).bind('scroll', function() {
         if ($(window).scrollTop() > 60) {
             $('#navigation').addClass('header_scrolled');
			 
         }
         else {
            $('#navigation').removeClass('header_scrolled');
			 $('#home').css("padding-top","0px");
			
         }
    });
	
	
	
	
	

/*------------------------------------- select nav---*/
$(document).ready(function () {
		$(document).on("scroll", onScroll);
 		i=0;
		$('a[href^="#"]').on('click', function (e) {
			i++;
			
			console.log(i);
			e.preventDefault();
			$(document).off("scroll");
 
			$('a').each(function () {
				$(this).removeClass('selected');
				
			})
			$(this).addClass('selected');
 
			var oldtarget = this.hash;
			
			var target=oldtarget;
			
			
			var lastFive = target.substr(target.length - 6); // => "Tabs1"
				
				console.log(lastFive);
			if(lastFive=="layout"){
				if(i==1){
				console.log("here");
					
				$(target).css("padding-top","180px");	
				if(target=="#home-layout"){$("#home-layout").css("padding-top","130px");}
				
				
			}
			else{
				$(target).css("padding-top","130px");
				if(target=="#home-layout"){$("#home-layout").css("padding-top","92px");}
				}
			
			
			$target = $(target);
			$('html, body').stop().animate({
				
				'scrollTop': $target.offset().top
			}, 500, 'swing', function () {
				window.location.hash = target;
				$(document).on("scroll", onScroll);
			});
			}
			
				
			
			
		});
	});
 



	
});

 /* ==============================================
Page Loader
=============================================== */

'use strict';

$(window).load(function() {
	$(".loader-item").delay(700).fadeOut();
	$("#pageloader").delay(1200).fadeOut("slow");
});



 /* ==============================================
Revolution Slider
=============================================== */

var revapi;

jQuery(document).ready(function() {

	   revapi = jQuery('.tp-banner').revolution(
		{
			delay:900000,
			startwidth:1170,
			startheight:550,
			hideThumbs:10,
			fullWidth:"on",
			forceFullWidth:"on"
		});

});

 /* ======================= */	
 
 
/* var nav = $('.content-nav');
if (nav.length) {
  var contentNav = nav.offset().top;
  ...continue to set up the menu
}*/



function onScroll(event){
		var scrollPosition = $(document).scrollTop();
		$('#navigation ul li a').each(function () {
				
			var currentLink = $(this);
			
			var refElement = $(currentLink.attr("href"));
			
			if (refElement.position().top <= scrollPosition && refElement.position().top + refElement.height() >scrollPosition) {
				$('#navigation ul li a').removeClass("selected");
				currentLink.addClass("selected");
				
			}
			else{
				currentLink.removeClass("selected");
			}
		});
	}

/*function onScroll(event){
		var scrollPosition = $(document).scrollTop();
		$('#navigation ul li a').each(function () {
			var currentLink = $(this);
			var refElement = $(currentLink.attr("href"));
			if (refElement.position().top <= scrollPosition && refElement.position().top + refElement.height() > scrollPosition) {
				$('#navigation ul li a').removeClass("selected");
				currentLink.addClass("selected");
			}
			else{
				currentLink.removeClass("selected");
			}
		});
	}*/