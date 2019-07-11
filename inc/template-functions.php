<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package molakat
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function molakat_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'molakat_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function molakat_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'molakat_pingback_header' );


// Comments 
function magazil_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'magazil_comment_field_to_bottom' );


/**
 *  Custom comments list
 */ 
function magazil_comment($comment, $args, $depth) { ?>
<li <?php comment_class("comment single-comment"); ?> id="comment-<?php comment_ID() ; ?>">
    <div class="comment-top-area justify-content-between d-flex">
      <div class="user d-flex">
        <div class="thumb">
          <?php echo get_avatar($comment,'60','' ); ?>
        </div>
        <div class="comment-meta">
          <h5 class="comment-author"><?php echo get_comment_author_link();?></h5>
          <h6 class="comment-date"><?php comment_date(); ?></h6>
          <?php edit_comment_link(__('(Edit)','molakat'),'  ','') ;?>
        </div>
      </div>

      <div class="reply-btn">
        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ;?>
      </div>

    </div>

    <div class="comment-desc">
      <div class="comment-content">
        <?php if ($comment->comment_approved == '0') : ?>
          <em><?php esc_attr_e('Your comment is awaiting moderation.','molakat') ;?></em>
          <br />
        <?php endif; ?>
        <?php comment_text() ;?>
      </div>
    </div>
</li>
                                            
<?php
    }


/**
 * Category list.
 */
if ( ! function_exists( 'molakat_post_categories' ) ) :
  /**
   * Displays categories.
   */
  function molakat_post_categories($multiple = false) {
    if ( 'post' === get_post_type() ) {
      if ($multiple) {
        echo get_the_category_list();
      }else{
        $category = get_the_category( get_the_ID() );
        if ( $category && !is_wp_error( $category ) ) :
          echo '<a href="'.get_category_link($category[0]->cat_ID).'">' . $category[0]->cat_name . '</a>';
        endif;
      }
    }
  }
endif;