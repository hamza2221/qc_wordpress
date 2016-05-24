<?php

class Mof_Frontend {

    private $form_errors = array();

    function __construct() {
        add_shortcode('contact_form_dm', array($this, 'shortcode'));
    }

    /*     * ********************************
      Adding scripts
     * ******************************** */

    static public function form() {
        echo '<form id="commentForm" action="' . $_SERVER['REQUEST_URI'] . '" method="post">';
        echo '<p>';
        echo 'Your Name (required) <br/>';
        echo '<input required=""  type="text" name="mof_Your_Name" value="' . $_POST["mof_Your_Name"] . '" size="40" />';
        echo '</p>';
        echo '<p>';
        echo 'Your Email (required) <br/>';
        echo '<input type="text" name="mof_Email" value="' . $_POST["mof_Email"] . '" size="40" />';
        echo '</p>';
        echo '<p>';
        echo 'Subject (required) <br/>';
        echo '<input type="text" name="mof_Your_Subject" value="' . $_POST["mof_Your_Subject"] . '" size="40" />';
        echo '</p>';
        echo '<p>';
        echo 'Your Message (required) <br/>';
        echo '<textarea rows="10" cols="35" name="mof_Your_Message">' . $_POST["mof_Your_Message"] . '</textarea>';
        echo '</p>';
        echo '<p><input type="submit" name="form-submitted" value="Send"></p>';
        echo '</form>';
    }

    public function validate_form($name, $email, $subject, $message) {

// If any field is left empty, add the error message to the error array
        if (empty($name) || empty($email) || empty($subject) || empty($message)) {
            array_push($this->form_errors, 'No field should be left empty');
        }

// if the name field isn't alphabetic, add the error message
        if (strlen($name) < 4) {
            array_push($this->form_errors, 'Name should be at least 4 characters');
        }

// Check if the email is valid
        if (!is_email($email)) {
            array_push($this->form_errors, 'Email is not valid');
        }
    }

    public function send_emailorg($name, $email, $subject, $message) {

// Ensure the error array ($form_errors) contain no error
        if (count($this->form_errors) < 1) {

// sanitize form values
            $name = sanitize_text_field($name);
            $email = sanitize_email($email);
            $subject = sanitize_text_field($subject);
            $message = esc_textarea($message);

// get the blog administrator's email address
            $to = get_option('admin_email');

            $headers = "From: $name <$email>" . "\r\n";

// If email has been process for sending, display a success message
            if (wp_mail($to, $subject, $message, $headers))
                echo '<div style="background: #3b5998; color:#fff; padding:2px;margin:2px">';
            echo 'Thanks for contacting me, expect a response soon.';
            echo '</div>';
        }
    }

    public function process_functions() {
        if (isset($_POST['form-submitted'])) {

// call validate_form() to validate the form values
            $this->validate_form($_POST['mof_Your_Name'], $_POST['mof_Email'], $_POST['mof_Your_Subject'], $_POST['mof_Your_Message']);
            
// display form error if it exist
            if (!empty($this->form_errors)) {
                echo "jere";
                foreach ($this->form_errors as $error) {
                    echo '<div>';
                    echo '<strong>ERROR</strong>:';
                    echo $error . '<br/>';
                    echo '</div>';
                }
            }else{
                $this->mof_save_data();
                echo 'Thanks for contacting me, expect a response soon.';
            }
        }

        //$this->send_email($_POST['mof_Your_Name'], $_POST['mof_Email'], $_POST['mof_Your_Subject'], $_POST['mof_Your_Message']);

        self::form();
    }

    public function shortcode() {
        ob_start();
        $this->process_functions();
        return ob_get_clean();
    }

    public function mof_save_data() {
        global $wpdb;
        $wpdb->insert("contactus_messages", array('sender_email' => $_POST['mof_Email'], 'status' => 0));
        $message_id = $wpdb->insert_id;
        if ($message_id > 0) {
            foreach ($_POST as $field => $value) {
                $data['message_id'] = $message_id;
                $data['meta_key'] = $field;
                $data['meta_value'] = $value;
                $wpdb->insert("contactus_messages_meta", $data);
                //$this->send_email();
            }
        }
    }

    public function send_email(){
        $message="From: ".$_POST['mof_Your_Name']." <".$_POST['mof_Email']." ><br> ".
                 "Subject: ".$_POST['mof_Your_Subject']." <br>".
                 "Message: <br>".
                 "<p>".$_POST['mof_Your_Message']."</p><br>".
                 "This message is send from contact form of".get_bloginfo( 'name' );
        $to=option('admin_email');
        $subject=$_POST['mof_Your_Subject'];
        $from=$_POST['mof_Email'];

        $headers  = "From: " . $_POST['mof_Email'] . " <" . $_POST['mof_Email'] . ">\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\n";
        $headers .= "Content-Transfer-Encoding: 8bit\n";

        wp_mail( $to, $subject, $message, $headers );


    }

}
