<?php
add_image_size('duck-thumb', 50, 50, TRUE);


		// Setup jQuery
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js');
	    wp_enqueue_script( 'jquery' );

?>