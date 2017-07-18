<?php get_header();
	#Page Top Code Section
	$dttheme_options = get_option(IAMD_THEME_SETTINGS);
	$dttheme_integration = $dttheme_options['integration'];    
    
	
	if(isset($dttheme_integration['enable-single-page-top-code'])) :
        echo stripslashes( $dttheme_integration['single-page-top-code'] );
    endif;
	
	
	$pageid = get_option('page_for_posts');
	if($pageid > 0) {
		$tpl_default_settings = get_post_meta( $pageid, '_tpl_default_settings', TRUE );
		$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();
		$page_layout  = array_key_exists( "layout", $tpl_default_settings ) ? $tpl_default_settings['layout'] : "content-full-width";
	} else {
		$page_layout = dttheme_option('specialty','author-archives-layout');
		$page_layout = !empty($page_layout) ? $page_layout : "content-full-width";
	}

	$show_sidebar = false;
	$sidebar_class = "";

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
		<?php $post_layout  = dttheme_option( 'specialty', 'author-archives-post-layout');

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
			}?>

			<!-- *** tpl-blog-holder *** -->
			<div class="tpl-blog-holder apply-isotope"><?php
				if ( have_posts() ):
					$i = 1;
					while( have_posts() ):
						the_post();

						$temp_class = "";
						if($i == 1) $temp_class = $post_class." first"; else $temp_class = $post_class;
						if($i == $columns) $i = 1; else $i = $i + 1;

						echo '<div class="'.esc_attr($temp_class).'">';
							get_template_part( 'framework/loops/content' );
						echo "</div>";
					endwhile;
				endif;?>
			</div><!-- *** tpl-blog-holder *** -->

			<div class="pagination">
	            <?php echo dttheme_pagination("","","");?>
			</div>
	</div><!-- ** Primary Section Ends ** -->

	<?php if( $show_sidebar ) : ?>
		<!-- ** Secondary Section ** -->
		<div id="secondary">
			<?php get_sidebar();?>
		</div><!-- ** Secondary Section Ends ** -->
	<?php endif;?>	
<?php
	#Page Top Code Section
	$dttheme_integration = $dttheme_options['integration'];
	if(isset($dttheme_integration['enable-single-page-bottom-code'])) :
        echo stripslashes( $dttheme_integration['single-page-bottom-code'] );
    endif;
	
	get_footer();?>