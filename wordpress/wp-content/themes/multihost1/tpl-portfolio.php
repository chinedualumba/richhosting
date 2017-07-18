<?php /*Template Name: Portfolio Template*/
	get_header();

	#Page Top Code Section
	$dttheme_options = get_option(IAMD_THEME_SETTINGS);
	$dttheme_integration = $dttheme_options['integration'];
	if(isset($dttheme_integration['enable-single-page-top-code'])):
		echo stripslashes($dttheme_integration['single-page-top-code']);
	endif;

	$tpl_default_settings = get_post_meta( $post->ID, '_tpl_default_settings', TRUE );
	$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();

	$page_layout = array_key_exists("layout",$tpl_default_settings) ? $tpl_default_settings['layout'] : "content-full-width";
	$show_sidebar = false;
	$sidebar_class= "";

	# Global Page Layout
	if( !is_null( $GLOBALS['enable_global_page_layout'] ) ) {
		$page_layout = $GLOBALS['global_page_layout'];
	}
	# Global Page Layout

	switch ($page_layout) {

		case 'with-left-sidebar':
			$page_layout = 'page-with-sidebar with-left-sidebar';
			$show_sidebar = true;
			$sidebar_class = "left-sidebar";
		break;

		case 'with-right-sidebar':
			$page_layout = 'page-with-sidebar with-right-sidebar';
			$show_sidebar = true;
			$sidebar_class = "right-sidebar";
		break;
	}?>

	<!-- ** Primary Section ** -->
	<div id="primary" class="<?php echo esc_attr($page_layout);?>"><?php
		if( have_posts() ):
			while( have_posts() ):
				the_post();
				get_template_part( 'framework/loops/content', 'page' );
			endwhile;
		endif;?>

		<div class="dt-sc-clear"></div>

		<!-- Portfolio Template Starts Here -->
		<?php $post_per_page	=	$tpl_default_settings['portfolio-post-per-page'];

			$post_layout = array_key_exists("portfolio-post-layout",$tpl_default_settings) ? $tpl_default_settings['portfolio-post-layout'] : "one-third-column";
			switch($post_layout):

				case 'one-half-column':
					$post_class = $show_sidebar ? " portfolio column dt-sc-one-half with-sidebar" : " portfolio column dt-sc-one-half";
					$columns = 2;
				break;

				case 'one-third-column':
					$post_class = $show_sidebar ? " portfolio column dt-sc-one-third with-sidebar" : " portfolio column dt-sc-one-third";
					$columns = 3;
				break;

				case 'one-fourth-column':
					$post_class = $show_sidebar ? " portfolio column dt-sc-one-fourth with-sidebar" : " portfolio column dt-sc-one-fourth";
					$columns = 4;
				break;
			endswitch;

			#Pagination
			$paged = 1;
			if ( get_query_var('paged') ) { 
				$paged = get_query_var('paged');
			} elseif ( get_query_var('page') ) {
				$paged = get_query_var('page');
			}

			$args = array();

			$categories = isset($tpl_default_settings['portfolio-categories']) ? array_filter($tpl_default_settings['portfolio-categories']) : array();
			if( empty($categories) ):
				$args = array( 'paged' => $paged ,'posts_per_page' => $post_per_page,'post_type' => 'dt_portfolios');
			else:
				$args = array(
					'post_type' => 'dt_portfolios',
					'orderby' => 'ID',
					'order' => 'ASC',
					'paged' => $paged,
					'posts_per_page' => $post_per_page,
					'tax_query' => array( 
						array(
							'taxonomy' => 'dt_portfolio_entries',
							'field' => 'id',
							'operator' => 'IN',
							'terms' => $categories
						)
					)
				);
			endif;
			
			$the_query = new WP_Query($args);
			if($the_query->have_posts()):
				$i = 1;
				$count = $wp_query->post_count;
				
				#sorting container
					$c = isset( $tpl_default_settings['portfolio-categories'] ) ? array_filter( $tpl_default_settings['portfolio-categories'] ) : array();
					if( empty($c) ):
						$c = get_categories('taxonomy=dt_portfolio_entries&hide_empty=1');
					else:
						$c = get_categories( array('taxonomy'=>'dt_portfolio_entries','hide_empty'=>1,'include'=>$c) );
					endif;
					
					if( sizeof($c) > 1 ):
						if( array_key_exists("filter", $tpl_default_settings) && (!empty($c)) ):
							$post_class .= " all-sort ";?>
                            <div class="sorting-container">
                            	<a href="#" class="active-sort" title="" data-filter=".all-sort"><?php _e('All','dt_themes'); echo " ({$count})";?></a><?php
									foreach( $c as $category ) :?>
                                    	<a href='#' data-filter=".<?php echo esc_attr($category->category_nicename);?>-sort">
											<?php echo esc_html($category->cat_name)." [".esc_html( $category->category_count).']';?>
                                        </a><?php 
									endforeach;?>
							</div><?php
						endif;
					endif;
				#sorting container?>
                <div class="portfolio-container"><?php
					while($the_query->have_posts()):
					 
						$the_query->the_post(); 
						$the_id = get_the_ID();
						
						$temp_class = "";
						if($i == 1) $temp_class = $post_class." first"; else $temp_class = $post_class;
						if($i == $columns) $i = 1; else $i = $i + 1;

						$sort = " ";
						if( array_key_exists("filter",$tpl_default_settings) ):
							$item_categories = get_the_terms( $the_id, 'dt_portfolio_entries' );
							if(is_object($item_categories) || is_array($item_categories)):
								foreach ($item_categories as $category):
									$sort .= $category->slug.'-sort ';
								endforeach;
							endif;
						endif;

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
	                    }
						
						$c = $temp_class.$sort;?>
                        <div id="dt_portfolios-<?php echo esc_attr($the_id);?>" class="<?php echo esc_attr($c);?>">
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
					endwhile;?>
                </div><?php
			endif;?>
		<!-- Portfolio Template Ends Here -->

    	<div class="pagination">
			<?php echo dttheme_pagination( "", $the_query->max_num_pages, $the_query );?>
		</div>
		<?php wp_reset_query($the_query); ;?>        
	</div><!-- ** Primary Section Ends ** -->
    

	<!-- ** Secondary Section ** -->
	<?php if( $show_sidebar ):?>
		<div id="secondary" class="<?php echo esc_attr($sidebar_class);?>">
			<?php get_sidebar();?>
		</div>
	<?php endif;?>
	<!-- ** Secondary Section Ends ** -->
<?php 
	#Page Top Code Section
	$dttheme_integration = $dttheme_options['integration'];
	if(isset($dttheme_integration['enable-single-page-bottom-code'])):
		echo stripslashes($dttheme_integration['single-page-bottom-code']);
	endif;
	get_footer();?>