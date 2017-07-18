<?php

if (! class_exists ( 'DTCorePageBuilder' )) {

	/**
	 * To active page builder in selected post types
	 *
	 * @author iamdesigning11
	 */
	class DTCorePageBuilder {
		
		/**
		 * Constructor for DTCorePageBuilder
		 */
		function __construct() {
			
			define( 'DESIGNTHEMES_PB_URI', plugins_url('', __FILE__) );
			define( 'DESIGNTHEMES_PB_DIR', plugin_dir_path ( __FILE__ ) );
			define( 'DESIGNTHEMES_PB_DIRURL', plugin_dir_url ( __FILE__ ) );
			
			// Add Hook into the 'init()' action
			add_action ( 'init', array (
					$this,
					'dt_init' 
			) );

			// Add Hook into the 'admin_enqueue_scripts()' action
			add_action ( 'admin_enqueue_scripts', array (
					$this,
					'dt_admin_enqueue_scripts' 
			) );
			
			
			require_once DESIGNTHEMES_PB_DIR . 'pagebuilder.php';
			if (class_exists ( 'DTPageBuilder' )) {
				new DTPageBuilder ();
			}

			// Page builder latest update notification
			if(get_option( 'dt-plugin-notice-dismissed') != 1) {
				add_action( 'admin_notices', array(
					 $this,
					 'dtplugin_admin_notice'
				) );
			}
			
			add_action("wp_ajax_dt_plugin_dismiss_notice", array(
				$this,
				"dt_plugin_dismiss_notice" ) );
				
			add_action("wp_ajax_dt_plugin_dismiss_notice", array(
				$this,
				"dt_plugin_dismiss_notice" ) );
		}

		function dtplugin_admin_notice() {
			
			$out  = '<div class="notice error dt-plugin-notice is-dismissible"> <p>';
			$out .= sprintf( esc_html__(
						'%1$s in %2$s comes with major update. In order to make your existing pages (created with page builder) to work properly click %3$s button in %4$s', 'dt_themes'),
						'<strong>Multihost Page Builder</strong>',
						'<strong>DesignThemes Core Features Plugin 1.2</strong>',
						'<strong>Update Content</strong>',
						'<strong>Dashboard > Multihost > Page Builder > Update Content </strong>'  );
			$out .= '</p> </div>';
			
			echo $out;
		}
		
		function dt_plugin_dismiss_notice() {
			update_option('dt-plugin-notice-dismissed', 1);
		}
		
		function dt_admin_init() {
			wp_enqueue_script( 'dt-admin-notice-script', DESIGNTHEMES_PB_URI.'/js/admin-notice.js', array ('jquery'), false, true );
		}


		/**
		 * A function hook that the WordPress core launches at 'init' points
		 */
		function dt_init() {
			
			require_once DESIGNTHEMES_PB_DIR . 'modules.php';
			require_once DESIGNTHEMES_PB_DIR . 'config.php';
	
			if (! current_user_can ( 'edit_posts' ) && ! current_user_can ( 'edit_pages' )) {
				return;
			}

		}
		
		/**
		 * A function hook that the WordPress core launches at 'admin_enqueue_scripts' points
		 */
		function dt_admin_enqueue_scripts($hook) {
			
			global $typenow, $default_posttypes, $enable_pb_default;
			
			if ( ! in_array( $hook, array( 'post-new.php', 'post.php' ) ) ) return;
			
			$pboptions = get_option(IAMD_THEME_SETTINGS);
			if ( isset($pboptions['pagebuilder']['post-types']) ) {
				$dtthemes_active_posttypes = $pboptions['pagebuilder']['post-types'];
			} else {
				$dtthemes_active_posttypes = $default_posttypes;
			}
				
			$post_types = isset( $dtthemes_active_posttypes ) ? (array) $dtthemes_active_posttypes : array();
	
			$dt_builder_enable = get_post_meta( get_the_ID(), '_dt_enable_builder', true );
			
			if($dt_builder_enable == '') {
				$pboption = isset($pboptions['pagebuilder'] ) ? $pboptions['pagebuilder'] : '';
				if(isset($pboption['enable-pagebuilder']) && $pboption['enable-pagebuilder'] == true) {
					update_post_meta( get_the_ID(), '_dt_enable_builder', 1 );
				} else {
					update_post_meta( get_the_ID(), '_dt_enable_builder', $enable_pb_default );
				}
			}
	
	
			/*
			 * To load the js and css files for selected post types
			*/
			if ( isset( $typenow ) && in_array( $typenow, array_keys($post_types) ) ){
				$this->dtthemes_pb_js();
				$this->dtthemes_pb_css();
			}

		}
		
		function dtthemes_pb_css(){
			wp_enqueue_style( 'dt-adminstyle', DESIGNTHEMES_PB_URI . '/style.css', array() );
			wp_enqueue_style( 'wp-jquery-ui-dialog' );
		}
	
		function dtthemes_pb_js(){
			
			global $text_config, $enable_widget, $theme_name, $dt_wp_editor;
			
			wp_enqueue_script( 'jquery-ui-core' );
			wp_enqueue_script( 'jquery-ui-sortable' );
			wp_enqueue_script( 'jquery-ui-draggable' );
			wp_enqueue_script( 'jquery-ui-droppable' );
			wp_enqueue_script( 'jquery-ui-resizable' );
	
			wp_enqueue_script( 'dt-adminjs', DESIGNTHEMES_PB_URI . '/js/admin.js', array('jquery'), false, true );
			wp_enqueue_script( 'dt-tooltip', DESIGNTHEMES_PB_URI . '/js/jquery.tipTip.minified.js', array('jquery'), false, true );
			wp_enqueue_script( 'dt-custom', DESIGNTHEMES_PB_URI . '/js/custom.js', array('jquery'), false, true );
			
			$builder_enable = get_post_meta( get_the_ID(), '_dt_enable_builder', true );
			
			$text_config['builder_enable'] = $builder_enable;
			$text_config['theme_name'] = $theme_name.esc_html__(' Page Builder', 'dt_plugins');
			$text_config['dt_wp_editor'] = $dt_wp_editor;
			$text_config['ajaxurl'] = admin_url( 'admin-ajax.php' );
			$text_config['dt_load_nonce'] = wp_create_nonce( 'dt_load_nonce' );
			$text_config['enable_widget'] = $enable_widget;
			
			wp_localize_script( 'dt-adminjs', 'dtthemes_options', $text_config );
			
		}


	}
}
?>