<?php
/**
 * The template for displaying all single posts.
 *
 * @package Kauffman
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php
							     if( class_exists('Dynamic_Featured_Image') ) {
				       global $dynamic_featured_image;
				       $id = get_the_ID();
				       var_dump($dynamic_featured_image);
				       var_dump(get_post_meta($id));
				       $featured_images = $dynamic_featured_image->get_featured_images( $id);
				       var_dump($featured_images) ;
       //You can now loop through the image to display them as required
   					}
			 get_template_part( 'content', 'single' ); ?>

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
