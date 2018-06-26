<?php 

/**
* MPF Scripts Enqueue Class
*/
class Analytics_MPF_Enqueue
{
	
	function __construct()
	{

	}

	public function initialize() {

		// add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
		// add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

		// add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_public_styles' ) );
		// add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_public_scripts' ) );

	}

	public function enqueue_admin_styles() {

		wp_enqueue_style(
			
			'analytics-mpf-admin',
			plugins_url( '/assets/dist/css/admin.min.css', __FILE__ ),
			array(),
			'1.0'

		);
	}
	public function enqueue_public_styles() {

		wp_enqueue_style(
			
			'analytics-mpf-public',
			plugins_url( '/assets/dist/css/public.min.css', __FILE__ ),
			array(),
			'1.0'

		);
	}


	public function enqueue_admin_scripts() {

		wp_enqueue_script(
			
			'analytics-mpf-admin',
			plugins_url( '/assets/dist/js/admin.min.js', __FILE__ ),
			array('jquery'),
			'1.0'

		);

		// wp_enqueue_script(
			
		// 	'moose-bootstrap-4',
		// 	'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js',
		// 	array('jquery'),
		// 	'1.0',
		// 	true

		// );
		
	}	
	public function enqueue_public_scripts() {

		wp_enqueue_script(
			
			'analytics-mpf-public',
			plugins_url( '/assets/dist/js/public.min.js', __FILE__ ),
			array('jquery'),
			'1.0',
			true

		);

		// wp_enqueue_script(
			
		// 	'moose-bootstrap-4',
		// 	'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js',
		// 	array('jquery'),
		// 	'1.0',
		// 	true

		// );
	}	
}


















