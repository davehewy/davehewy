<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link href='http://fonts.googleapis.com/css?family=Redressed&v2' rel='stylesheet' type='text/css'>

<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>

</head>

<body <?php body_class(); ?>>
	
	<div id="page">
		<div id="header">
			<div class="logo">
				<div class="star">
					<span>David<br>Heward</span>
				</div>
			</div>
			<div class="headline">
				<h1 class="heading">Web designer & developer based in Essex</h1>
			</div>
			
			<!-- Music is life -->
			
			<div class="music_is_life"></div>
			
			<!-- Menu Begin -->
			
			<div id="top_menu">
			
			<?php
			 wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); 
			?>
			
			</div>		
			
			<!-- Menu end -->
			
		</div>
		
		<div id="content">