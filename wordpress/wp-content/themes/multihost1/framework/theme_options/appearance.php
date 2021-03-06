<!-- #appearance -->
<div id="appearance" class="bpanel-content">

    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel"><?php 
          $sub_menus = array(
            array("title"=>__("Header",'dt_themes'), "link" => "#appearance-header" ),
            array("title"=>__("Menu",'dt_themes'), "link"=>"#appearance-menu"),
            array("title"=>__("Body",'dt_themes'), "link"=>"#appearance-body"),
            array("title"=>__("Footer",'dt_themes'), "link"=>"#appearance-footer"),
            array("title"=>__("Typography",'dt_themes'), "link"=>"#appearance-typography"),
            array("title"=>__("Layout & BG",'dt_themes'), "link"=>"#appearance-layout"));

            foreach($sub_menus as $menu): ?>
              <li><a href="<?php echo esc_attr( $menu['link'] );?>"><?php echo esc_html( $menu['title'] );?></a></li><?php
            endforeach?>
        </ul>

        <!-- Header Section -->
        <div id="appearance-header" class="tab-content">
          <div class="bpanel-box">

            <!-- Header -->
              <div class="box-title"><h3><?php _e('Choose Header','dt_themes');?></h3></div>
              <div class="box-content">
                <h6><?php _e('Header','dt_themes'); ?></h6>
                <p class="note no-margin"> <?php _e("Choose the header type",'dt_themes');?> </p>
                <div class="hr_invisible"> </div>

                <div class="bpanel-option-set">
                  <ul class="bpanel-post-layout bpanel-layout-set"><?php
                    $header_types = array("header1","header2","header3","header4","header5");
                    foreach( $header_types as $header_type):
                      $class = ( $header_type ==  dttheme_option('appearance','header_type')) ? "selected" : "";
					  $url = IAMD_FW_URL.'theme_options/images/headers/'.$header_type.'.png';?>
                      <li class="headerlayout">
                      	<a href="#" rel="<?php echo esc_attr( $header_type );?>" class="<?php echo esc_attr( $class );?>" title="<?php echo esc_attr( $header_type );?>">
                        	<img src="<?php echo esc_url( $url );?>" />
                        </a></li><?php
                    endforeach; ?>
                  </ul>
                  <input id="mytheme[appearance][header_type]" name="mytheme[appearance][header_type]" type="hidden" value="<?php echo  dttheme_option('appearance','header_type');?>"/>
                </div>

                <div class="hr"></div>

                <h6><?php _e('Colors','dt_themes');?></h6>
                <p class="note no-margin"><?php _e("Customize header colors",'dt_themes');?></p>
                <div class="hr_invisible"></div>
                <div class="clear"> </div>

                <div class="column one-half">
                  <div class="bpanel-option-set">
                    <h6><?php _e('Disable Header Color','dt_themes');?></h6>
                    <?php dttheme_switch("",'appearance','disable-header-settings');?>
                    <p class="note"> <?php _e('Enable or Disable header section colors.','dt_themes');?>  </p>                        
                  </div>
                </div>

                <div class="column one-half last"><?php
                  $label =    __("Background Color",'dt_themes');
                  $name  =    "mytheme[appearance][header-bg-color]"; 
                  $value =    (dttheme_option('appearance','header-bg-color') != NULL) ? dttheme_option('appearance','header-bg-color') : "#";
                  $tooltip =  __("Pick a custom header background color for the menu e.g. #564912",'dt_themes'); ?>
                  <h6><?php echo esc_html( $label );?></h6> 
                  <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                  <p class="note"><?php echo esc_html( $tooltip );?></p>
                  <div class="clear"></div>
                </div>       
              </div>
            <!-- Header -->

            <!-- Top Bar -->
              <div class="box-title"><h3><?php _e('Top Bar Colors','dt_themes');?></h3></div>
              <div class="box-content">

                <div class="column one-half">
                  <div class="bpanel-option-set">
                    <h6><?php _e('Enable Top Bar','dt_themes');?></h6>
                    <?php dttheme_switch("",'appearance','enable-top-bar');?>
                    <p class="note"> <?php _e('Enable or Disable Top Bar section.','dt_themes');?>  </p>                        
                  </div>
                </div>

                <div class="column one-half last">
                  <div class="bpanel-option-set">
                    <h6><?php _e('Disable Top Bar Colors','dt_themes');?></h6>
                      <?php dttheme_switch("",'appearance','disable-top-bar-colors');?>
                      <p class="note"> <?php _e('Enable or Disable Top Bar section colors.','dt_themes');?>  </p>                        
                  </div>
                </div>

                <div class="clear"> </div>

                <div class="column one-half"><?php
                  $label =    __("Background Color",'dt_themes');
                  $name  =    "mytheme[appearance][topbar-bg-color]"; 
                  $value =    (dttheme_option('appearance','topbar-bg-color') != NULL) ? dttheme_option('appearance','topbar-bg-color') : "#";
                  $tooltip =  __("Pick a custom top bar background color for the menu e.g. #564912",'dt_themes'); ?>
                  <h6><?php echo esc_html( $label );?></h6>
                  <?php dttheme_admin_color_picker("",$name,$value,'');?>
                  <p class="note"><?php echo esc_html( $tooltip );?></p>
                  <div class="clear"></div>

                  <?php $label =    __("Primary / Default Color",'dt_themes');
                    $name  =    "mytheme[appearance][topbar-primary-color]";
                    $value =    (dttheme_option('appearance','topbar-primary-color')  != NULL) ? dttheme_option('appearance','topbar-primary-color') : "#";
                    $tooltip =  __("Pick a custom primary color for the top bar e.g. #564912",'dt_themes'); ?>
                    <h6><?php echo esc_html( $label );?></h6> 
                    <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                    <p class="note"><?php echo esc_html( $tooltip );?></p>

                  <?php $label =    __("Border Color",'dt_themes');
                    $name  =    "mytheme[appearance][topbar-border-color]";
                    $value =    (dttheme_option('appearance','topbar-border-color')  != NULL) ? dttheme_option('appearance','topbar-border-color') : "#";
                    $tooltip =  __("Pick a custom border color for the top bar e.g. #564912",'dt_themes'); ?>
                    <h6><?php echo esc_html( $label );?></h6>
                    <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                    <p class="note"><?php echo esc_html( $tooltip );?></p>
                      </div>
                     
                    <div class="column one-half last"><?php 
                      $label =    __("Text Color",'dt_themes');
                      $name  =    "mytheme[appearance][topbar-text-color]"; 
                      $value =    (dttheme_option('appearance','topbar-text-color') != NULL) ? dttheme_option('appearance','topbar-text-color') : "#";
                      $tooltip =  __("Pick a custom top bar text color",'dt_themes'); ?>
                      <h6><?php echo esc_html( $label );?></h6> 
                      <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                      <p class="note"><?php echo esc_html( $tooltip );?></p>
                      <div class="clear"></div>

                      <?php $label =    __("Hover Color",'dt_themes');
                            $name  =    "mytheme[appearance][topbar-secondary-color]";
                            $value =    (dttheme_option('appearance','topbar-secondary-color')  != NULL) ? dttheme_option('appearance','topbar-secondary-color') : "#";
                            $tooltip =  __("Pick a custom hover state color for the top bar e.g. #564912",'dt_themes'); ?>
                      <h6><?php echo esc_html( $label );?></h6> 
                      <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                      <p class="note"><?php echo esc_html( $tooltip );?></p>
                    </div>
                </div>
            <!-- Top Bar End-->            
          </div> 
        </div><!-- Header Section End -->

        <!-- Menu Section -->
        <div id="appearance-menu" class="tab-content">
        	<div class="bpanel-box">

            <div class="box-title"><h3><?php _e('Menu Font','dt_themes');?></h3></div>
            <div class="box-content">

              <div class="bpanel-option-set">
                <h6><?php _e('Disable Menu Settings','dt_themes');?></h6>
                <?php dttheme_switch("",'appearance','disable-menu-settings');?>
                <p class="note"> <?php _e('Enable or Disable Menu section apperance settings.','dt_themes');?>  </p>                        
              </div>

              <div class="clear"> </div>
              <div class="hr"> </div>

              <!-- Font -->
              <div class="font-container">

                <div class="bpanel-option-set">
                  <h6><?php _e('Choose Font Type','dt_themes');?></h6>
                  <?php $switchclass = ("on" == dttheme_option('appearance', 'menu-font-type')) ? 'font-checkbox-switch-on' : 'font-checkbox-switch-off'; ?>
                  <div data-for="mytheme-menu-font-type" class="font-switcher checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                  <input class="hidden" id="mytheme-menu-font-type" name="mytheme[appearance][menu-font-type]" type="checkbox" <?php checked(dttheme_option('appearance','menu-font-type'),'on');?>/>
                  <p class="note"> <?php _e('Choose which type font.','dt_themes');?>  </p>
                </div>

                <div class="hr"></div><?php

                  $show_menu_standard_font = ("on" == dttheme_option('appearance', 'menu-font-type')) ? "display:block;" : "display:none;";
                  $show_menu_google_font = (dttheme_option('appearance', 'menu-font-type')) ? "display:none;" : "display:block;";?>

                  <div class="standard-font column one-column bpanel-option-set" style=" <?php echo esc_attr( $show_menu_standard_font );?>">
                    <div class="column one-half bpanel-option-set">
                      <?php dttheme_standard_font( __('Standard Font', 'dt_themes'), 'mytheme[appearance][menu-standard-font]', dttheme_option('appearance', 'menu-standard-font'));?>
                    </div>
                    <div class="column one-half last bpanel-option-set">
                      <?php dttheme_standard_font_style( __('Font Style', 'dt_themes'), 'mytheme[appearance][menu-standard-font-style]', dttheme_option('appearance', 'menu-standard-font-style'));?>
                    </div>
                  </div>

                  <div class="google-font column one-column bpanel-option-set" style=" <?php echo esc_attr( $show_menu_google_font );?>">
                    <div class="column one-column bpanel-option-set">
                      <?php dttheme_admin_fonts(__('Menu Font','dt_themes'),'mytheme[appearance][menu-font]',dttheme_option('appearance','menu-font'));?>
                      <p class="note"> <?php _e('Choose the menu font','dt_themes');?> </p>
                    </div>
                  </div>
                </div><!-- Font End -->

                    
                    <div class="column one-column bpanel-option-set">
                        <div class="clear"></div>
                        <?php dttheme_admin_jqueryuislider(__('Menu Font Size','dt_themes'),"mytheme[appearance][menu-font-size]", dttheme_option('appearance',"menu-font-size"));?>
                    </div>
                    
                    <div class="hr"> </div>

                    <div class="column one-half"><?php 
                      $label = __("Primary / Default Color",'dt_themes');
                      $name  =		"mytheme[appearance][menu-primary-color]";	
                      $value =  	(dttheme_option('appearance','menu-primary-color') != NULL) ? dttheme_option('appearance','menu-primary-color') : "#";
                      $tooltip = 	__("Pick a custom primary color for the menu e.g. #564912",'dt_themes'); ?>
                      <h6><?php echo esc_html( $label );?></h6>	
                      <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                      <p class="note"><?php echo esc_html( $tooltip );?></p>
                      <div class="clear"></div>

                      <?php $label = 		__("Menu Background Color",'dt_themes');
                        $name  =		"mytheme[appearance][menu-bg-color]";
                        $value =  	(dttheme_option('appearance','menu-bg-color') != NULL) ? dttheme_option('appearance','menu-bg-color') : "#";
                        $tooltip = 	__("Pick a custom menu background color for HEADER 4 & HEADER 5 e.g. #564912",'dt_themes'); ?>
                        <h6><?php echo esc_html( $label );?></h6>	
                        <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                        <p class="note"><?php echo esc_html( $tooltip );?></p>
                        <div class="clear"></div>
                    </div>

                    <div class="column one-half last"><?php
                      $label = 		__("Hover Color",'dt_themes');
                      $name  =		"mytheme[appearance][menu-secondary-color]";
                      $value =  	(dttheme_option('appearance','menu-secondary-color')  != NULL) ? dttheme_option('appearance','menu-secondary-color') : "#";
                      $tooltip = 	__("Pick a custom hover state color for the menu e.g. #564912",'dt_themes'); ?>
                      <h6><?php echo esc_html( $label );?></h6>	
                      <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                      <p class="note"><?php echo esc_html( $tooltip );?></p>

                      <div class="clear"></div><?php
                        $label = 		__("Sub Menu Background Color",'dt_themes');
                        $name  =		"mytheme[appearance][smenu-bg-color]";
                        $value =  	(dttheme_option('appearance','smenu-bg-color') != NULL) ? dttheme_option('appearance','smenu-bg-color') : "#";
                        $tooltip = 	__("Pick a custom sub menu background color for the menu e.g. #564912",'dt_themes'); ?>
                        <h6><?php echo esc_html( $label );?></h6>	
                        <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                        <p class="note"><?php echo esc_html( $tooltip );?></p>
                    </div>

                    <div class="hr"> </div>

                    <!-- Menu BG -->
                    <h6><?php _e("Menu Background Pattern",'dt_themes');?></h6>
                    <div class="clear"></div>
                    
                      <div class="image-preview-container">
                        <input id="mytheme-menu-bg" name="mytheme[appearance][menu-bg]" type="text" class="uploadfield medium" readonly="readonly" value="<?php echo dttheme_option('appearance','menu-bg');?>"/>
                        <input type="button" value="<?php esc_attr_e('Upload','dt_themes');?>" class="upload_image_button show_preview" />
                        <input type="button" value="<?php esc_attr_e('Remove','dt_themes');?>" class="upload_image_reset" />
                        <?php dttheme_adminpanel_image_preview(dttheme_option('appearance','menu-bg'));?>
                      </div>

                      <div class="hr_invisible"> </div>

                      <div class="column one-column"><?php
                        $menu_bg_settings = array(
                          array(  "label"=> __('Background Image Repeat','dt_themes'),
                            "tooltip"=> __("Select how would you like to repeat the background image",'dt_themes'),
                            "name" => "mytheme[appearance][menu-bg-repeat]",
                            "db-key"=>"menu-bg-repeat",
                            "options"=>  array("repeat","repeat-x","repeat-y","no-repeat")),

                          array(  "label"=>__('Background Image Position','dt_themes'),
                              "tooltip"=> __("Select how would you like to position the background",'dt_themes'),
                              "name" => "mytheme[appearance][menu-bg-position]",
                              "db-key"=>"menu-bg-position",
                              "options"=>  array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right"))
                        );

                        foreach( $menu_bg_settings as $menubgsetting):?>
                          <div class="bpanel-option-set">
                            <label><?php echo esc_html( $menubgsetting['label'] );?></label>
                            <div class="clear"></div>
                            <select name="<?php echo esc_attr( $menubgsetting['name'] );?>">
                              <option value=""><?php _e("Select",'dt_themes');?></option><?php 
                                foreach($menubgsetting['options'] as $option):?>
                                  <option value="<?php echo esc_attr( $option );?>" <?php selected($option,dttheme_option('appearance',$menubgsetting['db-key']));?>><?php 
								  	echo esc_html( $option );?></option><?php
                                endforeach;?>
                            </select>
                            <p class="note"> <?php echo esc_html( $menubgsetting['tooltip'] );?></p>
                            <div class="hr_invisible"> </div>
                          </div><?php
                        endforeach;?>
                      </div>  
                    <!-- Menu BG End-->
                </div>
            </div>
        </div><!-- Menu Section (#appearance-menu) End-->
        
        <!-- Body Section -->
        <div id="appearance-body" class="tab-content">
        	<div class="bpanel-box">
            	
                <!-- Body Font Settings -->
                <div class="box-title"><h3><?php _e('Body Font','dt_themes');?></h3></div>
                <div class="box-content">
                
                    <div class="bpanel-option-set">
                    	<h6><?php _e('Disable Body Settings','dt_themes');?></h6>
                        <?php dttheme_switch("",'appearance','disable-boddy-settings');?>
                        <p class="note"> <?php _e('Enable or Disable Body apperance settings.','dt_themes');?>  </p>
                    </div>    
                    
                    <div class="hr"> </div>
                    
                    
                    <!-- Font -->
                    <div class="font-container">
                        <div class="bpanel-option-set">
                            <h6><?php _e('Choose Font Type','dt_themes');?></h6>
							<?php $switchclass = ("on" == dttheme_option('appearance', 'body-font-type')) ? 'font-checkbox-switch-on' : 'font-checkbox-switch-off'; ?>
                            <div data-for="mytheme-body-font-type" class="font-switcher checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-body-font-type" name="mytheme[appearance][body-font-type]" type="checkbox" 
                            <?php checked(dttheme_option('appearance','body-font-type'),'on');?>/>
                            <p class="note"> <?php _e('Choose which type font.','dt_themes');?>  </p>
                        </div>
                        <div class="hr"></div>
                        
                        <?php $show_body_standard_font = ("on" == dttheme_option('appearance', 'body-font-type')) ? "display:block;" : "display:none;";
                        	  $show_body_google_font = (dttheme_option('appearance', 'body-font-type')) ? "display:none;" : "display:block;";?>

                        <div class="standard-font column one-column bpanel-option-set" style=" <?php echo esc_attr( $show_body_standard_font );?>">
                            <div class="column one-half bpanel-option-set">
                                <?php dttheme_standard_font( __('Standard Font', 'dt_themes'), 'mytheme[appearance][body-standard-font]', 
															dttheme_option('appearance', 'menu-standard-font'));?></div>
                            <div class="column one-half last bpanel-option-set">
                                <?php dttheme_standard_font_style( __('Font Style', 'dt_themes'), 'mytheme[appearance][body-standard-font-style]', 
                                      dttheme_option('appearance', 'body-standard-font-style'));?></div>
                        </div>
                        
                        <div class="google-font column one-column bpanel-option-set" style=" <?php echo esc_attr( $show_body_google_font );?>">
	                        <div class="column one-column">
                            	<div class="bpanel-option-set">
                                	<?php dttheme_admin_fonts(__('Body Font','dt_themes'),'mytheme[appearance][body-font]',dttheme_option('appearance','body-font'));?>
                                    <div class="clear"></div>
                                    <p class="note"> <?php _e('Choose the body font','dt_themes');?> </p>
                                </div>
                             </div>
                        </div>
                    </div><!-- Font End -->

                

                	<div class="column one-half">
                    <?php $label = 		__("Body Font Color",'dt_themes');
						  $name  =		"mytheme[appearance][body-font-color]";	
						  $value =  	(dttheme_option('appearance','body-font-color') != NULL) ? dttheme_option('appearance','body-font-color') :"#";
						  $tooltip = 	__("Pick a custom font color for body/content e.g. #a314a3",'dt_themes'); ?>
                          <h6><?php echo esc_html( $label );?></h6> 
                          <?php dttheme_admin_color_picker('',$name,$value,"");?> 
                          <p class="note no-margin"><?php echo esc_html( $tooltip );?></p>   
                    </div>
                	<div class="column one-half last">
						  <?php dttheme_admin_jqueryuislider(__('Body Font Size','dt_themes'),"mytheme[appearance][body-font-size]",
                                  dttheme_option('appearance',"body-font-size"));?>                                             
 					</div>                               
                    <div class="hr"> </div>

                	<div class="one-half-content">
                    <?php $label = 		__("Primary / Default Color for Links",'dt_themes');
						  $name  =		"mytheme[appearance][body-primary-color]";	
						  $value =  	(dttheme_option('appearance','body-primary-color') != NULL) ? dttheme_option('appearance','body-primary-color') :"#";
						  $tooltip = 	__("Pick a custom primary color to links and buttons for body/content e.g. #551256",'dt_themes'); ?>
                          <h6><?php echo esc_html( $label );?></h6>	
						  <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                          <p class="note"><?php echo esc_html( $tooltip );?></p>                     
                    </div>

                	<div class="one-half-content last">
                    <?php $label = 		__("Hover Color for Links",'dt_themes');
						  $name  =		"mytheme[appearance][body-secondary-color]";
						  $value =  	(dttheme_option('appearance','body-secondary-color') != NULL) ? dttheme_option('appearance','body-secondary-color') :"#";
						  $tooltip = 	__("Pick a custom hover state color to links and buttons for body/content e.g. #564912",'dt_themes'); ?>
                          <h6><?php echo esc_html( $label );?></h6>	
                          <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                          <p class="note"><?php echo esc_html( $tooltip );?></p>                   
                    </div>
                </div>
                <!-- Body Font Settings End-->
                 
            </div>
        </div><!-- Body Section(#appearance-body) end -->
        
        <!-- Footer Section -->
        <div id="appearance-footer" class="tab-content">
        	<div class="bpanel-box">

                <!-- Footer Font -->
                <div class="box-title"><h3><?php _e('Footer Font','dt_themes');?></h3></div>
                <div class="box-content">
                
                    <div class="bpanel-option-set">
                    	<h6><?php _e('Disable Footer Settings','dt_themes');?></h6>
                        <?php dttheme_switch(__("Disable Footer Settings",'dt_themes'),'appearance','disable-footer-settings');?>
                        <p class="note"><?php _e('Enable or Disable Footer apperance settings.','dt_themes');?>  </p>
                    </div>
                    
                    <div class="hr"> </div>
                    
                    <!-- Font -->
                    <div class="font-container">
                    
                        <div class="bpanel-option-set">
                            <h6><?php _e('Choose Footer Title Font Type','dt_themes');?></h6>
                            <?php $switchclass = ("on" == dttheme_option('appearance', 'footer-title-font-type')) ? 'checkbox-switch-on font-checkbox-switch-on' : 'checkbox-switch-off font-checkbox-switch-off'; ?>
                            <div data-for="mytheme-footer-title-font-type" class="font-switcher checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-footer-title-font-type" name="mytheme[appearance][footer-title-font-type]" type="checkbox" 
                                <?php checked(dttheme_option('appearance','footer-title-font-type'),'on');?>/>
                            <p class="note"> <?php _e('Choose which type font.','dt_themes');?>  </p>
                        </div>
                        <div class="hr"></div>

                        <?php $show_footer_title_standard_font = ("on" == dttheme_option('appearance', 'footer-title-font-type')) ? "display:block;" : "display:none;";
                              $show_footer_title_google_font = (dttheme_option('appearance', 'footer-title-font-type')) ? "display:none;" : "display:block;";?>
                              
                        <div class="standard-font column one-column bpanel-option-set" style=" <?php echo esc_attr( $show_footer_title_standard_font );?>">
                        	<div class="column one-half bpanel-option-set">
                                <?php dttheme_standard_font( __('Standard Font', 'dt_themes'), 'mytheme[appearance][footer-title-standard-font]', 
															dttheme_option('appearance', 'footer-title-standard-font'));?></div>
                            <div class="column one-half last bpanel-option-set">
                                <?php dttheme_standard_font_style( __('Font Style', 'dt_themes'), 'mytheme[appearance][footer-title-standard-font-style]', 
                                      dttheme_option('appearance', 'footer-title-standard-font-style'));?></div>
                        </div>
                        
                        <div class="google-font column one-column bpanel-option-set"  style=" <?php echo esc_attr( $show_footer_title_google_font );?>">
                        	<div class="column one-column bpanel-option-set">
                            	<?php dttheme_admin_fonts(__('Footer Title Font','dt_themes'),'mytheme[appearance][footer-title-font]',
										dttheme_option('appearance','footer-title-font'));?>
                                <div class="clear"></div>
                                <p class="note"> <?php _e('Choose the footer font','dt_themes');?> </p>
                            </div>
                        
                        </div>
                    </div><!-- Font End -->
                    
                    
                    <div class="column one-half last">
                    <?php $label = 		__("Footer Title Font Color",'dt_themes');
                          $name  =		"mytheme[appearance][footer-title-font-color]";
						  $value =  	(dttheme_option('appearance','footer-title-font-color') != NULL) ? dttheme_option('appearance','footer-title-font-color') :"#";
						  $tooltip = 	__("Pick a custom footer title font color to the theme e.g. #a314a3",'dt_themes'); ?>
                          <h6><?php echo esc_html( $label );?></h6>
                          <?php dttheme_admin_color_picker("",$name,$value,'');?>   
                    <p class="note"><?php echo esc_html( $tooltip );?></p>
                    </div>
                    
                    <div class="column one-half last">
					<?php dttheme_admin_jqueryuislider(__('Footer Font Size','dt_themes'),"mytheme[appearance][footer-font-size]",
                          dttheme_option('appearance',"footer-font-size"));?>
                    </div>
                    
                    <div class="hr"> </div>

                    <!-- Font -->
                    <div class="font-container">
                    
                        <div class="bpanel-option-set">
                            <h6><?php _e('Choose Footer Content Font Type','dt_themes');?></h6>
                            <?php $switchclass = ("on" == dttheme_option('appearance', 'footer-content-font-type')) ? 'checkbox-switch-on font-checkbox-switch-on' : 'checkbox-switch-off font-checkbox-switch-off'; ?>
                            <div data-for="mytheme-footer-content-font-type" class="font-switcher checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-footer-content-font-type" name="mytheme[appearance][footer-content-font-type]" type="checkbox" 
                                <?php checked(dttheme_option('appearance','footer-content-font-type'),'on');?>/>
                            <p class="note"> <?php _e('Choose which type font.','dt_themes');?>  </p>
                        </div>
                        <div class="hr"></div>

						<?php $show_footer_content_standard_font = ("on" == dttheme_option('appearance', 'footer-content-font-type')) ? "display:block;" : "display:none;";
                              $show_footer_content_google_font = (dttheme_option('appearance', 'footer-content-font-type')) ? "display:none;" : "display:block;";?>

                        <div class="standard-font column one-column bpanel-option-set" style=" <?php echo esc_attr( $show_footer_content_standard_font );?>">
                        	<div class="column one-half bpanel-option-set">
                                <?php dttheme_standard_font( __('Standard Font', 'dt_themes'), 'mytheme[appearance][footer-content-standard-font]', 
															dttheme_option('appearance', 'footer-content-standard-font'));?></div>
                            <div class="column one-half last bpanel-option-set">
                                <?php dttheme_standard_font_style( __('Sample Title Font Style', 'dt_themes'), 'mytheme[appearance][footer-content-standard-font-style]', 
                                      dttheme_option('appearance', 'footer-content-standard-font-style'));?></div>
                        </div>
                        
                        <div class="google-font column one-column bpanel-option-set" style=" <?php echo esc_attr( $show_footer_content_google_font );?>">
                        	<div class="column one-column bpanel-option-set">
                            	<?php dttheme_admin_fonts( __('Footer Content Font','dt_themes'),'mytheme[appearance][footer-content-font]',
														   dttheme_option('appearance','footer-content-font'));?>
                                <div class="clear"></div>
                                <p class="note"> <?php _e('Choose the footer content font','dt_themes');?> </p>
                             </div>                        
                        </div>
                    </div><!-- Font End -->
                    
                    
                    <div class="hr_invisible"> </div>
                    
                    <div class="column one-half">
                    <?php $label = 		__("Footer Content Font Color",'dt_themes');
                          $name  =		"mytheme[appearance][footer-content-font-color]";
						  $value =  	(dttheme_option('appearance','footer-content-font-color') != NULL) ? dttheme_option('appearance','footer-content-font-color') :"#";
						  $tooltip = 	__("Pick a custom font color for footer content e.g. #a314a3",'dt_themes'); ?>
						  <h6><?php echo esc_html( $label );?></h6>
                          <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                          <p class="note"><?php echo esc_html( $tooltip );?></p>                  
                    </div>
                    
                    <div class="column one-half last">
						<?php dttheme_admin_jqueryuislider(__('Footer Content Font Size','dt_themes'),"mytheme[appearance][footer-content-font-size]",
                              dttheme_option('appearance',"footer-content-font-size"));?>                    
                    </div>
                    
                    <div class="hr"> </div>
                    
                    <div class="column one-half">
                    <?php $label = 		__("Primary / Default Color for Links",'dt_themes');
                          $name  =		"mytheme[appearance][footer-primary-color]";	
						  $value =  	(dttheme_option('appearance','footer-primary-color') != NULL) ? dttheme_option('appearance','footer-primary-color') :"#";
                          $tooltip = 	__("Pick a custom primary color for links in footer e.g. #551256",'dt_themes'); ?>
                          <h6><?php echo esc_html( $label );?></h6>
                	      <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                          <p class="note"><?php echo esc_html( $tooltip );?></p>                  
                    </div>

                    <div class="column one-half last">
                    <?php $label = 		__("Hover Color for Links",'dt_themes');
                          $name  =		"mytheme[appearance][footer-secondary-color]";	
						  $value =  	(dttheme_option('appearance','footer-secondary-color') != NULL) ? dttheme_option('appearance','footer-secondary-color') :"#";
                          $tooltip = 	__("Pick a custom color for footer links hover state e.g. #564912",'dt_themes'); ?>
                          <h6><?php echo esc_html( $label );?></h6>
                	      <?php dttheme_admin_color_picker("",$name,$value,'');?>   
                          <p class="note"><?php echo esc_html( $tooltip );?></p>                 
                    </div>
                    
                    <div class="hr"> </div>

                    <div class="column one-half">
                    <?php $label = 		__("Footer BG Color",'dt_themes');
    	                  $name  =		"mytheme[appearance][footer-bg-color]";	
        	              $value =  	(dttheme_option('appearance','footer-bg-color')  != NULL) ? dttheme_option('appearance','footer-bg-color') : "#";
            	          $tooltip = 	__("Pick a custom background color of the theme's footer section.(e.g. #a314a3)",'dt_themes'); ?>
                          <h6><?php echo esc_html( $label );?></h6>
                	      <?php dttheme_admin_color_picker("",$name,$value,'');?>
                          <p class="note"><?php echo esc_html( $tooltip );?></p>
                    </div>
                    <div class="column one-half last">
                    <?php $label = 		__("Copyright Section BG Color",'dt_themes');
    	                  $name  =		"mytheme[appearance][copyright-bg-color]";	
        	              $value =  	(dttheme_option('appearance','copyright-bg-color')  != NULL) ? dttheme_option('appearance','copyright-bg-color') : "#";
            	          $tooltip = 	__("Pick a custom background color of the theme's copyright section.(e.g. #a314a3)",'dt_themes'); ?>
						  <h6><?php echo esc_html( $label );?></h6>
                	      <?php dttheme_admin_color_picker("",$name,$value,'');?> 
                          <p class="note"><?php echo esc_html( $tooltip );?></p>                         
                	</div>
                    
                </div>
                <!-- Footer Font End-->
			
            
            </div>
        </div><!-- Footer Section (#appearance-footer) End-->
        
        
        <!-- Typography Section -->
        <div id="appearance-typography" class="tab-content">
	        <div class="bpanel-box">
            
                <div class="box-title">
                	<h3><?php _e("Disable Typography Settings",'dt_themes'); ?></h3>
                </div>
                <div class="box-content">
                    <div class="bpanel-option-set">
                    	<h6><?php _e('Disable Typography Settings','dt_themes');?></h6>
                        <?php dttheme_switch("",'appearance','disable-typography-settings');?>
                        <p class="note"> <?php _e('Enable or Disable the typography settings','dt_themes');?>  </p>
                    </div>
                </div>
            
            	<?php for($i=1;$i<=6;$i++): ?>
                    <div class="box-title">
                    	<h3><?php echo "H{$i} ";?><?php _e('Font Family, Size and Color','dt_themes');?></h3>
                        
                    </div>
                    <div class="box-content">
                    	 <p class="note"> <?php _e("Choose Font Family, Size and Color for",'dt_themes'); echo " H{$i}"?> </p>
                         
                         <!-- Font -->
                         <div class="font-container">
                            <div class="bpanel-option-set">
                                <h6><?php echo "H{$i} "; _e('Choose Font Type','dt_themes');?></h6>
                                <?php $switchclass = ("on" == dttheme_option('appearance', "H{$i}-font-type")) ? 'checkbox-switch-on font-checkbox-switch-on' : 'checkbox-switch-off font-checkbox-switch-off'; ?>
                                <div data-for="mytheme-H<?php echo esc_attr( $i );?>-font-type" class="font-switcher checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                                <input class="hidden" id="mytheme-H<?php echo esc_attr( $i );?>-font-type" name="mytheme[appearance][H<?php echo esc_attr( $i );?>-font-type]"
                                	type="checkbox" <?php checked(dttheme_option('appearance',"H{$i}-font-type"),'on');?>/>
                                <p class="note"> <?php _e('Choose which type font.','dt_themes');?>  </p>
                            </div>
                            <div class="hr"></div>
                            <?php $show_h_standard_font = ("on" == dttheme_option('appearance',"H{$i}-font-type")) ? " display:block;" : "  display:none; ";
                              	  $show_h_google_font = (dttheme_option('appearance',"H{$i}-font-type")) ? "  display:none; " : " display:block; ";?>
                            
                            <div class="standard-font column one-column bpanel-option-set" style=" <?php echo esc_attr( $show_h_standard_font );?>">
                                <div class="column one-half bpanel-option-set">
                                    <?php dttheme_standard_font( "H{$i} ".__('Standard Font', 'dt_themes'), "mytheme[appearance][H{$i}-standard-font]", 
                                                                dttheme_option('appearance', "H{$i}-standard-font"));?></div>
                                <div class="column one-half last bpanel-option-set">
                                    <?php dttheme_standard_font_style( "H{$i} ".__('Standard Font Style', 'dt_themes'), "mytheme[appearance][H{$i}-standard-font-style]", 
                                          dttheme_option('appearance', 'menu-standard-font-style'));?></div>
                            </div>
                            
                            <div class="google-font column one-column bpanel-option-set" style=" <?php echo esc_attr( $show_h_google_font );?>">
                            	<div class="column one-column">
                                	<div class="bpanel-option-set"><?php dttheme_admin_fonts("H{$i} ".__('Font','dt_themes'),
											"mytheme[appearance][H{$i}-font]",dttheme_option('appearance',"H{$i}-font"));?></div>
                                </div>
                            </div>
                            
                         	
                         </div><!-- Font End -->

                         <div class="hr_invisible"> </div>
                         <div class="column one-half last">
							<?php $label = 		"H{$i} ".__("Font Color",'dt_themes');
                                  $name  =		"mytheme[appearance][H{$i}-font-color]";
								  $value =  	(dttheme_option('appearance',"H{$i}-font-color") != NULL) ? dttheme_option('appearance',"H{$i}-font-color") :"#"; ?>
								  <h6><?php echo esc_html( $label );?></h6>	
                                  <?php dttheme_admin_color_picker("",$name,$value);?>                    
                         </div>
                         <div class="column one-half last">
						 	<?php dttheme_admin_jqueryuislider("H{$i} ".__('Font Size','dt_themes'),
                           		"mytheme[appearance][H{$i}-size]",dttheme_option('appearance',"H{$i}-size"));?>
                    	 </div>     
                    </div>
                <?php endfor;?>
            </div><!-- .bpanel-box end -->
        </div><!-- Typography Section -->


        <!--Layout Section -->
        <div id="appearance-layout" class="tab-content">
        	<!-- Layout Selection-->
	        <div class="bpanel-box">
                <div class="box-title">
                	<h3><?php _e('Choose Layout','dt_themes');?></h3>
                    
                </div>
                <div class="box-content">
                	<h6><?php _e('Layout','dt_themes');?></h6>
                	<p class="note no-margin"> <?php _e("Choose the Layout Style(Boxed / Fullwidth)","dt_themes");?> </p>
                    <div class="hr_invisible"> </div>
					<div class="bpanel-option-set">    
                         <ul class="bpanel-post-layout bpanel-layout-set">
                         	<?php $layouts = array("boxed","wide");
								  foreach($layouts as $layout):
								  	$img = IAMD_FW_URL.'theme_options/images/layouts/'.$layout.'.png';
								  	$class = ( $layout ==  dttheme_option('appearance','layout')) ? " selected" : "";?>
                                  	<li class="themelayout">
                                    	<a href="#" rel="<?php echo esc_attr( $layout );?>" class="<?php echo esc_attr($class);?>" title="<?php echo esc_attr( $layout );?>">
                                        	<img src="<?php echo esc_url( $img );?>"/>
                                        </a>
                                    </li>
                            <?php endforeach;?>	      
                         </ul>
                         <input id="mytheme[appearance][layout]" name="mytheme[appearance][layout]" type="hidden" 
                         		value="<?php echo  dttheme_option('appearance','layout');?>"/>
                    </div>
                </div><!-- .box-content -->
			  </div><!-- Layout Selection End-->
            
        <!-- Boxed Layout Settings -->
        <?php $style = (dttheme_option('appearance','layout') == "boxed") ? '' :'display:none;'; ?>
        <div id="boxed" class="bpanel-box" style=" <?php echo esc_attr($style);?>">
          <div class="box-title"><h3><?php _e('Boxed Layout BG Background','dt_themes');?></h3></div>
          <div class="box-content"><?php
            dttheme_bgtypes("mytheme[appearance][bg-type]","appearance","bg-type");?>
            <?php $bg_pattern = ( dttheme_option('appearance','bg-type')=="bg-patterns" ) ? 'display:block' : 'display:none'; ?>
            <?php $bg_custom = ( dttheme_option('appearance','bg-type')=="bg-custom" ) ? 'display:block' : 'display:none'; ?>
                
                	<!-- In-built BG Patterns starts-->
                    <div class="bg-pattern" style=" <?php echo esc_attr($bg_pattern);?>">
                    	<div class="hr_invisible"> </div>
                    	<h6> <?php _e('Choose Patterns','dt_themes');?> </h6>
                    	<!-- Pattern Sets Start -->
                    	<div class="bpanel-option-set">
                        	
                            <ul class="bpanel-post-layout bpanel-layout-set">
                            <?php $pattrens  = dttheme_listImage(IAMD_FW."theme_options/images/patterns/");
								foreach($pattrens as $key => $value):
									$class = ( $key ==  dttheme_option('appearance','boxed-layout-pattern')) ? "selected" : "";
									$url = IAMD_FW_URL.'theme_options/images/patterns/'.$key;
									echo "<li>";
									echo '<a href="#" rel="'.esc_attr($key).'" class="'.esc_attr($class).'"><img src="'.esc_url( $url ).'" width="80px" height="80px"/></a>';
									echo "</li>";
								endforeach;?></ul>
                            <input id="mytheme[appearance][boxed-layout-pattern]" name="mytheme[appearance][boxed-layout-pattern]" type="hidden" 
                         			value="<?php echo  dttheme_option('appearance','boxed-layout-pattern');?>"/>
                           <p class="note">	<?php _e('Choose background pattern, you can add patterns by placing the png files in the folder ','dt_themes');
						   	echo ('<b>framework/theme_options/images/pattern/</b>');?>   </p>
                        </div><!-- Patterns set End -->

                        <!-- Pattern BG Settings -->
                        <div class="column one-column">
                        	<div class="bpanel-option-set">
                                <h6><?php _e('Boxed Layout Background Pattern repeat','dt_themes');?></h6>
                                <div class="clear"></div>
                                <select name="mytheme[appearance][boxed-layout-pattern-repeat]">
                                    <option value=""><?php _e("Select",'dt_themes');?></option>
                                    <?php $options = array("repeat","repeat-x","repeat-y","no-repeat");
										foreach($options as $option):?>
                                        <option value="<?php echo esc_attr( $option );?>"
                                            <?php selected($option,dttheme_option('appearance','boxed-layout-pattern-repeat')); ?>><?php echo esc_html( $option );?></option>
                                    <?php endforeach;?>
                                </select>
                                <p class="note"> <?php _e("Select how would you like to repeat the pattern image",'dt_themes');?> </p>
                            </div>
                            
                        </div>
                        
                        <div class="hr"> </div>
                        
                        <div class="column one-half">
                            <h6><?php _e("Disable Background Color",'dt_themes');?></h6>
                            <?php dttheme_switch("",'appearance','disable-boxed-layout-pattern-color');?>
                        </div>
                            
                        
                        <div class="column one-half last">
                        
                        <?php $label = 		__("Choose Background Color",'dt_themes');
                              $name  =		"mytheme[appearance][boxed-layout-pattern-color]";
                              $value =  	(dttheme_option('appearance','boxed-layout-pattern-color') != NULL) ? dttheme_option('appearance','boxed-layout-pattern-color') :"#";
                              $tooltip = 	__("Pick a custom background color of the theme.(e.g. #a314a3)",'dt_themes');
                                dttheme_admin_color_picker($label,$name,$value,'');?>    
                                
                                <p class="note"> <?php echo esc_html( $tooltip );?></p>
                        </div>
                        <!-- Pattern BG Settings end-->    
                        
                        <div class="hr"> </div>
                        
                        <div class="bpanel-option-set">
                        <?php dttheme_admin_jqueryuislider( __("Background opacity",'dt_themes'),	"mytheme[appearance][boxed-layout-pattern-opacity]",
                                                                          dttheme_option("appearance","boxed-layout-pattern-opacity"),"");?>
                        </div> 
                        
                    </div><!-- In-built BG Patterns ends-->
                     	
                	<!-- Upload custom BG option Starts -->
                    <div class="bg-custom" style=" <?php echo esc_attr($bg_custom);?>">
                        
                        <div class="hr_invisible"> </div>
                        <h6><?php _e("Boxed Layout Background Image",'dt_themes');?></h6>
                        <div class="clear"></div>
                        <div class="image-preview-container">
                            <input id="mytheme-boxed-layout-bg" name="mytheme[appearance][boxed-layout-bg]" type="text" class="uploadfield medium" readonly="readonly"
                                    value="<?php echo dttheme_option('appearance','boxed-layout-bg');?>"/>
                            <input type="button" value="<?php esc_attr_e('Upload','dt_themes');?>" class="upload_image_button show_preview" />
                            <input type="button" value="<?php esc_attr_e('Remove','dt_themes');?>" class="upload_image_reset" />
                            <?php dttheme_adminpanel_image_preview(dttheme_option('appearance','boxed-layout-bg'));?>
                        </div>
                        <p class="note"> <?php _e("Upload an image for the theme's background",'dt_themes');?> </p>
                       
                       <div class="hr_invisible"> </div>                       
                
                        <!-- Boxed Layout BG Settings -->
                        <div class="column one-half">
                        <?php $bg_settings = array(
                                    array(
                                        "label"=>	__('Background Image Repeat','dt_themes'),
                                        "tooltip"=>	__("Select how would you like to repeat the background image",'dt_themes'),
                                        "name" => "mytheme[appearance][boxed-layout-bg-repeat]",
                                        "db-key"=>"boxed-layout-bg-repeat",
                                        "options"=>  array("repeat","repeat-x","repeat-y","no-repeat")
                                    ),
                                    array(
                                        "label"=>__('Background Image Position','dt_themes'),
                                        "tooltip"=>	__("Select how would you like to position the background",'dt_themes'),
                                        "name" => "mytheme[appearance][boxed-layout-bg-position]",
                                        "db-key"=>"boxed-layout-bg-position",
                                        "options"=>  array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right")
                                    )
                                );
                    
                              foreach($bg_settings as $bgsettings): ?>
                                  <div class="bpanel-option-set">
                                    <label><?php echo esc_html( $bgsettings['label'] );?></label>
                                    <div class="clear"></div>
                                    <select name="<?php echo esc_attr( $bgsettings['name'] );?>">
                                        <option value=""><?php _e("Select",'dt_themes');?></option>
                                        <?php foreach($bgsettings['options'] as $option):?>
                                            <option value="<?php echo esc_attr( $option );?>"
                                                <?php selected($option,dttheme_option('appearance',$bgsettings['db-key'])); ?>><?php echo esc_html( $option );?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <p class="note"> <?php echo esc_html( $bgsettings['tooltip'] );?>  </p>
                                    <div class="hr_invisible"> </div>
                                  </div>
                        <?php endforeach;?>
                        		 <div class="bpanel-option-set">	
                                     
                                 	 <h6><?php _e("Disable Background Color",'dt_themes');?></h6>
	                        		 <?php dttheme_switch("",'appearance','disable-boxed-layout-bg-color');?>
                                 </div>    
                        </div><!-- Boxed Layout BG Settings End -->
                        
                         <!-- Boxed Layout BG Color -->
                         <div class="column one-half last">
	                        
                            <?php $label = 		__("Background Color",'dt_themes');
                                  $name  =		"mytheme[appearance][boxed-layout-bg-color]";
                                  $value =  	(dttheme_option('appearance','boxed-layout-bg-color') != NULL) ? dttheme_option('appearance','boxed-layout-bg-color') :"#";
                                  $tooltip = 	__("Pick a background color of the theme.(e.g. #a314a3)",'dt_themes');
                                dttheme_admin_color_picker($label,$name,$value,'');?>
                                
                                <p class="note"> <?php echo esc_html( $tooltip );?> </p>
                                
                                <div class="hr_invisible"> </div>
                                
							 <?php dttheme_admin_jqueryuislider( __("Background opacity",'dt_themes'),	"mytheme[appearance][boxed-layout-bg-opacity]",
                                                                      dttheme_option("appearance","boxed-layout-bg-opacity"),"");?>                                
                         </div><!-- Boxed Layout BG Color -->
                    </div><!-- Upload custom BG option Ends -->
                     
                </div><!-- .box-content -->   
            </div><!-- .bpanel-box -->    
        </div><!--Layout Section  End-->
        
    </div><!-- .bpanel-main-content end -->
</div><!-- #appearance  end-->