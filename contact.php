<?php

/**
 * Template Name: Contact page
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
				
				<h1>Quick hello!</h1>
				
				<fieldset class="half">
				
				<form>
				
					<p><label>Your Name</label><input type="text" placeholder="Your name" class="text"></p>
					<p><label>Your Email</label><input type="text" placeholder="Your email" class="text"></p>
					<p><label>Phone Number</label><input type="text" placeholder="Phone number" class="text"></p>
					<label>Message</label>
					<textarea class="contact_textarea" placeholder="Your message"></textarea>
					<p><label>2x2=</label><input type="text" placeholder="Answer" class="small text"></p>
					
					<p><button type="submit">Submit</button></p>
				</form>
				
				</fieldset>
			
			</div>
			
			</div>
			
		</div>
	
<?php

	get_footer();
	
?>