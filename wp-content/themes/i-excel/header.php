<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package i-excel
 * @since i-excel 1.0
 */
?>
<?php


$bg_style = '';
$top_phone = '';
$top_email = '';

$top_phone = esc_attr(get_theme_mod('top_phone', '1-000-123-4567'));
$top_email = esc_attr(get_theme_mod('top_email', 'email@i-create.com'));
$iexcel_logo = get_theme_mod( 'logo', get_template_directory_uri().'/images/logo.png' );

global $post; 

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<?php    
    if ( ! function_exists( '_wp_render_title_tag' ) ) :
        function iexcel_render_title() {
    ?>
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php
        }
        add_action( 'wp_head', 'iexcel_render_title' );
    endif;    
    ?> 
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> style=" <?php echo $bg_style; ?> ">
	<div id="page" class="hfeed site">
    	
        <?php if ( $top_email || $top_phone || iexcel_social_icons() ) : ?>
    	<div id="utilitybar" class="utilitybar">
        	<div class="ubarinnerwrap">
                <div class="socialicons">
                    <?php echo iexcel_social_icons(); ?>
                </div>
                <?php if ( !empty($top_phone) ) : ?>
                <div class="topphone">
                    <i class="topbarico genericon genericon-phone"></i>
                    <?php _e('Call us : ','i-excel'); ?> <?php echo esc_attr($top_phone); ?>
                </div>
                <?php endif; ?>
                
                <?php if ( !empty($top_email) ) : ?>
                <div class="topphone">
                    <i class="topbarico genericon genericon-mail"></i>
                    <?php _e('Mail us : ','i-excel'); ?> <?php echo sanitize_email($top_email); ?>
                </div>
                <?php endif; ?>                
            </div> 
        </div>
        <?php endif; ?>
        
        <div class="headerwrap">
            <header id="masthead" class="site-header" role="banner">
         		<div class="headerinnerwrap">
					<?php if ($iexcel_logo) : ?>
                        <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                            <span><img src="<?php echo esc_url($iexcel_logo); ?>" alt="<?php bloginfo( 'name' ); ?>" /></span>
                        </a>
                    <?php else : ?>
                        <span id="site-titlendesc">
                            <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
                                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>   
                            </a>
                        </span>
                    <?php endif; ?>	
        
                    <div id="navbar" class="navbar">
                        <nav id="site-navigation" class="navigation main-navigation" role="navigation">
                            <h3 class="menu-toggle"><?php _e( 'Menu', 'i-excel' ); ?></h3>
                            <a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'i-excel' ); ?>"><?php _e( 'Skip to content', 'i-excel' ); ?></a>
                            <?php 
								if ( has_nav_menu(  'primary' ) ) {
										wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'container_class' => 'nav-container', 'container' => 'div' ) );
									}
									else
									{
										wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-container' ) ); 
									}
								?>
							
                        </nav><!-- #site-navigation -->
                        <div class="topsearch">
                            <?php get_search_form(); ?>
                        </div>
                    </div><!-- #navbar -->
                    <div class="clear"></div>
                </div>
            </header><!-- #masthead -->
        </div>
        
        <!-- #Banner -->
        <?php
		
		$hide_title = rwmb_meta('iexcel_hidetitle');
		$show_slider = rwmb_meta('iexcel_show_slider');
		$other_slider = rwmb_meta('iexcel_other_slider');
		$custom_title = rwmb_meta('iexcel_customtitle');
		
		$hide_front_slider = get_theme_mod('slider_stat', 1);
		$other_front_slider = get_theme_mod('blogslide_scode', '');
		$itrans_slogan = esc_attr(get_theme_mod('banner_text', ''));
		
		$other_slider = esc_html($other_slider);
		$other_front_slider = esc_html($other_front_slider);
		
		if($other_slider) :
		?>
		
        <div class="other-slider" style="">
	       	<?php echo do_shortcode( htmlspecialchars_decode($other_slider) ) ?>
        </div>
        <?php //elseif ( is_front_page() )  : ?>
		
		<?php	
		elseif ( is_home() && !is_paged() || $show_slider ) : 
		?>
            <?php //iexcel_ibanner_slider(); ?>
            <?php if (!empty($other_front_slider)) : ?>
            	<?php echo do_shortcode( htmlspecialchars_decode($other_front_slider) ) ?>
        	<?php elseif ( $hide_front_slider == 1 ) : ?>
            	<?php iexcel_ibanner_slider(); ?>
        	<?php else : ?>
            <div class="iheader" style="">
                <div class="titlebar">
                    <h1 class="entry-title">
                        <?php
                            if ($itrans_slogan) {
                                            //bloginfo( 'name' );
                                echo esc_attr($itrans_slogan);
                            }
                        ?>	                 
                    </h1>
                </div>
            </div>                                    
        	<?php endif; ?>            
            
        <?php 
		elseif(!$hide_title) : 
		?>
        
        <div class="iheader" style="">
        	<div class="titlebar">
            	
                <?php
					if( is_archive() )
					{
						echo '<h1 class="entry-title">';
							if ( is_day() ) :
								printf( __( 'Daily Archives: %s', 'i-excel' ), get_the_date() );
							elseif ( is_month() ) :
								printf( __( 'Monthly Archives: %s', 'i-excel' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'i-excel' ) ) );
							elseif ( is_year() ) :
								printf( __( 'Yearly Archives: %s', 'i-excel' ), get_the_date( _x( 'Y', 'yearly archives date format', 'i-excel' ) ) );
							elseif ( is_category() ) :	
								printf( __( 'Category Archives: %s', 'i-excel' ), single_cat_title( '', false ) );		
							else :
								_e( 'Archives', 'i-excel' );
							endif;                						
						echo '</h1>';
					} elseif ( is_search() )
					{
						echo '<h1 class="entry-title">';
							printf( __( 'Search Results for: %s', 'i-excel' ), get_search_query() );					
						echo '</h1>';
					} else
					{
						if ( !empty($custom_title) )
						{
							echo '<h1 class="entry-title">'.esc_attr($custom_title).'</h1>';
						}
						else
						{
							echo '<h1 class="entry-title">';
							the_title();
							echo '</h1>';
						}						
					}
					
					//echo rwmb_meta('iexcel_customtitle');

					/**/
            	?>
				<?php 
				
					$hide_breadcrumb = rwmb_meta('iexcel_hide_breadcrumb');
					
                    if(function_exists('bcn_display') && !$hide_breadcrumb )
                    {
				?>
                	<div class="nx-breadcrumb">
                <?php
                        bcn_display();
				?>
                	</div>
                <?php		
                    } 
                ?>               
            	
            </div>
        </div>
        
		<?php endif; ?>
		<div id="main" class="site-main">

