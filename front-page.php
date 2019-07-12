<?php
/**
 * The front page template
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package molakat
 */

get_header();
?>


    <?php get_template_part( 'template-parts/section', 'top' ); ?>

    <section id="google_ads">
       <div class="container">
         <div class="ads">
           <?php echo wp_specialchars_decode(get_theme_mod( 'molakat_ad_2')); ?>
         </div>
       </div>
    </section>


    <section id="kabbo" class="pt-4 pb-4">
      <div class="container">
        <div class="d-flex">
          <!-- <div class="col-md-8"> -->
            <div class="camera_kabbo">
              <div class="section_header">
                <h3>ক্যামেরাকাব্য</h3>
              </div>
              <?php get_template_part( 'template-parts/section', '1-4' ); ?>
            </div>
          <!-- </div> -->
          <!-- <div class="col-md-4"> -->

            <div class="scene_kabbo">
              <div class="section_header">
                <h3>দৃশ্যকাব্য </h3>
              </div>
              <?php get_template_part( 'template-parts/section', '1-3x' ); ?>
            </div>

          <!-- </div> -->
        </div>
      </div>
    </section>


<?php get_template_part( 'template-parts/section', 'topv' ); ?>

    <section id="google_ads">
       <div class="container">
         <div class="ads">
           <?php echo wp_specialchars_decode(get_theme_mod( 'molakat_ad_3')); ?>
         </div>
       </div>
    </section>

    <section id="story_novel" class="pt-4 pb-4">
      <div class="container">
        <div class="d-flex">
          <div class="story mr"></div>
           <div class="novel ml"></div>


          <!-- <div class="col-md-6"> -->
            <div class="story mr">
              <div class="section_header story_header mb-2">
                <h3>গল্প</h3>
              </div>
              <?php get_template_part( 'template-parts/section', '1-3' ); ?>
            </div>
          <!-- </div> -->
          <!-- <div class="col-md-6"> -->
            <div class="novel ml">
              <div class="section_header novel_header mb-2">
                <h3>উপন্যাস</h3>
              </div>
              <?php get_template_part( 'template-parts/section', '1-3-1' ); ?>
            </div>
          <!-- </div> -->
        </div>
      </div>
    </section>

    <section id="ads_book" class="pt-4 pb-4">
      <div class="container">
        <div class="book d-flex">
          <?php get_template_part( 'template-parts/add', 'book' ); ?>
        </div>
      </div>
    </section>

    <!-- pbdc = poem book discuss culture section
      p = poen
      bd = book Discuss
      c = Culture 
      p_fsn = feature single news
    -->
    <section id="pbdc">
      <div class="container">
        <div class="d-flex">
          <!-- <div class="col-md-4"> -->
            <div class="poem">
              <div class="section_header poem_header mb-2">
                <h3>কবিতা</h3>
              </div>
                <?php get_template_part( 'template-parts/section', '1-3v' ); ?>
            </div>
          <!-- </div> -->
          <!-- <div class="col-md-4"> -->
            <div class="book_discuss">
              <div class="section_header book_discuss_header mb-2">
                <h3 class="section_header">বই আলোচনা</h3>
              </div>
              <?php get_template_part( 'template-parts/section', '1-3v-1' ); ?>
            </div>
          <!-- </div> -->
          <!-- <div class="col-md-4"> -->
            <div class="culture">
              <div class="section_header culture_header mb-2">
                <h3>সংস্কৃতি</h3>
              </div>
              <?php get_template_part( 'template-parts/section', '1-3v-2' ); ?>
            </div>
          <!-- </div> -->
        </div>
      </div>
    </section>

<!-- sna = Speek news Ads
      s = speek 
      sfsn = speek feature single news
    -->
    <section id="sna">
      <div class="container">
        <div class="row">
          <!-- <div class="col-md-8"> -->
            <div class="sn d-flex mb-5 mt-5">
              <!-- <div class="row"> -->
                <!-- <div class="col-md-6 col-sm-12"> -->
                  <div class="s">
                    <div class="section_header mb-2">
                      <h3>কথামালা</h3>
                    </div>
                    <?php get_template_part( 'template-parts/section', '1-2' ); ?>
                  </div>
                <!-- </div> -->
                <!-- <div class="col-md-6 col-sm-12"> -->
                  <div class="s">
                    <div class="section_header mb-2">
                      <h3>সংবাদ</h3>
                    </div>
                    <?php get_template_part( 'template-parts/section', '1-2-1' ); ?>
                  </div>
                  <div class="s">
                    <?php
                    if (is_active_sidebar("front-page")) :
                        dynamic_sidebar("front-page");
                    endif;
                    ?>

                    
                  </div>

            </div>

        </div>
      </div>
    </section>

<?php
get_footer();