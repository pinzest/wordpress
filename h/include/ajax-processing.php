<?php
// add new listing...
add_action('wp_ajax_add_listing', 'insert_property_post');

// login...
add_action('wp_ajax_user_login_hv', 'homevilla_loginuser');
add_action( 'wp_ajax_nopriv_user_login_hv', 'homevilla_loginuser' );

//
// print...
add_action('wp_ajax_print_postt', 'print_posts');









/*------------------------FUNCTIONS---------------------------------*/


function print_posts()
{

	global $post;
	// echo get_post_type($_POST['id']);
	$p=get_post($_POST['id']);
	?>
		<style type="text/css"></style>
  <hr>
  <div style="
    text-align: center;
    font-size: 30px;
    padding: 22px;
	">
	<?php echo  $p->post_title; ?>
	</div>
	<hr>
	<?php
	wp_die();// close ajax

}

function insert_property_post(){

	$nonce			= 	__($_POST['_ajax_nonce']);
	$title 			= 	__($_POST['title']);
	$location 		= 	__($_POST['location']);
	$space 			= 	__($_POST['space']);
	$amenities 		= 	__($_POST['amenities']);
	$pernight 		= 	__($_POST['pernight']);
	$about 			= 	__($_POST['about']);


	if(!check_ajax_referer( 'homevilla_ajax_nonce', $nonce ,false) or !wp_verify_nonce( $nonce, 'homevilla_ajax_nonce' ))
	{
		echo "<div class='error'>Security check</div>";
		die();
		
	}


	$post_id = wp_insert_post(array(

				'post_title' => $title,
				'post_content' => $about,
				'post_type' => 'property',
				'post_status' => 'publish',

	));

 	# meta keys:-
	//property_meta_location
	//property_meta_space
	//property_meta_amenities
	//property_meta_pernight

	$meta_data = [
						'property_meta_location' 		=>		$location ,
						'property_meta_space'			=>		$space,	
						'property_meta_amenities'		=>		$amenities,
						'property_meta_pernight'		=>		$pernight,
				 ];

	if($post_id)
	{

		foreach ($meta_data as  $metakey => $meta_value) {
				update_post_meta($post_id, $metakey, $meta_value);
		}
		echo 'record added successfully..';
	}
	else{
		echo '"Something went wrong"';
	}
	
	wp_die();// close ajax
}



function homevilla_loginuser()
{


	$nonce				= 	__($_POST['_ajax_nonce']);
	$name 				= 	__($_POST['username']);
	$password 			= 	__($_POST['userpassword']);

	$json=array();


	if(!check_ajax_referer( 'homevilla_ajax_nonce', $nonce ,false) or !wp_verify_nonce( $nonce, 'homevilla_ajax_nonce' ))
	{
		echo "<div class='error'>Security check</div>";
		die();
		
	}

		$user_data = array();
		$user_data['user_login'] = $name;
		$user_data['user_password'] = $password;
		$user_data['remember'] = true;  


		$user = get_user_by( 'login', $name );

		if($user):
			if(in_array('subscriber',$user->roles))
			{
				$user = wp_signon( $user_data, false );
					if ( is_wp_error($user) ) {
						$json[] = $user->get_error_message();
					} 
					else {
						wp_set_current_user( $user->ID, $name );
						do_action('set_current_user');
				
						$json['success'] = 1;
						$json['redirection_url'] = home_url().'/account';
						}

			}
			else{
				$json[] = 'Athentication Failed..';
			}
		else:
				$json[] = 'Athentication Failed..';
		endif;


//print_r($user);
		


		


	/*$user = get_user_by( 'login', $name );

	// check role,and password by givan username...
	if(!empty($user) && wp_check_password( $password, $user->data->user_pass, $user->ID) && in_array('subscriber',$user->roles)) :
	
			wp_setcookie($name, $password, true);
			wp_set_current_user($user->ID, $name);	
			do_action('wp_login', $name);
			$json['success']=1;
			$json['redirection_url'] = home_url().'/account';
			

	else:

			$json[]="Athentication Failed..";
			

	endif;*/
	
	
	echo json_encode( $json );

	
	

wp_die();
// close ajax
}

?>