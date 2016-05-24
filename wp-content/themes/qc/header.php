<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>QualityClix - Delivering IT wish list!</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/font-awesome.min.css">
<link rel="icon" href="<?php bloginfo('template_url');?>/images/favicon.ico"  sizes="16x16">
<!-------------------slider---->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/settings.css" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/responsive.css" />
<!-------------------End slider---->
<style type="text/css">
    .wpcf7 .screen-reader-response {
    display: none;
}

.contact-form label, .contact-form input, .contact-form textarea { display: block; margin: 10px 0; }
.contact-form label { font-size: larger; }
.contact-form input { padding: 5px; }
#cf_message { width: 90%; padding: 10px; }
#cf_send { padding: 5px 10px; }
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}
</style>

</head>

<body>
<header>
	<div id="top">
    	<div class="container">
        	<span><i class="fa fa-envelope"></i> <?php echo get_option( "admin_email" ); ?></span>             
            <!--<span class="padding-left-20"><i class="fa fa-phone"></i> (+92)-321-5155603</span>             -->
        </div>
    </div>
    
    <section id="navigation">
    	<div class="container">
        	<div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6"><a href="<?php echo get_site_url() ?>" class="logo"><img src="<?php bloginfo('template_url');?>/images/logo.png"></a></div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                	<div class="toggle"><i class="fa fa-bars"></i></div>
                    <ul>
                        <li><a href="<?php echo get_site_url();  ?>#home-layout" class="selected">Home</a></li>
                        <li><a href="<?php echo get_site_url();  ?>#services-layout">Our services</a></li>
                        <li><a href="<?php echo get_site_url();  ?>#whyUs-layout">Why Us</a></li>
                        <li><a href="<?php echo get_site_url();  ?>#testimonials-layout">Testimonials</a></li>
                        <li><a href="<?php echo get_site_url();  ?>#portfolio-layout">Portfolio</a></li>
                        <li><a href="<?php echo get_site_url();  ?>#contact-layout">Contact Us</a></li>
                    </ul>
                    <!--<ul class="social_media">
                        <li><a href="#" class="social fb" title="Facebook"></a></li>
                        <li><a href="#" class="social twt" title="Facebook"></a></li>
                        <li><a href="#" class="social linked" title="Facebook"></a></li>
                    </ul>-->
                </div>
            </div>
        </div>
    </section>
    
</header>
