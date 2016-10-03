<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package AccesspressLite
 */
?>
<!DOCTYPE html> 
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
global $accesspresslite_options;
$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
$home_template = $accesspresslite_settings['accesspresslite_home_template'];
?>
<div id="page" class="site">

	<header id="masthead" class="site-header">
    <?php
        if($home_template == 'template_two' || $home_template == ''){
            get_template_part('header/header-two');
         }
        else{
            get_template_part('header/header-one');
                    
                    
                    
        }
    ?>            
	</header><!-- #masthead -->

	<section id="slider-banner">
		<?php 
		if(is_home() || is_front_page() ){
			do_action( 'accesspresslite_bxslider' ); 
		}?>
	</section><!-- #slider-banner -->
	<?php
	if((is_home() || is_front_page()) && 'page' == get_option( 'show_on_front' )){	
		$accesspresslite_content_id = "content";	
	}elseif(is_home() || is_front_page() ){
	$accesspresslite_content_id = "home-content";
	}else{
	$accesspresslite_content_id = "content";
	} ?>
	<div id="<?php echo esc_attr($accesspresslite_content_id); ?>" class="site-content">
