<?php 

/**
 *
 * Plugin Name: MPF Analytics Tracking 
 * Plugin URI:	https://htmlfivedev.com 
 * Description: Display a short notice above the post content.
 * Version: 	2.0
 * Author URI: 	https://www.linkedin.com/in/ahmedmusawir
 * License: 	GPL-2.0+ 
 *
 */

/**
 *
 * Replace the following from File Level 
 *
 */


//If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die("Cannot Access Directly");
}

define( "ANALYTICS_PLUGIN_DIR", plugin_dir_path( __FILE__ ) );


require_once( plugin_dir_path( __FILE__ ) . 'class-analytics-mpf-top-metabox.php' );
require_once( plugin_dir_path( __FILE__ ) . 'class-analytics-mpf-middle-metabox.php' );
require_once( plugin_dir_path( __FILE__ ) . 'class-analytics-mpf-bottom-metabox.php' );
require_once( plugin_dir_path( __FILE__ ) . 'class-analytics-mpf-frontend.php' );
require_once( plugin_dir_path( __FILE__ ) . 'class-analytics-mpf.php' );
require_once( plugin_dir_path( __FILE__ ) . 'class-enqueue.php' );


// INSTANTIATE CLASSES

	//Enqueue Styles & Scripts
	// $setup_styles = new Analytics_MPF_Enqueue();
	// $setup_styles->initialize();


	//Calling Plugin Main Class 
	$admin_page = new Analytics_MPF();

	$top_meta_box = new Analytics_MPF_Top_Metabox();
	$middle_meta_box = new Analytics_MPF_Middle_Metabox();
	$bottom_meta_box = new Analytics_MPF_Bottom_Metabox();

	$frontend = new Analytics_MPF_Frontend();

// Activation
require_once plugin_dir_path( __FILE__ ) . 'inc/Base/class-activate.php';
register_activation_hook( __FILE__, array( 'Analytics_MPF_Activate', 'activate' ) );

// Activation
require_once plugin_dir_path( __FILE__ ) . 'inc/Base/class-deactivate.php';
register_deactivation_hook( __FILE__, array( 'Analytics_MPF_Deactivate', 'deactivate' ) );