
     <!-- smp = single N=news page-->
    <div id="single_news_page" class="mt-3">
      <div class="container">
        <div class="snp_small_header">
          <h3><span>ফিচার</span><?php the_title( '', '' ); ?></h3>
        </div>
        <div class="single_news d-flex">
          <div class="single_post_news mt-4">
            <div class="single_post_news_content">
              <div class="snp_big_header">
                <?php the_title( '<h3 class="font-weight-bold">', '</h3>' ); ?>
              </div>
              <div class="news_writer_sml d-flex">
                <!-- <div class="row"> -->
                  <!-- <div class="col-md-4 col-sm-12"> -->
                    <div class="writer_info fb-30">
                      <div class="media">
                        <img class="mr-3 img-fluid rounded-circle" src="https://via.placeholder.com/80x80">
                        <div class="media-body">
                          <h5 class="mt-0 font-weight-bold">ডেস্ক রিপোর্ট</h5>
                          <h5 class="mt-0 font-weight-bold">বার্তা বাজার</h5>
                        </div>
                      </div>
                    </div>
                  <!-- </div> -->
                  <!-- <div class="col-md-8"> -->
                    <div class="sml fb-70">
                      <div class="sml_icon d-flex">
                        <div class="fb_share_count">
                          <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                        </div>
                        <div class="sm_icon f_icon">
                          <a href="#">
                            <span class="fa-stack fa-lg">
                              <i class="fa fa-circle fa-stack-2x"></i>
                              <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                            </span>
                          </a>
                        </div>
                        <div class="sm_icon t_icon">
                          <a href="#">
                            <span class="fa-stack fa-lg">
                              <i class="fa fa-circle fa-stack-2x"></i>
                              <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                            </span>
                          </a>
                        </div>
                        <div class="sm_icon p_icon">
                          <a href="#">
                            <span class="fa-stack fa-lg">
                              <i class="fa fa-circle fa-stack-2x"></i>
                              <i class="fa fa-pinterest-p fa-stack-1x fa-inverse"></i>
                            </span>
                          </a>
                        </div>
                        <div class="sm_icon print_icon">
                          <a href="#">
                            <span class="fa-stack fa-lg">
                              <i class="fa fa-circle fa-stack-2x"></i>
                              <i class="fa fa-print fa-stack-1x fa-inverse"></i>
                            </span>
                          </a>
                        </div>
                        <div class="sm_icon post_sees_icon">
                          <a href="#">
                            <span class="fa-stack fa-lg">
                              <i class="fa fa-circle fa-stack-2x"></i>
                              <i class="fa fa-eye fa-stack-1x fa-inverse"></i>
                            </span>
                            <span class="post_sees_count">102</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  <!-- </div> -->
                <!-- </div> -->
              </div>
              <?php if(has_post_thumbnail()){ 
                $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'molakat-larg-x' );
                $image = esc_url($image_url[0]);
                $title = get_the_title();
                printf('<div class="single_post_news_img"><img class="img-fluid" src="'.esc_url($image).'" alt="'.$title.'"></div>');
                }
              ?>
              
              <div class="single_news_content mt-4">
                <?php the_content(); ?>
              </div>
            </div>
          </div>

          <div class="mn_flex single_menu_page_sidebar mt-4">
            <div class="publish_info">
              <h5><strong>প্রকাশিত: </strong><span class="time">৭: ০০ বিকাল,</span><span>মে ১৭,২০১৯</span></h5>
              <h5><strong>আমাদের সাথে যুক্ত থাকুন-</strong> </h5>
              <div class="square_social_icon d-flex mt-2">
                <div class="square square_f_icon">
                  <a href="#">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                  </a>
                </div>
                <div class="square square_t_icon">
                  <a href="#">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                  </a>
                </div>
                <div class="square square_p_icon">
                  <a href="#">
                    <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                  </a>
                </div>
                <div class="square square_y_icon">
                  <a href="#">
                    <i class="fa fa-youtube" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </div>
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
                  <div class="single_menu_page_sidebar_news d-flex position-relative hover_block mt-3">
                    <div class="single_menu_page_sidebar_news_img fb-30">
                      <img src="https://via.placeholder.com/100x70" class="img-fluid">
                    </div>
                    <div class="single_menu_page_sidebar_news_heading fb-70">
                      <h4 class="ml-2">আমার সোনার বাংলা । আমি তোমায় ভালোবাসি</h4>
                    </div>
                    <a href="#" class="overlay_link"></a>
                  </div>
                  <div class="single_menu_page_sidebar_news d-flex position-relative hover_block mt-3">
                    <div class="single_menu_page_sidebar_news_img fb-30">
                      <img src="https://via.placeholder.com/100x70" class="img-fluid">
                    </div>
                    <div class="single_menu_page_sidebar_news_heading fb-70">
                      <h4 class="ml-2">আমার সোনার বাংলা । আমি তোমায় ভালোবাসি</h4>
                    </div>
                    <a href="#" class="overlay_link"></a>
                  </div>
                  <div class="single_menu_page_sidebar_news d-flex position-relative hover_block mt-3">
                    <div class="single_menu_page_sidebar_news_img fb-30">
                      <img src="https://via.placeholder.com/100x70" class="img-fluid">
                    </div>
                    <div class="single_menu_page_sidebar_news_heading fb-70">
                      <h4 class="ml-2">আমার সোনার বাংলা । আমি তোমায় ভালোবাসি</h4>
                    </div>
                    <a href="#" class="overlay_link"></a>
                  </div>
                  <div class="single_menu_page_sidebar_news d-flex position-relative hover_block mt-3">
                    <div class="single_menu_page_sidebar_news_img fb-30">
                      <img src="https://via.placeholder.com/100x70" class="img-fluid">
                    </div>
                    <div class="single_menu_page_sidebar_news_heading fb-70">
                      <h4 class="ml-2">আমার সোনার বাংলা । আমি তোমায় ভালোবাসি</h4>
                    </div>
                    <a href="#" class="overlay_link"></a>
                  </div>
                  <div class="single_menu_page_sidebar_news d-flex position-relative hover_block mt-3">
                    <div class="single_menu_page_sidebar_news_img fb-30">
                      <img src="https://via.placeholder.com/100x70" class="img-fluid">
                    </div>
                    <div class="single_menu_page_sidebar_news_heading fb-70">
                      <h4 class="ml-2">আমার সোনার বাংলা । আমি তোমায় ভালোবাসি</h4>
                    </div>
                    <a href="#" class="overlay_link"></a>
                  </div>
                </div>
                <div class="tab-pane fade" id="favouriteNews" role="tabpanel" aria-labelledby="favouriteNews-tab">
                  <div class="single_menu_page_sidebar_news d-flex position-relative hover_block mt-3">
                    <div class="single_menu_page_sidebar_news_img fb-30">
                      <img src="https://via.placeholder.com/100x70" class="img-fluid">
                    </div>
                    <div class="single_menu_page_sidebar_news_heading fb-70">
                      <h4 class="ml-2">আমার সোনার বাংলা । আমি তোমায় ভালোবাসি</h4>
                    </div>
                    <a href="#" class="overlay_link"></a>
                  </div>
                  <div class="single_menu_page_sidebar_news d-flex position-relative hover_block mt-3">
                    <div class="single_menu_page_sidebar_news_img fb-30">
                      <img src="https://via.placeholder.com/100x70" class="img-fluid">
                    </div>
                    <div class="single_menu_page_sidebar_news_heading fb-70">
                      <h4 class="ml-2">আমার সোনার বাংলা । আমি তোমায় ভালোবাসি</h4>
                    </div>
                    <a href="#" class="overlay_link"></a>
                  </div>
                  <div class="single_menu_page_sidebar_news d-flex position-relative hover_block mt-3">
                    <div class="single_menu_page_sidebar_news_img fb-30">
                      <img src="https://via.placeholder.com/100x70" class="img-fluid">
                    </div>
                    <div class="single_menu_page_sidebar_news_heading fb-70">
                      <h4 class="ml-2">আমার সোনার বাংলা । আমি তোমায় ভালোবাসি</h4>
                    </div>
                    <a href="#" class="overlay_link"></a>
                  </div>
                  <div class="single_menu_page_sidebar_news d-flex position-relative hover_block mt-3">
                    <div class="single_menu_page_sidebar_news_img fb-30">
                      <img src="https://via.placeholder.com/100x70" class="img-fluid">
                    </div>
                    <div class="single_menu_page_sidebar_news_heading fb-70">
                      <h4 class="ml-2">আমার সোনার বাংলা । আমি তোমায় ভালোবাসি</h4>
                    </div>
                    <a href="#" class="overlay_link"></a>
                  </div>
                  <div class="single_menu_page_sidebar_news d-flex position-relative hover_block mt-3">
                    <div class="single_menu_page_sidebar_news_img fb-30">
                      <img src="https://via.placeholder.com/100x70" class="img-fluid">
                    </div>
                    <div class="single_menu_page_sidebar_news_heading fb-70">
                      <h4 class="ml-2">আমার সোনার বাংলা । আমি তোমায় ভালোবাসি</h4>
                    </div>
                    <a href="#" class="overlay_link"></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="read_more mt-4">
      <div class="container">
        <div class="see_more_heading mb-4">
          <h3><span>আরও পডুন</span></h3>
        </div>
        <div class="read_more_suggest_news mb-5">
          <div class="row">
            <div class="col-md-3">
              <div class="card position-relative hover_block" style="">
                <img class="card-img-top" src="https://via.placeholder.com/280x180" alt="image" class="img-fluid">
                <div class="card-body">
                  <h5 class="card-title">আমার সোনার বাংলা । আমি তোমায় ভালোবাসি</h5>
                </div>
                <a href="#" class="overlay_link"></a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card position-relative hover_block" style="">
                <img class="card-img-top" src="https://via.placeholder.com/280x180" alt="image" class="img-fluid">
                <div class="card-body">
                  <h5 class="card-title">আমার সোনার বাংলা । আমি তোমায় ভালোবাসি</h5>
                </div>
                <a href="#" class="overlay_link"></a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card position-relative hover_block" style="">
                <img class="card-img-top" src="https://via.placeholder.com/280x180" alt="image" class="img-fluid">
                <div class="card-body">
                  <h5 class="card-title">আমার সোনার বাংলা । আমি তোমায় ভালোবাসি</h5>
                </div>
                <a href="#" class="overlay_link"></a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card position-relative hover_block" style="">
                <img class="card-img-top" src="https://via.placeholder.com/280x180" alt="image" class="img-fluid">
                <div class="card-body">
                  <h5 class="card-title">আমার সোনার বাংলা । আমি তোমায় ভালোবাসি</h5>
                </div>
                <a href="#" class="overlay_link"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>