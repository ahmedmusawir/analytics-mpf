<?php

/**
 *
 * A Class for Frontend Display of Options
 *
 */

/**
 * Frontend Class
 */
class Analytics_MPF_Frontend_Page
{

	function __construct()
	{
        add_action( 'wp_head', array( $this, 'place_script_in_header'), 110 );
		add_filter( 'body_class', array( $this, 'place_script_in_body'), 110 );
		add_action( 'wp_footer', array( $this, 'place_script_in_footer'), 110 );
	}

    public function place_script_in_header() {

        global $post;

        // Top Post Script Metabox Data 
        $top_post_script = get_post_meta( $post->ID, '_analytics_top_page_meta_key', true );
        // $value = get_post_meta( $post->ID, '_analytics_top_page_meta_key', true );

        if ( is_page() ) {

            echo "<!-- ################# MPF PAGE HEAD SCRIPT ########################-->\n"; 
            echo $top_post_script;
            echo "\n<!-- ################# END PAGE MPF HEAD SCRIPT ####################-->\n"; 

        }
	}
    
	public function place_script_in_body( $classes ) {

        global $post;

        if ( is_page() ) {

            // Top Post Script Metabox Data 
            $middle_post_script = get_post_meta( $post->ID, '_analytics_middle_page_meta_key', true );
                    

            $middle_script_final = "\n<!-- ################# MPF PAGE BODY SCRIPT ########################-->\n"; 
            $middle_script_final .= $middle_post_script;
            $middle_script_final .= "\n<!-- ################# END MPF PAGE BODY SCRIPT ####################-->\n"; 

             // close <body> tag, insert stuff, open some other tag with senseless variable      
              $classes[] = '">'. $middle_script_final . '<noscript></noscript novar="';

        }
            
            return $classes;     
	}

	public function place_script_in_footer() {

        global $post;

        if ( is_page() ) {

            // Top Post Script Metabox Data 
            $bottom_post_script = get_post_meta( $post->ID, '_analytics_bottom_page_meta_key', true );
             

            echo "<!-- ################# MPF PAGE FOOTER SCRIPT ######################## -->\n"; 
            echo $bottom_post_script;
            echo "\n<!-- ################# END MPF PAGE FOOTER SCRIPT #################### -->\n"; 

        }
	}

}










































