<?php    
  $feature_post_1 = new wp_query( array('posts_per_page'=> 6, 'no_found_rows' => 1 , 'ignore_sticky_posts' => true)  );
  /* Start the Loop */
  while ( $feature_post_1->have_posts() ) : $feature_post_1->the_post();?>

          <div class="single_ads_book position-relative hover_block">
            <div class="single_ads_book_img">

    <?php if(has_post_thumbnail()){ 
        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'molakat-small-ss' );
        $image = esc_url($image_url[0]);
        $title = get_the_title();
        printf('<img class="img-fluid" src="'.esc_url($image).'" alt="'.$title.'">');
        }else{
          printf('<img class="img-fluid" src="https://via.placeholder.com/200x150" alt="'.$title.'">');
        }
      ?>
            </div>
            <div class="single_ads_book_heading">
              <?php the_title( '<h4>', '</h4>' );?>
            </div>
            <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="overlay_link"></a>
          </div>
<?php
  endwhile;
  wp_reset_postdata();
  wp_reset_query();