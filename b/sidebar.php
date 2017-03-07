<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Banjaar
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<article class="span4">
<?php
dynamic_sidebar( 'sidebar-1' ); 
?>
</article>

