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
      <?php echo do_shortcode('[image-carousel interval="0" category="homepage" twbs="3" ]'); ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">


      <div class="container">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>
      <hr>      
  <div id="tabs">
        <ul>
            <li><a href="#tabs-1" title="">Tab 1</a></li>
            <li><a href="#tabs-2" title="">Tab 2</a></li>
            <li><a href="#tabs-3" title="">Tab 3</a></li>
        </ul>
        <div id="tabs_container">
            <div id="tabs-1">
                <p>hello</p>
            </div>
            <div id="tabs-2">
                   <!--tab content-->
                   <p>whats up</p>
            </div>
            <div id="tabs-3">
                    <!--tab content-->
                    <p>zip</p>
            </div>
        </div><!--End tabs container--> 
  </div><!--End tabs-->
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

  <script>
    jQuery('#tabs').tabulous({
      effect: 'scale'
    });</script>