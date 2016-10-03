<?php
/**
 * The front page file.
 * @package AccesspressLite
 */

get_header(); ?>

	<?php 
		global $accesspresslite_options;
		$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
        $home_template = $accesspresslite_settings['accesspresslite_home_template'];

		if ( 'page' == get_option( 'show_on_front' ) ) {
		    include( get_page_template() );
		}
        elseif($home_template == 'template_one'){
            
            get_template_part( 'index', 'one' );
        } 
        else {
			get_template_part( 'index', 'two' );
		}
		
		
	?>
	
<?php get_footer(); ?>
