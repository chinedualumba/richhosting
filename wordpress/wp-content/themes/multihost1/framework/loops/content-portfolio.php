<?php $tpl_default_settings = get_post_meta($post->ID,'_portfolio_settings',TRUE);
	$tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings  : array();

	$page_layout = array_key_exists("page-layout",$tpl_default_settings) ? $tpl_default_settings['page-layout'] : "content-full-width";
  	$show_sidebar = false;
	$sidebar_class = "";

	switch($page_layout):
		case 'with-left-sidebar':
			$page_layout 	=	"page-with-sidebar with-left-sidebar";
			$show_sidebar 	= 	true;
			$sidebar_class 	=	"left-sidebar";
		break;

		case 'with-right-sidebar':
			$show_sidebar = 	true;
			$page_layout 	=	"page-with-sidebar with-right-sidebar";
			$sidebar_class 	=	"right-sidebar";
		break;
	endswitch;

	$portfolio_layout = array_key_exists("portfolio-layout", $tpl_default_settings) ? $tpl_default_settings['portfolio-layout'] : "full-width-portfolio";
	$container_start =  $container_middle =  $container_end = "";
	switch ($portfolio_layout) {

		case 'full-width-portfolio':
			 $container_start = $container_middle = $container_end = "";
		break;

		case 'with-left-portfolio':
		  $container_start	 =	'<div class="column dt-sc-two-third first">';
		  $container_middle	 =	'</div>';
		  $container_middle  .=	'<div class="column dt-sc-one-third last">'; 
		  $container_end	 =	'</div>';
		break;

		case 'with-right-portfolio':
		  $container_start	 =	'<div class="column dt-sc-two-third right-gallery first">';
		  $container_middle	 =	'</div>';
		  $container_middle  .=	'<div class="column dt-sc-one-third last">'; 
		  $container_end	 =	'</div>';
		break;
	}?>
    
	<!-- ** Primary Section ** -->
	<div id="primary" class="<?php echo esc_attr($page_layout);?>">    
    	<div id="post-<?php the_ID(); ?>" <?php post_class('portfolio-single');?>>
            <?php echo !empty( $container_start ) ? $container_start : '';?>
            	<div class="portfolio-slider-container">
                	<ul class="portfolio-slider"><?php
						if( array_key_exists("items_name",$tpl_default_settings) ) {
							foreach( $tpl_default_settings["items_name"] as $key => $item ){
								$current_item = $tpl_default_settings["items"][$key];
								
								if( "video" === $item ) {
									echo "<li>".wp_oembed_get( $current_item )."</li>";
								} else {
									echo "<li> <img src='".esc_url($current_item)."' alt='' title='' /></li>";
								}
							}
						} else {
							echo "<li> <img src='//placehold.it/1060x713&text=Portfolio' alt='' title=''/></li>";
						}?>
                    </ul>
                </div>
            <?php echo !empty( $container_middle ) ? $container_middle : '';?>
            
            <?php if( $portfolio_layout == "full-width-portfolio" ):?>
            		<div class="column dt-sc-two-third first">
            <?php endif;
					
					the_content();
					
				if( $portfolio_layout == "full-width-portfolio" ):?>
            		</div>
            		<div class="column dt-sc-one-third last"><?php
				endif;?>
				  
                  <div class="item-meta">
                  	<h3><?php _e('Other Details','dt_themes');?></h3>
                    
                    <p> <span><?php _e('Date','dt_themes');?> : </span><?php echo get_the_date("d M Y");?></p>
                    
                    <?php if( isset( $tpl_default_settings['author-name'] ) ): ?>
                    	<p> <span><?php _e('Author','dt_themes');?> : </span> <?php echo esc_html($tpl_default_settings['author-name']);?> </p>
                    <?php endif;?>
                    
                    <?php the_terms( $post->ID, 'dt_portfolio_entries', '<p> <span>'. __(" Category","dt_themes") .' : </span>',', ','</p>'); ?>
                    
                    <?php if( isset( $tpl_default_settings["website-link"] ) ): ?>
                    	<p> <span><?php _e('Website','dt_themes');?> : </span>
                        	<a target="_blank" href="<?php echo esc_url( $tpl_default_settings["website-link"] );?>"><?php
								$url = $tpl_default_settings["website-link"];
                				$url = preg_replace("(^https?://)", "", $url );
                				echo esc_html( $url );?></a>
                        </p>
                    <?php endif;
                    
                    if(array_key_exists("show-social-share",$tpl_default_settings)):
					  	echo '<div class="dt-portfolio-share">';
						dttheme_social_bookmarks('sb-portfolio');
						echo '</div>';
					endif;?>    
                  </div>

            <?php if( $portfolio_layout == "full-width-portfolio" ): ?>
            		</div>
            <?php endif;?>
            
            <?php echo !empty( $container_end ) ? $container_end : '';?>
            
			<!-- **Post Nav** -->
			<div class="post-nav-container">
				<div class="post-prev-link"><?php previous_post_link('%link','<i class="fa fa-arrow-circle-left"> </i> %title<span> ('.__('Prev Entry','dt_themes').')</span>');?> </div>
				<div class="post-next-link"><?php next_post_link('%link','<span> ('.__('Next Entry','dt_themes').')</span> %title <i class="fa fa-arrow-circle-right"> </i>');?></div>
            </div><!-- **Post Nav - End** -->
        </div>
        
        <?php if(array_key_exists("show-related-items",$tpl_default_settings)) : ?>
        		<div class="dt-sc-hr-invisible"></div>
                <div class="dt-sc-clear"></div>
                
                <h2 class="dt-sc-hr-border-title center"><span><?php _e('Other Projects','dt_themes');?></span></h2><?php
					
					$category_ids = array();
					$input  = wp_get_object_terms( $post->ID, 'dt_portfolio_entries');
					foreach($input as $category) $category_ids[] = $category->term_id;
					
					$args = array(	'post_type'=>'dt_portfolios', 'orderby' => 'rand',
						'post__not_in' => array($post->ID),
						'tax_query' => array( array(  'taxonomy'=>'dt_portfolio_entries', 'field'=>'id', 'operator'=>'IN', 'terms'=>$category_ids)));
					
					$the_query = new WP_Query($args);
					if( $the_query->have_posts() ) :?>
                    	<!-- **Portfolio Carousel Wrapper** -->
                        <div class="carousel-wrapper">
                        	<div class="carousel-arrows">
                            	<a href="#" title="" class="prev-arrow"> <span class="fa fa-angle-left"> </span> </a>
                                <a href="#" title="" class="next-arrow"> <span class="fa fa-angle-right"> </span> </a>
                            </div>
                            
                            <!-- **Portfolio Carousel** -->
                            <ul class="portfolio-carousel carousel_items"><?php
								while( $the_query->have_posts() ) :
									$the_query->the_post();
									$the_id = get_the_ID();
									
									$portfolio_item_meta = get_post_meta($the_id,'_portfolio_settings',TRUE);
									$portfolio_item_meta = is_array($portfolio_item_meta) ? $portfolio_item_meta  : array();
									
									$popup = $image = "//placehold.it/1170x1010&text=DesignThemes";
									if( array_key_exists('items_name', $portfolio_item_meta) ) {
										$item =  $portfolio_item_meta['items_name'][0];
										$popup = $portfolio_item_meta['items'][0];
										
										if( "video" === $item ) {
											$items = array_diff( $portfolio_item_meta['items_name'] , array("video") );
											
											if( !empty($items) ) {
												$image = $portfolio_item_meta['items'][key($items)];
											} else {
												$image = "//placehold.it/1170x1010&text=DesignThemes";
											}
										} else {
											$image = $portfolio_item_meta['items'][0];
										}
									}?>
                                    	<li class="portfolio dt-sc-one-third column">
                                        	<div class="portfolio-thumb">
                                            	<img src="<?php echo esc_url($image);?>" alt="" title="">
                                                <div class="image-overlay">
                                                	<a href="<?php echo esc_url( $popup );?>" data-gal="prettyPhoto[gallery]" class="zoom"> <span class="fa fa-plus"> </span> </a>                                                
                                                	<a href="<?php the_permalink();?>" title="" class="link"> <span class="fa fa-link"> </span> </a>
                                                </div>
                                            </div>
                                            <div class="portfolio-detail">
                                            	<h3><a href="<?php the_permalink();?>" title="<?php printf( esc_attr__('%s'), the_title_attribute('echo=0'));?>"><?php the_title();?></a></h3>
                                            </div>
                                        </li><?php
								endwhile;?>
                            </ul><!-- **Portfolio Carousel - End** -->
                         </div><?php
					endif;?>
        <?php endif;?>
	</div><!-- ** Primary Section Ends ** -->

	<!-- ** Secondary Section ** -->
	<?php if( $show_sidebar ) : ?>
		<div id="secondary" class="<?php echo esc_attr($sidebar_class);?>">
		    <?php get_sidebar();?>
		</div><!-- ** Secondary Section Ends ** -->
	<?php endif;?> 
