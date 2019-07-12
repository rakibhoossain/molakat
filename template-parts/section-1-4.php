<?php    

$feature_post_cat_1 = get_theme_mod( 'molakat_feature_post_1', 0 );
$feature_post_kkabbo = new wp_query( array('cat' => $feature_post_cat_1, 'posts_per_page'=> 1, 'no_found_rows' => 1 , 'ignore_sticky_posts' => true)  );
  /* Start the Loop */

  $count = (int)0;
  while ( $feature_post_kkabbo->have_posts() ) : $feature_post_kkabbo->the_post(); 
  if ($count == 0) { ?>

    <div class="camera_kabbo_news position-relative hover_block">
      <div class="camera_kabbo_in">
      <?php if(has_post_thumbnail()){ 
        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'molakat-large-s' );
        $image = esc_url($image_url[0]);
        $title = get_the_title();
        printf('<img class="img-fluid" src="'.esc_url($image).'" alt="'.$title.'">');
        }else{
          printf('<img class="img-fluid" src="https://via.placeholder.com/800x320" alt="'.$title.'">');
        }
      ?>
      </div>
      <div class="camera_kabbo_news_heading">
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
<!-- second part -->

<div class="d-flex camera_kabbo_fn d-flex mt-3">       
<?php    
  $feature_post_kkabbo_4 = new wp_query( array('cat' => $feature_post_cat_1, 'posts_per_page'=> 5, 'no_found_rows' => 1 , 'ignore_sticky_posts' => true)  );
  /* Start the Loop */

  $count = (int)0;
  while ( $feature_post_kkabbo_4->have_posts() ) : $feature_post_kkabbo_4->the_post(); 
  if ($count > 0) { ?>

    <div class="ck_feature_news position-relative hover_block">
      <div class="ck_fn_img">
      <?php 
          if(has_post_thumbnail()){ 
            $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'molakat-small-ss' );
            $image = esc_url($image_url[0]);
            $title = get_the_title();
            printf('<img class="img-fluid" src="'.esc_url($image).'" alt="'.$title.'">');
          }else{
            printf('<img class="img-fluid" src="https://via.placeholder.com/200x150" alt="'.$title.'">');
          }
      ?>
      </div>
      <div class="ck_fn_heading">
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

 </div> <!-- Inner post container-->