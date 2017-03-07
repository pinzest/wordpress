<?php
		global $wpdb;
		global $table_name;
		$total_task = $wpdb->get_var( "SELECT COUNT(*) FROM $table_name " );
		
		$uncomplite = $wpdb->get_var( "SELECT COUNT(*) FROM $table_name where progress != 100" );
		$perpage = 4;
		$pages = ceil($uncomplite/$perpage);
		
		
	
		
?>
 <br><br>
 <div class="container add_task_container">
 <div class="panel panel-primary main task-panel-man">
		  <!-- Default panel contents -->
			<div class="panel-heading task-panel-heading">

			  	<div class="row">
				  	<div class="col-lg-6"><h4>Todo List</h4></div>
				  	
				</div><!-- /.row -->

			</div><!-- /panel-heading -->

			 <div class="panel-body">

		
			 		<div id='complite_task_msg'></div>
				   
			    
			  </div><!-- /panel-body -->

			  <div div='all_task'>

<?php
	
	if($total_task>0 and $uncomplite>0) :
			
	$tasks = $wpdb->get_results("SELECT * FROM $table_name where progress != 100  limit 0,$perpage ");
	
	
			

?>
		<table class="table">
			<thead>
			  	<tr> 
			  	 	 <th></th><th>Task</th><th>Priority</th><th>type</th><th>Start</th>
			  	 	 	  <th>Deadline</th><th>progress</th><th>Action</th>
			  	</tr>
			</thead>
			<tbody id='task-tbody'> 
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
<?php endforeach; ?>

 
			  	   

			  	   </tbody>
			   </table>

<?php 
	else :
		echo  "<h3 class='center'>You have no Task , <br> please enjoye your day!</h3>";
	endif;
?>

			  </div><!-- /all_task -->
<?php if($uncomplite>4) : ?>
			  <div>
			  	

			  			<nav aria-label="Page navigation">
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php  for($i=1;$i<=$pages;$i++) :?>
    <li><a href="#" class='todo-pagination' id="todo_page_<?= $i; ?>"><?php echo $i; ?></a></li>
    
<?php endfor; ?>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>

			  </div>
<?php endif; ?>

</div><!-- /panel -->
</div><!-- /container -->



<div class='container edit_task_container' id ="edit_box">
	



</div>
<div id='shiv'>
	


	
</div>