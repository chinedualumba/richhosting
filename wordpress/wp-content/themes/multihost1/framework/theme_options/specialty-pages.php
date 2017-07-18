<!-- #specialty-pages -->
<div id="specialty-pages" class="bpanel-content">
    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel"><?php
            $sub_menus = array(
                array("title"=>__("Global",'dt_themes'), "link"=>"#global"),
                array("title"=>__("Author",'dt_themes'), "link"=>"#author-archives"),
                array("title"=>__("Category",'dt_themes'), "link"=>"#category-archives"),
                array("title"=>__("Tag",'dt_themes'), "link"=>"#tag-archives"),
                array("title"=>__("Portfolio",'dt_themes'), "link"=>"#gallery-archives"),
                array("title"=>__("Search",'dt_themes'), "link"=>"#search"),
                array("title"=>__("404",'dt_themes'), "link"=>"#404"));

                foreach($sub_menus as $menu): ?>
                    <li><a href="<?php echo esc_attr( $menu['link'] );?>"><?php echo esc_html( $menu['title'] );?></a></li><?php
                endforeach?>
        </ul>

        <div id="global" class="tab-content">

            <div class="bpanel-box">
                <div class="box-title">
                    <h3><?php echo __('Page Layout','dt_themes');?></h3>
                </div>
                <div class="box-content">
                    <h6><?php _e('Force to Enable Global Page Layout','dt_themes');?></h6>
                    <?php dttheme_switch("",'specialty','force-enable-global-page-layout');?>

                    <div class="clear"> </div>
                    <div class="hr"> </div>
                    <p class="note"><?php _e("You can choose between a left, right or no sidebar layout globally for all pages.",'dt_themes'); ?></p>
                    <div class="bpanel-post-layout bpanel-option-set">
                        <ul class="bpanel-layout-set"><?php
                            $layout = array( 'content-full-width'=>'without-sidebar',
                                'with-left-sidebar'=>'left-sidebar',
                                'with-right-sidebar'=>'right-sidebar'
                            );
                            foreach($layout as $key => $value):
                                $class = ( $key ==  dttheme_option('specialty',"global-page-layout")) ? " class='selected' " : "";
                                echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' /></a></li>";
                            endforeach;?>
                        </ul>
                        <input id="mytheme[specialty][global-page-layout]" name="mytheme[specialty][global-page-layout]" type="hidden"
                            value="<?php echo dttheme_option('specialty','global-page-layout');?>"/>
                    </div>                    
                </div>
            </div>

            <div class="bpanel-box">
                <div class="box-title">
                    <h3><?php echo __('Post Layout','dt_themes');?></h3>
                </div>
                <div class="box-content">
                    <h6><?php _e('Force to Enable Global Post Layout','dt_themes');?></h6>
                    <?php dttheme_switch("",'specialty','force-enable-global-post-layout');?>

                    <div class="clear"> </div>
                    <div class="hr"> </div>
                    <p class="note"><?php _e("You can choose between a left, right or no sidebar layout globally for all posts.",'dt_themes'); ?></p>
                    <div class="bpanel-post-layout bpanel-option-set">
                        <ul class="bpanel-layout-set"><?php
                            $layout = array( 'content-full-width'=>'without-sidebar',
                                'with-left-sidebar'=>'left-sidebar',
                                'with-right-sidebar'=>'right-sidebar'
                            );
                            foreach($layout as $key => $value):
                                $class = ( $key ==  dttheme_option('specialty',"global-post-layout")) ? " class='selected' " : "";
                                echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' /></a></li>";
                            endforeach;?>
                        </ul>
                        <input id="mytheme[specialty][global-post-layout]" name="mytheme[specialty][global-post-layout]" type="hidden"
                            value="<?php echo dttheme_option('specialty','global-post-layout');?>"/>
                    </div>                
                </div>
            </div>
        </div><?php
        $posts_layout_array =   array(
            'one-column'=> __("Single post per row.",'dt_themes'),
            'one-half-column'=> __("Two posts per row.",'dt_themes'),
            'one-third-column' => __("Three posts per row",'dt_themes'),
            'post-thumb' => __("Thumb view of posts","dt_themes") );


        $tabs = array(

                array(  "id"=>"author-archives", 
                        "layout-title"=>__("Post's Author Archive Page Layout",'dt_themes'),
                        "layout-tooltip"=>__("You can choose between a left, right, both or no sidebar layout for the Author Archive page.",'dt_themes'),
                        "post-layout-title" => __("Posts Layout",'dt_themes'),
                        "post-layout-tooltip"=>__("Your author archive results will use the layout you select below.",'dt_themes'),                                
                        "post-layouts" => $posts_layout_array
                 ),

	 			array(	"id"=>"category-archives", 
						"layout-title"=>__("Post's Category Archive Page Layout",'dt_themes'),
						"layout-tooltip"=>__("You can choose between a left, right, both or no sidebar layout for the Category Archive page.",'dt_themes'),
						"post-layout-title" => __("Posts Layout",'dt_themes'),
						"post-layout-tooltip"=>__("Your category archive results will use the layout you select below.",'dt_themes'),								
                        "post-layouts" => $posts_layout_array
				 ),

                array(  "id"=>"tag-archives", 
                        "layout-title"=>__("Post's Tag Archive Page Layout",'dt_themes'),
                        "layout-tooltip"=>__("You can choose between a left, right, both or no sidebar layout for the Tag Archive page.",'dt_themes'),
                        "post-layout-title" => __("Posts Layout",'dt_themes'),
                        "post-layout-tooltip"=>__("Your tag archive results will use the layout you select below.",'dt_themes'),
                        "post-layouts" => $posts_layout_array                                
                 ),

                array(  "id"=>"gallery-archives", 
                        "layout-title"=>__("Portfolio Custom Post's Category Archive Page Layout",'dt_themes'),
                        "layout-tooltip"=>__("You can choose between a left, right, both or no sidebar layout for the Portfolio custom post's category Archive page.",'dt_themes'),
                        "post-layout-title" => __("Posts Layout",'dt_themes'),
                        "post-layout-tooltip"=>__("Your category archive results will use the layout you select below.",'dt_themes'),                                
                        "post-layouts" => array(
                            'one-third-column'=>__("Three portfolio items per row.",'dt_themes'),                                   
                            'one-fourth-column' => __("Three portfolio items per row.",'dt_themes'))
                ),

				array(  "id"=>"search",
						"layout-title"=>__("Search Layout",'dt_themes'),
						"layout-tooltip"=>__("You can choose between a left, right or no sidebar layout for your Search page.",'dt_themes'),
						"post-layout-title" => __("Posts Layout",'dt_themes'),
						"post-layout-tooltip"=>__("Your Search results will use the layout you select below.",'dt_themes'),
                        "post-layouts" => $posts_layout_array
				),

				array(  "id"=>"404",
						"layout-title"=>__("404 Layout",'dt_themes'),
						"layout-tooltip"=>__("You can choose between a left, right or no sidebar layout for your 404 page.",'dt_themes'),
						
						"bg-title"=>__("404 Background",'dt_themes'),
						"bg-label"=>__("404 background image",'dt_themes'),
						"bg-tooltip"=>__('Upload an image for the theme\'s 404 page background','dt_themes'),

						"content-title" => __("404 Message",'dt_themes'),
						"content-tooltip"=>__("You can give custom 404 page message",'dt_themes')
				));?>
        <?php foreach($tabs as $tab): 
				$id =  $tab['id'];?>
        	<div id="<?php echo esc_attr( $id );?>" class="tab-content">
            	 <div class="bpanel-box">
                 
                 	<!-- Section 1 -->	
                    <div class="box-title"><h3><?php echo esc_html( $tab['layout-title'] );?></h3></div>
                    <div class="box-content">
                    	<p class="note"> <?php echo esc_html($tab['layout-tooltip']);?></p>

                    	<div class="bpanel-option-set">
                        	<ul id="<?php echo 'dt-'.$id;?>" class="bpanel-post-layout bpanel-layout-set">
                           	<?php $layout = array(	'content-full-width'=>'without-sidebar', 'with-left-sidebar'=>'left-sidebar', 'with-right-sidebar'=>'right-sidebar');
							foreach($layout as $key => $value):
								$class = ( $key ==  dttheme_option('specialty',"{$id}-layout")) ? " class='selected' " : "";
								echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' /></a></li>";
							endforeach; ?>
                            </ul>
                            <input id="mytheme[specialty][<?php echo esc_attr($id);?>-layout]" name="mytheme[specialty][<?php echo esc_attr($id);?>-layout]" type="hidden"  
                            	value="<?php echo dttheme_option('specialty',"{$id}-layout");?>"/>
                        </div><?php 
                            $sb_layout = dttheme_option('specialty',"{$id}-layout");
                            $sidebar = '';
                            if($sb_layout == 'content-full-width') {
                                $sidebar = 'display:none;'; 
                            }?>
                        <div id="bpanel-widget-area-options" class="dt-<?php esc_attr($id);?>" style=" <?php echo esc_attr($sidebar);?>">
                            
                            <div id="left-sidebar-container" class="bpanel-page-left-sidebar" style=" <?php echo esc_attr($sidebar);?>">
                                <!-- 2. Every Where Sidebar Left Start -->
                                <div id="page-commom-sidebar" class="bpanel-sidebar-section custom-box">
                                    <h6><?php _e('Disable Standard Sidebar','dt_themes');?></label></h6>
                                    <?php dttheme_switch("",'specialty','disable-standard-sidebar-for-'.$id); ?>
                                </div><!-- Every Where Sidebar Left End-->
                            </div>
                        </div>


                    </div><!-- Section 1 End -->


                    <?php if( $id != "404" ): ?>
                    <!-- Post Layout Section -->
	                <div class="box-title"><h3><?php echo esc_html( $tab['post-layout-title'] );?></h3></div>
                    <div class="box-content">
                    	<p class="note"><?php echo esc_html( $tab['post-layout-tooltip'] );?></p>
                    	<div class="bpanel-option-set">
                        	<ul class="bpanel-post-layout bpanel-layout-set">
                            <?php $posts_layout = $tab['post-layouts'];
									$v = dttheme_option('specialty',"{$id}-post-layout");
									$v = !empty($v) ? $v : "one-column";
								  foreach($posts_layout as $key => $value):
									$class = ( $key ==  $v ) ? " class='selected' " :"";								  
									echo "<li><a href='#' rel='{$key}' {$class} title='{$value}'><img src='".IAMD_FW_URL."theme_options/images/columns/{$key}.png' /></a></li>";
                           		 endforeach;?>
                    		</ul>
                            <input id="mytheme[specialty][<?php echo esc_attr($id);?>-post-layout]" name="mytheme[specialty][<?php echo esc_attr($id);?>-post-layout]" type="hidden"  
                            	value="<?php echo dttheme_option('specialty',"{$id}-post-layout");?>"/>
                        </div>
                    </div>
                    <!-- Post Layout Section End-->
                    <?php endif; ?>
                    

                   
                    <!-- 404 Content -->
                    <?php if($id == "404"): ?>
                        <div class="box-title"><h3><?php echo esc_html( $tab['content-title'] );?></h3></div>
                        <div class="box-content">
                        	<p class="note"><?php echo esc_html($tab['content-tooltip']);?></p>
                            
                            
                            <div class="bpanel-option-set">
                                <h6><?php _e('404 Custom Message','dt_themes');?></h6>
                                <textarea id="mytheme-404-text" name="mytheme[specialty][404-message]" rows="" 
                                	cols=""><?php echo stripslashes(dttheme_option('specialty','404-message'));?></textarea>
                            </div>
                            <div class="hr"></div>
                            
                            <h6><?php _e("Disable Font Settings",'dt_themes')?></h6>
                            <div class="column one-fifth bpanel-option-set">
                            	<?php dttheme_switch("",'specialty','disable-404-font-settings');?>
                            </div>
                            <div class="column four-fifth last"><p class="note"><?php _e('Enable / Disable 404 Font settings','dt_themes');?></p></div>
                            <div class="hr"></div>
                        
                        	<!-- Font Section -->                        	
                            <div class="column one-column">
                                <div class="bpanel-option-set">
                                    <?php dttheme_admin_fonts(__('Message Font','dt_themes'),'mytheme[specialty][message-font]',dttheme_option('specialty','message-font'));?>
                                </div>
                            </div>
                            <!-- Font Section -->
                            <div class="hr_invisible"> </div>
                            <!-- Font Color Section -->
                            <div class="column one-half">
        	                    <?php $label = 		__("Message Font Color",'dt_themes');
									  $name  =		"mytheme[specialty][message-font-color]";	
									  $value =  	 (dttheme_option('specialty','message-font-color')!= NULL) ? dttheme_option('specialty','message-font-color') : "#";
									  $tooltip = 	__("Pick a custom color for 404 message font color of the theme e.g. #a314a3",'dt_themes'); ?>
									  <h6> <?php echo esc_html( $label );?> </h6>
                                  <?php dttheme_admin_color_picker("",$name,$value,'');?>
                            
                            </div><!-- Font Color Section -->
                            <div class="column one-half last">
								<?php dttheme_admin_jqueryuislider(__('Message Font Size','dt_themes'),"mytheme[specialty][message-font-size]",
    	                        dttheme_option('specialty',"message-font-size"));?>
                            </div>
                            
                        </div>
                    <?php endif;?>
                    <!-- 404 Content End-->

                 </div><!-- .bpanel-box end -->
            </div><!-- .tab-content end -->
        <?php endforeach;?>
    </div>
</div><!-- #specialty-pages end-->