<?php
/**
 * The header for our theme.
 *
 * 
 *
 * @package Banjaar
 */
?>
<?php /* wp_nav_menu(array('container_class'=>'nav-collapse nav-collapse_  collapse'));*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php wp_title("|"); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>  >
<!--<div class="spinner"></div>-->
<header>
  <div class="container clearfix">
    <div class="row">
      <div class="span12">
        <div class="navbar navbar_">
          <div class="container">

              <h1 class="brand brand_"><a href="index.html">
              <?php
              // display logo 
              if(!has_custom_logo()){
                ?>
                  <img alt="" src="<?= get_template_directory_uri().'/img/logo.gif';?>">
              <?php
                }
                else
                banjaar_the_custom_logo();
              ?>
               </a></h1>
            <a class="btn btn-navbar btn-navbar_" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span> </a>

              <?php

              wp_nav_menu(
                          array(
                            'theme_location'=>'primary',
                            'menu'=>'shivmenu',
                            'menu_id'=>'shivmenuid',
                            'container_class'=>'nav-collapse nav-collapse_  collapse',
                            'menu_class'=>'nav sf-menu sf-js-enabled',
                            'container_id' => 'shiv_container_id',
                            'fallback_cb' => 'banjaar_menu_fallback',
                            'before' => '',
                           'after' => '',
                           'link_before' => '',
                            'echo' => true,
                            'depth' => 0,
                           // 'walker' => '',
                           
                            //'items_wrap' => '',
                           // 'item_spacing' => 'preserve', //'preserve' or 'discard'
                          ));
              ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<div class="banjaar-hero-area bg-content">
    <?php banjaar_slider_template(); ?>
</div>
<div class="bg-content">
