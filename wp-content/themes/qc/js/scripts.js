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
	
	$('.isotop_tabs').click(function(){
		$('#isotops').toggleClass('active_isotops');
	});
	
	
	

/*------------------------------------- select nav---*/
$(document).ready(function () {
		$(document).on("scroll", onScroll);
 		i=0;
		$('#navigation ul li a[href^="#"]').on('click', function (e) {
		//$('#navigation ul li a').on('click', function (e) {	
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
			if(i==1){
				console.log("here");
					
				$(target).css("padding-top","180px");	
				if(target=="#home-layout"){$("#home-layout").css("padding-top","130px");}
				
				
			}
			else{
				$('#services-layout').css('padding-top','50px');
				$('#whyUs-layout').css('padding-top','0px');
				$('#testimonials-layout').css('padding-top','50px');
				$('#portfolio-layout').css('padding-top','50px');
				$('#contact-layout').css('padding-top','50px');
				
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
			
		});
	});
 



	
	
	$('#isotops li').click(function(){
		$('#isotops li').removeClass('selected');
		$(this).addClass('selected');
		$('#isotops').removeClass('active_isotops');
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
function project(project_id){
	var data = {
        'action': 'get_post_information',
	'post_id': 120
    };

    $.post(ajaxurl, data, function(response) {
        alert('Server response from the AJAX URL ' + response);
    });

	$('#pro_img').html(''); 
	 var imgTag = "<div class='item active'><img src='images/projects/"+project_id+"/1.png'></div>";
	  var imgTag1 = "<div class='item'><img src='images/projects/"+project_id+"/2.png'></div>";
	 
	 $('#pro_img').prepend(imgTag);
	 $('#pro_img').prepend(imgTag1);
	 
	 
}



   

