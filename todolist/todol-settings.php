<?php

/****************** setting page *********************/
	function todol_page_settings()
	{

		 /*********Global Variables ********/
  		  
		

		$settings = array(
						array(
								'setting_page' 		=>	 'todol_settings',
								'option_name' 		=>	 'my_todol_settings'
							),
						);
		$fields = array(
					array(
						'uid' 			=>	 	'show_front_end',
						'title' 		=>		__('Show Front-end : ','todol_settings'), 
						'callback' 		=>		'todo_front_cb',
						'page'			=>		'todol_settings',
						'section'		=>		'general_settings',
						'args'			=>		[
												'label_for'		=>  'front_end',
												'class'			=>  'show_front_end',
												],
						),
					array(
						'uid' 			=>	 	'show_progress',
						'title' 		=>		__('Show progress : ','todol_settings'), 
						'callback' 		=>		'todo_progress_cb',
						'page'			=>		'todol_settings',
						'section'		=>		'general_settings',
						'args'			=>		[
												'label_for'		=>  'work_progress',
												'class'			=>  'show_progress',
												],
						),
					array(
						'uid' 			=>	 	'show_startdate',
						'title' 		=>		__('Show start : ','todol_settings'), 
						'callback' 		=>		'todo_start_cb',
						'page'			=>		'todol_settings',
						'section'		=>		'general_settings',
						'args'			=>		[
												'label_for'		=>  'start_date',
												'class'			=>  'show_start_date',
												],
						),
					array(
						'uid' 			=>	 	'show_dead_line',
						'title' 		=>		__('Show deadline : ','todol_settings'), 
						'callback' 		=>		'todo_deadline_cb',
						'page'			=>		'todol_settings',
						'section'		=>		'general_settings',
						'args'			=>		[
												'label_for'		=>  'deadline',
												'class'			=>  'show_deadline_date',
												],
						),
					array(
						'uid' 			=>	 	'show_category',
						'title' 		=>		__('Show category/title : ','todol_settings'), 
						'callback' 		=>		'todo_category_cb',
						'page'			=>		'todol_settings',
						'section'		=>		'general_settings',
						'args'			=>		[
												'label_for'		=>  'category_lbl',
												'class'			=>  'show_category_date',
												],
						),
					
					);

		foreach($settings as $setting )
		{
			register_setting( $setting['setting_page'],$setting['option_name']);
		}

		add_settings_section( 
	 					'general_settings', 
	 					__('General Settings:','todol_settings'), 
	 					'general_settings_cb',
	 					'todol_settings' 
	 	);
	 	

		foreach($fields as $field )
		{
			add_settings_field($field['uid'],$field['title'],$field['callback'],$field['page'],$field['section'],$field['args']);
		}
			
		function general_settings_cb($args)
		{


		} // </general_settings_cb>

		function todo_front_cb($args)
		{
			 $options =  get_option('my_todol_settings');

		
?>

	<select id="<?= esc_attr($args['label_for']); ?>" name="my_todol_settings[<?= esc_attr($args['label_for']); ?>]" >
		<option value="hide" <?= isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'hide', false)) : ('hide'); ?> >
            <?= esc_html('hide', 'todol_settings'); ?>
        </option>
        <option value="show" <?= isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'show', false)) : (''); ?> >
            <?= esc_html('show', 'todol_settings'); ?>
        </option>
     </select>

<?php
		} //</todo_front_cb>

		function todo_progress_cb($args)
		{
			 $options =  get_option('my_todol_settings');

?>

	<select id="<?= esc_attr($args['label_for']); ?>" name="my_todol_settings[<?= esc_attr($args['label_for']); ?>]" >
		<option value="hide" <?= isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'hide', false)) : ('hide'); ?> >
            <?= esc_html('hide', 'todol_settings'); ?>
        </option>
        <option value="show" <?= isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'show', false)) : (''); ?> >
            <?= esc_html('show', 'todol_settings'); ?>
        </option>
     </select>

<?php
		} //</todo_progress_cb>

		function todo_start_cb($args)
		{
			 $options =  get_option('my_todol_settings');

?>

	<select id="<?= esc_attr($args['label_for']); ?>" name="my_todol_settings[<?= esc_attr($args['label_for']); ?>]" >
		<option value="hide" <?= isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'hide', false)) : ('hide'); ?> >
            <?= esc_html('hide', 'todol_settings'); ?>
        </option>
        <option value="show" <?= isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'show', false)) : (''); ?> >
            <?= esc_html('show', 'todol_settings'); ?>
        </option>
     </select>

<?php
		} //</todo_start_cb>

		function todo_deadline_cb($args)
		{
			 $options =  get_option('my_todol_settings');

?>

	<select id="<?= esc_attr($args['label_for']); ?>" name="my_todol_settings[<?= esc_attr($args['label_for']); ?>]" >
		<option value="hide" <?= isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'hide', false)) : ('hide'); ?> >
            <?= esc_html('hide', 'todol_settings'); ?>
        </option>
        <option value="show" <?= isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'show', false)) : (''); ?> >
            <?= esc_html('show', 'todol_settings'); ?>
        </option>
     </select>

<?php
		} //</todo_deadline_cb>

		function todo_category_cb($args)
		{
			 $options =  get_option('my_todol_settings');

?>

	<select id="<?= esc_attr($args['label_for']); ?>" name="my_todol_settings[<?= esc_attr($args['label_for']); ?>]" >
		<option value="hide" <?= isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'hide', false)) : ('hide'); ?> >
            <?= esc_html('hide', 'todol_settings'); ?>
        </option>
        <option value="show" <?= isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'show', false)) : (''); ?> >
            <?= esc_html('show', 'todol_settings'); ?>
        </option>
     </select>

<?php
		} //</todo_category_cb>

}//</todol_page_settings>



?>