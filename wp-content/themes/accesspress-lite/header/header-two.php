<?php
global $accesspresslite_options;
$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
$menu_align = $accesspresslite_settings['menu_alignment'];?>
<div id="top-header" class="<?php if($menu_align == 'Center'){echo 'center_menu_top';}?>">
		<div class="ak-container">
            <div class="header_text_left">
    			<?php 
    			     do_action( 'accesspresslite_header_text' );
                ?>
            </div>
            <?php
             if($menu_align == 'Center'){ ?>
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
            <?php } ?>
			<div class="right-header clearfix">
                <div class="clearfix"></div>
                <div class="social_search_container">
                    <div class="search_right">
                        <?php
                        if($accesspresslite_settings['show_search'] == 1 || $accesspresslite_settings['show_search'] == ''){ ?>
            				<div class="ak-search">
            					<?php get_search_form(); ?>
                                <i class="fa fa-search search_one"></i>
            				</div>
        				<?php }?>
                    </div>
                    <div class="social_icon_right"><?php
                        
            				/** 
            				* @hooked accesspresslite_social_cb - 10
            				*/
            				if($accesspresslite_settings['show_social_header'] == 0){
            				do_action( 'accesspresslite_social_links' ); 
            				}?>
                    </div>      
                </div>
			</div><!-- .right-header -->
		</div><!-- .ak-container -->
  </div><!-- #top-header -->
        
		<nav id="site-navigation" class="main-navigation <?php do_action( 'accesspresslite_menu_alignment' ); ?>">
			<div class="ak-container">
            <?php if($menu_align == 'Right' || $menu_align == ''){ ?>
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
            <?php } ?>
            <h1 class="menu-toggle"><?php _e( 'Menu', 'accesspresslite' ); ?></h1>
                <div class="menu-menu-1-container_wraper">
    				<?php wp_nav_menu( array( 
    				'theme_location' => 'primary' ) ); ?>
                </div>
        <?php if($menu_align == 'Left'){ ?>
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
            <?php } ?>                
			</div>
		</nav><!-- #site-navigation -->