<?php 

/**
* Analytics_MPF Class
*/
class Analytics_MPF
{
	
	function __construct()
	{
    	add_action( 'admin_menu', array( $this, 'mpf_plugin_add_toplevel_menu') );
        add_action( 'admin_init', array( $this, 'mpf_plugin_register_settings') );
	}


    // add top-level administrative menu
    public function mpf_plugin_add_toplevel_menu() {
        
        /* 
            add_menu_page(
                string   $page_title, 
                string   $menu_title, 
                string   $capability, 
                string   $menu_slug, 
                callable $function = '', 
                string   $icon_url = '', 
                int      $position = null 
            )
        */
        
        add_menu_page(
            'MPF Analytics Settings',
            'MPF Analytics',
            'manage_options',
            'mpf-analytics',
            array($this, 'mpf_analytics_display_settings_page'),
            'dashicons-chart-line',
            null
        );
        
    }

    // display the plugin settings page
    public function mpf_analytics_display_settings_page() {
        
        // check if user is allowed access
        if ( ! current_user_can( 'manage_options' ) ) return;
        
        ?>
        
        <div class="wrap">
            <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
            <form action="options.php" method="post">
                
                <?php
                
                // output security fields
                settings_fields( 'mpf_analytics_options_group' );
                
                // output setting sections
                do_settings_sections( 'mpf-analytics' ); //Page Slug or Menu Slug
                
                // submit button
                submit_button();
                
                ?>
                
            </form>
        </div>
        
        <?php
        
    }

    // register plugin settings
    function mpf_plugin_register_settings() {
        
        /*
        
        register_setting( 
            string   $option_group, 
            string   $option_name, 
            callable $sanitize_callback
        );
        
        */
        
        register_setting( 
            'mpf_analytics_options_group', 
            'mpf_analytics_options', 
            'mpf_plugin_callback_validate_options' 
        ); 

        /*=========================================
        =            SETTINGS SECTIONS            =
        =========================================*/
        /*
        
        add_settings_section( 
            string   $id, 
            string   $title, 
            callable $callback, 
            string   $page
        );
        
        */
        
        add_settings_section( 
            'mpf_plugin_section_top', 
            'Header Analytics Code', 
            array( $this, 'mpf_plugin_callback_section_top'), 
            'mpf-analytics'
        );
        
        add_settings_section( 
            'mpf_plugin_section_middle', 
            'Body Analytics Code', 
            array( $this, 'mpf_plugin_callback_section_middle'), 
            'mpf-analytics'
        );

        add_settings_section( 
            'mpf_plugin_section_bottom', 
            'Footer Analytics Code', 
            array( $this, 'mpf_plugin_callback_section_bottom'), 
            'mpf-analytics'
        );

        /*=======================================
            =            SETTINGS FIELDS            =
            =======================================*/

        /*
        /*

        add_settings_field(
            string   $id,
            string   $title,
            callable $callback,
            string   $page,
            string   $section = 'default',
            array    $args = []
        );

        */

        add_settings_field(
            'header_script',
            'Header Script',
            array( $this, 'mpf_plugin_callback_field_textarea_top'),
            'mpf-analytics',
            'mpf_plugin_section_top',
            [ 'id' => 'header_script', 'label' => 'This content goes in the head tag' ]
        );

        add_settings_field(
            'body_script',
            'Body Script',
            array( $this, 'mpf_plugin_callback_field_textarea_middle'),
            'mpf-analytics',
            'mpf_plugin_section_middle',
            [ 'id' => 'body_script', 'label' => 'This content goes in the body tag' ]
        );

        add_settings_field(
            'footer_script',
            'Header Script',
            array( $this, 'mpf_plugin_callback_field_textarea_bottom'),
            'mpf-analytics',
            'mpf_plugin_section_bottom',
            [ 'id' => 'footer_script', 'label' => 'This content goes in the footer tag' ]
        );
    }






    //FOLLOWING CALLBACKS ARE PLACE HOLDERS

    // validate plugin settings
    function mpf_plugin_validate_options($input) {
        
        // custom message
        if ( isset( $input['header_script'] ) ) {
            
            // $input['header_script'] = wp_kses_post( $input['header_script'] );
            
        }   

        // custom message
        if ( isset( $input['body_script'] ) ) {
            
            // $input['body_script'] = wp_kses_post( $input['body_script'] );
            
        }   

        // custom message
        if ( isset( $input['footer_script'] ) ) {
            
            // $input['footer_script'] = wp_kses_post( $input['footer_script'] );
            
        }        
        
        return $input;
        
    }



    // callback: login section
    function mpf_plugin_callback_section_top() {
        
        echo '<p>These settings enable you to customize the Top.</p>';
        
    }

    // callback: admin section
    function mpf_plugin_callback_section_middle() {
        
        echo '<p>These settings enable you to customize the Middle.</p>';
        
    }

    // callback: admin section
    function mpf_plugin_callback_section_bottom() {
        
        echo '<p>These settings enable you to customize the Bottom.</p>';
        
    }


    // callback: textarea field
    function mpf_plugin_callback_field_textarea_top( $args ) {
        
        $options = get_option( 'mpf_analytics_options' );
        
        $id    = isset( $args['id'] )    ? $args['id']    : '';
        $label = isset( $args['label'] ) ? $args['label'] : '';
        
        // $allowed_tags = wp_kses_allowed_html( 'post' );
        
        $value = isset( $options[$id] ) ?  $options[$id] : '';
        
        echo '<textarea id="mpf_analytics_options_'. $id .'" name="mpf_analytics_options['. $id .']" rows="8" cols="50">'. $value .'</textarea><br />';
        echo '<label for="mpf_analytics_options_'. $id .'">'. $label .'</label>';
        
    }

    // callback: textarea field
    function mpf_plugin_callback_field_textarea_middle( $args ) {
        
        $options = get_option( 'mpf_analytics_options' );
        
        $id    = isset( $args['id'] )    ? $args['id']    : '';
        $label = isset( $args['label'] ) ? $args['label'] : '';
        
        // $allowed_tags = wp_kses_allowed_html( 'post' );
        
        $value = isset( $options[$id] ) ?  $options[$id] : '';
        
        echo '<textarea id="mpf_analytics_options_'. $id .'" name="mpf_analytics_options['. $id .']" rows="8" cols="50">'. $value .'</textarea><br />';
        echo '<label for="mpf_analytics_options_'. $id .'">'. $label .'</label>';
        
    }

    // callback: textarea field
    function mpf_plugin_callback_field_textarea_bottom( $args ) {
        
        $options = get_option( 'mpf_analytics_options' );
        
        $id    = isset( $args['id'] )    ? $args['id']    : '';
        $label = isset( $args['label'] ) ? $args['label'] : '';
        
        // $allowed_tags = wp_kses_allowed_html( 'post' );
        
        $value = isset( $options[$id] ) ?  $options[$id] : '';
        
        echo '<textarea id="mpf_analytics_options_'. $id .'" name="mpf_analytics_options['. $id .']" rows="8" cols="50">'. $value .'</textarea><br />';
        echo '<label for="mpf_analytics_options_'. $id .'">'. $label .'</label>';
        
    }



}