<?php
/*===================================================================================
 * ProdigyStudio Widget  - Recent Comments
 * =================================================================================*/

class ps_RecentComments extends WP_Widget {

	function __construct() {
		$widget_ops = array('classname' => 'prodigystudio_widget_recent_comments', 'description' => __( 'Your site&#8217;s most recent comments.','prodigystudio' ) );
		parent::__construct('ps-recent-comments', __('ProdigyStudio - Recent Comments','prodigystudio'), $widget_ops);
		$this->alt_option_name = 'ps_widget_recent_comments';

		if ( is_active_widget(false, false, $this->id_base) )			

		add_action( 'comment_post', array($this, 'flush_widget_cache') );
		add_action( 'edit_comment', array($this, 'flush_widget_cache') );
		add_action( 'transition_comment_status', array($this, 'flush_widget_cache') );
	}

	function flush_widget_cache() {
		wp_cache_delete('ps_widget_recent_comments', 'widget');
	}

	function widget( $args, $instance ) {
		global $comments, $comment;

		$cache = wp_cache_get('ps_widget_recent_comments', 'widget');

		if ( ! is_array( $cache ) )
			$cache = array();

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

 		extract($args, EXTR_SKIP);
 		$output = '';

		$title = (!empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Comments','prodigystudio' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = (!empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number )
 			$number = 5;

		$comments = get_comments( apply_filters( 'widget_comments_args', array( 'number' => $number, 'status' => 'approve', 'post_status' => 'publish' ) ) );
		$output .= $before_widget;
		if ( $title )
			$output .= $before_title . $title . $after_title;

		$output .= '<ul id="recent_comments" class="recent-comments-list">';
		if ( $comments ) {
			// Prime cache for associated posts. (Prime post term cache if we need it for permalinks.)
			$post_ids = array_unique( wp_list_pluck( $comments, 'comment_post_ID' ) );
			_prime_post_caches( $post_ids, strpos( get_option( 'permalink_structure' ), '%category%' ), false );

			foreach ( (array) $comments as $comment) {
				
				$output .= '<li class="recent-comment popular-title"><i class="icon-comment"></i> <strong>'.get_comment_author_link().'</strong><span class="author-says"> '.__('commented on','prodigystudio' ).'</span>';

				$output .= '<p class="comment-count comment-title"><a href="' . esc_url( get_comment_link($comment->comment_ID) ) . '">' . get_the_title($comment->comment_post_ID) . '</a></p>';
				$output .= '</li>';
			}
 		}
		$output .= '</ul>';
		$output .= $after_widget;

		echo $output;
		$cache[$args['widget_id']] = $output;
		wp_cache_set('ps_widget_recent_comments', $cache, 'widget');
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = absint( $new_instance['number'] );
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['ps_widget_recent_comments']) )
			delete_option('ps_widget_recent_comments');

		return $instance;
	}

	function form( $instance ) {
		$title  = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','prodigystudio' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of comments to show:','prodigystudio' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
<?php
	}
}
register_widget('ps_RecentComments');

?>