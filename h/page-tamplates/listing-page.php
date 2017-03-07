<?php
/*
Template Name: Listing From
Template Post Type: post, page
*/
ob_start();
?>
<?php get_header(); ?>

<?php 
	if(!is_user_logged_in()) :

		wp_redirect(home_url().'/login');
		return ; 
	endif;

  

?>	





<!--contact-->
<div class="login-right">
	<div class="container">
		<h3>Add Listing</h3>
		<div class="login-top">
			
				<div class="form-info">
					<form method='post' id='listing_form' action="<?php echo admin_url().'admin-post.php';?>">
						<label>Title: <i>ex. Super deluxe Double room</i></label>
						<input type="text" class="text" placeholder="Super deluxe Double room" required="" name='p_title'>

						<label>Location: <i>ex. Ahmedabad, Gujarat, India</i></label>
						<input type="text" id='autocomplete' class="text" placeholder="" required="" onFocus="" name="p_location">

						<label>The space: <i>ex. [Accommodates: 2,Beds: 1]</i></label>
						<input type="text" class="text" placeholder="[Accommodates: 2,Beds: 1]" required="" name="p_space">

						<label>Amenities: <i>ex. [Elevator in building,Washer]</i></label>
						<input type="text" class="text" placeholder="[Elevator in building,Washer]" required="" name="p_amenities">

						<label>Per Night: <i>ex. 3500</i></label>
						<input type="text" class="text" placeholder="3500" required="" name="p_pernight">
						<div class="leave">
						<label>About This Listing: <i>ex. its situated at business hub</i></label>
						<textarea  placeholder="its situated at business hub" required="" name="p_about"></textarea>
             <input type="hidden" name="action" value="insert_property">
						</div>
						 <label class="hvr-sweep-to-right">
				           	<input type="submit" value="Post" name='post_list' id='add_listing_btn'>
				           </label>
					</form>
				</div>
			 <div id='listingnotices'></div>
	</div>
</div>
</div>
<!--//contact-->

<script type="text/javascript">
/*
var placeSearch, autocomplete;
var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

 function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
         
        }
}
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
      
*/
</script>

<?php get_footer(); ?>