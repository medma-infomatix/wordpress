<?php


function iexcel_customizer_config() {
	

    $url  = get_stylesheet_directory_uri() . '/inc/kirki/';
	
    /**
     * If you need to include Kirki in your theme,
     * then you may want to consider adding the translations here
     * using your textdomain.
     * 
     * If you're using Kirki as a plugin then you can remove these.
     */

    $strings = array(
        'background-color' => __( 'Background Color', 'i-excel' ),
        'background-image' => __( 'Background Image', 'i-excel' ),
        'no-repeat' => __( 'No Repeat', 'i-excel' ),
        'repeat-all' => __( 'Repeat All', 'i-excel' ),
        'repeat-x' => __( 'Repeat Horizontally', 'i-excel' ),
        'repeat-y' => __( 'Repeat Vertically', 'i-excel' ),
        'inherit' => __( 'Inherit', 'i-excel' ),
        'background-repeat' => __( 'Background Repeat', 'i-excel' ),
        'cover' => __( 'Cover', 'i-excel' ),
        'contain' => __( 'Contain', 'i-excel' ),
        'background-size' => __( 'Background Size', 'i-excel' ),
        'fixed' => __( 'Fixed', 'i-excel' ),
        'scroll' => __( 'Scroll', 'i-excel' ),
        'background-attachment' => __( 'Background Attachment', 'i-excel' ),
        'left-top' => __( 'Left Top', 'i-excel' ),
        'left-center' => __( 'Left Center', 'i-excel' ),
        'left-bottom' => __( 'Left Bottom', 'i-excel' ),
        'right-top' => __( 'Right Top', 'i-excel' ),
        'right-center' => __( 'Right Center', 'i-excel' ),
        'right-bottom' => __( 'Right Bottom', 'i-excel' ),
        'center-top' => __( 'Center Top', 'i-excel' ),
        'center-center' => __( 'Center Center', 'i-excel' ),
        'center-bottom' => __( 'Center Bottom', 'i-excel' ),
        'background-position' => __( 'Background Position', 'i-excel' ),
        'background-opacity' => __( 'Background Opacity', 'i-excel' ),
        'ON' => __( 'ON', 'i-excel' ),
        'OFF' => __( 'OFF', 'i-excel' ),
        'all' => __( 'All', 'i-excel' ),
        'cyrillic' => __( 'Cyrillic', 'i-excel' ),
        'cyrillic-ext' => __( 'Cyrillic Extended', 'i-excel' ),
        'devanagari' => __( 'Devanagari', 'i-excel' ),
        'greek' => __( 'Greek', 'i-excel' ),
        'greek-ext' => __( 'Greek Extended', 'i-excel' ),
        'khmer' => __( 'Khmer', 'i-excel' ),
        'latin' => __( 'Latin', 'i-excel' ),
        'latin-ext' => __( 'Latin Extended', 'i-excel' ),
        'vietnamese' => __( 'Vietnamese', 'i-excel' ),
        'serif' => _x( 'Serif', 'font style', 'i-excel' ),
        'sans-serif' => _x( 'Sans Serif', 'font style', 'i-excel' ),
        'monospace' => _x( 'Monospace', 'font style', 'i-excel' ),
    );	

	$args = array(
  
        // Change the logo image. (URL) Point this to the path of the logo file in your theme directory
                // The developer recommends an image size of about 250 x 250
        'logo_image'   => get_template_directory_uri() . '/images/logo.png',
  
        // The color of active menu items, help bullets etc.
        'color_active' => '#95c837',
		
		// Color used on slider controls and image selects
		'color_accent' => '#e7e7e7',
		
		// The generic background color
		//'color_back' => '#f7f7f7',
	
        // Color used for secondary elements and desable/inactive controls
        'color_light'  => '#e7e7e7',
  
        // Color used for button-set controls and other elements
        'color_select' => '#34495e',
		 
        
        // For the parameter here, use the handle of your stylesheet you use in wp_enqueue
        'stylesheet_id' => 'customize-styles', 
		
        // Only use this if you are bundling the plugin with your theme (see above)
        'url_path'     => get_template_directory_uri() . '/inc/kirki/',

        'textdomain'   => 'i-excel',
		
        'i18n'         => $strings,		
		
		
	);
	
	
	return $args;
}
add_filter( 'kirki/config', 'iexcel_customizer_config' );


/**
 * Create the customizer panels and sections
 */
add_action( 'customize_register', 'iexcel_add_panels_and_sections' ); 
function iexcel_add_panels_and_sections( $wp_customize ) {
	
	/*
	* Add panels
	*/
	
	$wp_customize->add_panel( 'slider', array(
		'priority'    => 140,
		'title'       => __( 'Slider', 'i-excel' ),
		'description' => __( 'Slides details', 'i-excel' ),
	) );	

    /**
     * Add Sections
     */
    $wp_customize->add_section('basic', array(
        'title'    => __('Basic Settings', 'i-excel'),
        'description' => '',
        'priority' => 130,
    ));
	
    $wp_customize->add_section('layout', array(
        'title'    => __('Layout Options', 'i-excel'),
        'description' => '',
        'priority' => 130,
    ));	
	
    $wp_customize->add_section('social', array(
        'title'    => __('Social Links', 'i-excel'),
        'description' => __('Insert full URL of your social link including &#34;http://&#34; replacing #', 'i-excel'),
        'priority' => 130,
    ));		
	
    $wp_customize->add_section('blogpage', array(
        'title'    => __('Default Blog Page', 'i-excel'),
        'description' => '',
        'priority' => 150,
    ));	
	
	// slider sections
	
	$wp_customize->add_section('slidersettings', array(
        'title'    => __('Slide Settings', 'i-excel'),
        'description' => '',
        'panel' => 'slider',		
        'priority' => 140,
    ));		
	
	$wp_customize->add_section('slide1', array(
        'title'    => __('Slide 1', 'i-excel'),
        'description' => '',
        'panel' => 'slider',		
        'priority' => 140,
    ));	
	$wp_customize->add_section('slide2', array(
        'title'    => __('Slide 2', 'i-excel'),
        'description' => '',
        'panel' => 'slider',		
        'priority' => 140,
    ));	
	$wp_customize->add_section('slide3', array(
        'title'    => __('Slide 3', 'i-excel'),
        'description' => '',
        'panel' => 'slider',		
        'priority' => 140,
    ));	
	$wp_customize->add_section('slide4', array(
        'title'    => __('Slide 4', 'i-excel'),
        'description' => '',
        'panel' => 'slider',		
        'priority' => 140,
    ));	
	
	// promo sections
	
	$wp_customize->add_section('nxpromo', array(
        'title'    => __('More About i-excel', 'i-excel'),
        'description' => '',
        'priority' => 170,
    ));				
	
}


function iexcel_custom_setting( $controls ) {
	
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'top_phone',
        'label'    => __( 'Phone Number', 'i-excel' ),
        'section'  => 'basic',
        'default'  => '1-000-123-4567',
        'priority' => 1,
		'description' => __( 'Phone number that appears on top bar.', 'i-excel' ),
    );
	
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'top_email',
        'label'    => __( 'Email Address', 'i-excel' ),
        'section'  => 'basic',
        'default'  => 'email@i-create.com',
        'priority' => 1,
		'description' => __( 'Email Id that appears on top bar.', 'i-excel' ),		
    );
	
	$controls[] = array(
		'type'        => 'upload',
		'setting'     => 'logo',
		'label'       => __( 'Site header logo', 'i-excel' ),
		'description' => __( 'Width 280px, height 72px max. Upload logo for header', 'i-excel' ),
        'section'  => 'basic',
		'default'     => get_template_directory_uri() . '/images/logo.png',
		'priority'    => 1,
	);	
	
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'banner_text',
        'label'    => __( 'Banner Text', 'i-excel' ),
        'section'  => 'basic',
        'default'  => 'Banner Text Here',
        'priority' => 1,
		'description' => __( 'if you are using a logo and want your site title or slogan to appear on the header banner', 'i-excel' ),		
    );	
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'primary_color',
		'label'       => __( 'Primary Color', 'i-excel' ),
		'description' => __( 'Choose your theme color', 'i-excel' ),
		'section'     => 'layout',
		'default'     => '#95c837',
		'priority'    => 1,
	);	
	
	$controls[] = array(
		'type'        => 'radio-image',
		'setting'     => 'blog_layout',
		'label'       => __( 'Blog Posts Layout', 'i-excel' ),
		'description' => __( '(Choose blog posts layout (one column/two column)', 'i-excel' ),
		'section'     => 'layout',
		'default'     => '2',
		'priority'    => 2,
		'choices'     => array(
			'1' => get_template_directory_uri() . '/images/onecol.png',
			'2' => get_template_directory_uri() . '/images/twocol.png',
		),
	);
	
	$controls[] = array(
		'type'        => 'switch',
		'setting'     => 'show_full',
		'label'       => __( 'Show Full Content', 'i-excel' ),
		'description' => __( 'Show full content on blog pages', 'i-excel' ),
		'section'     => 'layout',
		'default'     => 0,
		'priority'    => 3,
	);		
	
	$controls[] = array(
		'type'        => 'switch',
		'setting'     => 'wide_layout',
		'label'       => __( 'Wide layout', 'i-excel' ),
		'description' => __( 'Check to have wide layou', 'i-excel' ),
		'section'     => 'layout',
		'default'     => 0,
		'priority'    => 4,
	);
	
	$controls[] = array(
		'type'        => 'textarea',
		'setting'     => 'extra_style',
		'label'       => __( 'Additional style', 'i-excel' ),
		'description' => __( 'add extra style(CSS) codes here', 'i-excel' ),
		'section'     => 'layout',
		'default'     => '',
		'priority'    => 10,
	);	
	
	/*
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'site_bg_color',
		'label'       => __( 'Background Color (Boxed Layout)', 'i-excel' ),
		'description' => __( 'Choose your background color', 'i-excel' ),
		'section'     => 'layout',
		'default'     => '#FFFFFF',
		'priority'    => 1,
	);
	*/	
	

	
	// social links
	
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_social_facebook',
        'label'    => __( 'Facebook', 'i-excel' ),
        'section'  => 'social',
        'default'  => '#',
        'priority' => 1,
    );	
	
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_social_twitter',
        'label'    => __( 'Twitter', 'i-excel' ),
        'section'  => 'social',
        'default'  => '#',
        'priority' => 1,
    );
	
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_social_flickr',
        'label'    => __( 'Flickr', 'i-excel' ),
        'section'  => 'social',
        'default'  => '#',
        'priority' => 1,
    );	
	
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_social_feed',
        'label'    => __( 'RSS', 'i-excel' ),
        'section'  => 'social',
        'default'  => '#',
        'priority' => 1,
    );	
	
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_social_instagram',
        'label'    => __( 'Instagram', 'i-excel' ),
        'section'  => 'social',
        'default'  => '#',
        'priority' => 1,
    );	
	
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_social_googleplus',
        'label'    => __( 'Google Plus', 'i-excel' ),
        'section'  => 'social',
        'default'  => '#',
        'priority' => 1,
    );	
	
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_social_youtube',
        'label'    => __( 'YouTube', 'i-excel' ),
        'section'  => 'social',
        'default'  => '#',
        'priority' => 1,
    );
	
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_social_pinterest',
        'label'    => __( 'Pinterest', 'i-excel' ),
        'section'  => 'social',
        'default'  => '#',
        'priority' => 1,
    );	
	
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_social_linkedin',
        'label'    => __( 'Linkedin', 'i-excel' ),
        'section'  => 'social',
        'default'  => '#',
        'priority' => 1,
    );	
	
	// Slider

	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'itrans_sliderspeed',
		'label'       => __( 'Slide Duration', 'i-excel' ),
		'description' => __( 'Slide visibility in second', 'i-excel' ),
		'section'     => 'slidersettings',
		'default'     => 6,
		'priority'    => 1,
		'choices'     => array(
			'min'  => 1,
			'max'  => 30,
			'step' => 1
		),
	);
	
	
	// Slide1
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_slide1_title',
        'label'    => __( 'Slide1 Title', 'i-excel' ),
        'section'  => 'slide1',
        'default'  => 'Welcome To i-excel',
        'priority' => 1,
    );
	$controls[] = array(
		'type'        => 'textarea',
		'setting'     => 'itrans_slide1_desc',
		'label'       => __( 'Slide1 Description', 'i-excel' ),
		'section'     => 'slide1',
		'default'     => 'To start setting up i-excel go to appearance &gt; customize. Make sure you have installed recommended plugin &#34;TemplatesNext Toolkit&#34; by going appearance &gt; install plugin.',
		'priority'    => 10,
	);
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_slide1_linktext',
        'label'    => __( 'Slide1 Link text', 'i-excel' ),
        'section'  => 'slide1',
        'default'  => 'Know More',
        'priority' => 1,
    );
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_slide1_linkurl',
        'label'    => __( 'Slide1 Link URL', 'i-excel' ),
        'section'  => 'slide1',
        'default'  => 'http://www.templatesnext.org/icreate/?page_id=806',
        'priority' => 1,
    );
	$controls[] = array(
		'type'        => 'upload',
		'setting'     => 'itrans_slide1_image',
		'label'       => __( 'Slide1 Image', 'i-excel' ),
        'section'  	  => 'slide1',
		'default'     => get_template_directory_uri() . '/images/slide1.png',
		'priority'    => 1,
	);							
	
	
	// Slide2
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_slide2_title',
        'label'    => __( 'Slide2 Title', 'i-excel' ),
        'section'  => 'slide2',
        'default'  => 'Responsive & Touch Ready',
        'priority' => 1,
    );
	$controls[] = array(
		'type'        => 'textarea',
		'setting'     => 'itrans_slide2_desc',
		'label'       => __( 'Slide2 Description', 'i-excel' ),
		'section'     => 'slide2',
		'default'     => 'In vel magna nibh. Fusce sodales orci ut elit pharetra venenatis. Nam sed ex sed nisl lobortis consequat non sed mi. Aenean convallis mauris ut risus tempor, a consequat mauris commodo. Vivamus eleifend tellus ut nibh volutpat, non commodo nisi aliquam.',
		'priority'    => 10,
	);
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_slide2_linktext',
        'label'    => __( 'Slide2 Link text', 'i-excel' ),
        'section'  => 'slide2',
        'default'  => 'Know More',
        'priority' => 1,
    );
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_slide2_linkurl',
        'label'    => __( 'Slide2 Link URL', 'i-excel' ),
        'section'  => 'slide2',
        'default'  => 'https://wordpress.org/',
        'priority' => 1,
    );
	$controls[] = array(
		'type'        => 'upload',
		'setting'     => 'itrans_slide2_image',
		'label'       => __( 'Slide2 Image', 'i-excel' ),
        'section'  	  => 'slide2',
		'default'     => get_template_directory_uri() . '/images/slide2.png',
		'priority'    => 1,
	);							
		
		
	// Slide3
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_slide3_title',
        'label'    => __( 'Slide3 Title', 'i-excel' ),
        'section'  => 'slide3',
        'default'  => 'Responsive & Touch Ready',
        'priority' => 1,
    );
	$controls[] = array(
		'type'        => 'textarea',
		'setting'     => 'itrans_slide3_desc',
		'label'       => __( 'Slide3 Description', 'i-excel' ),
		'section'     => 'slide3',
		'default'     => 'In vel magna nibh. Fusce sodales orci ut elit pharetra venenatis. Nam sed ex sed nisl lobortis consequat non sed mi. Aenean convallis mauris ut risus tempor, a consequat mauris commodo. Vivamus eleifend tellus ut nibh volutpat, non commodo nisi aliquam.',
		'priority'    => 10,
	);
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_slide3_linktext',
        'label'    => __( 'Slide3 Link text', 'i-excel' ),
        'section'  => 'slide3',
        'default'  => 'Know More',
        'priority' => 1,
    );
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_slide3_linkurl',
        'label'    => __( 'Slide3 Link URL', 'i-excel' ),
        'section'  => 'slide3',
        'default'  => 'https://wordpress.org/',
        'priority' => 1,
    );
	$controls[] = array(
		'type'        => 'upload',
		'setting'     => 'itrans_slide3_image',
		'label'       => __( 'Slide3 Image', 'i-excel' ),
        'section'  	  => 'slide3',
		'default'     => get_template_directory_uri() . '/images/slide3.png',
		'priority'    => 1,
	);							
	
	
	// Slide2
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_slide4_title',
        'label'    => __( 'Slide4 Title', 'i-excel' ),
        'section'  => 'slide4',
        'default'  => 'Responsive & Touch Ready',
        'priority' => 1,
    );
	$controls[] = array(
		'type'        => 'textarea',
		'setting'     => 'itrans_slide4_desc',
		'label'       => __( 'Slide4 Description', 'i-excel' ),
		'section'     => 'slide4',
		'default'     => 'In vel magna nibh. Fusce sodales orci ut elit pharetra venenatis. Nam sed ex sed nisl lobortis consequat non sed mi. Aenean convallis mauris ut risus tempor, a consequat mauris commodo. Vivamus eleifend tellus ut nibh volutpat, non commodo nisi aliquam.',
		'priority'    => 10,
	);
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_slide4_linktext',
        'label'    => __( 'Slide4 Link text', 'i-excel' ),
        'section'  => 'slide4',
        'default'  => 'Know More',
        'priority' => 1,
    );
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'itrans_slide4_linkurl',
        'label'    => __( 'Slide4 Link URL', 'i-excel' ),
        'section'  => 'slide4',
        'default'  => 'https://wordpress.org/',
        'priority' => 1,
    );
	$controls[] = array(
		'type'        => 'upload',
		'setting'     => 'itrans_slide4_image',
		'label'       => __( 'Slide4 Image', 'i-excel' ),
        'section'  	  => 'slide4',
		'default'     => get_template_directory_uri() . '/images/slide4.png',
		'priority'    => 1,
	);
	
	// Blog page setting
	
	$controls[] = array(
		'type'        => 'switch',
		'setting'     => 'slider_stat',
		'label'       => __( 'Hide i-excel Slider', 'i-excel' ),
		'description' => __( 'Turn Off or On to hide/show default i-excel slider', 'i-excel' ),
		'section'     => 'blogpage',
		'default'     => 1,
		'priority'    => 1,
	);	
	/*
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'blogslide_scode',
        'label'    => __( 'Other Slider Shortcode', 'i-excel' ),
        'section'  => 'blogpage',
        'default'  => '',
		'description' => __( 'Enter a 3rd party slider shortcode, ex. meta slider, smart slider 2, wow slider, etc.', 'i-excel' ),
        'priority' => 2,
    );
	

	
	
	// Off
	$controls[] = array(
		'type'        => 'toggle',
		'setting'     => 'toggle_demo',
		'label'       => __( 'This is the label', 'i-excel' ),
		'description' => __( 'This is the control description', 'i-excel' ),
		'section'     => 'blogpage',
		'default'     => 1,
		'priority'    => 10,
	);	
	
	*/
	// promos
	$controls[] = array(
		'type' => 'promo',
		'setting' => 'custompromo',
		'label' => __( 'TemplatesNext Promo', 'i-excel' ),
		'section' => 'nxpromo',
		'priority' => 10,
	);
	 	
	
	
    return $controls;
}
add_filter( 'kirki/controls', 'iexcel_custom_setting' );







