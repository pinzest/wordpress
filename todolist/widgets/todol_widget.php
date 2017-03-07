<?php

class TodolWidget extends WP_Widget 
{

	function __construct() 
	{
		// Instantiate the parent object
		

		 $widget_options = array( 
      		'classname' => 'todol_widget',
     		'description' => 'Show todo list',
     		
     		
    		);
		 parent::__construct( 'TodolWidget', 'Todo List', $widget_options );

	} //__construct

	function widget( $args, $instance )
	{
		if(isset($instance['useritm']) && $instance['useritm']=='_box')
		{
			if(!is_user_logged_in())
			{
					return;
					die();
			}
		}

		// Widget output

		$front = get_option('todol_gen_sett_option');
		
		if($front['front_end']!='Show')return ;	
		
		echo $args['before_widget'];

	
		if ( ! empty( $instance['title'] ) ) :
		
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];

		endif;
		$ins_catg = $instance['ctg'] ;
		$limit =  $instance['limit'];
		
		
		global $wpdb;
		global $table_name;
		$tasks = $wpdb->get_results("SELECT * FROM $table_name where progress != 100 and category = '$ins_catg' limit $limit");
		foreach ($tasks as $task) :
?>
			
			<div class="list-group list-group-item" id='f_task_<?= $task->id ?>'  >
  
			    <h6 class="list-group-item-heading">
			    	<input  type='checkbox' class='cmpf' id='c_task_<?= $task->id ?>' > <?php echo $task->task; ?>
			    </h6>
			    <p class="list-group-item-text">
			    	<?php 
			    		if($instance['deadline'] =='_box') 
			    			echo "Deadline:". $task->deadline."<br>";
			    		if($instance['sctg'] =='_box') 
			    			echo "Category:". $task->category."<br>";
			    		if($instance['progress'] =='_box') 
			    			echo "[".__($task->progress,'todol_widget')."%]";
			    	?>
			    </p>
  
			</div>
<?php 	
		endforeach;

		echo $args['after_widget'];
		 
		}//widgets
	
	

	function update( $new_instance, $old_instance ) 
	{
		// Save widget options
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance					['title'] ) : '';
		$instance['ctg'] = ( ! empty( $new_instance['ctg'] ) ) ?  $new_instance['ctg']  : '';
		
		$instance['limit'] = ( ! empty( $new_instance['limit'] ) ) ?  $new_instance['limit']  						: '';
		$instance['resp'] = ( ! empty( $new_instance['resp'] ) ) ?  $new_instance['resp']  						: '';
		$instance['sctg'] = ( ! empty( $new_instance['sctg'] ) ) ?  $new_instance['sctg'] : '';
		$instance['deadline'] = ( ! empty( $new_instance['deadline'] ) ) ?  $new_instance['deadline']  : '';
		$instance['progress'] = ( ! empty( $new_instance['progress'] ) ) ?  $new_instance['progress']  : '';
		$instance['useritm'] = ( ! empty( $new_instance['useritm'] ) ) ?  $new_instance['useritm']  : '';


		return $instance;
		
	} //update

	function form( $instance ) 
	{

		// Output admin widget options form

		global $wpdb;
		global $table_name;

		$title 	= 	! empty( $instance['title'] ) ? $instance['title'] : ''; 
		$ctg 	= 	! empty( $instance['ctg'] ) ? $instance['ctg'] : '';
		$limit 	= 	! empty( $instance['limit'] ) ? $instance['limit'] : '';
		$resp 	= 	! empty( $instance['resp'] ) ? $instance['resp'] : '';
		$sctg 	= 	! empty( $instance['sctg'] ) ? $instance['sctg'] : '';
		$dline 	= 	! empty( $instance['deadline'] ) ? $instance['deadline'] : '';
		$prog 	= 	! empty( $instance['progress'] ) ? $instance['progress'] : '';
		$userl	= 	! empty( $instance['useritm'] ) ? $instance['useritm'] : '';


		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name)
		{
		echo  "<div class='todol_wid_error'><b>Table does not exists in database</b></div>";
		return;
		}
		$tasks = $wpdb->get_results("SELECT DISTINCT category FROM $table_name where progress != 100 ");

?>
		<p>
    		<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
    	</p>
    	<p>
    		<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" 
    				name="<?php echo $this->get_field_name( 'title' ); ?>" 
    				value="<?php echo esc_attr( $title ); ?>" width="100%" />
  		</p>
  		<p>
  			Category:
        
  			<select id="<?php echo $this->get_field_id( 'ctg' ); ?>" name = "<?php echo $this->get_field_name( 'ctg' ); ?>" >
  					
  					<?php  
  					foreach ($tasks as $task) : 
  					?>

  								<option value="<?php echo $task->category; ?>" 
  										<?php selected($ctg,$task->category ); ?> > 

  											<?php echo $task->category; ?>

  								</option>


  					<?php 
  					 endforeach;	
  					  ?>

  			</select>		
  		</p>		
		<p>
			Number of Items to Display:
  			<select 
  					id 		=	"<?php echo $this->get_field_id( 'limit' ); ?>"
  					name 	= 	"<?php echo $this->get_field_name( 'limit' ); ?>"
  			>

  				<?php for ($item=3;$item<16;$item++) : ?>
  							
  					<option 
  						value="<?php echo $item ?>"
  						<?php selected($limit,$item); ?> > 
  							<?php echo $item; ?>
  					</option>


  				<?php endfor; ?>

  			</select>
  		</p>
  		<p>
	  		<input  
	  				type 	=	'checkbox' 
	  				name 	=	"<?php echo $this->get_field_name( 'resp' ); ?>"

	  				id 		=	"<?php echo $this->get_field_id( 'resp' ); ?>"
	  				value	=	'_box'
	  				<?php checked($resp,'_box'); ?>
	  		/> Show Responsible To <br>
	  		<input  
	  				type 	=	'checkbox' 
	  				name 	=	"<?php echo $this->get_field_name( 'deadline' ); ?>"
	  				id 		=	"<?php echo $this->get_field_id( 'deadline' ); ?>"
	  				value	=	'_box'
	  				<?php checked($dline,'_box'); ?>
	  		/> Show Deadline<br>
	  		<input  
	  				type 	=	'checkbox' 
	  				name 	=	"<?php echo $this->get_field_name( 'sctg' ); ?>"
	  				id 		=	"<?php echo $this->get_field_id( 'sctg' ); ?>"
	  				value	=	'_box'
	  				<?php checked($sctg,'_box'); ?> 
	  		/> Show Category<br>
	  		<input  
	  				type 	=	'checkbox' 
	  				name 	=	"<?php echo $this->get_field_name( 'progress' ); ?>"
	  				id 		=	"<?php echo $this->get_field_id( 'progress' ); ?>"
	  				value	=	'_box'
	  				<?php checked($prog,'_box'); ?> 
	  		/> Show Progress<br>
	  		<input  
	  				type 	=	'checkbox' 
	  				name 	=	"<?php echo $this->get_field_name( 'useritm' ); ?>"
	  				id 		=	"<?php echo $this->get_field_id( 'useritm' ); ?>"
	  				value	=	'_box'
	  				<?php checked($userl,'_box'); ?> 
	  		/> Show Only Logged-In User's Items<br>
	  		
  		</p>

<?php
	}//form

}//todolwidget class

add_action( 'widgets_init', function(){
	register_widget( 'TodolWidget' );
} );

?>