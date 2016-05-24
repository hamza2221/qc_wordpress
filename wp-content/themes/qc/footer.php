<footer>
	<div class="container">
    	<div class="row">
        	<div class="col-md-3 col-sm-3 margin-bottom-25">
            	<h1>QUALITYCLIX</h1>
                <img src="<?php bloginfo('template_url');?>/images/white_logo.PNG">
            </div>
            <div class="col-md-3 col-sm-3 margin-bottom-25">
            	<h1>Hot Links</h1>
                <ul>
                    <li><a href="#home-layout">Home</a></li>
                    <li><a href="#services-layout">Our services</a></li>
                    <li><a href="#whyUs-layout">Why Us</a></li>
                    <li><a href="#testimonials-layout">Testimonials</a></li>
                    <li><a href="#portfolio-layout">Portfolio</a></li>
                    <li><a href="#contact-layout">Contact Us</a></li>
                </ul>
            </div>
            
             <div class="col-md-3 col-sm-3 margin-bottom-25">
             	<h1>Get In Touch   </h1>
                <!--<p><i class="fa fa-mobile"></i> +92-321-5155603</p>
                <p><i class="fa fa-map-marker"></i> 69 - C Satellite Town, Sargodha, Pakistan</p>-->
                <p><i class="fa fa-envelope"></i> <a href="#">info@qualityclix.com</a></p>
             </div>
             
             <div class="col-md-3 col-sm-3 social_icons">
             	<!--<h1>Catch Us on Social Media</h1>
                <a href="#" class="padding-right-10"><i class="fa fa-facebook"></i> </a> 
                <a href="#" class="padding-right-10"><i class="fa fa-twitter"></i> </a> 
                <a href="#" class="padding-right-10"><i class="fa fa-youtube"></i> </a> -->
             </div>
        </div>
        <div class="copyright">
        Copyrights &copy; 2016. <A href="#">Qualityclix</A>. All Rights Reserved.
        </div>
    </div>
</footer>


<section id="screenShot">
	<div class="container">
    	<div class="title">
        	
            <span><img src="<?php bloginfo('template_url');?>/images/close_btn.png"></span>
            <div class="nav_btn" style="position: absolute !important;left: 10px !important;top: -1px !important; z-index:80000;">
                <a class="navigate pre_nav" href="#carousel-2" data-slide="prev"><i class="fa fa-chevron-left fa-4"></i></a>
                <a class="navigate next_nav" href="#carousel-2" data-slide="next"><i class="fa fa-chevron-right fa-4"></i></a>
            </div>
        </div>
        <div class="body">
            <h1 id="wait_msg">Please Wait Images are loading</h1>
        	<div class="well-none">
            <div id="carousel-2" class="carousel slide">

                <div id="pro_img" class="carousel-inner">

                   
                </div>
                
            </div>
            <!--/myCarousel-->
        </div>
        	
        </div>
    </div>
</section>

<!------------------------------------------------------portfolio----->




<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery_2.1.1.js"></script>


<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.appear.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/waypoints.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.sticky.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/owl.carousel.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.isotope.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/rev-slider/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/rev-slider/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.mixitup.min.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/scripts.js"></script>
<script type="text/javascript">
$(function(){
    $('#Container').mixItUp();
});
			$( "#frm_contactus" ).submit(function( event ) {
				$( "#result" ).fadeOut();
			  // Stop form from submitting normally
			  event.preventDefault();
			 
			  // Get some values from elements on the page:
			  var $form = $( this ),
				name = $form.find( "input[name='name']" ).val(),
				email = $form.find( "input[name='email']" ).val(),
				contact_number = $form.find( "input[name='contact_number']" ).val(),
                                subject = $form.find( "input[name='subject']" ).val(),
				comments = $form.find( "textarea[name='comments']" ).val(),
				url = $form.attr( "action" );
			 
			  // Send the data using post
			  var posting = $.post( url, { name: name,email:email,contact_number:contact_number,subject:subject,comments:comments } );
			 
			  // Put the results in a div
			  posting.done(function( data ) {
				var obj = jQuery.parseJSON( data );
				$( "#result" ).empty().append( obj.message );
				$( "#result" ).fadeIn();
			  });
			});
                        
		</script>
</body>
</html>