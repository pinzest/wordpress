<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$taxonomies    =    get_terms(
								[
									'taxonomy'=>'publisher',
									'hide_empty'=>false,
								]
					);

if ( $ajax == 'true' )
{
	$searchClass = "lbsp_search_ajax";
}
else{
	$searchClass  = "lbsp_search";
}


?>

<form action='/booksarch' method='POST'>
	<div class='book-form'>
		<h1 class='book-form-title'><?php echo $title; ?></h1>
		<div class='.book-search-fields'>
			<div class='book-search-field'>
				<label for='star_rating'>
				<?php echo esc_html__('Book Title:', 'lbsp'); ?>
				</label>
				<input type='text' placeholder='Book Title' name='book' class='book form-control' id='book_name'/>
			</div>
			<div class='book-search-field'>
				<label for='star_rating'>
				<?php echo esc_html__('Author Name:', 'lbsp'); ?>
				</label>
				<input type='text' placeholder='Author' name='auther' class='author form-control' id='author_id'/>
			</div>
			<div class='book-search-field'>
				<label for='star_rating'>
					<?php echo esc_html__('Rating:', 'lbsp'); ?>
				</label>
				<select name='rating_name' class='rating form-control' id='rating_id'>
	              	<option value=''>Select Rating</option>
				  	<option value='1'>1</option>
				  	<option value='2'>2</option>
				  	<option value='3'>3</option>
				  	<option value='4'>4</option>
				  	<option value='5'>5</option>
				</select>
			</div>

			<div class='book-search-field'>
				<label for='star_rating'>
				<?php echo esc_html__('Publisher:', 'lbsp'); ?>
				</label>
				<select name='publisher_name' class='publisher form-control' id='publisher_id'>
					<option value=''>Select Publisher</option>
					<?php
					  foreach($taxonomies as $term)
					  {
						  $id = $term->term_id;
						  $name= $term->name;
						  echo "<option value=$id>$name</option>";
					  }
					?>
				</select>
			</div>
			<div class='book-search-field'>
				<label for='star_rating'> 
				<?php echo esc_html__('Price:', 'lbsp'); ?> 
				</label>
				<input type='text' id='amount' readonly style='border:0; color:#f6931f; font-weight:bold;'>
				<div id='slider-range'></div>
				<div id='min_price' style='display:none;'></div>
				<div id='max_price' style='display:none;'></div>
			</div>
			
			<div class='book-search-field'>
				<input type='submit' name='search' id='search_id' class="<?php echo $searchClass; ?>" value="<?php echo $submit;?>">
			</div>
			
		</div>
	</div>
</form>
<br><br><br><div id='result'></div>