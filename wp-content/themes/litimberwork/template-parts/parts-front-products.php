<?php

$all_products = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1, 'orderby' => 'menu_order', 'order' => 'ASC'));

if ($all_products->have_posts()) :
  echo '<section class="products-section section-padding position-relative" style="background-image:url('. get_template_directory_uri() .'/images/bg-image.jpg);">'.
    '<div class="wrapper position-relative">'.
        '<ul class="product-listing list-none d-flex justify-content-center align-items-center">';
            while ( $all_products->have_posts()) : $all_products->the_post();
                echo '<li id=" post-' . get_the_ID() . ' " class="cell-3 p-10 position-relative '. join( ' listing-single-post ', get_post_class($post->ID) ) .'">' .
                  '<a href="'. get_the_permalink($post->ID) .'" classs="d-block" title="Permanent Link to '. get_the_title($post->ID) .'">'.
                    (
                        has_post_thumbnail($post->ID)
                        ? '<div class="product-image innbaner image-src position-relative shadow-lg">' .
                            wp_image( get_post_thumbnail_id(), 'large' ) .
                        '</div>'
                        : ''
                    ) .
                    '<h4 class="px-15 font-normal text-center d-block text-white position-absolute mb-0">'. get_the_title($post->ID) .'</h4>'.
                  '</a>'.
                '</li>';
            endwhile;
            wp_reset_query();
            wp_reset_postdata();
        echo '</ul>';
          $link = get_field('product_button');
            if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';

                echo '<div class="prodcut-button text-center"><a class="read-more white hover-primary" href="'. esc_url( $link_url ) .'" target="'. esc_attr( $link_target ) .'"><span>'. esc_html( $link_title ) .'</span></a></div>';
            endif;
          echo '</div>'.
  '</section>';
endif;

?>
