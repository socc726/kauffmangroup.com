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
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
      function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var myLatlng = new google.maps.LatLng(39.07728817257896, -77.51852810382837)
        var mapOptions = {
          center: myLatlng,
          zoom: 12,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
		var contentString = '<div>'+
		      '<h4 id="" class="">The Kauffman Group</h4>'+
		      '<div id="">'+
		      '</div>'+
		      '</div>';

	    var infowindow = new google.maps.InfoWindow({
	        content: contentString
	    });
	    var map = new google.maps.Map(mapCanvas, mapOptions);
        var marker = new google.maps.Marker({
	      position: myLatlng,
	      map: map,
	      title: 'The Kauffman Group'
  		});
	    google.maps.event.addListener(marker, 'click', function() {
    		infowindow.open(map,marker);
  		});       

      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
	<!-- Main jumbotron for a primary marketing message or call to action -->
	
	<div class="jumbotron">

<div class="container">

	  <div class="text-module">
	  	<div id="map-canvas" style="margin-top: 40px;width:100%;height:500px"></div>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="page-header">
					<h2><?php the_title(); ?></h2>
				</div>
				<?php get_template_part( 'content', 'page' ); ?>
				
			<?php endwhile; // end of the loop. ?>
	  </div>

	</div>		
	</div>

<?php get_footer(); ?>