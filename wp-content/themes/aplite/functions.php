<?php
add_action( 'wp_enqueue_scripts', 'aplite_enqueue_styles' );

function aplite_enqueue_styles() {
    wp_enqueue_style( 'aplite-parent-style', get_template_directory_uri() . '/style.css' );

    $fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	if ( 'off' !== _x( 'on', 'Gentium Basic: on or off', 'aplite' ) ) {
		$fonts[] = 'Gentium+Basic:400,700,400italic';
	}

	if ( 'off' !== _x( 'on', 'Advent Pro: on or off', 'aplite' ) ) {
		$fonts[] = 'Advent+Pro:400,700,600,500,300';
	}

	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'aplite' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => implode( '|', $fonts ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}
	wp_enqueue_style( 'aplite-google-fonts', $fonts_url );
	wp_enqueue_script( 'aplite-custom', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), '1.1', true );
	
}

add_action( 'wp_enqueue_scripts', 'aplite_dequeue_scripts' , 50 );

function aplite_dequeue_scripts() {
	wp_dequeue_script( 'accesspresslite-custom' );
	wp_dequeue_style( 'accesspresslite-google-fonts' );
}

add_filter('accesspresslite_custom_header_args','aplite_change_custom_header_image');

function aplite_change_custom_header_image($args){
	$args['default-image'] = get_stylesheet_directory_uri() . '/images/logo.png';
	return $args;
}