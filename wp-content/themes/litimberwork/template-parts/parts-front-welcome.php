<?php

if (have_posts()) : while (have_posts()) : the_post();
echo '<section class="welcome-section section-padding bg-brand-secondary position-relative">'.
      '<div class="wrapper">'.
          '<div class="welcome-content text-center">'.
              '<h1>' . get_the_title() . '</h1>'.
              '<p>' . get_the_content() . '</p>';
              $link = get_field('welcome_button');
              if( $link ) {
                  $link_url = $link['url'];
                  $link_title = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_self';

                  echo '<a class="read-more" href="'. esc_url( $link_url ) .'" target="'. esc_attr( $link_target ) .'"><span>'. esc_html( $link_title ) .'</span></a>';
                }
        echo '</div>'.
      '</div>'.
'</section>';
endwhile;
wp_reset_query();
endif;
?>
