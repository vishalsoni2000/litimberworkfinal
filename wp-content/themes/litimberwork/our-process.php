<?php
/*
Template Name: Our Process
*/
/** header */
get_header();

/** Process List */
get_template_part( 'template-parts/parts', 'process-list' );

/** Contact */
get_template_part( 'template-parts/parts', 'contact' );

/** Servcie Area */
get_template_part( 'template-parts/parts', 'service' );

/** footer */
get_footer();

?>
