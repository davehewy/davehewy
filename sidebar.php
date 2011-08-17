<h3 class="top">Connect with me</h3>
<div class="side_bar_div soft-round">
	<strong>Twitter</strong>
	<p>
		<ul>
			<li>Did this today and it was really pretty good fun</li>
			<li>Did this today and it was really pretty good fun</li>
			<li>Did this today and it was really pretty good fun</li>
		</ul>
	</p>
</div>

<h3>New on the blog</h3>

<div class="side_bar_div">
	
	<div id="primary" class="widget-area" role="complementary">
		<ul class="xoxo">

<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>

			<li id="search" class="widget-container widget_search">
				<?php get_search_form(); ?>
			</li>

			<li id="archives" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Archives', 'twentyten' ); ?></h3>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>

			<li id="meta" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Meta', 'twentyten' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</li>

		<?php endif; // end primary widget area ?>
			</ul>
		</div><!-- #primary .widget-area -->	

</div>