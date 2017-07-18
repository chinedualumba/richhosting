<?php /* Template Name: One Page Template */
get_header();
	#Page Top Code Section
	$dttheme_options = get_option(IAMD_THEME_SETTINGS);
	$dttheme_integration = $dttheme_options['integration'];
	if(isset($dttheme_integration['enable-single-page-top-code'])):
		echo stripslashes($dttheme_integration['single-page-top-code']);
	endif;?>

	<!-- ** Primary Section ** -->
	<div id="primary" class="content-full-width"><?php
		$section_name_lp = str_replace(' ', '', trim($post->post_title));
		$section_name_lp = strtolower($section_name_lp);?>

		<section id="<?php echo esc_attr( $section_name_lp );?>" class="content"><?php
			global $post;
			dttheme_slider_section($post->ID);?>

			<!-- **Content Main** -->
			<div class="content-main"><?php
				if( have_posts() ):
					while( have_posts() ):
						the_post();
							the_content();
					endwhile;
				endif;
			?></div><!-- **Content Main Ends** -->
		</section><?php

			$sections = dttheme_onepage_sections();

			#Begin Section Loop
			$sections_args = array(
				'posts_per_page' => -1,
				'post__in' => (array) $sections,
				'orderby' => 'post__in',
				'post_type'=>array('page')
			);

			$sections_query = new WP_Query($sections_args);

			if( $sections_query->have_posts() ):
				 while( $sections_query->have_posts() ):
				 	$sections_query->the_post();
				 	$section_name = str_replace(' ', '', trim($post->post_title));
				 	$section_name = strtolower( $section_name );?>
				 		<section id="<?php echo esc_attr( $section_name );?>" class="content">
				 			<!-- **Content Main** -->
				 			<div class="content-main"><?php
				 				the_content();?>
				 			</div><!-- **Content Main Ends** -->				 			
				 		</section><?php
				 endwhile;
			endif;?>
	</div><!-- ** Primary Section Ends ** -->

<?php 
	#Page Top Code Section
	$dttheme_integration = $dttheme_options['integration'];
	if(isset($dttheme_integration['enable-single-page-bottom-code'])):
		echo stripslashes($dttheme_integration['single-page-bottom-code']);
	endif;
	get_footer();?>