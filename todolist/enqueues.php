<?php

function todol_enqueues($hook) {
        // Load only on ?page=mypluginname
     if($hook == 'widgets.php')
        {
              wp_enqueue_style( 'style_admin_css', plugins_url('includes/style.css', __FILE__) );
        }
        if($hook != 'toplevel_page_todo_lists' && $hook != 'todo-list_page_todol_add_task' && $hook != 'todo-list_page_todol_cmp_task' && $hook != 'todo-list_page_todol_settings' && $hook != 'todo-list_page_todol_sett') {
                return;
        }
        wp_enqueue_style( 'jqui_admin_css', plugins_url('includes/jquery_ui/jquery-ui.css', __FILE__) );
        wp_enqueue_script( 'jqui_admin_js', plugins_url('includes/jquery_ui/jquery-ui.js', __FILE__) );
        wp_enqueue_script( 'admin_js', plugins_url('includes/script.js', __FILE__) );
        wp_enqueue_script( 'admin_ajax', plugins_url('includes/todol-ajax.js', __FILE__) );
        wp_enqueue_style( 'bootstrap_admin_css', plugins_url('includes/bootstrap.css', __FILE__) );
        
        wp_enqueue_style( 'style_admin_css', plugins_url('includes/style.css', __FILE__) );

        wp_localize_script( 'admin_ajax', 'new_task_obj',
        array( 
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'nonce' =>  wp_create_nonce( 'add-task-nonce' ),
            
        )
    );
}
add_action( 'admin_enqueue_scripts', 'todol_enqueues' );

function w_todol_enqueues($hook) {
  
 wp_enqueue_script( 'f_ajax', plugins_url('includes/todol-ajax.js', __FILE__),array('jquery'),'',true );

}
add_action( 'wp_enqueue_scripts', 'w_todol_enqueues' );

?>