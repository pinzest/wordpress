--------functions.php


add_action( 'wp_ajax_get_search_result', 'get_result' );
add_action( 'wp_ajax_nopriv_get_search_result', 'get_result' );

function get_result()
{

   $avilable_meta_keys  = array('vehicle_type','make','mileage','retail');
    $custom_search_query = array('posts_per_page' => -1,'post_type'=>'vehicles','meta_query'=>array('relation'=>'AND'));

    if (isset($_POST)) 
{
        if(!empty($_POST['title']))
        {
            $custom_search_query['_meta_or_title']=$_POST['title'];
        }
         if(!empty($_POST['vehicle_type']))
        {
            $value = $_POST['vehicle_type'];
            $custom_search_query['meta_query'][] = array('key' => 'vehicle_type', 'value' => $value, 'compare' => '=');
        }
         if(!empty($_POST['vehicle_mileage']))
        {
           (int)$value = $_POST['vehicle_mileage'];
            $custom_search_query['meta_query'][] = array('key' => 'mileage' , 'value' => (int)$value,'type'    => 'numeric', 'compare' => '<=');
        }
         if(!empty($_POST['vehicle']))
        {
            $value = $_POST['vehicle'];
            $custom_search_query['meta_query'][] = array('key' => 'make' , 'value' =>$value, 'compare' => '=');
        }
         if(!empty($_POST['vehicle_price']))
        {
            $value = $_POST['vehicle_price'];
            $custom_search_query['meta_query'][] = array('key'=>'retail' , 'value' =>(int)$value, 'type'    => 'numeric', 'compare' => '<=');
        }
        if(count($custom_search_query['meta_query'])<2)
        {
        
            unset($custom_search_query['meta_query']);
        }
       /*  echo "<pre>";
        print_r($custom_search_query);
         echo "</pre>";*/
        
        $vehicles = new WP_Query( $custom_search_query );
       
        if(count($vehicles->posts)){
           
            //echo count($vehicles->posts);
            
        
                foreach($vehicles->posts as $vehicle) :
                    
                   
                    $article_class = "row fl-post post-".$vehicle->ID." post type-post status-publish format-standard hentry category-vehicle";
                    $article_id = "fl-post-".$vehicle->ID;
                   
                   $thumbnail =   get_the_post_thumbnail( $vehicle->ID, 'medium' ); 
                   $parmalink = get_post_permalink(  $vehicle->ID);
                   $retail_price = number_format(get_post_meta($vehicle->ID,'retail',true),2);
                   $down_payment = number_format(get_post_meta($vehicle->ID,'down',true),2);
                   ?>
                   
                   <article class="<?php echo  $article_class; ?>" id="<?php echo  $article_id; ?>">
               
                <div class='col-md-4'>
                    <h2 class="fl-post-title" itemprop="headline">
                        <a href="<?php echo  $parmalink; ?>" rel="bookmark" title="<?php echo $vehicle->post_title;?>"><?php echo $vehicle->post_title;?></a>
                    </h2>
                </div>
                <div class="col-md-4">
                    <div class="img-container post-thum">
                     <?php echo $thumbnail; ?>
                     <div class="img-overlay"></div>
                     <div class="img-button"><a href="<?php echo $parmalink; ?>"> View Details </a></div>
                    </div>                    
                </div>
                <div class="col-xs-12 col-md-4 vehicle-post-meta">
                   <ul>
                        <li> <strong>Retail: </strong><?php if($retail_price){echo '$'.$retail_price; } else { echo 'N/A'; }?></li>
                        
                        <li><strong>Down Payment: </strong><?php if($down_payment){echo '$'.$down_payment; } else { echo 'N/A'; }?></li>
                        <li><strong>Mileage: </strong><?php echo get_post_meta($vehicle->ID,'mileage',true);?></li>
                        <li><strong>Transmission: </strong><?php echo get_post_meta($vehicle->ID,'transmission',true);?></li>
                        <li><strong>Engine: </strong><?php echo get_post_meta($vehicle->ID,'engine',true);?></li>
                        <li><strong>MPG (city/highway): </strong><?php echo get_post_meta($vehicle->ID,'city_mpg',true) .'/'.get_post_meta($vehicle->ID,'highway_mpg',true);?></li>

                    </ul>
                </div>                
        </article>
                   
                   <?php
                   
               endforeach;
        }else{
            
                echo '<h1>No Results Found</h1>';
                echo "<h5>Sorry,but nothing matched your search criteria. please try again with some different keywords.</h5>";
       
        }
        
       
        
   
   
}

    wp_die();// close ajax
}




javascript................

<script type="text/javascript">

jQuery(document).ready(function($){
        $( ".search_btn" ).click(function( event )
        {
                  
            $('.vehicles_post_data').html('');
            $(".loader").css("display", "none");
            $(".loader").css("display", "block");

            var ajaxurl         =   "<?php echo admin_url('admin-ajax.php'); ?>";
            var vehicle_type    =   $('.search-vehicle-type').val();
            var vehicle_mileage =   $('.search-vehicle-mileage').val();
            var vehicle         =   $('.search-vehicle').val();
            var vehicle_price   =   $('.search-max-price').val();
            var title           =   $('.vehicle_title').val();
                data =  {
                            action          :       'get_search_result',
                            vehicle_type    :       vehicle_type,
                            vehicle_mileage :       vehicle_mileage,
                            vehicle         :       vehicle,
                            vehicle_price   :       vehicle_price,
                            title           :       title,
                        };
                        
            $.post(ajaxurl,data, function(response) {                        
                $(".loader").css("display", "none");
                $('.vehicles_post_data').html(response);
             });

           return false;
                    
        });
              
     });

</script>
