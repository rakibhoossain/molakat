<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package molakat
 */

get_header();
?>
<div id="single_menu_page">
<div class="container">
	<?php if ( have_posts() ) : ?>
	<div class="smp_header">
      <h2>
      	<?php
			/* translators: %s: search query. */
			printf( esc_html__( 'Search Results for: %s', 'molakat' ), '<span>' . get_search_query() . '</span>' );
		?>
		</h2>
    </div>
<?php endif; ?>
	<div class="row">
		<div class="col-md-9">
			
		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

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
