<?php
get_header(); while ( have_posts() ) : the_post(); ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
      <div class="container">
      	<div class="page-header">
      		 <h2><?php the_title(); ?></h2>
      	</div>
       
        <p><?php the_content(); ?></p>
        <hr>
      </div>
    </div>
</div>

<div class="container">
	<div class="row">

	</div>

</div>
<?php endwhile;?>

<?php get_footer(); ?>