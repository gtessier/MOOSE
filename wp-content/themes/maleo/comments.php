<?php
if ( post_password_required() )
	return;
?>
<!-- Begin of Comment -->
<div id="comments" class="comments-area">
  
  <?php if ( have_comments() ) : ?>
  <h4 class="mo-animate" data-animate="fadeInLeft"><?php
			printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'prodigystudio' ),
				number_format_i18n( get_comments_number() ), get_the_title() );
		?>
   </h4>
  
  <ol class="commentlist">
			<?php wp_list_comments( array
				( 'callback' => 'prodigystudio_comment',
				'style' => 'ol' )
				 ); ?>
  </ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'prodigystudio' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'prodigystudio' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'prodigystudio' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

  
  <?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
	if ( ! comments_open() && get_comments_number() ) : ?>
	<p class="nocomments"><?php _e( 'Comments are closed.' , 'prodigystudio' ); ?></p>
<?php endif; ?>
  
  
  <?php endif; // have_comments() ?>
</div>

<!-- Begin of Comment Form -->
<div id="commentform-wrap" class="contact-form">  
  
  <?php 
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		
		$args = array(
  'id_form'           => 'comment-form',
  'id_submit'         => 'submit',
  'title_reply'       => __( 'Leave a Reply', 'prodigystudio' ),
  'title_reply_to'    => __( 'Leave a Reply to %s', 'prodigystudio'),
  'cancel_reply_link' => __( 'Cancel Reply', 'prodigystudio' ),
  'label_submit'      => __( 'Post Comment', 'prodigystudio'),

  'comment_field' =>  '<li><textarea id="message" class="form-control" placeholder="'._x( 'Comment', 'noun', 'prodigystudio' ).'" style="height: 200px;" name="comment" aria-required="true">' .
    '</textarea></li><li><button type="submit" class="button radius" data-animate="bounceIn" id="buttonsend">'.__( 'Post Comment', 'prodigystudio' ).'</button></li></ul>',

  'must_log_in' => '<p class="must-log-in">' .
    sprintf(
      __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
    ) . '</p>',

  'logged_in_as' => '<p class="logged-in-as">' .
    sprintf(
    __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'prodigystudio' ),
      admin_url( 'profile.php' ),
      $user_identity,
      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</p>',

  'comment_notes_before' => '',
  'comment_notes_after' => '',

  'fields' => apply_filters( 'comment_form_default_fields', array(

    'author' =>            
      '<input id="name" placeholder="'.__('Name', 'prodigystudio').'" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
      '" ' . $aria_req . ' />',

    'email' =>       
      '<input id="email" name="email" class="form-control" placeholder="'.__('Email', 'prodigystudio').'" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" ' . $aria_req . ' />',

    'url' =>      
      '<input id="url" class="form-control" name="url" placeholder="'.__('Website', 'prodigystudio').'" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
      '"  />'
    )
  ),
);
	
	comment_form($args); ?>
  
</div>