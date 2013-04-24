<?php

include_once 'includes/walker.php';

// register two navigation menu locations in the theme
register_nav_menus( array(
	'main' => 'Main Navigation'	
) );


//sidebar
register_sidebar( array(
	'name' => 'Sidebar for Blogs',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h1>',
	'after_title' => '</h1>',
) );

register_sidebar( array(
	'name' => 'Sidebar for pages',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h1>',
	'after_title' => '</h1>',
) );




//excerpt
function my_excerpt_length($length) {
	return 50; 
}

add_filter('excerpt_length', 'my_excerpt_length');




?>