<?php

/**
 *
 * A Class for Frontend Display of Options
 *
 */

/**
 * Frontend Class
 */
class Analytics_MPF_Frontend
{
	
	function __construct()
	{
		add_action( 'wp_head', array( $this, 'place_script_in_header') );
		add_action( 'wp_footer', array( $this, 'place_script_in_footer') );
	}

    public function place_script_in_header() {

        $options = get_option( 'mpf_analytics_options' );

        // Header Script 
        if ( isset( $options['header_script'] ) && ! empty( $options['header_script'] ) ) {
        
            $top_script = $options['header_script'];
        }

        echo "<!-- ################# MPF HEADER SCRIPT ########################-->\n"; 
        echo $top_script;
        echo "<!-- ################# END MPF HEADER SCRIPT ####################-->\n"; 

	}

	public function place_script_in_body() {

        $options = get_option( 'mpf_analytics_options' );

		// Body Script 
        if ( isset( $options['body_script'] ) && ! empty( $options['body_script'] ) ) {
        
            $middle_script = $options['body_script'];
        }

        echo "<!-- ################# MPF BODY SCRIPT ########################-->\n"; 
        echo $middle_script;
        echo "<!-- ################# END MPF BODY SCRIPT ####################-->\n"; 
	}

	public function place_script_in_footer() {

        $options = get_option( 'mpf_analytics_options' );

		// Footer Script 
        if ( isset( $options['footer_script'] ) && ! empty( $options['footer_script'] ) ) {
        
            $bottom_script = $options['footer_script'];
        }

        echo "<!-- ################# MPF FOOTER SCRIPT ######################## -->\n"; 
        echo $bottom_script;
        echo "<!-- ################# END MPF FOOTER SCRIPT #################### -->\n"; 
	}

}










































