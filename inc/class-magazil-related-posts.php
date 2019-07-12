<?php
/**
 * Class Magazil_Related_Posts_Output
 *
 * This file does the social sharing handling for the Muscle Core Lite Framework
 *
 * @author      Rakib Hossain
 * @copyright   (c) Copyright by Rakib Hossain
 * @link        http://rakibhossain.cf/
 * @package     magazil
 * @since       Version 1.0.0
 */

// @todo : more effects for hover images
// @todo: pull in more than post title & date

if ( ! function_exists( 'magazil_call_related_posts_class' ) ) {
	/**
	 *
	 * Gets called only if the "display related posts" option is checked
	 * in the back-end
	 *
	 * @since   1.0.0
	 *
	 */
	function magazil_call_related_posts_class() {
		// instantiate the class & load everything else
		Magazil_Related_Posts::get_instance();
	}

	add_action( 'wp_loaded', 'magazil_call_related_posts_class' );
}


if ( ! class_exists( 'Magazil_Related_Posts' ) ) {

	/**
	 * Class Magazil_Related_Posts
	 */
	class Magazil_Related_Posts {

		/**
		 * @var Singleton The reference to *Singleton* instance of this class
		 */
		private static $instance;

		/**
		 *
		 */
		protected function __construct() {
			add_action( 'magazil_single_after_article', array( $this, 'output_related_posts' ), 2 );
		}

		/**
		 * Returns the *Singleton* instance of this class.
		 *
		 * @return Singleton The *Singleton* instance.
		 */
		public static function get_instance() {
			if ( null === static::$instance ) {
				static::$instance = new static();
			}

			return static::$instance;
		}

		/**
		 * Private clone method to prevent cloning of the instance of the
		 * *Singleton* instance.
		 *
		 * @return void
		 */
		private function __clone() {
		}

		/**
		 * Private unserialize method to prevent unserializing of the *Singleton*
		 * instance.
		 *
		 * @return void
		 */
		private function __wakeup() {
		}


		/**
		 * Get related posts by category
		 *
		 * @param  integer $post_id current post id
		 * @param  integer $number_posts number of posts to fetch
		 *
		 * @return object                  object with posts info
		 */
		public function get_related_posts( $post_id, $number_posts = - 1 ) {

			$related_postsuery = new WP_Query();
			$args              = '';

			if ( 0 == $number_posts ) {
				return $related_postsuery;
			}

			$args = wp_parse_args( $args, array(
				'category__in'        => wp_get_post_categories( $post_id ),
				'ignore_sticky_posts' => 0,
				'posts_per_page'      => $number_posts,
				'post__not_in'        => array( $post_id ),
				'meta_key'            => '_thumbnail_id',
			) );

			$related_postsuery = new WP_Query( $args );

			// reset post query
			wp_reset_postdata();
			wp_reset_query();

			return $related_postsuery;
		}

		/**
		 * Render related posts carousel
		 *
		 * @return string                    HTML markup to display related posts
		 **/
		function output_related_posts() {
 
			// Check if related posts should be shown get_option( 'posts_per_page' )
			$related_posts = $this->get_related_posts( get_the_ID(), 4 );
			if ( $related_posts->have_posts() ): ?>

            <div class="read_more mt-4">
		      <div class="container">
		        <div class="see_more_heading mb-4">
		          <h3><span>আরও পডুন</span></h3>
		        </div>
		        <div class="read_more_suggest_news mb-5">
		          <div class="row">
			<?php
                // Loop through related posts
			while ( $related_posts->have_posts() ) { $related_posts->the_post(); ?>

            <div class="col-md-3">
              <div class="card position-relative hover_block" style="">
 		      	<?php if(has_post_thumbnail()){ 
			        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'molakat-small-x' );
			        $image = esc_url($image_url[0]);
			        $title = get_the_title();
			        printf('<img class="img-fluid card-img-top" src="'.esc_url($image).'" alt="'.$title.'">');
			        }else{
			          printf('<img class="img-fluid card-img-top" src="https://via.placeholder.com/280x180" alt="'.$title.'">');
			        }
		      	?>
                <div class="card-body">
                  <?php the_title( '<h5 class="card-title">', '</h5>' );?>
                </div>
                <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="overlay_link"></a>
              </div>
            </div>

			<?php
                 } //end while   
			wp_reset_query();
			wp_reset_postdata();
			echo' </div>
		        </div>
		      </div>
		    </div>';
			endif;
		}
	}
}// End if().