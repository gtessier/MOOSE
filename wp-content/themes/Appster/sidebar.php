<aside class="sidebar">
	<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Primary Sidebar') ) : ?>
		<div class="widget">
			<h4>Search</h4>
			<?php get_search_form(); ?>
		</div>
	<?php endif; ?>
</aside>