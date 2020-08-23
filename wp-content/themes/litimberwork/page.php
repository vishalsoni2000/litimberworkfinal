<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

 get_header();

 $img_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ));

 // echo '<section class="banner-top position-relative" style="background-image: url('. ($img_url ? $img_url : get_template_directory_uri() .'/images/default-bg.jpg') .');">'.
 //     '<div class="wrapper d-flex justify-content-center position-relative text-center align-items-center">';
 //         while ( have_posts() ) : the_post();
 //             echo '<div class="banner-content cell-6">'.
 //                 '<h1 class="text-white mb-0 no-border-bottom">' . get_the_title(). '</h1>'.
 //             '</div>';
 //         endwhile;
 //   echo '</div>'.
 // '</section>';

 echo '<div class="content">'.
 		'<div class="section-padding">'.
	 		'<div class="wrapper">' .
	 				'<div class="post" id="post-' . get_the_ID() .'">';
		 					if (have_posts()) : while (have_posts()) : the_post();
		 						echo '<div class="entry">' .
                  '<div class="banner-content cell-6">'.
                      '<h1 class="no-border-bottom">' . get_the_title(). '</h1>'.
                  '</div>'.
		 							get_the_content();
		 							wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));
			 						echo '</div>';
		 					   endwhile;
		 						wp_reset_query();
					 		endif;
	 					edit_post_link('Edit this entry.', '<p>', '</p>');
	 				echo '</div>'.
					'</div>'.
 		'</div>';

 get_footer();
