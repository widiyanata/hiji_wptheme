<?php
/**
 * Template Name: Frontpage
 *
 * The template for displaying Front Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Hiji
 */

get_header();

$sections = array('hero', 'services', 'team', 'testi', 'contact');

foreach ( $sections as $section ){
  get_template_part('section-parts/section', $section );
}

get_footer();
?>
