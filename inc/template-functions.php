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

/*
 * Set post views count using post meta
 */
function setPostViews($postID) {
    $countKey = 'wpb_post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    }else{
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}

/**
 * Get all posts
 * 
 * @return array
 */
function butterfly_post_list() {
  $pages    = array();
  foreach ( get_posts() as $page ) {
    $pages[ $page->ID ] = $page->post_title;
  }

  return $pages;
}

/**
 * Get all categories
 * 
 * @return array
 */
function butterfly_cat_list() {
  $cats    = array();
  foreach ( get_categories() as $categories => $category ) {
    $cats[ $category->term_id ] = $category->name;
  }

  return $cats;
}


/**
 * Display Fontawesome icons in social links menu.
 *
 * @param  string  $item_output The menu item output.
 * @param  WP_Post $item        Menu item object.
 * @param  int     $depth       Depth of the menu.
 * @param  array   $args        wp_nav_menu() arguments.
 * @return string  $item_output The menu item output with social icon.
 */
function magazil_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
  // Get supported social icons.
  $social_icons =  magazil_social_links_icons();

  // Change SVG icon inside social links menu if there is supported URL.
  if ( 'social' === $args->theme_location ) {
    foreach ( $social_icons as $attr => $value ) {
      if ( false !== strpos( $item_output, $attr ) ) {

        $item_output = str_replace( $args->link_after, '</span><i class="fa fa-'.esc_attr( $value ).'"></i>', $item_output );
      }
    }
  }

  return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'magazil_nav_menu_social_icons', 10, 4 );


/**
 * Returns an array of supported social links (URL and icon name).
 *
 * @return array $social_links_icons
 */
function magazil_social_links_icons() {
  // Supported social links icons.
  $social_links_icons = array(
    'behance.net'     => 'behance',
    'codepen.io'      => 'codepen',
    'deviantart.com'  => 'deviantart',
    'digg.com'        => 'digg',
    'docker.com'      => 'dockerhub',
    'dribbble.com'    => 'dribbble',
    'dropbox.com'     => 'dropbox',
    'facebook.com'    => 'facebook',
    'flickr.com'      => 'flickr',
    'foursquare.com'  => 'foursquare',
    'plus.google.com' => 'google-plus',
    'github.com'      => 'github',
    'instagram.com'   => 'instagram',
    'linkedin.com'    => 'linkedin',
    'mailto:'         => 'envelope-o',
    'medium.com'      => 'medium',
    'pinterest.com'   => 'pinterest-p',
    'pscp.tv'         => 'periscope',
    'getpocket.com'   => 'get-pocket',
    'reddit.com'      => 'reddit-alien',
    'skype.com'       => 'skype',
    'skype:'          => 'skype',
    'slideshare.net'  => 'slideshare',
    'snapchat.com'    => 'snapchat-ghost',
    'soundcloud.com'  => 'soundcloud',
    'spotify.com'     => 'spotify',
    'stumbleupon.com' => 'stumbleupon',
    'tumblr.com'      => 'tumblr',
    'twitch.tv'       => 'twitch',
    'twitter.com'     => 'twitter',
    'vimeo.com'       => 'vimeo',
    'vine.co'         => 'vine',
    'vk.com'          => 'vk',
    'wordpress.org'   => 'wordpress',
    'wordpress.com'   => 'wordpress',
    'yelp.com'        => 'yelp',
    'youtube.com'     => 'youtube',
  );

  /**
   * Filter Magazil social links icons.
   *
   * @since Magazil 1.0
   *
   * @param array $social_links_icons Array of social links icons.
   */
  return apply_filters( 'magazil_social_links_icons', $social_links_icons );
}