<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package molakat
 */

get_header();
?>
<!-- smp = single menu page-->
<div id="single_menu_page">
  <div class="container">
    <div class="smp_header">
      <h2><?php the_archive_title(); ?></h2>
    </div>
    <div class="row">
     <div class="col-md-9">

      <?php 
      if ( have_posts() ) :
        while ( have_posts() ) :
          the_post();
          get_template_part( 'template-parts/content', get_post_type() );

        endwhile; // End of the loop.
        the_posts_pagination( array(
          'prev_text' => '<i class="fa fa-arrow-left"></i><span class="screen-reader-text">' . __( 'Previous Page', 'molakat' ) . '</span>',
          'next_text' => '<span class="screen-reader-text">' . __( 'Next Page', 'molakat' ) . '</span><i class="fa fa-arrow-right"></i>' ,
          'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'molakat' ) . ' </span>',
        ) );
      else :
        get_template_part( 'template-parts/content', 'none' );

      endif;
      ?>

      </div>
      <div class="col-md-3">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</div>

<?php

get_footer();