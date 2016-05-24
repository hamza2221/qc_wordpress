<?php

/*
  Plugin Name: Mera Contact Form
  Plugin URI: http://wp.tutsplus.com/author/barisunver/
  Description: A simple contact form for simple needs. Usage: <code>[contact email="your@email.address"]</code>
  Version: 1.0
  Author: Barış Ünver
  Author URI: http://beyn.org/
 */


/* * ********************************
  Global Variables
 * ******************************** */

include ('/includes/classAdmin.php');
new Mof_Admin();
include ('/includes/classFrontend.php');
new Mof_Frontend();

function helper_iif($input,$true_value,$false_value){
	if($input==true){
		return $true_value;
	}
	else{
		return $false_value;
	}
}