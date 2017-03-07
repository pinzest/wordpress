<br><br>
<div class='container add_task_container'>


<div class="panel panel-primary main task-panel-man">
      <!-- Default panel contents -->
      <div class="panel-heading task-panel-heading">

          <div class="row">
            <div class="col-lg-6"><h4>Add New Task</h4></div>
            
        </div><!-- /.row -->

      </div><!-- /panel-heading -->

       <div class="panel-body">

        <form method="post" action='#' id='add_task_form'>
          
         <div class="row">
            <div class="col-md-1">Title :</div>
            <div class="col-md-5">
              <input value ="" type="text" id="new_task_title" class="form-control" >
            </div>
            <div class="col-md-1">Type :</div>
            <div class="col-md-5">
              <input value="" type="text"  id="new_task_type" class="form-control">
            </div>
        </div><!-- /.row --> 
        <br><br>
        <div class="row">
            <div class="col-md-1">Priority :</div>
            <div class="col-md-1">
              
                 <select name="deadline" id="new_task_priority">
                        <option value='h' >Highest</option>
                         <option value='m' >Medium</option>
                          <option value='n' >Normal</option>
                        
                      </select>

            </div>
            <div class="col-md-1">Progress: </div>
            <div class="col-md-1"> 
              <input type="number" id="new_task_progress" value="0"  max=100 min=0 />
            </div>
            <div class="col-md-1">Deadline: </div>
            <div class="col-md-1">
              <input id='dpic' type="text" class="datepicker" value="">
            </div>
            <div class="col-md-1 col-md-offset-2 "><input class='btn btn-success' type="submit" value='Create' id='create_btn'></div>
        </div><!-- /.row --> 
          </form>
        </div><!-- /panel-body -->

</div>
        
</div>
<div id="res"></div>









