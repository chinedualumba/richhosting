<?php get_header();

	#Page Top Code Section
	$dttheme_options = get_option(IAMD_THEME_SETTINGS);
	$dttheme_integration = $dttheme_options['integration'];
	if(isset($dttheme_integration['enable-single-page-top-code'])) :
		echo stripslashes($dttheme_integration['single-page-top-code']);
	endif;

	$page_layout  = dttheme_option( 'specialty', 'tag-archives-layout' );
	$page_layout  = !empty( $page_layout ) ? $page_layout : "content-full-width";
	$show_sidebar = false;
	$sidebar_class= "";

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
	<div id="primary" class="<?php echo esc_attr($page_layout);?>">
		<!-- *** tpl-blog-holder *** -->
		<div class="tpl-blog-holder apply-isotope"><?php

			$no_post = false;
			$columns = "";
			$post_layout = dttheme_option( 'specialty', 'tag-archives-post-layout' );
			$post_layout  = !empty( $post_layout ) ? $post_layout : "one-column";

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

			if( have_posts() ) :

				$i = 1;

				while( have_posts() ):

					the_post();

					$temp_class = "";
					if($i == 1) $temp_class = $post_class." first"; else $temp_class = $post_class;
					if($i == $columns) $i = 1; else $i = $i + 1;

					$format = get_post_format(  get_the_id() );
					$post_meta = get_post_meta(get_the_id() ,'_dt_post_settings',TRUE);
					$post_meta = is_array($post_meta) ? $post_meta : array();
					$custom_class = "";?>
					<div class="<?php echo esc_attr($temp_class);?>">
						<article id="post-<?php the_ID(); ?>" <?php post_class('blog-entry');?>><?php
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
							<div class="entry-details <?php echo esc_attr($custom_class);?>">
								<?php if(is_sticky()): ?>
									<div class="featured-post"> <span class="fa fa-trophy"> </span> <?php _e('Featured','dt_themes');?> </div>
								<?php endif;?>

								<div class="entry-title">
									<h3><a href="<?php the_permalink();?>" title="<?php printf( esc_attr__('%s'), the_title_attribute('echo=0'));?>"><?php the_title();?></a></h3>
								</div>

								<div class="entry-body"><?php the_excerpt();?></div>

								<div class="entry-meta">
									<div class="entry-format"><a class="ico-format" href="#"></a></div>
									<ul>
										<li>
											<a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>">
												<i class="fa fa-user"></i> <?php echo get_the_author_meta('display_name'); ?></a>
										</li>

										<li><i class="fa fa-clock-o"></i><?php echo  get_the_date('M d Y')?></li>

										<li><?php
											comments_popup_link( 
												__('<i class="fa fa-comments"> </i> 0','dt_themes'),
												__('<i class="fa fa-comments"> </i> 1','dt_themes'),
												__('<i class="fa fa-comments"> </i> %','dt_themes'),
												'',
												__('<i class="fa fa-comments-o"> </i>','dt_themes'));?></li>

										<li>
											<i class='fa fa-folder-open'> </i> <?php the_category(', '); ?></li>

										<?php the_tags("<li> <i class='fa fa-thumb-tack'></i> ",",","</li>");?>
									</ul>
								</div>
							</div>
						</article>
					</div><?php
				endwhile;
			else:
				$no_post = true;
			endif;?>
		</div><!-- *** tpl-blog-holder *** -->

		<?php if( $no_post ): ?>
				<div class="dt-sc-hr-invisible"> </div>
				<h1><?php _e( 'Nothing Found','dt_themes'); ?></h1>
				<h3><?php _e( 'Apologies, but no results were found for the requested archive.', 'dt_themes'); ?></h3>
				<?php get_search_form();?>
		<?php endif;?>

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