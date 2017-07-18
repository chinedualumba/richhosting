<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php
			_e( 'This post is password protected. Enter the password to view any comments.','dt_themes'); ?></p><?php
		return;
	endif;?>

	<h2 class="dt-sc-title"><?php
		$no_comments = __('No','dt_themes').' <i class="fa fa-comment"></i> '.__('Comments','dt_themes');
		$one_comment = '1 <i class="fa fa-comment"></i> '.__('Comment','dt_themes');
		$n_comments = '% <i class="fa fa-comment"></i> '.__('Comments','dt_themes');
		 comments_number( $no_comments , $one_comment , $n_comments );?> 
	</h2>

	<?php if ( have_comments() ) :?>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
                    <div class="navigation">
                        <div class="nav-previous"><?php previous_comments_link( __( 'Older Comments','dt_themes'  ) ); ?></div>
                        <div class="nav-next"><?php next_comments_link( __( 'Newer Comments','dt_themes') ); ?></div>
                    </div> <!-- .navigation -->
        <?php endif; // check for comment navigation ?>

        <ul class="commentlist">
     		<?php wp_list_comments( array( 'callback' => 'dttheme_custom_comments' ) ); ?>
        </ul>

	<?php else:
			if ( ! comments_open() ) :?>
				<p class="nocomments"><?php _e( 'Comments are closed.','dt_themes'); ?></p>
	<?php 	endif;
		  endif;?>

    <!-- Comment Form -->
    <?php if ('open' == $post->comment_status) : 
			$author = "<div class='column dt-sc-one-half first'><input id='author' name='author' type='text' placeholder='".__("Your Name","dt_themes")."' required /></div>";
			$email = "<div class='column dt-sc-one-half'><input id='email' name='email' type='text' placeholder='".__("Your Email","dt_themes")."' required /></div>";
			$comment = "<div class='dt-sc-clear'></div><div class='dt-sc-one-column'><textarea id='comment' name='comment' cols='5' rows='3' placeholder='".__("Your Comment","dt_themes")."' ></textarea></div>";
				$comments_args = array(
					'title_reply' => __( 'Give a Reply','dt_themes' ),
					'fields'=>array('author' => $author,'email' =>	$email),
					'comment_field'=> $comment,
					'comment_notes_before'=>'','comment_notes_after'=>'','label_submit'=>__('Add Comment','dt_themes'));		
            comment_form($comments_args);?>
	<?php endif; ?>
