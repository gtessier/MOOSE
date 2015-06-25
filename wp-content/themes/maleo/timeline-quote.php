 <?php
	$quote_content = get_post_meta($post->ID, '_ps_quote_content', true);
	$quote_source = get_post_meta($post->ID, '_ps_quote_source', true);
 ?>
<blockquote>
 <p><?php echo esc_html($quote_content); ?></p>
        	<?php if($quote_source != '') { ?><cite><?php echo esc_html($quote_source); ?></cite> <?php } ?>
</blockquote>
