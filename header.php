<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package molakat
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <section id="top_header">
    <div class="logo_ads">
      <div class="ads">
        <div class="container">
          <div class="row">
            <div class="col align-self-end">
              <?php echo wp_specialchars_decode(get_theme_mod( 'molakat_ad_1')); ?>
            </div>
          </div>
        </div>
        <!-- <div class="col-md-6"></div> -->
      </div>
      <div class="employee_info">
        <div class="container">
          <div class="employee_name">
            <h5>সম্পাদক : আফসার নিজাম </h5>
            <h5>নির্বাহী সম্পাদক : হাসান রুহুল </h5>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="logo">
          <!--               <img src="images/logo_molakat.png"> -->

          <?php 
          if ( has_custom_logo() ) {
            the_custom_logo();
          } else {
            echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
          }
          ?>
        </div>
      </div>
    </div>
  </section>

  <section id="main_header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <?php
            wp_nav_menu( array(
             'theme_location'    => 'menu-1',
             'depth'             => 2,
             'container'         => 'div',
             'container_class'   => 'collapse navbar-collapse',
             'container_id'      => 'navbarSupportedContent',
             'menu_class'        => 'navbar-nav mr-auto',
             'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
             'walker'            => new WP_Bootstrap_Navwalker(),
           ) );
           ?>
         </nav>
       </div>
       <div class="col-md-2">
        <div class="social_media">


          <?php
          if ( has_nav_menu( 'social' ) ) {
            wp_nav_menu( array(
              'theme_location'    => 'social',
              'menu_class'        => 'social-menu',
              'container'         => false,
              'depth'          => 1,
              'link_before'    => '<span class="screen-reader-text">',
              'link_after'     => '</span><i class="fa fa-chain"></i>',
            ) );
          }
          ?>


        </div>
      </div>
    </div>
  </div>
</section>