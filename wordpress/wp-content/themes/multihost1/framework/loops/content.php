<article id="post-<?php the_ID();?>" <?php post_class(array('blog-entry','blog-single-entry'));?>><?php

	$post_meta = get_post_meta( get_the_id(), '_dt_post_settings', TRUE );
	$post_meta = is_array( $post_meta ) ? $post_meta  : array();
	$format = get_post_format(  get_the_id() );

	$custom_class = "";

	# Post Thumbnail
		if( $format == "image" || empty($format) ) :
			if( has_post_thumbnail() ) :?>
				<div class="entry-thumb">
					<a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>">
						<?php the_post_thumbnail("full");?>
					</a>
				</div><?php
			else:
				$custom_class = "has-no-post-thumbnail";
			endif;
		elseif( $format === "gallery" ) :
			if( array_key_exists("items", $post_meta) ) :
				$alt = $post_meta['items_name'];

				echo '<div class="entry-thumb">';
				echo '	<ul class="entry-gallery-post-slider">';
							foreach ( $post_meta['items'] as $item ) {
								echo "<li><img src='". esc_url($item)."' alt='".esc_attr($alt)."'/></li>";
							}
				echo '	</ul>';
				echo '</div>';
			elseif( has_post_thumbnail() ):?>
				<div class="entry-thumb">
					<a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>">
						<?php the_post_thumbnail("full");?>
					</a>
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
					<a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>">
						<?php the_post_thumbnail("full");?>
					</a>
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
					<a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>">
						<?php the_post_thumbnail("full");?>
					</a>
				</div><?php
			else:
				$custom_class = "has-no-post-thumbnail";
			endif;
		else:
			if( has_post_thumbnail() ) :?>
				<div class="entry-thumb">
					<a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>">
						<?php the_post_thumbnail("full");?>
					</a>
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

		<div class="entry-body"><?php echo dttheme_excerpt(50);?></div>

		<div class="entry-meta">
			<div class="entry-format"><a class="ico-format" href="#"></a></div>
			<ul>
				<li>
					<a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>">
						<i class="fa fa-user"></i> <?php echo get_the_author_meta('display_name'); ?>
					</a>
				</li>
				<li>
					<i class="fa fa-clock-o"></i><?php echo  get_the_date('M d Y');?>
				</li>
				<li><?php comments_popup_link(
						__('<i class="fa fa-comments"> </i> 0','dt_themes'),
						__('<i class="fa fa-comments"> </i> 1','dt_themes'),
						__('<i class="fa fa-comments"> </i> %','dt_themes'),
						"comments ribbon-left",
						__('<i class="fa fa-comments-o"> </i>','dt_themes'));?>
				</li>
				<li>
					<i class='fa fa-folder-open'> </i> <?php the_category(', '); ?>
				</li>
				<?php the_tags("<li> <i class='fa fa-thumb-tack'></i> ",",","</li>");?>				
			</ul>
		</div>
	</div>
</article>