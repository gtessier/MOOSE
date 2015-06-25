<?php get_header(); ?>
</div> <!-- End headerWrapper -->
<div id="wt_containerWrapper" class="clearfix">
	<?php wt_theme_generator('wt_custom_header',$post->ID); ?>
	<?php wt_theme_generator('wt_containerWrapp',$post->ID);?>
        <div id="wt_container" class="clearfix">
            <?php wt_theme_generator('wt_content',$post->ID);?>
                <div class="container">
                   <div class="col-md-6">
                   <h2><?php esc_html_e('Perhaps this will help','wt_front');?></h2>
                    <ol>
                        <li><?php esc_html_e('Double check the web address for typos.','wt_front');?></li>
                        <li><?php esc_html_e('Head back to our home page via the main navigation.','wt_front');?></li>
                        <li><?php esc_html_e('Try using the serch box or our sitemap below.','wt_front');?></li>
                    </ol>
                       <?php get_search_form(); ?>
                      <div class="error_page">
                          <a target="_self" class="wt_button small"><span>Back to Home</span></a>
                      </div>
    
                     </div>
                   <div class="col-md-6 text-center">
                  <?php $skin = wt_get_option('general', 'skin'); ?>
                       <img src="<?php echo esc_url(get_template_directory_uri() .'/css/skins/'. esc_attr( $skin ). '/404.png'); ?>" alt="" />
                   </div>
                </div> <!-- End container -->
            </div> <!-- End wt_content -->
        </div> <!-- End wt_container -->
    </div> <!-- End wt_containerWrapp -->
</div> <!-- End wt_containerWrapper -->
<?php get_footer(); ?>