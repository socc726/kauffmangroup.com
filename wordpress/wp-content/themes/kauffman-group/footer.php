<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Kauffman
 */
?>

	<div id="tabs" class="container">
		<ul class="row">
			<li class="col-md-3"><a href="#tabs-1" class="tabulous_active" title=""><i class="fa fa-road fa-5x"></i></a>Free Estimate</li>
			<li class="col-md-3"><a href="#tabs-2" title=""><i class="fa fa-dollar fa-5x"></i></a>Specials</li>
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
						<textarea style="padding:10px 5% 0 10px" class="form-control" placeholder="Brief Project Description" rows="10"></textarea><br><br>
						<button class="btn btn-lg btn-default btn-block" type="submit">Submit</button>
					</section>
				</section>
			</div>
			<div id="tabs-2" class="col-sm-4">
				<h2>Fall Special</h2>
				<p>Large or Small, We Do Them All</p>
				<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
			</div>
			<div id="tabs-3" class="col-sm-4">
				<h2>Heading</h2>
				<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
				<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
			</div>
			<div id="tabs-4" class="col-sm-4">
				<h2>Heading</h2>
				<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
				<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
			</div>
		</div><!--End tabs container--> 
	</div><!--End tabs-->
		<br>
	<hr>
	<br><br>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<nav class="navbar navbar-default nav-footer">
				<?php

			        $args = array(
			          'theme_location' => 'primary',
			          'depth'    => 0,
			          'container'  => false,
			          'menu_class'   => 'nav',
			          'walker'   => new BootstrapNavMenuWalker(),
			          'items_wrap' => '<ul class="nav navbar-nav">%3$s</ul>'
			        );

			        wp_nav_menu($args);

			     ?>				
     			<p class="text-center">
     				<a href="mailto:">info@thekauffmangroup.com</a>
     				<br>
					©2010-2011 The Kauffman Group, Inc. - All rights reserved.
				</p>
			</nav>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	</div><!-- #content -->
	

</div><!-- #page -->

</body>
</html>

<script>
	$('#myModal').modal('hide');

	jQuery('#tabs').tabulous({
	  effect: 'scale'
	});

	/**
	 * This code changes the default behavior of the navbar:
	 * now the submenu pops in when the user rolls his mouse
	 * over the parent level menu entry.
	 * Many tanks to Hanzi for this idea and code!
	 */
	jQuery(document).ready(function($) {
		$('ul.nav li.dropdown').on("click", function(){
			window.location = $(this)[0].firstChild.href;
		});
	  $('ul.nav li.dropdown, ul.nav li.dropdown-submenu').hover(function() {
			$(this).find(' > .dropdown-menu').stop(true, true).delay(200).fadeIn();
		}, function() {
			$(this).find(' > .dropdown-menu').stop(true, true).delay(200).fadeOut();
		});
	});
</script>