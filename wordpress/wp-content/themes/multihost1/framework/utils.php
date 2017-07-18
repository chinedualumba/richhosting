<?php
function dt_theme_bbpress_title(){
	global $bp;
	$doctitle = "";
	$separator = dttheme_option ( 'seo', 'title-delimiter' );
	$id = 0;

	if ( !empty( $bp->displayed_user->fullname ) ) {
		
		$blog_title = preg_replace ( "~(?:\[/?)[^/\]]+/?\]~s", '', get_option ( 'blogname' ));
		$title =  bp_current_component() === "profile" ? __("Profile","dt_themes") : __("Member","dt_themes");
		$subtitle = strip_tags( $bp->displayed_user->fullname );
		$doctitle = $blog_title.' '.$separator.' '.$title.' '.$separator.' '.$subtitle.' '.$separator;

	} elseif( bp_is_members_component() ) {
		$id = $bp->pages->members->id;
	}elseif( bp_is_activity_component() ){
		$id = $bp->pages->activity->id;
	}elseif( bp_current_component() === "groups" ) {
		$id = $bp->pages->groups->id;
	}elseif( bp_current_component() === "register" ) {
		$id = $bp->pages->register->id;
	}elseif( bp_current_component() === "activate" ) {
		$id = $bp->pages->activate->id;
	}
	if( $id > 0 ){
		global $post;
		$args = array (
			"blog_title" => preg_replace ( "~(?:\[/?)[^/\]]+/?\]~s", '', get_option ( 'blogname' ) ),
			"blog_description" => get_bloginfo ( 'description' ),
			"post_title" => ! empty ( $post ) ? $post->post_title : NULL,
			"post_author_nicename" => ! empty ( $nickname ) ? ucwords ( $nickname ) : NULL,
			"post_author_firstname" => ! empty ( $first_name ) ? ucwords ( $first_name ) : NULL,
			"post_author_lastname" => ! empty ( $last_name ) ? ucwords ( $last_name ) : NULL,
			"post_author_dsiplay" => ! empty ( $display_name ) ? ucwords ( $display_name ) : NULL );
		$args = array_filter ( $args );

		$doctitle = get_post_meta ( $id, '_seo_title', true );
		if (empty ( $doctitle )) :
			$options = is_array ( dttheme_option ( 'seo', 'page-title-format' ) ) ? dttheme_option ( 'seo', 'page-title-format' ) : array ();
			foreach ( $options as $option ) :
				if (array_key_exists ( $option, $args ))
					$doctitle .= $args [$option] . ' ' . $separator . ' ';
			endforeach;
		endif;

	}	
	
	return $doctitle;
}


/** dttheme_public_title()
 * Objective:
 *		Outputs the value for <title></title> in front end.
 *
 **/
function dttheme_public_title() {
	global $post;
	$doctitle = '';
	$separator = dttheme_option ( 'seo', 'title-delimiter' );
	$split = true;
	
	if (! empty ( $post )) :
		$author_meta = get_the_author_meta ( $post->post_author );
		$nickname = get_the_author_meta ( 'nickname', $post->post_author );
		$first_name = get_the_author_meta ( 'first_name', $post->post_author );
		$last_name = get_the_author_meta ( 'last_name', $post->post_author );
		$display_name = get_the_author_meta ( 'display_name', $post->post_author );
	endif;
	

	$args = array (
			"blog_title" => preg_replace ( "~(?:\[/?)[^/\]]+/?\]~s", '', get_option ( 'blogname' ) ),
			"blog_description" => get_bloginfo ( 'description' ),
			"post_title" => ! empty ( $post ) ? $post->post_title : NULL,
			"post_author_nicename" => ! empty ( $nickname ) ? ucwords ( $nickname ) : NULL,
			"post_author_firstname" => ! empty ( $first_name ) ? ucwords ( $first_name ) : NULL,
			"post_author_lastname" => ! empty ( $last_name ) ? ucwords ( $last_name ) : NULL,
			"post_author_dsiplay" => ! empty ( $display_name ) ? ucwords ( $display_name ) : NULL 
	);
	$args = array_filter ( $args );
	
	if (class_exists('BP_Core_user') && !bp_is_blog_page() ):
		$doctitle = dt_theme_bbpress_title();
	elseif ( function_exists( 'is_bbpress' ) && is_bbpress() ):
		$doctitle =  dt_theme_bbpress_title();
	elseif (is_home() || is_front_page()) :
		$doctitle = "";
		if ((get_option ( 'page_on_front' ) != 0) && (get_option ( 'page_on_front' ) == $post->ID))
		$doctitle = trim ( get_post_meta ( $post->ID, '_seo_title', true ) );
			
		$doctitle = ! empty ( $doctitle ) ? trim ( $doctitle ) : $args ["blog_title"];
		$doctitle =  array_key_exists("blog_description",$args ) ?  $doctitle.' '.$separator.' '.$args["blog_description"] : $doctitle;
		
		if( dttheme_option('onepage','seo-title') ):
			$doctitle = dttheme_option('onepage','seo-title');
		endif;
		
		$split = false;
	elseif (is_page()) :
		$doctitle = get_post_meta ( $post->ID, '_seo_title', true );
		if (empty ( $doctitle )) :
			$options = is_array ( dttheme_option ( 'seo', 'page-title-format' ) ) ? dttheme_option ( 'seo', 'page-title-format' ) : array ();
			foreach ( $options as $option ) :
				if (array_key_exists ( $option, $args ))
					$doctitle .= $args [$option] . ' ' . $separator . ' ';
			endforeach;
		endif;
	elseif (is_single()) :
		$doctitle = get_post_meta ( $post->ID, '_seo_title', true );
		if (empty ( $doctitle )) :
			$categories = get_the_category ();
			$c = '';
			foreach ( $categories as $category ) :
				$c .= $category->name . ' ' . $separator . ' ';
			endforeach;
			
			$c = substr ( trim ( $c ), "0", strlen ( trim ( $c ) ) - 1 );
			$args ["category_title"] = $c;
			
			$posttags = get_the_tags ();
			$ptags = '';
			if ($posttags) :
				foreach ( $posttags as $posttag ) :
					$ptags .= $posttag->name . $separator;
				endforeach;
				$ptags = substr ( trim ( $ptags ), "0", strlen ( trim ( $ptags ) ) - 1 );
				$args ["tag_title"] = $ptags;
			
			endif;
			$options = is_array ( dttheme_option ( 'seo', 'post-title-format' ) ) ? dttheme_option ( 'seo', 'post-title-format' ) : array ();
			foreach ( $options as $option ) :
				if (array_key_exists ( $option, $args )) :
					$doctitle .= $args [$option] . ' ' . $separator . ' ';
			    endif;
				
			endforeach;
		endif;
	elseif (is_category()) :
		$categories = get_the_category ();
		$args ["category_title"] = $categories [0]->name;
		$args ["category_desc"] = $categories [0]->description;
		
		$options = is_array ( dttheme_option ( 'seo', 'category-page-title-format' ) ) ? dttheme_option ( 'seo', 'category-page-title-format' ) : array ();
		foreach ( $options as $option ) :
			if (array_key_exists ( $option, $args ))
				$doctitle .= $args [$option] . ' ' . $separator . ' ';
		endforeach;
	elseif (is_tag()) :
		$args ["tag"] = single_tag_title('',FALSE);
		$options = is_array ( dttheme_option ( 'seo', 'tag-page-title-format' ) ) ? dttheme_option ( 'seo', 'tag-page-title-format' ) : array ();
		foreach ( $options as $option ) :
			if (array_key_exists ( $option, $args )) {
				$doctitle .= $args [$option] . ' ' . $separator . '  ';
			}
		endforeach;
	elseif (is_archive()) :
	
		if( is_author() ):
			$args["date"] = $args["post_author_dsiplay"];
		elseif( is_year() ):
			$args["date"] = get_the_time('Y');
		elseif( is_month() ):
			$args["date"] = get_the_time('F');
		elseif( is_day() || is_time() ):
			$args["date"] = get_the_time('jS (l)');
		endif;
		
		$options = is_array ( dttheme_option ( 'seo', 'archive-page-title-format' ) ) ? dttheme_option ( 'seo', 'archive-page-title-format' ) : array ();
		foreach ( $options as $option ) :
			if (array_key_exists ( $option, $args ))
				$doctitle .= $args[$option] . ' ' . $separator . ' ';
		endforeach;
		
	elseif (is_date()) :
	elseif (is_search()) :
		$args ["search"] = __ ( "Search results for", 'dt_themes' ) . ' "' . $_REQUEST ['s'] . '"'; // dding search text into the default args
		$options = is_array ( dttheme_option ( 'seo', 'search-page-title-format' ) ) ? dttheme_option ( 'seo', 'search-page-title-format' ) : array ();
		foreach ( $options as $option ) :
			if (array_key_exists ( $option, $args ))
				$doctitle .= $args [$option] . ' ' . $separator . ' ';
		endforeach;
		
	elseif (is_404()) :
		$options = is_array ( dttheme_option ( 'seo', '404-page-title-format' ) ) ? dttheme_option ( 'seo', '404-page-title-format' ) : array ();
		foreach ( $options as $option ) :
			if (array_key_exists ( $option, $args ))
				$doctitle .= $args [$option] . ' ' . $separator . ' ';
		endforeach;
		
		$doctitle = $doctitle . __ ( 'Page not found', 'dt_themes' );
		$split = false;	

	endif;	

	if ($split) :
		if (strrpos ( $doctitle, $separator )) :
			$doctitle = str_split ( $doctitle, strrpos ( $doctitle, $separator ) );
			$doctitle = $doctitle [0];
		endif;
	endif;
	return $doctitle;
}

/**
 * dttheme_canonical()
 * Objective:
 * Generate the Canonical url
 * This function called at register_public.php via dttheme_seo_meta();
 */
function dttheme_canonical() {
	$canonical = false;
	if (is_singular () || is_single ()) :
		$canonical = get_permalink ( get_queried_object () );
		
		// Fix paginated pages
		if (get_query_var ( 'paged' ) > 1) :
			global $wp_rewrite;
			if (! $wp_rewrite->using_permalinks ()) :
				$canonical = add_query_arg ( 'paged', get_query_var ( 'paged' ), $canonical );
			 else :
				$canonical = user_trailingslashit ( trailingslashit ( $canonical ) . 'page/' . get_query_var ( 'paged' ) );
			endif;
		
	endif;
	 else :
		if (is_front_page ()) :
			$canonical = home_url ( '/' );
		 elseif (is_home () && "page" == get_option ( 'show_on_front' )) :
			$canonical = get_permalink ( get_option ( 'page_for_posts' ) );
		 elseif (is_tax () || is_tag () || is_category ()) :
			$term = get_queried_object ();
			$canonical = get_term_link ( $term, $term->taxonomy );
		 elseif (function_exists ( 'get_post_type_archive_link' ) && is_post_type_archive ()) :
			$canonical = get_post_type_archive_link ( get_post_type () );
		 elseif (is_author ()) :
			$canonical = get_author_posts_url ( get_query_var ( 'author' ), get_query_var ( 'author_name' ) );
		 elseif (is_archive ()) :
			if (is_date ()) :
				if (is_day ()) :
					$canonical = get_day_link ( get_query_var ( 'year' ), get_query_var ( 'monthnum' ), get_query_var ( 'day' ) );
				 elseif (is_month ()) :
					$canonical = get_month_link ( get_query_var ( 'year' ), get_query_var ( 'monthnum' ) );
				 elseif (is_year ()) :
					$canonical = get_year_link ( get_query_var ( 'year' ) );
				endif;
			
			
					endif;
		endif;
		
		if ($canonical && get_query_var ( 'paged' ) > 1) :
			global $wp_rewrite;
			if (! $wp_rewrite->using_permalinks ())
				$canonical = add_query_arg ( 'paged', get_query_var ( 'paged' ), $canonical );
			else
				$canonical = user_trailingslashit ( trailingslashit ( $canonical ) . trailingslashit ( $wp_rewrite->pagination_base ) . get_query_var ( 'paged' ) );
		
		
		endif;
	endif;
	return $canonical;
}
// # --- **** dttheme_canonical() *** --- ###

/**
 * show_fblike()
 * Objective:
 * Outputs the facebook like button in post and page.
 */
function show_fblike($arg = 'post') {
	$fb = dttheme_option ( 'integration', "{$arg}-fb_like" );
	$output = "";
	if (! empty ( $fb )) :
		$layout = dttheme_option ( 'integration', "{$arg}-fb_like-layout" );
		$scheme = dttheme_option ( 'integration', "{$arg}-fb_like-color-scheme" );
		$output .= do_shortcode ( "[fblike layout='{$layout}' colorscheme='{$scheme}' /]" );
		echo !empty( $output ) ? $output : '';
	endif;
}
// # --- **** show_googleplus() *** --- ###
/**
 * show_googleplus()
 * Objective:
 * Outputs the facebook like button in post and page.
 */
function show_googleplus($arg = 'post') {
	$googleplus = dttheme_option ( 'integration', "{$arg}-googleplus" );
	$output = "";
	if (! empty ( $googleplus )) :
		$layout = dttheme_option ( 'integration', "{$arg}-googleplus-layout" );
		$lang = dttheme_option ( 'integration', "{$arg}-googleplus-lang" );
		$output .= do_shortcode ( "[googleplusone size='{$layout}' lang='{$lang}' /]" );
		echo !empty( $output ) ? $output : '';
	endif;
}
// # --- **** show_googleplus() *** --- ###

// # --- **** show_twitter() *** --- ###
/**
 * show_twitter()
 * Objective:
 * Outputs the Twitter like button in post and page.
 */
function show_twitter($arg = 'post') {
	$twitter = dttheme_option ( 'integration', "{$arg}-twitter" );
	$output = "";
	if (! empty ( $twitter )) :
		$layout = dttheme_option ( 'integration', "{$arg}-twitter-layout" );
		$lang = dttheme_option ( 'integration', "{$arg}-twitter-lang" );
		$username = dttheme_option ( 'integration', "{$arg}-twitter-username" );
		$output .= do_shortcode ( "[twitter layout='{$layout}' lang='{$lang}' username='{$username}' /]" );
		echo !empty( $output ) ? $output : '';
	endif;
}
// # --- **** show_twitter() *** --- ###

// # --- **** show_stumbleupon() *** --- ###
/**
 * show_stumbleupon()
 * Objective:
 * Outputs the Stumbleupon like button in post and page.
 */
function show_stumbleupon($arg = 'post') {
	$stumbleupon = dttheme_option ( 'integration', "{$arg}-stumbleupon" );
	$output = "";
	if (! empty ( $stumbleupon )) :
		$layout = dttheme_option ( 'integration', "{$arg}-stumbleupon-layout" );
		$output .= do_shortcode ( "[stumbleupon layout='{$layout}' /]" );
		echo !empty( $output ) ? $output : '';
	endif;
}
// # --- **** show_stumbleupon() *** --- ###

// # --- **** show_linkedin() *** --- ###
/**
 * show_linkedin()
 * Objective:
 * Outputs the LinkedIn like button in post and page.
 */
function show_linkedin($arg = 'post') {
	$linkedin = dttheme_option ( 'integration', "{$arg}-linkedin" );
	$output = "";
	if (! empty ( $linkedin )) :
		$layout = dttheme_option ( 'integration', "{$arg}-linkedin-layout" );
		$output .= do_shortcode ( "[linkedin layout='{$layout}' /]" );
		echo !empty( $output ) ? $output : '';
	endif;
}
// # --- **** show_linkedin() *** --- ###

// # --- **** show_delicious() *** --- ###
/**
 * show_delicious()
 * Objective:
 * Outputs the Delicious like button in post and page.
 */
function show_delicious($arg = 'post') {
	$delicious = dttheme_option ( 'integration', "{$arg}-delicious" );
	$output = "";
	if (! empty ( $delicious )) :
		$text = dttheme_option ( 'integration', "{$arg}-delicious-text" );
		$output .= do_shortcode ( "[delicious text='{$text}' /]" );
		echo !empty( $output ) ? $output : '';
	endif;
}
// # --- **** show_delicious() *** --- ###

// # --- **** show_pintrest() *** --- ###
/**
 * show_pintrest()
 * Objective:
 * Outputs the Pintrest like button in post and page.
 */
function show_pintrest($arg = 'post') {
	$delicious = dttheme_option ( 'integration', "{$arg}-pintrest" );
	$output = "";
	if (! empty ( $delicious )) :
		$layout = dttheme_option ( 'integration', "{$arg}-pintrest-layout" );
		$output .= do_shortcode ( "[pintrest layout='{$layout}' prompt='true' /]" );
		echo !empty( $output ) ? $output : '';		
	endif;
}
// # --- **** show_pintrest() *** --- ###

// # --- **** show_digg() *** --- ###
/**
 * show_digg()
 * Objective:
 * Outputs the Digg like button in post and page.
 */
function show_digg($arg = 'post') {
	$digg = dttheme_option ( 'integration', "{$arg}-digg" );
	$output = "";
	if (! empty ( $digg )) :
		$layout = dttheme_option ( 'integration', "{$arg}-digg-layout" );
		$output .= do_shortcode ( "[digg layout='{$layout}' /]" );
		
		echo !empty( $output ) ? $output : '';
	endif;
}
// # --- **** show_digg() *** --- ###

/**
 * dttheme_tweetbox_filter()
 * Objective:
 * Returns filtered tweets.
 * @args:
 * 1.text :	Tweets text to filter
 */
function dttheme_tweetbox_filter($text) {
	// Props to Allen Shaw & webmancers.com & Michael Voigt
	$text = preg_replace ( '/\b([a-zA-Z]+:\/\/[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i', "<a href=\"$1\" class=\"twitter-link\">$1</a>", $text );
	$text = preg_replace ( '/\b(?<!:\/\/)(www\.[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i', "<a href=\"http://$1\" class=\"twitter-link\">$1</a>", $text );
	$text = preg_replace ( "/\b([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})\b/i", "<a href=\"mailto://$1\" class=\"twitter-link\">$1</a>", $text );
	$text = preg_replace ( "/#(\w+)/", "<a class=\"twitter-link\" href=\"http://search.twitter.com/search?q=\\1\">#\\1</a>", $text );
	$text = preg_replace ( "/@(\w+)/", "<a class=\"twitter-link\" href=\"http://twitter.com/\\1\">@\\1</a>", $text );
	return $text;
}
// # --- **** dttheme_tweetbox_filter() *** --- ###

/**
 * dttheme_footer_widgetarea()
 * Objective:
 * 1.
 * To Generate Footer Widget Areas
 * Args: $count = No of widget areas
 */
function dttheme_footer_widgetarea($count) {
	$name = __ ( "Footer Column", 'dt_themes' );
	if ($count <= 4) :
		for($i = 1; $i <= $count; $i ++) :
			register_sidebar ( array (
					'name' => $name . "-{$i}",
					'id' => "footer-sidebar-{$i}",
					'description' => __("Appears in the footer section of the site.","dt_themes"),
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget' => '</aside>',
					'before_title' => '<h3 class="widgettitle">',
					'after_title' => '<span></span></h3>' 
			) );
		endfor
		;
	 elseif ($count == 5 || $count == 6) :
		$a = array (
				"1-4",
				"1-4",
				"1-2" 
		);
		$a = ($count == 5) ? $a : array_reverse ( $a );
		foreach ( $a as $k => $v ) :
			register_sidebar ( array (
					'name' => $name . "-{$v}",
					'id' => "footer-sidebar-{$k}-{$v}",
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget' => '</aside>',
					'before_title' => '<h3 class="widgettitle">',
					'after_title' => '<span></span></h3>' 
			) );
		endforeach
		;
	 elseif ($count == 7 || $count == 8) :
		$a = array (
				"1-4",
				"3-4" 
		);
		$a = ($count == 7) ? $a : array_reverse ( $a );
		foreach ( $a as $k => $v ) :
			register_sidebar ( array (
					'name' => $name . "-{$v}",
					'id' => "footer-sidebar-{$k}-{$v}",
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget' => '</aside>',
					'before_title' => '<h3 class="widgettitle">',
					'after_title' => '<span></span></h3>' 
			) );
		endforeach
		;
	 elseif ($count == 9 || $count == 10) :
		$a = array (
				"1-3",
				"2-3" 
		);
		$a = ($count == 9) ? $a : array_reverse ( $a );
		foreach ( $a as $k => $v ) :
			register_sidebar ( array (
					'name' => $name . "-{$v}",
					'id' => "footer-sidebar-{$k}-{$v}",
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget' => '</aside>',
					'before_title' => '<h3 class="widgettitle">',
					'after_title' => '<span></span></h3>' 
			) );
		endforeach
		;
	endif;
}
// # --- **** dttheme_footer_widgetarea() *** --- ###

// # --- **** dttheme_show_footer_widgetarea() *** --- ###
/**
 * dttheme_show_footer_widgetarea()
 * Objective:
 * Outputs the Footer section widget area.
 */
function dttheme_show_footer_widgetarea($count) {
	$classes = array (
			"1" => "dt-sc-full-width",
			"dt-sc-one-half",
			"dt-sc-one-third",
			"dt-sc-one-fourth",
			"1-2" => "dt-sc-one-half",
			"1-3" => "dt-sc-one-third",
			"1-4" => "dt-sc-one-fourth",
			"3-4" => "dt-sc-three-fourth",
			"2-3" => "dt-sc-two-third" 
	);
	if ($count <= 4) :
		for($i = 1; $i <= $count; $i ++) :
		
			$class  = 'column ';
			$class .= ($i == 1) ? ' first ':' ';
			$class .= $classes[$count];
			$sidebar = 'footer-sidebar-'.$i;
			
			echo "<div class='".esc_attr( $class )."'>";
			if( is_active_sidebar( $sidebar ) ) :
				dynamic_sidebar ( $sidebar );
			endif;
			echo "</div>";
		endfor;
	 elseif ($count == 5 || $count == 6) :
		$a = array (
				"1-4",
				"1-4",
				"1-2" 
		);
		$a = ($count == 5) ? $a : array_reverse ( $a );
		foreach ( $a as $k => $v ) :

			$class  = 'column ';
			$class .= ($k == 0) ? ' first ':' ';
			$class .= $classes[$v];
			$sidebar = 'footer-sidebar-'.$k.'-'.$v;
			
			echo "<div class='".esc_attr( $class )."'>";
			if( is_active_sidebar( $sidebar ) ) :
				dynamic_sidebar ( $sidebar );
			endif;
			echo "</div>";
		endforeach;
	 

	elseif ($count == 7 || $count == 8) :
		$a = array (
				"1-4",
				"3-4" 
		);
		
		$a = ($count == 7) ? $a : array_reverse ( $a );
		foreach ( $a as $k => $v ) :

			$class  = 'column ';
			$class .= ($k == 0) ? ' first ':' ';
			$class .= $classes[$v];
			$sidebar = 'footer-sidebar-'.$k.'-'.$v;

			echo "<div class='".esc_attr( $class )."'>";
			if( is_active_sidebar( $sidebar ) ) :
				dynamic_sidebar ( $sidebar );
			endif;
			echo "</div>";
		endforeach;
		
	 elseif ($count == 9 || $count == 10) :
		$a = array (
				"1-3",
				"2-3" 
		);
		$a = ($count == 9) ? $a : array_reverse ( $a );
		foreach ( $a as $k => $v ) :

			$class  = 'column ';
			$class .= ($k == 0) ? ' first ':' ';
			$class .= $classes[$v];
			$sidebar = 'footer-sidebar-'.$k.'-'.$v;

			echo "<div class='".esc_attr( $class )."'>";
			if( is_active_sidebar( $sidebar ) ) :
				dynamic_sidebar ( $sidebar );
			endif;
			echo "</div>";
		endforeach;
	endif;
}
// # --- **** dttheme_show_footer_widgetarea() *** --- ###

// # --- **** dttheme_is_plugin_active() *** --- ###
/**
 * dttheme_is_plugin_active()
 * Objective:
 * Check the plugin is activated
 */
function dttheme_is_plugin_active($plugin) {
	return in_array ( $plugin, ( array ) get_option ( 'active_plugins', array () ) );
}
// # --- **** dttheme_is_plugin_active() *** --- ###

// # --- **** dttheme_check_slider_revolution_responsive_wordpress_plugin() *** --- ###
/**
 * dttheme_check_slider_revolution_responsive_wordpress_plugin()
 * Objective:
 * Check the "Revolution Responsive WordPress Plugin" is activated
 */
function dttheme_check_slider_revolution_responsive_wordpress_plugin() {
	$sliders = false;
	if (dttheme_is_plugin_active ( 'revslider/revslider.php' )) :
		global $wpdb;
		// table_prefix = WP_ALLOW_MULTISITE ? $wpdb->base_prefix : $wpdb->prefix;
		$table_prefix = $wpdb->prefix;
		$table_name = $table_prefix . "revslider_sliders";

		if ($wpdb->get_var ( $wpdb->prepare("SHOW TABLES LIKE %s", $table_name) ) == $table_name) :
			
			$query = $wpdb->prepare("SELECT title,alias FROM $table_name", ARRAY_A);
			$resultset = $wpdb->get_results ( $query );
			
			foreach ( $resultset as $rs ) :
				$sliders [$rs->alias] = $rs->title;
			endforeach;
			return $sliders;
		 else :
			return $sliders;
		endif;
	 else :
		return $sliders;
	endif;
}
// # --- **** dttheme_is_plugin_active() *** --- ###

// # --- **** dttheme_social_bookmarks() *** --- ###
/**
 * dttheme_social_bookmarks()
 * Objective:
 * To show social shares
 */
function dttheme_social_bookmarks($arg = 'sb-post') {
	global $post;
	
	$title = $post->post_title;
	$url = get_permalink ( $post->ID );
	$excerpt = $post->post_excerpt;
	$data = "";
	
	$fb = dttheme_option ( 'integration', "{$arg}-fb_like" );
	$data .= ! empty ( $fb ) ? "<li class='facebook'><a class='fa fa-facebook' href='http://www.facebook.com/sharer.php?u=$url&amp;t=" . urlencode ( $title ) . "'></a></li>" : "";
	
	$delicious = dttheme_option ( 'integration', "{$arg}-delicious" );
	$data .= ! empty ( $delicious ) ? "<li class='facebook'><a class='fa fa-delicious' href='http://del.icio.us/post?url=$url&amp;title=" . urlencode ( $title ) . "'></a></li>" : "";
	
	$digg = dttheme_option ( 'integration', "{$arg}-digg" );
	$data .= ! empty ( $digg ) ? "<li class='digg'><a class='fa fa-digg' href='http://digg.com/submit?phase=2&amp;url=$url&amp;title=" . urlencode ( $title ) . "'></a></li>" : "";
	
	$stumbleupon = dttheme_option ( 'integration', "{$arg}-stumbleupon" );
	$data .= ! empty ( $stumbleupon ) ? "<li class='stumbleupon'><a class='fa fa-stumbleupon' href='http://www.stumbleupon.com/submit?url=$url&amp;title=" . urlencode ( $title ) . "'></a></li>" : "";
	
	$twitter = dttheme_option ( 'integration', "{$arg}-twitter" );
	$t_url = ! empty ( $twitter ) ? $url : '';
	$data .= ! empty ( $twitter ) ? "<li class='twitter'><a class='fa fa-twitter' href='http://twitter.com/home/?status=" . urlencode ( $title ) . ":$t_url'></a></li>" : "";
	
	$googleplus = dttheme_option ( 'integration', "{$arg}-googleplus" );
	$data .= ! empty ( $googleplus ) ? "<li class='google-plus'><a class=\"google fa fa-google-plus\" href=\"https://plus.google.com/share?url=$url\"  onclick=\"javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;\" ></a></li>" : '';
	
	$linkedin = dttheme_option ( 'integration', "{$arg}-linkedin" );
	$data .= ! empty ( $linkedin ) ? "<li class='linkedin'><a class='fa fa-linkedin' href='http://www.linkedin.com/shareArticle?mini=true&amp;title=" . urlencode ( $title ) . "&amp;url=$url' title='Share on LinkedIn'></a></li>" : "";
	
	$pintrest = dttheme_option ( 'integration', "{$arg}-pintrest" );
	$media = wp_get_attachment_url ( get_post_thumbnail_id ( $post->ID ) );
	$data .= ! empty ( $pintrest ) ? "<li class='pinterest'><a class='fa fa-pinterest' href='http://pinterest.com/pin/create/button/?url=" . urlencode ( $url ) . "&amp;media=$media'></a></li>" : "";
	
	$data = ! empty ( $data ) ? "<ul class='dt-sc-social-icons'>".$data."</ul>" : "";
	echo !empty( $data ) ? $data : '';
}
// # --- **** dttheme_social_bookmarks() *** --- ###

// # --- **** is_mytheme_moible_view() *** --- ###
/**
 * dttheme_is_mobile_view()
 * Objective:
 * If you eanble responsive mode in theme , this will add view port at the head
 */
function dttheme_is_mobile_view() {
	$dttheme_options = get_option ( IAMD_THEME_SETTINGS );
	$dttheme_mobile = array_key_exists("mobile",$dttheme_options ) ?  $dttheme_options ['mobile'] : array();
	if (isset ( $dttheme_mobile ['is-theme-responsive'] ))
		echo "<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />\r";
}
// # --- **** dttheme_is_mobile_view() *** --- ###

// o load basic css : default,shortcode & skin css
function dttheme_load_basic_css() {
	$dttheme_options = get_option ( IAMD_THEME_SETTINGS );
	$dttheme_general = $dttheme_options ['general'];
	
	if (isset ( $dttheme_general ['enable-favicon'] )) :
		$url = ! empty ( $dttheme_general ['favicon-url'] ) ? $dttheme_general ['favicon-url'] : IAMD_BASE_URL . "images/favicon.png";
		echo "<link href='$url' rel='shortcut icon' type='image/x-icon' />\n";

		$phone_url = ! empty ( $dttheme_general ['apple-favicon'] ) ? $dttheme_general ['apple-favicon'] : IAMD_BASE_URL . "images/apple-touch-icon.png";
		echo "<link href='$phone_url' rel='apple-touch-icon-precomposed'/>\n";

		$phone_retina_url = ! empty ( $dttheme_general ['apple-retina-favicon'] ) ? $dttheme_general ['apple-retina-favicon'] : IAMD_BASE_URL . "images/apple-touch-icon-114x114.png";
		echo "<link href='$phone_retina_url' sizes='114x114' rel='apple-touch-icon-precomposed'/>\n";

		$ipad_url = ! empty ( $dttheme_general ['apple-ipad-favicon'] ) ? $dttheme_general ['apple-ipad-favicon'] : IAMD_BASE_URL . "images/apple-touch-icon-72x72.png";
		echo "<link href='$ipad_url' sizes='72x72' rel='apple-touch-icon-precomposed'/>\n";


		$ipad_retina_url = ! empty ( $dttheme_general ['apple-ipad-retina-favicon'] ) ? $dttheme_general ['apple-ipad-retina-favicon'] : IAMD_BASE_URL . "images/apple-touch-icon-144x144.png";
		echo "<link href='$ipad_retina_url' sizes='144x144' rel='apple-touch-icon-precomposed'/>\n";
	endif;
	
	wp_enqueue_style ( 'multihost-default', get_stylesheet_uri () );
	wp_enqueue_style('prettyphoto',IAMD_BASE_URL.'css/prettyPhoto.css');

	wp_enqueue_style('pace',IAMD_BASE_URL.'css/pace-theme-loading-bar.css');

	wp_enqueue_style ( 'custom-font-awesome', IAMD_BASE_URL . 'css/font-awesome.min.css', array (), '3.0.2' );

	if( dttheme_is_plugin_active( 'whmcs-bridge/bridge.php' ) ) {
		wp_enqueue_style('bootstrap','http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css', array(), '3.3.2' );
	}	
}
add_action( 'wp_enqueue_scripts', 'dttheme_load_basic_css', '90' );

// # --- **** dttheme_set_layout *** --- ###
function dttheme_set_layout() {
	if (dttheme_option ( "mobile", "is-theme-responsive" )) {
		wp_enqueue_style ( 'responsive', IAMD_BASE_URL . "responsive.css" );
	}
	
	$dttheme_options = get_option ( IAMD_THEME_SETTINGS );
	$dttheme_mobile = array_key_exists("mobile",$dttheme_options ) ?  $dttheme_options ['mobile'] : array();
	
	if (isset ( $dttheme_mobile ['is-slider-disabled'] )) :
		$out = '<style type="text/css">';
		$out .= '@media only screen and (max-width: 767px) { div#slider-container { display:none !important; } 	}';
		$out .= '</style>';
		echo !empty( $out ) ? $out : '';
	endif;
}
add_action( 'wp_enqueue_scripts', 'dttheme_set_layout', '100' );

function dttheme_set_skin(){
	$dttheme_options = get_option ( IAMD_THEME_SETTINGS );
	wp_enqueue_style ( 'skin', IAMD_BASE_URL . "skins/" . $dttheme_options ['appearance'] ['skin'] . "/style.css" );
}
add_action( 'wp_enqueue_scripts', 'dttheme_set_skin', '110' );

// # --- **** dttheme_set_layout *** --- ###
function hex2rgb($hex) {
	$hex = str_replace ( "#", "", $hex );
	
	if (strlen ( $hex ) == 3) :
		$r = hexdec ( substr ( $hex, 0, 1 ) . substr ( $hex, 0, 1 ) );
		$g = hexdec ( substr ( $hex, 1, 1 ) . substr ( $hex, 1, 1 ) );
		$b = hexdec ( substr ( $hex, 2, 1 ) . substr ( $hex, 2, 1 ) );
	 else :
		$r = hexdec ( substr ( $hex, 0, 2 ) );
		$g = hexdec ( substr ( $hex, 2, 2 ) );
		$b = hexdec ( substr ( $hex, 4, 2 ) );
	endif;
	$rgb = array ( $r,$g,$b);
	return $rgb;
}

// ##########################################
// PAGINATION
// ##########################################
function dttheme_pagination($class = '', $pages = '', $wp_query) {

	$out = NULL;
	if( $wp_query == '' ) {
		global $wp_query;
	}
	$paged = $wp_query->query_vars['paged'];
	if(empty($paged))$paged = 1;
	$prev = $paged - 1;							
	$next = $paged + 1;	
	$range = 10; // only edit this if you want to show more page-links
	$showitems = ($range * 2)+1;
	if($pages == '') {	
		$pages = $wp_query->max_num_pages;
		if(!$pages)	{
			$pages = 1;
		}
	}
	
	$out .= '<ul class="pagination">';
		if(1 != $pages){
			for ($i=1; $i <= $pages; $i++){
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
					if( $class == "ajax-load"):
						$c =  ($paged == $i) ? "active-page" : "";
						$out .= "<li><a href='".get_pagenum_link($i)."' class='".$c."'>".$i."</a></li>";
					else: 
						$out .=  ($paged == $i)? "<li class='active-page'>".$i."</li>":"<li><a href='".get_pagenum_link($i)."' class='inactive'>".$i."</a></li>"; 
					endif;
				}
			}
		}
	$out .= '</ul>';
	return $out;
}

//LIKE PLUGIN ACTION...
add_action('activated_plugin', 'dt_like_plugin_hook', 1);
function dt_like_plugin_hook() {
	if(dttheme_is_plugin_active('roses-like-this/likethis.php')) {
		update_option("no_likes", "0");
		update_option("one_like", "%");
		update_option("some_likes", "%");
	}
}

function dt_add_custom_types( $query ) {
    if( is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
        $post_types = get_post_types();
        $query->set( 'post_type', $post_types );
        return $query;
    }
}
add_filter( 'pre_get_posts', 'dt_add_custom_types' );

function slt_wmode_opaque( $html, $url, $args ) {
 if( (strrpos($url,"youtube") !== false) || (strrpos($url,"youtu.") !== false) ) {
	 $patterns[] = '/src="(.*?)"/';
	 $replacements[] = 'src="${1}&wmode=opaque"';
	 $html =  preg_replace($patterns, $replacements, $html);
	 $html = str_replace('</iframe>)', '</iframe>', $html);
	 
  }elseif( strrpos($url, "soundcloud.com") !== false ) {
	  $patterns[] = '/height="(.*?)"/';
	  $replacements[] = 'height="166"';
	  $html =  preg_replace($patterns, $replacements, $html);
	  
	  $patterns[] = '/width="(.*?)"/';
	  $replacements[] = 'width="100%"';
	  $html =  preg_replace($patterns, $replacements, $html);
	  
	  $patterns[] = '/visual=true&/';
	  $replacements[] = '';
	  $html =  preg_replace($patterns, $replacements, $html);
  }	
return $html;          
}
add_filter( 'oembed_result', 'slt_wmode_opaque', 10, 3 );

#Sidebars
function dttheme_show_sidebar($type , $id , $sidebar = 'left' ){

	if( $type === 'post'){
		$settings = get_post_meta($id,'_dt_post_settings',TRUE);
	}elseif( $type === 'page' ){
		$settings = get_post_meta($id,'_tpl_default_settings',TRUE);
	}elseif( $type === "dt_portfolios" ){
		$settings = get_post_meta($id,'_portfolio_settings',TRUE);
	}

	$settings = is_array($settings) ? $settings  : array();

	if ( !array_key_exists("disable-standard-sidebar",$settings) ):
		if( is_active_sidebar('standard-sidebar') ) :
			dynamic_sidebar('standard-sidebar');
		endif;
	endif;

	if( array_key_exists("widget-area", $settings)):
		foreach ($settings['widget-area'] as $widget ) {
			$id = mb_convert_case($widget, MB_CASE_LOWER, "UTF-8");

			if( is_active_sidebar( $id ) ) :
				dynamic_sidebar( $id );
			endif;
		}
	endif;
}

function dttheme_onepage_sections() {
	$sections = array();
	$locations = get_nav_menu_locations();
	if(isset($locations['onepage_menu'])):

		$menu = wp_get_nav_menu_object( $locations['onepage_menu'] );
		$items  = wp_get_nav_menu_items($menu->term_id);

		foreach((array) $items as $key => $menu_items){
			$classes = $menu_items->classes;
			if( $menu_items->menu_item_parent == 0 ) {
				if(('page' == $menu_items->object) && !in_array('external',$classes) ){
					$sections[$menu_items->ID] = $menu_items->object_id;
				}
			}
		}
	endif;
	return $sections;
}

# Move comment filed in comment form to bottom
add_filter( 'comment_form_fields', 'dt_move_comment_field_to_bottom' );
function dt_move_comment_field_to_bottom( $fields ) {
	
	$comment_field = $fields['comment'];
	
	unset( $fields['comment'] );
	
	$fields['comment'] = $comment_field;
	return $fields;
}

/* ---------------------------------------------------------------------------
 * Update for page builder latest version
 * --------------------------------------------------------------------------- */
add_action( 'wp_ajax_dttheme_update_pagebuilder_contents', 'dttheme_update_pagebuilder_contents' );
add_action( 'wp_ajax_nopriv_dttheme_update_pagebuilder_contents', 'dttheme_update_pagebuilder_contents' );
function dttheme_update_pagebuilder_contents() {
	
	// Script to update pages
	$page_args = array('post_type' => 'page' ,'post_status' => 'publish' , 'posts_per_page' =>'-1');
	
	$page_datas = new WP_Query( $page_args );
	if( $page_datas->have_posts() ):
		while( $page_datas->have_posts() ):
			$page_datas->the_post();
				
				$current_page_id = get_the_ID();
				
				$builder_layout = get_post_meta( $current_page_id, '_dt_builder_settings', true );
				$builder_layout = is_array( $builder_layout ) ? $builder_layout  : array();
				$layout_html = array_key_exists('layout_html',$builder_layout ) ? $builder_layout['layout_html'] : '';
				$layout_shortcode = array_key_exists('layout_shortcode',$builder_layout ) ? $builder_layout['layout_shortcode'] : '';
				$layout_parsed = array_key_exists('layout_parsed',$builder_layout ) ? $builder_layout['layout_parsed'] : 'false';
				
				if($layout_parsed != 'true') {
				
					$layout_html_new = str_replace('<span class="dt_add_module_column" title="Add Module" style="display:none;">A</span>', '', $layout_html);
					$layout_html_new = str_replace('<div data-option_name="content" class="content', '<div data-option_name="title_content" class="title_content', $layout_html_new);
					$layout_html_new = str_replace('dt_fullwidth_section_container', 'dt_modules_holder dt_fullwidth_section_container', $layout_html_new);
					$layout_html_new = str_replace('dt_modules_container', 'dt_modules_holder dt_modules_container', $layout_html_new);
					$layout_html_new = mb_convert_encoding($layout_html_new, 'HTML-ENTITIES', "UTF-8");
					
					
					$doc = new DomDocument();
					$file = @$doc->loadHTML($layout_html_new);
					
					$divtag = $doc->getElementsByTagName('div');
					foreach($divtag AS $item)
					{
					
						$item_class = $item->getAttribute('class');
						$item_class_arr = explode(' ', $item_class);
						
						if(in_array('dt_m_column', $item_class_arr)) {
						
							$add_module_div = $doc->createElement('div', '');
							$add_module_div_class = $doc->createAttribute('class');
							$add_module_div_class->value = 'dt_show_modules_in_popup dt_popup_from_column';
							$add_module_div_title = $doc->createAttribute('title');
							$add_module_div_title->value = 'Add Module';
							
							$add_module_div->appendChild($add_module_div_class);
							$add_module_div->appendChild($add_module_div_title);
							
							$item->appendChild($add_module_div);
							
						}
					
						if(in_array('dt_fullwidth_section', $item_class_arr)) {
						
							$add_module_div = $doc->createElement('div', '');
							$add_module_div_class = $doc->createAttribute('class');
							$add_module_div_class->value = 'dt_show_modules_in_popup dt_popup_from_section';
							$add_module_div_title = $doc->createAttribute('title');
							$add_module_div_title->value = 'Add Module';
							
							$add_module_div->appendChild($add_module_div_class);
							$add_module_div->appendChild($add_module_div_title);
							
							$item->appendChild($add_module_div);
							
						}
					
					}
					
					$layout_html_new = @$doc->saveHTML();
					
					$layout_html_new = str_replace('<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">', '', $layout_html_new);
					$layout_html_new = str_replace('<html><body>', '', $layout_html_new);
					$layout_html_new = str_replace('</body></html>', '', $layout_html_new);
					
					$output = array();
					$output['layout_html'] = $layout_html_new;
					$output['layout_shortcode'] = $layout_shortcode;
					$output['layout_parsed'] = 'true';
					
					update_post_meta($current_page_id, '_dt_builder_settings', $output);
				
				}
				
		endwhile;
	endif;
	
	// Script to update posts
	$post_args = array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' =>'-1');
	
	$post_datas = new WP_Query( $post_args );
	if( $post_datas->have_posts() ):
		while( $post_datas->have_posts() ):
			$post_datas->the_post();
				
				$current_page_id = get_the_ID();
				
				$builder_layout = get_post_meta( $current_page_id, '_dt_builder_settings', true );
				$builder_layout = is_array( $builder_layout ) ? $builder_layout  : array();
				$layout_html = array_key_exists('layout_html',$builder_layout ) ? $builder_layout['layout_html'] : '';
				$layout_shortcode = array_key_exists('layout_shortcode',$builder_layout ) ? $builder_layout['layout_shortcode'] : '';
				$layout_parsed = array_key_exists('layout_parsed',$builder_layout ) ? $builder_layout['layout_parsed'] : 'false';
				
				if($layout_parsed != 'true') {
				
					$layout_html_new = str_replace('<span class="dt_add_module_column" title="Add Module" style="display:none;">A</span>', '', $layout_html);
					$layout_html_new = str_replace('<div data-option_name="content" class="content', '<div data-option_name="title_content" class="title_content', $layout_html_new);
					$layout_html_new = str_replace('dt_fullwidth_section_container', 'dt_modules_holder dt_fullwidth_section_container', $layout_html_new);
					$layout_html_new = str_replace('dt_modules_container', 'dt_modules_holder dt_modules_container', $layout_html_new);
					$layout_html_new = mb_convert_encoding($layout_html_new, 'HTML-ENTITIES', "UTF-8");
					
					
					$doc = new DomDocument();
					$file = @$doc->loadHTML($layout_html_new);
					
					$divtag = $doc->getElementsByTagName('div');
					foreach($divtag AS $item)
					{
					
						$item_class = $item->getAttribute('class');
						$item_class_arr = explode(' ', $item_class);
						
						if(in_array('dt_m_column', $item_class_arr)) {
						
							$add_module_div = $doc->createElement('div', '');
							$add_module_div_class = $doc->createAttribute('class');
							$add_module_div_class->value = 'dt_show_modules_in_popup dt_popup_from_column';
							$add_module_div_title = $doc->createAttribute('title');
							$add_module_div_title->value = 'Add Module';
							
							$add_module_div->appendChild($add_module_div_class);
							$add_module_div->appendChild($add_module_div_title);
							
							$item->appendChild($add_module_div);
							
						}
					
						if(in_array('dt_fullwidth_section', $item_class_arr)) {
						
							$add_module_div = $doc->createElement('div', '');
							$add_module_div_class = $doc->createAttribute('class');
							$add_module_div_class->value = 'dt_show_modules_in_popup dt_popup_from_section';
							$add_module_div_title = $doc->createAttribute('title');
							$add_module_div_title->value = 'Add Module';
							
							$add_module_div->appendChild($add_module_div_class);
							$add_module_div->appendChild($add_module_div_title);
							
							$item->appendChild($add_module_div);
							
						}
					
					}
					
					$layout_html_new = @$doc->saveHTML();
					
					$layout_html_new = str_replace('<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">', '', $layout_html_new);
					$layout_html_new = str_replace('<html><body>', '', $layout_html_new);
					$layout_html_new = str_replace('</body></html>', '', $layout_html_new);
					
					$output = array();
					$output['layout_html'] = $layout_html_new;
					$output['layout_shortcode'] = $layout_shortcode;
					$output['layout_parsed'] = 'true';
					
					update_post_meta($current_page_id, '_dt_builder_settings', $output);
				
				}
				
		endwhile;
	endif;
	
	$bp_data = get_option(IAMD_THEME_SETTINGS);
	$bp_data['pagebuilder_update'] = 'done';
	update_option(IAMD_THEME_SETTINGS, $bp_data);
	
	die('1');			
}
/* ---------------------------------------------------------------------------
* Mailchimp API Ajax Call
* --------------------------------------------------------------------------- */
add_action('wp_ajax_mailchimp_subscribe', 'dt_mailchimp_subscribe');
add_action('wp_ajax_nopriv_mailchimp_subscribe', 'dt_mailchimp_subscribe');
function dt_mailchimp_subscribe() {

	$out = '';

	$key = $_REQUEST['key'];
	$list = $_REQUEST['list'];
	$email = $_REQUEST['email'];

	if( !empty($key) && !empty($list) ) {

		$data = array('email' => sanitize_email($email), 'status' => 'subscribed');

		if( dt_mailchimp_check_member_already_registered($data, $key, $list) ) {
			$out .= '<span style="color:red;"> <b>'.__('Error:','dt_themes').'</b> '.esc_html__('You have already subscribed with us!', 'dt_themes').' </span>';
		} else {
			$out .= dt_mailchimp_register_member($data, $key, $list);
		}
	} else {
		$out .= '<span style="color:red;"> <b>'.__('Error:','dt_themes').'</b> '.esc_html__('Please make sure valid mailchimp details are provided.', 'dt_themes').' </span>';
	}

	echo $out;
	die();
}

function dt_mailchimp_check_member_already_registered($data, $apiKey, $listId) {

	$memberId = md5(strtolower($data['email']));
	$dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
	$url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listId . '/members';

	$json = json_encode(array(
		'email_address' => $data['email'],
		'status'        => $data['status'],
	));

	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	$result = curl_exec($ch);
	curl_close($ch);

	$result_decode = json_decode($result, true);

	foreach($result_decode['members'] as $key => $value) {
		if($value['email_address'] == $data['email']) {
			return true;
		}
	}

	return false;
}

function dt_mailchimp_register_member($data, $apiKey, $listId) {

	$memberId = md5(strtolower($data['email']));
	$dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
	$url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listId . '/members/' . $memberId;

	$json = json_encode(array(
		'email_address' => $data['email'],
		'status'        => $data['status'],
	));

	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json);   

	$result = curl_exec($ch);
	$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);

	$result_decode = json_decode($result, true);
	if($httpCode == 200) {
		$out = '<span style="color:#37a700">'.esc_html__('Success! Please check your inbox or spam folder.', 'dt_themes').'</span>';
	} else {
		$out = '<span style="color:#ac161a"><b>'.$result_decode['title'].':</b> '.$result_decode['detail'].'</span>';
	}

	return $out;
}

/* ---------------------------------------------------------------------------
 * SSL | Compatibility
 * --------------------------------------------------------------------------- */
function dt_ssl( $echo = false ) {
	$ssl = '';
	if( is_ssl() ) $ssl = 's';
	if( $echo ){
		echo $ssl;
	}

	return $ssl;
}

add_filter( 'wp_get_attachment_url', 'dt_ssl_attachments' );
function dt_ssl_attachments( $url ) {
	if( is_ssl() ){
		return str_replace('http://', 'https://', $url);
	}
	return $url;
}?>