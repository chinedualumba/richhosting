<?php
/** dttheme_option()
 * Objective:
 *		To get my theme options stored in database by the thme option page at back end.
 **/
function dttheme_option($key1, $key2 = '') {
	$options = get_option ( IAMD_THEME_SETTINGS );
	$output = NULL;

	if (is_array ( $options )) {

		if (array_key_exists ( $key1, $options )) {
			$output = $options [$key1];
			if (is_array ( $output ) && ! empty ( $key2 )) {
				$output = (array_key_exists ( $key2, $output ) && (! empty ( $output [$key2] ))) ? $output [$key2] : NULL;
			}
		} else {
			$output = $output;
		}
	}
	return $output;
}
// # --- **** dttheme_option() *** --- ###

/**
 * dttheme_default_option()
 * Objective:
 * To return my theme default options to store in database.
 */
function dttheme_default_option() {
	
	$general = array(
		"logo" => "true",
		"enable-favicon" => "true",
		"disable-page-comment"	=>"true",
		"disable-custom-scroll" =>"on",
		"show-sociables" => "on",
		"show-footer" => "on",
		"footer-columns" => "4",
		"show-copyrighttext" => "on",
		"breadcrumb-delimiter" => "fa-angle-double-right",
		"show-footer-logo" => "true",
		"h1-phoneno" => "+1 959 552 5963",
		"h1-emailid" => "contact@multihost.com",
		"copyright-text" => 'Copyright &copy; 2015. All rights reserved. Design by <a title="" href="http://themeforest.net/user/designthemes">DesignThemes</a>');
				
	$appearance = array(
		"layout" => "wide",
		"disable-menu-settings" => "true",
		"disable-footer-settings" => "true",
		"disable-typography-settings" => "true",
		"disable-boddy-settings" => "true",
		"skin" => "royalblue");

	$integration = array(
		"post-googleplus-layout" => "small",
		"post-googleplus-lang" => "en_GB",
		"post-twitter-layout" => "vertical",
		"post-fb_like-layout" => "box_count",
		"post-fb_like-color-scheme" => "light",
		"post-digg-layout" => "medium",
		"post-stumbleupon-layout" => "5",
		"post-linkedin-layout" => "2",
		"page-pintrest-layout" => "none",
		"page-googleplus-layout" => "small",
		"page-googleplus-lang" => "en_GB",
		"page-twitter-layout" => "blue",
		"page-fb_like-layout" => "box_count",
		"page-fb_like-color-scheme" => "light",
		"page-digg-layout" => "medium",
		"page-stumbleupon-layout" => "5",
		"page-linkedin-layout" => "2",
		"page-pintrest-layout" => "none");

	$mobile = array ("is-theme-responsive" => "true");
	
	$social = array (
		'social-1' => array('icon'=>'fa-flickr','link'=>'#'), 
		'social-2' => array('icon'=>'fa-pinterest','link'=>'#'),
		'social-3'=>array('icon'=>'fa-facebook','link'=>'#'));
	
	$seo = array (
		"title-delimiter" => "|",
		"post-title-format" => array ( "blog_title", "post_title" ),
		"page-title-format" => array ( "blog_title", "post_title" ),
		"archive-page-title-format" => array ( "blog_title", "date"	),
		"category-page-title-format" => array (	"blog_title", "category_title" ),
		"tag-page-title-format" => array ( "blog_title", "tag"),
		"search-page-title-format" => array ( "blog_title", "search" ),
		"404-page-title-format" => array ( "blog_title"));
		
	$specialty = array (
		"author-archives-layout" => "content-full-width",
		"author-archives-post-layout" => "one-half-column",
		"category-archives-layout" => "content-full-width",
		"category-archives-post-layout" => "one-half-column",
		"tag-archives-layout" => "content-full-width",
		"tag-archives-post-layout" => "one-half-column",
		"gallery-archives-layout" => "content-full-width",
		"gallery-archives-post-layout" => "one-third-column",
		"search-layout" => "content-full-width",
		"search-post-layout" => "one-half-column",
		"404-layout" => "content-full-width",
		"archives-layout" => "content-full-width",
		"archives-post-layout" => "one-half-column",
		"404-message" => '<h3>Oops the page you are looking for is not found</h3>
		<h2>404 Error !</h2>
		<p>Let us know what you were looking for</p>
		[dt_sc_email icon="fa-envelope" text="Email" emailid="yourname@somemail.com"/]
		<p> or </p>
		[dt_sc_contact icon="fa-phone" text="Phone" detail="+1 200 258 2145"/]');

	$woo = array(
		"shop-product-per-page" => "10",
		"shop-page-product-layout" => "one-third-column",
		"product-layout" => "with-left-sidebar",
		"product-category-layout" => "content-full-width",
		"product-tag-layout" => "content-full-width");

	$pagebuilder = array( "page" => 'page', 'enable-pagebuilder' =>'true');
		
	$data = array(
		"general" => $general,
		"appearance" => $appearance,
		"integration" => $integration,
		"mobile" => $mobile,
		"social" => $social,
		"seo" => $seo,
		"specialty" => $specialty,
		"pagebuilder" => $pagebuilder,
		"woo" => $woo);
					
	return $data;
}
// # --- **** dttheme_default_option() *** --- ###

/** dttheme_adminpanel_tooltip()
 * Objective:
 *		To place tooltip content in thme option page at back end.
 * args:
 *		1. $tooltip = content which is shown as tooltip
 **/
function dttheme_adminpanel_tooltip($tooltip) {
	
	$url = IAMD_FW_URL."theme_options/images/help.png";
	echo "<div class='bpanel-option-help'>\n";
	echo "<a href='' title=''> <img src='".esc_url( $url )."'/> </a>\n";
	echo "\r<div class='bpanel-option-help-tooltip'>\n".$tooltip;
	echo "\r</div>\n";
	echo "</div>\n";
}
// # --- **** dttheme_adminpanel_tooltip() *** --- ###

/**
 * dttheme_adminpanel_image_preview()
 * Objective:
 * To place tooltip content in thme option page at back end.
 * args:
 * 1. $src = image source
 * 2. $backend = true - to get images placed in framework ? false - to get images stored in theme/images folder
 */
function dttheme_adminpanel_image_preview($src, $backend = true, $default = "no-image.jpg") {
	$default = ($backend) ? IAMD_FW_URL . "theme_options/images/" . $default : IAMD_BASE_URL . "images/" . $default;
	$src = !empty($src) ? $src : $default;
	
	$preview = IAMD_FW_URL."theme_options/images/image-preview.png";
	echo "<div class='bpanel-option-help'>\n";
	echo "<a href='' title='' class='a_image_preivew'> <img src='".esc_url($preview)."'/> </a>\n";
	echo "\r<div class='bpanel-option-help-tooltip imagepreview'>\n";
	echo "\r<img src='".esc_url($src)."' data-default='".esc_attr($default)."'/>";
	echo "\r</div>\n";
	echo "</div>\n";
}
// # --- **** dttheme_adminpanel_image_preview() *** --- ###

/**
 * dttheme_pagelist()
 * Objective:
 * To create dropdown box with list of pages.
 * args:
 * 1. $id = page id
 * 2. $selected = ( true / false)
 */
function dttheme_postlist($id, $selected, $class = "mytheme_select") {
	global $post;
	$args = array ( 'numberposts' => - 1 );
	
	$name = explode ( ",", $id );
	if (count ( $name ) > 1) {
		$name = "[{$name[0]}][{$name[1]}]";
	} else {
		$name = "[{$name[0]}]";
	}
	$name = ($class == "multidropdown") ? "mytheme{$name}[]" : "mytheme{$name}";
	echo "<select name='".esc_attr($name)."' class='".esc_attr($class)."'>";
	echo "	<option value=''>" . __ ( 'Select Post', 'dt_themes' ) . "</option>";
			$posts = get_posts ( $args );
			foreach ( $posts as $post ) :
				$id = esc_attr ( $post->ID );
				$title = esc_html ( $post->post_title );
				echo '<option value="'.$id.'" '.selected( $selected, $id, false ).'>'.$title.'</option>';
			endforeach;
	echo "</select>\n";
}
// # --- **** dttheme_postlist() *** --- ###

/**
 * dttheme_productlist()
 * Objective:
 * To create dropdown box with list of products.
 * args:
 * 1. $id = page id
 * 2. $selected = ( true / false)
 */
function dttheme_productlist($id, $selected, $class = "mytheme_select") {
	global $post;
	$args = array ('numberposts' => - 1,'post_type' => 'product' );
	
	$name = explode ( ",", $id );
	if (count ( $name ) > 1) {
		$name = "[{$name[0]}][{$name[1]}]";
	} else {
		$name = "[{$name[0]}]";
	}
	$name = ($class == "multidropdown") ? "mytheme{$name}[]" : "mytheme{$name}";
	echo "<select name='".esc_attr($name)."' class='".esc_attr($class)."'>";
	echo "	<option value=''>". __ ( 'Select Product', 'dt_themes' ) ."</option>";
			$posts = get_posts ( $args );
			foreach ( $posts as $post ) :
				$id = esc_attr ( $post->ID );
				$title = esc_html ( $post->post_title );
				echo '<option value="'.$id.'" '.selected( $selected, $id, false ).'>'.$title.'</option>';
			endforeach;
	echo "</select>\n";
}
// # --- **** dttheme_productlist() *** --- ###

function dttheme_product_taxonomy_list($id, $selected = '', $class = "mytheme_select", $taxonomy) {
	$name = explode ( ",", $id );
	if (count ( $name ) > 1) {
		$name = "[{$name[0]}][{$name[1]}]";
	} else {
		$name = "[{$name[0]}]";
	}
	$name = ($class == "multidropdown") ? "mytheme{$name}[]" : "mytheme{$name}";
	echo "<select name='".esc_attr($name)."' class='".esc_attr($class)."'>";
	echo 	"<option value=''>". __( 'Select', 'dt_themes' ) ."</option>";
			$cats = get_categories ( "taxonomy={$taxonomy}&hide_empty=0" );
			foreach ( $cats as $cat ) :
				$id = esc_attr ( $cat->term_id );
				$title = esc_html ( $cat->name );
				echo '<option value="'.$id.'" '.selected( $selected, $id, false ).'>'.$title.'</option>';
			endforeach;
	echo  "</select>\n";
}

/**
 * dttheme_pagelist()
 * Objective:
 * To create dropdown box with list of pages.
 * args:
 * 1. $id = page id
 * 2. $selected = ( true / false)
 */
function dttheme_pagelist($id, $selected, $class = "mytheme_select") {
	$name = explode ( ",", $id );
	if (count ( $name ) > 1) {
		$name = "[{$name[0]}][{$name[1]}]";
	} else {
		$name = "[{$name[0]}]";
	}
	$name = ($class == "multidropdown") ? "mytheme{$name}[]" : "mytheme{$name}";
	echo "<select name='".esc_attr($name)."' class='".esc_attr($class)."'>";
	echo 	"<option value=''>". __( 'Select Page', 'dt_themes' )."</option>";
			$pages = get_pages ( 'title_li=&orderby=name' );
			foreach ( $pages as $page ) :
				$id = esc_attr ( $page->ID );
				$title = esc_html ( $page->post_title );
				echo '<option value="'.$id.'" '.selected( $selected, $id, false ).'>'.$title.'</option>';
			endforeach;
	echo "</select>\n";
}
// # --- **** dttheme_pagelist() *** --- ###

/**
 * dttheme_categorylist()
 * Objective:
 * To create dropdown box with list of categories.
 * args:
 * 1. $id = dropdown id
 * 2. $selected = ( true / false)
 * 3. $class = default class
 */
function dttheme_categorylist($id, $selected = '', $class = "mytheme_select") {
	$name = explode ( ",", $id );
	if (count ( $name ) > 1) {
		$name = "[{$name[0]}][{$name[1]}]";
	} else {
		$name = "[{$name[0]}]";
	}
	$name = ($class == "multidropdown") ? "mytheme{$name}[]" : "mytheme{$name}";
	echo "<select name='".esc_attr($name)."' class='".esc_attr($class)."'>";
	echo 	"<option value=''>". __( 'Select Category', 'dt_themes' )."</option>";
			$cats = get_categories ( 'orderby=name&hide_empty=0' );
			foreach ( $cats as $cat ) :
				$id = esc_attr ( $cat->term_id );
				$title = esc_html ( $cat->name );
				echo '<option value="'.$id.'" '.selected( $selected, $id, false ).'>'.$title.'</option>';
			endforeach;
	echo "</select>\n";
}
// # --- **** dttheme_categorylist() *** --- ###

function dttheme_gallery_categorylist($id, $selected = '', $class = "mytheme_select") {
	$name = explode ( ",", $id );
	if (count ( $name ) > 1) {
		$name = "[{$name[0]}][{$name[1]}]";
	} else {
		$name = "[{$name[0]}]";
	}
	$name = ($class == "multidropdown") ? "mytheme{$name}[]" : "mytheme{$name}";
	$cats = get_categories ( 'taxonomy=dt_portfolio_entries&hide_empty=0' );
	if( is_array( $cats) ) {
		echo "<select name='".esc_attr($name)."' class='".esc_attr($class)."'>";
		echo 	"<option value=''>" . __ ( 'Select Category', 'dt_themes' ) . "</option>";
				foreach ( $cats as $cat ) :
					$id = esc_attr ( $cat->term_id );
					$title = esc_html ( $cat->name );
					echo '<option value="'.$id.'" '.selected( $selected, $id, false ).'>'.$title.'</option>';
				endforeach;
		echo "</select>\n";
	}
}

function dttheme_custom_widgetarea_list( $id, $selected = "", $class="mytheme_select") {
	$name = explode ( ",", $id );
	if (count ( $name ) > 1) {
		$name = "[{$name[0]}][{$name[1]}]";
	} else {
		$name = "[{$name[0]}]";
	}

	$name = ($class == "multidropdown") ? "mytheme{$name}[]" : "mytheme{$name}";

	$widgets = dttheme_option('widgetarea','custom');
    $widgets = is_array($widgets) ? array_unique($widgets) : array();
    $widgets = array_filter($widgets);

	echo "<select name='".esc_attr($name)."' class='".esc_attr($class)."'>";
	echo 	"<option value=''>" . __ ( 'Select Widget Area', 'dt_themes' ) . "</option>";
			foreach( $widgets as $widget){
				$id = mb_convert_case($widget, MB_CASE_LOWER, "UTF-8");
				$id = str_replace(" ", "-", $id);
				echo '<option value="'.$id.'" '.selected( $selected, $id, false ).'>'.$widget.'</option>';
			}
	echo "</select>\n";
}

function dttheme_custompostlist($post_type, $id, $selected, $class = "mytheme_select") {
	global $post;
	$args = array ( 'numberposts' => - 1,'post_type' => $post_type );
	
	$name = explode ( ",", $id );
	if (count ( $name ) > 1) {
		$name = "[{$name[0]}][{$name[1]}]";
	} else {
		$name = "[{$name[0]}]";
	}
	$name = ($class == "multidropdown") ? "mytheme{$name}[]" : "mytheme{$name}";
	echo "<select name='".esc_attr($name)."' class='".esc_attr($class)."'>";
	echo 	"<option value=''>" . __ ( 'Select', 'dt_themes' ) . "</option>";
			$posts = get_posts ( $args );
			foreach ( $posts as $post ) :
				$id = esc_attr ( $post->ID );
				$title = esc_html ( $post->post_title );
				echo '<option value="'.$id.'" '.selected( $selected, $id, false ).'>'.$title.'</option>';
			endforeach;
	echo "</select>\n";
}


function dttheme_social_list() {
	$sociables = array('fa-dribbble' => 'Dribble', 'fa-flickr' => 'Flickr', 'fa-github' => 'GitHub', 'fa-pinterest' => 'Pinterest', 'fa-stack-overflow' => 'Stack Overflow', 'fa-twitter' => 'Twitter', 'fa-youtube' => 'YouTube', 'fa-android' => 'Android', 'fa-dropbox' => 'Dropbox', 'fa-instagram' => 'Instagram', 'fa-windows' => 'Windows', 'fa-apple' => 'Apple', 'fa-facebook' => 'Facebook', 'fa-google-plus' => 'Google Plus', 'fa-linkedin' => 'LinkedIn', 'fa-skype' => 'Skype', 'fa-tumblr' => 'Tumblr', 'fa-vimeo-square' => 'Vimeo');
	return $sociables;
}

/**
 * dttheme_sociables_selection()
 * Objective:
 * Returns selection box.
 */
function dttheme_sociables_selection($name = '', $selected = "") {
	$sociables = dttheme_social_list();
	$name = ! empty ( $name ) ? "name='mytheme[social][{$name}][icon]'" : '';
	echo "<select class='social-select' {$name}>"; // name attribute will be added to this by jQuery menuAdd()
	foreach ( $sociables as $key => $value ) :
		$v = ucwords ( $value );
		echo '<option value="'.$key.'" '.selected( $selected, $key, false ).'>'.$v.'</option>';
	endforeach;
	echo "</select>";
}
// # --- **** dttheme_sociables_selection() *** --- ###

/**
 * dttheme_listImage()
 * Args:
 * 1.
 * $dir = location of the folder from which you wnat to get images
 * Objective:
 * Returns an array that contains icon names located at $dir.
 */
function dttheme_listImage($dir) {
	$sociables = array ();
	$icon_types = array ( 'jpg', 'jpeg', 'gif', 'png' );
	
	if (is_dir ( $dir )) {
		$handle = opendir ( $dir );
		while ( false !== ($dirname = readdir ( $handle )) ) {
			
			if ($dirname != "." && $dirname != "..") {
				$parts = explode ( '.', $dirname );
				$ext = strtolower ( $parts [count ( $parts ) - 1] );
				
				if (in_array ( $ext, $icon_types )) {
					$option = $parts [count ( $parts ) - 2];
					if( strpos($option, '@2x') === false)
						$sociables [$dirname] = str_replace ( ' ', '', $option );
				}
			}
		}
		closedir ( $handle );
	}
	
	return $sociables;
}
// # --- **** dttheme_listImage() *** --- ###

/**
 * dttheme_admin_color_picker()
 * Objective:
 * Outputs the wordpress default color picker.
 * Args:
 * 1.Label
 * 2.Name
 * 3.Value - stored in db
 * 4.Tooltip
 */
function dttheme_admin_color_picker($label, $name, $value, $tooltip = NULL) {
	global $wp_version;
	
	echo "<div class='bpanel-option-set'>\n";
	if (! empty ( $label )) :
		echo '<label>'.esc_html( $label ).'</label>';
		echo '<div class="clear"></div>';	
	endif;
	
	if (( float ) $wp_version >= 3.5) :
		echo "<input type='text' class='my-color-field medium' name='".esc_attr($name)."' value='".esc_attr($value)."'/>";
	 else :
		echo "<input type='text' class='medium color_picker_element' name='".esc_attr($name)."' value='".esc_attr($value)."'/>";
		echo "<div class='color_picker'></div>";
	endif;

	if ($tooltip != NULL) :
		dttheme_adminpanel_tooltip ( $tooltip );
	endif;
	echo "</div>\n";
}
// # --- **** dttheme_admin_color_picker() *** --- ###

/**
 * dttheme_admin_fonts()
 * Objective:
 * Outputs the fonts selection box.
 */
function dttheme_admin_fonts($label, $name, $selctedFont) {
	global $dt_google_fonts;
	$f = IAMD_SAMPLE_FONT;
	$css = (! empty ( $selctedFont )) ? 'style="font-family:' . esc_attr( $selctedFont ). ';"' : '';
	echo "<div class='mytheme-font-preview' {$css}>{$f}</div>";
	echo '<label>'.esc_html( $label ).'</label>';
	echo "<div class='clear'></div>";
	echo "<select class='mytheme-font-family-selector' name='".esc_attr($name)."'>";
	echo 	"<option value=''>" . __ ( "Select", 'dt_themes' ) . "</option>";
			foreach ( $dt_google_fonts as $fonts ) :
				echo '<option value="'.esc_attr($fonts).'" '.selected( $selctedFont, $fonts, false ).'>'.esc_attr( $fonts ).'</option>';
			endforeach;
	echo "</select>";
}
// # --- **** dttheme_admin_fonts() *** --- ###

/**
 * dttheme_admin_jqueryuislider()
 * Objective:
 * Outputs the jQurey UI Slider.
 */
function dttheme_admin_jqueryuislider($label, $id = '', $value = '', $px = "px") {
	$div_value = (! empty ( $value ) && ($px == "px")) ? $value . "px" : $value;
	echo '<label>'.$label.'</label>';
	echo '<div class="clear"></div>';
	echo "<div id='".esc_attr( $id )."' class='mytheme-slider' data-for='".esc_attr( $px )."'></div>";
	echo "<input type='hidden' class='' name='".esc_attr($id)."' value='".esc_attr($value)."'/>";
	echo "<div class='mytheme-slider-txt'>".esc_html( $div_value ).'</div>';	
}
// # --- **** dttheme_admin_jqueryuislider() *** --- ###

/**
 * getFolders()
 * Objective:
 */
function getFolders($directory, $starting_with = "", $sorting_order = 0) {
	if (! is_dir ( $directory ))
		return false;
	$dirs = array ();
	$handle = opendir ( $directory );
	while ( false !== ($dirname = readdir ( $handle )) ) {
		if ($dirname != "." && $dirname != ".." && is_dir ( $directory . "/" . $dirname )) {
			if ($starting_with == "")
				$dirs [] = $dirname;
			else {
				$filter = strstr ( $dirname, $starting_with );
				if ($filter !== false)
					$dirs [] = $dirname;
			}
		}
	}
	
	closedir ( $handle );
	
	if ($sorting_order == 1) {
		rsort ( $dirs );
	} else {
		sort ( $dirs );
	}
	return $dirs;
}
// # --- **** getFolders() *** --- ###

/**
 * dttheme_switch()
 * Objective:
 * Outputs the switch control at the backend.
 */
function dttheme_switch($label, $parent, $name) {

	$id = 'mytheme-'.$parent.'-'.$name;
	
	$checked = ("true" == dttheme_option ( $parent, $name )) ? ' checked="checked"' : '';
	$switchclass = ("true" == dttheme_option ( $parent, $name )) ? 'checkbox-switch-on' : 'checkbox-switch-off';

	$name = 'mytheme['.$parent.']['.$name.']';
	echo "<div data-for='".esc_attr( $id )."' class='checkbox-switch ".esc_attr($switchclass)."'></div>";
	echo "<input id='".esc_attr( $id )."' class='hidden' name='".esc_attr( $name )."' type='checkbox' value='true' {$checked} />";
}
// # --- **** dttheme_switch() *** --- ###

/**
 * dttheme_switch()
 * Objective:
 * Outputs the switch control at the backend.
 */
function dttheme_switch_page($label, $name, $value, $datafor = NULL) {
	$checked = ("true" == $value) ? ' checked="checked"' : '';
	$switchclass = ("true" == $value) ? 'checkbox-switch-on' : 'checkbox-switch-off';
	$datafor = ($datafor == NULL) ? $name : $datafor;
	echo "<label>".esc_html( $label )."</label>";
	echo '<div class="clear"></div>';
	echo "<div data-for='".esc_attr( $datafor )."' class='checkbox-switch ".esc_attr( $switchclass )."'></div>";
	echo "<input id='".esc_attr( $datafor )."' class='hidden' name='".esc_attr( $name )."' type='checkbox' value='true' {$checked}/>";
}
// # --- **** dttheme_switch() *** --- ###

/**
 * dttheme_bgtypes()
 * Objective:
 * Outputs the <select></select> control at the backend.
 */
function dttheme_bgtypes($name, $parent, $child) {
	$args = array (
		"bg-patterns" => __ ( "Pattern", 'dt_themes' ),
		"bg-custom" => __ ( "Custom Background", 'dt_themes' ),
		"bg-none" => __ ( "None", 'dt_themes' ) );
		
	echo '<div class="bpanel-option-set">';
	echo "<label>" . __ ( "Background Type", 'dt_themes' ) . "</label>";
	echo "<div class='clear'></div>";
	echo "<select class='bg-type' name='".esc_attr($name)."'>";
			foreach ( $args as $k => $v ) :
				echo "<option value='".esc_attr($k)."' ".selected( $k, dttheme_option( $parent, $child ), false ).">".esc_html($v)."</option>";
			endforeach;
	echo "</select>";
	echo '</div>';
}
### --- ****  dttheme_bgtypes() *** --- ###

function dttheme_standard_font($label, $name, $selectedFont ){
	$fonts = array("Arial","Verdana, Geneva","Trebuchet","Georgia","Times New Roman","Tahoma, Geneva","Palatino","Helvetica");
	
	echo "<label>".esc_html( $label )."</label>";
	echo "<div class='clear'></div>";
	echo "<select class='mytheme-select' name='".esc_attr( $name )."'>";
	echo 	"<option value=''>" . __ ( "Select", 'dt_themes' ) . "</option>";
			foreach ( $fonts as $font ) {
				echo '<option '.selected ( $font, $selectedFont, false ).' value="'.esc_attr( $font ).'">'.esc_html( $font ).'</option>';
			}
	echo "</select>";
}

function dttheme_standard_font_style($label, $name, $selectedFontStyle) {
	$styles = array("Normal","Italic","Bold","Bold Italic");
	
	echo "<label>".esc_html( $label )."</label>";
	echo "<div class='clear'></div>";
	echo "<select class='mytheme-select' name='".esc_attr( $name )."'>";
	echo 	"<option value=''>" . __ ( "Select", 'dt_themes' ) . "</option>";
			foreach ( $styles as $style ) {
				echo '<option '.selected ( $style, $selectedFontStyle, false ).' value="'.esc_attr( $style ).'">'.esc_html( $style ).'</option>';
			}
	echo "</select>";
}?>