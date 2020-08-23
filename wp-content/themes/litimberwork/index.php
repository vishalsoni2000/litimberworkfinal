<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

 get_header();

 $page_for_posts = get_option( 'page_for_posts' );

 $postID = get_option('page_for_posts', true);

 echo '<div class="content">'.
		 '<section class="product-listing section-padding position-relative" style="background-image:url('. get_template_directory_uri() .'/images/bg-image.jpg);">'.
         	'<div class="wrapper position-relative">';
                 if (have_posts()) :
                     echo '<div class="post text-center">'.
                         '<h1>' . get_the_title($page_for_posts) . '</h1>'.
                     '</div>' ;

                     get_header('blog');
										 echo '<ul class="products d-flex justify-content-center list-none">';
			                 while ( have_posts()) : the_post();
			                     echo '<li id=" post-' . get_the_ID() . ' " class="cell-3 cell-1024-4 cell-767-6 cell-480-12 p-10 position-relative mb-20 '. join( ' listing-single-post ', get_post_class() ) .'" data-aos="fade-up">' .
													 '<a href="'. get_the_permalink($post->ID) .'" classs="d-block" title="Permanent Link to '. get_the_title($post->ID) .'">'.
			                         (
			                             has_post_thumbnail()
			                             ? '<div class="product-image innbaner image-src position-relative shadow-lg">' .
			                                 wp_image( get_post_thumbnail_id(), 'large' ) .
			                             '</div>'
			                             : ''
			                         ) .
			                         '<h4 class="px-15 font-normal text-center d-block text-white position-absolute mb-0">' . get_the_title() . '</h4>' .
															 '</a>'.
			                     '</li>';
			                 endwhile;wp_reset_query();
										 echo '</ul>';
                 twentynineteen_the_posts_navigation();
                 else :
                     echo '<h2 class="center">Not Found</h2>';
                     echo '<p class="center">Sorry, but you are looking for something that isnt here.</p>';
                     get_search_form();
                 endif;
             echo '</div>'.
         '</section>';

         /** Service */
         get_template_part( 'template-parts/parts', 'service' );
 echo '</div>';

 get_footer();
