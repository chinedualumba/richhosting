<?php
/** My Recent Posts Widget
  * Objective:
  *		1.To list out posts
**/
class MY_Recent_Posts extends WP_Widget {
	#1.constructor
	function __construct() {
		$widget_options = array("classname"=>'dt_widget_recent_entries', 'description'=>'To list out posts');
		parent::__construct(false,IAMD_THEME_NAME.__(' Posts','dt_themes'),$widget_options);
	}
	
	#2.widget input form in back-end
	function form($instance) {
		$instance = wp_parse_args( (array) $instance,array('title'=>'','_post_count'=>'', '_post_option'=>'') );
		$title = strip_tags($instance['title']);
		$_post_count = !empty($instance['_post_count']) ? strip_tags($instance['_post_count']) : "4";
		$_post_option = !empty($instance['_post_option']) ? strip_tags($instance['_post_option']) : "3";?>
        
        <!-- Form -->
        <p><label for="<?php echo esc_attr( $this->get_field_id('title' )); ?>"><?php _e('Title:','dt_themes');?> 
		   <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" 
            type="text" value="<?php echo esc_attr($title); ?>" /></label></p>

        <p><label for"<?php echo esc_attr( $this->get_field_id('_post_option') ); ?>"><?php _e('Display','dt_themes');?></label>
        	<select id="<?php echo esc_attr( $this->get_field_id('_post_option') ); ?>" name="<?php echo esc_attr( $this->get_field_name('_post_option') ); ?>"><?php
        		$options = array( '1' => __('Date Only','dt_themes'), '2' => __('Comment Only','dt_themes'), '3' => __('Date and Comment','dt_themes') );
        		foreach ($options as $key => $value) {
        			$selected = ( $_post_option == $key ) ? ' selected="selected" ' : '';
        			echo "<option {$selected} value='{$key}'>{$value}</option>";
        		}
        	?></select></p>

	    <p><label for="<?php echo esc_attr( $this->get_field_id('_post_count') ); ?>"><?php _e('No.of posts to show:','dt_themes');?></label>
		   <input id="<?php echo esc_attr( $this->get_field_id('_post_count') ); ?>" name="<?php echo esc_attr( $this->get_field_name('_post_count') ); ?>" value="<?php echo esc_attr(  $_post_count );?>" /></p>
        <!-- Form end-->
<?php
	}
	#3.processes & saves the twitter widget option
	function update( $new_instance,$old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['_post_count'] = strip_tags($new_instance['_post_count']);
		$instance['_post_option'] = $new_instance['_post_option'];
	return $instance;
	}
	
	#4.output in front-end
	function widget($args, $instance) {
		extract($args);
		global $post;
		$title = empty($instance['title']) ? '' : strip_tags($instance['title']);
		$_post_count = (int) $instance['_post_count'];
		$_post_option = (int) $instance['_post_option'];

		echo !empty( $before_widget ) ? $before_widget : '';
		
		echo !empty($title) ? $before_title.$title.$after_title : '';
		
		echo '<ul>';
		$dt_posts = new WP_Query( array( 'posts_per_page' => $_post_count, 'post_status' =>'publish', 'ignore_sticky_posts'=>true ) );
		if( $dt_posts->have_posts() ):
			while( $dt_posts->have_posts() ):
				$dt_posts->the_post();

				$pid = get_the_ID();
				$link = get_permalink($pid);
				$title = ( strlen(get_the_title($pid)) > 40 ) ? substr(get_the_title($pid),0,35)."..." :get_the_title($pid);

				echo '<li>';
				echo '<h4 class="entry-title"><a href="'.esc_attr($link).'">'.esc_html($title).'</a></h4>';
				echo '<p class="show-meta">';
						if( $_post_option == 1 ): # Date only
							echo '<span class="date-info"> <i class="fa fa-clock-o"></i>'.get_the_date('j M Y', $pid).'</span>';
						elseif( $_post_option == 2): # Comment only
							$commenttext = "";
							if((wp_count_comments($pid)->approved) == 0)
								$commenttext = '0 ';
							else
							$commenttext = wp_count_comments($pid)->approved;
							echo '<a class="comments" href="'.esc_url($link).'/#respond"> <i class="fa fa-comment"></i>'.esc_html($commenttext).' '.esc_html__('Comments','dt_themes').'</a>';
						elseif( $_post_option == 3): # Both Date & Comment

							echo '<span class="date-info"> <i class="fa fa-clock-o"></i>'.get_the_date('j M Y', $pid).'</span>';

							$commenttext = "";
							if((wp_count_comments($pid)->approved) == 0)
								$commenttext = '0 ';
							else
							$commenttext = wp_count_comments($pid)->approved;
							echo '<a class="comments" href="'.esc_url($link).'/#respond"> <i class="fa fa-comment"></i>'.esc_html($commenttext).' '.esc_html__('Comments','dt_themes').'</a>';
						endif;
				echo '</p>';
				echo '</li>';
			endwhile;
		else:
			echo "<li><h4>".__('No Posts found','dt_themes')."</h4></li>";	
		endif;
		echo '</ul>';
		echo !empty( $after_widget ) ? $after_widget : '';
	}
}?>