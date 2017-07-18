<?php $case = dttheme_option('general','default-bottombar-module');

        if( $case == "text" ):?>
            <!-- ** Footer Bar ** -->
            <div class="footer-top-section">
                <div class="container"><?php
                    $bottombar_text =  dttheme_option('general','bottombar-text');
                    $bottombar_text = stripcslashes($bottombar_text);
                    echo do_shortcode($bottombar_text);?>
                </div>
            </div><?php

        elseif( $case == "twitter" ):?>
            <div class="tweet-box">
                <div class="container">
                    <div id="tweets_container"><?php
                        $count = dttheme_option('general','bottombar-tweets');
                        $count = !empty($count) ? $count : 3;
                        $instance['title'] = "";
                        $instance['count'] = $count;
                        $instance['username'] = dttheme_option('general','bottombar-twitter');
                        $instance['exclude_replies'] = true;
                        $instance['display_avatar'] = false;
                        $instance['time'] = true;
                        the_widget('MY_Twitter',$instance);?>
                    </div>
                </div>
            </div>
            <!-- ** Footer Bar Ends ** --><?php
        endif;?>