<?php

wp_enqueue_style('process-list');

echo '<section class="process-list bg-brand-secondary section-padding">'.
      '<div class="wrapper">';
              if( have_rows('our_process_list') ) {
                  echo '<ul class="mb-0 listing list-none d-flex justify-content-between">';
                  while( have_rows('our_process_list') ):the_row();
                      $title = get_sub_field('our_process_title');
                      $image = get_sub_field('our_process_image');
                      $description = get_sub_field('our_process_description');

                      if ($title) {
                          echo '<li class="cell-5 cell-992-6 cell-640-12 pt-0 text-center">'.
                              '<div class="single-list p-10">'.
                                  '<div class="process-image innbaner image-src">'.
                                      wp_image($image, 'large').
                                  '</div>'.
                                  '<div class="process-content">'.
                                      '<h3 class="h3 pt-10 mb-10">'. $title .'</h3>'.
                                      '<p>'. $description .'</p>'.
                                  '</div>'.
                                '</div>'.
                            '</li>';
                      }
                  endwhile;
                  echo '</ul>';
              }
      echo '</div>'.
'</section>';
?>
