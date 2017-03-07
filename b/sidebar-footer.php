<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Banjaar
 */

if ( ! is_active_sidebar( 'footer-1' ) ) {
	return;
}?>
<div class="row">
  <div class="footer-bar"><?php dynamic_sidebar( 'footer-1' ); ?></div>
  <div class="footer-bar"><?php dynamic_sidebar( 'footer-1' ); ?></div>
  <div class="footer-bar"><?php dynamic_sidebar( 'footer-1' ); ?></div>
</div>
