<?php /*Template Name: Blog Template*/
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

		<!-- *** tpl-blog-holder *** -->
		<div class="tpl-blog-holder apply-isotope">

		<!-- Blog Template Loop Start -->
		<?php $post_layout = isset( $tpl_default_settings['blog-post-layout'] ) ? $tpl_default_settings['blog-post-layout'] : "one-half-column";
		$post_per_page = isset($tpl_default_settings['blog-post-per-page']) ? $tpl_default_settings['blog-post-per-page'] : -1;
		$categories = isset($tpl_default_settings['blog-post-exclude-categories']) ? array_filter($tpl_default_settings['blog-post-exclude-categories']) : NULL;
		$columns = "";

		$format_info = isset( $tpl_default_settings['disable-format-info']) ? " hidden " : "entry_format ribbon-left";
		$hide_date_meta = isset( $tpl_default_settings['disable-date-info'] ) ? " hidden " : "";
		$hide_comment_meta = isset( $tpl_default_settings['disable-comment-info'] ) ? " hidden " : " comments ribbon-left ";
		$hide_author_meta = isset( $tpl_default_settings['disable-author-info'] ) ? " hidden " : "";
		$hide_category_meta = isset( $tpl_default_settings['disable-category-info'] ) ? " hidden " : "";
		$hide_tag_meta = isset( $tpl_default_settings['disable-tag-info'] ) ? " hidden " : "tags";

		switch( $post_layout ){

			case 'one-column':
				$post_class = "column dt-sc-one-column";
				$columns = 1;
			break;

			case 'one-half-column':
				$post_class = "column dt-sc-one-half";
				$columns = 2;
			break;

			case 'one-third-column':
				$post_class = "column dt-sc-one-third";
				$columns = 3;
			break;

			case 'post-thumb':
				$post_class = "column dt-sc-one-column blog-thumb";
				$columns = 1;
			break;
		}

		# Setting paged variable
		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}

		# Setting args
		if ( empty( $categories ) ):
			$args = array( 'paged'=>$paged, 'posts_per_page'=>$post_per_page, 'post_type'=> 'post', 'ignore_sticky_posts'=> 1 );
		else:
			$exclude_cats = array_unique( $categories );
			$args = array( 'post_type'=>'post', 'paged'=>$paged, 'posts_per_page'=>$post_per_page, 'category__not_in'=>$exclude_cats , 'ignore_sticky_posts'=> 1);
		endif;
		
		
		$the_query = new WP_Query($args);
		
		if( $the_query->have_posts() ):
			$i = 1;
			
			while( $the_query->have_posts() ):
				$the_query->the_post();
				
				$temp_class = "";
				if($i == 1) $temp_class = $post_class." first"; else $temp_class = $post_class;
				if($i == $columns) $i = 1; else $i = $i + 1;
				
				$format = get_post_format(  get_the_id() );
				$post_meta = get_post_meta(get_the_id() ,'_dt_post_settings',TRUE);
				$post_meta = is_array($post_meta) ? $post_meta : array();

				$custom_class = "";?>
				<div class="<?php echo esc_attr($temp_class);?>">
                	<article id="post-<?php the_ID();?>" <?php post_class('blog-entry');?>><?php
						# Post Thumbnail
						if( $format == "image" || empty($format) ) :
							if( has_post_thumbnail() ) :?>
                            	<div class="entry-thumb">
                                	<a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>"><?php the_post_thumbnail("full");?></a>
                                </div><?php
							else:
								$custom_class = "has-no-post-thumbnail";
							endif;
						elseif( $format === "gallery" ) :
							if( array_key_exists("items", $post_meta) ) :
								$alt = $post_meta['items_name'];
								echo '<div class="entry-thumb">';
								echo '<ul class="entry-gallery-post-slider">';
										foreach ( $post_meta['items'] as $item ) {
											echo "<li><img src='". esc_url($item)."' alt='".esc_attr($alt)."'/></li>";
										}
								echo '</ul>';
								echo '</div>';
							elseif( has_post_thumbnail() ):?>
								<div class="entry-thumb">
									<a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>"><?php the_post_thumbnail("full");?></a>
								</div><?php
							else:
								$custom_class = "has-no-post-thumbnail";
							endif;
						elseif( $format === "video" ) :
							if( array_key_exists('oembed-url', $post_meta) || array_key_exists('self-hosted-url', $post_meta) ) :
								echo '<div class="entry-thumb"><div class="dt-video-wrap">';
								if( array_key_exists('oembed-url', $post_meta) ) :
									echo wp_oembed_get($post_meta['oembed-url']);
								elseif( array_key_exists('self-hosted-url', $post_meta) ) :
									echo wp_video_shortcode( array('src' => $post_meta['self-hosted-url']) );
								endif;
								echo '</div></div>';
							elseif( has_post_thumbnail() ):?>
								<div class="entry-thumb">
									<a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>"><?php the_post_thumbnail("full");?></a>
								</div><?php
							else:
								$custom_class = "has-no-post-thumbnail";
							endif;								
						elseif( $format === "audio" ) :
							if( array_key_exists('oembed-url', $post_meta) || array_key_exists('self-hosted-url', $post_meta) ) :
								echo '<div class="entry-thumb">';
										if( array_key_exists('oembed-url', $post_meta) ) :
											echo wp_oembed_get($post_meta['oembed-url']);
										elseif( array_key_exists('self-hosted-url', $post_meta) ) :
											$custom_class = "self-hosted-audio";
											echo wp_audio_shortcode( array('src' => $post_meta['self-hosted-url']) );
										endif;
								echo '</div>';
							elseif( has_post_thumbnail() ):?>
								<div class="entry-thumb">
									<a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>"><?php the_post_thumbnail("full");?></a>
								</div><?php
							else:
								$custom_class = "has-no-post-thumbnail";
							endif;								
						else:
							if( has_post_thumbnail() ) :?>
								<div class="entry-thumb">
									<a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>"><?php the_post_thumbnail("full");?></a>
								</div><?php
							else:
								$custom_class = "has-no-post-thumbnail";
							endif;	
						endif; 
						# Post Thumbnail?>
                        <div class="entry-details <?php echo esc_attr($custom_class);?>"><?php 
							if(is_sticky()): ?>
                            	<div class="featured-post"> <span class="fa fa-trophy"> </span> <?php _e('Featured','dt_themes');?> </div><?php 
							endif;?>

							<div class="entry-title">
								<h3><a href="<?php the_permalink();?>" title="<?php printf( esc_attr__('%s'), the_title_attribute('echo=0'));?>"><?php the_title();?></a></h3>
							</div>

							<?php if( array_key_exists('blog-post-excerpt',$tpl_default_settings) && is_numeric($tpl_default_settings['blog-post-excerpt-length']) ):?>
									<div class="entry-body"><?php echo dttheme_excerpt($tpl_default_settings['blog-post-excerpt-length']);?></div>
							<?php endif;?>

							<div class="entry-meta">
								<div class="entry-format"><a class="ico-format" href="#"></a></div>
								<ul>
									<li class="<?php echo esc_attr($hide_author_meta);?>"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>">
										<i class="fa fa-user"></i> <?php echo get_the_author_meta('display_name'); ?></a></li>
									<li class="<?php echo esc_attr($hide_date_meta);?>">
										<i class="fa fa-clock-o"></i><?php echo  get_the_date('M d Y');?></li>
									<li class="<?php echo esc_attr($hide_comment_meta);?>"><?php 
										comments_popup_link( 
											__('<i class="fa fa-comments"> </i> 0','dt_themes'),
											__('<i class="fa fa-comments"> </i> 1','dt_themes'),
											__('<i class="fa fa-comments"> </i> %','dt_themes'),
											$hide_comment_meta,
											__('<i class="fa fa-comments-o"> </i>','dt_themes'));?></li>
									<li class="<?php echo esc_attr($hide_category_meta);?>"><i class='fa fa-folder-open'> </i> <?php the_category(', '); ?></li>
									<?php the_tags("<li class='{$hide_tag_meta}'> <i class='fa fa-thumb-tack'></i> ",",","</li>");?>
								</ul>
							</div>
                        </div>
                    </article>
				</div><?php
			endwhile;
				
		endif;?>
		<!-- Blog Template Loop End -->
		</div><!-- *** tpl-blog-holder *** -->

		<div class="pagination">
			<?php echo dttheme_pagination( "", $the_query->max_num_pages, $the_query );?>
		</div>
		<?php wp_reset_query($the_query); ;?>
	</div><!-- ** Primary Section Ends ** -->

	<!-- ** Secondary Section ** -->
	<?php if( $show_sidebar ) : ?>
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