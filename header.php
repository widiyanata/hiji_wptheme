<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hiji
 */

// Get Logo
 $logo = get_theme_mod('logo', '');

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <!-- <?php echo is_front_page() ? 'navbar-transparent  navbar-fixed-top' : '' ; ?> <?php echo is_front_page() ? 'color-on-scroll="200"' : '' ; ?> -->
 <nav class="navbar navbar-default navbar-transparent  navbar-fixed-top"  color-on-scroll="200">
   <!-- if you want to keep the navbar hidden you can add this class to the navbar "navbar-burger"-->
    <div class="container">
    <div class="navbar-header">
      <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar bar1"></span>
        <span class="icon-bar bar2"></span>
        <span class="icon-bar bar3"></span>
      </button>
      <?php if ( !empty($logo) ) { ?>
        <img src="<?php echo $logo ?>" alt="<?php bloginfo('name') ?>">
      <?php } else { ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand">
          <?php bloginfo('name') ?>
        </a>
      <?php } ?>
    </div>
      <?php
          wp_nav_menu( array(
              'menu'              => 'primary',
              'theme_location'    => 'primary',
              'depth'             => 2,
              'container'         => 'div',
              'container_class'   => 'collapse navbar-collapse',
              'container_id'      => 'bs-example-navbar-collapse-1',
              'menu_class'        => 'nav navbar-nav navbar-right navbar-uppercase',
              'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
              'walker'            => new wp_bootstrap_navwalker())
          );
      ?>
    </div>
  </nav>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'hiji' ); ?></a>

  <?php if ( is_front_page() && is_home() ) : ?>
	<header id="masthead" class="site-header" role="banner">
     <div class="layer"></div>
     <div class="container">
       <div class="site-branding">
         <h3 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo bloginfo('name'); ?></a></h3>
         <div class="separator line-separator">♦</div>
         <?php
         // Add Breadcrumbs, yoast if exist and default if not
         if ( function_exists('yoast_breadcrumb') ) {
           yoast_breadcrumb('<p id="breadcrumbs">','</p>');
         } else {
           if( !is_home() ) { custom_breadcrumbs(); };
         } ?>
         <h4><?php echo bloginfo('description'); ?></h4>
         <?php
         // $description = get_bloginfo( 'description', 'display' );
         //
         // global $wp_query;
         // $cat =   get_the_category($wp_query->post->ID );
         // echo $cat->name;
         // if ( $description || is_customize_preview() ) : ?>
            <!-- <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p> -->
            <?php
         // endif; ?>
       </div><!-- .site-branding -->
     </div>


	</header><!-- #masthead -->

  <?php endif; ?>

  <?php
  $page_id = get_queried_object_id();
  $post_thumbnail_id = get_post_thumbnail_id( $page_id );
  $bgimg = wp_get_attachment_url( $post_thumbnail_id );

  if ( !is_front_page() ) : ?>
	<header id="masthead" class="site-header" role="banner"
    style="background: url(<?php echo $bgimg; ?>) fixed center center; background-size:contain">
    <!-- style="
    background: url(<?php echo $bgimg; ?>) fixed center center;
    background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 59%, rgba(0, 0, 0, 0.65) 100%), url(<?php echo $bgimg; ?>) no-repeat;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0, 0, 0, 0)), color-stop(59%, rgba(0, 0, 0, 0)), color-stop(100%, rgba(0, 0, 0, 0.65))), url(<?php echo $bgimg; ?>) no-repeat;
    background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 59%, rgba(0, 0, 0, 0.65) 100%), url(<?php echo $bgimg; ?>) no-repeat;
    background: -o-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 59%, rgba(0, 0, 0, 0.65) 100%), url(<?php echo $bgimg; ?>) no-repeat;
    background: -ms-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 59%, rgba(0, 0, 0, 0.65) 100%), url(<?php echo $bgimg; ?>) no-repeat;
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.45) 100%), url(<?php echo $bgimg; ?>) no-repeat;
    background-size: cover;
     " -->
     <div class="layer"></div>
     <div class="container">
       <div class="site-branding">
         <h3 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php wp_title(''); ?></a></h3>
         <div class="separator line-separator">♦</div>
         <?php if ( function_exists('yoast_breadcrumb') ) {
           yoast_breadcrumb('<p id="breadcrumbs">','</p>');
         } else {
           if( !is_home() ) { custom_breadcrumbs(); };
         } ?>

         <?php
         // $description = get_bloginfo( 'description', 'display' );
         //
         // global $wp_query;
         // $cat =   get_the_category($wp_query->post->ID );
         // echo $cat->name;
         // if ( $description || is_customize_preview() ) : ?>
            <!-- <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p> -->
            <?php
         // endif; ?>
       </div><!-- .site-branding -->
     </div>


	</header><!-- #masthead -->

  <?php endif; ?>
