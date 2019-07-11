<?php    
  $feature_post_1 = new wp_query( array('posts_per_page'=> 1, 'no_found_rows' => 1 , 'ignore_sticky_posts' => true)  );
  /* Start the Loop */

  $count = (int)0;
  while ( $feature_post_1->have_posts() ) : $feature_post_1->the_post(); 
  if ($count == 0) { ?>

    <div class="s_mian_news position-relative hover_block">
      <div class="s_main_news_img">
      <?php if(has_post_thumbnail()){ 
        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'molakat-large-slx' );
        $image = esc_url($image_url[0]);
        $title = get_the_title();
        printf('<img class="img-fluid" src="'.esc_url($image).'" alt="'.$title.'">');
        }else{
          printf('<img class="img-fluid" src="https://via.placeholder.com/600x300" alt="'.$title.'">');
        }
      ?>
      </div>
      <div class="s_main_news_heading">
        <?php the_title( '<h4><span>', '</span></h4>' );?>
      </div>
      <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="overlay_link"></a>
    </div>
  <?php
}
    ?>
<?php
  $count++;
  endwhile;
  wp_reset_postdata();
  wp_reset_query();  
  $count = 0;     
?>
<!-- second part -->

<div class="s_feature_news mt-2">
  <div class="d-flex">       
<?php    
  $feature_post_1 = new wp_query( array('posts_per_page'=> 3, 'no_found_rows' => 1 , 'ignore_sticky_posts' => true)  );
  /* Start the Loop */

  $count = (int)0;
  while ( $feature_post_1->have_posts() ) : $feature_post_1->the_post(); 
  if ($count > 0) { ?>

  <div class="sfsn position-relative hover_block">
    <div class="sfsn_img">
      <?php 
        if(has_post_thumbnail()){ 
          $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'molakat-small-sx' );
          $image = esc_url($image_url[0]);
          $title = get_the_title();
          printf('<img class="img-fluid" src="'.esc_url($image).'" alt="'.$title.'">');
        }else{
          printf('<img class="img-fluid" src="https://via.placeholder.com/200x120" alt="'.$title.'">');
        }
      ?>
    </div>
    <div class="sfsn_heading">
      <?php the_title( '<h4>', '</h4>' );?>
    </div>
    <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="overlay_link"></a>
  </div>
  <?php
}
    ?>
<?php
  $count++;
  endwhile;
  wp_reset_postdata();
  wp_reset_query();  
  $count = 0;     
?>
  <!-- Inner post -->
   </div> <!-- Inner post container-->
</div>