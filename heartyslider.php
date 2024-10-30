<?php

/**
*   Plugin Name: Hearty Slider
*   Plugin URI: http://www.heartyplugins.com/hearty-slider
*   Description: Hearty Slider is a free responsive WordPress plugin that can be used to create a slideshow and customize each slide using the 90+ module settings
*   Version: 1.1
*   Author: Hearty Plugins
*   Author URI: http://www.heartyplugins.com
*   License: http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
*/

// no direct access

if (!defined('ABSPATH')) { die; }

function heartyslider_add_css() {

	//------

	wp_register_style('hrty-bootstrap-css', plugins_url('/theme/bootstrap/hrty-bootstrap.css', __FILE__));
	wp_register_style('hrty-fontawesome-css', '//use.fontawesome.com/releases/v5.0.13/css/all.css');

	wp_register_style('heartyslider-css', plugins_url('/theme/css/frontend.css', __FILE__));

	//------

	wp_enqueue_style('hrty-bootstrap-css');
	wp_enqueue_style('hrty-fontawesome-css');

  wp_enqueue_style('heartyslider-css');

}

function heartyslider_add_admin_css() {

	wp_register_style('hrty-bootstrap-css', plugins_url('/theme/bootstrap/hrty-bootstrap.css', __FILE__));
	wp_register_style('hrty-fontawesome-css', '//use.fontawesome.com/releases/v5.0.13/css/all.css');
	wp_register_style('heartyslider-admin-css', plugins_url('/theme/css/admin.css', __FILE__));

  wp_enqueue_style('hrty-bootstrap-css');
  wp_enqueue_style('hrty-fontawesome-css');
	wp_enqueue_style('heartyslider-admin-css');

	// Add the color picker css file
  wp_enqueue_style( 'wp-color-picker' );

}

function heartyslider_add_js() {

	wp_register_script('hrty-bootstrap-js', plugins_url('/theme/bootstrap/hrty-bootstrap.js', __FILE__), array('jquery'));

	wp_enqueue_script('hrty-bootstrap-js');

}

function heartyslider_add_admin_js() {

	wp_enqueue_media();

	wp_register_script('hrty-bootstrap-js', plugins_url('/theme/bootstrap/hrty-bootstrap.js', __FILE__), array('jquery'));
	wp_register_script('heartycolorpicker-js', plugins_url('/theme/js/colorpicker.js', __FILE__), array('wp-color-picker'), false, true);
	wp_register_script('heartyslider-admin-js', plugins_url('/theme/js/admin.js', __FILE__), array('jquery'));

	wp_enqueue_script('hrty-bootstrap-js');
	wp_enqueue_script('heartycolorpicker-js');
	wp_enqueue_script('heartyslider-admin-js');

}

function heartyslider($atts) {

	require_once('inc/view.php');

	$atts = shortcode_atts(array('settings_instance' => 1), $atts, 'heartyslider');
	$settings_instance = $atts['settings_instance'];
	$output = HeartySliderView::generate_view($settings_instance);

	return $output;

}

function heartyslider_widget() {

	require_once('inc/widget.php');

	register_widget('HeartySliderWidget');

}

if (is_admin()) {

	require_once('inc/options.php');
	$heartyslider_settings_page = new HeartySliderSettingsPage();

	if (isset($_GET['page']) && $_GET['page'] == 'heartyslider-setting-admin') {

		add_action('admin_enqueue_scripts', 'heartyslider_add_admin_css');
		add_action('admin_enqueue_scripts', 'heartyslider_add_admin_js');

	} else {

		add_action('widgets_init', 'heartyslider_widget');

	}

} else {

	add_action('wp_enqueue_scripts', 'heartyslider_add_css');
	add_action('wp_enqueue_scripts', 'heartyslider_add_js');

	add_action('widgets_init', 'heartyslider_widget');
	add_shortcode('heartyslider', 'heartyslider');

}

