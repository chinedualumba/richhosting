<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php dttheme_is_mobile_view(); ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php endif;
    
    if( dttheme_option('integration', 'enable-header-code') ):
        echo '<script type="text/javascript">'.stripslashes(dttheme_option('integration', 'header-code')).'</script>';
    endif;
    wp_head();?>
</head>
<?php $body_class_arg  = ( dttheme_option("appearance","layout") === "boxed" ) ? array("boxed") : array(); ?>
<body <?php body_class( $body_class_arg ); ?>>
<?php $picker = dttheme_option("general","disable-picker");
    if(!isset($picker) && !is_user_logged_in() ):   dttheme_color_picker(); endif;?>
    <!-- ** Wrapper ** -->
    <div class="wrapper"><?php
		if( dttheme_option('general','loading-bar') != "true" ) :?>
        	<!-- ** loader wrapper ** -->
            <div id="loader-wrapper">
                <div id="preloader">
                    <div id="ico-loaders">
                        <div class="flat_ico_shape" id="ico_loader1"></div>
                        <div class="flat_ico_shape" id="ico_loader2"></div>
                        <div class="flat_ico_shape" id="ico_loader3"></div>
                        <div class="flat_ico_shape" id="ico_loader4"></div>
                    </div>
                </div>
            </div><!-- ** loader wrapper ** --><?php
		endif;?>

        <!-- Header Section -->
        <?php if( is_page_template('tpl-onepage.php') ):
                $header = "header3";
            elseif( is_page_template('tpl-header1.php') ):
                $header = "header1";
            elseif( is_page_template('tpl-header2.php') ):
                $header = "header2";
            elseif( is_page_template('tpl-header3.php') ):
                $header = "header3";
            elseif( is_page_template('tpl-header4.php') ):
                $header = "header4";
            elseif( is_page_template('tpl-header5.php') ):
                $header = "header5";
            else:
                $header = dttheme_option("appearance","header_type");
                $header = !empty($header) ? $header : "header1";
            endif;
			
			require_once ( get_template_directory()."/header/{$header}.php"); ?>
        <!-- Header Section -->       

        <!-- ** Main ** -->
        <div id="main"><?php

            # slider section
            if( is_page() && !(is_page_template('tpl-onepage.php')) ):
                global $post;
                dttheme_slider_section($post->ID);
            endif; # slider section end

            # Breadcrumb Section
            require_once( get_template_directory()."/framework/sub-title.php");
            # Breadcrumb Section Ends?>

            <!-- **Content Main ** -->
            <section class="content-main">
            <?php if( !is_page_template( 'tpl-fullwidth.php' ) && (!is_page_template('tpl-onepage.php')) ) : ?>
                <!-- ** Container ( .container - doesn't exists for full width template )** -->
                <div class="container">
            <?php endif;?>