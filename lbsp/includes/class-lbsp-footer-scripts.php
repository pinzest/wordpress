<?php
/**
 *  footer scripts
 *
 * @class       LBSP_Footer_Scripts
 * @version     2.3.0
 * @package     LBSP/Classes/
 * @category    Class
 * @author      Shivlal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * LBSP_Footer_Scripts Class.
 */
class LBSP_Footer_Scripts {

	/**
	 * Hook in methods.
	 */
	public static function init() {
		add_action( 'wp_footer', array( __CLASS__, 'footerScripts' ) );
	}

	/**
	 * footer scripts.
	 */
	public static function footerScripts() {
		self::scripts();
	}
 
	private static function scripts() {

	?>
		<script type="text/javascript">
 
			jQuery(".lbsp_search_ajax").click(function(){

			    book        = jQuery("#book_name").val();
			    author      = jQuery("#author_id").val();
			    rating      = jQuery("#rating_id").val();
			    publisher   = jQuery("#publisher_id").val();
			    min_price   = jQuery("#min_price").html();
			    max_price   = jQuery("#max_price").html();
			    ajax_url    = "<?php echo admin_url( 'admin-ajax.php' );?>";
			    data        = {
			                    action    :    'LBSP_book_result',
			                    book      :    book,
			                    author    :    author,
			                    rating    :    rating,
			                    publisher :    publisher,
			                    min_price :    min_price,
			                    max_price :    max_price
			                  }

			    jQuery("#result").html('Loading..');

			        jQuery.post(ajax_url,data,function(response){
			              jQuery("#result").html(response);
			        });
			    return false;

			});

		</script>

	<?php
	}
}

LBSP_Footer_Scripts::init(); 