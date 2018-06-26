<?php

/**
 *
 * A Class for Frontend Display of Options
 *
 */

/**
 * Frontend Class
 */
class Analytics_MPF_Frontend_Admin
{
	
	function __construct()
	{
        add_action( 'wp_head', array( $this, 'place_script_in_header') );
		add_filter( 'body_class', array( $this, 'place_script_in_body') );
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
        echo "\n<!-- ################# END MPF HEADER SCRIPT ####################-->\n"; 

	}

    
	public function place_script_in_body( $classes ) {

        $options = get_option( 'mpf_analytics_options' );

		// Body Script 
        if ( isset( $options['body_script'] ) && ! empty( $options['body_script'] ) ) {
        
            $middle_script = $options['body_script'];
        }

        $middle_script_final = "\n<!-- ################# MPF BODY SCRIPT ########################-->\n"; 
        $middle_script_final .= $middle_script;
        $middle_script_final .= "\n<!-- ################# END MPF BODY SCRIPT ####################-->\n"; 

         // close <body> tag, insert stuff, open some other tag with senseless variable      
          $classes[] = '">'. $middle_script_final . '<noscript></noscript novar="';

          return $classes;        
	}

	public function place_script_in_footer() {

        $options = get_option( 'mpf_analytics_options' );

		// Footer Script 
        if ( isset( $options['footer_script'] ) && ! empty( $options['footer_script'] ) ) {
        
            $bottom_script = $options['footer_script'];
        }

        echo "<!-- ################# MPF FOOTER SCRIPT ######################## -->\n"; 
        echo $bottom_script;
        echo "\n<!-- ################# END MPF FOOTER SCRIPT #################### -->\n"; 
	}

}










































