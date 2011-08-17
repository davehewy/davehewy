<?php

get_header(); 

?>


	<div class="grids">
		
		<div class="grid-3">
			<?php get_sidebar(); ?>
		</div>
		
		<div class="grid-13 left">
		
		<div class="single-portfolio">
		
			<?php
				if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				
					<?php
						$possible_meta = array('screenshot');
						$slideshow = array();
						for($i=1;$i<5;$i++){
							if($meta = get_post_meta($post->ID, 'screenshot'.$i, true)){
								$slideshow[] = get_post_meta($post->ID, 'screenshot'.$i, true);
							} 
						}
						
					?>
				
					<h1 class="entry-title"><?php the_title(); ?></h1>
					
					<div class="portfolio_slideshow">
					get_post_meta($post->ID, 'screenshot'.$i, true); 
					</div>
					
					<div class="grids">
					
					<!-- Left hand side -->
					
					<div class="grid-5">
					 left column
					</div>
					
					<!-- end left column -->
				
				
					<!-- start right hand side column -->
						
					<div class="grid-5 end">
					right column
					</div>						
			
					<!-- End right column -->
					
					</div>
			<?php
				endwhile;
			?>
		
		</div>
		
		</div>
	
	</div>

<?php
get_footer(); ?>