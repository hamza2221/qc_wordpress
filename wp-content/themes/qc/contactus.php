<?php
if(isset($_POST['email'])) {
	
     
    function died($error) {
        // your error code can go here
		
        $str = "We are very sorry, but there were error(s) found with the form you submitted. ";
        $str.= "These errors appear below.<br />";
        $str.= "Please fix these errors.<br />".$error;
        echo json_encode(array("message"=>$str));
    }
     
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
    $first_name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $comments = $_POST['comments']; // required
	$contact_number = $_POST['contact_number']; // required
        $subject = $_POST['subject'];
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "Name: ".clean_string($first_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
	$email_message .= "Contact Number: ".clean_string($contact_number)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
     
    $email_to = "miftikhan76@gmail.com";
    $email_subject = "Contact - ".$subject;
	
	// create email headers
	$from = "info@qualityclix.com";
	$headers = "From: " . $from . "\r\n".
	"Reply-To: " . $from . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
	
	if(mail($email_to, $email_subject, $email_message, $headers,'-f '.$from)){
		echo json_encode(array("message"=>"Message has successfully been sent!"));
	}else{
		echo json_encode(array("message"=>print_r(error_get_last(),true)));
	}
}
?>