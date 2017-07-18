<?php $tpl_default_settings = get_post_meta( $post->ID, '_dt_post_settings', TRUE );
	$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();

	$format = get_post_format(  $post->ID );
	$hide_date_meta = isset( $tpl_default_settings['disable-date-info'] ) ? " hidden " : "";
	$hide_comment_meta = isset( $tpl_default_settings['disable-comment-info'] ) ? " hidden " : " comments ";
	$hide_author_meta = isset( $tpl_default_settings['disable-author-info'] ) ? " hidden " : "";
	$hide_category_meta = isset( $tpl_default_settings['disable-category-info'] ) ? " hidden " : "";
	$hide_tag_meta = isset( $tpl_default_settings['disable-tag-info'] ) ? " hidden " : "tags";?>

<article id="post-<?php the_ID();?>" <?php post_class( array('blog-entry','single'));?>><?php

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
		if( array_key_exists("items", $tpl_default_settings) ) :
			$alt = $tpl_default_settings['items_name'];
			echo '<div class="entry-thumb">';
			echo '<ul class="entry-gallery-post-slider">';
					foreach ( $tpl_default_settings['items'] as $item ) {
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
		if( array_key_exists('oembed-url', $tpl_default_settings) || array_key_exists('self-hosted-url', $tpl_default_settings) ) :
			echo '<div class="entry-thumb"><div class="dt-video-wrap">';
			if( array_key_exists('oembed-url', $tpl_default_settings) ) :
				echo wp_oembed_get($tpl_default_settings['oembed-url']);
			elseif( array_key_exists('self-hosted-url', $tpl_default_settings) ) :
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
		if( array_key_exists('oembed-url', $tpl_default_settings) || array_key_exists('self-hosted-url', $tpl_default_settings) ) :
			echo '<div class="entry-thumb">';
					if( array_key_exists('oembed-url', $tpl_default_settings) ) :
						echo wp_oembed_get($tpl_default_settings['oembed-url']);
					elseif( array_key_exists('self-hosted-url', $tpl_default_settings) ) :
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

	<div class="dt-sc-hr-invisible-small"></div>
	<div class="dt-sc-clear"></div>

	<div class="entry-title">
		<?php if(is_sticky()):?>
				<div class="featured-post">
					<span class="fa fa-trophy"></span>
					<?php _e('Featured','dt_themes');?>
				</div>
		<?php endif;?>

		<h2><a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( '%s'), the_title_attribute( 'echo=0' ));?>"><?php the_title(); ?></a></h2>
	</div>

	<div class="entry-meta">
		<div class="entry-format"><a href="#" class="ico-format"></a></div>
		<ul>
			<li class="<?php echo esc_attr($hide_author_meta);?>">
				<a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>">
					<i class="fa fa-user"></i>
					<?php echo get_the_author_meta('display_name'); ?>
				</a>
			</li>

			<li class="<?php echo esc_attr($hide_date_meta);?>">
				<i class="fa fa-clock-o"></i>
				<?php echo  get_the_date('M d Y')?>
			</li>

			<li class="<?php echo esc_attr($hide_comment_meta);?>"><?php
				comments_popup_link(
					__('<i class="fa fa-comments"> </i> 0','dt_themes'),
					__('<i class="fa fa-comments"> </i> 1','dt_themes'),
					__('<i class="fa fa-comments"> </i> %','dt_themes'),
					$hide_comment_meta,
					__('<i class="fa fa-comments-o"> </i>','dt_themes')
				);?>
			</li>

			<li class="<?php echo esc_attr($hide_category_meta);?>">
				<i class='fa fa-folder-open'> </i>
				<?php the_category(', '); ?>
			</li>

			<?php the_tags("<li class='{$hide_tag_meta}'> <i class='fa fa-thumb-tack'></i> ",",","</li>");?>
		</ul>
	</div>

	<div class="entry-body">
		<div class="entry-details">
			<?php the_content(); ?>
			<?php wp_link_pages( array(
					'before'=>'<div class="page-link">',
					'after'=>'</div>',
					'link_before'=>'<span>',
					'link_after'=>'</span>',
					'next_or_number'=>'number',
					'pagelink' => '%',
					'echo' => 1 ) );?>
			<div class="social-bookmark">
				<?php show_fblike('post'); ?>
				<?php show_googleplus('post'); ?>
				<?php show_twitter('post'); ?>
				<?php show_stumbleupon('post'); ?>
				<?php show_linkedin('post'); ?>
				<?php show_delicious('post'); ?>
				<?php show_pintrest('post'); ?>
				<?php show_digg('post'); ?>
			</div>
			<div class="social-share">
				<?php dttheme_social_bookmarks('sb-post'); ?>
			</div>
			<?php edit_post_link( __( ' Edit ','dt_themes' ) ); ?>
		</div>
	</div>
</article><?php
$dttheme_options = get_option(IAMD_THEME_SETTINGS);
$dttheme_general = $dttheme_options['general'];
$globally_disable_post_comment =  array_key_exists('global-post-comment',$dttheme_general) ? true : false;
	if( (!$globally_disable_post_comment) && (! isset($tpl_default_settings['disable-comment'])) ) :?>

		<div class="dt-sc-hr"></div>
		<div class="dt-sc-clear"></div>
		<!-- ** Comment Entries ** -->
		<section class="commententries">
			<?php  comments_template('', true); ?>
		</section>	
		<!-- ** Comment Entries End ** -->
<?php endif;?>