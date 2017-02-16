<?php


 /******************************************************************
  **                     An option in the dropdown
 --------------------------------------------------------------------------------------
  To add an option in the Bulk Actions dropdown HTML element, register a callback on the bulk_actions-{screen_id} filter that adds the new option onto the array. Replace {screen_id} with the ID of the admin screen to offer the bulk action on.
  ******************************************************************/

add_filter( 'bulk_actions-edit-post', 'register_my_bulk_actions' );
 
function register_my_bulk_actions($bulk_actions) {
  $bulk_actions['email_to_shiv'] = __( 'Email to shiv', 'email_to_shiv');
  return $bulk_actions;
}

 /******************************************************************
  **                      Handling the form submission
 --------------------------------------------------------------------------------------
  To handle a bulk action form submission, register a callback on the handle_bulk_actions-{screen_id} filter for the corresponding screen. The filter expects the redirect URL to be modified, so be sure to modify the passed $redirect_url. This allows us to carry success or failure state into the next request to display a notice to the user. The other callback arguments will differ depending on the screen here to include contextually relevant data.
  ******************************************************************/


add_filter( 'handle_bulk_actions-edit-post', 'my_bulk_action_handler', 10, 3 );
 
function my_bulk_action_handler( $redirect_to, $doaction, $post_ids ) {
	
  if ( $doaction == 'email_to_shiv' ) {

    // remove other url ....
   //$redirect_to = remove_query_arg( 'bulk_audio', $redirect_to );
    
  foreach ( $post_ids as $post_id ) {
    // Perform action for each post.
  }
  $redirect_to = add_query_arg( 'bulk_emailed_posts', count( $post_ids ), $redirect_to );
  return $redirect_to;
  }
}

/******************************************************************
  **                      Showing notices
  --------------------------------------------------------------------------------------
  We could use the existing notice hooks to let the user know what happened, depending on the state we set in the URL:
  ******************************************************************/

add_action( 'admin_notices', 'my_bulk_action_admin_notice' );
 
function my_bulk_action_admin_notice() {
  if ( ! empty( $_REQUEST['bulk_emailed_posts'] ) ) {
    $emailed_count = intval( $_REQUEST['bulk_emailed_posts'] );
    printf( '<div id="message" class="updated fade">' .
      _n( 'Emailed %s post to shiv.',
        'Emailed %s posts to shiv.',
        $emailed_count,
        'email_to_shiv'
      ) . '</div>', $emailed_count );
  }
}
