<?php /*Template Name: Feature Template*/
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

		<div class="column dt-sc-one-third first">
			<div class="side-nav-container">
		 		<ul class="side-nav"><?php
		 			if( $post->post_parent ):
		 				$args = array('child_of' => $post->post_parent,'title_li' => '','sort_order'=> 'ASC','sort_column'	=> 'menu_order');
		 			else:
		 				$args = array('child_of' => $post->ID,'title_li' => '','sort_order'=> 'ASC','sort_column'	=> 'menu_order');
		 			endif;

		 			$pages = get_pages( $args );
		 			$ids = array();
		 			$page_id = $post->ID;

		 			foreach($pages as $value){
		 				$ids[] = $value->ID;
		 			}

		 			foreach( $ids as $id ) {
		 				$title = get_the_title($id);
		 				$permalink = get_permalink( $id );

		 				$current = ( $id ===  $page_id) ? "current_page_item" : "";
		 				echo "<li class='".esc_attr( $current )."'>";
		 				echo "<a href='".esc_attr( $permalink )."' title='".esc_attr( $title )."'>".esc_html( $title )."</a>";
		 				echo "</li>";
		 			}?>
		 		</ul>
		 	</div>
		</div>

		<div class="column dt-sc-two-third">
			<div class="side-navigation-content"><?php 
			if( have_posts() ):
				while( have_posts() ):
					the_post();
					get_template_part( 'framework/loops/content', 'page' );
				endwhile;
			endif;?>
			</div>
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