jQuery( document ).ready(function() {

  jQuery( function() {
   jQuery( "#slider-range" ).slider({
      range: true,
      min: 1,
      max: 1000,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        jQuery( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        jQuery( "#min_price" ).html( ui.values[ 0 ] );
        jQuery( "#max_price" ).html( ui.values[ 1 ] );
      }
    });

    jQuery( "#amount" ).val( "$" + jQuery( "#slider-range" ).slider( "values", 0 ) +
      " - $" + jQuery( "#slider-range" ).slider( "values", 1 ) );
    jQuery( "#min_price" ).html(  jQuery( "#slider-range" ).slider( "values", 0 ) );
    jQuery( "#max_price" ).html(  jQuery( "#slider-range" ).slider( "values", 1 ));
  } );

  

});