<?php get_header();

	#Page Top Code Section
	$dttheme_options = get_option(IAMD_THEME_SETTINGS);
	$dttheme_integration = $dttheme_options['integration'];
	if(isset($dttheme_integration['enable-single-page-top-code'])):
		echo stripslashes($dttheme_integration['single-page-top-code']);
	endif;		

	$page_layout  = dttheme_option( 'specialty', 'gallery-archives-layout' );
	$page_layout  = !empty( $page_layout ) ? $page_layout : "content-full-width";
	$post_layout = dttheme_option( 'specialty', 'gallery-archives-post-layout' );
	$post_layout  = !empty( $post_layout ) ? $post_layout : "one-column";

	$show_sidebar = $show_left_sidebar = $show_right_sidebar =  false;
	$sidebar_class = "";

	switch ( $page_layout ) {
		case 'with-left-sidebar':
			$page_layout = "page-with-sidebar with-left-sidebar";
			$show_sidebar = $show_left_sidebar = true;
			$sidebar_class = "secondary-has-left-sidebar";
		break;

		case 'with-right-sidebar':
			$page_layout = "page-with-sidebar with-right-sidebar";
			$show_sidebar = $show_right_sidebar	= true;
			$sidebar_class = "secondary-has-right-sidebar";
		break;

		case 'content-full-width':
		default:
			$page_layout = "content-full-width";
		break;
	}

	switch($post_layout):
		case 'one-third-column':
			$post_class = $show_sidebar ? "portfolio column dt-sc-one-third with-sidebar " : "portfolio column dt-sc-one-third ";
			$columns = 3;
		break;

		case 'one-fourth-column':
			$post_class = $show_sidebar ? "portfolio column dt-sc-one-fourth with-sidebar " : "portfolio column dt-sc-one-fourth";
			$columns = 4;
		break;
	endswitch;?>

	<!-- ** Primary Section ** -->
	<div id="primary" class="<?php echo esc_attr($page_layout);?>">
    
    	<!-- ** Portfolio Container -->
    	<div class="portfolio-container"><?php
			if( have_posts() ):
				$i = 1;
				
				while( have_posts() ):
					the_post();
					$the_id = get_the_ID();
					
					$temp_class = "";
					if($i == 1) $temp_class = $post_class." first"; else $temp_class = $post_class;
					if($i == $columns) $i = 1; else $i = $i + 1;
					
					$portfolio_item_meta = get_post_meta($the_id,'_portfolio_settings',TRUE);
					$portfolio_item_meta = is_array($portfolio_item_meta) ? $portfolio_item_meta  : array();
					
					$popup = $image = "//placehold.it/1170x780&text=DesignThemes";
					
					if( array_key_exists('items_name', $portfolio_item_meta) ) {
						
						$item =  $portfolio_item_meta['items_name'][0];
						$popup = $portfolio_item_meta['items'][0];
						
						if( "video" === $item ) {
							$items = array_diff( $portfolio_item_meta['items_name'] , array("video") );
							
							if( !empty($items) ) {
								$image = $portfolio_item_meta['items'][key($items)];
	                        } else {
								$image = "//placehold.it/1170x780&text=DesignThemes";
	                        }
	                    } else {
							$image = $portfolio_item_meta['items'][0];
	                    }
	                }?>
					<div id="<?php echo esc_attr("dt_portfolios-{$the_id}");?>" class="<?php echo esc_attr($temp_class);?>">
                    	<div class="portfolio-thumb">
                        	<img src="<?php echo esc_attr($image);?>" alt="" width="1170" height="780"/>
                            <div class="image-overlay">
                            	<a href="<?php echo esc_attr($popup);?>" data-gal="prettyPhoto[gallery]" class="link"><span class="fa fa-plus"> </span></a>
                                <a href="<?php the_permalink();?>" class="zoom"> <span class="fa fa-link"> </span> </a>
							</div>
                        </div>
                        <div class="portfolio-detail">
                        	<h3><a href="<?php the_permalink();?>" title="<?php printf( esc_attr__('%s'), the_title_attribute('echo=0'));?>"><?php the_title();?></a></h3>
						</div>                    
					</div><?php
				endwhile;
			endif;?>
        </div><!-- Portfolio Template Ends Here -->
        
        <div class="pagination">
        	<?php echo dttheme_pagination("","","");?>        
        </div>    
        
	</div><!-- ** Primary Section Ends ** -->

	<!-- ** Secondary Section ** -->
	<?php if( $show_sidebar ) : ?>
		<div id="secondary" class="<?php echo esc_attr($sidebar_class);?>">
		    <?php get_sidebar();?>
		</div><!-- ** Secondary Section Ends ** -->
	<?php endif;?>
<?php
	#Page Top Code Section
	$dttheme_integration = $dttheme_options['integration'];
	if(isset($dttheme_integration['enable-single-page-bottom-code'])):
		echo stripslashes($dttheme_integration['single-page-bottom-code']);
	endif;
		
	get_footer();?>    