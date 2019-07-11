  <div class="sidebar_menu mt-5">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="lastNews-tab" data-toggle="tab" href="#lastNews" role="tab" aria-controls="lastNews" aria-selected="true">সর্বশেষ খবর</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="favouriteNews-tab" data-toggle="tab" href="#favouriteNews" role="tab" aria-controls="favouriteNews" aria-selected="false">জনপ্রিয় খবর</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="lastNews" role="tabpanel" aria-labelledby="lastNews-tab">
    <?php    
      $feature_post_1 = new wp_query( array('posts_per_page'=> 8, 'no_found_rows' => 1 , 'ignore_sticky_posts' => true)  );
      while ( $feature_post_1->have_posts() ) : $feature_post_1->the_post(); 
    ?>
      <div class="single_menu_page_sidebar_news d-flex position-relative hover_block mt-3">
        <div class="single_menu_page_sidebar_news_img fb-30">
        <?php if(has_post_thumbnail()){ 
          $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'molakat-sm-s' );
          $image = esc_url($image_url[0]);
          $title = get_the_title();
          printf('<img class="img-fluid" src="'.esc_url($image).'" alt="'.$title.'">');
        }else{
          printf('<img class="img-fluid" src="https://via.placeholder.com/100x60" alt="'.$title.'">');
        }
        ?>
        </div>
        <div class="single_menu_page_sidebar_news_heading fb-70">
          <?php the_title( '<h4 class="ml-2">', '</h4>' );?>
        </div>
         <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="overlay_link"></a>
      </div>
    <?php
      endwhile;
      wp_reset_postdata();
      wp_reset_query();    
    ?>
      </div>
      <div class="tab-pane fade" id="favouriteNews" role="tabpanel" aria-labelledby="favouriteNews-tab">
      <?php    
        $feature_post_1 = new wp_query( array('posts_per_page'=> 8, 'no_found_rows' => 1 , 'ignore_sticky_posts' => true)  );
        while ( $feature_post_1->have_posts() ) : $feature_post_1->the_post(); 
      ?>
        <div class="single_menu_page_sidebar_news d-flex position-relative hover_block mt-3">
          <div class="single_menu_page_sidebar_news_img fb-30">
          <?php if(has_post_thumbnail()){ 
            $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'molakat-sm-s' );
            $image = esc_url($image_url[0]);
            $title = get_the_title();
            printf('<img class="img-fluid" src="'.esc_url($image).'" alt="'.$title.'">');
          }else{
            printf('<img class="img-fluid" src="https://via.placeholder.com/100x60" alt="'.$title.'">');
          }
          ?>
          </div>
          <div class="single_menu_page_sidebar_news_heading fb-70">
            <?php the_title( '<h4 class="ml-2">', '</h4>' );?>
          </div>
           <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="overlay_link"></a>
        </div>
      <?php
        endwhile;
        wp_reset_postdata();
        wp_reset_query();    
      ?>
      </div>
    </div>
  </div>