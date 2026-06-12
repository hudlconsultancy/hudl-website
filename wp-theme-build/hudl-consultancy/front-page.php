<?php
/**
 * Front page template — always renders the HUDL homepage landing sections,
 * whether Settings → Reading is set to "Your latest posts" or a static page.
 *
 * @package HUDL_Consultancy
 */

get_header();

get_template_part( 'template-parts/homepage' );

get_footer();
