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

get_header(); ?>
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
				</div>
				<?php get_template_part( 'content', 'page' ); ?>
				
			<?php endwhile; // end of the loop. ?>
	  </div>

	</div>		
	</div>

		<div id="tabs" class="container">
			<ul class="row">
				<li class="col-md-3"><a href="#tabs-1" class="tabulous_active" title=""><i class="fa fa-diamond fa-5x"></i></a></li>
				<li class="col-md-3"><a href="#tabs-2" title=""><i class="fa fa-road fa-5x"></i></a></li>
				<li class="col-md-3"><a href="#tabs-3" title=""><i class="fa fa-camera-retro fa-5x"></i></a></li>
				<li class="col-md-3"><a href="#tabs-4" title=""><i class="fa fa-institution fa-5x"></i></a></li>
			</ul>
			<div id="tabs_container">
				<div id="tabs-1" class="col-sm-4">
					<section class="panel panel-default estimate">
						<section class="panel-heading">
							<h3 class="panel-title text-center uppercase">Request An Estimate</h3>
						</section>
						<section class="panel-body">
							<p class="text-center">Call us at (703) 909-2104 for a free estimate</p>
							<input type="text" class="form-control" placeholder="Name" required=""><br>        
							<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" >
							<br>
							<input type="phone" class="form-control" placeholder="Phone" required="">
							<br>
							<textarea style="padding:10px 57% 0 10px" id="" placeholder="Brief Project Description" rows="10"></textarea><br><br>
							<button class="btn btn-lg btn-default btn-block" type="submit">Submit</button>
						</section>
					</section>
				</div>
				<div id="tabs-2">
					<h2>Heading</h2>
					<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
					<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
				</div>
				<div id="tabs-3">
					<h2>Heading</h2>
					<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
					<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
				</div>
				<div id="tabs-4">
					<h2>Heading</h2>
					<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
					<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
				</div>
			</div><!--End tabs container--> 
		</div><!--End tabs-->
		<br>
	<hr>
	<br><br>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

  <script>
	jQuery('#tabs').tabulous({
	  effect: 'scale'
	});</script>