<?php
/**
* @package WordPress
* @subpackage Default_Theme
template name: Contact Page
*/
get_header();

$img_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ));

echo '<section class="banner-top position-relative" style="background-image: url('. ($img_url ? $img_url : get_template_directory_uri() .'/images/default-bg.jpg') .');">'.
    '<div class="wrapper d-flex justify-content-center position-relative text-center align-items-center">';
        while ( have_posts() ) : the_post();
            echo '<div class="banner-content cell-6">'.
                '<h1 class="text-white mb-0 no-border-bottom">' . get_the_title(). '</h1>'.
            '</div>';
        endwhile;
  echo '</div>'.
'</section>';

echo '<section class="contact-form-section position-relative section-padding" style="background-image:url('. get_template_directory_uri() .'/images/bg-image.jpg);">'.
	  '<div class="wrapper position-relative">' .
		   	'<div class="post" id="post-' . get_the_ID() .'">' .
            '<div class="contact-information mb-20 d-flex justify-content-center mb-767-0">'.
                '<div class="contact pr-20 cell-3 cell-992-6 cell-640-12 p-992-10">'.
                    '<div class="detail d-flex text-center align-items-center" data-match-height="1">'.
                      do_shortcode('[location-custom-title]') .
                    '</div>'.
                '</div>'.
                '<div class="contact pr-20 cell-3 cell-992-6 cell-640-12 p-992-10">'.
                    '<div class="detail d-flex text-center align-items-center" data-match-height="1">'.
                      do_shortcode('[location-address]') .
                    '</div>'.
                '</div>'.
                '<div class="contact pr-20 cell-3 cell-992-6 cell-640-12 p-992-10">'.
                    '<div class="detail d-flex text-center align-items-center" data-match-height="1">'.
                      do_shortcode('[location-phone]') .
                    '</div>'.
                '</div>'.
                '<div class="contact cell-3 cell-992-6 cell-640-12 p-992-10">'.
                    '<div class="detail d-flex text-center align-items-center" data-match-height="1">'.
                      do_shortcode('[location-hours]') .
                    '</div>'.
                '</div>'.
            '</div>'.

    				'<div class="entry">';
                echo '<div class="form-section section-padding">'.
                  '<div class="form-heading text-center pb-20 mb-10 pb-767-0">'.
                    (
                        get_field('contact_form_heading')
                        ? '<h2 class="mb-767-10">'. get_field('contact_form_heading') .'</h2>'
                        : ''
                    ) .
                    (
                        get_field('contact_form_description')
                        ? '<p>'. get_field('contact_form_description') .'</p>'
                        : ''
                    ) .
                '</div>';
    					while (have_posts()) : the_post();
    						the_content('<p class="serif">Read the rest of this page &raquo;</p>');
    					endwhile;
    					wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));
              echo '</div>'.
    				'</div>';

  			  	echo '<div class="map-block">' .
					     do_shortcode('[location-map]') .
						'</div>' .
      '</div>'.
   '</div>'.
'</section>';
get_footer();
?>
