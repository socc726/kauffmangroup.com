<?php
/**
 * Kauffman functions and definitions
 *
 * @package Kauffman
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'kauffmansetup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kauffmansetup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Kauffman, use a find and replace
	 * to change 'kauffman' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'kauffman', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'kauffman' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'kauffmancustom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

}
endif; // kauffmansetup
add_action( 'after_setup_theme', 'kauffmansetup' );
/**
 * Register Custom Posts
 *
 * @link http://codex.wordpress.org/Function_Reference/Post_Types
 */

/*
* Creating a function to create our CPT
*/
add_theme_support('post-thumbnails');
function custom_project() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Projects', 'Post Type General Name', 'twentythirteen' ),
		'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'twentythirteen' ),
		'menu_name'           => __( 'Projects', 'twentythirteen' ),
		'parent_item_colon'   => __( 'Parent Project', 'twentythirteen' ),
		'all_items'           => __( 'All Projects', 'twentythirteen' ),
		'view_item'           => __( 'View Project', 'twentythirteen' ),
		'add_new_item'        => __( 'Add New Project', 'twentythirteen' ),
		'add_new'             => __( 'Add New', 'twentythirteen' ),
		'edit_item'           => __( 'Edit Project', 'twentythirteen' ),
		'update_item'         => __( 'Update Project', 'twentythirteen' ),
		'search_items'        => __( 'Search Project', 'twentythirteen' ),
		'not_found'           => __( 'Not Found', 'twentythirteen' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'Projects', 'Project' ),
		'description'         => __( 'Photos and descriptions of current projects.', 'twentythirteen' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'dfiFeatured'),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'has_archive'         => true, 
	);
	
	// Registering your Custom Post Type
	register_post_type( 'projects', $args);

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'custom_project', 0 );

add_filter('dfi_post_types', 'filter_post_types');
function filter_post_types() {
	return array('post', 'page', 'projects', 'employee'); //will display DFI in post and page
}
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function kauffmanwidgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'kauffman' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'kauffmanwidgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kauffmanscripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/public/styles/bootstrap/bootstrap.css', array(), '0.0.1','all' );
	wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri() . '/public/styles/bootstrap/bootstrap-theme.css', array(), '0.0.1','all' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/public/styles/font-awesome.min.css', array(), '0.0.1','all' );
	wp_enqueue_style( 'tabulous', get_template_directory_uri() . '/public/styles/tabulous.css', array(), '0.0.1','all' );
	wp_enqueue_style( 'kauffman-style', get_stylesheet_uri() );
	/**
	 * Deregister jquery
	 */
	if( !is_admin()){
		wp_deregister_script('jquery');
		wp_enqueue_script( 'jquery', get_template_directory_uri() . '/public/js/jquery-1.11.2.min.js', array(), '20120206', true );
	}
	wp_enqueue_script( 'kauffman-tabulous', get_template_directory_uri() . '/public/js/tabulous.js', array(), '20120206', true );
	wp_enqueue_script( 'kauffman-navigation', get_template_directory_uri() . '/public/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'kauffman-boostrap', get_template_directory_uri() . '/public/js/bootstrap.js', array(), '20120206', true );
	wp_enqueue_script( 'kauffman-skip-link-focus-fix', get_template_directory_uri() . '/public/js/skip-link-focus-fix.js', array(), '20130115', true );
}
add_action( 'wp_enqueue_scripts', 'kauffmanscripts' );


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



/**
 * Extended Walker class for use with the
 * Twitter Bootstrap toolkit Dropdown menus in Wordpress.
 * Edited to support n-levels submenu.
 * @author johnmegahan https://gist.github.com/1597994, Emanuele 'Tex' Tessore https://gist.github.com/3765640
 * @license CC BY 4.0 https://creativecommons.org/licenses/by/4.0/
 */
class BootstrapNavMenuWalker extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output	   .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
	}
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$li_attributes = '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		// managing divider: add divider class to an element to get a divider before it.
		$divider_class_position = array_search('divider', $classes);
		if($divider_class_position !== false){
			$output .= "<li class=\"divider\"></li>\n";
			unset($classes[$divider_class_position]);
		}
		
		$classes[] = ($args->has_children) ? 'dropdown' : '';
		$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
		$classes[] = 'menu-item-' . $item->ID;
		if($depth && $args->has_children){
			$classes[] = 'dropdown-submenu';
		}
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
		$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ($args->has_children) 	    ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= ($depth == 0 && $args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
		$item_output .= $args->after;
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
		//v($element);
		if ( !$element )
			return;
		$id_field = $this->db_fields['id'];
		//display this element
		if ( is_array( $args[0] ) )
			$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
		else if ( is_object( $args[0] ) )
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'start_el'), $cb_args);
		$id = $element->$id_field;
		// descend only when the depth is right and there are childrens for this element
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {
			foreach( $children_elements[ $id ] as $child ){
				if ( !isset($newlevel) ) {
					$newlevel = true;
					//start the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
			unset( $children_elements[ $id ] );
		}
		if ( isset($newlevel) && $newlevel ){
			//end the child delimiter
			$cb_args = array_merge( array(&$output, $depth), $args);
			call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
		}
		//end this element
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'end_el'), $cb_args);
	}
}
// Creating the widget 
class kgi_special_widget extends WP_Widget {

	function __construct() {

		parent::__construct(

			// Base ID of your widget
			'kgi_special_widget', 

			// Widget name will appear in UI
			__('KGI Specials', 'kgi_special_widget'), 

			// Widget description
			array( 'description' => __( 'Kauffman Group Specials', 'kgi_special_widget' ), )

		);
	}

	// Creating widget front-end
	// This is where the action happens

	public function widget( $args, $instance ) {

		$title = apply_filters( 'widget_title', $instance['title'] );
		$desc = apply_filters( 'widget_desc', $instance['desc'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];

		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

		if ( ! empty( $desc ) )
			echo $args['before_desc'] . $desc . $args['after_desc'];

		echo $args['after_widget'];
	}
			
	// Widget Backend 
	public function form( $instance ) {

		if ( isset( $instance[ 'title' ] ) ) {

			$title = $instance[ 'title' ];

		}else{
			$title = __( 'New title', 'kgi_special_widget' );
		}

		if( isset( $instance['desc'] ) ){

			$desc = $instance[ 'desc' ];

		}else{
			$desc = __( 'New description', 'kgi_special_widget' );
		}

		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />

			<label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e( 'desc:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" type="text" value="<?php echo esc_attr( $desc ); ?>" />
		</p>

	<?php }
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {

		$instance = array();

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['desc'] = ( ! empty( $new_instance['desc'] ) ) ? strip_tags( $new_instance['desc'] ) : '';
		return $instance;
	}

} // Class kgi_special_widget ends here

// Creating the widget 
class kgi_featured_widget extends WP_Widget {

	function __construct() {

		parent::__construct(

			// Base ID of your widget
			'kgi_featured_widget', 

			// Widget name will appear in UI
			__('KGI Featured Project', 'kgi_featured_widget'), 

			// Widget description
			array( 'description' => __( 'Kauffman Group Featured Project', 'kgi_featured_widget' ), )

		);
	}

	// Creating widget front-end
	// This is where the action happens

	public function widget( $args, $instance ) {

		$pid = apply_filters( 'widget_pid', $instance['pid'] );
		
		$project = get_post($pid);

		if(empty((array)$project) || empty($pid)){
			return;
		}

		$title = $project->post_title; ?>

		<!-- Build Modal -->
		<section class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<section class="modal-dialog">
		<section class="modal-content">
		<section class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel"><?php echo $title; ?></h4>
		</section>
		<section class="modal-body">
		<section id="ProjectCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
		<!-- Indicators -->
		<ol class="carousel-indicators">
		<li data-target="#ProjectCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#ProjectCarousel" data-slide-to="1"></li>
		<li data-target="#ProjectCarousel" data-slide-to="2"></li>
		</ol>
		<!-- Wrapper for slides -->
		<section class="carousel-inner" role="listbox">
		<!-- Get Featured Images -->
		<?php if( class_exists('Dynamic_Featured_Image') ) {

			global $dynamic_featured_image;

			$count = 0;

			$featured_images = $dynamic_featured_image->get_all_featured_images( $pid);

			foreach($featured_images as $value) :?>
				<?php if($count == 0) { ?>
					<section class="item active">
				<?php } else { ?>
					<section class="item">
				<?php } ?>
						<img src="<?php echo $value['full']; ?>" alt="">
						<section class="carousel-caption">
							<h3><?php echo $dynamic_featured_image->get_image_title( $value['full']);  ?></h3>
							<span><?php echo $dynamic_featured_image->get_image_caption( $value['full']);  ?></span>
							<p>
							<?php echo $dynamic_featured_image->get_image_description( $value['full']);  ?>
							</p>
						</section>
					</section>
			<?php $count++; endforeach; ?>
		<?php } ?>
		</section>
		<!-- Controls -->
		<a class="left carousel-control" href="#ProjectCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a>
		<a class="right carousel-control" href="#ProjectCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a>
		</section>
		</section>
		<section class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</section>
		</section>
		</section>
		</section>

		<?php 
	}
			
	// Widget Backend 
	public function form( $instance ) {

		if ( isset( $instance[ 'pid' ] ) ) {

			$pid = $instance[ 'pid' ];

		}else{
			$pid = __( 'Add project ID', 'kgi_featured_widget' );
		}

		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'pid' ); ?>"><?php _e( 'Project ID:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'pid' ); ?>" name="<?php echo $this->get_field_name( 'pid' ); ?>" type="text" value="<?php echo esc_attr( $pid ); ?>" />
		</p>

	<?php }
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {

		$instance = array();

		$instance['pid'] = ( ! empty( $new_instance['pid'] ) ) ? strip_tags( $new_instance['pid'] ) : '';
		return $instance;
	}

} // Class kgi_featured_widget ends here
// Register and load the widget
function load_widgets() {

	register_widget( 'kgi_special_widget' );
	register_widget( 'kgi_featured_widget' );
}

add_action( 'widgets_init', 'load_widgets' );

// Custom widget area - Specials.
register_sidebar( array(
	'name' => __( 'Kauffman Group Specials'),
	'id' => 'custom-specials-area',
	'description' => __( 'Add your daily, monthly, and yearly specials/deals here!', 'kauffman-group' ),
	'before_widget' => '<li id="%1$s" class="specials-container %2$s">',
	'after_widget' => "</li>",
	'before_title' => '<section class="special-container"><section class="special-box"><h3>',
	'after_title' => '</h3></section>',
	'before_desc' => '<p>',
	'after_desc' => '</p><i class="fa fa-money fa-5x"></i></section>',
) );

// Custom widget area - Featured Project.
register_sidebar( array(
	'name' => __( 'Kauffman Group Featured Project'),
	'id' => 'custom-featured-area',
	'description' => __( 'Add a project you want to feature here', 'kauffman-group' )
) );

// adds post/page id to admin edit

function cf_post_id() {
    global $post;

   // Get the data
   $id = $post->ID;

   // Echo out the field
   echo '<input type="text" name="_id" value="' . $id . '" class="widefat" disabled />';
  }

 function ve_custom_meta_boxes() {
    add_meta_box('projects_refid', 'Post ID', 'cf_post_id', 'post', 'side', 'high');
    add_meta_box('projects_refid', 'Page ID', 'cf_post_id', 'page', 'side', 'high');
     add_meta_box('projects_refid', 'Page ID', 'cf_post_id', 'projects', 'side', 'high');
   }
   add_action('add_meta_boxes', 've_custom_meta_boxes');

?>