<?php
$msg = '';
if (isset( $_POST['gen_sett_submit'] ) && wp_verify_nonce( $_POST['gen_sett_nonce_field'], 'gen_sett_nonce' )
) {

  if (!current_user_can('manage_options')) return;

  $options = [

        'front_end'     =>    __($_POST['front_end'],'todol_gen_sett'),
        'work_progress' =>    __($_POST['work_progress'],'todol_gen_sett'),
        'start_date'    =>    __($_POST['start_date'],'todol_gen_sett'),
        'category'      =>    __($_POST['category'],'todol_gen_sett'),
        'deadline'      =>    __($_POST['deadline'],'todol_gen_sett'),


  ];



  if(get_option('todol_gen_sett_option'))
  {

     update_option('todol_gen_sett_option',$options);
     $msg = "<p class='success'>Settings Saved</p>";

  }
  else
  {

    add_option('todol_gen_sett_option',$options);
     $msg = "<p class='success'>Settings Saved</p>";

  }
  

} 

 $gen_sett_ops = get_option('todol_gen_sett_option');
?>
<br><br>
<div class='setting-tab_wrap container'>

<?php echo $msg; ?>

  <div id="setting_tabs">
    <ul>
      <li><a href="#gen_tab">General Settings</a></li>
      <li><a href="#up_tab">User Permission</a></li>
      <li><a href="#adv_tab">Advance Settings</a></li>
      <li><a href="#imex_tab">Import/Export</a></li>
    </ul>

    <div id="gen_tab">
      <form id=save_gen_sett method='post'>
        <?php wp_nonce_field( 'gen_sett_nonce', 'gen_sett_nonce_field' ); ?>
        <br><br>
      <div class="row">
        <div class="col-md-12">    
          <div class="row">
            <div class="col-md-2">
              <label for="front_end">Show Front-End :</label>
            </div>
            <div class="col-md-10">
              <select name="front_end" id="speed">
                <option <?= isset($gen_sett_ops['front_end']) ? (selected($gen_sett_ops['front_end'],'Show')) : (''); ?> >Show</option>
                <option <?= isset($gen_sett_ops['front_end']) ? (selected($gen_sett_ops['front_end'],'Hide')) : (''); ?> >Hide</option>
              </select>
              <p>(display in frontend  through widget)</p> 
            </div> <!--   col6      -->
          </div> <!--   row      -->
        </div><!--   col12      -->
      </div> <!--   row      -->
      <br>
      <div class="row">
        <div class="col-md-12">    
          <div class="row">
            <div class="col-md-2">
              <label for="work_progress">Show Progress :</label>
            </div>
            <div class="col-md-10">
              <select name="work_progress" id="speed">
                  <option <?= isset($gen_sett_ops['work_progress']) ? (selected($gen_sett_ops['work_progress'],'Show')) : (''); ?> >Show</option>
                <option <?= isset($gen_sett_ops['work_progress']) ? (selected($gen_sett_ops['work_progress'],'Hide')) : (''); ?> >Hide</option>
              </select>
              <p> (display progress column) </p>
            </div> <!--   col6      -->
          </div> <!--   row      -->
        </div><!--   col4      -->
      </div> <!--   row      -->
      <br>
      <div class="row">
        <div class="col-md-12">    
          <div class="row">
            <div class="col-md-2">
              <label for="start_date">Show Start :</label>
            </div>
            <div class="col-md-10">
              <select name="start_date" id="speed">
                <option <?= isset($gen_sett_ops['start_date']) ? (selected($gen_sett_ops['start_date'],'Show')) : (''); ?> >Show</option>
                <option <?= isset($gen_sett_ops['start_date']) ? (selected($gen_sett_ops['start_date'],'Hide')) : (''); ?> >Hide</option>
              </select>
               <p>(display Start Date  column)</p>
            </div> <!--   col6      -->
          </div> <!--   row      -->
        </div><!--   col4      -->
      </div> <!--   row      -->
      <br>
      <div class="row">
        <div class="col-md-12">    
          <div class="row">
            <div class="col-md-2">
              <label for="category">Show Type :</label>
            </div>
            <div class="col-md-10">
              <select name="category" id="speed">
                <option <?= isset($gen_sett_ops['category']) ? (selected($gen_sett_ops['category'],'Show')) : (''); ?> >Show</option>
                <option <?= isset($gen_sett_ops['category']) ? (selected($gen_sett_ops['category'],'Hide')) : (''); ?> >Hide</option>
              </select>
              <p>(display Category/Type column)</p> 
            </div> <!--   col6      -->
          </div> <!--   row      -->
        </div><!--   col4      -->
      </div> <!--   row      -->
      <br>
      <div class="row">
        <div class="col-md-12">    
          <div class="row">
            <div class="col-md-2">
              <label for="deadline">Show Deadline :</label>
            </div>
            <div class="col-md-10">
              <select name="deadline" id="speed">
                <option <?= isset($gen_sett_ops['deadline']) ? (selected($gen_sett_ops['deadline'],'Show')) : (''); ?> >Show</option>
                <option <?= isset($gen_sett_ops['deadline']) ? (selected($gen_sett_ops['deadline'],'Hide')) : (''); ?> >Hide</option>
              </select>
               <p></p>
            </div> <!--   col6      -->
          </div> <!--   row      -->
        </div><!--   col4      -->
      </div> <!--   row      -->
     

     <br><br>
      <div class="row">
        <div class="col-md-12">    
          <div class="row">
            <div class="col-md-2">
              
            </div>
            <div class="col-md-10">
              <input class="btn btn-success" type="submit" value="Save Settings" name='gen_sett_submit'>
             
            </div> <!--   col6      -->
          </div> <!--   row      -->
        </div><!--   col12      -->
      </div> <!--   row      -->
      </form>
    </div> <!--   gen_tab      -->


    <div id="up_tab">
     
     

      


    </div> <!--   up_tab      -->


    <div id="adv_tab">
      


    </div>
    <div id="imex_tab">
      


    </div>


  </div>


</div>
 


 