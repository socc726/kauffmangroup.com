<?php

 if( class_exists('Dynamic_Featured_Image') ) {
     global $dynamic_featured_image;
     $featured_images = $dynamic_featured_image->get_featured_images( the_id() );
     echo $featured_images;
    //You can now loop through the image to display them as required
 }
get_header(); ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">


      <div class="container">
			<?php
				$args = array( 'post_type' => 'project', 'posts_per_page' => 10 );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
				  the_title();
				  echo '<div class="entry-content">';
				  the_content();
				  echo '</div>';
				endwhile;
			?>
      </div>
    </div>
