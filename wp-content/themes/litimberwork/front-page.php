<?php
/*
Template Name: Front Page
*/
/** header */
get_header();

/** banner */
get_template_part( 'template-parts/parts-front', 'banner' );

/** Products */
get_template_part( 'template-parts/parts-front', 'products' );

/** welcome */
get_template_part( 'template-parts/parts-front', 'welcome' );

/** About */
get_template_part( 'template-parts/parts-front', 'about' );

/** Our Work */
get_template_part( 'template-parts/parts', 'our-work' );

/** footer */
get_footer();

?>
