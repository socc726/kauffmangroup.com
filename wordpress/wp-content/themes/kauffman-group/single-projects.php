<?php
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
