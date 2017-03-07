<?php
/**
 * homevilla functions and definitions
 *
 * @package Sydney
 */

include("include/ajax-processing.php");

if ( ! function_exists( 'homevilla_setup' ) ) :
/**
* Sets up theme defaults and registers support for various WordPress features
*
*  It is important to set up these functions before the init hook so that none of these
*  features are lost.
*
*  @since homevillaTheme 1.0
*/
function homevilla_setup() 
{
	//Registers theme supports
	

	// Enable support for custom header 
	add_theme_support( 'custom-header', array(
	'width'         => 980,
	'height'        => 200,
	'default-image' => get_template_directory_uri() . '/images/header.jpg',
	) );
	

	// Enable support for custom logo
	add_theme_support( 'custom-logo', array(
		'height'      => 62,
		'width'       => 199,
		
		'header-text' => array( 'site-title', 'site-description' ),
	) );


	// Enable support for costom background
	add_theme_support( 'custom-background' );


	// Enable support for post - formats
	add_theme_support( 'post-formats', array('aside','gallery','link','image','quote','status','video','audio','chat'));



	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('homevilla-large-thumb', 830);
	add_image_size('homevilla-medium-thumb', 600, 400, true);
	add_image_size('homevilla-small-thumb', 230);
	add_image_size('homevilla-service-thumb', 350);
	add_image_size('homevilla-mas-thumb', 480);

	// Add default posts and comments RSS feed links to head.
	global $wp_version;
	if ( version_compare( $wp_version, '3.0', '>=' ) ) :
	add_theme_support( 'automatic-feed-links' ); 
	else :
	automatic_feed_links();
	endif;

	// Enable support for HTML5
	add_theme_support( 'html5', array(
	'search-form',
	'comment-form',
	'comment-list',
	'gallery',
	'caption'
	) );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */

	add_theme_support( 'title-tag' );

	add_theme_support( 'customize-selective-refresh-widgets' );



	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
    array(
      'primary' => __( 'Primary Menu'),
     )
   );

} // homevilla_setup() 



endif;
add_action( 'after_setup_theme', 'homevilla_setup' );


/**
 * Enqueue scripts and styles.
 */
 function homevilla_scripts() {
	
	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.css');

	/* 	Custom Theme files */
	//  <!--menu-->
	wp_enqueue_script( 'sydney-scripts', get_template_directory_uri() . '/js/scripts.js');
	wp_enqueue_style( 'homevilla-styles', get_template_directory_uri() . '/css/styles.css');

	// <!--theme-style-->
	wp_enqueue_style( 'homevilla-style', get_stylesheet_uri() );

	wp_enqueue_style( 'popuo-box', get_template_directory_uri() . '/css/popuo-box.css');

	wp_enqueue_script( 'jquery.magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.js');

	wp_enqueue_script( 'easyResponsiveTabs', get_template_directory_uri() . '/js/easyResponsiveTabs.js');

	wp_enqueue_script( 'homevilla-ajax', get_template_directory_uri() . '/js/homevilla-ajax.js');

	 wp_localize_script( 'homevilla-ajax', 'homevilla_ajax_obj',
        array( 
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'nonce' =>  wp_create_nonce( 'homevilla_ajax_nonce' ),
            
        )
    );
	

}

add_action( 'wp_enqueue_scripts', 'homevilla_scripts' );

function admin_enqueues($hook)
{

	wp_enqueue_script( 'homevilla-ajax', get_template_directory_uri() . '/js/homevilla-ajax.js');

	 wp_localize_script( 'homevilla-ajax', 'homevilla_ajax_obj',
        array( 
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'nonce' =>  wp_create_nonce( 'homevilla_ajax_nonce' ),
            
        )
    );

}
add_action( 'admin_enqueue_scripts', 'admin_enqueues' );

function banjaar_the_custom_logo() {
	
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();

	}

	
}


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function banjaar_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'banjaar' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	//Footer widget areas
	register_sidebar( array(
		'name'          => __( 'Footer-Sidebar', 'banjaar' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	//Register the front page widgets
	

}
add_action( 'widgets_init', 'banjaar_widgets_init' );

/**
 * Menu fallback
 */
function banjaar_menu_fallback() {
	
	if ( current_user_can('edit_theme_options') ) {
		echo '<a class="menu-fallback" href="' . admin_url('nav-menus.php') . '">' . __( 'Create your menu here', 'banjaar' ) . '</a>';
	}
}

// filter read more link on blog post
function modify_read_more_link() {
    return '<br><a class="hvr-sweep-to-right more" href="' . get_permalink() . '">Read More</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );





add_filter('manage_movies_posts_columns' , 'add_movie_columns');

function add_movie_columns($columns) {

	// create new columns in array of name ⇒ label.

   $new_columns = array(

	   					'duration' => __('Duration'),
	                   

   					);

    return array_merge($columns,$new_columns);
}

add_action( 'manage_movies_posts_custom_column', 'my_manage_movie_columns', 10, 2 );

function my_manage_movie_columns( $column, $post_id ) {
	global $post;
	
	switch( $column ) {

		/* If displaying the 'duration' column. */
		case 'duration' :

			/* Get the post meta. */
			echo (($post->ID)-(4))." Min.";

			break;

		

		/* Just break out of the switch statement for everything else. */
		default :
			break;

	}


	

}




#   Making custom columns sortable  :-
/*----------------------*/

add_filter( 'manage_edit-movies_sortable_columns', 'my_movie_sortable_columns' );

function my_movie_sortable_columns( $columns ) 
{

	$columns['duration'] = 'duration';

	return $columns;
}







   		 add_action('admin_menu',

   		 			function(){
   		 				
   		 				
   		 				

   		 					// register costum texonomy for movies post:

		 $labels = [];
   		 $args = [];
   		 $taxonomies  = [

   		 		[
   		 			'name' 				=> __('posted by'),
   		 			'singular_name'     => _x('PostedBy', 'taxonomy singular name'),
   		 			'hierarchical'		=> true ,
   		 			'object_type'		=> array('movies'),

   		 		],

   		 ];
   		 
   		 foreach ($taxonomies as  $taxonomy) :
   		 	# code...
   		 	$lbl = [];
   		 		foreach ($taxonomy as $key => $value) {
   		 			# code...
   		 				
   		 			$lbl[$key] = $value;

   		 		}
   		 	$labels['name'] 			= 	$lbl['name'];
   		 	$labels['singular_name'] 	= 	$lbl['singular_name'];
   		 	$labels['search_items']  	= 	__('Search '.$lbl['name']);
   		 	$labels['all_items'] 	 	= 	__('All '. $lbl['name']);
   		 	$labels['parent_item'] 		= 	__('Parent '. $lbl['name']);
   		 	$labels['parent_item_colon']= 	__('Parent '. $lbl['name']);
   		 	$labels['edit_item'] 	    = 	__('Edit '. $lbl['singular_name']);
   		 	$labels['update_item'] 		= 	__('Update '. $lbl['singular_name']);
   		 	$labels['add_new_item']		= 	__('Add New '. $lbl['singular_name']);
   		 	$labels['new_item_name'] 	= 	__('New '. $lbl['singular_name'] .' Name');
   		 	$labels['menu_name'] 		= 	__($lbl['name']);
   		 	$labels['not_found'] 		= 	__('No '. $lbl['singular_name'] . ' Found.');
   		 	$args['hierarchical']		= $lbl['hierarchical'];
   		 	$args['labels']				= $labels;
   		 	$args['show_ui']			= true;
   		 	$args['show_admin_column']	= true;
   		 	$args['query_var']			= true;
   		 	$args['rewrite']			= ['slug' => $lbl['singular_name']];


   		 	if(!taxonomy_exists( 'texonomy_'.$labels['singular_name'] )):

   		 	register_taxonomy('texonomy_'.strtolower($labels['singular_name']), $lbl['object_type'] , $args);

   		 	endif;
   		 	$args = [];
   		 	$labels = [];
   		 	$lbl = [];

   		 endforeach;





  

   		 			}

   		 		



   		 	);










add_action( 'admin_post_nopriv_insert_property', 'insert_property_post' );
add_action( 'admin_post_insert_property', 'insert_property_post' );

	
  	
  function center($content="")
	{
		
		echo "<br>";
		echo "<center>";
				print_r($content);
		echo "</center>";
	}

	function pre($array)
	{
		echo '<pre>';
					print_r($array);
		echo '</pre>';
	}	 






add_action('init',function(){


## hide admin tool bar when subscriber is logedin..
/*
if(current_user_can('subscriber')) {
if(is_admin_bar_showing()) {
show_admin_bar(false);
}
}*/








### when user try to  register .....

if(isset($_POST['register']) && $_POST['register']=='Register'):

	// grab data...
		$username = $_POST['username'];
		$user_email = $_POST['user_email'];
		$user_first = $_POST['user_first'];
		$user_last = $_POST['user_last'];
		$user_pass = $_POST['user_pass'];
		$user_pass_confirm = $_POST['user_pass_confirm'];

		$error = 0;

		if(username_exists($username) || (!validate_username($username)) || ($username == '')  || (!is_email($user_email))  || email_exists($user_email) || ($user_pass == '') || ($user_pass != $user_pass_confirm) ) {
			// Username already registered

			echo "<script>
			(function(){alert('something wrong..');})();
			</script>";

			return;
		}

		$userdata = array(

			'user_login'		=>		$username,
			'user_pass'			=>		$user_pass,
			'user_email'		=>		$user_email,
			'user_first'		=>		$user_first,
			'user_last'			=>		$user_last,
			'role'				=>		'subscriber',	


			);

		$new_user_id = wp_insert_user($userdata);
		if($new_user_id)
		{
			wp_setcookie($username, $user_pass, true);
			wp_set_current_user($new_user_id, $username);	
			do_action('wp_login', $username);
			wp_redirect( home_url().'/login' );
			exit;
		}
endif;



});

 
/**
 * Customize the title for the home page, if one is not set.
 *
 * @param string $title The original title.
 * @return string The title to use.
 */
function wpdocs_hack_wp_title_for_home( $title )
{
  if ( empty( $title ) && ( is_home() || is_front_page() ) ) {
    $title = __( 'Home', 'textdomain' ) . ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}
add_filter( 'wp_title', 'wpdocs_hack_wp_title_for_home' );




function mytheme_comment($comments,$args,$depth)
{
?>


<div  <?php comment_class("media commentbox"); ?> id="li-comment-<?php comment_ID(); ?>" >
	<div class="media-left">
		<a href="#"><?php echo get_avatar( $comments, $args['avatar_size'] ); ?></a>
	</div>
	<div class="media-body">

		<h4 class="media-heading">
		<?php 
			printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); 
			 
		?>
		</h4>

		<h6 class="media-heading">
		<?php 
			
		printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); 

		edit_comment_link( __( '(Edit)' ), '  ', '' );

		?>
		</h6>

		 <?php comment_text(); ?>

		<div class="reply">
                <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'twentyeleven' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        </div>

	</div>

</div>


    <?php
}







/*------------------------*/

// add meta box for property post type

# register meta box
 
$prefix = 'property_meta_';
$meta_box = array(
    'id' => 'my-meta-box',
    'title' => 'Property Meta Data',
    'page' => 'property',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Location:',
            'desc' => 'Location',
            'id' => $prefix . 'location',
            'type' => 'text',
            //'std' => 'add Your Location'
        ),
        array(
            'name' => 'Space:',
            'desc' => 'space',
            'id' => $prefix . 'space',
            'type' => 'text',
            //'std' => 'Space'
        ),
        array(
            'name' => 'Amenities:',
            'desc' => 'Amenities',
            'id' => $prefix . 'amenities',
            'type' => 'text',
           // 'std' => 'Amenities'
        ),
        array(
            'name' => 'Per Night:',
            'desc' => 'pernight',
            'id' => $prefix . 'pernight',
            'type' => 'text',
           // 'std' => '2055'
        ),
        array(
            'name' => 'Select',
            'id' => $prefix . 'select',
            'type' => 'select',
            'options' => array('Option 1', 'Option 2', 'Option 3')
        ),
        array(
            'name' => 'Radio',
            'id' => $prefix . 'radio',
            'type' => 'radio',
            'options' => array(
                array('name' => 'Name 1', 'value' => 'Value 1'),
                array('name' => 'Name 2', 'value' => 'Value 2')
            )
        ),
        array(
            'name' => 'Checkbox',
            'id' => $prefix . 'checkbox',
            'type' => 'checkbox'
        )
    )
);

add_action( 'add_meta_boxes', 'register_meta_boxes' );
function register_meta_boxes() {
	global $meta_box;
     add_meta_box($meta_box['id'], $meta_box['title'], 'meta_box_display_callback', $meta_box['page'], $meta_box['context'], $meta_box['priority'],$meta_box['fields']);
}

function meta_box_display_callback($post,$metabox)
{
	// Display code/markup goes here. Don't forget to include nonces!.
	// Use nonce for verification
    echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
     echo '<table class="form-table">';
     foreach ($metabox['args'] as $field) :
     		
     	// get current post meta data
     	$meta = get_post_meta($post->ID, $field['id'], true);
     echo '<tr>',
                '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
                '<td>';
       switch ($field['type']) :
            case 'text':
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />', '<br />', $field['desc'];
                break;
            case 'textarea':
                echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
                break;
            case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option ', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>';
                break;
            case 'radio':
                foreach ($field['options'] as $option) {
                    echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
                }
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
                break;
        endswitch;
        echo     '</td><td>',
            '</td></tr>';
     endforeach;
     echo '</table>';
}

function save_meta_box($post_id)
{

	if(!isset($_POST['post_type']) &&  $_POST['post_type'] !=='property')
	{
		return $post_id;
	
	}

	if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {

        return $post_id;
    }

    global $meta_box;
	
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }

    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }


    foreach ($meta_box['fields'] as $field) 
    {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }

	
}
add_action( 'save_post', 'save_meta_box' );






/*------------------------*/

add_action( 'load-edit.php', function()
{
    
// CH:1
        // edit-{your post type name}   
    if ( get_current_screen()->id != 'edit-property' )  
        return;
    
    

    
    if( isset( $_GET['end'] ) )
    add_action( 'pre_get_posts', 'show_end_post' );


    // custom row action 

    add_filter('post_row_actions','my_action_row', 10, 2);


//  CH:2

    // view_edit-{your post type name}
    add_filter( 'views_edit-property', 'custom_links' );

    
});
function custom_links($links)
{
        
        $count_posts = wp_count_posts();

//ch:3 
        // publish,draft,trash etc...  {end is your post status}

        if($count_posts->end)
            $count =$count_posts;
        else 
            $count = 0;

//ch:4
        // add custom url to link like this
        $costom_url =  'edit.php?post_type=property&status=end&end=true';
        if( isset( $_GET['end'] ) ) 
         {                             
   
        $links['end'] = "<a href='$costom_url' class='current'>End ($count)</a>";
        
        }                             
        else                          
        {   

       
        $links['end'] = "<a href='$costom_url'>End ($count)</a>";
        
        }
        
        return $links;

}

function show_end_post($query)
{

//ch:5

    //$query->set( 'post_status', 'end');
    $query->set( 'author_name', 'shiv');
    return $query;

}

function my_action_row($actions, $post){
// ch6:
	$id=$post->ID;
        // add custom url to link 
  $actions['Print'] = "<a href='#' id='$id' class='print'>Print</a>";
 
  return $actions;
}





