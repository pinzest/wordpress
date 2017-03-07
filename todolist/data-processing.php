<?php
//---------------------------------------------------
//---------------------- insert new task --------------------
//---------------------------------------------------

add_action('wp_ajax_newtaskinsert', 'new_task_insert');
function new_task_insert()
{
	
	$nonce			= __($_REQUEST['_ajax_nonce']);
	$title 			= __($_POST['title']);
	$priority 		= __($_POST['priority']);
	$type 			= __($_POST['type']);
	$responsible 	= __($_POST['responsible']);
	$progress 		= __($_POST['progress']);
	$deadline 		= __($_POST['deadline']);
	$start 			= __(date('m/d/Y'));

	if(!check_ajax_referer( 'add-task-nonce', $nonce ,false) or !wp_verify_nonce( $nonce, 'add-task-nonce' ))
	{
		echo "<div class='error'>Security check</div>";
		die();
		
	}
	if($progress<0 or $progress>100)
	{
		echo "<div class='error'>Value must be between 0 to 100</div>";
		die();
		
	}
	if(empty($title))
	{
		echo "<div class='error'>enter title</div>";
		die();
		
	}
	if(empty($type))
	{
		echo "<div class='error'>enter type</div>";
		die();
		
	}


	global $wpdb;

	$table_name   =  $wpdb->prefix.'todolists';
	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name)
	{
		echo "<div class='error'>table does not exists in database</div>";
		die();
	}

    $wpdb->insert( 
	$table_name, 
	array( 
		'task' => $title, 
		'priority' => $priority,
		'progress' => $progress,
		'start'	=> date('m/d/Y'),
		'deadline' => $deadline,
		'category'=>$type,
	), 
	array('%s', '%s','%d','%s',	'%s','%s') 
		);
     	$wpdb->flush();

	echo "<div class='success'>New task added.</div>";
	
	

		


	
	wp_die();// close ajax


} // </new_task_insert>



//---------------------------------------------------
//---------------------- complite task --------------------
//---------------------------------------------------

add_action('wp_ajax_complite_task', 'task_complited');

function task_complited(){
	
	$nonce = __($_REQUEST['_ajax_nonce']);
	$id = $_POST['id'];	
	if(!check_ajax_referer( 'add-task-nonce', $nonce ,false) or !wp_verify_nonce( $nonce, 'add-task-nonce' ))
	{
		echo "<div class='error'><b>Error:</b> Task not move in complited , Security check..</div>";
		die();
		
	}
	global $wpdb;
	global $table_name;
	 	$wpdb->update($table_name, 
	 					array( 
								'progress' => 100,
								'complited' => date('m/d/Y'),	
							 ), 
						array( 'id' => $id )
						
					  );

$wpdb->flush();

echo "<div class='success'> complited </div>";

	wp_die();// close ajax

}



// delete complited task............................
add_action('wp_ajax_delete_task', 'delete_all');

function delete_all(){
	
	$nonce = __($_REQUEST['_ajax_nonce']);
		
	if(!check_ajax_referer( 'add-task-nonce', $nonce ,false) or !wp_verify_nonce( $nonce, 'add-task-nonce' ))
	{
		echo "<div class='error'><b>Error:</b> Task not move in complited , Security check..</div>";
		die();
		
	}
	global $wpdb;
	global $table_name;
	 	 $wpdb->delete( $table_name, array( 'progress' => 100 ) );

$wpdb->flush();


	wp_die();// close ajax

}



// display edit task box....
add_action('wp_ajax_display_edit_box',function()
{

	$nonce = $_POST['_ajax_nonce'];
	$id = $_POST['id'];

	if(!check_ajax_referer( 'add-task-nonce', $nonce ,false) or !wp_verify_nonce( $nonce, 'add-task-nonce' ))
	{
		echo "<div class='error'><b>Error:</b> “Request Failed. Check Security.”</div>";
		die();
		
	}

	global $wpdb;
	global $table_name;

	if(!($wpdb->get_var( "SELECT COUNT(*) FROM $table_name WHERE id = $id ") ))
	{
		echo "<div class='error'><b>Error:</b> “An error has occurred with the data fetch. Please refresh the page and retry.”</div>";
		die();
	}

	$edit_task = $wpdb->get_row("SELECT * FROM $table_name where id = $id ");
	

?>

 <div class="panel panel-primary main task-panel-man">
		  <!-- Default panel contents -->
			<div class="panel-heading task-panel-heading">

			  	<div class="row">
				  	<div class="col-lg-6"><h4>Edit Task</h4></div>
				  	
				</div><!-- /.row -->

			</div><!-- /panel-heading -->

			 <div class="panel-body">

				<form id="edit_task_form">
			 		
				 <div class="row">
				  	<div class="col-md-1">Title :</div>
				  	<div class="col-md-5">
				  		<input value ="<?=  $edit_task->task; ?>" type="text" id="edit_title" class="form-control" >
				  	</div>
				  	<div class="col-md-1">Type :</div>
				  	<div class="col-md-5">
				  		<input value="<?=  $edit_task->category; ?>" type="text"  id="edit_type" class="form-control">
				  	</div>
				</div><!-- /.row --> 
				<br><br>
				<div class="row">
				  	<div class="col-md-1">Priority :</div>
				  	<div class="col-md-1">
				  		
				  			 <select name="deadline" id="edit_priority">
				                <option value='h' <?php selected($edit_task->priority,'h'); ?> >Highest</option>
				                 <option value='m' <?php selected($edit_task->priority,'m'); ?>>Medium</option>
				                  <option value='n' <?php selected($edit_task->priority,'n'); ?>>Normal</option>
				                
              				</select>

				  	</div>
				  	<div class="col-md-1">Progress: </div>
				  	<div class="col-md-1"> 
				  		<input type="number" id="edit_progress" value="<?=  $edit_task->progress; ?>"  max=100 min=0 />
				  	</div>
				  	<div class="col-md-1">Deadline: </div>
				  	<div class="col-md-1">
				  		<input id='edit_deadline' type="text" class="datepicker" value="<?=  $edit_task->deadline; ?>">
				  	</div>
				  	<div class="col-md-1 col-md-offset-2 "><input class='btn btn-success' type="submit" value='Update' id='upd'></div>
				</div><!-- /.row --> 
			    </form>
			  </div><!-- /panel-body -->


			  <script type="text/javascript">
			  		
			  	jQuery(document).ready(function($){
			  		$( ".datepicker" ).datepicker({
				      changeMonth: true,
				      changeYear: true,
				      showAnim:'slideDown', 
				    });
 	
				 	$('#edit_task_form').submit(function(){


				 		data = {

					_ajax_nonce: new_task_obj.nonce, //nonce
		            action: "updatetask",
		            title: $('#edit_title').val(),
            		priority: $('#edit_priority').val(),
            		type:$('#edit_type').val(),
            		progress: $('#edit_progress').val(),
            		deadline: $('#edit_deadline').val(),
            		id:<?php echo $id;?>
				    };


				 			
				 	$.post(new_task_obj.ajaxurl,data, function(response) {  //callback
		                   //insert server response
		                   $('#edit_box').html(' ');
		                   location.reload();
		                  $('#shiv').html(response);
		                  
		                 
		        	});
				 			return false;
				 			
				 	});
					
				 	

				 	
				 	
				 });//jQuery


			  </script>
</div>
<?php	
$wpdb->flush();
	wp_die();// close ajax

});


// updating task....

add_action('wp_ajax_updatetask',function(){



	$nonce = $_POST['_ajax_nonce'];
	$id = $_POST['id'];
	$title = $_POST['title'];
	$type = $_POST['type'];
	$progress = $_POST['progress'];
	$priority = $_POST['priority'];
	$deadline = $_POST['deadline'];

	if(!check_ajax_referer( 'add-task-nonce', $nonce ,false) or !wp_verify_nonce( $nonce, 'add-task-nonce' ))
	{
		echo "<div class='error'><b>Error:</b> “Request Failed. Check Security.”</div>";
		die();
		
	}
	global $wpdb;
	global $table_name;

	if(!($wpdb->get_var( "SELECT COUNT(*) FROM $table_name WHERE id = $id ") ))
	{
		echo "<div class='error'><b>Error:</b> “An error has occurred with the data fetch. Please refresh the page and retry.”</div>";
		die();
	}
	$wpdb->update($table_name, 
	 					array( 
								'progress' => $progress,
								'category' => $type,
								'task' => $title,
								'priority'	=> $priority,
								'deadline'	=> $deadline,
							 ), 
						array( 'id' => $id )
						
					  );

$wpdb->flush();
	echo "<div class='success'> updated.. </div>";

wp_die();// close ajax
});

//---------------------------------------------------
//---------------------- insert new task --------------------
//---------------------------------------------------
add_action('wp_ajax_pagination_result',function(){

	$limit = $_POST['limit'];
	$perpage = $_POST['perpage'];
	global $wpdb;
		global $table_name;
		$tasks = $wpdb->get_results("SELECT * FROM $table_name where progress != 100  limit $limit,$perpage ");
		foreach ($tasks as $task) :
	$priority_class = '';
	$priority_val = '';
	if($task->priority=='m')
	{
		$priority_class = 'label-primary';
		$priority_val = 'Medium';
		
	}
	elseif($task->priority=='n'){
		$priority_class = 'label-default';
		$priority_val = 'Normal';
	}
	elseif($task->priority=='h'){
		$priority_class = 'label-danger';
		$priority_val = 'Highest';
	}
	?>

<tr id="tr_<?= $task->id; ?>"> 
			  	  	<th scope="row"><input class='task_check' type='checkbox' id="<?= $task->id; ?>" title='complite'></th> <td><?= $task->task; ?></td> <td><span class="label <?= $priority_class; ?>"><?= $priority_val; ?></span></td> <td><?= $task->category; ?></td><td><?= $task->start; ?></td><td><?= $task->deadline; ?></td>
			  	  	<td><div class="progress task-progress">
  <div class=" progress-bar progress-bar-striped progress-bar-success task-progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: <?= $task->progress; ?>%">
    <?= $task->progress; ?>%
  </div>
</div></td> 
			  	  	<td><button type="button" class="btn btn-default edittask_btn" aria-label="Left Align" id="edit_<?= $task->id; ?>">
  <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
 
</button>
 <img src="<?php echo plugins_url( 'todolist/includes/img/loader.gif'); ?>" class='loader' id="loader_<?= $task->id; ?>">
</td>
				</tr> 

	<?php
endforeach;
?>
<script type="text/javascript">
	jQuery(document).ready(function($){
	//  request for display edit box....
 
 $('.edittask_btn').click(function(){
 	$('#edit_box').html(' ');
 	edit_id = $(this).attr('id');
 	id = edit_id.split("_")[1];
 	$('.loader').css('visibility','hidden');
 	$('#loader_'+id).css('visibility','visible');
 	data = {

					_ajax_nonce: new_task_obj.nonce, //nonce
		            action: "display_edit_box",
		            id: id,
				};
 	$.post(new_task_obj.ajaxurl,data, function(response) {  //callback
		                   //insert server response
		                   $('#edit_box').html(response); 
		                  $('#loader_'+id).css('visibility','hidden');
		                 
		        });
 	return false;
 	

 	

 	
 	
 });

//  complite task..
 
 $('.task_check').change(function(){

 	task_id = $(this).attr('id');
 	$('.task_check').prop('disabled',true);
	
 	data = {

					_ajax_nonce: new_task_obj.nonce, //nonce
		            action: "complite_task",
		            id: task_id,
				};

 	$.post(new_task_obj.ajaxurl,data, function(response) {  //callback
		                   //insert server response
		                  $('.task_check').prop('disabled',false);
		                 $('#complite_task_msg').html(response); 
		                 //$('#create_btn').prop('disabled', false);
		                 $('#tr_'+task_id).remove();
		                 
		        });
 	

 	return false;
 	
 });
 
 });   //jQuery
</script>
<?php
wp_die();// close ajax
});


?>