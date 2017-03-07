<?php
		global $wpdb;
		global $table_name;
		$complited_task = $wpdb->get_var( "SELECT COUNT(*) FROM $table_name where progress = 100 " );
		//$total_task=0;
	
		
?>
 <br><br>
 <div class="container add_task_container">
 <div class="panel panel-primary main task-panel-man">
		  <!-- Default panel contents -->
			<div class="panel-heading task-panel-heading">

			  	<div class="row">
				  	<div class="col-lg-6"><h4>Complited Task</h4></div>
				  	
				</div><!-- /.row -->

			</div><!-- /panel-heading -->

			 <div class="panel-body">
			 		<?php if($complited_task > 0) :?>
		
			 		 <button type="button" class="btn btn-danger" id='delete_all'>Delete All</button>
			 		<?php endif; ?>
				   
			    
			  </div><!-- /panel-body -->

			  <div div='all_task'>

<?php
	
	if($complited_task>0) :
			
	$tasks = $wpdb->get_results("SELECT * FROM $table_name where progress = 100 ");
	
	
			

?>
		<table class="table">
			<thead>
			  	<tr> 
			  	 	 <th>Task</th><th>Priority</th><th>type</th>
			  	 	 	  <th>Complited</th><th>progress</th>
			  	</tr>
			</thead>
			<tbody> 
<?php 
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
			  	  	 <td><?= $task->task; ?></td> <td><span class="label <?= $priority_class; ?>"><?= $priority_val; ?></span></td> <td><?= $task->category; ?></td><td><?= $task->complited; ?></td></td>
			  	  	<td><div class="progress task-progress">
  <div class=" progress-bar progress-bar-striped progress-bar-success task-progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: <?= $task->progress; ?>%">
    <?= $task->progress; ?>%
  </div>
</div></td> 
			  	  	
				</tr> 
<?php endforeach; ?>

 
			  	   

			  	   </tbody>
			   </table>

<?php 
	else :
		echo  "<h3 class='center'>empty</h3>";
	endif;
?>

			  </div><!-- /all_task -->
</div><!-- /panel -->
</div><!-- /container -->