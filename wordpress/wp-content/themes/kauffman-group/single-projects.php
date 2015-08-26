<?php

get_header(); while ( have_posts() ) : the_post(); ?>

	    <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
      <div class="container">
      	<div class="page-header">
      		 <h2><?php the_title(); ?></h2>
      	</div>
		<?php get_template_part( 'content', 'page' ); ?>
      </div>

<br>
<div class="container">
	<div class="row">
		<?php if( class_exists('Dynamic_Featured_Image') ) {

			global $dynamic_featured_image;

			$count = 0;

			$featured_images = $dynamic_featured_image->get_all_featured_images( get_the_ID());
		?>	
			<div id="ProjectCarousel2" class="carousel slide" data-ride="carousel" data-interval="0">

				<!-- Indicators -->
				<ol class="carousel-indicators">
					<?php
					for ($x = 0; $x < count($featured_images); $x++) { ?>
						<?php if ($x == 0 ) { ?>
						<li data-target="#ProjectCarousel2" data-slide-to="<?php $x ?>" class="active"></li>
						<?php } else { ?>
						<li data-target="#ProjectCarousel2" data-slide-to="<?php $x ?>" class="<?php ?>"></li>
						<?php } ?>
					<?php } 
					?>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">

						<?php 

						foreach($featured_images as $value) :?>

							<?php if($count == 0) { ?> 
								<div class="item active"><?php } else { ?><div class="item"><?php } ?>
									<img src="<?php echo $value['full']; ?>" alt="">
									<div class="carousel-caption">
										<h3><?php echo $dynamic_featured_image->get_image_title( $value['full']);  ?>
										<span><?php if(! empty($dynamic_featured_image->get_image_caption( $value['full']) ) ) { ?> ( <?php echo $dynamic_featured_image->get_image_caption( $value['full']);  ?> ) <?php } ?> </span></h3>
										<p><?php echo $dynamic_featured_image->get_image_description( $value['full']);  ?></p>	
									</div>
								</div>

						<?php $count++; endforeach; ?>
				</div>

				<!-- Controls -->
				<a class="left carousel-control" href="#ProjectCarousel2" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#ProjectCarousel2" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		<?php } ?>
	</div>
</div>

</div>
<?php endwhile;?>

<?php get_footer(); ?>
