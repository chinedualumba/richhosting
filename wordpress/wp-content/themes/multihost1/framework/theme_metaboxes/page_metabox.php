<?php add_action("admin_init", "page_metabox");?>
<?php function page_metabox(){
		add_meta_box("page-template-slider-meta-container", __('Slider Options','dt_themes'), "page_sllider_settings", "page", "normal", "default");	
		add_meta_box("page-template-meta-container", __('Default page Options','dt_themes'), "page_settings", "page", "normal", "default");
		add_action('save_post','page_meta_save');
	}

	#Slider Meta Box
	function page_sllider_settings($args){	
		global $post; 
		$tpl_default_settings = get_post_meta($post->ID,'_tpl_default_settings',TRUE);
		$tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings  : array();?>

		<!-- Show Slider -->        
        <div class="custom-box">
        	<div class="column one-sixth">
                <label><?php _e('Show Slider','dt_themes');?> </label>
            </div>
            <div class="column four-sixth last">
				<?php $switchclass = array_key_exists("show_slider",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';?>
                <div data-for="mytheme-show-slider" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
                <input id="mytheme-show-slider" class="hidden" type="checkbox" name="mytheme-show-slider" value="true"
					<?php if( array_key_exists("show_slider",$tpl_default_settings) ):?> checked="checked"<?php endif;?>/>
                <p class="note"> <?php _e('YES! to show slider on this page.','dt_themes');?> </p>
            </div>
        </div><!-- Show Slider End-->

        <!-- Slider Types -->
        <div class="custom-box">
        	<div class="column one-sixth">
                <label><?php _e('Choose Slider','dt_themes');?></label>
            </div>
            <div class="column four-sixth last">
	            <?php $slider_types = array( '' => __("Select",'dt_themes'),
											 'layerslider' => __("Layer Slider",'dt_themes'),
											 'revolutionslider' => __("Revolution Responsive",'dt_themes'),
                                             'imageonly' => __( "Image Only", "dt_themes") );
											 
	 				  $v =  array_key_exists("slider_type",$tpl_default_settings) ?  $tpl_default_settings['slider_type'] : '';
					  
					  echo "<select class='slider-type' name='mytheme-slider-type'>";
					  foreach($slider_types as $key => $value):
					  	$rs = selected($key,$v,false);
						echo "<option value='{$key}' {$rs}>{$value}</option>";
					  endforeach;
	 				 echo "</select>";?>
            <p class="note"> <?php _e("Choose which slider you wish to use ( eg: Layer or Revolution )",'dt_themes');?> </p>
            </div>
        </div><!-- Slider Types End-->
        
        <!-- slier-container starts-->
    	<div id="slider-conainer"><?php 
            $layerslider = $revolutionslider = $imageonly = 'display:none';
			  if(isset($tpl_default_settings['slider_type'])&& $tpl_default_settings['slider_type'] == "layerslider"):
			  	$layerslider = 'display:block';
			  elseif(isset($tpl_default_settings['slider_type'])&& $tpl_default_settings['slider_type'] == "revolutionslider"):
			  	$revolutionslider = 'display:block';
              elseif(isset($tpl_default_settings['slider_type'])&& $tpl_default_settings['slider_type'] == "imageonly"):
                $imageonly = 'display:block';
			  endif;?>
              
          
            <!-- Layered Slider -->
            <div id="layerslider" class="custom-box" style=" <?php echo esc_attr( $layerslider );?>">
              	<h3><?php _e('Layer Slider','dt_themes');?></h3>
                <?php if(dttheme_is_plugin_active('LayerSlider/layerslider.php')):?>
                <?php // Get WPDB Object
					  global $wpdb;
					  // Table name
					  $table_name = $wpdb->prefix . "layerslider";
					  // Get sliders
					  $sliders = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name WHERE flag_hidden = 0 AND flag_deleted = 0 ORDER BY date_c ASC LIMIT 100", ARRAY_A ) );
					  
					  if($sliders != null && !empty($sliders)):
		 	                echo '<div class="one-half-content">';
							echo '	<div class="bpanel-option-set">';
							echo ' <div class="column one-sixth">';
                            echo '	<label>'.__('Select LayerSlider','iamd_text_domain').'</label>';
							echo ' 	</div>';
							echo ' <div class="column two-sixth">';
                            echo '	<select name="layerslider_id">';
                            echo '		<option value="0">'.__("Select Slider",'iamd_text_domain').'</option>';
									  	foreach($sliders as $item) :
											$name = empty($item->name) ? 'Unnamed' : $item->name;
											$id = $item->id;
											$rs = isset($tpl_default_settings['layerslider_id']) ? $tpl_default_settings['layerslider_id']:'';
											$rs = selected($id,$rs,false);
											echo "	<option value='{$id}' {$rs}>{$name}</option>";
										endforeach;
                            echo '	</select>';
                            echo '<p class="note">';
							_e("Choose Which LayerSlider you would like to use..",'iamd_text_domain');
							echo "</p>";
							echo ' 	</div>';
							echo '	</div>';
                            echo '</div>';
					  else:
					     echo '<p id="j-no-images-container">'.__('Please add atleat one layer slider','dt_themes').'</p>';
					  endif;?>
                      
					<?php $layersliders = get_option('layerslider-slides');
                        if($layersliders):
                            $layersliders = is_array($layersliders) ? $layersliders : unserialize($layersliders);	
                            foreach($layersliders as $key => $val):
                                $layersliders_array[$key+1] = 'LayerSlider #'.($key+1);
                            endforeach;
                            echo '<div class="one-half-content">';
							echo '	<div class="bpanel-option-set">';
							echo ' <div class="column one-sixth">';
                            echo '	<label>'.__('Select LayerSlider','dt_themes').'</label>';
                            echo '</div>';
							echo ' <div class="column two-sixth">';
                            echo '	<select name="layerslider_id">';
                            echo '		<option value="0">'.__("Select Slider",'dt_themes').'</option>';
                            foreach($layersliders_array as $key => $value):
                                $rs = isset($tpl_default_settings['layerslider_id']) ? $tpl_default_settings['layerslider_id']:'';
                                $rs = selected($key,$rs,false);
                                echo "	<option value='{$key}' {$rs}>{$value}</option>";
                            endforeach;
                            echo '	</select>';
                            echo '<p class="note">';
							_e("Choose which LayerSlider would you like to use!",'dt_themes');
							echo "</p>";
                            echo '</div>';
							echo '	</div>';
                            echo '</div>';
                        endif;
					  else:?>
                      <p id="j-no-images-container"><?php _e('Please activate Layered Slider','dt_themes'); ?></p>
               <?php endif;?>         
            </div><!-- Layered Slider End-->

            <!-- Revolution Slider -->
            <div id="revolutionslider" class="custom-box" style=" <?php echo esc_attr( $revolutionslider );?>">
	            <h3><?php _e('Revolution Slider','dt_themes');?></h3>
                <?php $return = dttheme_check_slider_revolution_responsive_wordpress_plugin();
					  if($return):
                        echo '<div class="one-half-content">';
						echo '	<div class="bpanel-option-set">';
						echo ' <div class="column one-sixth">';
						echo '	<label>'.__('Select Slider','dt_themes').'</label>';
						echo '</div>';
						echo ' <div class="column three-sixth">';
						echo '	<select name="revolutionslider_id">';
						echo '		<option value="0">'.__("Select Slider",'dt_themes').'</option>';
						foreach($return as $key => $value):
							$rs = isset($tpl_default_settings['revolutionslider_id']) ? $tpl_default_settings['revolutionslider_id']:'';
							$rs = selected($key,$rs,false);
							echo "	<option value='{$key}' {$rs}>{$value}</option>";
						endforeach;
						echo '</select>';
						echo '<p class="note">';
						_e("Choose which Revolution slider would you like to use!",'dt_themes');
						echo "</p>";
						echo '</div>';
						echo '	</div>';
						echo '</div>';
                	  else: ?>
	                	<p id="j-no-images-container"><?php _e('Please activate Revolution Slider , and add at least one slider.','dt_themes'); ?></p>
                <?php endif;?>
            </div><!-- Revolution Slider End-->

            <!-- Image Only -->
            <div id="imageonly" class="custom-box" style=" <?php echo esc_attr( $imageonly );?>">
                <div class="custom-box">
                    <div class="column one-sixth"><?php _e( 'Choose Image','dt_themes');?></div>
                    <div class="column five-sixth last">
                        <div class="image-preview-container">
                            <?php $slider_image = array_key_exists ( "slider-image", $tpl_default_settings ) ? $tpl_default_settings ['slider-image'] : '';?>
                            <input name="slider-image" type="text" class="uploadfield medium" readonly="readonly" value="<?php echo esc_attr($slider_image);?>"/>
                            <input type="button" value="<?php esc_attr_e('Upload','dt_themes');?>" class="upload_image_button show_preview" />
                            <input type="button" value="<?php esc_attr_e('Remove','dt_themes');?>" class="upload_image_reset" />
                            <?php if( !empty($subtitlebg) ) dttheme_adminpanel_image_preview($slider_image );?>
                            <p class="note"><?php _e("Upload an image instead of slider",'dt_themes');?></p>
                        </div>                    
                    </div>
                </div>                
            </div><!-- Image Only -->
        </div><!-- slier-container ends--><?php

        wp_reset_postdata();
	}
	
	#Page Meta Box	
	function page_settings($args){
		 
		global $post; 
		$tpl_default_settings = get_post_meta($post->ID,'_tpl_default_settings',TRUE);
		$tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings  : array();?>
        
        <div class="j-pagetemplate-container">
        
        	<div id="tpl-common-settings">

                <!-- Breadcrumb -->
                <div class="custom-box">
                    <div class="column one-sixth"><label><?php _e('Disable Breadcrumb','dt_themes');?></label></div>
                    <div class="column five-sixth last"><?php 
                        $switchclass = array_key_exists("disable-breadcrumb",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';?>
                        
                        <div data-for="mytheme-page-breadcrumb" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
                        <input id="mytheme-page-breadcrumb" class="hidden" type="checkbox" name="mytheme-page-breadcrumb" value="true"
                        	<?php if( array_key_exists("disable-breadcrumb",$tpl_default_settings) ):?> checked="checked"<?php endif;?>/>
                        <p class="note"> <?php _e('YES! to disable breadcrumb on this page.','dt_themes');?> </p>
                    </div>
                 </div><!-- Breadcrumb End-->

                <!-- Title Section Start -->
                <div class="custom-box">
                    <div class="column one-sixth"><?php _e( 'Title Background','dt_themes');?></div>
                    <div class="column five-sixth last">
                        <div class="image-preview-container">
                            <?php $subtitlebg = array_key_exists ( "sub-title-bg", $tpl_default_settings ) ? $tpl_default_settings ['sub-title-bg'] : '';?>
                            <input name="sub-title-bg" type="text" class="uploadfield medium" readonly="readonly" value="<?php echo esc_attr( $subtitlebg );?>"/>
                            <input type="button" value="<?php esc_attr_e('Upload','dt_themes');?>" class="upload_image_button show_preview" />
                            <input type="button" value="<?php esc_attr_e('Remove','dt_themes');?>" class="upload_image_reset" />
                            <?php if( !empty($subtitlebg) ) dttheme_adminpanel_image_preview($subtitlebg );?>
                            <p class="note"><?php _e("Upload an image for the sub title background",'dt_themes');?></p>
                        </div>                    
                    </div>
                </div>

                <div class="custom-box">
                    <div class="column one-sixth"></div>
                    <div class="column five-sixth last">
                        <div class="column one-third">
                            <label><?php _e('Background Repeat','dt_themes');?></label>
                            <?php $bgrepeat =  array_key_exists ( "sub-title-bg-repeat", $tpl_default_settings ) ? $tpl_default_settings ['sub-title-bg-repeat'] : ''; ?>
                            <div class="clear"></div>
                            <select name="sub-title-bg-repeat">
                                <option value=""><?php _e("Select",'dt_themes');?></option>
                                <?php foreach( array("repeat","repeat-x","repeat-y","no-repeat") as $option): ?>
                                       <option value="<?php echo esc_attr($option);?>" <?php selected($option,$bgrepeat);?>><?php echo esc_html($option);?></option> 
                                <?php endforeach;?>
                            </select>
                            <p class="note"><?php _e("Select how would you like to repeat the background image ",'dt_themes');?></p>
                        </div>
                        <div class="column one-third">
                            <label><?php _e('Background Position','dt_themes');?></label>
                            <?php $bgposition =  array_key_exists ( "sub-title-bg-position", $tpl_default_settings ) ? $tpl_default_settings ['sub-title-bg-position'] : ''; ?>
                            <div class="clear"></div>
                            <select name="sub-title-bg-position">
                                <option value=""><?php _e("Select",'dt_themes');?></option>
                                <?php foreach( array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right") as $option): ?>
                                    <option value="<?php echo esc_attr($option);?>" <?php selected($option,$bgposition);?>> <?php echo esc_html($option);?></option> 
                                <?php endforeach;?>
                            </select>
                            <p class="note"><?php _e("Select how would you like to position the background",'dt_themes');?></p>
                        </div>
                        <div class="column one-third last">
                            <label><?php _e('Apply Dark Title','dt_themes');?></label>
                            <div class="clear"></div><?php
                                $switchclass = array_key_exists("dark-bg",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';?>

                                <div data-for="page-darkbg" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
                                <input id="page-darkbg" class="hidden" type="checkbox" name="page-darkbg" value="true"
                                	<?php if( array_key_exists( "dark-bg",$tpl_default_settings ) ):?> checked="checked"<?php endif;?>/>
                                <p class="note"> <?php _e('YES! to have dark text for light background.','dt_themes');?> </p>
                        </div>
                    </div>    
                </div>
                <!-- Title Section End -->

            	<!-- 1. Layout -->
                <div id="page-layout" class="custom-box">
                	<div class="column one-sixth"><label><?php _e('Layout','dt_themes');?> </label></div>
                    <div class="column five-sixth last">
                    	<ul class="bpanel-layout-set"><?php 
							$homepage_layout = array(
                                'content-full-width'=>'without-sidebar',
                                'with-left-sidebar'=>'left-sidebar',
                                'with-right-sidebar'=>'right-sidebar');
							
                            $v =  array_key_exists("layout",$tpl_default_settings) ?  $tpl_default_settings['layout'] : 'content-full-width';
							
							foreach($homepage_layout as $key => $value):
								$class = ($key == $v) ? " class='selected' " : "";
								echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' /></a></li>";
							endforeach;?></ul>
						 <input id="mytheme-page-layout" name="layout" type="hidden"  value="<?php echo esc_attr($v);?>"/>
                         <p class="note"> <?php _e("You can choose between a left, right or no sidebar layout.",'dt_themes');?> </p>
                    </div>
                </div> <!-- Layout End--><?php 
				
				$show_sidebar = '';
				switch( $v ):
					case 'content-full-width':	$show_sidebar = "display:none;"; break;
                    default: $show_sidebar = ''; break;
				endswitch;?>
                
                <div class="widget-area-options" style="<?php echo esc_attr($show_sidebar);?>">
                    <div class="custom-box">
                        <div class="column one-sixth">   
                            <label><?php _e('Disable Standard Sidebar','dt_themes');?></label>
                        </div>
                        <div class="column five-sixth last">  
                            <?php $switchclass = array_key_exists("disable-standard-sidebar",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';?>

                                <div data-for="mytheme-disable-standard-sidebar" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
                                <input id="mytheme-disable-standard-sidebar" class="hidden" type="checkbox" name="disable-standard-sidebar" value="true"
                                	<?php if( array_key_exists("disable-standard-sidebar",$tpl_default_settings) ):?> checked="checked"<?php endif;?>/>
                                <p class="note"> <?php _e('YES! to disable standard sidebar','dt_themes');?> </p>
                        </div>
                    </div>

                    <div class="sidebar-section custom-box">
                        <div class="column one-sixth"><label><?php _e('Choose Widget Area','dt_themes');?></label></div>
                        <div class="column five-sixth last"><?php
                            if( array_key_exists('widget-area', $tpl_default_settings)):
                                $widgetareas =  array_unique($tpl_default_settings["widget-area"]);
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
                                	dttheme_custom_widgetarea_list("widgetareas","","multidropdown");
                                echo '</div>';                                
                            endif;?>
                        </div>
                    </div><!-- Choose Widget Areas End -->
            	</div>
            </div><!-- .tpl-common-settings end -->

            <div id="tpl-default-settings">
            	<!-- 4. Allow Commenet -->
                <div class="custom-box">
                	<div class="column one-sixth"><label><?php _e('Allow Comments','dt_themes');?></label></div>
                    <div class="column five-sixth last"><?php 
						$switchclass = array_key_exists("comment",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';?>
                        
                        <div data-for="mytheme-page-comment" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
                        <input id="mytheme-page-comment" class="hidden" type="checkbox" name="mytheme-page-comment" value="true"
                        	<?php if( array_key_exists("comment",$tpl_default_settings) ):?> checked="checked"<?php endif;?>/>
                        <p class="note"> <?php _e('YES! to allow comments on this page.','dt_themes');?> </p>
                    </div>
                 </div><!-- Allow Commenet End-->
             </div><!-- tpl-default-settings end-->
             
            <!-- Blog Template Settings -->
            <div id="tpl-blog">
            
             	<!-- Post Playout -->
                <div class="custom-box">
                    <div class="column one-sixth"><label><?php _e('Posts Layout','dt_themes');?> </label></div>
                    
                    <div class="column five-sixth last">
                    	<ul class="bpanel-post-layout bpanel-layout-set"><?php 
							$posts_layout = array(	
                                'one-column'=>	__("Single post per row.",'dt_themes'),
                                'one-half-column'=>	__("Two posts per row.",'dt_themes'),
                                'one-third-column' => __("Three posts per row",'dt_themes'),
                                'post-thumb' => __("Thumb view of posts","dt_themes"),);

                                $v = array_key_exists("blog-post-layout",$tpl_default_settings) ?  $tpl_default_settings['blog-post-layout'] : 'one-half-column';

                                foreach($posts_layout as $key => $value):
								$class = ($key == $v) ? " class='selected' " : "";
								echo "<li><a href='#' rel='{$key}' {$class} title='{$value}'><img src='".IAMD_FW_URL."theme_options/images/columns/{$key}.png' /></a></li>";
							endforeach;?></ul>
                            
                        <input id="mytheme-blog-post-layout" name="mytheme-blog-post-layout" type="hidden" value="<?php echo esc_attr($v);?>"/>
                        <p class="note"> <?php _e("Choose layout style for your Blog",'dt_themes');?> </p>
                    </div>
                </div><!-- Post Playout End-->

				<!-- Allow Excerpt -->
                <div class="custom-box">
                    <div class="column one-sixth"><label><?php _e('Allow Excerpt','dt_themes');?></label></div>
                    <div class="column five-sixth last">                     
						<?php $switchclass = array_key_exists("blog-post-excerpt",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';?>
                        <div data-for="mytheme-blog-post-excerpt" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
                        <input id="mytheme-blog-post-excerpt" class="hidden" type="checkbox" name="mytheme-blog-post-excerpt" value="true"
                        	<?php if( array_key_exists("blog-post-excerpt",$tpl_default_settings) ):?> checked="checked"<?php endif;?>/>
                        <p class="note"> <?php _e('Enable Excerpt','dt_themes');?> </p>
                    </div>
                </div><!-- Allow Excerpt End-->

                <!-- Excerpt Length-->
                <div class="custom-box">
                    <div class="column one-sixth"><label><?php _e('Excerpt Length','dt_themes');?></label></div>
                    <div class="column five-sixth last">
                    	<?php $v = array_key_exists("blog-post-excerpt-length",$tpl_default_settings) ?  $tpl_default_settings['blog-post-excerpt-length'] : '45';?>
                        <input id="mytheme-blog-post-excerpt-length" name="mytheme-blog-post-excerpt-length" type="text" value="<?php echo esc_attr($v);?>" />
                        <p class="note"> <?php _e("Limit! Number of charectors from the content to appear on each blog post (Number Only)",'dt_themes');?> </p>
                    </div>
                </div><!-- Excerpt Length End-->

                <!-- Post Count-->
                <div class="custom-box">
                    <div class="column one-sixth"><label><?php _e('Post per page','dt_themes');?></label></div>
                    <div class="column five-sixth last">
                        <select name="mytheme-blog-post-per-page">
                            <option value="-1"><?php _e("All",'dt_themes');?></option>
                            <?php $selected = 	array_key_exists("blog-post-per-page",$tpl_default_settings) ?  $tpl_default_settings['blog-post-per-page'] : ''; ?>
                            <?php for($i=1;$i<=30;$i++):
                                echo "<option value='{$i}'".selected($selected,$i,false).">{$i}</option>";
                                endfor;?>
                        </select>
                        <p class="note"><?php _e("Your blog pages show at most selected number of posts per page.",'dt_themes');?></p>
                    </div>
                </div><!-- Post Count End-->
                
                <!-- Post Meta-->
                <div class="custom-box">
	                <h3><?php _e('Post Meta Options','dt_themes');?></h3>
                	<?php $post_meta = array(array(
								"id"=>		"disable-author-info",
								"label"=>	__("Disable the Author info.",'dt_themes'),
								"tooltip"=>	__("By default the author info will display when viewing your posts. You can choose to disable it here.",'dt_themes')
							), array(
								"id"=>		"disable-date-info",
								"label"=>	__("Disable the date info.",'dt_themes'),
								"tooltip"=>	__("By default the date info will display when viewing your posts. You can choose to disable it here.",'dt_themes')
							),
							array(
								"id"=>		"disable-comment-info",
								"label"=>	__("Disable the comment",'dt_themes'),
								"tooltip"=>	__("By default the comment will display when viewing your posts. You can choose to disable it here.",'dt_themes')
							),
							array(
								"id"=>		"disable-category-info",
								"label"=>	__("Disable the category",'dt_themes'),
								"tooltip"=>	__("By default the category will display when viewing your posts. You can choose to disable it here.",'dt_themes')
							),
							array(
								"id"=>		"disable-tag-info",
								"label"=>	__("Disable the tag",'dt_themes'),
								"tooltip"=>	__("By default the tag will display when viewing your posts. You can choose to disable it here.",'dt_themes')
							),
                            array(
                                "id"=>      "disable-format-info",
                                "label"=>   __("Disable the post format info.",'dt_themes'),
                                "tooltip"=> __("By default the post format info will display when viewing your posts. You can choose to disable it here.",'dt_themes')
                            ));
						$count = 1;
						foreach($post_meta as $p_meta):
							$last = ($count%3 == 0)?"last":'';
							$id = 		$p_meta['id'];
							$label =	$p_meta['label'];
							$tooltip =  $p_meta['tooltip'];
							$v =  array_key_exists($id,$tpl_default_settings) ?  $tpl_default_settings[$id] : '';
							$rs =		checked($id,$v,false);
						 	$switchclass = ($v<>'') ? 'checkbox-switch-on' :'checkbox-switch-off';
							
							echo "<div class='one-third-content {$last}'>";
							echo '<div class="bpanel-option-set">';
							echo "<label>{$label}</label>";							
							echo "<div data-for='{$id}' class='checkbox-switch {$switchclass}'></div>";
							echo "<input class='hidden' id='{$id}' type='checkbox' name='mytheme-blog-{$id}' value='{$id}' {$rs} />";
							echo '<p class="note">'.$tooltip.'</p>';
							echo '</div>';
							echo '</div>';
							
						$count++;	
						endforeach;?>
                </div><!-- Post Meta End-->
                
                <!-- Categories -->
                <div class="custom-box">
                	<h3><?php _e('Exclude Categories','dt_themes');?></h3>
                    <?php if(array_key_exists("blog-post-exclude-categories",$tpl_default_settings)):
							 $exclude_cats = array_unique($tpl_default_settings["blog-post-exclude-categories"]);
							 foreach($exclude_cats as $cats):
								echo "<!-- Category Drop Down Container -->
									  <div class='multidropdown'>";
										dttheme_categorylist("blog,exclude_cats",$cats,"multidropdown");
								echo "</div><!-- Category Drop Down Container end-->";		
							 endforeach;
						  else:
							echo "<!-- Category Drop Down Container -->";
							echo "<div class='multidropdown'>";
									dttheme_categorylist("blog,exclude_cats","","multidropdown");
							echo "</div><!-- Category Drop Down Container end-->";
						   endif;?>
                    <p class="note"> <?php _e("You can choose certain categories to exclude from your blog page.",'dt_themes');?> </p>
                </div><!-- Categories End-->
            </div><!-- Blog Template Settings End-->
            
             <!-- Portfolio Template Settings -->
            <div id="tpl-portfolio">
             	<!-- Post Playout -->
                <div class="custom-box">
                    <div class="column one-sixth">                 
                        <label><?php _e('Posts Layout','dt_themes');?> </label>
                    </div>
                    <div class="column five-sixth last">       
                        <ul class="bpanel-post-layout bpanel-layout-set">
                        <?php $posts_layout = array( 
							    'one-half-column'=>	__("Two posts per row.",'dt_themes'),
								'one-third-column'=>	__("Three posts per row.",'dt_themes'),
								'one-fourth-column' => __("Four Posts per row",'dt_themes'));
                                $v = array_key_exists("portfolio-post-layout",$tpl_default_settings) ?  $tpl_default_settings['portfolio-post-layout'] : 'one-third-column';
                                foreach($posts_layout as $key => $value):
                                    $class = ($key == $v) ? " class='selected' " : "";
                                    echo "<li><a href='#' rel='{$key}' {$class} title='{$value}'><img src='".IAMD_FW_URL."theme_options/images/columns/{$key}.png' /></a></li>";
                                endforeach;?>
                        </ul>
                        <input id="mytheme-portfolio-post-layout" name="mytheme-portfolio-post-layout" type="hidden" value="<?php echo esc_attr($v);?>"/>
                        <p class="note"> <?php _e("Choose layout style for your portfolio",'dt_themes');?> </p>
                    </div>      
                </div><!-- Post Playout End-->

                <!-- Post Count-->
                <div class="custom-box">
                    <div class="column one-sixth">                 
                        <label><?php _e('Post per page','dt_themes');?></label>
                    </div>
                    <div class="column five-sixth last">   
                        <select name="mytheme-portfolio-post-per-page">
                            <option value="-1"><?php _e("All",'dt_themes');?></option>
                            <?php $selected = 	array_key_exists("portfolio-post-per-page",$tpl_default_settings) ?  $tpl_default_settings['portfolio-post-per-page'] : ''; ?>
                            <?php for($i=1;$i<=30;$i++):
                                echo "<option value='{$i}'".selected($selected,$i,false).">{$i}</option>";
                                endfor;?>
                        </select>
                        <p class="note"> <?php _e("Your portfolio pages show at most selected number of posts per page.",'dt_themes');?> </p>
                    </div>
                </div><!-- Post Count End-->

                <div class="custom-box">
                    <div class="column one-sixth">                
	                    <label><?php _e('Allow Filters','dt_themes');?></label>
                    </div>
                    <div class="column five-sixth last">                       
						<?php $switchclass = array_key_exists("filter",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';?>
                        <div data-for="mytheme-portfolio-filter" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
                        <input id="mytheme-portfolio-filter" class="hidden" type="checkbox" name="mytheme-portfolio-filter" value="true"
                        	<?php if( array_key_exists("filter",$tpl_default_settings) ):?> checked="checked"<?php endif;?>/>
                        <p class="note"> <?php _e('Allow filter options for portfolio items','dt_themes');?> </p>
                    </div>
                </div>
                
                <!-- Categories -->
                <div class="custom-box">
                	<h3><?php _e('Choose Categories','dt_themes');?></h3>
                    <?php if(array_key_exists("portfolio-categories",$tpl_default_settings)):
							 $exclude_cats = array_unique($tpl_default_settings["portfolio-categories"]);
							 foreach($exclude_cats as $cats):
								echo "<!-- Category Drop Down Container -->
									  <div class='multidropdown'>";
									  	dttheme_gallery_categorylist("portfolio,cats",$cats,"multidropdown");
								echo "</div><!-- Category Drop Down Container end-->";		
							 endforeach;
						  else:
							echo "<!-- Category Drop Down Container -->";
							echo "<div class='multidropdown'>";
								dttheme_gallery_categorylist("portfolio,cats","","multidropdown");
							echo "</div><!-- Category Drop Down Container end-->";
						   endif;?>
                    <p class="note"> <?php _e("You can choose only certain categories to show in gallery items. ",'dt_themes');?> </p>
                </div><!-- Categories End-->
            </div><!-- Portfolio Template Settings End-->
        </div><?php
		
        wp_reset_postdata();
    } 
   
	function page_meta_save($post_id){
		global $pagenow;
		if ( 'post.php' != $pagenow ) return $post_id;
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 	return $post_id;
		
			$settings = array();
			$settings['layout'] = $_POST['layout'];

			$settings['widget-area'] =  array_unique(array_filter($_POST['mytheme']['widgetareas']));
			$settings['disable-standard-sidebar'] = isset($_POST['disable-standard-sidebar']) ? $_POST['disable-standard-sidebar'] : "";		

            $settings['sub-title-bg'] = dt_wp_kses($_POST['sub-title-bg']);
            $settings['sub-title-bg-repeat'] = $_POST['sub-title-bg-repeat'];
            $settings['sub-title-bg-position'] = $_POST['sub-title-bg-position'];
            $settings['dark-bg'] = $_POST['page-darkbg'];
            $settings['disable-breadcrumb'] = $_POST['mytheme-page-breadcrumb'];

			if(isset($_POST["page_template"]) && 'default' == $_POST["page_template"] || 
				'tpl-home.php' == $_POST["page_template"] ||
                'tpl-feature.php' ==  $_POST["page_template"] || 
				'tpl-fullwidth.php' == $_POST["page_template"] ) :
				$settings['show_slider'] =  $_POST['mytheme-show-slider'];
				$settings['slider_type'] = $_POST['mytheme-slider-type'];
				$settings['comment'] = $_POST['mytheme-page-comment'];
				$settings['layerslider_id'] = $_POST['layerslider_id'];
				$settings['revolutionslider_id'] = $_POST['revolutionslider_id'];
                $settings['slider-image'] = dt_wp_kses($_POST['slider-image']);
			
			elseif( "tpl-blog.php" == $_POST['page_template'] ):
				$settings['blog-post-layout'] = $_POST['mytheme-blog-post-layout'];
				$settings['blog-post-per-page'] = $_POST['mytheme-blog-post-per-page'];
				$settings['blog-post-excerpt'] = $_POST['mytheme-blog-post-excerpt'];
				$settings['blog-post-excerpt-length'] = dt_wp_kses($_POST['mytheme-blog-post-excerpt-length']);
				$settings['blog-post-exclude-categories'] = $_POST['mytheme']['blog']['exclude_cats'];
				$settings['disable-date-info'] = $_POST['mytheme-blog-disable-date-info'];
				$settings['disable-author-info'] = $_POST['mytheme-blog-disable-author-info'];
				$settings['disable-comment-info'] = $_POST['mytheme-blog-disable-comment-info'];
				$settings['disable-category-info'] = $_POST['mytheme-blog-disable-category-info'];
				$settings['disable-tag-info'] = $_POST['mytheme-blog-disable-tag-info'];
                $settings['disable-format-info']    =  $_POST['mytheme-blog-disable-format-info'];
			
			elseif( "tpl-portfolio.php" == $_POST['page_template'] ):
				$settings['portfolio-post-layout'] = $_POST['mytheme-portfolio-post-layout'];
				$settings['portfolio-post-per-page'] = $_POST['mytheme-portfolio-post-per-page'];
				$settings['filter'] = $_POST['mytheme-portfolio-filter'];
                $settings['portfolio-categories'] = $_POST['mytheme']['portfolio']['cats'];
				
			elseif( "tpl-onepage.php" == $_POST['page_template'] ):
				$settings['show_slider'] =  $_POST['mytheme-show-slider'];
				$settings['slider_type'] = $_POST['mytheme-slider-type'];
				$settings['layerslider_id'] = $_POST['layerslider_id'];
				$settings['revolutionslider_id'] = $_POST['revolutionslider_id'];
                $settings['slider-image'] = $_POST['slider-image'];
            endif;
		
		update_post_meta($post_id, "_tpl_default_settings", array_filter($settings));
		
	}?>