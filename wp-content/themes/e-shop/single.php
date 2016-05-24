<?php
	
	if ( is_post_type( "portfolio" )) {
		load_template(get_template_directory().'/single-portfolio.php');
	}
	
	
	else {
		load_template(get_template_directory().'/single-default.php');
	}

?>