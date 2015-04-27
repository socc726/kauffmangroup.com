<?php
/**
 * @package Kauffman
 */
?>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <?php the_post_thumbnail(); ?>
      <div class="caption">
        <h3><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></h3>
        <p><?php the_excerpt(); ?></p>
        <a href="<?php echo get_permalink( ); ?>" class="btn btn-primary" role="button">View Project</a></p>
      </div>
    </div>
  </div>