<?php

wp_enqueue_style('company-welcome');

if (have_posts()) : while (have_posts()) : the_post();
echo '<section class="company-welcome section-padding bg-brand-secondary position-relative">'.
      '<div class="wrapper">'.
          '<div class="d-flex">'.
              '<div class="welcome-content border-bottom text-center '. (has_post_thumbnail() ? 'cell-6 cell-992-12' : 'cell-12') .'">'.
                  '<h1>' . get_the_title() . '</h1>'.
                  '<p>' . get_the_content() . '</p>';
                  $link = get_field('our_company_button');
                  if( $link ) {
                      $link_url = $link['url'];
                      $link_title = $link['title'];
                      $link_target = $link['target'] ? $link['target'] : '_self';

                      echo '<a class="read-more" href="'. esc_url( $link_url ) .'" target="'. esc_attr( $link_target ) .'"><span>'. esc_html( $link_title ) .'</span></a>';
                    }
            echo '</div>'.
          '</div>'.
      '</div>'.
      (
          has_post_thumbnail()
          ? '<div class="welcome-image position-absolute pin-t pin-r d-992-none">'.
              '<div class="innbaner image-src">'.
                  get_the_post_thumbnail() .
              '</div>'.
          '</div>'
          : ''
      ) .
'</section>';
endwhile;
wp_reset_query();
endif;
?>
