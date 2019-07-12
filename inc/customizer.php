<?php
/**
 * molakat Theme Customizer
 *
 * @package molakat
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function molakat_customize_register( $wp_customize ) {

	    /** Dropdown additions **/
    require_once get_template_directory() . '/inc/customizer/class/class-customizer-select-dropdown-control.php';
    require_once get_template_directory() . '/inc/customizer/sanitize.php';
    // require_once get_template_directory() . '/inc/customizer/callback.php';



	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'molakat_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'molakat_customize_partial_blogdescription',
		) );
	}








    if (class_exists('WP_Customize_Panel')):
        $wp_customize->add_panel('butterfly_panel', array(
            'priority' => 7,
            'capability' => 'edit_theme_options',
            'title' => __('Theme Settings', 'molakat'),
        	'description' => __( 'Molakat Theme settings', 'molakat' )
        ));


        //  ===================================
        //  ====     Feature post      ====
        //  ===================================
        $wp_customize->add_section('butterfly_feature_post_controls', array(
            'title' => __('Feature post', 'molakat'),
            'panel' => 'butterfly_panel',
            'priority' => 2,
        ));

		$feature_post_cats = array(
						'Kamerakabbo' => 1, 
						'Dresshokabbo' => 2, 
						'Interview' => 3, 
						'Storyline' => 4, 
						'Story' => 5, 
						'Novel' => 6, 
						'Poem' => 7, 
						'BookDiscuss' => 8, 
						'Cultural' => 9, 
						'Kothamala' => 10, 
						'News' => 11
					);


foreach($feature_post_cats as $cat_nm=>$cat_pos)
  {
        $wp_customize->add_setting( 'molakat_feature_post_'.$cat_pos, array(
            'sanitize_callback' =>  'butterfly_sanitize_array_catagory',
             // 'default'           => '',
             'transport'  => 'postMessage'
         ));

        $wp_customize->add_control( new Customizer_Select_Dropdown_Control( $wp_customize, 'molakat_feature_post_'.$cat_pos, array(
            'label'   => $cat_nm. __('category', 'molakat'),
            'section' => 'butterfly_feature_post_controls',
            'settings'   => 'molakat_feature_post_'.$cat_pos,
            'type'     => 'multiple',
            'choices'  => butterfly_cat_list(),
            // 'active_callback' => 'butterfly_post_callback',
        ) ) );
  }





        

		//  ===================================
        //  ====     social      ====
        //  ===================================
        // $wp_customize->add_section('butterfly_social_controls', array(
        //     'title' => __('Social link', 'butterfly'),
        //     'panel' => 'butterfly_panel',
        //     'priority' => 5,
        // ));

        // $wp_customize->add_setting('butterfly_facebook', array(
        //     'capability' => 'edit_theme_options',
        //     'transport' => 'postMessage',
        //     'sanitize_callback' => 'esc_url',
        //     'default' => '#'
        // ));
        // $wp_customize->add_control('butterfly_facebook', array(
        //     'label' => __('Facebook: ', 'butterfly'),
        //     'settings' => 'butterfly_facebook',
        //     'section' => 'butterfly_social_controls',
        //     'type' => 'text',
        // ));

        //         $wp_customize->add_setting('butterfly_youtube', array(
        //     'capability' => 'edit_theme_options',
        //     'transport' => 'postMessage',
        //     'sanitize_callback' => 'esc_url',
        //     'default' => '#'
        // ));
        // $wp_customize->add_control('butterfly_youtube', array(
        //     'label' => __('Youtube: ', 'butterfly'),
        //     'settings' => 'butterfly_youtube',
        //     'section' => 'butterfly_social_controls',
        //     'type' => 'text',
        // ));



    else:
        $wp_customize->add_section('oh_shit', array(
            'priority' => 6,
            'title' => __('Oh Shit!', 'butterfly'),
            'description' => __('WP_Customize_Panel class not exist. Contact with your admin', 'butterfly')
        ));
    endif;






















}
add_action( 'customize_register', 'molakat_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function molakat_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function molakat_customize_partial_blogdescription() {
	bloginfo( 'description' );
}












// }
// add_action( 'customize_register', 'butterfly_customize_register' );









/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function molakat_customize_preview_js() {
	wp_enqueue_script( 'molakat-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'molakat_customize_preview_js' );
