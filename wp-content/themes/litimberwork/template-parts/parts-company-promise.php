<?php

wp_enqueue_style('company-promise');

if(have_rows('our_promise_section')) {
  while(have_rows('our_promise_section')):the_row();
    echo '<section class="company-promise section-padding position-relative" style="background-image:url('. get_template_directory_uri() .'/images/bg-image.jpg);">'.
        '<div class="wrapper position-relative">'.
              '<div class="d-flex justify-content-center">'.
                  (
                    get_sub_field('our_promise_image')
                    ? '<div class="left-part cell-6 cell-992-8 cell-767-12 pr-15 pr-992-0 pb-992-20">'.
                        '<div class="image shadow-lg">'.
                            wp_image(get_sub_field('our_promise_image'),'large') .
                        '</div>'.
                    '</div>'
                    : ''
                  ) .
                  '<div class="right-part shadow-lg text-center bg-brand-primary pl-15 cell-6 cell-992-12 '. (get_sub_field('our_promise_image') ? 'cell-6 cell-992-12' : 'cell-12') .'">'.
                      (
                          get_sub_field('our_promise_heading')
                          ? '<h2 class="text-white mb-767-10">'. get_sub_field('our_promise_heading') .'</h2>'
                          : ''
                      );
                      if(have_rows('our_promise_content')) {
                          echo '<div class="company-content">';
                              while(have_rows('our_promise_content')):the_row();
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
