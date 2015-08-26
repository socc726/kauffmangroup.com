<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Kauffman
 */

get_header(); 

?>



<?php
  if (is_front_page())
    echo do_shortcode('[image-carousel interval="0" category="homepage" twbs="3" ]');

?>
	<!-- Main jumbotron for a primary marketing message or call to action -->
	
	<div class="jumbotron">
		<div class="container">
			<div class="text-module">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="page-header">
						<h2><?php the_title(); ?></h2>
						<?php if(!empty(get_post_meta($post->ID, 'custom_tagline', true)) ){ ?>
							<div class="well text-center"><?php echo get_post_meta($post->ID, 'custom_tagline', true); ?></div>
						<?php } ?>
					</div>
					<?php get_template_part( 'content', 'page' ); ?>
					
				<?php endwhile; // end of the loop. ?>
			</div>

		</div>
</div>
	</div>

<?php get_footer(); ?>
