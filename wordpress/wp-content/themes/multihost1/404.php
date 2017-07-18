<?php get_header();
	$page_layout  = dttheme_option( 'specialty', '404-layout' );
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
		<div class="error-info">
			<?php $content = dttheme_option('specialty','404-message');
				  $content = stripslashes($content);
				  $content = do_shortcode($content);
				  echo !empty( $content ) ? $content : '';?>
		</div>	
	</div><!-- ** Primary Section Ends ** -->

	<!-- ** Secondary Section ** -->
	<?php if( $show_sidebar ) : ?>
		<div id="secondary" class="<?php echo esc_attr($sidebar_class);?>">
		    <?php get_sidebar();?>
		</div><!-- ** Secondary Section Ends ** -->
	<?php endif;?>
<?php get_footer();?>