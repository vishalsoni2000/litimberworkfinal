<?php
wp_enqueue_style('parts-our-work');

echo '<section class="our-work-section bg-brand-secondary text-center section-padding">'.
  '<div class="wrapper">'.
    '<div class="work-headings">'.
        (
            get_field('work_heading','options')
            ? '<h2 class="mb-767-10">'. get_field('work_heading','options') .'</h2>'
            : ''
        ) .
        (
            get_field('work_description','options')
            ? '<p>'. get_field('work_description','options') .'</p>'
            : ''
        ) .
      '</div>'.
      '<div class="work-images grid">';
          if(have_rows('work_images','options')) {
              while(have_rows('work_images','options')):the_row();
                echo '<div class="image-block grid-item">'.
                    wp_image(get_sub_field('image','options')) .
                '</div>';
              endwhile;
          }
      echo '</div>';
      $link = get_field('work_button','options');
      if(get_field('work_button','options')) {
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';

            echo '<div class="work-button text-center">'.
                  '<h3 class="mb-767-10">'. get_field('work_button_tagline','options') .'</h3>'.
                  '<a class="read-more" href="'. esc_url( $link_url ) .'" target="'. esc_attr( $link_target ) .'"><span>'. esc_html( $link_title ) .'</span></a>'.
              '</div>';
      }
  echo '</div>'.
'</section>';

?>
