<?php
global $accesspresslite_options;
$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );?>
<div id="top-header">
		<div class="ak-container">
			<div class="site-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">				
				<?php if ( get_header_image() ) { ?>
					<img src="<?php header_image(); ?>" alt="<?php bloginfo('name') ?>">
				<?php }else{ ?>
					<h1 class="site-title"><?php echo bloginfo('title'); ?></h1>
					<div class="tagline site-description"><?php echo bloginfo('description'); ?></div>
				<?php } ?>		
				</a>
				
			</div><!-- .site-branding -->
        

			<div class="right-header clearfix">
				<?php 
				do_action( 'accesspresslite_header_text' ); 
                ?>
                <div class="clearfix"></div>
                <?php
				/** 
				* @hooked accesspresslite_social_cb - 10
				*/
				if($accesspresslite_settings['show_social_header'] == 0){
				do_action( 'accesspresslite_social_links' ); 
				}

				if($accesspresslite_settings['show_search'] == 1){ ?>
				<div class="ak-search">
					<?php get_search_form(); ?>
				</div>
				<?php } ?>
			</div><!-- .right-header -->
		</div><!-- .ak-container -->
  </div><!-- #top-header -->

		
		<nav id="site-navigation" class="main-navigation <?php do_action( 'accesspresslite_menu_alignment' ); ?>">
			<div class="ak-container">
				<h1 class="menu-toggle"><?php _e( 'Menu', 'accesspresslite' ); ?></h1>

				<?php wp_nav_menu( array( 
				'theme_location' => 'primary' ) ); ?>
			</div>
		</nav><!-- #site-navigation -->