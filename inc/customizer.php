<?php 
/**
 * Openglam Customizer content
 */
function openglam_customize_register( $wp_customize ) {
   $wp_customize->add_panel( 'openglam_settings_panel',
    array(
        'title' => __( 'Open Glam settings' ),
        'description' => esc_html__( 'Adjust website specifics' )
    )
  );

  $wp_customize->add_section( 'openglam_header_controls_section',
    array(
        'title' => __( 'Header image' ),
        'description' => esc_html__( 'Change the homepage image and its attribution' ),
        'panel' => 'openglam_settings_panel'
    )
  );

  $wp_customize->add_setting( 'openglam_header_image',
    array(
        'type' => 'theme_mod',
        'validate_callback' => '',
        'sanitize_callback' => 'absint',
    )
  );
  $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'openglam_header_image',
    array(
        'label' => __( 'Homepage header image' ),
        'description' => esc_html__( 'You can set the default homepage header image' ),
        'section' => 'openglam_header_controls_section',
        'flex_width' => false,
        'flex_height' => true,
        'width' => 1196,
        'height' => 170,
    )
  ) );

  $wp_customize->add_setting( 'openglam_image_attribution',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_attr'
   )
);
 
  $wp_customize->add_control( 'openglam_image_attribution',
    array(
        'label' => __( 'Image attribution text' ),
        'description' => esc_html__( 'This text will show the attribution information under the image' ),
        'section' => 'openglam_header_controls_section',
        'type' => 'text',
        'input_attrs' => array(
          'placeholder' => __( 'Enter Attribution information...' ),
        ),
    )
  );

   $wp_customize->add_setting( 'openglam_image_url',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url'
   )
);
 
  $wp_customize->add_control( 'openglam_image_url',
    array(
        'label' => __( 'Image source url' ),
        'description' => esc_html__( 'You should place here the source URL of the selected image' ),
        'section' => 'openglam_header_controls_section',
        'type' => 'url',
        'input_attrs' => array(
          'placeholder' => __( 'Enter Image source URL...' ),
        ),
    )
  );
};
add_action( 'customize_register', 'openglam_customize_register' );