<?php

/*
Plugin Name: MY WIDGET
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Matt Mullenweg
Version: 1.6
Author URI: http://ma.tt/
*/
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );
class my_widget  extends WP_Widget{
	function __construct(){
		parent::__construct(false,$name=__('MY WIDGET'));
	}
	function formform($instance){}
	function update($new_instance, $old_instance){
		}
	function widget($args,$instance){
	?>
		<h1>This is my Test Widget</h1>
		<p>And there will be its descriptions.....</p>

	<?php }
}
add_action('widgets_init',function (){
	register_widget('my_widget');
});


 ?>