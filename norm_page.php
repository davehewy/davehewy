<?php

/**
 * Template Name: Standard page
 *
 */
 
 get_header();
 
?>

	<div class="grids">
		
		<div class="grid-3">
			<?php get_sidebar(); ?>
		</div>
		
		<div class="grid-13 left">
		
		<div class="standard_page rounded">
							
				<?php 
				 
				 /*
				 *	Lets put some content from the wordpress onto the page 
				 */
				 
				if (have_posts()) : while (have_posts()) : the_post();?>
					<div class="page">
						<h1 class="orange" id="post-<?php the_ID(); ?>"><?php the_title();?></h1>
						<div class="entrytext">
							<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
						</div>
					</div>
				<?php endwhile; endif; ?>
				<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
					
		</div>	
		</div>
	
	</div>
	
<?php

	get_footer();
	
?>