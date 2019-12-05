<?php

include_once 'admin_config_master.php';

$website['config']['main_cat'] = true;
$website['config']['sub_cat'] = true;
$website['config']['brands'] = true;
$website['config']['apps'] = true;
$website['config']['main_slider'] = true;
$website['config']['pages'] = true;
$website['config']['news'] = true;
$website['config']['posts'] = true;

/* main category */
$website['images']['main_entry_width'] = 600;
$website['images']['main_entry_height'] = 600;
$website['descp']['main_entry'] = true;
$website['gallery']['main_entry'] = true;


/* sub category */
$website['descp']['sub_entry'] = true;


/* brands */
$website['images']['brand_display'] = true;
$website['images']['brand_width'] = 400;
$website['images']['brand_height'] = 300;
$website['descp']['brand_display'] = true;
$website['custom_url']['brand_display'] = true;

/* main slider */
$website['images']['main_slider_width'] = 1920;
$website['images']['main_slider_height'] = 720;


/* news & events */
$website['images']['news_width'] = 768;
$website['images']['news_height'] = 512;

/* posts */
$website['images']['post_watermark'] = true;
$website['images']['post_width'] = 1280;
$website['images']['post_height'] = 820;
$website['images']['post_small_width'] = 520;
$website['images']['post_small_height'] = 400;
$website['descp']['post_data1_entry'] = true;
$website['name']['post_data1_entry'] = 'Specifications';
$website['images']['post_gal_width'] = 1280; /* scaled size. only one value for width or height */
$website['images']['post_thumb_width'] = 520;

/* page */
$website['images']['page_width'] = 1920;
$website['images']['page_height'] = 300;
?>