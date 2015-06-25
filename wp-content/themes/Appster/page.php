<?php 
/*
	Template Name: Page
*/

	get_header();
?>

	<!-- Page Heading -->
	<section class="page-heading">
	
		<div class="container">
		
			<div class="sixteen columns">
		
				<h1><?php the_title(); ?></h1>
			
			</div>
		
		</div>
	
	</section>

	<?php while (have_posts()) : the_post(); ?>

		<section class="page-full" id="<?php $varpost = get_post($item->object_id); echo $varpost->post_name; ?>">
		
			<div class="container">

				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>" >
					<?php the_content(); ?>
				</div>
			
			</div>
		
		</section>
	
	<?php endwhile; // End the loop. Wow.  ?>

<?php get_footer(); ?>