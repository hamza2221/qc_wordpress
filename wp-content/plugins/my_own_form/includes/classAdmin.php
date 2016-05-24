<?php

class Mof_Admin
{

    public function __construct()
    {

        add_action("admin_menu", array($this, "contact_form_menu_setting"));
        add_action('wp_enqueue_scripts', array($this, 'form_scripts'));
        //add_action("wp_ajax_show_message_details", "show_message_details");

        add_action("wp_ajax_mof_show_message_details", array($this, "mof_show_message_details"));
        add_action("wp_ajax_mof_delete_message_details", array($this, "mof_delete_message"));

    }

    public function contact_form_menu_setting()
    {
        $message_count_text=""; 
        if($this->mof_count_new_messages()>0){ //it will show message count
            $message_count_text='<span class="update-plugins count-"' . $this->mof_count_new_messages() . '"> 
            <span class="plugin-count"> ' . $this->mof_count_new_messages() . '</span></span>';
        }
        add_menu_page(
            'Messages from contact form',
            'Messages '.$message_count_text ,
            'manage_options', 'mof_contact_form', array($this, 'contact_form_view')
        );
        
        
    }

    public function contact_form_view()
    {
        echo "";

        global $wpdb;
        $results = $wpdb->get_results('SELECT * FROM contactus_messages', OBJECT);
        include "/views/list.php";
    }

    public function contact_form_option()
    {
        register_setting();
    }
    /*************************
     * show message deteial in admin via ajax
     */
    public function mof_show_message_details()
    {
        global $wpdb;
        $id      = $_GET['msg_id'];
        $results = $wpdb->get_results('SELECT meta_key,meta_value FROM contactus_messages_meta where message_id="' . $_GET['msg_id'] . '"', OBJECT);
        $wpdb->update('contactus_messages', array('id' => $id, 'status' => 1), array('id' => $id));
        //$wpdb->update('update contactus_messages status=1 where id="' . $_GET['msg_id'] . '"');
        echo json_encode($results);
        wp_die();
    }

    /*******************
     *  plugin scripts
     * **************/

    /*     * **************
     *  plugin scripts
     * ************* */

    public function form_scripts()
    {
        // enqueue the script
        //wp_enqueue_script('base_js1', plugin_dir_url(__FILE__) . 'js/script_validation.js', array('jquery'), '1.0', true);
        //wp_enqueue_script('base_js2', plugin_dir_url(__FILE__) . 'js/jquery-validation/dist/jquery.validate.min.js', array('jquery'), '1.0', true );
        //wp_enqueue_script('base_js3', plugin_dir_url(__FILE__) . 'js/jquery-validation/dist/additional-methods.min.js', array('jquery'), '1.0', true );
    }

    public function mof_count_new_messages()
    {
        global $wpdb;
        $mof_new_msg_count = $wpdb->get_var("SELECT COUNT(*) FROM contactus_messages where status=0");
        return $mof_new_msg_count;

    }
    public function mof_delete_message()
    {
        global $wpdb;
        $id = $_GET['msg_id'];
        return $wpdb->query( 'Delete' );

    }

}
