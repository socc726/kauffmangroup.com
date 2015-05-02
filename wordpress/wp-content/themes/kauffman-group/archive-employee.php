<?php 
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kauffman
 */

$args = array( 'post_type' => 'employee', 'posts_per_page' => 10 );

$the_query = new WP_Query( $args );

get_header(); ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->


<div class="jumbotron">
      <div class="container">
      	<div class="page-header">
      		 <h2>Employees</h2>
      		 <br>
      	</div>
       
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <hr>
      </div>
    </div>
</div>
<div class="container">


	<div class="row">

		<?php if ( $the_query->have_posts() ) : ?>

		<?php /* Start the Loop */ ?>

		<?php while ( $the_query->have_posts() ) : $the_query->the_post();  ?>

		<?php
		/* Include the Post-Format-specific template for the content.
		* If you want to override this in a child theme, then include a file
		* called content-___.php (where ___ is the Post Format name) and that will be used instead.
		*/
		get_template_part( 'content', 'employee' );

		?>		


		<?php endwhile; ?>

		<?php the_posts_navigation(); ?>

		<?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</div>

</div>
<?php get_footer(); ?>