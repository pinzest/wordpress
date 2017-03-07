<?php
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
        // add custom url to link 
  $actions['Print'] = "<a href='#'>Print</a>";
  $actions['Delete'] = "<a href='#'>Delete</a>";
  return $actions;
}
?>