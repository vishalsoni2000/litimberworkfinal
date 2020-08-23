<?php
wp_enqueue_style('parts-service');

echo '<section class="service-section bg-brand-secondary section-padding">'.
  '<div class="wrapper d-flex justify-content-center align-items-center position-relative">'.
      '<div class="left-part text-center '. (get_field('service_area_image','options') ? 'cell-6 cell-992-12' : 'cell-12') .'">'.
          (
              get_field('service_area_heading','options')
              ? '<h2 class="mb-767-10">'. get_field('service_area_heading','options') .'</h2>'
              : ''
          ) .
          (
              get_field('service_area_content','options')
              ? '<p>'. get_field('service_area_content','options') .'</p>'
              : ''
          ) .
      '</div>'.
      (
          get_field('service_area_image','options')
          ? '<div class="right-part cell-6">'.
            wp_image(get_field('service_area_image','options')) .
          '</div>'
          : ''
      ) .
  '</div>'.
'</section>';

?>
