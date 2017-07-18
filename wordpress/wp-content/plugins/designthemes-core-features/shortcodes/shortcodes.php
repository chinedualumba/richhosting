<?php
class DTCoreShortcodesDefination {
	
	function __construct() {
		
		/* Accordion Shortcode */
		add_shortcode ( "dt_sc_accordion_group", array (
			$this,
			"dt_sc_accordion_group" 
		) );

		/* Button Shortcode */
		add_shortcode ( "dt_sc_button", array (
			$this,
			"dt_sc_button" 
		) );

		/* BlockQuotes Shortcode */
		add_shortcode ( "dt_sc_blockquote", array (
			$this,
			"dt_sc_blockquote" 
		) );

		/* Callout Box Shortcode */
		add_shortcode ( "dt_sc_callout_box", array (
			$this,
			"dt_sc_callout_box"
		) );

		/* Columns Shortcode */

		add_shortcode ( "dt_sc_full_width", array ( 
			$this,
			"dt_sc_columns"
		) );
		add_shortcode ( "dt_sc_one_half", array (
			$this,
			"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_one_third", array (
			$this,
			"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_one_fourth", array (
			$this,
			"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_one_fifth", array (
			$this,
			"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_one_sixth", array (
			$this,
			"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_two_sixth", array (
			$this,
			"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_two_third", array (
			$this,
			"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_three_fourth", array (
			$this,
			"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_two_fifth", array (
			$this,
			"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_three_fifth", array (
			$this,
			"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_four_fifth", array (
			$this,
			"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_three_sixth", array (
			$this,
			"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_four_sixth", array (
			$this,
			"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_five_sixth", array (
			$this,
			"dt_sc_columns" 
		) );

		/* Column with inner */
		add_shortcode ( "dt_sc_one_half_inner", array (
			$this,
			"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_one_third_inner", array (
			$this,
			"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_one_fourth_inner", array (
			$this,
			"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_one_fifth_inner", array (
			$this,
			"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_one_sixth_inner", array (
			$this,
			"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_two_sixth_inner", array (
			$this,
			"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_two_third_inner", array (
			$this,
			"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_three_fourth_inner", array (
			$this,
			"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_two_fifth_inner", array (
			$this,
			"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_three_fifth_inner", array (
			$this,
			"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_four_four_inner", array (
			$this,
			"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_three_sixth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_four_sixth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_five_sixth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_four_fifth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		/* Resizeable Column */
		add_shortcode ( "dt_sc_resizable", array ( 
			$this,
			"dt_sc_resizable"
		) );

		add_shortcode ( "dt_sc_resizable_inner", array (
			$this,
			"dt_sc_resizable"
		) );

		/* Contact Information */
		#Email
		add_shortcode ( "dt_sc_email", array (
				$this,
				"dt_sc_email"
		) );

		add_shortcode( "dt_sc_contact", array (
				$this,
				"dt_sc_contact"
		) );

		add_shortcode( "dt_sc_web", array(
				$this,
				"dt_sc_web"
		) );
		/* Contact Information End */

		/* Clients Carousel Shortcode */
		add_shortcode ( "dt_sc_carousel", array (
			$this,
			"dt_sc_carousel"
		) );

		add_shortcode ( "dt_sc_carousel_slider", array (
			$this,
			"dt_sc_carousel_slider"
		) );

		/* Donutchart Start */
		add_shortcode ( "dt_sc_donutchart", array ( 
				$this,
				"dt_sc_donutchart"
		) );
		/* Donutchart End */
		
		/* Dividers */
		
		/* Clear Shortcode */
		add_shortcode ( "dt_sc_clear", array ( 
				$this,
				"dt_sc_clear"
		) );
		
		/* HR With Border */

		add_shortcode ( "dt_sc_hr", array (
				$this,
				"dt_sc_dividers" 
		) );
		
		#Page Builder
		add_shortcode( "dt_sc_hr_top", array(
			$this,
			"dt_sc_hr_top"
		) );

		add_shortcode ( "dt_sc_hr_medium", array (
				$this,
				"dt_sc_dividers" 
		) );
		
		add_shortcode ( "dt_sc_hr_large", array (
				$this,
				"dt_sc_dividers" 
		) );
		
		add_shortcode ( "dt_sc_hr_invisible", array (
				$this,
				"dt_sc_dividers" 
		) );
	
		add_shortcode ( "dt_sc_hr_invisible_small", array (
				$this,
				"dt_sc_dividers" 
		) );

		add_shortcode ( "dt_sc_hr_invisible_very_small", array (
				$this,
				"dt_sc_dividers" 
		) );

		add_shortcode ( "dt_sc_hr_invisible_medium", array (
				$this,
				"dt_sc_dividers" 
		) );
		
		add_shortcode ( "dt_sc_hr_invisible_large", array (
				$this,
				"dt_sc_dividers" 
		) );

		add_shortcode( "dt_sc_hr_with_icon" , array(
			$this,
			"dt_sc_hr_with_icon"
		) );
		/* Dividers End */
		
		/* Icon Boxes Shortcode */
		add_shortcode ( "dt_sc_icon_box", array (
				$this,
				"dt_sc_icon_box" 
		) );
		/* Icon Boxes Shortcode End*/

		/* Icon Boxes Shortcode */
		add_shortcode ( "dt_sc_icon_box_colored", array (
				$this,
				"dt_sc_icon_box_colored" 
		) );
		/* Icon Boxes Shortcode End*/
		

		/* Dropcap Shortcode */
		add_shortcode ( "dt_sc_dropcap", array (
				$this,
				"dt_sc_dropcap" 
		) );
		
		/* Code Shortcode */
		add_shortcode ( "dt_sc_code", array (
				$this,
				"dt_sc_code" 
		) );

		/* Ordered List Shortcode */
		add_shortcode ( "dt_sc_fancy_ol", array (
				$this,
				"dt_sc_fancy_ol" 
		) );
		
		/* Unordered List Shortcode */
		add_shortcode ( "dt_sc_fancy_ul", array (
				$this,
				"dt_sc_fancy_ul" 
		) );

		/* Pricing Table */
		add_shortcode ( "dt_sc_pricing_table", array (
				$this,
				"dt_sc_pricing_table" 
		) );

		//Added for PB purpose
		add_shortcode( "dt_sc_pricing_table_2", array(
				$this,
				"dt_sc_pricing_table"
		) );

		/* Pricing Table Item 1*/
		add_shortcode ( "dt_sc_pricing_table_item_1", array (
			$this,
			"dt_sc_pricing_table_item_1" 
		) );

		/* Pricing Table Item 3*/
		add_shortcode ( "dt_sc_pricing_table_item_3", array (
			$this,
			"dt_sc_pricing_table_item_3" 
		) );

		/* Progress Bar Shortcode */
		add_shortcode ( "dt_sc_progressbar", array (
				$this,
				"dt_sc_progressbar" 
		) );

		/* Tabs */
		add_shortcode ( "dt_sc_tab", array (
				$this,
				"dt_sc_tab" 
		) );

		add_shortcode ( "dt_sc_tabs_horizontal", array (
				$this,
				"dt_sc_tabs_horizontal" 
		) );

		add_shortcode ( "dt_sc_tabs_vertical", array (
				$this,
				"dt_sc_tabs_vertical" 
		) );

		/* Team Shortcode */
		add_shortcode ( "dt_sc_team", array (
				$this,
				"dt_sc_team" 
		) );

		add_shortcode ( "dt_sc_team_carousel", array (
				$this,
				"dt_sc_team_carousel"
		) );

		/* Testimonial Shortcode */
		add_shortcode ( "dt_sc_testimonial", array (
			$this,
			"dt_sc_testimonial" 
		) );
		
		/* Testimonial Carousel Shortcode */
		add_shortcode ( "dt_sc_testimonial_carousel", array (
			$this,
			"dt_sc_testimonial_carousel"
		) );

		/* Title Shortcode */
		add_shortcode ( "dt_sc_title", array (
			$this,
			"dt_sc_title" 
		) );

		add_shortcode ( "dt_sc_title_styled", array (
			$this,
			"dt_sc_title_styled" 
		) );

		add_shortcode ( "dt_sc_icon_title", array (
			$this,
			"dt_sc_icon_title" 
		) );

		/* Title Shortcode End */

		/* Toggle Shortcode */
		add_shortcode ( "dt_sc_toggle", array (
			$this,
			"dt_sc_toggle" 
		) );

		/* Toogle Framed Shortcode */
		add_shortcode ( "dt_sc_toggle_framed", array (
			$this,
			"dt_sc_toggle_framed" 
		) );
		
		/* Titles Box Shortcode */
		add_shortcode ( "dt_sc_titled_box", array (
			$this,
			"dt_sc_titled_box" 
		) );
		
		/* Tooltip Shortcode */
		add_shortcode ( "dt_sc_tooltip", array (
			$this,
			"dt_sc_tooltip"
		) );
		
		/* PullQuotes Shortcode */
		add_shortcode ( "dt_sc_pullquote", array (
			$this,
			"dt_sc_pullquote" 
		) );

		/* Full width Shortcode*/
		add_shortcode("dt_sc_fullwidth_section", array(
			$this,
			"dt_sc_fullwidth_section"
		) );

		add_shortcode("dt_sc_semi_fullwidth_section", array(
			$this,
			"dt_sc_semi_fullwidth_section"
		) );

		/* Full Width Video Shortcode */
		add_shortcode("dt_sc_fullwidth_video", array(
			$this,
			"dt_sc_fullwidth_video"
		));

		/* Animation */
		add_shortcode("dt_sc_animation", array(
			$this,
			"dt_sc_animation"
		) );

		add_shortcode("dt_sc_animate_number", array(
			$this,
			"dt_sc_animate_number"
		));

		/* Post & Recent Post Shortcode */
		add_shortcode("dt_sc_post", array ( 
			$this,
			"dt_sc_post"
		) );

		add_shortcode("dt_sc_recent_post", array ( 
			$this,
			"dt_sc_recent_post"
		) );

		add_shortcode( "dt_sc_social", array(
			$this,
			"dt_sc_social"
		) );

		/* Portfolio */
		add_shortcode( "dt_sc_portfolio_item" , array(
			$this,
			"dt_sc_portfolio_item"
		) );

		add_shortcode( "dt_sc_recent_portfolio" , array(
			$this,
			"dt_sc_recent_portfolio"
		) );

		add_shortcode( 'dt_sc_pricing_box' , array( 
			$this,
			"dt_sc_pricing_box"
		) );

		add_shortcode('dt_sc_fontawesome', array(
			$this,
			'dt_sc_fontawesome'
		) );

		add_shortcode( 'dt_sc_slider' , array(
			$this,
			'dt_sc_slider'
		) );

		add_shortcode( 'dt_sc_slider_control' , array(
			$this,
			'dt_sc_slider_control'
		) );
		
		// Domain Search Form
		add_shortcode( 'dt_sc_domain_search_form' , array(
			$this,
			'dt_sc_domain_search_form'
		) );
		
		// Domain Carousel		
		add_shortcode( 'dt_sc_domains_carousel', array(
			$this,
			'dt_sc_domains_carousel'
		) );

		add_shortcode( 'dt_sc_domain', array(
			$this,
			'dt_sc_domain'
		) );
		
		// FAQ Carousel
		add_shortcode( 'dt_sc_faqs_carousel' , array(
			$this,
			'dt_sc_domains_carousel'
		) );
		
		//FAQ
		add_shortcode( 'dt_sc_faq' , array(
			$this,
			'dt_sc_faq'
		) );

		/* Widget Shortcodes */
		add_shortcode ( "dt_sc_widgets", array ( $this, "dt_sc_widgets" ) );
		
		/* Do Shortcodes : Pagebuilder */
		add_shortcode ( "dt_sc_doshortcode", array ( $this, "dt_sc_doshortcode" ) );
		add_shortcode ( "dt_sc_multiple_icon_list", array ( $this, "dt_sc_doshortcode" ) ); # For Multiple Icon Lists
	}
	
	/**
	 *
	 * @param string $content
	 * @return string
	 */
	function dtShortcodeHelper($content = null) {

		$content = do_shortcode ( shortcode_unautop ( $content ) );
		$content = preg_replace ( '#^<\/p>|^<br \/>|<p>$#', '', $content );
		$content = preg_replace ( '#<br \/>#', '', $content );
		return trim ( $content );
	}
	
	/**
	 *
	 * @param string $dir        	
	 * @return multitype:
	 */
	function dtListImages($dir = null) {
		$images = array ();
		$icon_types = array (
				'jpg',
				'jpeg',
				'gif',
				'png' 
		);
		
		if (is_dir ( $dir )) {
			$handle = opendir ( $dir );
			while ( false !== ($dirname = readdir ( $handle )) ) {
				
				if ($dirname != "." && $dirname != "..") {
					$parts = explode ( '.', $dirname );
					$ext = strtolower ( $parts [count ( $parts ) - 1] );
					
					if (in_array ( $ext, $icon_types )) {
						$option = $parts [count ( $parts ) - 2];
						if( strpos($option, '@2x') === false)
							$images [$dirname] = str_replace ( ' ', '', $option );
					}
				}
			}
			closedir ( $handle );
		}
		
		return $images;
	}
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_accordion_group($attrs, $content = null) {

		extract ( shortcode_atts ( array (
			'class' =>''
		), $attrs ) );

		$out = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out = str_replace ( "<h5 class='dt-sc-toggle", "<h5 class='dt-sc-toggle-accordion ", $out );
		$out = "<div class='dt-sc-toggle-set {$class}'>{$out}</div>";
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_button($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'size' => '',
				'link' => '#',
				'type' => '',
				'icon' => '',
				'target' => '',
				'variation' => '',
				'bgcolor' => '',
				'textcolor' => '',
				'class' =>''
		), $attrs ) );
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

		if( ($type == "with-icon") && !empty($icon)  ){
			$content = "<span>".$content."</span> <i class='fa {$icon}'> </i>"; 
		}
		
		$size = ($size == 'xlarge') ? ' xlarge' : $size;
		$size = ($size == 'large') ? ' large' : $size;
		$size = ($size == 'medium') ? ' medium' : $size;
		$size = ($size == 'small') ? ' small' : $size;
		
		$target = empty($target) ? 'target="_blank"' : "target='{$target}' ";
		
		$variation = (($variation) && (empty ( $bgcolor ))) ? ' ' . $variation : '';
		
		$styles = array ();
		if ($bgcolor)
			$styles [] = 'background-color:' . $bgcolor . ';border-color:' . $bgcolor . ';';
		if ($textcolor)
			$styles [] = 'color:' . $textcolor . ';';
		$style = join ( '', array_unique ( $styles ) );
		$style = ! empty ( $style ) ? ' style="' . $style . '"' : '';
		
		if(preg_match('#^{{#', $link) === 1) {
			$link =  str_replace ( '{{', '[', $link );
			$link =  str_replace ( '}}', '/]', $link );
			$link = do_shortcode($link);
		}else{
			$link = esc_url ( $link );
		}
		
		$out = "<a href='{$link}' {$target} class='dt-sc-button {$class} {$size} {$variation} {$type}' {$style}>{$content}</a>";
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_blockquote($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'align' => '',
				'variation' => '',
				'textcolor' => '',
				'cite'=> ''		
		), $attrs ) );
		
		$class = array();
		if( preg_match( '/left|right|center/', trim( $align ) ) )
			$class[] = ' align' . $align;
		if( $variation)
			$class[] = ' ' . $variation;
		
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = strip_tags($content);
		$content = ! empty ( $content ) ? "<q>{$content}</q>" : "";
		
		$cite = ! empty ( $cite ) ? '&ndash; ' .$cite : "";
		$cite = !empty( $cite ) ? "<cite>$cite</cite>" : "";
		
		$style = ( $textcolor ) ? ' style="color:' . $textcolor . ';"' : '';
		$class = join( '', array_unique( $class ) );

		$out = "<blockquote class='{$class}' {$style}>{$content}{$cite}</blockquote>";
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_callout_box($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'type' => "type1",
				'link' => '#',
				'button_text'=> __('Purchase Now','dt_themes'),
				'variation' => '',
				'icon' =>'',
				'target' => '',
				'class' => ''
		), $attrs ) );

		$attribute = !empty($icon) ? "class='dt-sc-callout-box with-icon {$type} {$class} {$variation}' " :" class='dt-sc-callout-box {$type} {$class} {$variation}' ";

		$target = empty($target) ? 'target="_blank"' : "target='{$target}' ";
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

		$out = "<div {$attribute}>";
		$out .= ( !empty( $title ) ) ? "<h2>{$title}</h2>" : "";
		$out .= ( $type == 'type2' or $type == 'type5') ? '<div class="column dt-sc-four-fifth first">' : "";
		if( !empty( $icon ) ):
			$out .= '<div class="icon">';
			$out .= "<span class='fa {$icon}'></span>";
			$out .= '</div>';
		endif;
		$out .= $content;
		
		$out .= ( $type == 'type2' ) ? '</div>' : '';
			
		$out .= ( $type == 'type2' ) ? '<div class="column dt-sc-one-fifth">' : '';
		$out .= ( !empty($link) ) ? "<a href='{$link}' class='dt-sc-button medium' {$target}>{$button_text}</a>" : "";
		$out .= ( $type == 'type2' ) ? '</div>' : '';
		$out .= "</div>";
		
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @param string $shortcodename        	
	 * @return string
	 */
	function dt_sc_columns($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
			'id' => '',
			'class' => '',
			'style' => '' ,
			'type' => ''
		), $attrs ) );

		$shortcodename = str_replace ( "_", "-", $shortcodename );
		$shortcodename = str_replace ( "-inner", "", $shortcodename );
		
		$id = ($id != '') ? " id = '{$id}'" : '';
		$style = !empty( $style ) ? " style='{$style}' ": "";

		if( trim($type) == 'type2' ):
			$type = "no-space";
		elseif( trim($type) == 'type1'):
			$type = "space";
		else:
			$type = "";
		endif;	

		$first = (isset ( $attrs [0] ) && trim ( $attrs [0] == 'first' )) ? 'first' : '';
		$first = (isset ( $attrs [0] ) && trim ( $attrs [0] == 'last' )) ? 'last' : $first;

		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out = "<div {$id} class='column {$shortcodename} {$class} {$type} {$first}' {$style} >{$content}</div>";
		return $out;
	}

	/* Contact Information */
	/**
	 * Shortcode : Email id
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	 function dt_sc_email($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'icon' => '',
				'emailid' => '',
				'text' => ''
		), $attrs ) );

		$out = '<p class="dt-sc-contact-info">';
		$out .= !empty( $icon ) ? "<i class='fa {$icon}'></i>" : "";
		$out .= !empty( $text ) ? '<span>'.esc_html( $text ).'</span> : ' : "";
		$out .= ( !empty($emailid) ) ? "<a href='mailto:$emailid'>{$emailid}</a>" : "";
		$out .= '</p>';
		return $out;
	 }

	function dt_sc_contact( $attrs, $content = null ){
		extract( shortcode_atts( array(
			'title' =>'',
			'detail' =>'',
			'icon'=>'',
			'text'=>''
		), $attrs));

		$out  = '<p class="dt-sc-contact-info">';
		$out .= !empty( $icon ) ? "<i class='fa {$icon}'></i>" : "";
		$out .= !empty( $text ) ? '<span>'.esc_html( $text ).'</span> : ' : "";
		$out .= !empty( $detail ) ? $detail : "";
		$out .= '</p>';
		return $out;
	} 

	function dt_sc_web( $attrs, $content = null ){
		extract ( shortcode_atts ( array (
				'icon' => '',
				'url' => '',
				'text' => '',
				'target' => '',
		), $attrs ) );

		$out = '<p class="dt-sc-contact-info">';
		$out .= !empty( $icon ) ? "<i class='fa {$icon}'></i>" : "";
		$out .= !empty( $text ) ? '<span>'.esc_html( $text ).'</span> : ' : "";
		if( !empty($url) ) {

			$host = parse_url($url,PHP_URL_HOST);
			if (!$host)
				 $host = $url;

			if (substr($host, 0, 4) == "www.")
				$host = substr($host, 4);

			$out .= ( !empty($url) ) ? "<a href='$url' target='{$target}'>{$host}</a>" : "";
		}
		$out .= '</p>';
		return $out;
	}
	/* Contact Information End*/

	/* Client Carousel */
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_carousel($attrs, $content = null) {

		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = str_replace( '<ul>', "<ul class='dt-sc-sponsor-carousel'>", $content );
		
		
		$out = "<div class='dt-sc-sponsor-carousel-wrapper' data-min='1' data-max='5' data-width='230'>";
		$out .= $content;
		$out .= '</div>';
		return $out;
	}

	function dt_sc_carousel_slider( $attrs , $content = null ){
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = str_replace( '<ul>', "<ul class='page-slider'>", $content );
		return $content;
	}

	/* Client Carousel End*/
	
	/* Dividers */
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_clear($attrs, $content = null) {
		return '<div class="dt-sc-clear"></div>';
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_hr_border($attrs, $content = null) {
		return '<div class="dt-sc-hr-border"></div>';
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @param string $shortcodename        	
	 * @return string
	 */
	function dt_sc_donutchart($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
				'title' => '',
				'subtitle' => '',
				'bgcolor' => '',
				'fgcolor' => '',
				'textcolor' =>'',
				'percent' =>'30',
				'toptext' => '',
				'bottomtext' => ''
		), $attrs ) );
		

		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

		$toptext = !empty($toptext) ? "{$toptext}<br>" : "";
		$bottomtext = !empty($bottomtext) ?"<span>{$bottomtext}</span>":"";
		
		$out = '<div class="dt-sc-progress-bar-wrapper">';
		$out .= " <div class='dt-sc-donutchart' data-percent='{$percent}' data-textcolor='{$textcolor}' data-bgcolor='{$bgcolor}' data-fgcolor='$fgcolor'>".$toptext.$bottomtext."</div>";
		$out .= '		<div class="dt-sc-progress-bar-content">';
		$out .= 			( empty($title) ) ? $out : "<h4>{$title}</h4>";
		$out .= 			( empty($subtitle) ) ? $out : "<span class='code'>{$subtitle}</span>";
		$out .= 			$content;
		$out .= '		</div>';
		$out .= '</div>';
		return $out;
	}

	// Added for page builder
	function dt_sc_hr_top( $attrs, $content = null, $shortcode = "" ){
		return do_shortcode("[dt_sc_hr top]");
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @param string $shortcodename        	
	 * @return string
	 */
	function dt_sc_dividers($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
				'class' => '',
				'top' => '' 
		), $attrs ) );
		
		if ("dt_sc_hr" === $shortcodename || "dt_sc_hr_medium" === $shortcodename || "dt_sc_hr_large" === $shortcodename) {
			
			$shortcodename = str_replace ( "_", "-", $shortcodename );
			
			$out = "<div class='{$shortcodename} {$class}'>";
			
			if ((isset ( $attrs [0] ) && trim ( $attrs [0] == 'top' ))) {
				
				$out = "<div class='{$shortcodename} top {$class}'>";
				$out .= "<a href='#top' class='scrollTop'><span class='fa fa-angle-up'></span>" . __ ( "top", 'dt_themes' ) . "</a>";
			}
			
			$out .= "</div>";
		} else {
			$shortcodename = str_replace ( "_", "-", $shortcodename );
			$out = "<div class='{$shortcodename}  {$class}'></div>";
		}
		return $out;
	}

	function dt_sc_hr_with_icon( $attrs , $content = null , $shortcodename = "" ){
		extract ( shortcode_atts ( array (
				'fontawesome' => '',
				'icon' => '',
		), $attrs ) );

		$out = "";

		$out .= '<div class="dt-sc-hr-border">';
		if( !empty($fontawesome) ) {

			$out .= '<span class="fa '.$fontawesome.'"></span>';
		}elseif( !empty($icon) ){
			$out .= '<span><img src="'.$icon.'"/></span>';
		}
		$out .= '</div>';
		return $out;
	}
	/* Dividers End*/
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @param string $shortcodename        	
	 * @return string
	 */
	function dt_sc_icon_box($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
				'type' => '',
				'fontawesome' => '',
				'icon' => '',
				'align' => ''
		), $attrs ) );
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

		$start = $end = "";


		switch($type) {

			case 'type1':
				$start = '<div class="dt-sc-ico-content-wrapper type1">';
				$end = '</div>';
			break;

			case 'type2':
				$start = '<div class="dt-sc-ico-content-wrapper type2">';
				$end = '</div>';
			break;

			case 'type3':
				$start = '<div class="dt-sc-ico-content-wrapper type2 frameless">';
				$end = '</div>';
				$type = "type2";
			break;

			case 'type4':
				$type = "type3";
			break;

			case 'type5':
				$type = "type4";
			break;
		}

		$out = $start;
		$out .= "<div class='dt-sc-ico-content {$align} {$type}'>";

		if( !empty($fontawesome)):
			$out .= "<div class='icon'><span class='fa {$fontawesome}'> </span></div>";
		elseif( !empty($icon) ):
			$out .= "<div class='icon'><span><img src='{$icon}'/></span></div>";
		endif;

		$out .= $content;
		$out .= '</div>';
		$out .= $end;
		return $out;
	}
	/* Icon Boxes Short code End*/

	/* Icon Boxes Colored Short code */
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @param string $shortcodename        	
	 * @return string
	 */
	function dt_sc_icon_box_colored($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
			'fontawesome_icon' => '',
			'title' => '',
			'bgcolor' => '',
		), $attrs ) );
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

		$bgcolor = empty ( $bgcolor ) ? "" : " style='background:{$bgcolor};' ";

		$out  = "<div class='dt-sc-colored-box' {$bgcolor}>";

		$out .= !empty( $title ) ? "<h2>" : "";
		$out .= !empty( $fontawesome_icon ) ? "<span class='fa {$fontawesome_icon}'></span>" : "";
		$out .= !empty( $title ) ? $title : "";
		$out .= !empty( $title ) ? "</h2>" : "";
		$out .= $content;
		$out .= '</div>';
		
		return $out;
	}
	/* Icon Boxes Colored Short code End */

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @param string $shortcodename        	
	 * @return string
	 */
	function dt_sc_dropcap($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
			'type' => '',
			'variation' => '',
			'bgcolor' => '',
			'textcolor' => '' 
		), $attrs ) );
		
		$type = str_replace ( " ", "-", $type );
		$type = "dt-sc-dropcap-".strtolower ( $type );
		
		$bgcolor = ( $type == 'dt-sc-dropcap-default') ? "" : $bgcolor;
		$variation = ( ( $variation ) && ( empty( $bgcolor ) ) ) ? ' ' . $variation : '';
		
		$styles = array();
		if($bgcolor) $styles[] = 'background-color:' . $bgcolor . ';';
		if($textcolor) $styles[] = 'color:' . $textcolor . ';border-color:' . $textcolor . ';';;
		$style = join('', array_unique( $styles ) );
		$style = !empty( $style ) ? ' style="' . $style . '"': '' ;
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		
		$out = "<span class='dt-sc-dropcap $type {$variation}' {$style}>{$content}</span>";
		return $out;
	}
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_code($attrs, $content = null) {
		$array = array (
			'[' => '&#91;',
			']' => '&#93;',
			'/' => '&#47;',
			'<' => '&#60;',
			'>' => '&#62;',
			'<br />' => '&nbsp;' 
		);
		
		$content = strtr ( $content, $array );
		$out = "<pre>{$content}</pre>";
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return mixed
	 */
	function dt_sc_fancy_ol($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'style' => '',
				'variation' => '',
				'class' => '' 
		), $attrs ) );
		
		$style = ($style) ? trim ( $style ) : 'decimal';
		$class = ($class) ? trim ( $class ) : '';
		$variation = ($variation) ? ' ' . trim ( $variation ) : '';
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = str_replace ( '<ol>', "<ol class='dt-sc-fancy-list {$variation} {$class} {$style}'>", $content );
		$content = str_replace ( '<li>', '<li><span>', $content );
		$content = str_replace ( '</li>', '</span></li>', $content );
		return $content;
	}
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return mixed
	 */
	function dt_sc_fancy_ul($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'style' => '',
				'variation' => '',
				'class' => '' 
		), $attrs ) );
		$style = ($style) ? trim ( $style ) : '';
		$class = ($class) ? trim ( $class ) : '';
		$variation = ($variation) ? ' ' . trim ( $variation ) : '';
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = str_replace ( '<ul>', "<ul class='dt-sc-fancy-list {$variation} {$class} {$style}'>", $content );
		return $content;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_pricing_table($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => 'type1',
		), $attrs ) );

		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		return "<div class='dt-sc-pricing-table ".$class."'>" . $content . '</div>';
	}

	function dt_sc_pricing_table_item_1( $attrs , $content = null ){
		extract ( shortcode_atts ( array (
				"title" =>'',
				"button_text" => __ ( "View All", 'dt_themes' ),
				"button_link" => "#",
				'currency' => '$',
				'price' => '',
				'per' => '',
		), $attrs ) );

		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = str_replace ( '<ul>', '<ul class="dt-sc-tb-content">', $content );
		$content = str_replace ( '<ol>', '<ul class="dt-sc-tb-content">', $content );
		$content = str_replace ( '</ol>', '</ul>', $content );

		$selected = (isset ( $attrs [0] ) && trim ( $attrs [0] == 'selected' )) ? 'selected' : '';

		$out  = '<div class="dt-sc-pr-tb-col '.$selected.'">';
		$out .= '	<div class="dt-sc-tb-header">';
		$out .= '		<div class="dt-sc-price">';
		$out .= 		!empty( $currency ) ? '<sup>'.$currency.'</sup>' : "";
		$out .= 		!empty( $price ) ? $price : "";
		$out .= 		!empty( $per ) ? '<span>'.$per.'</span>' : "";
		$out .=	'		</div>';
		$out .= '		<div class="dt-sc-tb-title"><h5>'.$title.'</h5></div>';
		$out .= '		<div class="dt-sc-buy-now"><a href="'.$button_link.'" class="dt-sc-button medium">'.$button_text.'</a></div>';
		$out .= '	</div>';
		$out .= 	$content;
		$out .= '</div>';
		return $out;

	}

	function dt_sc_pricing_table_item_3( $attrs , $content = null ){
		extract ( shortcode_atts ( array (
				"title" =>'',
				"subtitle" => "",
				"fontawesome" => "",
				"icon" => '',
				"button_text" => __ ( "View All", 'dt_themes' ),
				"button_link" => "#",
				'currency' => '$',
				'saleprice' => '',
				'per' => '',
				'regularprice' => '',
		), $attrs ) );
		
		$selected = (isset ( $attrs [0] ) && trim ( $attrs [0] == 'selected' )) ? 'selected' : '';

		$button_link= do_shortcode($button_link);


		$out = "<div class='dt-sc-pr-tb-col $selected'>";
		$out .= '	<div class="icon">';
						if( !empty($fontawesome) ){
							$out .= "<span class='fa ".$fontawesome."'></span>";
						} elseif( !empty($icon) ){
							$out .= "<span><img src='".$icon."'/></span>";
						}
		$out .= '	</div>';
		$out .= '	<h3>'.$title.'</h3>';
		$out .= '	<span>'.$subtitle.'</span>';
		$out .= '	<div class="dt-sc-price">';
		$out .= '		<sup>'.$currency.'</sup>'.$saleprice.'<sub>'.$per.'</sub>';
		$out .= 		!empty($regularprice) ? '<del>'.$currency.$regularprice.'</del>' : "";
		$out .= '	</div>';
		$out .= "	<a href='".$button_link."' class='dt-sc-button medium'>".$button_text."</a>";
		$out .= '</div>';
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_progressbar($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type' => 'standard',
			'color' => '',
			'value' => '55'
		), $attrs ) );
		
		if( $type === 'standard' ){
			$type = "dt-sc-standard";
		}elseif( $type === 'progress-striped' ){
			$type = "dt-sc-progress-striped";
		}elseif( $type === 'progress-striped-active' ){
			$type = "dt-sc-progress-striped active";
		}

		
		$bgcolor = ! empty ( $color ) ? "style='background-color:$color;'" : "";
		$data_value = "data-value='$value'";

		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		#$content = $content.' - '.$value."%";

		$out  = "<div class='dt-sc-progress $type'>";
		$out .= "	<div class='dt-sc-bar' $bgcolor $data_value>";
		$out .= "		<div class='dt-sc-bar-text'>";
		$out .= 			$content;
		$out .= "			<span style='color:{$color};'>".$value."%</span>";
		$out .= "		</div>";
		$out .= "	</div>";
		$out .= '</div>';
		return $out;
	}
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_tab($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'title' => '' ,
		), $attrs ) );
		$out = '<li class="tab_head"><a href="#">'.$title. '</a></li><div class="tabs_content">' . DTCoreShortcodesDefination::dtShortcodeHelper ( $content ) . '</div>';
		return $out;
	}
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_tabs_horizontal($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '' 
		), $attrs ) );

		$aclass = ( $class == "type2" || $class == "type1") ? "dt-sc-tabs" : "dt-sc-tabs-frame";

		preg_match_all("/(.?)\[(dt_sc_tab)\b(.*?)(?:(\/))?\](?:(.+?)\[\/dt_sc_tab\])?(.?)/s", $content, $matches);

		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts( $matches[3][$i] );
		}

		$out = '<ul class="'.$aclass.'">';
			for($i = 0; $i < count($matches[0]); $i++) {
				$out .= '<li><a href="#">'.$matches[3][$i]['title'] . '</a></li>';
			}
		$out .= '</ul>';

		for($i = 0; $i < count($matches[0]); $i++) {
			$out .= '<div class="'.$aclass.'-content">' . DTCoreShortcodesDefination::dtShortcodeHelper($matches[5][$i]) . '</div>';
		}		
		return "<div class='dt-sc-tabs-container {$class}'>$out</div>";
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_tabs_vertical($attrs, $content = null) {

		preg_match_all("/(.?)\[(dt_sc_tab)\b(.*?)(?:(\/))?\](?:(.+?)\[\/dt_sc_tab\])?(.?)/s", $content, $matches);
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts( $matches[3][$i] );
		}

		$out = "<ul class='dt-sc-tabs-vertical-frame'>";
		for($i = 0; $i < count($matches[0]); $i++) {
			$out .= '<li><a href="#">'. $matches[3][$i]['title'] . '<span>'.$matches[3][$i]['number'].'</span></a></li>';
		}
		$out .= "</ul>";

		for($i = 0; $i < count($matches[0]); $i++) {
			$out .= '<div class="dt-sc-tabs-vertical-frame-content">' . DTCoreShortcodesDefination::dtShortcodeHelper($matches[5][$i]) . '</div>';
		}		
		return "<div class='dt-sc-tabs-vertical-container'>$out</div>";		
	}

	/**
	 *
	 * @param unknown $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_team($attrs, $content = null) {
		$attributes = array (
			'type' => '',
			'name' => '',
			'image' => 'http://placehold.it/300',
			'role' => '',
			'alt' => __('Please specify image url','dt_themes'),
			'title' => __('Please specify image url','dt_themes')
		);

		$sociables = array('fa-dribbble' => 'dribble', 'fa-flickr' => 'flickr', 'fa-github' => 'github', 'fa-pinterest' => 'pinterest','fa-twitter' => 'twitter', 'fa-youtube' => 'youtube', 'fa-android' => 'android', 'fa-dropbox' => 'dropbox', 'fa-instagram' => 'instagram', 'fa-windows' => 'windows', 'fa-apple' => 'apple', 'fa-facebook' => 'facebook', 'fa-google-plus' => 'google_plus', 'fa-linkedin' => 'linkedin', 'fa-skype' => 'skype', 'fa-tumblr' => 'tumblr', 'fa-vimeo-square' => 'vimeo');

		foreach ( $sociables as $sociable ) {
			$attributes [$sociable] = '';
		}

		extract ( shortcode_atts ( $attributes, $attrs ) );

		$image = "<img src='{$image}' alt='{$alt}' title='{$title}' />";
		$name = empty ( $name ) ? "" : "<h3>{$name}</h3>";
		$role = empty ( $role ) ? "" : "<h6>{$role}</h6>";

		$s = "";

		foreach ( $sociables as $key => $value ) {
			if(array_key_exists($value, $attrs)) {
				if( !empty($attrs[$value]) ) {
					$c = str_replace("_", "-", $value);
					$s .= '<li class="'.$c.'"><a class="fa '.$key.'" href="'.$attrs[$value].'" title="'.ucfirst($value).'"></a></li>';
				}
			}
		}
		$s = ! empty ( $s ) ? "<ul class='dt-sc-social-icons'>$s</ul>" : "";

		$out = "<div class='dt-sc-team {$type}'>";
			if( $type == "type1") {
				$out .= "<div class='dt-sc-team-thumb'><span class='image'>{$image}</span></div>";
				$out .= $name.$role;
				$out .= $s;
			} elseif( $type == "type2" ){
				$out .= "<div class='dt-sc-team-thumb'>";
				$out .=  	$image;
				$out .= "	<div class='dt-sc-thumb-overlay'>".$s.'</div>';
				$out .= '</div>';
				$out .= "<div class='dt-sc-team-details'>";
				$out .= $name.$role;
				$out .= '</div>';
			}	
		$out .= '</div>';
		return $out;
	}

	function dt_sc_team_carousel( $attrs , $content = null ){

		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = str_replace( '<ul>', "<ul class='dt-sc-team-carousel'>", $content );
		
		$out = "<div class='dt-sc-team-carousel-wrapper'>";
		$out .= '<div class="carousel-arrows">';
		$out .= '	<a href="" class="prev-arrow"> <span class="fa fa-angle-left"> </span> </a>';
		$out .= '	<a href="" class="next-arrow"> <span class="fa fa-angle-right"> </span> </a>';
		$out .= '</div>';
		$out .= $content;
		$out .= '</div>';
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_testimonial($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'name' => '',
				'role' => '',
				'image' => 'http://placehold.it/70'
		), $attrs ) );

		$image = "<img src='{$image}' alt='{$name}' title='{$name}' />";
		$image = "<span>{$image}</span>";

		$name = !empty($name) ? "<span> - {$name} </span>" : "";
		$role = !empty($role) ? " / {$role}":"";


		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

		$out = "";
		$out .= '<div class="dt-sc-testimonial-wrapper">';
		$out .= '	<div class="dt-sc-rounded-image">'.$image. '</div>';
		$out .= '		<div class="dt-sc-testimonial-content">';
		$out .= '			<blockquote> <span class="quote-shape"></span>';
		$out .= '				<p>'.$content.'</p>';
		$out .= '				<cite>'.$name.$role.'</cite>';
		$out .= '			</blockquote>';
		$out .= '		</div>';
		$out .= '</div>';
		return $out;
	}
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_testimonial_carousel($attrs, $content = null) {

		extract ( shortcode_atts ( array ( 'class' => '' ), $attrs ) );
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = str_replace( '<ul>', "<ul class='dt-sc-testimonial-carousel'>", $content );
		
		
		$out = "<div class='dt-sc-testimonial-carousel-wrapper {$class}'>";
		$out .= '<div class="carousel-arrows">';
		$out .= '	<a href="" class="prev-arrow"> <span class="fa fa-angle-left"> </span> </a>';
		$out .= '	<a href="" class="next-arrow"> <span class="fa fa-angle-right"> </span> </a>';
		$out .= '</div>';
		$out .= $content;
		$out .= '</div>';
		return $out;
	}

	function dt_sc_title( $attrs,$content = null , $shortcodename = "" ){
		extract ( shortcode_atts ( array (
			'type' => 'h2',
			'class' => '' 
		), $attrs ) );

		$out = "<{$type} class='dt-sc-hr-border-title {$class}'><span>";
		$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= "</span></{$type}>";
		return $out;	
	}

	function dt_sc_title_styled( $attrs,$content = null , $shortcodename = "" ){
		extract ( shortcode_atts ( array (
			'type' => 'h2',
			'class' => '',
			'style' => '',
			'span'	=> '' 
		), $attrs ) );

		$out = "<{$type} class='{$class}'>";
		if( $style == "left" ) {
			$out .= "<span>{$span}</span> ";
			$out .=  DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		} elseif( $style == "right"){
			$out .=  $span;
			$out .= " <span>".DTCoreShortcodesDefination::dtShortcodeHelper ( $content )."</span>";
		}	
		$out .= "</{$type}>";

		return $out;
	}

	function dt_sc_icon_title( $attrs,$content = null , $shortcodename = "" ){
		extract ( shortcode_atts ( array (
			'type' => 'h2',
			'class' => '',
			'fontawesome' => '',
		), $attrs ) );

		$out = "<{$type} class='dt-sc-ico-title center {$class}'>";
		$out .= "<span><i class='fa {$fontawesome}'></i></span>";
		$out .=  DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= "</{$type}>";
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_toggle($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'title' => '' 
		), $attrs ) );
		
		$out  = "<div class='dt-sc-toggle'>";
		$out .= "<h5 class='dt-sc-toggle'><a href='#'>{$title}</a></h5>";
		$out .= '<div class="dt-sc-toggle-content" style="display: none;">';
		$out .= '<div class="block">';
		$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= '</div>';
		$out .= '</div>';
		$out .= '</div>';
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_toggle_framed($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'title' => '' 
		), $attrs ) );
		
		$out = '<div class="dt-sc-toggle-frame">';
		$out .= "	<h5 class='dt-sc-toggle'><a href='#'>{$title}</a></h5>";
		$out .= '	<div class="dt-sc-toggle-content" style="display: none;">';
		$out .= '		<div class="block">';
		$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= '		</div>';
		$out .= '	</div>';
		$out .= '</div>';
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_titled_box($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'title' => '',
				'icon' => '',
				'type'	=> '',
				'variation' => '',
				'bgcolor' => '',
				'textcolor' => '' 
		), $attrs ) );
		
		$type = (empty($type)) ? 'dt-sc-titled-box' :"dt-sc-$type";
		$variation = ( ( $variation ) && ( empty( $bgcolor ) ) ) ? ' ' . $variation : '';
		$content = DTCoreShortcodesDefination::dtShortcodeHelper( $content );
		$content = strip_tags($content);
		
		$styles = array();
		if($bgcolor) $styles[] = 'background-color:' . $bgcolor . ';border-color:' . $bgcolor . ';';
		if($textcolor) $styles[] = 'color:' . $textcolor . ';';
		$style = join('', array_unique( $styles ) );
		$style = !empty( $style ) ? ' style="' . $style . '"': '' ;
		
		if($type == 'dt-sc-titled-box') :
			$icon = ( empty($icon) ) ? "" : "<span class='fa {$icon} '></span>";
			$title = " <h6 class='{$type}-title' {$style}> {$icon} {$title}</h6>";
			$out = "<div class='{$type} {$variation}'>";
			$out .= $title;
			$out .=	"<div class='{$type}-content'>{$content}</div>";
			$out .= "</div>";
		else :
			$out = "<div class='{$type}'>{$content}</div>";
		endif;
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_tooltip($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type'	=> 'default',
			'tooltip' => '',
			'position' => 'top',
			'href' => '',
			'target' => '',
			'bgcolor' => '',
			'textcolor' => '' 
		), $attrs ) );
		
		$class  = "class=' ";
		$class .=  ( $type == "boxed" ) ? "dt-sc-boxed-tooltip" : "";
		$class .= " dt-sc-tooltip-{$position}'";
		
		$href = " href='{$href}' ";
		$title = " title = '{$tooltip}' ";
		$target = empty($target) ? 'target="_blank"' : "target='{$target}' ";
		
		$styles = array();
		if($bgcolor) $styles[] = 'background-color:' . $bgcolor . ';border-color:' . $bgcolor . ';';
		if($textcolor) $styles[] = 'color:' . $textcolor . ';';
		$style = join('', array_unique( $styles ) );
		$style = !empty( $style ) ? ' style="' . $style . '"': '' ;
		$style = ( $type == "boxed" ) ? $style : "";
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper( $content );
		$out = "<a {$href} {$title} {$class} {$style} {$target}>{$content}</a>";
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_pullquote($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type'	=> 'pullquote1',
			'align' => '',
			'icon' => '',
			'textcolor' => '',
			'cite' => ''
		), $attrs ) );
		
		$class = array();
		if( isset($type) )
			$class[] = " dt-sc-{$type}";
			
		if( trim( $icon ) == 'yes' )
			$class[] = ' quotes';

		if( preg_match( '/left|right|center/', trim( $align ) ) )
			$class[] = ' align' . $align;
			
		$cite = ( $cite ) ? ' <cite>&ndash; ' . $cite .'</cite>' : '' ;
		
		$style = ( $textcolor ) ? ' style="color:' . $textcolor . ';"' : '';
		$class = join( '', array_unique( $class ) );
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out = "<span class='{$class}' {$style}> {$content} {$cite}</span>";
		
		return $out;
	}

	function dt_sc_fullwidth_section($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'id' =>'',
			'backgroundcolor' => '',
			'backgroundimage' => '',
			'backgroundrepeat' => '',
			'backgroundposition' => '',
			'paddingtop' => '',
			'paddingbottom' => '',
			'margintop' => '',
			'marginbottom' => '',
			'textcolor' =>'',
			'opacity' => '',
			'class' =>'',
			'parallax' => 'no'
		), $attrs ) );

		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

		$styles = array ();
		$styles[] = !empty( $textcolor ) ? "color:{$textcolor};" : "";
		if( !empty( $opacity ) ) {
			$hex = str_replace ( "#", "", $backgroundcolor );
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
			$styles[] = "background-color:rgba($rgb[0],$rgb[1],$rgb[2],$opacity); ";
		} else {
			$styles[] = !empty( $backgroundcolor ) ? "background-color:{$backgroundcolor};" : "";
		}	

		$styles[] = !empty( $backgroundimage ) ? "background-image:url({$backgroundimage});" : "";
		$styles[] = !empty( $backgroundrepeat ) ? "background-repeat:{$backgroundrepeat};" : "";
		$styles[] = !empty( $backgroundposition ) ? "background-position:{$backgroundposition};" : "";
		$styles[] = !empty( $paddingtop ) ? "padding-top:{$paddingtop}px;" : "";
		$styles[] = !empty( $paddingbottom ) ? "padding-bottom:{$paddingbottom}px;" : "";
		$styles[] = !empty( $margintop ) ? "margin-top:{$margintop}px;" : "";
		$styles[] = !empty( $marginbottom ) ? "margin-bottom:{$marginbottom}px;" : "";

		if( $parallax === "yes") {
			$styles[] = "background-attachment:fixed; ";
			$class .= " dt-sc-parallax-section ";
		}

		$styles = array_filter( $styles);
		$style = join ( '', array_unique ( $styles ) );
		$style = ! empty ( $style ) ? ' style="' . $style . '"' : '';

		$id = !empty( $id ) ? " id='{$id}' " : "";
		
		$out = 	"<div {$id} class='dt-sc-fullwidth-section {$class}' {$style}>";
		$out .=	'	<div class="container">';
		$out .= 	$content;
		$out .= '	</div>';
		$out .= '</div>';
		return $out;
	}

	function dt_sc_semi_fullwidth_section($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'id' =>'',
			'backgroundcolor' => '',
			'backgroundimage' => '',
			'backgroundposition' => '',
			'margintop' => '',
			'marginbottom' => '',
			'textcolor' =>'',
			'opacity' => '',
			'class' =>'',
			'align' => '',
		), $attrs ) );

		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

		$align  = ( $align == "left" ) ? "left-aligned" : "right-aligned";

		$styles = array ();
		$styles[] = !empty( $textcolor ) ? "color:{$textcolor};" : "";
		if( !empty( $opacity ) ) {
			$hex = str_replace ( "#", "", $backgroundcolor );
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
			$styles[] = "background-color:rgba($rgb[0],$rgb[1],$rgb[2],$opacity); ";
		} else {
			$styles[] = !empty( $backgroundcolor ) ? "background-color:{$backgroundcolor};" : "";
		}	

		$styles[] = !empty( $backgroundimage ) ? "background-image:url({$backgroundimage});" : "";
		$styles[] = !empty( $backgroundposition ) ? "background-position:{$backgroundposition};" : "";
		$styles[] = !empty( $margintop ) ? "margin-top:{$margintop}px;" : "";
		$styles[] = !empty( $marginbottom ) ? "margin-bottom:{$marginbottom}px;" : "";

		$styles = array_filter( $styles);
		$style = join ( '', array_unique ( $styles ) );
		$style = ! empty ( $style ) ? ' style="' . $style . '"' : '';

		$id = !empty( $id ) ? " id='{$id}' " : "";
		
		$out = 	"<div {$id} class='dt-sc-fullwidth-section semi-background {$class}' {$style}>";
		$out .=	'		<div class="overlay '.$align.'">';
		$out .= 			$content;
		$out .= '		</div>';
		$out .= '</div>';
		return $out;
	}

	function dt_sc_fullwidth_video( $attrs, $content = null ) {
		extract ( shortcode_atts ( array (
			'mp4' => '',
			'webm'=>'',
			'ogv' => '',
			'poster' => '',
			'backgroundimage' => '',
			'paddingtop' => '',
			'paddingbottom' => '',
			'class' =>''
		), $attrs ) );

		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

		$styles = array ();
		$styles[] = !empty( $paddingtop ) ? "padding-top:{$paddingtop}px;" : "";
		$styles[] = !empty( $paddingbottom ) ? "padding-bottom:{$paddingbottom}px;" : "";
		$styles = array_filter( $styles);
		$style = join ( '', array_unique ( $styles ) );

		$backgroundimage = !empty( $backgroundimage )  ? "$backgroundimage" : "http://placehold.it/1920x400.jpg&text=DesignThemes";
		$style .= " background:url({$backgroundimage}) left top repeat; ";
		$style = ! empty ( $style ) ? ' style="' . $style . '"' : '';

		$poster = !empty( $poster )  ? " poster='{$poster}' " : "";

		$mp4 = !empty( $mp4 )  ? "<source src='{$mp4}' type='video/mp4'/>" : "";
		$webm = !empty( $webm )  ? "<source src='{$webm}' type='video/webm'/>" : "";
		$ogv = !empty( $ogv )  ? "<source src='{$ogv}' type='video/ogg'/>" : "";
		

		$out  = "<div class='dt-sc-fullwidth-video-section {$class}' {$style}>";
		$out .= '	<div class="dt-sc-video-container">';
		$out .= "	<div class='dt-sc-mobile-image-container' style='display:none;'></div>";
		$out .= "		<video autoplay loop class='dt-sc-video dt-sc-fillWidth' {$poster}>";
		$out .= 		$mp4.$webm.$ogv;
		$out .= '		</video>';
		$out .= '	</div>';
		$out .= '   <div class="dt-sc-video-content-wrapper">';		
		$out .= "		<div class='container'>{$content}</div>";
		$out .= '	</div>';
		$out .= '</div>';

		return $out;
	}

	function dt_sc_animation( $attrs, $content = null ){
		extract ( shortcode_atts ( array ( 'effect' => '','delay'=>''), $attrs ) );
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		return "<div class='animate' data-animation='{$effect}' data-delay='{$delay}'>{$content}</div>";
	}

	function dt_sc_animate_number( $attrs, $content = null ){
		extract ( shortcode_atts ( array ( 'title' => '','number'=>'' , 'fontawesome'=>'', 'icon' => ''), $attrs ) );
		$out  = '<div class="dt-sc-animate-num">';
		$out .= '	<div class="dt-sc-icon">';
					if( !empty($fontawesome) ) {
						$out .= "<span class='fa {$fontawesome}'></span>";

					} elseif( !empty($icon) ){
						$out .= "<img src='{$icon}' alt='animate-icon'>";
					}
		$out .= '	</div>';
		$out .= 	!empty( $number ) ? "<div data-value='{$number}' class='dt-sc-num-count'>{$number}</div>" : "";
		$out .= 	!empty( $title ) ? "<span>{$title}</span>" : "";
		$out .= '</div>';
		return $out;
	}

	function dt_sc_post( $attrs, $content="" ) {
		extract(shortcode_atts(array(
			'id'=>'1',
			'excerpt_length'=>10 ,
			'show_format' => '',
			'show_author' => '',
			'show_date' => '',
			'show_comments' =>'',
			'show_cats' =>'',
			'show_tags' => '',
		), $attrs));
		$p = get_post($id,'ARRAY_A');

		if( !is_null($p) ) {
			$link = get_permalink($id);
			$format = get_post_format($id);
			$title = $p['post_title'];
			$author_id = $p['post_author'];
			$class = get_post_class("blog-entry",$id);
			$class = implode(" ",$class);
			$class  = is_sticky($id) ? $class.' sticky': $class;
			$custom_class = "";

			$post_meta = get_post_meta($id ,'_dt_post_settings',TRUE);
			$post_meta = is_array($post_meta) ? $post_meta : array();

			$custom_class = "";
			$out  = "<article class='{$class}'>";
				#Post Thumbnail
				if( $format == "image" || empty($format) ) :
					if( has_post_thumbnail($id)):
						$out .= '<div class="entry-thumb">';
						$out .= "	<a href='{$link}'>".get_the_post_thumbnail($id,"full").'</a>';
						$out .= '</div>';
					else:
						$custom_class = "has-no-post-thumbnail";
					endif;
				elseif( $format === "gallery" ) :
					if( array_key_exists("items", $post_meta) ):
						$alt = $post_meta['items_name'];
						$out .= '<div class="entry-thumb">';
						$out .= '	<ul class="entry-gallery-post-slider">';
									foreach ( $post_meta['items'] as $item ) {
										$out .= "<li><img src='". esc_url($item)."' alt='".esc_attr($alt)."'/></li>";
									}
						$out .= '	</ul>';
						$out .= '</div>';
					elseif( has_post_thumbnail($id)):
						$out .= '<div class="entry-thumb">';
						$out .= "	<a href='{$link}'>".get_the_post_thumbnail($id,"full").'</a>';
						$out .= '</div>';
					else:
						$custom_class = "has-no-post-thumbnail";
					endif;
				elseif( $format === "video" ) :
					if( array_key_exists('oembed-url', $post_meta) || array_key_exists('self-hosted-url', $post_meta) ) :
						$out .= '<div class="entry-thumb"><div class="dt-video-wrap">';
						if( array_key_exists('oembed-url', $post_meta) ) :
							$out .= wp_oembed_get($post_meta['oembed-url']);
						elseif( array_key_exists('self-hosted-url', $post_meta) ) :
							$out .= apply_filters( 'the_content', $post_meta['self-hosted-url'] );
						endif;
						$out .= '</div></div>';
					elseif( has_post_thumbnail($id)):
						$out .= '<div class="entry-thumb">';
						$out .= "	<a href='{$link}'>".get_the_post_thumbnail($id,"full").'</a>';
						$out .= '</div>';
					else:
						$custom_class = "has-no-post-thumbnail";
					endif;
				elseif( $format === "audio" ) :
					if( array_key_exists('oembed-url', $post_meta) || array_key_exists('self-hosted-url', $post_meta) ):
						$out .= '<div class="entry-thumb">';
						if( array_key_exists('oembed-url', $post_meta) ) :
							$out .= wp_oembed_get($post_meta['oembed-url']);
						elseif( array_key_exists('self-hosted-url', $post_meta) ) :
							$custom_class = "self-hosted-audio";
							$out .= apply_filters( 'the_content', $post_meta['self-hosted-url'] );
						endif;
						$out .=  '</div>';
					elseif( has_post_thumbnail($id)):
						$out .= '<div class="entry-thumb">';
						$out .= "	<a href='{$link}'>".get_the_post_thumbnail($id,"full").'</a>';
						$out .= '</div>';
					else:
						$custom_class = "has-no-post-thumbnail";
					endif;
				else:
					if( has_post_thumbnail($id) ) :
						$out .= '<div class="entry-thumb">';
						$out .= "	<a href='{$link}'>".get_the_post_thumbnail($id,"full").'</a>';
						$out .= '</div>';
					else:
						$custom_class = "has-no-post-thumbnail";
					endif;
				endif;
				#Post Thumbnail End
				$out .= "<div class='entry-details {$custom_class}'>";
					if( is_sticky($id) ):
						$out .= '<div class="featured-post"> <span class="fa fa-trophy"> </span>'.__('Featured','dt_themes').'</div>';
					endif;

					$out .= "<div class='entry-title'><h3><a href='{$link}'>{$title}</a></h3></div>";
					$out .= '<div class="entry-body">';
								$excerpt = explode(' ', do_shortcode($p['post_content']), $excerpt_length);
								$excerpt = array_filter($excerpt);
								if (!empty($excerpt)) {
									if (count($excerpt) >= $excerpt_length) {
										array_pop($excerpt);
										$excerpt = implode(" ", $excerpt).'...';
									} else {
										$excerpt = implode(" ", $excerpt);
									}

									$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
								$out .= "<p>{$excerpt}</p>";									
								}								
					$out .= '</div>';
					$out .= '<div class="entry-meta">';

						if( strtolower($show_format) == "yes" )
							$out .= '<div class="entry-format"><a class="ico-format" href="#"></a></div>';

						$out .= '<ul>';
						if( strtolower($show_author) == "yes")
							$out .= '<li><a href="'.get_author_posts_url(get_the_author_meta('ID')).'"><i class="fa fa-user"></i>'.get_the_author_meta('display_name').'</a></li>';

						if( strtolower($show_date) == "yes")
							$out .= '<li><i class="fa fa-clock-o"></i>'.get_the_date('M d Y').'</li>';

						if( strtolower($show_comments) == "yes") {
							$commtext = "";
							if((wp_count_comments($id)->approved) == 0)	
								$commtext = '<i class="fa fa-comments-o"> </i> 0';
							else
								$commtext = '<i class="fa fa-comments"> </i>'.wp_count_comments($id)->approved;

							if( !empty($commtext) )
								$out .= '<li>'.$commtext.'</li>';
						}

						if( strtolower($show_cats) == "yes") {
							$cats = "";
							$categories = get_the_category($id);
							if($categories) {
								foreach($categories as $category) {
									$cats .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", "dt_themes" ), $category->name ) ) . '">'.$category->cat_name.'</a>,';
								}

								$cats = trim($cats, ",");
								$out .= '<li><i class="fa fa-folder-open"> </i>'.$cats.'</li>';
							}
						}

						if( strtolower($show_tags) == "yes") {
							$tags = "";
							$terms = wp_get_post_tags($id);
							if( !empty($terms) ) {
								$tags .= "<li> <i class='fa fa-thumb-tack'></i> ";

								foreach( $terms as $term ) {
									$tags .= '<a href="'.get_term_link($term->slug, 'post_tag').'"> '.$term->name.'</a>,';
								}
								$tags = substr($tags,0,-1);
								$tags .= '</li>';

								$out .= $tags;
							}
						}
						$out .= '</ul>';
					$out .= '</div>';
				$out .= "</div>";
			$out .= "</<article>";
			return $out;
		}
	}

	function dt_sc_recent_post( $attrs, $content="" ) {
		extract( shortcode_atts( array( 
			'columns'=>'2',
			'count'=>'3',
			'excerpt_length'=>10,
			'category' => '',
			'show_format' => '',
			'show_author' => '',
			'show_date' => '',
			'show_comments' =>'',
			'show_cats' =>'',
			'show_tags' => '',
		), $attrs ));

		$out = "";
		$post_class = "";

		switch( $columns ) :
			case '1':
				$post_class = "column dt-sc-one-column";
			break;
			case '2':
				$post_class = "column dt-sc-one-half";
			break;

			default:
			case '3':
				$post_class = "column dt-sc-one-third";
			break;
		endswitch;

		$args = array( 'posts_per_page' => $count, 'orderby' => 'date' );
		$warning = __('No Posts Found','dt_themes');
		
		if( !empty($category) ){
			$args = array( 'posts_per_page' => $count, 'orderby' => 'date', 'cat' => $category );
			$warning = __('No Posts Found in Category ','dt_themes').$category;
		}

		$rposts = new WP_Query( $args );
		if ( $rposts->have_posts() ):
			$i = 1;
			while( $rposts->have_posts() ):
				$rposts->the_post();

				$the_id = get_the_ID();
				$permalink = get_permalink($the_id);
				$title = get_the_title($the_id);

				$temp_class = "";
				if($i == 1) 
					$temp_class = $post_class." first";
				else
					$temp_class = $post_class;

				if($i == $columns)
					$i = 1;
				else
					$i = $i + 1;

				$out .= "<div class='{$temp_class}'>";
				$sc = "[dt_sc_post id='{$the_id}' excerpt_length='{$excerpt_length}' show_format='".strtolower($show_format)."' show_author='".strtolower($show_author)."' show_date='".strtolower($show_date)."' show_comments='".strtolower($show_comments)."' show_cats='".strtolower($show_cats)."'  show_tags='".strtolower($show_tags)."'/]";
				$out .= do_shortcode($sc);
				$out .= '</div>';
			endwhile;
			wp_reset_query();
		else:
			$out = "<div class='dt-sc-warning-box'>{$warning}</div>";	
		endif;
		return $out;	
	}

	function dt_sc_social( $attrs, $content = null ) {
		$attributes = array();
		$dir_path = plugin_dir_path ( __FILE__ ) . "images/sociables/";
		$sociables_icons = DTCoreShortcodesDefination::dtListImages ( $dir_path );
		$sociables = array_values ( $sociables_icons );

		foreach ( $sociables as $sociable ) {
			$attributes [$sociable] = '';
		}

		extract ( shortcode_atts ( $attributes, $attrs ) );

		$s = "";
		$path = plugin_dir_url ( __FILE__ ) . "images/sociables/";
		foreach ( $sociables as $sociable ) {
			$img = array_search ( $sociable, $sociables_icons );
			$class = explode(".",$img);
			$class = $class[0];
			$class = str_replace("_", "-", $class);
			#$class = str_replace(" ", "-", $class);
			$title = ucwords( str_replace("-", "  ", $class) );
			$s .= empty ( $$sociable ) ? "" : "<li class='{$class}'><a href='{$$sociable}' target='_blank'  title='{$title}' class='dt-sc-tooltip-bottom'> <img src='{$path}{$img}' alt='{$sociable}'/> </a></li>";
		}
		
		$s = ! empty ( $s ) ? "<ul class='dt-sc-social-icons'>$s</ul>" : "";
		return $s;
	}

	function dt_sc_portfolio_item( $attrs , $content = null ) {

		extract( shortcode_atts( array( 'id' => ''), $attrs ));

		$out = "";
		if( !empty($id) ) {

			$p = get_post( $id );
			if( $p->post_type === "dt_portfolios" ){
				$permalink = get_permalink($id);

				$portfolio_item_meta = get_post_meta($id,'_portfolio_settings',TRUE);
				$portfolio_item_meta = is_array($portfolio_item_meta) ? $portfolio_item_meta  : array();

				$popup = $image = "http://placehold.it/1170x780&text=DesignThemes";

				if( array_key_exists('items_name', $portfolio_item_meta) ) {
					$item =  $portfolio_item_meta['items_name'][0];
					$popup = $portfolio_item_meta['items'][0];

					if( "video" === $item ) {

						$items = array_diff( $portfolio_item_meta['items_name'] , array("video") );

						if( !empty($items) ) {
							$image = $portfolio_item_meta['items'][key($items)];
	                    } else {
	                    	$image = "http://placehold.it/1170x780&text=DesignThemes";
	                    }
	                } else {
	                	$image = $portfolio_item_meta['items'][0];
	                }
	            }

	            $out .= "<div id='dt_portfolios-".esc_attr($id)."' class='portfolio'>";
	            $out .= '	<div class="portfolio-thumb">';
	            $out .= '		<img src="'.esc_attr($image).'"  alt="" width="1170" height="780"/>';
	            $out .= '		<div class="image-overlay">';
	            $out .= '			<a href="'.esc_attr($popup).'" data-gal="prettyPhoto[gallery]" class="link"><span class="fa fa-plus"> </span></a>';
	            $out .= '			<a href="'.esc_url($permalink).'" class="zoom"> <span class="fa fa-link"> </span> </a>';
	            $out .= '		</div>';
	            $out .= '	</div>';
	            $out .= '	<div class="portfolio-detail">';
	            $out .= '	<h3><a href="'.esc_url($permalink).'">'.$p->post_title.'</a></h3>';
	            $out .= '	</div>';
	            $out .= '</div>';
			} else {
				$out .="<p>".__("There is no portfolio item with id :","dt_themes").$id."</p>";
			}
		} else {
			$out .="<p>".__("Please give correct portfolio post id","dt_themes")."</p>";
		}

		return $out;
	}

	function dt_sc_recent_portfolio( $attrs, $content = null ) {

		$out = "";

		global $post;
		$tpl_default_settings = get_post_meta( $post->ID, '_tpl_default_settings', TRUE );
		$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();
		$page_layout  = array_key_exists( "layout", $tpl_default_settings ) ? $tpl_default_settings['layout'] : "content-full-width";
		$show_sidebar = false;

		switch ($page_layout) {
			case 'with-left-sidebar':
			case 'with-right-sidebar':
				$show_sidebar = true;
			break;

			default:
				$show_sidebar = false;
			break;
		}

		extract( shortcode_atts( array( 'column'=>'', 'count'=>'', 'category' => '' ), $attrs) );

		switch( $column ):
			case '2':
				$post_class = $show_sidebar ? " portfolio column dt-sc-one-half with-sidebar" : " portfolio column dt-sc-one-half";
				$columns = 2;
			break;

			case '3':
				$post_class = $show_sidebar ? " portfolio column dt-sc-one-third with-sidebar" : " portfolio column dt-sc-one-third";
				$columns = 3;
			break;

			case '4':
				$post_class = $show_sidebar ? " portfolio column dt-sc-one-fourth with-sidebar" : " portfolio column dt-sc-one-fourth";
				$columns = 4;
			break;
		endswitch;

		# Recent Portfolios
		$args = array(
			'post_type' => 'dt_portfolios',
			'posts_per_page' => $count,
			'orderby' => 'date',
			'ignore_sticky_posts' => 1);

		if( !empty($category) ) :  # Recent Portfolios from a given category
			$categories = explode(",", $category);
			if( is_array($categories) && !empty($categories) ) {

				$args = array(
					'post_type' => 'dt_portfolios',
					'posts_per_page' => $count,
					'orderby' => 'ID',
					'order' => 'ASC',
					'paged' => get_query_var('paged'),
					'tax_query' => array(
						array(
							'taxonomy' => 'dt_portfolio_entries' ,
							'field' => 'id',
							'operator' => 'IN',
							'terms' => $categories
						)
					)
				);
			}
		endif;

		query_posts($args);
		if( have_posts() ):
			$i = 1;

			while( have_posts() ):
				the_post();

				$the_id = get_the_ID();

				$temp_class = "";
				if($i == 1) $temp_class = $post_class." first"; else $temp_class = $post_class;
				if($i == $columns) $i = 1; else $i = $i + 1;

				$out .= "<div class='{$temp_class}'>";
				$out .= do_shortcode("[dt_sc_portfolio_item id='".$the_id."'/]");
				$out .= "</div>";
			endwhile;
			wp_reset_query();
		else:
			$out = "<p>".__("No portfolio items found","dt_themes")."</p>";
		endif;

		return $out;
	}

	function dt_sc_pricing_box( $attrs , $content = null )	{
		extract( shortcode_atts( array( 'price' => '', 'per' => '' ), $attrs));

		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

		$out = '<div class="dt-sc-pricing-box">';
		$out .= $content;
		$out .= '<span>'.$price.'</span>';
		$out .= $per;
		$out .= '</div>';
		return $out;
	}

	function dt_sc_fontawesome( $attrs , $content = null ){
		extract( shortcode_atts( array( 'icon' => '', 'color' => '' ), $attrs));
		$color = !empty($color) ? "style='color:{$color};'" : "";
		$out = "<span class='fa {$icon}' {$color}></span>";
		return $out;
	}

	function dt_sc_slider( $attrs , $content = null ) {
		extract( shortcode_atts( array( 'type' => '' ), $attrs) );
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out = '<div class="page-slider-wrapper '.$type.'">';
		$out .= $content;
		$out .= '</div>';
		return $out;
	}

	function dt_sc_slider_control( $attrs , $content = null ) {
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out = '<div class="slide-nav-control-wrapper">';
		$out .= $content;
		$out .= '</div>';
		return $out;
	}

	function dt_sc_widgets($attrs, $content = null) {

		extract ( shortcode_atts ( array (
			'widget_name' => '',
			'widget_wpname' => '',
			'widget_wpid' => ''
			), $attrs ) );
		
		if($widget_name != ''):	
			
			foreach($attrs as $key=>$value):
				$instance[$key] = $value;			
			endforeach;
			
			$instance = array_filter($instance);
			
			if(($widget_name == 'TribeEventsAdvancedListWidget' || $widget_name == 'TribeEventsMiniCalendarWidget') && isset($instance['selector'])) {
				$instance['filters'] = '{"tribe_events_cat":["'.$instance['selector'].'"]}';
			}

			if($widget_name == 'TribeEventsAdvancedListWidget' && !wp_script_is( 'widget-calendar-pro-style', 'queue' ) && class_exists('TribeEventsPro')) {
				wp_enqueue_style( 'widget-calendar-pro-style', TribeEventsPro::instance()->pluginUrl . 'resources/widget-calendar-full.css', array(), apply_filters( 'tribe_events_pro_css_version', TribeEventsPro::VERSION ) );
			}
			
			if(substr($widget_name, 0, 2) == 'WC') $add_cls = 'woocommerce';
			else $add_cls = '';
			
			ob_start();
			the_widget($widget_name, $instance, 'before_widget=<aside id="'.$widget_wpid.'" class="widget '.$add_cls.' '.$widget_wpname.'">&after_widget=</aside>&before_title=<h3 class="widgettitle">&after_title=<span></span></h3>');
			$output = ob_get_contents();
			ob_end_clean();
			
			return $output;							
		endif;
	}

	function dt_sc_doshortcode($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'width' => '100',
				'animation' => '',
				'animation_delay' => ''
		), $attrs ) );

		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

		$danimation = !empty( $animation ) ? " data-animation='{$animation}' ": "";
		$ddelay = ( !empty( $animation ) && !empty( $animation_delay )) ? " data-delay='{$animation_delay}' " : "";
		$danimate = !empty( $animation ) ? "animate": "";

		$first = (isset ( $attrs [0] ) && trim ( $attrs [0] == 'first' )) ? 'first' : '';

		$out = '<div class="column '.$danimate.' '.$first.'" style="width:'.$width.'%;" '.$danimation.' '.$ddelay.'>';
		$cont = do_shortcode($content);
		if(isset($cont))
			$out .= $cont;
		else
			$out .= $content;
		$out .= '</div>';
		return $out;
	}

	function dt_sc_resizable($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'width' => '',
				'class' => '',
				'animation' => '',
				'animation_delay' => ''
		), $attrs ) );

		$danimation = !empty( $animation ) ? " data-animation='{$animation}' ": "";
		$ddelay = (!empty( $animation ) && !empty( $animation_delay )) ? " data-delay='{$animation_delay}' " : "";
		$danimate = !empty( $animation ) ? "animate": "";

		$style = (!empty( $width ) ) ? ' style="width:'.$width.'%;" ' : "";
	
		$first = (isset ( $attrs [0] ) && trim ( $attrs [0] == 'first' )) ? 'first' : '';
		$content = do_shortcode(DTCoreShortcodesDefination::dtShortcodeHelper ( $content ));
		$out = "<div class='column {$class} {$danimate} {$first}' {$danimation} {$ddelay} {$style}>{$content}</div>";
		return $out;
	}
	
	// Domain Search Form	
	function dt_sc_domain_search_form( $attrs, $content = null ) {
		extract( shortcode_atts( array(
			'action' => '',
			'tlds' => '',
			'class' => ''
		) , $attrs ) );
		
		$option = "";
		
		if( !empty($tlds) ):
			$tlds = explode(",",$tlds);
			foreach( $tlds as $tld ){
				$option .=	'<option value="'.$tld.'">'.$tld.'</option>';
			}
		else:
			$option .= "<option value='.com'>.com</option>";
		endif;
		
		$out  = '<form class="search-form domain-search" method="post" action="'.$action.'">';
		$out .= '	<div class="dt-sc-three-fifth column first">';
		$out .= '		<input type="text" name="domain" placeholder="'.__('Looking for Domains?','dt_themes').'">';
		$out .= '	</div>';
		$out .= '	<div class="dt-sc-one-fifth column">';
		$out .= '		<span class="selection-box">';
		$out .= '			<select name="tlds[]" class="domains">'.$option.'</select>';
		$out .= '		</span>';
		$out .= '	</div>';
		$out .= '	<div class="dt-sc-one-fifth column">';
		$out .= '		<input type="submit" value="Search" name="button" class="dt-sc-button medium">';
		$out .= '	</div>';
		$out .= '</form>';
		return $out;
	}
	
	// Domain Carousel inner shortcode
	function dt_sc_domain( $attrs, $content = null ){
		extract( shortcode_atts( array(
			'tld' => '',
			'text' => '',
			'price' => '',
			'per' => ''
		) , $attrs ) );
		
		$featured = (isset ( $attrs [0] ) && trim ( $attrs [0] == 'featured' )) ? 'featured' : '';
		
		$out  = '<div class="dom-pack '.$featured.'">';	
		$out .= !empty($text) ? $text : "";
		$out .= '<span class="dom-range">'.$tld.'</span>';
		$out .= '<span>'.$price;
		$out .= ( isset( $per ) && !empty( $per ) ) ? "<sub>{$per}</sub>" : "";		
		$out .= '</div>';
		
		return $out;	
	}			
	
	// Domain Carousel
	function dt_sc_domains_carousel( $attrs, $content = null , $shortcodename = "" ){
		
		$class = ( $shortcodename == "dt_sc_domains_carousel" ) ? "domains-list" : "";
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = str_replace( '<ul>', "<ul class='frequent-loads {$class} carousel_items'>", $content );
		
		
		$out  = "<div class='search-carousel-wrapper'>";
		$out .= '	<div class="search-carousel">';
		$out .= 		$content;
		$out .= '		<a class="search-prev" href="#"><span class="fa fa-chevron-left"></span></a>';
		$out .= '		<a class="search-next" href="#"><span class="fa fa-chevron-right"></span></a>';
		$out .= '	</div>';
		$out .= '</div>';
		return $out;
	}
	
	function dt_sc_faq( $attrs, $content = null ){
		extract( shortcode_atts( array(
			'text' => '',
			'icon' => '',
			'fontawesome' => ''
		) , $attrs ) );
		
		$out = "";
		
		if( !empty($fontawesome) ) {
			$out .= "<span class='fa {$fontawesome}'></span>";
		}

		if( !empty($icon) ) {
			$out .= "<span><img src='{$icon}'/></span>";
		}

		if( !empty($text) ) {
			$out .= $text;
		}
		
		return $out;		
	}
}
new DTCoreShortcodesDefination();?>