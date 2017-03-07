<?php
class todo{
    static function install()
	{
		
		global $wpdb;
	    $table_name   =  $wpdb->prefix.'todolists';
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name)
		{
			//table not in database. Create new table
    		$charset_collate = $wpdb->get_charset_collate();
     		$sql = "CREATE TABLE $table_name (
          			id int(11) NOT NULL AUTO_INCREMENT,
          			category varchar(255),
          			priority varchar(255),
          			progress int(5),
          			start varchar(125),
          			deadline varchar(125),
          			complited varchar(125),
          			task text,
          			PRIMARY KEY (id)
    				) $charset_collate,
 					ENGINE = MYISAM;";
     		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
     		dbDelta( $sql );
     		$wpdb->insert( 
				$table_name, 
				array(
					'id' => 4,
					'category' => 'todo list', 
					'priority' => 'h',
					'progress' =>  90,
					'start'     =>  date('m/d/Y'),
					'deadline' =>  '01/03/2017',
					'task' => 'Complite all task!',
				), 
				array( 
						'%d',
						'%s', 
						'%s',
						'%d',
						'%s',
						'%s',
						'%s',
					
					) 
			  );
     		$wpdb->flush();

     	}

     	// add options 
     	
     	 $options = [

        'front_end'     =>    __('Show','todol_gen_sett'),
        'work_progress' =>    __('Show','todol_gen_sett'),
        'start_date'    =>    __('Show','todol_gen_sett'),
        'category'      =>    __('Show','todol_gen_sett'),
        'deadline'      =>    __('Show','todol_gen_sett'),


  		];
  		if(!get_option('todol_gen_sett_option'))
  		add_option('todol_gen_sett_option',$options);


	}
	static function uninstall()
	{
		// drop all tables...
		global $wpdb;
	    $table_name   =  $wpdb->prefix.'todolists';
     	$wpdb->query( "DROP TABLE IF EXISTS $table_name" );
     	$wpdb->flush();

     	// delete all options 

     	if(get_option('todol_gen_sett_option'))
			delete_option('todol_gen_sett_option');

		

	}
}

?>