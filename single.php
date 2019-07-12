<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package molakat
 */

get_header();
setPostViews(get_the_ID());
?>
<?php
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content', 'single' );
echo '<div class="container">';
	the_post_navigation();
	echo '</div>';
	do_action( 'magazil_single_after_article' );

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		echo '<div class="container">';
		comments_template();
		echo '</div>';
	endif;

endwhile; // End of the loop.
?>

<?php

get_footer();
