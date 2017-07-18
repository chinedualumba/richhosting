<?php $topbar = dttheme_option('appearance','enable-top-bar');
if( isset($topbar) ) :?>
	<!-- ** Header Top Bar ** -->
    <div id="header-top" class="header5">
    	<div class="container">
        	<div class="column dt-sc-one-half first">
            	<?php  echo do_shortcode('[dt_sc_social/]'); ?>
            </div>
            <div class="column dt-sc-one-half alignright"><?php
				if (function_exists('wp_nav_menu')) :
					$topMenu = wp_nav_menu(array('theme_location'=>'top_menu','menu_id'=>'','menu_class'=>'top-menu','container'=>false, 'depth' => 1, 'fallback_cb'=>'dttheme_default_navigation'));
                endif;
				
				if(!empty($topMenu))
					echo ( $topMenu );?>
            </div>
        </div>
     </div><!-- ** Header Top Bar Ends ** --><?php
endif;?>

<!-- ** Header Wrapper ** -->
<div id="header-wrapper">
	<!-- ** Header ** -->
    <header id="header" class="header5">
    	<div class="container">
        	<!-- ** Logo ** -->
            <div id="logo"><?php
				if( dttheme_option('general', 'logo') ):
					$url = dttheme_option('general', 'logo-url');
					$url = !empty( $url ) ? $url : IAMD_BASE_URL."images/logo.png";
					
					$retina_url = dttheme_option('general','retina-logo-url');
					$retina_url = !empty($retina_url) ? $retina_url : IAMD_BASE_URL."images/logo@2x.png";
					
					$width = dttheme_option('general','retina-logo-width');
					$width = !empty($width) ? $width."px;" : "227px";
					
					$height = dttheme_option('general','retina-logo-height');
					$height = !empty($height) ? $height."px;" : "47px";?>
                    <a href="<?php echo esc_url(home_url());?>" title="<?php echo esc_attr(dttheme_blog_title());?>">
                    	<img class="normal_logo" src="<?php echo esc_attr($url);?>" alt="<?php echo esc_attr(dttheme_blog_title()); ?>" title="<?php echo esc_attr(dttheme_blog_title());?>"/>
                        <img class="retina_logo" src="<?php echo esc_attr($retina_url);?>" alt="<?php echo esc_attr(dttheme_blog_title());?>"
                        	title="<?php echo esc_attr(dttheme_blog_title()); ?>" style="width:<?php echo esc_attr($width);?>; height:<?php echo esc_attr($height);?>;"/>
                    </a><?php
				else:?>
                	<h2><a href="<?php echo esc_url(home_url());?>" title="<?php echo esc_attr(dttheme_blog_title());?>"><?php echo do_shortcode(get_option('blogname')); ?></a></h2><?php
				endif;?>
             </div>
             <!-- ** Logo Ends ** -->
             
             <!-- ** Main-Menu Navigation ** -->
             <div id="primary-menu">

				<div class="dt-menu-toggle" id="dt-menu-toggle">
                	<?php _e('Menu','dt_themes');?>
                    <span class="dt-menu-toggle-icon"></span>
                </div>
                
                <nav id="main-menu"><?php
				
					$primaryMenu = NULL;
					
					if( is_page_template('tpl-onepage.php') ) {
						global $post;
						$lp_title = $post->post_title;
						$lp_name = str_replace(' ', '', trim($post->post_title));
						$lp_name = strtolower($lp_name);
						
						if ( function_exists('wp_nav_menu') ):
							$primaryMenu = wp_nav_menu(
								array(
									'theme_location'=>'onepage_menu',
									'menu_id'=>'one-page-menu',
									'menu_class'=>'menu',
									'fallback_cb'=>'dttheme_default_navigation',
									'echo'=>false,
									'container'=>false,
									'items_wrap'=>'<ul id="%1$s" class="group %2$s"><li class="menu-item current_page_item"><a href="#'.$lp_name.'">'.$lp_title.'</a></li>%3$s</ul>',
									'walker' => new DTFrontEndMenuWalker()
								)
							);
						endif;
					} else {
						
						if (function_exists('wp_nav_menu')):
							$primaryMenu = wp_nav_menu(
								array(
									'theme_location'=>'header_menu',
									'menu_id'=>'',
									'menu_class'=>'menu',
									'fallback_cb'=>'dttheme_default_navigation',
									'echo'=>false,
									'container'=>false,
									'walker' => new DTFrontEndMenuWalker()
								)
							);
						endif;
					}
					
					if(!empty($primaryMenu))
						echo ( $primaryMenu );?>
				</nav>
			</div>
			<!-- ** Main-Menu Navigation ** -->
		</div>
	</header>
    <!-- ** Header Ends ** -->
</div><!-- ** Header Wrapper ** -->