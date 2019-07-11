<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package molakat
 */

?>
    <footer id="footer">
      <div class="container">
        <div class="footer_contact_info">
          <?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'molakat' ), 'molakat', '<a href="https://github.com/rakibhoossain">Rakib Hossain</a>' );
				?>
        </div>
      </div>
    </footer>
<?php wp_footer(); ?>

</body>
</html>
