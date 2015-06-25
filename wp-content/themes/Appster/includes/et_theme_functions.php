<?php // Theme Functions

/* ================================================================
	CUSTOM EXCERPT
================================================================ */

function et_excerpt_length( $length ) { return 40; }
add_filter( 'excerpt_length', 'et_excerpt_length', 999 );


function et_excerpt_more($more) {
	global $post;
	return '<a href="'. get_permalink($post->ID) . '" class="more-link">' . __( ' [...]', 'appster' ) . '</a>';
}
add_filter('excerpt_more', 'et_excerpt_more');

/* ================================================================
	CUSTOM POST NAVIGATION
================================================================ */

function et_post_nav() {
	global $post;

	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="et-post-nav pagination" role="navigation">		
		<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'twentythirteen' ) ); ?>
		<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'twentythirteen' ) ); ?>
	</nav>
	<?php
}

/* ================================================================
	COMMENTS TEMPLATE
================================================================ */

function et_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	switch ($comment->comment_type) :
	case '' : ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<div class="comments">
			<div class="avatar"><?php  echo get_avatar($comment, 50); ?></div>
			<div class="comment-desc">
				<div class="comment-by">
					<strong><?php printf(__('%s ', 'appster'), sprintf('<cite class="fn">%s</cite>', get_comment_author_link())); ?></strong>
					<span class="reply"><span style="color: #ccc">/ </span>
					<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></span> 
					<span class="date"> <?php printf(__('%1$s at %2$s', 'appster'), get_comment_date(), get_comment_time());?> </span>
				</div>

					<?php if ($comment->comment_approved == '0') : ?>
					<em><?php _e('Your comment is awaiting moderation.', 'appster'); ?></em>
				<?php endif; ?>
				<?php comment_text(); ?>
			</div>

		<?php
		break;
		case 'pingback' :
		case 'trackback' :
		?>
		<li class="post pingback">
			<p><?php _e('Pingback:', 'boilerplate'); ?> <?php comment_author_link(); ?><?php edit_comment_link(__('(Edit)', 'boilerplate'), ' '); ?></p>
			<?php
			break;
			endswitch;
}















?>