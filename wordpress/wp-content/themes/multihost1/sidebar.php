<?php
	wp_reset_postdata();
	global $post;

	if( is_page() ):
		dttheme_show_sidebar('page',$post->ID);
	
	elseif( is_singular('post') ):
		dttheme_show_sidebar('post',$post->ID);

	elseif( is_singular('dt_portfolios')):
		dttheme_show_sidebar('dt_portfolios',$post->ID);
		
	elseif( is_tax('dt_portfolio_entries') ):	
		$disable = dttheme_option('specialty',"disable-standard-sidebar-for-gallery-archives");
		if( is_null($disable) ):
			if( is_active_sidebar('standard-sidebar') )
				dynamic_sidebar('standard-sidebar');
		endif;
		
		if( is_active_sidebar('custom-post-gallery-archives') ):
			dynamic_sidebar('custom-post-gallery-archives');
		endif;

	elseif( is_author() ):
		$disable = dttheme_option('specialty',"disable-standard-sidebar-for-author-archives");
		
		if( is_null($disable) ):
			if( is_active_sidebar('standard-sidebar') )
				dynamic_sidebar('standard-sidebar');
		endif;

		if( is_active_sidebar('author-archive-sidebar') ):
			dynamic_sidebar('author-archive-sidebar');
		endif;
		
	elseif( is_search() ):
		$disable = dttheme_option('specialty',"disable-standard-sidebar-for-search");

		if( is_null($disable) ):
			if( is_active_sidebar('standard-sidebar') )
				dynamic_sidebar('standard-sidebar');
		endif;

		if( is_active_sidebar('search-sidebar') ):
			dynamic_sidebar('search-sidebar');
		endif;	
	
	elseif( is_404() ):
		$disable = dttheme_option('specialty',"disable-standard-sidebar-for-404");

		if( is_null($disable) ):
			if( is_active_sidebar('standard-sidebar') )
				dynamic_sidebar('standard-sidebar');
		endif;

		if( is_active_sidebar('not-found-404-sidebar') ):
			dynamic_sidebar('not-found-404-sidebar');
		endif;
		
	elseif( is_tag() ):
		$disable = dttheme_option('specialty',"disable-standard-sidebar-for-tag-archives");

		if( is_null($disable) ):
			if( is_active_sidebar('standard-sidebar') )
				dynamic_sidebar('standard-sidebar');
		endif;

		if( is_active_sidebar('tag-archives-sidebar') ):
			dynamic_sidebar('tag-archives-sidebar');
		endif;
	
	elseif( is_archive() ):
		$disable = dttheme_option('specialty',"disable-standard-sidebar-for-category-archives");

		if( is_null($disable) ):
			if( is_active_sidebar('standard-sidebar') )
				dynamic_sidebar('standard-sidebar');
		endif;

		if( is_active_sidebar('category-archives-sidebar') ):
			dynamic_sidebar('category-archives-sidebar');
		endif;
	elseif( is_home() ):
		$pageid = get_option('page_for_posts');
		if( $pageid > 0 ):
			dttheme_show_sidebar('page',$pageid);
		endif;
	else:
		if( is_active_sidebar('standard-sidebar') ):
			dynamic_sidebar('standard-sidebar');
		endif;
	endif;?>