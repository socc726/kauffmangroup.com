<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Kauffman
 */
?>
	<?php
	      if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Kauffman Group Featured Project') ) : ?>
	<?php endif; ?>
	<div id="tabs" class="container">
		<ul class="row">
			<li class="col-md-3"><a href="#tabs-1" class="tabulous_active" title=""><i class="fa fa-road fa-5x"></i></a></li>
			<li class="col-md-3"><a href="#tabs-2" title=""><i class="fa fa-dollar fa-5x"></i></a></li>
			<li class="col-md-3"><a href="#tabs-3" data-toggle="modal" data-target="#myModal" title=""><i class="fa fa-camera-retro fa-5x"></i></a></li>
			<li class="col-md-3"><a href="#tabs-4" title=""><i class="fa fa-institution fa-5x"></i></a></li>
		</ul>
		<div id="tabs_container">
			<div id="tabs-1" class="col-sm-4">
				<section class="panel panel-default estimate">
					<section class="panel-heading">
						<h3 class="panel-title text-center uppercase">Request A Free Estimate</h3>
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
				<?php
				      if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Kauffman Group Specials') ) : ?>
				<?php endif; ?>
			</div>
			<div id="tabs-3" class="col-sm-4">
				<button type="button" id="FeaturedModal" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-lg text-center" style="display:block;margin:0 auto;">Featured Project</button>
			</div>
			<div id="tabs-4" class="col-sm-4">
			</div>
		</div><!--End tabs container--> 
	</div><!--End tabs-->
		<br>
	<footer style="background: #6B4425" id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<img style="float:left;padding:20px;" src="<?php bloginfo('template_directory')?>/logo.jpg" alt="">
			<img style="float:right;padding:20px;" src="<?php bloginfo('template_directory')?>/logo.jpg" alt="">

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
	var isEmpty = function(str){
		return (!str || 0 === str.length);
	};

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
		$('.specials-container').on("click", function(e){
			window.location = 'contact-us?special=' + e.currentTarget.firstChild.children[0].innerText;
		});
		var specialText = $('#dom-target')[0];
		if(specialText){
			specialText = specialText.innerText;
		}
		if(!isEmpty(specialText)){		
			$('.wpcf7-textarea').val('I am interested in the special: "' + specialText.replace(/(\r\n|\n|\r)/gm,"").trim() + '"');
		}else{
			$('.wpcf7-textarea').val('');
		}
		if($("#myModal").length === 0){
			$('#FeaturedModal').attr("disabled", "disabled").text("No Featured Project Today");
		}else{
			$('#FeaturedModal').removeAttr("disabled").text($('.modal-title').text());
		}
	});

</script>