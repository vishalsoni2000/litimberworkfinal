<?php
/*
Template Name: Our Company
*/
/** header */
get_header();

/** Welcome */
get_template_part( 'template-parts/parts', 'company-welcome' );

/** Promise */
get_template_part( 'template-parts/parts', 'company-promise' );

/** Servcie Area */
get_template_part( 'template-parts/parts', 'service' );

/** footer */
get_footer();

?>
