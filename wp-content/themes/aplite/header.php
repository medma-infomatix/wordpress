<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Aplite
 */
?>
<!DOCTYPE html> 
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.min.js"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
global $accesspresslite_options;
$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
?>
<div id="page" class="site">

	<header id="masthead" class="site-header">
    <div id="top-header">
		<div class="ak-container clearfix">
			<div id="header-text">
        		<?php do_action( 'accesspresslite_header_text' ); ?>
        	</div>

			<div id="header-social">
                <?php
					if( $accesspresslite_settings['show_social_header'] == 0 ){
						do_action( 'accesspresslite_social_links' ); 
					}
				?>

				<?php
				if( $accesspresslite_settings['show_search'] == 1 ): ?>
					<div class="ak-search">
						<?php get_search_form(); ?>
					</div>
				<?php endif; ?>
			</div><!-- #header-social -->
		</div><!-- .ak-container -->
  	</div><!-- #top-header -->

	
	<div class="main-header <?php do_action( 'accesspresslite_menu_alignment' ); ?>">

		<div class="ak-container">
		<div class="site-branding">

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">				
			<?php if ( get_header_image() ): ?>
				<img src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ) ?>">
			<?php else: ?>
				<h1 class="site-title"><?php echo bloginfo( 'title' ); ?></h1>
				<div class="tagline site-description"><?php echo bloginfo( 'description' ); ?></div>
			<?php endif; ?>		
			</a>
			
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<h1 class="menu-toggle"><?php _e( 'Menu', 'aplite' ); ?></h1>

			<?php 
				wp_nav_menu( 
					array( 
					'theme_location' => 'primary' 
					)
				); 
			?>
		</nav><!-- #site-navigation -->
		</div>
	</div>	
		
	</header><!-- #masthead -->

	<section id="slider-banner">
		<?php 
			if(is_home() || is_front_page() ){
				do_action( 'accesspresslite_bxslider' ); 
			}
		?>
	</section><!-- #slider-banner -->
	<?php
	if( ( is_home() || is_front_page() ) && 'page' == get_option( 'show_on_front' ) ){	
		$accesspresslite_content_id = "content";	
	}elseif( is_home() || is_front_page() ){
		$accesspresslite_content_id = "home-content";
	}else{
		$accesspresslite_content_id = "content";
	} 
	?>
	<div id="<?php echo esc_attr( $accesspresslite_content_id ); ?>" class="site-content">