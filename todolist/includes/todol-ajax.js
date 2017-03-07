jQuery(document).ready(function($){

// inserting new task..
	$('#add_task_form').submit(function(){

			$('#create_btn').prop('disabled', true);
		data = {

					_ajax_nonce: new_task_obj.nonce, //nonce
		            action: "newtaskinsert",
		            title: $('#new_task_title').val(),
            		priority: $('#new_task_priority').val(),
            		type:$('#new_task_type').val(),
            		responsible:$('#new_task_respon').val(),
            		progress: $('#new_task_progress').val(),
            		deadline: $('#dpic').val(),
				};
			               
		       $.post(new_task_obj.ajaxurl,data, function(response) {  //callback
		                   //insert server response
		                  $('#new_task_title').val('');
		                  $('#new_task_progress').val(0);
		                  $('#new_task_type').val('');
		                   $('#dpic').val('');

		                 $('#res').html(response); 
		                 $('#create_btn').prop('disabled', false);
		                 
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

  //  delete all task..
 
 $('#delete_all').click(function(){

 	$(this).prop('disabled',true);
 	data = {

			_ajax_nonce: new_task_obj.nonce, //nonce
		    action: "delete_task",
		    
				};

 	$.post(new_task_obj.ajaxurl,data, function(response) {  //callback
		                   //insert server response
		                location.reload();
		                 
		        });
 	

 	return false;
 	
 




});

//complite task from widget

 $('.cmpf').change(function(){

 	 cbox_id = $(this).prop('id');
 	 slite_id = cbox_id.split('_');
 	  $('#f_task_'+slite_id[2]).animate({
    
    height: "0",
    width:"0"
   
  }, 90, function() {
    	$('#f_task_'+slite_id[2]).remove();
  	});

	
 	

 	return false;
 	
 });


 // pagination..

 
 $('.todo-pagination').click(function(){
 	$('.todo-pagination').css({"background-color": "white", "color": "#23527c"});
 	$(this).css({"background-color": "#286682", "color": "white"});
 	page = $(this).prop('id').split('_')[2];
 	limit=0;
 	if(page>1)
 	{
 		limit = ((page-1)*3)+1;
 	}


	
	data = {

		limit : limit,
		action:'pagination_result',
		perpage:4,
	};

	limit=0;
 	
$.post(new_task_obj.ajaxurl,data, function(response) {  //callback
		                   //insert server response
		                $('#task-tbody').html(response);
		                 
		        });
	
 	

 	return false;
 	
 });





  });   //jQuery