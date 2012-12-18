<?php
/**
 * Adds the link for the favicon. The sub-theme just needs to place the favicon in the images folder
 * and name it favicon.ico.
 */
add_action( 'wp_head', 'ZEROTHEME_favicon_wp_head' );
function ZEROTHEME_favicon_wp_head( ) {
	// Favicon and Apple Touch Icon
	if ( file_exists( get_stylesheet_directory().'/img/favicon.ico' ) ) {
		echo '<link rel="shortcut icon" href="'.get_bloginfo( 'stylesheet_directory' ).'/img/favicon.ico">';
	}
}
