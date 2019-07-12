<?php
if(!class_exists('Widget_Magazil_Posts_List_Sidebar')){
 class Widget_Magazil_Posts_List_Sidebar extends WP_Widget {
    
	public function __construct() {
		add_action( 'admin_init', array( $this, 'enqueue' ) );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue' ) );
		add_action( 'customize_preview_init', array( $this, 'enqueue' ) );
		
		parent::__construct(
			'magazil_recent_posts', // Base ID
			__( 'Molakat: Recent & popular posts', 'molakat' ), // Name
			array( 'description' => __( 'Sidebar area Recent and populare Posts.', 'molakat' ), ) // Args
		);
		
	}

	public function enqueue() {
			wp_enqueue_script( 'jquery-ui' );
			wp_enqueue_script( 'jquery-ui-slider' );
			// wp_enqueue_style( 'magazil-widget-range' );
			// wp_enqueue_script( 'magazil-widget-range' );
	}	
	
 	function form( $instance ) {
 	    $defaults = array('list_num' => 4, 'title' => __( 'Recent Popular', 'molakat' ));
 		$instance = wp_parse_args( (array) $instance, $defaults );
 	
	?>
<p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'title' )); ?>">
    <?php _e('Title', 'molakat'); ?>
    :</label>
  <br />
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
</p>
<p>
	<label class="block" for="input_<?php echo esc_attr( $this->get_field_id( 'list_num' ) ); ?>">
	    <span class="customize-control-title">
	       <?php _e( 'Posts to Show', 'molakat' ); ?> :
	    </span>
	</label>
	<div class="slider-container">
	    <input type="text" name="<?php echo esc_attr( $this->get_field_name( 'list_num' ) ); ?>" class="rl-slider"
	           id="input_<?php echo esc_attr( $this->get_field_id( 'list_num' ) ); ?>"
	           value="<?php echo esc_attr( $instance['list_num'] ); ?>"/>
	    <div id="slider_<?php echo esc_attr( $this->get_field_id( 'list_num' ) ) ?>" data-attr-min="4"
	         data-attr-max="12" data-attr-step="1" class="ss-slider"></div>
	</div>
</p>
<?php

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
			$instance['list_num']  = absint($new_instance['list_num']);
			$instance['title']     = esc_attr($new_instance['title']);

		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );
 	    $title    = apply_filters(__('Recent Posts', 'molakat'), esc_attr($instance['title']) );
		$list_num = absint($instance['list_num']);
		
		echo wp_specialchars_decode($before_widget);
		if($title)
			$widget_title = $before_title . $title . $after_title;
		echo wp_specialchars_decode($widget_title);
		
		// $my_query = new WP_Query( 'showposts='.absint($list_num).'&ignore_sticky_posts=1');
		?>

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
      $molakat_side_recent = new wp_query( array('posts_per_page'=> absint($list_num), 'no_found_rows' => 1 , 'ignore_sticky_posts' => true)  );
      while ( $molakat_side_recent->have_posts() ) : $molakat_side_recent->the_post(); 
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
        $molakat_side_popular = new wp_query( array('posts_per_page'=> absint($list_num), 'meta_key' => 'wpb_post_views_count', 'no_found_rows' => 1 , 'ignore_sticky_posts' => true)  );
        while ( $molakat_side_popular->have_posts() ) : $molakat_side_popular->the_post(); 
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


<?php
	echo wp_specialchars_decode($after_widget);
 	}//end widget()
 }
}