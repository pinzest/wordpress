<?php


add_action('init',function(){


	// register costum texonomy for movies post:

		 $labels = [];
   		 $args = [];
   		 $taxonomies  = [

   		 		[
   		 			'name' 				=> __('Types'),
   		 			'singular_name'     => _x('Type', 'taxonomy singular name'),
   		 			'hierarchical'		=> true ,
   		 			'object_type'		=> array('movies'),

   		 		],
   		 		[
   		 			'name' 				=> __('Genres'),
   		 			'singular_name'     => _x('Genre', 'taxonomy singular name'),
   		 			'hierarchical'		=> false ,
   		 			'object_type'		=> array('movies'),

   		 		],
   		 		[
   		 			'name' 				=> __('Directors'),
   		 			'singular_name'     => _x('Director', 'taxonomy singular name'),
   		 			'hierarchical'		=> false ,
   		 			'object_type'		=> array('movies'),

   		 		],
   		 		[
   		 			'name' 				=> __('Producers'),
   		 			'singular_name'     => _x('Producer', 'taxonomy singular name'),
   		 			'hierarchical'		=> false ,
   		 			'object_type'		=> array('movies'),

   		 		],
   		 		[
   		 			'name' 				=> __('Casts'),
   		 			'singular_name'     => _x('Cast', 'taxonomy singular name'),
   		 			'hierarchical'		=> false ,
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


});
?>