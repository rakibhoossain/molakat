<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="post-box-ltrt  row align-items-center pb-20">
    <div class="col-lg-5 post-left relative posts-box">
      <a class="posts-box-img" href="<?php echo get_the_permalink(); ?>">
      <?php if(has_post_thumbnail()){ 
        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'molakat-small' );
        $image = esc_url($image_url[0]);
        printf('<span style="background: url(\''.esc_url($image).'\')"></span>');
        }
      ?>
      </a>
      <div class="posts-meta-details">
        <?php molakat_post_categories(); ?>
      </div>
    </div>
    <div class="col-lg-7 post-right">
      <?php the_title( '<a href="' . esc_url( get_the_permalink() ) . '" rel="bookmark"><h4 class="entry-title page-title">', '</h4></a>' );
      ?>
      <div class="excert"><?php echo wp_trim_words( get_the_excerpt(), 5, ' <a href="' . esc_url( get_the_permalink() ) . '" rel="bookmark">...আরও</a>' ); ?></div>
    </div>
  </div>
</article><!-- #post-<?php the_ID(); ?> -->