<?php
global $post;
$portfolio_settings = get_post_meta ( $post->ID, '_portfolio_settings', TRUE );
$portfolio_settings = is_array ( $portfolio_settings ) ? $portfolio_settings : array ();?>

<!-- Breadcrumb -->
<div class="custom-box">
<div class="column one-sixth"><label><?php _e('Disable Breadcrumb','dt_themes');?></label></div>
<div class="column five-sixth last"><?php 
    $switchclass = array_key_exists("disable-breadcrumb",$portfolio_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';?>
    
    <div data-for="mytheme-page-breadcrumb" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
    <input id="mytheme-page-breadcrumb" class="hidden" type="checkbox" name="mytheme-page-breadcrumb" value="true"
    	<?php if( array_key_exists("disable-breadcrumb",$portfolio_settings) ):?> checked="checked"<?php endif;?>/>
    <p class="note"> <?php _e('YES! to disable breadcrumb.','dt_themes');?> </p>
</div>
</div><!-- Breadcrumb End-->

<!-- Sub Title Background -->
<div class="custom-box">
    <div class="column one-sixth"><?php _e( 'Sub Title Background','dt_themes');?></div>
    <div class="column five-sixth last">
        <div class="image-preview-container">
            <?php $subtitlebg = array_key_exists ( "sub-title-bg", $portfolio_settings ) ? $portfolio_settings ['sub-title-bg'] : '';?>
            <input name="sub-title-bg" type="text" class="uploadfield medium" readonly="readonly" value="<?php echo esc_attr($subtitlebg);?>"/>
            <input type="button" value="<?php _e('Upload','dt_themes');?>" class="upload_image_button show_preview" />
            <input type="button" value="<?php _e('Remove','dt_themes');?>" class="upload_image_reset" />
            <?php if( !empty($subtitlebg) ) dttheme_adminpanel_image_preview($subtitlebg );?>
            <p class="note"><?php _e("Upload an image for the sub title background",'dt_theme');?></p>
        </div>                    
    </div>
</div><!-- Sub Title Background End -->

<!-- Sub Title Settings -->
<div class="custom-box">
    <div class="column one-sixth"></div>
    <div class="column five-sixth last">
        <div class="column one-third">
            <label><?php _e('Background Repeat', 'dt_themes');?></label>
            <?php $bgrepeat =  array_key_exists ( "sub-title-bg-repeat", $portfolio_settings ) ? $portfolio_settings ['sub-title-bg-repeat'] : ''; ?>
            <div class="clear"></div>
            <select name="sub-title-bg-repeat">
                <option value=""><?php _e("Select",'dt_themes');?></option>
                <?php foreach( array("repeat","repeat-x","repeat-y","no-repeat") as $option): ?>
                       <option value="<?php echo esc_attr($option);?>" <?php selected($option,$bgrepeat);?>><?php echo esc_html( $option );?></option> 
                <?php endforeach;?>
            </select>
            <p class="note"><?php _e("Select how would you like to repeat the background image ",'dt_theme');?></p>
        </div>

        <div class="column one-third">
            <label><?php _e('Background Position', 'dt_themes');?></label>
            <?php $bgposition =  array_key_exists ( "sub-title-bg-position", $portfolio_settings ) ? $portfolio_settings ['sub-title-bg-position'] : ''; ?>
            <div class="clear"></div>
            <select name="sub-title-bg-position">
                <option value=""><?php _e("Select",'dt_themes');?></option>
                <?php foreach( array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right") as $option): ?>
                    <option value="<?php echo esc_attr($option);?>" <?php selected($option,$bgposition);?>> <?php echo esc_html( $option );?></option> 
                <?php endforeach;?>
            </select>
            <p class="note"><?php _e("Select how would you like to position the background",'dt_theme');?></p>
        </div>

        <div class="column one-third last">
            <label><?php _e('Apply Dark Title','dt_themes');?></label>
            <div class="clear"></div><?php
                $switchclass = array_key_exists("dark-bg",$portfolio_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';?>

                <div data-for="page-darkbg" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
                <input id="page-darkbg" class="hidden" type="checkbox" name="page-darkbg" value="true"
                	<?php if( array_key_exists("dark-bg",$portfolio_settings) ):?> checked="checked"<?php endif;?>/>
                <p class="note"> <?php _e('YES! to have dark text for light background.','dt_themes');?> </p>
        </div>
    </div>
</div><!-- Sub Title Settings -->

<!-- Page Layout -->
<div id="page-layout" class="custom-box">
	<div class="column one-sixth">
		<label><?php _e('Page Layout','dt_themes');?> </label>
	</div>
	<div class="column five-sixth last">
		<ul class="bpanel-layout-set"><?php
			$layouts = array (
				'content-full-width'=>'without-sidebar',
				'with-left-sidebar'=>'left-sidebar',
				'with-right-sidebar'=>'right-sidebar');

			$v = array_key_exists ( "page-layout", $portfolio_settings ) ? $portfolio_settings ['page-layout'] : 'content-full-width';
			foreach ( $layouts as $key => $value ) {
				$class = ($key == $v) ? " class='selected' " : "";
				echo "<li><a href='#' rel='{$key}' {$class}><img src='" . plugin_dir_url ( __FILE__ ) . "images/columns/{$value}.png' /></a></li>";
			}?></ul>
			<?php $v = array_key_exists("page-layout",$portfolio_settings) ? $portfolio_settings['page-layout'] : 'content-full-width';
			$cs = ( $v == "content-full-width") ? "style='display:none;'":"";?>
		<input id="mytheme-portfolio-layout" name="page-layout" type="hidden"
			value="<?php echo esc_attr($v);?>" />
		<p class="note"> <?php _e("You can choose between a left, right or no sidebar layout.",'dt_themes');?> </p>
	</div>
</div><!-- Page Layout End-->

<?php
	$show_sidebar = '';
	switch( $v ):
		case 'content-full-width':	$show_sidebar = " hidden";	break;
        default: $show_sidebar = ''; break;
	endswitch;
?>

<div class="widget-area-options <?php echo esc_attr($show_sidebar);?>">
    <!-- Every Where Sidebar Start -->
    <div class="custom-box">
        <div class="column one-sixth">   
            <label><?php _e('Disable Standard Sidebar','dt_themes');?></label>
        </div>
        <div class="column five-sixth last">  
            <?php $switchclass = array_key_exists("disable-standard-sidebar",$portfolio_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';?>
            <div data-for="mytheme-disable-standard-sidebar" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
            <input id="mytheme-disable-standard-sidebar" class="hidden" type="checkbox" name="disable-standard-sidebar" value="true"
            	<?php if( array_key_exists("disable-standard-sidebar",$portfolio_settings) ):?> checked="checked"<?php endif;?>/>
            <p class="note"> <?php _e('YES! to disable Standard Sidebar','dt_themes');?> </p>
        </div>
    </div><!-- Every Where Sidebar Section End-->

    <!-- 3. Choose Widget Areas Start -->
    <div class="sidebar-section custom-box">
        <div class="column one-sixth"><label><?php _e('Choose Widget Area','dt_themes');?></label></div>
        <div class="column five-sixth last"><?php
            if( array_key_exists('widget-area', $portfolio_settings)):
                $widgetareas =  array_unique($portfolio_settings["widget-area"]);
                $widgetareas = array_filter($widgetareas);

                foreach( $widgetareas as $widgetarea ){
                    echo '<div class="multidropdown">';
                    	dttheme_custom_widgetarea_list("widgetareas",$widgetarea,"multidropdown");
                    echo '</div>';
                }

                echo '<div class="multidropdown">';
                	dttheme_custom_widgetarea_list("widgetareas","","multidropdown");
                echo '</div>';                                
            else:
                echo '<div class="multidropdown">';
                echo dttheme_custom_widgetarea_list("widgetareas","","multidropdown");
                echo '</div>';                                
            endif;?>
        </div>
    </div><!-- Choose Widget Areas End -->
</div>

<!-- Portfolio Layout -->
<div id="portfolio-layout" class="custom-box">
	<div class="column one-sixth">
		<label><?php _e('Portfolio Layout','dt_themes');?> </label>
	</div>
	<div class="column five-sixth last">
		<ul class="dt-bpanel-layout-set"><?php
			$layouts = array (
				'full-width-portfolio'=>'portfolio-fullwidth',
				'with-left-portfolio'=>'portfolio-with-left-gallery',
				'with-right-portfolio'=>'portfolio-with-right-gallery',);

			$v = array_key_exists ( "portfolio-layout", $portfolio_settings ) ? $portfolio_settings ['portfolio-layout'] : 'full-width-portfolio';
			foreach ( $layouts as $key => $value ) {
				$class = ($key == $v) ? " class='selected' " : "";
				echo "<li><a href='#' rel='{$key}' {$class}><img src='" . plugin_dir_url ( __FILE__ ) . "images/columns/{$value}.png' /></a></li>";
			}?></ul>
			<?php $v = array_key_exists("portfolio-layout",$portfolio_settings) ? $portfolio_settings['portfolio-layout'] : 'full-width-portfolio';
			$cs = ( $v == "content-full-width") ? "style='display:none;'":"";?>
		<input id="mytheme-portfolio-layout" name="portfolio-layout" type="hidden"
			value="<?php echo esc_attr($v);?>" />
		<p class="note"> <?php _e("You can choose between a left, right or full width portfolio layout.",'dt_themes');?> </p>
	</div>
</div><!-- Portfolio Layout End-->

<!-- Location Info -->
<div class="custom-box">

	<div class="column one-sixth">
		<label><?php _e('Author Name','dt_themes');?></label>
	</div>

	<div class="column five-sixth last">
	<?php $clientname = array_key_exists ( "author-name", $portfolio_settings ) ? $portfolio_settings ['author-name'] : '';?>
    
		<input id="author-name" name="author-name" type="text" class="widefat" value="<?php echo esc_attr($clientname);?>" />
		<p class="note"> <?php _e("If you wish! You can add location info.",'dt_themes');?> </p>
        <div class="clear"></div>
	</div>
</div><!-- Location Info End -->

<!-- Website Link-->
<div class="custom-box">

	<div class="column one-sixth">
		<label><?php _e('Website Link','dt_themes');?></label>
	</div>

	<div class="column five-sixth last">
	<?php $websitelink = array_key_exists ( "website-link", $portfolio_settings ) ? $portfolio_settings ['website-link'] : '';?>
    
		<input id="website-link" name="website-link" type="text" class="widefat" value="<?php echo esc_attr($websitelink);?>" />
		<p class="note"> <?php _e("If you wish! You can add client website url.",'dt_themes');?> </p>
        <div class="clear"></div>
	</div>
</div><!-- Website Link-->

<!-- Show Related Posts -->
<div class="custom-box">
	<div class="column one-sixth">
		<label><?php _e('Show Related Projects','dt_themes');?></label>
	</div>
	<div class="column five-sixth last"><?php
	
	$switchclass = array_key_exists ( "show-related-items", $portfolio_settings ) ? 'checkbox-switch-on' : 'checkbox-switch-off';?>
    	<div data-for="mytheme-related-item" class="dt-checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
		<input id="mytheme-related-item" class="hidden" type="checkbox" name="mytheme-related-item" value="true"
        	<?php if( array_key_exists("show-related-items",$portfolio_settings) ):?> checked="checked"<?php endif;?>/>
		<p class="note"> <?php _e('Would you like to show the related projects at the bottom','dt_themes');?> </p>
	</div>
</div><!-- Show Related Posts End-->

<!-- Show Social Share -->
<div class="custom-box">
	<div class="column one-sixth">
		<label><?php _e('Show Social Share','dt_themes');?></label>
	</div>
	<div class="column five-sixth last"><?php
	$switchclass = array_key_exists ( "show-social-share", $portfolio_settings ) ? 'checkbox-switch-on' : 'checkbox-switch-off';
	?><div data-for="mytheme-social-share"
			class="dt-checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
		<input id="mytheme-social-share" class="hidden" type="checkbox" name="mytheme-social-share" value="true"
        	<?php if( array_key_exists("show-social-share",$portfolio_settings) ):?> checked="checked"<?php endif;?>/>
		<p class="note"> <?php _e('Would you like to show the social share at the bottom','dt_themes');?> </p>
	</div>
</div><!-- Show Social Share End -->

<!-- Medias -->
<div class="custom-box">
	<div class="column one-sixth">
		<label><?php _e('Images','dt_themes');?> </label>
	</div>
	<div class="column five-sixth last">
		<div class="dt-media-btns-container">
			<a href="#" class="dt-open-media button button-primary"><?php _e( 'Click Here to Add Images', 'dt_themes' );?> </a>
			<a href="#" class="dt-add-video button button-primary"><?php _e( 'Click Here to Add Video', 'dt_themes' );?> </a>
		</div>
		<div class="clear"></div>

		<div class="dt-media-container">
			<ul class="dt-items-holder"><?php
			if (array_key_exists ( "items", $portfolio_settings )) {
				foreach ( $portfolio_settings ["items_thumbnail"] as $key => $thumbnail ) {
					$item = $portfolio_settings ['items'] [$key];
					$name = "";
					$foramts = array ( 'jpg', 'jpeg', 'gif', 'png' );
					$parts = explode ( '.', $item );
					$ext = strtolower ( $parts [count ( $parts ) - 1] );
					if (in_array ( $ext, $foramts )) {
						$name = $portfolio_settings ['items_name'] [$key];
						echo "<li>";
						echo "<img src='".esc_url( $thumbnail )."' alt=''/>";
						echo "<span class='dt-image-name'>".esc_html( $name )."</span>";
						echo "<input type='hidden' name='items[]' value='".esc_attr( $item )."'/>";
					} else {
						$name = "video";
						echo "<li>";
						echo "<span class='dt-video'></span>";
						echo "<input type='text' name='items[]' value='".esc_attr( $item )."'/>";
					}
					
					echo "<input class='dt-image-name' type='hidden' name='items_name[]' value='".esc_attr( $name )."' />";
					echo "<input type='hidden' name='items_thumbnail[]' value='".esc_attr( $thumbnail )."'/>";
					echo "<span class='my_delete'></span>";
					echo "</li>";
				}
			}
			?></ul>
		</div>
	</div>
</div><!-- Medias End -->