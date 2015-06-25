<?php // The standard post format ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- Post Header -->
	<header class="entry-header">
	
		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
			<div class="entry-thumbnail"><?php the_post_thumbnail(); ?></div>
		<?php endif; ?>

		<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
			<div class="post-header">
				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h1>
				<div class="byline">
						by <?php the_author_posts_link(); ?> /
						on <a href="<?php the_permalink(); ?>"><?php the_time(' F d, Y'); ?></a> /
						<?php the_tags(' '); ?>
				</div>	
			</div>								
		<?php endif; ?>
		
	</header><!-- / Post Header -->

	<!-- Search -->
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary"><?php the_excerpt(); ?></div>
	<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'appster' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
		</div>
	<?php endif; ?>

	<!-- Post Footer -->
	<footer class="entry-meta">

		<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<?php get_template_part( 'author-bio' ); ?>
		<?php endif; ?>
		
	</footer><!-- / Post Footer -->
	
</article><!-- / Post -->
