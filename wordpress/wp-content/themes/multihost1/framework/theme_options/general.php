<!-- #general -->
<div id="general" class="bpanel-content">

    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel"> 
            <li><a href="#my-general"><?php _e("General",'dt_themes');?></a></li>
            <li><a href="#my-sociable"><?php _e("Sociable",'dt_themes');?></a></li>
            <li><a href="#my-bars"><?php _e('Bars','dt_themes');?></a></li>
        </ul>
        
        <!-- #my-general-->
        <div id="my-general" class="tab-content">
            <!-- .bpanel-box -->
            <div class="bpanel-box">
                    <!-- Logo -->
                    <div class="box-title"><h3><?php _e('Logo','dt_themes');?></h3></div>
                    <div class="box-content">
                    
                    
                    	<div class="column three-fifth">
                            <div class="bpanel-option-set">
                                <?php $logo = array(
                                        'id'=>		'logo',
                                        'options'=>		array(
                                                            'true'	=> __('Custom Image Logo','dt_themes'),
                                                             ''=> 	__('Display Site Title','dt_themes').' <small><a href="'.esc_url('options-general.php').'">('.__('click here to edit site title','dt_themes').')</a></small>'
                                                            )
                                        );
										
										$i = 0;										
										foreach( $logo['options'] as $key => $option ):
											$checked = ( $key ==  dttheme_option('general',$logo['id']) ) ? ' checked="checked"' : '';
											echo '<label><input type="radio" name="mytheme[general]['.esc_attr($logo['id']).']" value="'.esc_attr($key).'" '.$checked.'/>'.$option.'</label>';
											if($i == 0):
												echo '<div class="clear"></div>';
											endif;
											$i++;
										endforeach;?>
                          </div><!-- .bpanel-option-set end-->
                      
                        </div>
                        
                        <div class="column two-fifth last">
                            <p class="note"><?php _e('You can choose whether you wish to display a custom logo or your site title.','dt_themes');?></p>
                        </div>  
                        
                        <div class="hr"> </div>

                        <h6><?php _e('Logo','dt_themes');?></h6>  
                        <div class="image-preview-container">
                            <input id="mytheme-logo" name="mytheme[general][logo-url]" type="text" class="uploadfield" readonly="readonly"
                                    value="<?php echo  dttheme_option('general','logo-url');?>" />
                            <input type="button" value="<?php esc_attr_e('Upload','dt_themes');?>" class="upload_image_button show_preview" />
                            <input type="button" value="<?php esc_attr_e('Remove','dt_themes');?>" class="upload_image_reset" />
                            <?php dttheme_adminpanel_image_preview(dttheme_option('general','logo-url'),false,'logo.png');?>
                        </div>
                        
                        <p class="note"> <?php _e('Upload a logo for your theme, or specify the image address of your online logo.','dt_themes');?> </p>

                        <div class="hr"></div>
                        <div class="clear"></div>
                        <h6><?php _e('Retina Logo','dt_themes');?></h6>
                        <div class="image-preview-container">
                          <input id="mytheme-retina-logo" type="text" name="mytheme[general][retina-logo-url]" class="uploadfield" readonly="readonly" 
                            value="<?php echo dttheme_option('general','retina-logo-url');?>"/>
                          <input type="button" value="<?php esc_attr_e('Upload','dt_themes');?>" class="upload_image_button show_preview" />
                          <input type="button" value="<?php esc_attr_e('Remove','dt_themes');?>" class="upload_image_reset" />
                          <?php dttheme_adminpanel_image_preview(dttheme_option('general','retina-logo-url'),false,'logo@2x.png');?>
                        </div>

                        <p class="note"><?php _e('Upload a retina logo for your theme, or specify the image address of your online logo.','dt_themes');?></p>
                        <div class="clear"></div>

                        <div class="one-half-content">
                        	<h6><?php _e('Width','dt_themes');?></h6>
                            <input type="text" class="medium" name="mytheme[general][retina-logo-width]" value="<?php echo dttheme_option('general','retina-logo-width');?>" />
							<?php _e('px','dt_themes');?>
                        </div>    

                        <div class="one-half-content last">
                        	<h6><?php _e('Height','dt_themes');?></h6>
                            <input type="text" class="medium" name="mytheme[general][retina-logo-height]" value="<?php echo dttheme_option('general','retina-logo-height');?>"/>
                            <?php _e('px','dt_themes');?>
                        </div>    
                        <p class="note"><?php _e('If retina logo is uploaded, enter the standard logo width and height in above respective boxes.','dt_themes');?></p>
                        <div class="clear"></div>
                    </div> <!-- Logo End -->

                    <!-- Favicon -->
                    <div class="box-title"><h3><?php _e('Favicon','dt_themes');?></h3></div>
                    <div class="box-content">
                    	<h6> <?php _e('Enable Favicon','dt_themes');?> </h6> 
                        
                        <div class="column one-fifth">
                        <?php $switchclass = ( "true" ==  dttheme_option('general','enable-favicon') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="enable-favicon" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="enable-favicon" name="mytheme[general][enable-favicon]" type="checkbox" value="true"
                            	<?php if( "true" == dttheme_option('general','enable-favicon') ):?> checked="checked"<?php endif;?> />
                        </div>
                        <div class="column four-fifth last"></div>

                        <div class="hr"></div>
                        <div class="clear"></div>
                        <h6><?php _e('Custom Favicon','dt_themes');?></h6>
                          <div class="image-preview-container">
                            <input id="mytheme-favicon" name="mytheme[general][favicon-url]" type="text" class="uploadfield" 
                                value="<?php echo  dttheme_option('general','favicon-url');?>" />
                            <input type="button" value="<?php esc_attr_e('Upload','dt_themes');?>" class="upload_image_button" />
                            <input type="button" value="<?php esc_attr_e('Remove','dt_themes');?>" class="upload_image_reset" />
                            <?php dttheme_adminpanel_image_preview(dttheme_option('general','favicon-url'),false,'favicon.png');?>
                          </div>
                          <p class="note"> <?php _e('Upload a favicon for your theme, or specify the oneline URL for favicon','dt_themes');?>  </p>

                        <div class="hr"></div>
                        <div class="clear"></div>
                        <h6><?php _e('Apple iPhone Icon','dt_themes');?></h6>
                        <div class="image-preview-container">
                          <input id="mytheme-apple-icon" name="mytheme[general][apple-favicon]" type="text" class="uploadfield"
                            value="<?php echo dttheme_option('general','apple-favicon');?>"/>
                            <input type="button" value="<?php esc_attr_e('Upload','dt_themes');?>" class="upload_image_button" />
                            <input type="button" value="<?php esc_attr_e('Remove','dt_themes');?>" class="upload_image_reset" />
                            <?php dttheme_adminpanel_image_preview(dttheme_option('general','apple-favicon'),false,'apple-touch-icon.png');?>
                        </div>
                        <p class="note"> <?php _e('Upload your custom iPhone icon (57px by 57px), or specify the oneline URL for favicon','dt_themes');?>  </p>

                        <div class="hr"></div>
                        <div class="clear"></div>
                        <h6><?php _e('Apple iPhone Retina Icon','dt_themes');?></h6>
                        <div class="image-preview-container">
                          <input id="mytheme-apple-icon" name="mytheme[general][apple-retina-favicon]" type="text" class="uploadfield"
                            value="<?php echo dttheme_option('general','apple-retina-favicon');?>"/>
                            <input type="button" value="<?php esc_attr_e('Upload','dt_themes');?>" class="upload_image_button" />
                            <input type="button" value="<?php esc_attr_e('Remove','dt_themes');?>" class="upload_image_reset" />
                            <?php dttheme_adminpanel_image_preview(dttheme_option('general','apple-retina-favicon'),false,'apple-touch-icon-114x114.png');?>
                        </div>
                        <p class="note"><?php _e('Upload your custom iPhone retina icon (114px by 114px), or specify the oneline URL for favicon','dt_themes');?></p>

                        <div class="hr"></div>
                        <div class="clear"></div>
                        <h6><?php _e('Apple iPad Icon','dt_themes');?></h6>
                        <div class="image-preview-container">
                          <input id="mytheme-apple-icon" name="mytheme[general][apple-ipad-favicon]" type="text" class="uploadfield"
                            value="<?php echo dttheme_option('general','apple-ipad-favicon');?>"/>
                            <input type="button" value="<?php esc_attr_e('Upload','dt_themes');?>" class="upload_image_button" />
                            <input type="button" value="<?php esc_attr_e('Remove','dt_themes');?>" class="upload_image_reset" />
                            <?php dttheme_adminpanel_image_preview(dttheme_option('general','apple-ipad-favicon'),false,'apple-touch-icon-72x72.png');?>
                        </div>
                        <p class="note"> <?php _e('Upload your custom iPad icon (72px by 72px), or specify the oneline URL for favicon','dt_themes');?>  </p>

                        <div class="hr"></div>
                        <div class="clear"></div>
                        <h6><?php _e('Apple iPad Retina Icon','dt_themes');?></h6>
                        <div class="image-preview-container">
                          <input id="mytheme-apple-icon" name="mytheme[general][apple-ipad-retina-favicon]" type="text" class="uploadfield"
                            value="<?php echo dttheme_option('general','apple-ipad-retina-favicon');?>"/>
                            <input type="button" value="<?php esc_attr_e('Upload','dt_themes');?>" class="upload_image_button" />
                            <input type="button" value="<?php esc_attr_e('Remove','dt_themes');?>" class="upload_image_reset" />
                            <?php dttheme_adminpanel_image_preview(dttheme_option('general','apple-ipad-retina-favicon'),false,'apple-touch-icon-114x114.png');?>
                        </div>
                        <p class="note"><?php _e('Upload your custom iPad retina icon (144px by 144px), or specify the oneline URL for favicon','dt_themes');?></p>
                    </div> <!-- Favicon End -->

                    <!-- Others -->
                    <div class="box-title"><h3><?php _e('Others', 'dt_themes');?></h3></div>
                    <div class="box-content">
                    
                      <h6><?php _e('Page loader','dt_themes');?></h6>
                      <div class="column one-fifth">
                      	<?php $checked = ( "true" ==  dttheme_option('general','loading-bar') ) ? ' checked="checked"' : ''; ?>
                        <?php $switchclass = ( "true" ==  dttheme_option('general','loading-bar') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                        <div data-for="mytheme-page-loader" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                        <input class="hidden" id="mytheme-page-loader" name="mytheme[general][loading-bar]" type="checkbox" value="true"
                        	<?php if( "true" == dttheme_option('general','loading-bar') ):?> checked="checked"<?php endif;?>/>                      
                      </div>
                      <div class="column four-fifth last">
                      	<p class="note"><?php _e('YES! to disable page loader.','dt_themes');?> </p>
                      </div>                      
                      <div class="clear"></div>
                      <div class="hr"></div>
                      
                    
                      <h6> <?php _e('Enable Sticky Navigation','dt_themes'); ?></h6>
                        <div class="column one-fifth">
                            <?php $checked = ( "true" ==  dttheme_option('general','enable-sticky-nav') ) ? ' checked="checked"' : ''; ?>
                            <?php $switchclass = ( "true" ==  dttheme_option('general','enable-sticky-nav') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="mytheme-enable-sticky-nav" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                                <input class="hidden" id="mytheme-enable-sticky-nav" name="mytheme[general][enable-sticky-nav]" type="checkbox" value="true"
                                	<?php if( "true" == dttheme_option('general','enable-sticky-nav') ):?> checked="checked"<?php endif;?>/>
                        </div>
                        <div class="column four-fifth last">
                            <p class="note"><?php _e('YES! to enable sticky navigation.','dt_themes');?> </p>
                        </div>
                        
                        <div class="clear"> </div>
                        <div class="hr"></div>


                      <h6> <?php _e('Enable Sticky Navigation For Mobile','dt_themes'); ?></h6>
                        <div class="column one-fifth">
                            <?php $switchclass = ( "true" ==  dttheme_option('general','enable-mobile-sticky-nav') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="mytheme-enable-mobile-sticky-nav" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
                                <input class="hidden" id="mytheme-enable-mobile-sticky-nav" name="mytheme[general][enable-mobile-sticky-nav]" type="checkbox" value="true"
                                	<?php if( "true" == dttheme_option('general','enable-mobile-sticky-nav') ):?> checked="checked"<?php endif;?>/>
                        </div>
                        
                        <div class="column four-fifth last">
                            <p class="note"><?php _e('YES! to enable sticky navigation in mobile.','dt_themes');?> </p>
                        </div>
                        
                        <div class="clear"> </div>
                        <div class="hr"></div>

                        <h6> <?php _e('Globally Disable Comments on Pages','dt_themes');?> </h6>
                        <div class="column one-fifth">
                            <?php $switchclass = ( "true" ==  dttheme_option('general','disable-page-comment') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="mytheme-global-page-comment" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-global-page-comment" name="mytheme[general][disable-page-comment]" type="checkbox" value="true"
                            	<?php if( "true" == dttheme_option('general','disable-page-comment') ):?> checked="checked"<?php endif;?>/>
                        </div>
                        <div class="column four-fifth last">
                      	 <p class="note no-margin"><?php 
							_e('YES! to disable comments on all the pages. This will globally override your "Allow comments" option under your page "Discussion" settings. ','dt_themes');?> </p>
                        </div>
                      <div class="hr"></div>
                      
                        <h6><?php _e('Globally Disable Comments on Posts','dt_themes');?></h6>
                        <div class="column one-fifth">
                            <?php $switchclass = ( "true" ==  dttheme_option('general','global-post-comment') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="mytheme-global-post-comment" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-global-post-comment" name="mytheme[general][global-post-comment]" type="checkbox" value="true"
                            	<?php if( "true" == dttheme_option('general','global-post-comment') ):?> checked="checked"<?php endif;?> />
                        </div>
                        <div class="column four-fifth last">
                            <p class="note no-margin"><?php _e('YES! to disable comments on all the posts. This will globally override your "Allow comments" option under your post "Discussion" settings. ','dt_themes');?> </p>
                        </div>
                        <div class="hr"></div>

                      <!-- Breadcrumb -->
                      <h6><?php _e('Breadcrumb Delimiter','dt_themes');?></h6>
                      <select id="mytheme-breadcrumb-delimiter" name="mytheme[general][breadcrumb-delimiter]"><?php 
                        $breadcrumb_icons = array('fa-angle-double-right','fa-sort','fa-caret-square-o-left', 'fa-caret-square-o-right', 'fa-angle-right','fa-caret-right','fa-double-angle-right','fa-arrow-right','fa-chevron-right',
                            'fa-hand-right','fa-plus','fa-remove', 'fa-exchange');
                            foreach($breadcrumb_icons as $breadcrumb_icon):
                                $s = selected(dttheme_option('general','breadcrumb-delimiter'),$breadcrumb_icon,false);
                                echo "<option ".$s.'>'.$breadcrumb_icon."</option>";
                            endforeach;?></select>
                            <p class="note"><?php _e('This is the symbol that will appear in between your breadcrumbs','dt_themes');?></p>
                      <div class="hr"></div>
                      <!-- Breadcrumb -->
                        
                      
                        <!-- Browser Scroll -->
                        <h6><?php _e('Disable browser custom scroll','dt_themes');?></h6>
                        <div class="column one-fifth">
                            <?php $switchclass = ( "on" ==  dttheme_option('general','disable-custom-scroll') ) ? 'checkbox-switch-on' :'checkbox-switch-off';?>
                            <div data-for="mytheme-browesr-scroll-disable" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-browesr-scroll-disable" name="mytheme[general][disable-custom-scroll]" type="checkbox"<?php checked(dttheme_option('general','disable-custom-scroll'),'on');?>/>
                        </div>

                        <div class="column four-fifth last">
                            <p class="note"><?php _e('Check if you do not want disable the browser custom scrollbar :)','dt_themes');?> </p>
                        </div>
                        <div class="hr"></div>
                        <!-- Browser Scroll -->

                        <!-- Picker -->
                        <h6><?php _e('Disable Style Picker','dt_themes');?></h6>
                        <div class="column one-fifth">
                            <?php $switchclass = ( "on" ==  dttheme_option('general','disable-picker') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="mytheme-global-disable-picker" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-global-disable-picker" name="mytheme[general][disable-picker]" type="checkbox" <?php checked(dttheme_option('general','disable-picker'),'on');?>/>
                        </div>
                        <div class="column four-fifth last">
                            <p class="note"><?php _e('YES! to hide the front end style picker','dt_themes');?> </p>
                        </div>
                        <div class="hr"></div>
                        <!-- Picker End -->


                        <h6><?php _e('Disable import dummy content','dt_themes');?></h6>
                        <div class="column one-fifth">
                            <?php $switchclass = ( "on" ==  dttheme_option('general','disable-import') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="mytheme-global-import-disable" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                                <input class="hidden" id="mytheme-global-import-disable" name="mytheme[general][disable-import]" type="checkbox"  <?php checked(dttheme_option('general','disable-import'),'on');?>/>
                        </div>
                        <div class="column four-fifth last">
                            <p class="note"><?php _e('YES! to hide Import Dummy Data button from the Adminpanel','dt_themes');?> </p>
                        </div>
                        <div class="hr"></div>

                        <h6><?php _e('Google Font Subset','dt_themes');?></h6>
                        <div class="column one-half">
                            <input id="mytheme-google-font-subset" name="mytheme[general][google-font-subset]" type="text" value="<?php echo dttheme_option('general','google-font-subset');?>"/>
                        </div>
                        <div class="column one-half last">
                            <p class="note no-margin"><?php _e('Specify which subsets should be downloaded. Multiple subsets should be separated with coma','dt_themes'); ?></p>
                        </div>

                        <div class="clear"> </div>
                        <div class="hr-invisible-small"> </div>
                        <p class="note"><?php _e('Some of the fonts in the Google Font Directory supports multiple scripts (like Latin and Cyrillic for example). In order to specify which subsets should be downloaded the subset parameter should be appended to the URL. For a complete list of available fonts and font subsets please see','dt_themes'); 
							echo " <a href='http://www.google.com/webfonts'>Google Web Fonts</a>";?> </p>
                        <div class="hr"></div>
                        <div class="clear"> </div>


                        <h6><?php _e('Mailchimp API KEY','dt_themes');?></h6>
                        <div class="column one-half">
                            <input id="mytheme-mailchimp-key" name="mytheme[general][mailchimp-key]" type="text" value="<?php echo dttheme_option('general','mailchimp-key'); ?>" />
                        </div>
                        <div class="column one-half last">
                            <p class="note no-margin"><?php _e('Paste your mailchimp api key that will be used by the mailchimp widget.','dt_themes'); ?></p>
                        </div>
                        <div class="hr"></div>

                        <h6><?php _e('Twitter API Settings', 'dt_themes');?></h6>

                        <h6><?php _e('Consumer Key','dt_themes');?></h6>
                        <div class="column one-half">
                            <input name="mytheme[general][bottombar-twitter-key]" type="text" value="<?php echo dttheme_option('general','bottombar-twitter-key');?>"/>
                        </div>
                        <div class="column one-half last">
                            <p class="note no-margin"><?php _e('Specify Twitter consumer key','dt_themes'); ?></p>
                        </div>

                        <h6><?php _e('Consumer Secret','dt_themes');?></h6>
                        <div class="column one-half">
                            <input name="mytheme[general][bottombar-twitter-secret]" type="text" value="<?php echo dttheme_option('general','bottombar-twitter-secret');?>"/>
                        </div>
                        <div class="column one-half last">
                            <p class="note no-margin"><?php _e('Specify Twitter consumer secret','dt_themes'); ?></p>
                        </div>

                        <h6><?php _e('Access Token','dt_themes');?></h6>
                        <div class="column one-half">
                            <input name="mytheme[general][bottombar-twitter-token]" type="text" value="<?php echo dttheme_option('general','bottombar-twitter-token');?>"/>
                        </div>
                        <div class="column one-half last">
                            <p class="note no-margin"><?php _e('Specify Twitter access token','dt_themes'); ?></p>
                        </div>
                        <h6><?php _e('Access Secret','dt_themes');?></h6>
                        <div class="column one-half">
                            <input name="mytheme[general][bottombar-twitter-token-secret]" type="text" value="<?php echo dttheme_option('general','bottombar-twitter-token-secret');?>"/>
                        </div>
                        <div class="column one-half last">
                            <p class="note no-margin"><?php _e('Specify Twitter access secret','dt_themes'); ?></p>
                        </div>
                    </div>                                            
            </div><!-- .bpanel-box end-->
        </div><!--#my-general end-->

        <!-- #my-sociable-->
        <div id="my-sociable" class="tab-content">
            <!-- .bpanel-box -->
            <div class="bpanel-box">
            
                <div class="box-title">
                	<h3><?php _e('Sociable','dt_themes');?></h3>
                </div><!-- .box-title -->

                <div class="box-content">
                    <div class="bpanel-option-set">
                         <h6><?php _e('Show Sociable','dt_themes');?></h6>
                         
                         <div class="column one-fifth">
							 <?php $switchclass = ( "on" ==  dttheme_option('general','show-sociables') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                             <div data-for="mytheme-show-sociables" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                             <input class="hidden" id="mytheme-show-sociables" name="mytheme[general][show-sociables]" type="checkbox" 
                             <?php checked(dttheme_option('general','show-sociables'),'on');?>/>
                         </div>
                         
                         <input type="button" value="<?php _e('Add New Sociable','dt_themes');?>" class="black mytheme_add_item" />
                         
                         <div class="column four-fifth last">
                             <p class="note"> <?php _e('Manage Social Network icons list to display','dt_themes');?> </p>
                         </div>
                         
                         <div class="hr_invisible"></div>
                    </div>
                    
                    <div class="bpanel-option-set">
                        <ul class="menu-to-edit"><?php
                            $socials = dttheme_option('social');
                            if(is_array($socials)) :
                                $keys = array_keys($socials);
                                $i = 0;

                                foreach ( $socials as $s ):?>
                                    <li id="<?php echo esc_html( $keys[$i] );?>">
                                        <div class="item-bar">
                                            <span class="item-title"><?php $n = $s['icon']; $n = substr($n, 3); $n = ucwords($n); echo esc_html( $n );?></span>
                                            <span class="item-control"><a class="item-edit"><?php _e('Edit','dt_themes');?></a></span>
                                        </div>

                                        <div class="item-content" style="display: none;">
                                            <span><label><?php _e('Sociable Icon','dt_themes');?></label>
                                            <?php dttheme_sociables_selection( $keys[$i],$s['icon'] );?></span>

                                            <span><label><?php _e('Sociable Link','dt_themes');?></label>
                                                <input type="text" class="social-link" name="mytheme[social][<?php echo esc_attr( $keys[$i] );?>][link]" 
                                                	value="<?php echo esc_attr( $s['link'] );?>"/>
                                            </span>

                                            <div class="remove-cancel-links">
                                                <span class="remove-item"><?php _e('Remove','dt_themes');?></span>
                                                <span class="meta-sep"> | </span>
                                                <span class="cancel-item"><?php _e('Cancel','dt_themes');?></span>
                                            </div>
                                        </div>
                                    </li><?php
                                    $i++;
                                endforeach;
                            endif;?></ul>
                        
                        <ul class="sample-to-edit" style="display:none;">
                        	<!-- Social Item -->
                            <li>
                            	<!-- .item-bar -->
                            	<div class="item-bar">
                                	<span class="item-title"><?php _e('Sociable','dt_themes');?></span>
                                    <span class="item-control"><a class="item-edit"><?php _e('Edit','dt_themes');?></a></span>
                                </div><!-- .item-bar -->
                                <!-- .item-content -->
                                <div class="item-content">                                
                                	<span><label><?php _e('Sociable Icon','dt_themes');?></label><?php dttheme_sociables_selection();?></span>
                                    <span><label><?php _e('Sociable Link','dt_themes');?></label><input type="text" class="social-link" /></span>
                                    <div class="remove-cancel-links">
                                        <span class="remove-item"><?php _e('Remove','dt_themes');?></span>
                                        <span class="meta-sep"> | </span>
                                        <span class="cancel-item"><?php _e('Cancel','dt_themes');?></span>
                                    </div>
                                </div><!-- .item-content end -->
                            </li><!-- Social Item End-->
                        </ul>
                        
                    </div>
                </div> <!-- .box-content -->    
                
                
            </div><!-- .bpanel-box end -->
        </div><!--#my-sociable end-->

        <!-- #my-bars-->
        <div id="my-bars" class="tab-content">

            <div class="bpanel-box">
                <div class="box-title">
                    <h3><?php _e('Top Bar', 'dt_themes');?></h3>
                </div>
                <div class="box-content">

                    <h6><?php _e('Phone Number Text','dt_themes');?></h6>
                    <div class="column one-half">
                        <input name="mytheme[general][topbar-phoneno-text]" type="text" value="<?php echo dttheme_option('general','topbar-phoneno-text');?>"/>
                    </div>
                    <div class="column one-half last">
                        <p class="note no-margin"><?php _e('Specify label for phone number which is shown at top of header','dt_themes'); ?></p>
                    </div>

                    <div class="clear"></div>

                    <h6><?php _e('Phone Number','dt_themes');?></h6>
                    <div class="column one-half">
                        <input name="mytheme[general][topbar-phoneno]" type="text" value="<?php echo dttheme_option('general','topbar-phoneno');?>"/>
                    </div>
                    <div class="column one-half last">
                        <p class="note no-margin"><?php _e('Specify phone number which is shown at top of header','dt_themes'); ?></p>
                    </div>

                    <div class="hr"></div>
                    <div class="clear"></div>

                    <h6><?php _e('Email id Text','dt_themes');?></h6>
                    <div class="column one-half">
                        <input name="mytheme[general][topbar-emailid-text]" type="text" value="<?php echo dttheme_option('general','topbar-emailid-text');?>"/>
                    </div>

                    <div class="column one-half last">
                        <p class="note no-margin"><?php _e('Specify label for email which is shown at top of header','dt_themes'); ?></p>
                    </div>

                    <h6><?php _e('Email id','dt_themes');?></h6>
                    <div class="column one-half">
                        <input name="mytheme[general][topbar-emailid]" type="text" value="<?php echo dttheme_option('general','topbar-emailid');?>"/>
                    </div>

                    <div class="column one-half last">
                        <p class="note no-margin"><?php _e('Specify email which is shown at top of header','dt_themes'); ?></p>
                    </div>
                </div>
            </div>

            <div class="bpanel-box">
                <div class="box-title">
                    <h3><?php _e('Bottom Bar', 'dt_themes');?></h3>
                </div>
                <div class="box-content">

                    <h6><?php _e('Default Bottom bar module','dt_themes');?></h6>
                    <div class="column one-half">
                        <select vlass="mytheme-select" name="mytheme[general][default-bottombar-module]"><?php
                            $selected = dttheme_option('general','default-bottombar-module');
                            $modules = array("none" => __('None','dt_themes') , "twitter" => __('Twitter Module','dt_themes') , 'text'=>__('Simple Text Module','dt_themes'));
                            foreach ($modules as $key => $value) {
                                 $rs = selected ( $key, $selected, false );
                                  echo "<option value='".esc_attr($key)."' ".$rs.">".esc_html($value)."</option>";
                            }?>    
                        </select>
                    </div>
                    <div class="column one-half last">
                        <p class="note no-margin"><?php _e('How many tweets want to show?','dt_themes'); ?></p>
                    </div>

                    <div class="hr"></div>
                    <div class="clear"></div>

                    <h6><?php _e('Twitter User name ','dt_themes');?></h6>
                    <div class="column one-half">
                        <input name="mytheme[general][bottombar-twitter]" type="text" value="<?php echo dttheme_option('general','bottombar-twitter');?>"/>
                    </div>
                    <div class="column one-half last">
                        <p class="note no-margin"><?php _e('Specify Twitter username from which you want to show the tweets at the top bar of your footer section','dt_themes'); ?></p>
                    </div>

                    <h6><?php _e('Tweets Count ','dt_themes');?></h6>
                    <div class="column one-half">
                        <select vlass="mytheme-select" name="mytheme[general][bottombar-tweets]"><?php
                            $selected = dttheme_option('general','bottombar-tweets');
                            for( $i = 1; $i<=10; $i++ ):
                                $rs = selected ( $i, $selected, false );
                                echo "<option value='".esc_attr($i)."' ".$rs.">".esc_html($i)."</option>";
                            endfor;?>    
                        </select>
                    </div>
                    <div class="column one-half last">
                        <p class="note no-margin"><?php _e('How many tweets want to show?','dt_themes'); ?></p>
                    </div>

                    <div class="hr"></div>
                    <div class="clear"></div>

                    <h6><?php _e('Bottom Bar Text','dt_themes');?></h6>
                    <textarea id="mytheme-bottombar-text" name="mytheme[general][bottombar-text]"
                            rows="" cols=""><?php echo htmlspecialchars (stripslashes(dttheme_option('general','bottombar-text')));?></textarea>
                    <p class="note"> <?php _e('You can paste any text in this box. This will be automatically shown at the top bar of your footer section.','dt_themes');?> </p>
                </div>
            </div>
        </div><!-- #my-bars-->
   </div><!-- .bpanel-main-content end-->
</div><!-- #general end