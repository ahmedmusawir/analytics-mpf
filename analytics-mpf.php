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


require_once( plugin_dir_path( __FILE__ ) . 'class-analytics-mpf-top-metabox-page.php' );
require_once( plugin_dir_path( __FILE__ ) . 'class-analytics-mpf-middle-metabox-page.php' );
require_once( plugin_dir_path( __FILE__ ) . 'class-analytics-mpf-bottom-metabox-page.php' );
require_once( plugin_dir_path( __FILE__ ) . 'class-analytics-mpf-top-metabox-post.php' );
require_once( plugin_dir_path( __FILE__ ) . 'class-analytics-mpf-middle-metabox-post.php' );
require_once( plugin_dir_path( __FILE__ ) . 'class-analytics-mpf-bottom-metabox-post.php' );
require_once( plugin_dir_path( __FILE__ ) . 'class-analytics-mpf-frontend-admin.php' );
require_once( plugin_dir_path( __FILE__ ) . 'class-analytics-mpf-frontend-post.php' );
require_once( plugin_dir_path( __FILE__ ) . 'class-analytics-mpf-frontend-page.php' );
require_once( plugin_dir_path( __FILE__ ) . 'class-analytics-mpf.php' );
require_once( plugin_dir_path( __FILE__ ) . 'class-enqueue.php' );


// INSTANTIATE CLASSES

	//Enqueue Styles & Scripts
	// $setup_styles = new Analytics_MPF_Enqueue();
	// $setup_styles->initialize();


	//Calling Plugin Main Class 
	$admin_page = new Analytics_MPF();

	$top_meta_box_post = new Analytics_MPF_Top_Metabox_Post();
	$middle_meta_box_post = new Analytics_MPF_Middle_Metabox_Post();
	$bottom_meta_box_post = new Analytics_MPF_Bottom_Metabox_Post();

	$top_meta_box_page = new Analytics_MPF_Top_Metabox_Page();
	$middle_meta_box_page = new Analytics_MPF_Middle_Metabox_Page();
	$bottom_meta_box_page = new Analytics_MPF_Bottom_Metabox_Page();

	$frontend_admin = new Analytics_MPF_Frontend_Admin();
	$frontend_post = new Analytics_MPF_Frontend_Post();
	$frontend_page = new Analytics_MPF_Frontend_Page();

/*=================================
=            TEST CODE            =
=================================*/
/* Insert tracking code or others directly after BODY opens */
// add_filter('body_class', 'wps_add_tracking_body', PHP_INT_MAX); 
// function wps_add_tracking_body($classes) {

  
//   $classes[] = '"><script> FUCK IT </script><noscript></noscript novar="';

//   return $classes;
// }


/*=====  End of TEST CODE  ======*/



// Activation
require_once plugin_dir_path( __FILE__ ) . 'inc/Base/class-activate.php';
register_activation_hook( __FILE__, array( 'Analytics_MPF_Activate', 'activate' ) );

// Activation
require_once plugin_dir_path( __FILE__ ) . 'inc/Base/class-deactivate.php';
register_deactivation_hook( __FILE__, array( 'Analytics_MPF_Deactivate', 'deactivate' ) );



























