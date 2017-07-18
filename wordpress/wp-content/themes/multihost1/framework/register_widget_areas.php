<?php 
	#Standard Sidebar
	register_sidebar(array(
		'name' 			=>	__('Standard Sidebar','dt_themes'),
		'id'			=>	'standard-sidebar',
		'description'	=>	__("Common sidebar that appears once enabled.","dt_themes"),
		'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> 	'</aside>',
		'before_title' 	=> 	'<h3 class="widgettitle">',
		'after_title' 	=> 	'<span></span></h3>'));

	#Custom Sidebars
	$widgets = dttheme_option('widgetarea','custom');
	$widgets = is_array($widgets) ? array_unique($widgets) : array();
    $widgets = array_filter($widgets);
    foreach ($widgets as $key => $value) {
    	$id = mb_convert_case($value, MB_CASE_LOWER, "UTF-8");
    	$id = str_replace(" ", "-", $id);

    	register_sidebar(array(
		'name' 			=>	$value,
		'id'			=>	$id,
		'description'   =>  __("A unique sidebar that is created in Admin panel","dt_themes"),
		'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> 	'</aside>',
		'before_title' 	=> 	'<h3 class="widgettitle">',
		'after_title' 	=> 	'<span></span></h3>'));
    }

    #Post's Author Archive Sidebar 
    	$author_archive_layout = dttheme_option('specialty','author-archives-layout');
    	$author_archive_layout = !empty($author_archive_layout) ? $author_archive_layout : "content-full-width";
    	switch ($author_archive_layout ) {
    		case 'with-left-sidebar':
    		case 'with-right-sidebar':
				register_sidebar(array(
					'name' 			=>	__("Author's Archive Sidebar",'dt_themes'),
					'id'			=>	'author-archive-sidebar',
					'description'   =>  __("Author's Archive sidebar","dt_themes"),
					'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
					'after_widget' 	=> 	'</aside>',
					'before_title' 	=> 	'<h3 class="widgettitle">',
					'after_title' 	=> 	'<span></span></h3>'));
    		break;
   		}

    #Post's Category Archive Sidebar 
    	$cat_archive_layout = dttheme_option('specialty','category-archives-layout');
    	$cat_archive_layout = !empty($cat_archive_layout) ? $cat_archive_layout : "content-full-width";
    	switch ($cat_archive_layout ) {
    		case 'with-left-sidebar':
    		case 'with-right-sidebar':
				register_sidebar(array(
					'name' 			=>	__("Post's Category Archive Sidebar",'dt_themes'),
					'id'			=>	'category-archives-sidebar',
					'description'   =>  __("Post's Category sidebar.","dt_themes"),
					'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
					'after_widget' 	=> 	'</aside>',
					'before_title' 	=> 	'<h3 class="widgettitle">',
					'after_title' 	=> 	'<span></span></h3>'));
    		break;
   		}

    #Post's Tag Archive Sidebar
    	$tag_archive_layout = dttheme_option('specialty','tag-archives-layout');
    	$tag_archive_layout = !empty($tag_archive_layout) ? $tag_archive_layout : "content-full-width";
    	switch ($tag_archive_layout ) {
    		case 'with-left-sidebar':
    		case 'with-right-sidebar':
				register_sidebar(array(
					'name' 			=>	__("Post's Tag Archive Sidebar",'dt_themes'),
					'id'			=>	'tag-archives-sidebar',
					'description'   =>  __("Post's Tag sidebar.","dt_themes"),
					'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
					'after_widget' 	=> 	'</aside>',
					'before_title' 	=> 	'<h3 class="widgettitle">',
					'after_title' 	=> 	'<span></span></h3>'));
    		break;
   		}

    #Search Page Layout
    	$search_layout = dttheme_option('specialty','search-layout');
    	$search_layout = !empty($search_layout) ? $search_layout : "content-full-width";

    	switch ($search_layout ) {
    		case 'with-left-sidebar':
    		case 'with-right-sidebar':
				register_sidebar(array(
					'name' 			=>	__('Search Sidebar','dt_themes'),
					'id'			=>	'search-sidebar',
					'description'   =>  __("Search page sidebar.","dt_themes"),
					'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
					'after_widget' 	=> 	'</aside>',
					'before_title' 	=> 	'<h3 class="widgettitle">',
					'after_title' 	=> 	'<span></span></h3>'));
    		break;
      	}

    #404 Page Layout
    	$layout_404 = dttheme_option('specialty','404-layout');
    	$layout_404 = !empty($layout_404) ? $layout_404 : "content-full-width";

    	switch ($layout_404 ) {
    		case 'with-left-sidebar':
    		case 'with-right-sidebar':
				register_sidebar(array(
					'name' 			=>	__('Not Found ( 404 ) Sidebar','dt_themes'),
					'id'			=>	'not-found-404-sidebar',
					'description'   =>  __("404 page sidebar.","dt_themes"),
					'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
					'after_widget' 	=> 	'</aside>',
					'before_title' 	=> 	'<h3 class="widgettitle">',
					'after_title' 	=> 	'<span></span></h3>'));
    		break;
    	}


if( dttheme_is_plugin_active('designthemes-core-features/designthemes-core-features.php') ):

    	$layout = dttheme_option('specialty','gallery-archives-layout');
    	$layout = !empty($layout) ? $layout : "content-full-width";
    	switch ($layout ) {
    		case 'with-left-sidebar':
    		case 'with-right-sidebar':
				register_sidebar(array(
					'name' 			=>	__("Portfolio's Terms Sidebar",'dt_themes'),
					'id'			=>	'custom-post-gallery-archives',
					'description'   =>  __("Portfolio's term sidebar that appears on the left side.","dt_themes"),
					'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
					'after_widget' 	=> 	'</aside>',
					'before_title' 	=> 	'<h3 class="widgettitle">',
					'after_title' 	=> 	'<span></span></h3>'));
    		break;
   		}
endif;

	#Footer Columnns		
	$footer_columns =  dttheme_option('general','footer-columns');
	dttheme_footer_widgetarea($footer_columns);

	#Custom Mega Menu Sidebars
	$widgets = dttheme_option('widgetarea','megamenu');
	$widgets = is_array($widgets) ? array_unique($widgets) : array();
    $widgets = array_filter($widgets);
    foreach ($widgets as $key => $value) {
    	$id = mb_convert_case($value, MB_CASE_LOWER, "UTF-8");
    	$id = str_replace(" ", "-", $id);

    	register_sidebar(array(
		'name' 			=>	$value,
		'id'			=>	$id,
		'description'   =>  __("A unique mega menu sidebar that is created in Admin panel","dt_themes"),
		'before_widget' => 	'<li id="%1$s" class="widget %2$s">',
		'after_widget' 	=> 	'</li>',
		'before_title' 	=> 	'<h3 class="widgettitle">',
		'after_title' 	=> 	'<span></span></h3>'));
    }
	?>