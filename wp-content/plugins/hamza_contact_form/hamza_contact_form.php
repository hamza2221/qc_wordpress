<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<?php
/*
Plugin Name: Hamza's Contact Form Plugin
Plugin URI: http://wp.tutsplus.com/author/barisunver/
Description: A simple contact form for simple needs. Usage: <code>[contact email="your@email.address"]</code>
Version: 1.0
Author: Barış Ünver
Author URI: http://beyn.org/
*/
 
/***************************
    Adding all scripts
***************************/
add_action( 'init', 'contact_form_scripts' );

function contact_form_scripts() {
    wp_register_script( "my_voter_script",  plugins_url( '/js/script_admin_side.js', __FILE__ ), array('jquery') );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'my_voter_script' );

}
add_action( 'init', 'jquery_validation_scripts' );

function jquery_validation_scripts() {
   wp_register_script( "jquery_validation",  plugins_url( '/js/script_validation.js', __FILE__ ) );    
}

add_action( 'wp_enqueue_scripts', 'testi' );
function testi(){
    wp_enqueue_script( 'jquery_validation' );

}



function wptuts_get_the_ip() {
    if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
        return $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    elseif (isset($_SERVER["HTTP_CLIENT_IP"])) {
        return $_SERVER["HTTP_CLIENT_IP"];
    }
    else {
        return $_SERVER["REMOTE_ADDR"];
    }
}

function wptuts_contact_form_sc( $atts ) {
 
    // This line of comment, too, holds the place of the brilliant yet simple shortcode that creates our contact form. And yet you're still wasting your time to read this comment. Bravo.

    extract( shortcode_atts( array(
    // if you don't provide an e-mail address, the shortcode will pick the e-mail address of the admin:
    "email" => get_bloginfo( 'admin_email' ),
    "subject" => "",
    "label_name" => "Your Name",
    "label_email" => "Your E-mail Address",
    "label_subject" => "Subject",
    "label_message" => "Your Message",
    "label_submit" => "Submit",
    // the error message when at least one of the required fields are empty:
    "error_empty" => "Please fill in all the required fields.",
    // the error message when the e-mail address is not valid:
    "error_noemail" => "Please enter a valid e-mail address.",
    // and the success message when the e-mail is sent:
    "success" => "Thanks for your e-mail! We'll get back to you as soon as we can."
), $atts ) );

    // if the <form> element is POSTed, run the following code
if ( isset($_POST['send']) ) {
    $error = false;
    // set the "required fields" to check
    $required_fields = array( "your_name", "email", "message", "subject" );
 	echo $_POST['subject'];
    // this part fetches everything that has been POSTed, sanitizes them and lets us use them as $form_data['subject']
    foreach ( $_POST as $field => $value ) {
		//echo $field."-".$value."<br>";
        if ( get_magic_quotes_gpc() ) {
			
            $value = stripslashes( $value );
        }
        $form_data[$field] = strip_tags( $value );
    }
 
    // if the required fields are empty, switch $error to TRUE and set the result text to the shortcode attribute named 'error_empty'
    foreach ( $required_fields as $required_field ) {
        $value = trim( $form_data[$required_field] );
        if ( empty( $value ) ) {
            $error = true;
            $result = $error_empty;
        }
    }
 
    // and if the e-mail is not valid, switch $error to TRUE and set the result text to the shortcode attribute named 'error_noemail'
    if ( ! is_email( $form_data['email'] ) ) {
        $error = true;
        $result = $error_noemail;
    }
 
    if ( $error == false ) {
        $email_subject = "[" . get_bloginfo( 'name' ) . "] " . $form_data['subject'];
        $email_message = $form_data['message'] . "\n\nIP: " . wptuts_get_the_ip();
        $headers  = "From: " . $form_data['name'] . " <" . $form_data['email'] . ">\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\n";
        $headers .= "Content-Transfer-Encoding: 8bit\n";
        wp_mail( $email, $email_subject, $email_message, $headers );
        $result = $success;
        $sent = true;
    }
    // but if $error is still FALSE, put together the POSTed variables and send the e-mail!
    if ( $error == false ) {
        // get the website's name and puts it in front of the subject
        $email_subject = "[" . get_bloginfo( 'name' ) . "] " . $form_data['subject'];
        // get the message from the form and add the IP address of the user below it
        $email_message = $form_data['message'] . "\n\nIP: " . wptuts_get_the_ip();
        // set the e-mail headers with the user's name, e-mail address and character encoding
        $headers  = "From: " . $form_data['your_name'] . " <" . $form_data['email'] . ">\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\n";
        $headers .= "Content-Transfer-Encoding: 8bit\n";
        // send the e-mail with the shortcode attribute named 'email' and the POSTed data
        wp_mail( $email, $email_subject, $email_message, $headers );
        // and set the result text to the shortcode attribute named 'success'
        $result = $success;
        // ...and switch the $sent variable to TRUE
        $sent = true;
		
		global $wpdb;
		$wpdb->insert( "contactus_messages", array( 'sender_email' => $_POST['email'],'status' => 0 ) );
		$message_id=$wpdb->insert_id;
		
	//saving posted data to database			
	foreach ( $_POST as $field => $value ) {
		$data['message_id']=$message_id;
		$data['meta_key']=$field;
		$data['meta_value']=$value;
		$wpdb->insert( "contactus_messages_meta", $data );
    }

    }
}

// if there's no $result text (meaning there's no error or success, meaning the user just opened the page and did nothing) there's no need to show the $info variable
if ( $result != "" ) {
    $info = '<div class="info">' . $result . '</div>';
}
// anyways, let's build the form! (remember that we're using shortcode attributes as variables with their names)
$email_form = '<form id="_contact" class="contact-form" method="POST" action="#_contact">
    <div >
        <label for="cf_name">' . $label_name . ':</label>
        <input type="text" name="your_name" id="cf_name" size="50" maxlength="50" value="' . $form_data['your_name'] . '" />
    </div>
    <div>
        <label for="cf_email">' . $label_email . ':</label>
        <input type="text" name="email" id="cf_email" size="50" maxlength="50" value="' . $form_data['email'] . '" />
    </div>
    <div>
        <label for="cf_subject">' . $label_subject . ':</label>
        <input type="text" name="subject" id="cf_subject" size="50" maxlength="50" value="' . $subject . $form_data['subject'] . '" />
    </div>
    <div>
        <label for="cf_message">' . $label_message . ':</label>
        <textarea name="message" id="cf_message" cols="50" rows="15">' . $form_data['message'] . '</textarea>
    </div>
    <div>
        <input type="submit" value="' . $label_submit . '" name="send" id="cf_send" />
    </div>
</form>';
if ( $sent == true ) {
    return $info;
} else {
    return $info . $email_form;
}
 
}
add_shortcode( 'hamza_contact', 'wptuts_contact_form_sc' );



add_action( 'wp_enqueue_scripts', 'my_scripts' );
function my_scripts() {
	wp_enqueue_script( 'test_script', plugins_url( '/js/my.js', __FILE__ ));
	
}

add_action("admin_menu","contact_form_menu_setting");

function contact_form_menu_setting(){
		add_menu_page(
			'Hamza Contact Form',
			'Contact Form Setting <span class="plugin-count">2</span>',
			'manage_options',
			'hamza_contact_form',
			'contact_form_view'
    	);
	}

function contact_form_view(){
		echo "<h1>Messages From Contact Us Form</h1>";
        

        global $wpdb;
        //$results = $wpdb->get_results( 'SELECT * FROM contactus_messages as c_m JOIN contactus_messages_meta as c_m_m
        //ON c_m.id=c_m_m.message_id ' , OBJECT );
        $results = $wpdb->get_results( 'SELECT * FROM contactus_messages' , OBJECT );
         //get_template_part("view/list");
         //echo locate_template(plugins_url( __FILE__ )."/view/list", true);
        //load_template(plugin_dir_path( __FILE__ )."/view/list.php"));
        include(plugin_dir_path( __FILE__ )."/view/list.php");

	}

function contact_form_option(){
		register_setting();
	}
//add_action("wp_ajax_show_message_details", "show_message_details");


//function show_message_details(){
//    global $wpdb;        
//    $results = $wpdb->get_results( 'SELECT * FROM contactus_messages_meta where message_id="'.$_GET['msg_id'].'"' , OBJECT );
//    print_r($results);
//    wp_die();
//}
?>
<div id="dialog" title="Basic dialog">
  
</div>