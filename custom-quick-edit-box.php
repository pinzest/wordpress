<?php
########################### Add Columns  ############################
//add the Comedians and Singers to the list of columns to  'movies' custom post type 
function movies_cpt_columns($columns) 
{

    $new_columns = array( 
            'comedians' 	=> 		__('Comedians', 'ThemeName'),
			'singers' 		=> 		__('Singers', 'ThemeName'),     ); 

	return array_merge($columns, $new_columns); 
} // </movies_cpt_columns>
add_filter('manage_movies_posts_columns' , 'movies_cpt_columns'); 


########################### faching data or manage Data  ############################


add_action( 'manage_posts_custom_column' , 'custom_columns_movies', 10, 2 );

function custom_columns_movies( $column, $post_id ) {
	switch ( $column ) {
		case 'comedians':
			echo get_post_meta( $post_id, 'comedians', true );
			
			break;

		case 'singers':
			echo get_post_meta( $post_id, 'singers', true ); 
			break;
	}
} // </ custom_columns_movies>

########################### Edit Custom Box  ############################
//add the Comedians and Singers custom box to quick edit ... 
/* style => .custom-quick-edit-box
{
	float: right !important;
    display: inline-block;
    clear: both;
}*/
add_action( 'quick_edit_custom_box', 'display_custom_quickedit_book', 10, 2 );

function display_custom_quickedit_book( $column_name, $post_type ) {
   static $printNonce = TRUE;
    if ( $printNonce ) {
        $printNonce = FALSE;
        wp_nonce_field( plugin_basename( __FILE__ ), 'movies_edit_nonce' );
    }

    ?>
    <fieldset class="inline-edit-col-right custom-quick-edit-box">
      <div class="inline-edit-col column-<?php echo $column_name; ?>">
        <label class="inline-edit-tags">
        <?php 
         switch ( $column_name ) {

         case 'singers':

             ?>
             <span class="title">Singers</span>
             <textarea  cols="22" rows="1" name="singers" autocomplete="off" ></textarea>

             <?php
             break;
         case 'comedians':
             ?>
             <span class="title">Comedians</span>
             	<textarea  cols="22" rows="1" name="comedians" autocomplete="off" ></textarea>
             <?php
             break;
         }
        ?>
        </label>
      </div>
    </fieldset>

    <?php
} // </display_custom_quickedit_book>




########################### Save post  ############################

add_action( 'save_post', 'save_movies_meta' );

function save_movies_meta( $post_id ) {
    /* in production code, $slug should be set only once in the plugin,
       preferably as a class property, rather than in each function that needs it.
     */
     $slug = 'movies';
    if ( $slug !== $_POST['post_type'] ) 
    {
        return;
    }

    if ( !current_user_can( 'edit_post', $post_id ) ) 
    {
        return;
    }

    $_POST += array("{$slug}_edit_nonce" => '');

    if ( !wp_verify_nonce( $_POST["{$slug}_edit_nonce"],plugin_basename( __FILE__ ) ) )
    {
        return;
    }

    if ( isset( $_REQUEST['singers'] ) ) 
    {
    	update_post_meta( $post_id, 'singers', $_REQUEST['singers'] );	
    }

    if ( isset( $_REQUEST['comedians'] ) ) 
    {
        update_post_meta( $post_id, 'comedians', $_REQUEST['comedians'] );	
    }
   
} // </save_movies_meta>

