<form >
	
	<input type="text" name="s" value=''>
    <input type="text" name="key1">
    <input type="text" name="key2">
    <input type="text" name="key3">
    <input type="submit" value='search'>
</form>
<?php

$avilable_meta_keys  = array('key1','key2','key3');
$custom_search_query = array('post_type'=>'post','meta_keys'=>array('relation'=>'AND'));

// if 1
if (isset($_GET)) 
{
	// for searching for 'S'
	// if 1-1
    if(isset($_GET['s']))
    {   
    	// if 1-1-1
    	if(!empty($_GET['s']))
    	{
            /* 

				@authour_ids :  get authour ids by meta_key and Meta Value..

            */
			$authour_found = true;
            // if 1-1-1-1
			if($authour_found)
    		$auhour_ids = array(1);
    		else
    		$auhour_ids = array(0);

 			$custom_search_query['authour_in'] = $auhour_ids;	
    	}
    	else
    	{
    		$auhour_ids = array(0);
 			$custom_search_query['authour_in'] = $auhour_ids;
    	}

    	
    }

    foreach ($_GET as $key => $value)
    {
         
      if(in_array($key, $avilable_meta_keys))
      {
         if (!empty($value)) {
			$custom_search_query['meta_keys'][] = array('key'=>$key,'value'=>$value,'compare'=>'LIKE');
             	}
      }
    		
    } // end foreach


    if(count($custom_search_query['meta_keys'])<2)
    {
    	unset($custom_search_query['meta_keys']);
    }

}

echo '<pre>';
print_r($custom_search_query);
echo '</pre>';
