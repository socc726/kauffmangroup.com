<?php

get_header(); ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
		  				<?php
				while ( have_posts() ) : the_post();
				  the_title();
				  the_content(); ?>

      <div class="container">
      	<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		   <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
				<?php
				     if( class_exists('Dynamic_Featured_Image') ) {
				       global $dynamic_featured_image;
				       $count = 0;
				       $featured_images = $dynamic_featured_image->get_all_featured_images( get_the_ID());
				       foreach($featured_images as $value) :?>
						<?php if($count == 0){ ?><div class="item active"><?php } else { ?><div class="item"><?php } ?>
				       	
					      <img src="<?php echo $value['full']; ?>" alt="">
					      <div class="carousel-caption">
					        here
					      </div>
					    </div>
				       		
				 <?php $count++; endforeach;
   					}
				endwhile;
			?>

		  </div>

		  <!-- Controls -->
		  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

      </div>
    </div>

<?php get_footer(); ?>