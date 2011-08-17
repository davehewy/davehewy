<?php

/**
 * Template Name: Portfolio page
 *
 */
 
 get_header();
 
?>

	<div class="grids">
		
		<div class="grid-3">
			<?php get_sidebar(); ?>
		</div>
		
		<div class="grid-13 left">
			<div class="portfolio_wrapper">
			
			<p>Check out some of my latest work.</p>
			
			<?php

$taxonomies=get_taxonomies(); 

$types = get_post_types( array( 'exclude_from_search' => false ), 'objects' ); ?>

<?php $loop = new WP_Query( array( 'post_type' => 'portfolios', 'posts_per_page' => 10 ) ); ?>

<div class="grids">

<?php 
$i=1;
while ( $loop->have_posts() ) : $loop->the_post(); ?>
	
	<?php
		
	/* is the post the third one? */
	if($i %3 !=0){ ?>
		<div class="grid-4 left">
	<?php }else{ ?>
		<div class="grid-4 left end">
	<?php
	}
	?>
	
	<?php 
		
	/* every loop greater than 3 enter a margin  */
	
	if($i>3){ ?>
		<div class="portfolio_div portfolio_margin">
	<?php 
	}else{ ?>
		<div class="portfolio_div">
	<?php
	}
	?>
	
	<?php
	echo '<a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">';
	the_post_thumbnail(); 
	echo '</a>';
	?>
	
	<?php the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); 
	me_posted_on();
	?>

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div>
	
	</div>
	
	</div>
	
<?php 
$i++;
endwhile; ?>

</div>

<?php
get_footer(); ?>
			
			
							
				
	
	</div>
	
</div>

</div>
	
<?php

	get_footer();
	
?> 