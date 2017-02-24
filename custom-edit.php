<?php

add_action( 'load-edit.php', function()
{
	# Not our post_type, bail out
    if ( get_current_screen()->id != 'edit-page' )
        return;

    # Transient cache for pages IDs and Count
    # used in both hooks bellow

    do_cache_wpse_509();

    if( isset( $_GET['account'] ) )
        add_action( 'pre_get_posts', 'pre_posts_wpse_509' );


    add_filter( 'views_edit-page', 'custom_links_wpse_509' );
    
});


/**
 * Makes the query once every hour
 * holds the Parent and Children ID, plus the Children total pages count
 */

function do_cache_wpse_509()
{
    
	if( !get_transient( 'custom_page_links' ) ) :
  
    	 $account_posts  = get_children( 'post_parent=509&post_type=page' );

    	 // To include the parent ID in the query
        	$c_ids = array( '509' ); 

        // Grab the children IDs
	        foreach( $account_posts  as $acc  ):
	            $c_ids[] = $acc ->ID;
	        endforeach;

       		$account  = array( 
            'ids' => $c_ids,
            'count' => count( $account_posts )
        	);

       		 # Set transient
	        $transient = array(
	  	       'account' => $account
	        );

    	 set_transient( 'custom_page_links', $transient , 60*60);
  
  endif;
  
}



/**
 * Only display comments of specific post_id
 */ 
function pre_posts_wpse_509( $query )
{
    # Just to play safe, but I think the hook is quite specificaly called
    if( !is_admin() )
        return $query;

    global $pagenow;

    # If there's no cache, bail out
    $cache = get_transient( 'custom_page_links' );
    if( !$cache )
        return $query;

    # Define the IDs we want to query
    if( isset( $_GET['account'] ) )
        $ids = $cache['account']['ids'];

    # Here, too, just playing safe
    if( 'edit.php' == $pagenow && ( get_query_var('post_type') && 'page' == get_query_var('post_type') ) )
        $query->set( 'post__in', $ids );

    return $query;
  
}


/**
 * Add link to specific post comments with counter
 */
function custom_links_wpse_509( $status_links )
{
    $cache = get_transient( 'custom_page_links' );
    
    $count_account = sprintf(
        '<span class="count">(%s)</span>',
        $cache['account']['count']
    );

    $link_account = 'edit.php?post_type=page&account=509';
  
    $separator = 'CUSTOM LINKS &#x27BD;';

                              
    if( isset( $_GET['account'] ) ) 
    {                             
        
        $status_links['my_sep'] = $separator;
        $status_links['account'] = "<a href='$link_account' class='current'>My Account $count_account</a>";
        
    }                             
    else                          
    {                             
        $status_links['my_sep'] = $separator;
        $status_links['account'] = "<a href='$link_account'>My Account $count_account</a>";
        
    }

    return $status_links;
}

?>
