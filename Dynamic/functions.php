<?php

/********

    INCLUDING CSS AND JS TO OUR PAGE

 ********/


function file_scripts() {
// Load our main stylesheet.
    wp_enqueue_style( 'fontawsome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css');
    wp_enqueue_style('style-bootstrap', get_stylesheet_directory_uri() . '/dist/css/bootstrap.min.css', false, filemtime(get_stylesheet_directory() . '/dist/css/bootstrap.min.css'), 'all');
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style( 'my-style',  get_stylesheet_directory_uri() . '/dist/css/main.css', false, '1.0.1', 'all');
 
    wp_enqueue_script('jquery');
    wp_enqueue_script('jq-js', get_template_directory_uri() . '/dist/js/bootstrap.bundle.min.js', array(), false, true);
    wp_enqueue_script( 'fontawsome-js', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js', array('jquery'), '5.15.1', true);
}
add_action('wp_enqueue_scripts', 'file_scripts');



/********

   ADDING THEME SUPORT!

 ********/
add_theme_support('post-thumbnails');
add_image_size( 'project-post-thumbnail', 169, 78);
add_image_size( 'project-update-post-thumbnail', 252, 504);
add_image_size( 'logo-size', 231, 47);

/********

   ADDING CUSTOM POST TYPE!

 ********/
function jobbrs_custom_post_type (){
	
	$labels = array(
		'name' => 'Projects',
		'singular_name' => 'Project',
		'add_new' => 'Add Project',
		'all_items' => 'All Projects',
		'add_new_item' => 'Add Project',
		'edit_item' => 'Edit Project',
		'new_item' => 'New Project',
		'view_item' => 'View Project',
		'search_item' => 'Search Projects',
		'not_found' => 'No Project found',
		'not_found_in_trash' => 'No Projects found in trash',
		'parent_item_colon' => 'Parent Project'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'thumbnail',
		),
		'menu_position' => 5,
		'exclude_from_search' => false
	);
	register_post_type('Project',$args);
	
	$labels = array(
        'name' => 'Updates',
        'singular_name' => 'Update',
        'add_new' => 'Add Update',
        'all_items' => 'All Updates',
        'add_new_item' => 'Add Update',
        'edit_item' => 'Edit Update',
        'new_item' => 'New Update',
        'view_item' => 'View Update',
        'search_item' => 'Search Updates',
        'not_found' => 'No Update found',
        'not_found_in_trash' => 'No Updates found in trash',
        'parent_item_colon' => 'Parent Update'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array(
            'editor',
            'thumbnail',
            'title',
        ),
        'menu_position' => 5,
        'exclude_from_search' => false
    );
    register_post_type('Updates',$args);
}
add_action('init','jobbrs_custom_post_type');

?>
