<?php  /*Template Name: Full Width Template*/
get_header();

	#Page Top Code Section
	$dttheme_options = get_option(IAMD_THEME_SETTINGS);
	$dttheme_integration = $dttheme_options['integration'];
	if(isset($dttheme_integration['enable-single-page-top-code'])):
		echo stripslashes($dttheme_integration['single-page-top-code']);
	endif;?>

	<!-- ** Primary Section ** -->
	<div id="primary" class="content-full-width">
		<?php if( have_posts() ):
				while( have_posts() ):
					the_post();
					get_template_part('framework/loops/content', 'page');
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