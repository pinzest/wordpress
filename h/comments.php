<?php

/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
 
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */

if ( post_password_required() )
    return;
?>
<?php if ( have_comments() ) : ?>
        
    <?php
    printf( _nx( '<h5>One thought on "%2$s"</h5>', '<h5>%1$s thoughts on "%2$s"</h5>',get_comments_number(), 'comments title', 'homevilla' ),
        number_format_i18n( get_comments_number() ), 
        '<span>' . get_the_title() . '</span>'
        );
?>

<?php

    $args = array(
                   // 'style' => 'div' ,
            		'callback'=>'mytheme_comment',
            		'avatar_size' =>50,
                    'depth'=>0,
            	);
    wp_list_comments($args);


    $feilds = array(


    'comment_field'         =>      '<p class="comment-form-comment"><label for="comment">' . _x( 'Comments', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',

    'must_log_in'          =>       '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',

    //'comment_notes_after'  =>       '<p class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ), ' <code>' . allowed_tags() . '</code>' ) . '</p>',

    'logged_in_as'          =>       '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p><br>',

   // 'comment_notes_before'  =>       '<p class="comment-notes">' . __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) . '</p>',

    'id_form' => __( 'Custom-comment-form' ),

    'class_form' => __( 'Customcommentform' ),

    'id_submit' =>  __( 'Comment-Submit-Btn' ),

    'class_submit' => __( 'CommentSubmitBtn' ),

    'title_reply' => '',

    'title_reply_before' => '<h5 id="reply-title" class="comment-reply-title">',

    'title_reply_after' => '</h5>',

    'cancel_reply_before' => '<label class="hvr-sweep-to-right">',

    'cancel_reply_after' => '</label>',

    'cancel_reply_link' => __(' Cancel reply' ),

    'label_submit' =>   __( 'Post Comment' ),

    'submit_button' => '<label class="hvr-sweep-to-right">
            <input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />
        </label>',

        );

    


?>

<div class="leave">

<?php comment_form($feilds); ?>

</div>

<?php 
endif;