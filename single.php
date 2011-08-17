<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Dave hewy
 * @since Dave hewy 1.0
 */

get_header(); ?>

	<div class="grids">
		
		<div class="grid-3">
			<?php get_sidebar(); ?>
		</div>
		
		<div class="grid-13 left">
	
			<?php
			/* Run the loop to output the posts.
			 * If you want to overload this in a child theme then include a file
			 * called loop-index.php and that will be used instead.
			 */
			 get_template_part( 'loop', 'single' );
			?>
			
		</div>
	
	</div>

<?php get_footer(); ?>

