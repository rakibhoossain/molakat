<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package butterfly
 */

?>
<?php if(is_single()): 
  get_template_part( 'template-parts/content', 'single' );
?>

<?php else: 
    get_template_part( 'template-parts/content', 'blog' );
?>
<?php endif; ?>