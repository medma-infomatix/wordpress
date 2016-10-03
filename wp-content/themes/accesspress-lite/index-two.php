<?php 
global $accesspresslite_options;
$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
$accesspresslite_layout = $accesspresslite_settings['accesspresslite_home_page_layout'];
$accesspresslite_welcome_post_id = $accesspresslite_settings['welcome_post'];
$accesspresslite_event_category = $accesspresslite_settings['event_cat'];
$featured_post1 = $accesspresslite_settings['featured_post1'];
$featured_post2 = $accesspresslite_settings['featured_post2'];
$featured_post3 = $accesspresslite_settings['featured_post3'];
$show_fontawesome_icon = $accesspresslite_settings['show_fontawesome'];
$testimonial_category = $accesspresslite_settings['testimonial_cat'];
$accesspresslite_featured_bar = $accesspresslite_settings['featured_bar'];
$accesspresslite_welcome_post_char = (isset($accesspresslite_settings['welcome_post_char']) ? $accesspresslite_settings['welcome_post_char'] : 650 );
$accesspresslite_show_event_number = (isset($accesspresslite_settings['show_event_number']) ? $accesspresslite_settings['show_event_number'] : 3 ) ;
$big_icons = $accesspresslite_settings['big_icons'];
$disable_event = $accesspresslite_settings['disable_event'];
if($disable_event == 1){
	$welcome_class = "full-width";
}else{
	$welcome_class = "";
}
if( $accesspresslite_layout !== 'Layout2') { ?>			
<section id="top-section" class="ak-container">
<div id="welcome-text" class="clearfix <?php echo esc_attr($welcome_class); ?>">
	<?php
			if(!empty($accesspresslite_welcome_post_id)){
			$posttype = get_post_type($accesspresslite_welcome_post_id);
			$postparam = ($posttype == 'page') ? 'page_id': 'p';
			$args = array(
				'post_type' => $posttype,
				$postparam => $accesspresslite_welcome_post_id
				);
			$query1 = new WP_Query( $args );
				while ($query1->have_posts()) : $query1->the_post(); ?>
					 	
					<?php 
					if( has_post_thumbnail() ){
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false ); 
					?>
					<figure class="welcome_left_content">
						<a href="<?php the_permalink(); ?>">
						<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>">
						</a>
					</figure>	
					<?php } ?>
                    <div class="welcome_right_content <?php if( !has_post_thumbnail() ){echo 'welcome_fill_content';} ?>">
    					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    					<div  class="welcome-detail<?php if( !has_post_thumbnail() ){ echo " welcome-detail-full-width"; } ?>">
    					
    					<?php if($accesspresslite_settings['welcome_post_content'] == 0 || empty($accesspresslite_settings['welcome_post_content'])){ ?>
    						<p><?php echo accesspresslite_excerpt( get_the_content() , $accesspresslite_welcome_post_char ) ?></p>
    						<?php if(!empty($accesspresslite_settings['welcome_post_readmore'])){?>
    							<a href="<?php the_permalink(); ?>" class="read-more bttn"><?php echo esc_attr($accesspresslite_settings['welcome_post_readmore']); ?></a>
    						<?php } 
    					}else{ 
    						the_content();
    					} ?>
    					
    					</div>
                    </div>
					
				<?php endwhile;	
				wp_reset_postdata(); 
				}
				
				else{?>
				
				<figure class="welcome_left_content">
						<a href="#">
						<img src="<?php echo get_template_directory_uri(); ?>/images/demo/welcome_image.png" alt="">
						</a>
				</figure>	
                    <div class="welcome_right_content">
    					<h1><a href="#"><?php _e('About AccessPress Lite','accesspresslite') ?></a></h1>
    					<div  class="welcome-detail welcome-detail-full-width">
    					<p><?php 
    						_e("AccessPress Lite is a HTML5 & CSS3 Responsive WordPress Business Theme with clean, minimal yet highly professional design.With our years of experience, we've developed this theme and given back to this awesome WordPress community. The theme is complete with many useful features. The intuitive theme options let you manage all the possible options/features of the theme. abore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco labolabore et dolore magna aliqua.Ulabore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboxx",'accesspresslite');
    					?></p>
                        <a href="#" class="read-more bttn"><?php _e('Read more','accesspresslite') ?></a>
    					</div>
                    </div>

			<?php } ?>
</div>
</section>
<?php do_action('accesspresslite_call_to_action');?>
<section id="mid-section" class="ak-container">
<h1><?php _e('Features Posts','accesspresslite') ?></h1>
<?php 
if(!empty($featured_post1) || !empty($featured_post2) || !empty($featured_post3)){
    ?><div class="feature_wrap clearfix"><?php 
    if(!empty($featured_post1)) { ?>
    
		<div id="featured-post-1" class="featured-post <?php if($show_fontawesome_icon){echo 'icon_view_mod';} if($big_icons == 1){ echo ' big-icon'; } ?>">
			
			<?php
				$posttype = get_post_type($featured_post1);
				$postparam = ($posttype == 'page') ? 'page_id': 'p';
				$args = array(
					'post_type' => $posttype,
					$postparam => $featured_post1
				);
				$query2 = new WP_Query( $args );
				// the Loop
				while ($query2->have_posts()) : $query2->the_post(); 
					
					if( $show_fontawesome_icon == 0 ){
					?>
					<figure class="featured-image">
                        <div class="featured-overlay">
                            <?php 							
    							if( has_post_thumbnail()){
    							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured-thumbnail', false ); 
    							?>
                                <a class="image_feature_lightbox" href="<?php echo esc_url($image[0]); ?>"><i class="fa fa-expand"></i></a>
                            <?php }?>
                			<a class="plus_fa_icon" href="<?php the_permalink(); ?>"><i class="fa font-icon-plus"></i></a>
                		</div>
							<?php 							
							if( has_post_thumbnail()){
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured-thumbnail', false ); 
							?>
							<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>">
							<?php }else { ?>
							<img src="<?php echo get_template_directory_uri(); ?>/images/demo/featured-fallback.jpg" alt="<?php the_title(); ?>">
							<?php } 
							?>
						
					</figure>
					<?php } ?>	

					<h2 class="<?php if($show_fontawesome_icon == 1){ echo 'has-icon'; }?>">
					<a href="<?php the_permalink(); ?>">
					<?php 
					if($show_fontawesome_icon == 1){ ?>

					<i class="fa <?php echo esc_attr($accesspresslite_settings['featured_post1_icon']) ?>"></i>
							
					<?php } ?>
                    
					<span><?php the_title(); ?></span>
					</a>
					</h2>

					<div class="featured-content">
						<p><?php echo accesspresslite_excerpt( get_the_content() , 260 ) ?></p>
					</div>
				<?php endwhile;
				wp_reset_postdata(); ?>
		
		</div>
	<?php }

	if(!empty($featured_post2)) { ?>
		<div id="featured-post-2" class="featured-post<?php if($show_fontawesome_icon){echo ' icon_view_mod';}if($big_icons == 1){ echo ' big-icon'; } ?>">
			
			<?php
				$posttype = get_post_type($featured_post2);
				$postparam = ($posttype == 'page') ? 'page_id': 'p';
				$args = array(
					'post_type' => $posttype,
					$postparam => $featured_post2
				);
				$query3 = new WP_Query( $args );
				// the Loop
				while ($query3->have_posts()) : $query3->the_post();
					
					if( $show_fontawesome_icon == 0 ){
					?>
					<figure class="featured-image">
						
                        <div class="featured-overlay">
                            <?php 							
    							if( has_post_thumbnail()){
    							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured-thumbnail', false ); 
    							?>
                                <a class="image_feature_lightbox" href="<?php echo esc_url($image[0]); ?>"><i class="fa fa-expand"></i></a>
                            <?php }?>
                			<a class="plus_fa_icon" href="<?php the_permalink(); ?>"><i class="fa font-icon-plus"></i></a>
                		</div>
							<?php 							
							if( has_post_thumbnail()){
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured-thumbnail', false ); 
							?>
							<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>">
							<?php }else { ?>
							<img src="<?php echo get_template_directory_uri(); ?>/images/demo/featured-fallback.jpg" alt="<?php the_title(); ?>">
							<?php } 
							?>
						
					</figure>
					<?php } ?>	

					<h2 class="<?php if($show_fontawesome_icon == 1){ echo 'has-icon'; }?>">
					<a href="<?php the_permalink(); ?>">
					<?php 
					if($show_fontawesome_icon == 1){ ?>

					<i class="fa <?php echo esc_attr($accesspresslite_settings['featured_post2_icon']) ?>"></i>
							
					<?php } ?>
                    
					<span><?php the_title(); ?></span>
					</a>
					</h2>

					<div class="featured-content">
						<p><?php echo accesspresslite_excerpt( get_the_content() , 260 ) ?></p>
						
					</div>
				<?php endwhile;
				wp_reset_postdata(); ?>
		
		</div>
	<?php } 

	if(!empty($featured_post3)) { ?>
		<div id="featured-post-3" class="featured-post<?php if($show_fontawesome_icon){echo ' icon_view_mod';} if($big_icons == 1){ echo ' big-icon'; } ?>">
			<?php
				$posttype = get_post_type($featured_post3);
				$postparam = ($posttype == 'page') ? 'page_id': 'p';
				$args = array(
					'post_type' => $posttype,
					$postparam => $featured_post3
				);
				$query4 = new WP_Query( $args );
				// the Loop
				while ($query4->have_posts()) : $query4->the_post(); 
					if( $show_fontawesome_icon == 0 ){
					?>
					<figure class="featured-image">
						
                        <div class="featured-overlay">
                            <?php 							
    							if( has_post_thumbnail()){
    							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured-thumbnail', false ); 
    							?>
                                <a class="image_feature_lightbox" href="<?php echo esc_url($image[0]); ?>"><i class="fa fa-expand"></i></a>
                            <?php }?>
                			<a class="plus_fa_icon" href="<?php the_permalink(); ?>"><i class="fa font-icon-plus"></i></a>
                		</div>
							<?php 							
							if( has_post_thumbnail()){
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured-thumbnail', false ); 
							?>
							<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>">
							<?php }else { ?>
							<img src="<?php echo get_template_directory_uri(); ?>/images/demo/featured-fallback.jpg" alt="<?php the_title(); ?>">
							<?php } 
							?>
						
					</figure>
					<?php } ?>	

					<h2 class="<?php if($show_fontawesome_icon == 1){ echo 'has-icon'; }?>">
					<?php 
					if($show_fontawesome_icon == 1){ ?>

					<a href="<?php the_permalink(); ?>"><i class="fa <?php echo esc_attr($accesspresslite_settings['featured_post3_icon']) ?>"></i></a>
							
					<?php } ?>
                    
					<a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a>
					</h2>

					<div class="featured-content">
						<p><?php echo accesspresslite_excerpt( get_the_content() , 260 ) ?></p>
						
					</div>
				<?php endwhile;
				wp_reset_postdata(); ?>
		
		</div>
	<?php } 
	?></div> <?php
	}else{ ?>
	<div class="feature_wrap clearfix">
	<?php for($featured_post=1 ; $featured_post < 4; $featured_post++){ ?>
	<div id="featured-post-<?php echo $featured_post; ?>" class="featured-post <?php if($show_fontawesome_icon){echo ' icon_view_mod';}?>">

		<figure class="featured-image">
    		<div class="featured-overlay">
                <a class="image_feature_lightbox" href="<?php echo get_template_directory_uri().'/images/demo/feature2.JPG' ?>"><i class="fa fa-expand"></i></a>
    			<a class="plus_fa_icon" href="<?php the_permalink(); ?>"><i class="fa font-icon-plus"></i></a>
    		</div>
    
    		<img src="<?php echo get_template_directory_uri().'/images/demo/feature2.JPG' ?>" alt="<?php echo 'featuredpost'.$featured_post; ?>">
    		
        </figure>
		<h2><a href="#"><?php _e('Featured Post','accesspresslite'); ?> <?php echo $featured_post; ?></a></h2>

		<div class="featured-content">
			<p><?php _e('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate...','accesspresslite'); ?></p>
		</div>
        
	</div>

	<?php }
    ?><?php
	} ?>
</section>

<?php if($disable_event != 1): ?>
<section id="event_section" >
    <div class="ak-container" id="latest-events_template_two">
    
    			<?php
    				if(!empty($accesspresslite_event_category)){
    
    	            $loop = new WP_Query( array(
    	                'cat' => $accesspresslite_event_category,
    	                'posts_per_page' => $accesspresslite_show_event_number,
    	            )); ?>
    
    	        <h1><a href="<?php echo get_category_link($accesspresslite_event_category); ?>"><?php echo get_cat_name($accesspresslite_event_category); ?></a></h1>
                <div class="event_mail_wraper clearfix">
        	        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
        	        	<div class="event-list_two clearfix">
        	        		<figure class="event-thumbnail_two">
                                <div class="event-detail_two">
            		        		<h4 class="event-title_two">
            		        			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            		        		</h4>
            
            		        		<div class="event-excerpt_two">
            		        			<?php echo accesspresslite_excerpt( get_the_content() , 100 ) ?>
            		        		</div>
                                     <?php 
        						if($accesspresslite_settings['show_eventdate'] == 1){ ?>
        							<div class="event-date_two">
        							<span class="event-date-day_two"><?php echo get_the_date('j'); ?></span>
        							<span class="event-date-month_two"><?php echo get_the_date('M'); ?></span>
        							</div>
        						<?php
        						}?>
            	        		</div>
                               
        						<a href="<?php the_permalink(); ?>">
        						<?php 
        						if( has_post_thumbnail() ){
        						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'template_two_event_home', false ); 
        						?>
        						<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>">
        						<?php } else { ?>
        						<img src="<?php echo get_template_directory_uri(); ?>/images/demo/event-fallback.jpg" alt="<?php the_title(); ?>">
        						<?php } ?>
        						</a>
        					</figure>
        	        	</div>
        	        <?php endwhile; ?>
                 </div>                
    	        <?php wp_reset_postdata(); 
    
    	        } else { ?>
    	        
    	           <h1>Events/News</h1>
                   <div class="event_mail_wraper clearfix">
    		        <?php for ( $event_count=1 ; $event_count < 5 ; $event_count++ ) { ?>
                    
                        <div class="event-list_two clearfix">
        	        		<figure class="event-thumbnail_two">
                                <div class="event-detail_two">
            		        		<h4 class="event-title_two">
            		        			<a href="#">Revibe Pension</a>
            		        		</h4>
            
            		        		<div class="event-excerpt_two">
            		        			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ...        		        		
                                    </div>
                                    <div class="event-date_two">
            							<span class="event-date-day_two">14</span>
            							<span class="event-date-month_two">Feb</span>
         							</div>
            	        		</div>
     							
        						<a href="#">
        						<img src="<?php echo get_template_directory_uri(); ?>/images/demo/event 1.jpg" alt="Revibe Pension">
        						</a>
        					</figure>
        	        	</div>
                    
    		        <?php } ?>
                    </div>
    	        	<?php } ?>
    </div>
</section>
<?php endif; ?>

<?php } 
?>

<?php if( $accesspresslite_layout !== 'Default' || empty($accesspresslite_layout) ){?>
<section id="ak-blog">
	<section class="ak-container" id="ak-blog-post">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php 
			while ( have_posts() ) : the_post(); 
			get_template_part( 'content' );
			endwhile;
			?>

			<?php accesspresslite_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		<?php wp_reset_query();
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
	<div id="secondary-right" class="widget-area right-sidebar sidebar">
		<?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'blog-sidebar' ); ?>
		<?php endif; ?>
	</div>
	</section>
</section>

<?php }
wp_reset_query(); ?>

<?php if($accesspresslite_featured_bar != 1) :?>
<section id="bottom-section">
	<div class="ak-container">
        <div class="text-box">
		<?php if ( is_active_sidebar( 'textblock-1' ) ) : ?>
		  <?php dynamic_sidebar( 'textblock-1' ); 
        
        else:  
        ?>
        <aside id="text-3" class="widget widget_text">
            <h3 class="widget-title"><?php _e('Why AccessPress?','accesspresslite'); ?></h3>
            <div class="textwidget">
            <?php _e('labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco labolabore et dolore magna aliqua. <br />
                Ut enim ad minim veniam, quis nostrud exercitation ullamco labolabore et dolore magna aliqua. Ulabore et dolore magna aliqua.','accesspresslite');?>
                
            </div>
        </aside>
		<?php endif; ?>	
		</div>
        
        <div class="thumbnail-gallery clearfix">
        <?php 
        $gallery_code = $accesspresslite_settings['gallery_code'];
        if ( is_active_sidebar( 'textblock-2' ) ) : ?>
		  <?php dynamic_sidebar( 'textblock-2' ); ?>
		<?php elseif(!empty($gallery_code)): ?>	
		<h3><?php _e('Gallery','accesspresslite')?></h3>
        <?php 
        echo do_shortcode($gallery_code );
        else: ?>
        <h3>Gallery</h3>
        <div class="gallery">
            <dl class="gallery-item">
            <dt class="gallery-icon landscape">
        		<a href="<?php echo get_template_directory_uri();?>/images/demo/gallery11.jpg" class="fancybox-gallery" data-lightbox-gallery="gallery"><img width="150" height="150" src="<?php echo get_template_directory_uri();?>/images/demo/gallery11.jpg" class="attachment-thumbnail size-thumbnail" alt="gallery5"></a>
        	</dt></dl>
            <dl class="gallery-item">
        	<dt class="gallery-icon landscape">
        		<a href="<?php echo get_template_directory_uri();?>/images/demo/gallery12.jpg" class="fancybox-gallery" data-lightbox-gallery="gallery"><img width="150" height="150" src="<?php echo get_template_directory_uri();?>/images/demo/gallery12.jpg" class="attachment-thumbnail size-thumbnail" alt="gallery2"></a>
        	</dt></dl>
            <dl class="gallery-item">
        	<dt class="gallery-icon landscape">
        		<a href="<?php echo get_template_directory_uri();?>/images/demo/gallery13.jpg" class="fancybox-gallery" data-lightbox-gallery="gallery"><img width="150" height="150" src="<?php echo get_template_directory_uri();?>/images/demo/gallery13.jpg" class="attachment-thumbnail size-thumbnail" alt="gallery3"></a>
        	</dt></dl><br style="clear: both">
            <dl class="gallery-item">
        	<dt class="gallery-icon landscape">
        		<a href="<?php echo get_template_directory_uri();?>/images/demo/gallery14.jpg" class="fancybox-gallery" data-lightbox-gallery="gallery"><img width="150" height="150" src="<?php echo get_template_directory_uri();?>/images/demo/gallery14.jpg" class="attachment-thumbnail size-thumbnail" alt="gallery4"></a>
        	</dt></dl>
            <dl class="gallery-item">
        	<dt class="gallery-icon landscape">
        		<a href="<?php echo get_template_directory_uri();?>/images/demo/gallery15.jpg" class="fancybox-gallery" data-lightbox-gallery="gallery"><img width="150" height="150" src="<?php echo get_template_directory_uri();?>/images/demo/gallery15.jpg" class="attachment-thumbnail size-thumbnail" alt="gallery5"></a>
        	</dt></dl>
            <dl class="gallery-item">
        	<dt class="gallery-icon landscape">
        		<a href="<?php echo get_template_directory_uri();?>/images/demo/gallery16.jpg" class="fancybox-gallery" data-lightbox-gallery="gallery"><img width="150" height="150" src="<?php echo get_template_directory_uri();?>/images/demo/gallery16.jpg" class="attachment-thumbnail size-thumbnail" alt="gallery6"></a>
        	</dt></dl><br style="clear: both">
        </div>
        
        <?php endif; ?>	
		</div>        
        
		<div class="testimonial-slider-wrap">
		<?php 
		if ( is_active_sidebar( 'textblock-3' ) ) {
		  dynamic_sidebar( 'textblock-3' );
		}else{

		if(!empty($testimonial_category)) {	?>
 		<h3><?php echo get_cat_name($testimonial_category); ?></h3>
			<?php
				$loop2 = new WP_Query( array(
	                'cat' => $testimonial_category,
	                'posts_per_page' => 4,
	            )); ?>
	        <div class="testimonial-wrap_two">
		        <div class="testimonial-slider">
		        <?php while ($loop2->have_posts()) : $loop2->the_post(); ?>

		        	<div class="testimonial-single">
			        	<div class="testimonial-list clearfix">
                            <div class="image_title_content clearfix">
    			        		<div class="testimonial-thumbnail">
        			        		<?php 
                                    if(has_post_thumbnail()){
                                    the_post_thumbnail('thumbnail'); 
                                    }else{ ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial-dummy.jpg" alt="no-image"/>
                                    <?php }?>
    			        		</div>
                                <div class="testimoinal-client-name_two"><?php the_title(); ?></div>
                                <?php the_date('d F,y', '<span class="testimonial_date">', '</span>'); ?>                                
                            </div>
			        		<div class="testimonial-excerpt_two">
			        			<?php echo accesspresslite_excerpt( get_the_content() , 140 ) ?>
			        		</div>
			        	</div>
					</div>
                <?php endwhile; ?>
				</div>
			</div>	         
	        
	        <?php wp_reset_postdata(); 
			}else{ 
			?>
			<h3>Testimonial</h3>
			
	        <div class="testimonial-wrap_two">
		        <div class="testimonial-slider">
		        
		        	<div class="testimonial-single">
			        	<div class="testimonial-list clearfix">
                            <div class="image_title_content clearfix">
    			        		<div class="testimonial-thumbnail">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/demo/testimonial-image4.jpg" alt="no-image"/>
    			        		</div>
                                <div class="testimoinal-client-name_two">Jhon Doe</div>
                                <span class="testimonial_date">17 September,2015</span>                               
                            </div>
			        		<div class="testimonial-excerpt_two">
			        			labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco labolabore et dolore magna aliqua....
			        		</div>
			        	</div>
					</div>
                    
                    <div class="testimonial-single">
			        	<div class="testimonial-list clearfix">
                            <div class="image_title_content clearfix">
    			        		<div class="testimonial-thumbnail">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/demo/testimonial_two.jpg" alt="no-image"/>
    			        		</div>
                                <div class="testimoinal-client-name_two">Scarlet Eva</div>
                                <span class="testimonial_date">15 February,2014</span>                               
                            </div>
			        		<div class="testimonial-excerpt_two">
			        			labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco labolabore et dolore magna aliqua....
			        		</div>
			        	</div>
					</div>
                
				</div>
			</div>
				
			<?php } 
			}?>
		</div>
	</div>
</section>
<?php endif; ?>