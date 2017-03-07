<?php
/*
Plugin Name: Todo list
Plugin URI: https://Pinzest.com/todolist
Description: Todo list
Version: 5.0
Author: Shivlal
Author URI: https://Pinzest.com/shiv/
License: GPLv2 or later
Text Domain: TDL
*/
?>
<?php


 /******************************************************************
  **                      Global Variables 
  ******************************************************************/

global $wpdb;
$uni_prefix = "todol_";
$table_name = $wpdb->prefix.'todolists';
$page_name="";


 /******************************************************************
  *                       include files 
  ******************************************************************/


include_once(dirname(__FILE__).'/activation.php');
include_once(dirname(__FILE__).'/data-processing.php');
include_once(dirname(__FILE__).'/widgets/todol_widget.php');
include_once(dirname(__FILE__).'/enqueues.php');
include_once(dirname(__FILE__).'/todol-functions.php');
register_activation_hook( __FILE__,  array( 'todo', 'install' ));
register_uninstall_hook( __FILE__,array( 'todo', 'uninstall' ));

//include_once(dirname(__FILE__).'/todol-settings.php');





//---------------------------------------------------
//---------------------- Register todo menus --------------------
//---------------------------------------------------
function register_todol_menu(){

	

	add_menu_page( __('Todo List'),   // page_title 
					__('Todo List'),   // menu title 
					'manage_options',  // capability 
					'todo_lists',      // menu slug 
					'todol_menu_cb',   // callable function 
					'dashicons-editor-paste-text',    // icon url 
					 99                 // position 
				 );    
		
	$submenus = [

		array(
			'parent_menu_slug'		=>	__('todo_lists'),
			'page_title'			=>	__('Add New Task'),
			'menu_title'			=>	__('Add Task'),
			'capability'			=>	__('manage_options'),
			'slug'					=>	__('todol_add_task'),
			'callback'				=>	__('todol_add_task_cb'),
			),
		array(
			'parent_menu_slug'		=>	__('todo_lists'),
			'page_title'			=>	__('task completed'),
			'menu_title'			=>	__('complete Tasks'),
			'capability'			=>	__('manage_options'),
			'slug'					=>	__('todol_cmp_task'),
			'callback'				=>	__('todol_cmp_task_cb'),
			),
		array(
			'parent_menu_slug'		=>	__('todo_lists'),
			'page_title'			=>	__('Todo Settings'),
			'menu_title'			=>	__('Settings'),
			'capability'			=>	__('manage_options'),
			'slug'					=>	__('todol_settings'),
			'callback'				=>	__('todol_settings_cb'),
			),
		

	];   

	foreach ($submenus as $submenu) :

			add_submenu_page($submenu['parent_menu_slug'],$submenu['page_title'],$submenu['menu_title'],$submenu['capability'],$submenu['slug'],$submenu['callback']);

	         
	 endforeach;   

	 function todol_settings_cb()
	 {
	 		todol_template_part('custom_setting_tmp');

	 }  // </todol_settings_cb>   


	function  todol_add_task_cb()
	{
		// page : todo-list_page_todol_add_task
        todol_template_part('add_task_tmp');

     } // </todol_add_task_cb> 



	function todol_menu_cb()
	{
		// page : toplevel_page_todo_lists
		todol_template_part('tasks_tmp');

	} // </todol_menu_cb> 



	function todol_cmp_task_cb()
	{
		todol_template_part('complited_task_tmp');

	}// </todol_cmp_task_cb> 

	

}  // </register_todol_menu>
  
add_action('admin_menu','register_todol_menu');




