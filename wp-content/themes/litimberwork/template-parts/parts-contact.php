<?php

wp_enqueue_style('parts-contact');

echo '<section class="contact-us bg-brand-primary text-992-center">'.
    '<div class="wrapper">'.
        '<div class="d-flex justify-content-around align-items-center">'.
            '<div class="contact-heading cell-8 cell-992-12 pb-992-15">'.
                (
                    get_field('contact_us_heading','options')
                    ? '<h5 class="text-white mb-0">'. get_field('contact_us_heading','options') .'</h5>'
                    : ''
                ) .
            '</div>'.
            '<div class="contact-button cell-3 cell-992-12">';
                $link = get_field('contact_us_button','options');
                if( $link ) {
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';

                    echo '<a class="read-more white hover-secondary" href="'. esc_url( $link_url ) .'" target="'. esc_attr( $link_target ) .'"><span>'. esc_html( $link_title ) .'</span></a>';
                  }
            echo '</div>'.
        '</div>'.
    '</div>'.
'</section>';


?>
