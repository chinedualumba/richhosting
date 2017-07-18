            <?php if( !is_page_template( 'tpl-fullwidth.php' ) && (!is_page_template('tpl-onepage.php')) ) : ?>
                </div><!-- ** Container (  doesn't exists for full width template ) Ends ** -->
            <?php endif;?>
            </section><!-- ** Content Main Ends ** -->


            <?php require_once get_template_directory().'/footer-bar.php'; ?>
        </div><!-- ** Main Ends ** -->

        <!-- ** Footer ** -->
        <footer id="footer">
        <?php $show_footer = dttheme_option('general','show-footer');
        if( !empty($show_footer) ):?>
            <!-- ** Container ** -->
            <div class="container"><?php
                $columns = dttheme_option ('general','footer-columns');
                dttheme_show_footer_widgetarea($columns);?>
            </div><!-- ** Container Ends ** --><?php
        endif;

        $show_copyright = dttheme_option('general','show-copyrighttext');
        $copyright_text = dttheme_option('general','copyright-text');
        $copyright_text = stripcslashes($copyright_text);

        if( !empty($show_copyright) && !empty( $copyright_text) ) :?>
            <!-- ** copyright ** -->
            <div class="copyright">
                <!-- ** Container ** -->
                <div class="container">
                    <p><?php echo !empty( $copyright_text ) ? $copyright_text : '';?></p>
                </div><!-- ** Container Ends ** -->
            </div><!-- ** copyright Ends ** --><?php
        endif;?>
        </footer><!-- ** Footer Ends ** -->
    </div><!-- ** Wrapper End ** -->
<?php

    if (is_singular() AND comments_open())
        wp_enqueue_script( 'comment-reply');

    if(dttheme_option('integration', 'enable-body-code') != ''):
        echo '<script type="text/javascript">'.stripslashes(dttheme_option('integration', 'body-code')).'</script>';
	endif;
    wp_footer(); ?>
</body>
</html>    