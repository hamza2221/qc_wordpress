<?php 

add_theme_support('post-thumbnails');



add_action("wp_ajax_my_user_vote", "my_user_vote");
add_action("wp_ajax_nopriv_my_user_vote", "my_user_vote");
add_action( 'init', 'my_script_enqueuer' );

function my_script_enqueuer() {
   wp_register_script( "my_voter_script",  get_template_directory_uri() .'/js/script.js', array('jquery') );
          

   wp_enqueue_script( 'jquery' );
   wp_enqueue_script( 'my_voter_script' );

}
add_action( 'wp_enqueue_scripts', 'add_frontend_ajax_javascript_file' );

function my_user_vote() {

		$result['type'] = "success";
	      
	      $post_id=$_GET['post_id'];
	      $attachment_ids=get_post_meta($post_id,"_easy_image_gallery");
		  $attachment_ids=explode(",", $attachment_ids[0]);
		  $attachment_url=array();
		  foreach ($attachment_ids as $i=>$key) {
		  	$attachment_url[$i]=wp_get_attachment_url( $key );
		  }

	      echo json_encode($attachment_url);
	      
	      
	      die();
	  }

/*-------------------------------------------------------------------------------
	Custom Columns
-------------------------------------------------------------------------------*/

function my_page_columns($columns)
{
	$columns = array(
		'cb'	 	=> '<input type="checkbox" />',
		
		'title' 	=> 'Client Name',
		'date'		=>	'Date',
		'author'	=>	'Author',
		
	);
	return $columns;
}

function my_custom_columns($column)
{
	global $post;
	if($column == 'title')
	{
		//echo wp_get_attachment_image( get_field('page_image', $post->ID), array(200,200) );
	}
	elseif($column == 'client_comments')
	{
		if(get_field('client_comments'))
		{
			echo 'Yes';
		}
		else
		{
			echo 'No';
		}
	}
}

add_action("manage_testimonials_custom_column", "my_custom_columns");
add_filter("manage_edit-testimonials_columns", "my_page_columns");

function change_placehoder_to_client_name( $title ){
     $screen = get_current_screen();
 
     if  ( 'testimonials' == $screen->post_type ) {
          $title = 'Enter client name here';
     }
 
     return $title;
}
 
add_filter( 'enter_title_here', 'change_placehoder_to_client_name' );
/*
	This function is usd to get all slider images of portfolio
	return array of url of images
*/
function get_portfolio_images($portfolio_id){
		  $post_id=$portfolio_id;
	      $attachment_ids=get_post_meta($post_id,"_easy_image_gallery");
		  $attachment_ids=explode(",", $attachment_ids[0]);
		  $attachment_url=array();
		  foreach ($attachment_ids as $i=>$key) {
		  	$attachment_url[$i]=wp_get_attachment_url( $key );
		  }
		 return $attachment_url;
}

function myWidgetInit(){
	register_sidebar(
		array(
			'name' => 'After Testimonial',
			'id' => 'after_test'
		 )
		);
	
}
add_filter( 'widgets_init', 'myWidgetInit' );    
    
?>