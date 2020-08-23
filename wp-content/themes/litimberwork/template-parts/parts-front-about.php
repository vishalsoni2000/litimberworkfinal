<?php

if(have_rows('about_section')) {
  while(have_rows('about_section')):the_row();
    echo '<section class="about-section section-padding position-relative" style="background-image:url('. get_template_directory_uri() .'/images/bg-image.jpg);">'.
        '<div class="wrapper position-relative">'.
              '<div class="d-flex justify-content-center">'.
                  (
                    get_sub_field('about_image')
                    ? '<div class="left-part cell-6 cell-992-8 cell-767-12 pr-15 pr-992-0 pb-992-20" data-aos="fade-right">'.
                        '<div class="image shadow-lg">'.
                            wp_image(get_sub_field('about_image'),'large') .
                        '</div>'.
                    '</div>'
                    : ''
                  ) .
                  '<div class="right-part shadow-lg text-center bg-brand-primary pl-15 '. (get_sub_field('about_image') ? 'cell-6 cell-992-12' : 'cell-12') .'" data-aos="fade-left">';
                      if(have_rows('about_content')) {
                          echo '<div class="about-content">';
                              while(have_rows('about_content')):the_row();
                                echo '<p>'. get_sub_field('content') .'</p>';
                              endwhile;
                            }
                  echo '</div>'.
                    '</div>'.
              '</div>'.
        '</div>'.
    '</section>';
  endwhile;
}

?>
