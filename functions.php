<?php


/**
*
* Tell wordpress to use my custom setup function after it does its own. 
*/

add_action( 'after_setup_theme', 'my_setup' );

if(!function_exists('my_setup')):
	
	function my_setup(){
		
		// This theme styles the visual editor with editor-style.css to match the theme style.
		add_editor_style();
		
		// Post Format support. You can also use the legacy "gallery" or "asides" (note the plural) categories.
		add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
	
		// This theme uses post thumbnails
		add_theme_support( 'post-thumbnails' );	
		
		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );			
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Navigation', 'my_theme' ),
		) );
		
		if ( function_exists('register_sidebar') )
		    register_sidebar(array(

			"before_widget" => "",
			
			"after_widget" => "",
			
			"before_title" => "<h4>",
			
			"after_title" => "</h4>",
			
			"name" => "primary-widget-area"

			));				
			
	}
		
endif;

if(!function_exists('create_post_types')):

function create_post_types() {

register_post_type( 'portfolios',
    array(
        'labels'                => array(
            'name'              => __( 'Portfolio\'s' ),
            'singular_name'     => __( 'Portfolio' ),
            'add_new' => __('Add new'),
            'add_new_item' => __('Add new portfolio piece'),
            'edit' => __('Edit'),
			'view' => __('View Portfolio'),
			'view_item' => __('View Portfolio'),
			'description' => __( 'A post type especially to show off all of your lovely client work through the intuitive wordpress back panel!! How lovely.' ),            
				),
        'menu_position' => 5,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'supports'              => array( 'title', 'editor', 'excerpt','custom-fields', 'thumbnail' ),
        'rewrite'               => array( 'slug' => 'portfolio', 'with_front' => false ),
        'has_archive'           => true
    )
);

}

endif; 



/**
*	Posted on date
*/

if(!function_exists('me_posted_on')):
function me_posted_on() {
	
	echo sprintf("<span class=\"entry-date\">%s</span>",get_the_date());

}
endif;


/**
*
* 	Register some taxonomies.
*/

if(!function_exists('create_my_taxonomies')):
function create_my_taxonomies() {

$labels = array(
    'name'                          => 'Website type',
    'singular_name'                 => 'Website type',
    'search_items'                  => 'Search website types',
    'popular_items'                 => 'Popular website types',
    'all_items'                     => 'All Website Type',
    'parent_item'                   => 'Parent Website Type',
    'edit_item'                     => 'Edit Website Type',
    'update_item'                   => 'Update Website Type',
    'add_new_item'                  => 'Add Website Type',
    'new_item_name'                 => 'New Website Type',
    'separate_items_with_commas'    => 'Separate website types with commas',
    'add_or_remove_items'           => 'Add or remove website types',
    'choose_from_most_used'         => 'Choose from most used website types'
    );

$args = array(
    'label'                         => 'Website Type',
    'labels'                        => $labels,
    'public'                        => true,
    'hierarchical'                  => true,
    'show_ui'                       => true,
    'show_in_nav_menus'             => true,
    'args'                          => array( 'orderby' => 'term_order' ),
    'rewrite'                       => array( 'slug' => 'portfolio/type', 'with_front' => false ),
    'query_var'                     => true
);

register_taxonomy( 'brands', 'portfolios', $args );

register_taxonomy( 'clients', 'portfolios', array( 'hierarchical' => false, 'label' => 'Clients', 'query_var' => true, 'rewrite' => true ) );

register_taxonomy( 'display_type', 'portfolios', array( 'hierarchical' => false, 'label' => 'Display Type', 'query_var' => true, 'rewrite' => true ) );

}

endif;

/**
*
* posted in
*/

if(!function_exists('me_posted_in')):
function me_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', '' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', '' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', '' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

/**
*
* a whole bunch of actions can be added here.
* third parameter defines the priority at which they are processed.
*/

add_action( 'init', 'create_my_taxonomies',1);
add_action( 'init', 'create_post_types',2); 
