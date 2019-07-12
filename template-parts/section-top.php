<section id="slider_news">
  <div class="container">
    <div class="slider_fn d-flex">
      <!-- <div class="col-md-6"> -->
        <div id="slider">
          <div class="owl-carousel owl-theme">
            <?php    
            $molakat_top_post = new wp_query( array('posts_per_page'=> 4, 'post__in' => get_option( 'sticky_posts' ), 'no_found_rows' => 1 , 'ignore_sticky_posts' => true)  );
            /* Start the Loop */
            while ( $molakat_top_post->have_posts() ) : $molakat_top_post->the_post(); ?>

              <div class="carousel_item position-relative hover_block">
                <?php if(has_post_thumbnail()){ 
                  $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'molakat-large' );
                  $image = esc_url($image_url[0]);
                  $title = get_the_title();
                  printf('<img class="img-fluid" src="'.esc_url($image).'" alt="'.$title.'">');
                }else{
                  printf('<img class="img-fluid" src="https://via.placeholder.com/800x460" alt="'.$title.'">');
                }
                ?>
                <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="overlay_link"></a>
              </div>
              <?php
            endwhile;
            wp_reset_postdata();
            wp_reset_query();       
            ?>


          </div>
        </div>
        <!-- </div> -->
        <!-- <div class="col-md-6"> -->
          <div id="favourite_writing" class="pl-4">
            <div class="section_header favourite_writing_header mb-2">
              <h3>জনপ্রিয় লেখা</h3>
            </div>
            <div class="favourite_writing_news d-flex">


              <?php    
              $molakat_top_latest = new wp_query( array('posts_per_page'=> 4, 'meta_key' => 'wpb_post_views_count','no_found_rows' => 1 , 'ignore_sticky_posts' => true)  );
              /* Start the Loop */

              $count = (int)0;
              while ( $molakat_top_latest->have_posts() ) : $molakat_top_latest->the_post(); ?>

                <div class="summary position-relative hover_block <?php echo ($count>=2)? 'mt-3':'' ?>">

                  <?php if(has_post_thumbnail()){ 
                    $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'molakat-small' );
                    $image = esc_url($image_url[0]);
                    $title = get_the_title();
                    printf('<img class="img-fluid" src="'.esc_url($image).'" alt="'.$title.'">');
                  }else{
                    printf('<img class="img-fluid" src="https://via.placeholder.com/300x150" alt="'.$title.'">');
                  }
                  ?>
                  <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="overlay_link"></a>
                  <div class="summary_info">
                   <div class="info_title">
                     <?php the_title( '<h4><span>', '</span></h4>' );?>
                   </div>
                 </div>
               </div>
               <?php
               $count++;
             endwhile;
             wp_reset_postdata();
             wp_reset_query();  
             $count = 0;     
             ?>


           </div>
         </div>
         <!-- </div> -->
       </div>
     </div>
   </section>