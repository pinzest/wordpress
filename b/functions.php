<?php
if ( ! function_exists( 'banjaar_setup' ) ) :
/**
* Sets up theme defaults and registers support for various WordPress features
*
*  It is important to set up these functions before the init hook so that none of these
*  features are lost.
*
*  @since BanjaarTheme 1.0
*/
function banjaar_setup() 
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
	add_image_size('banjaar-large-thumb', 830);
	add_image_size('banjaar-medium-thumb', 600, 400, true);
	add_image_size('banjaar-small-thumb', 230);
	add_image_size('banjaar-service-thumb', 350);
	add_image_size('banjaar-mas-thumb', 480);

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

} // banjaar_setup() 



endif;
add_action( 'after_setup_theme', 'banjaar_setup' );


/**
 * Enqueue scripts and styles.
 */
 function banjaar_scripts() {
	
	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'responsive', get_template_directory_uri().'/css/responsive.css' );
	wp_enqueue_style( 'sydney-style', get_stylesheet_uri() );
	wp_enqueue_style( 'kwicks-slider', get_template_directory_uri().'/css/kwicks-slider.css' );

	wp_enqueue_style( 'fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300' );
	wp_enqueue_script('bootstrap_js', get_template_directory_uri().'/js/bootstrap.js','','',true );
	wp_enqueue_script('jquery_cookie', get_template_directory_uri().'/js/jquery.cookie.js' );
	//wp_enqueue_script('jquery', get_template_directory_uri().'/js/jquery.js' );
	wp_enqueue_script('superfish', get_template_directory_uri().'/js/superfish.js' );
	wp_enqueue_script('flexslider', get_template_directory_uri().'/js/jquery.flexslider-min.js' );
	wp_enqueue_script('kwicks', get_template_directory_uri().'/js/jquery.kwicks-1.5.1.js' );
	wp_enqueue_script('jquery_easing', get_template_directory_uri().'/js/jquery.easing.1.3.js' );

	wp_enqueue_style( 'custom-css', get_template_directory_uri().'/css/custom-css.css');
}
add_action( 'wp_enqueue_scripts', 'banjaar_scripts' );

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
    return '<p></p><a class="btn btn-1" href="' . get_permalink() . '">Read More</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );


/**
 * Slider
 */
require get_template_directory() . '/inc/slider.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


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





// custom-contact-form

function myform()
{

	?>
<div id="content">
    <form action="<?php echo admin_url().'admin-post.php';?>" method="post">
        <label for="fullname">property Title</label>
        <input type="text" name="priperty_title">
    
        <label for="content">Property Description</label>
        <textarea name="priperty_des"></textarea>
        <input type="hidden" name="action" value="insert_property">
        <input type="submit" value="Post Property" name='post_proterty_btn'>
    </form>
</div>
<?php
}

add_action('add_property_form','myform');



function insert_new_property() {

if(!isset($_POST['post_proterty_btn']))
	return ;

$title = $_POST['priperty_title'];
$content = $_POST['priperty_des'];
wp_insert_post(array(

				'post_content' => $content,
				'post_title' => $title,
				'post_type' => 'property',
				'post_status' => 'publish',

	));
 header('location:http://localhost/wp/contact/');

}
add_action( 'admin_post_nopriv_insert_property', 'insert_new_property' );
add_action( 'admin_post_insert_property', 'insert_new_property' );

	
  	
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



// custom-contact-form

function login_form()
{

	if(!is_user_logged_in()) :
	?>
 <div style="overflow: hidden; width:600px;margin: 0 auto;">
 	<div style="float:left;padding: 10px;">
 		<h3>Login</h3>
		<form id="wp_login_form" action="" method="post">  
			<label>Username</label><br>  
			<input type="text" name="username" class="text" value=""><br>  
			<label>Password</label><br>  
			<input type="password" name="password" class="text" value=""> <br>  
			<label>  
			<input name="rememberme" type="checkbox" value="forever">Remember me</label>  
			<br><br>  
			<input type="hidden" name="user_login" value='true'>
			<input type="hidden" name="pippin_login_nonce" value="<?php echo wp_create_nonce('login-nonce'); ?>"/>
			<input type="submit" id="submitbtn" name="login" value="Login">  	
		</form>
	</div>
	<div style="float:right;padding: 10px;">
		<h3>Register</h3>
		<form id="registration_form" class="reg_form" action="" method="POST">
			<fieldset>
				<p>
					<label for="user_Login"><?php _e('Username'); ?></label>
					<input name="username" id="user_Login" class="required" type="text"/>
				</p>
				<p>
					<label for="user_email"><?php _e('Email'); ?></label>
					<input name="user_email" id="user_email" class="required" type="email"/>
				</p>
				<p>
					<label for="user_first"><?php _e('First Name'); ?></label>
					<input name="user_first" id="user_first" type="text"/>
				</p>
				<p>
					<label for="user_last"><?php _e('Last Name'); ?></label>
					<input name="user_last" id="user_last" type="text"/>
				</p>
				<p>
					<label for="password"><?php _e('Password'); ?></label>
					<input name="user_pass" id="password" class="required" type="password"/>
				</p>
				<p>
					<label for="password_again"><?php _e('Password Again'); ?></label>
					<input name="user_pass_confirm" id="password_again" class="required" type="password"/>
				</p>
				<p>
					<input type="hidden" name="new_register" value='true'>
					<input type="hidden" name="register_nonce" value="<?php echo wp_create_nonce('register-nonce'); ?>"/>
					<input type="submit" value="<?php _e('Register'); ?>" name='register'/>
				</p>
			</fieldset>
		</form>
	</div>
</div>
<?php
else:
		$current_user = wp_get_current_user();

		pre('Welcome '.$current_user->data->user_nicename);
		$the_query = new WP_Query( array( 'author' =>  $current_user->ID,'post_type' => 'property',) );
		if ( $the_query->have_posts() ) {
	echo '<ul>';
	while ( $the_query->have_posts() ) {
			$the_query->the_post();
			echo '<li>' . get_the_title() . '</li>';
	}
	echo '</ul>';
	/* Restore original Post Data */
	wp_reset_postdata();
} else {
	echo 'no posts found';
}
endif;

}



add_action('get_login_form','login_form');


add_action('init',function(){


## hide admin tool bar when subscriber is logedin..

if(current_user_can('subscriber')) {
if(is_admin_bar_showing()) {
show_admin_bar(false);
}
}


## when user try to  login .....

if(isset($_POST['login']) && $_POST['login']=='Login'):

	$user_name = $_POST['username'];
	$user_pass = $_POST['password'];
	
	$user = get_user_by( 'login', $user_name );

	// check role,and password by givan username...
	if(!empty($user) && wp_check_password( $user_pass, $user->data->user_pass, $user->ID) && in_array('subscriber',$user->roles)) :
	
			wp_setcookie($_POST['username'], $_POST['password'], true);
			wp_set_current_user($user->ID, $_POST['username']);	
			do_action('wp_login', $_POST['username']);
			wp_redirect( home_url().'/login' );
			exit;

	else:

			echo "<script>
			(function(){alert('Athentication Failed..');})();
			</script>";

	endif;

endif;



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




 