<?php get_header();
	#Page Top Code Section
	$dttheme_options = get_option(IAMD_THEME_SETTINGS);
	$dttheme_integration = $dttheme_options['integration'];
	if(isset($dttheme_integration['enable-single-post-top-code'])):
		echo stripslashes($dttheme_integration['single-post-top-code']);
	endif;

	$tpl_default_settings = get_post_meta( $post->ID, '_tpl_default_settings', TRUE );
	$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();

	$page_layout = array_key_exists("layout",$tpl_default_settings) ? $tpl_default_settings['layout'] : "content-full-width";
	$show_sidebar = false;
	$sidebar_class= "";

	# Global Post Layout
	if( !is_null( $GLOBALS['enable_global_post_layout'] ) ) {
		$page_layout = $GLOBALS['global_post_layout'];
	}
	# Global Post Layout

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
		<?php if( have_posts() ):
				while( have_posts() ):
					the_post();
					get_template_part('framework/loops/content', 'single');
				endwhile;
		endif;?>
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
	if(isset($dttheme_integration['enable-single-post-bottom-code'])):
		echo stripslashes($dttheme_integration['single-post-bottom-code']);
	endif;
	
	get_footer();?>