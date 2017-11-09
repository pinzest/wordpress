<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$price = get_post_meta($book_object->ID,'price',true);
$rating = get_post_meta($book_object->ID,'rating',true);


?>

<style type="text/css">
	.book-data-panel div label {
    display: inline-block;
    width: 100px;
	}

	.book-data-panel div {
	    margin-bottom: 28px;
	}

	.book-rating select {
	    width: 200px;
	}

	.book-price input {
	    width: 200px;
	}
</style>


<div class='book-data-panel'>
	<div class='book-price'>
		<label>Price: </label>
		<input type="text" name="book-price" value="<?php echo $price; ?>" >
	</div>
	<div class='book-rating'>
		<label>Rating: </label>
		<select name="book-rating">
			<option value='1' <?php selected( $rating, 1 ); ?> > 1 </option>
			<option value='2' <?php selected( $rating, 2 ); ?> > 2 </option>
			<option value='3' <?php selected( $rating, 3 ); ?> > 3 </option>
			<option value='4' <?php selected( $rating, 4 ); ?> > 4 </option>
			<option value='5' <?php selected( $rating, 5 ); ?> > 5 </option>
		</select>
	</div>
</div>
