<?php
/*
Template Name: logout page
Template Post Type: post, page
*/

wp_logout();
?>
<?php
if ( is_user_logged_in() )
    wp_logout();
wp_redirect( home_url().'/login' ); exit; 



?>