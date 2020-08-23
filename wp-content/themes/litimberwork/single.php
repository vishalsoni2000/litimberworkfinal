<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */
 get_header();

 global $contentBanner;
 $postID = get_option('page_for_posts', true);
$current_id = get_the_ID($postID);

echo '<div class="content">'.
		// product top details
 	   '<section class="product-details-top section-padding position-relative border-bottom">';
 	       		if (have_posts()) :
 	            while (have_posts()) : the_post(); ?>
 	             	<div <?php post_class(); ?> id="post-<?php echo get_the_ID(); ?>'">
 	             		<?php
										echo '<div class="wrapper d-flex">'.
												'<div class="product-content text-992-center '. (get_field('full_width_banner_or_not') == 'No' ? ' cell-6 cell-992-12' : 'cell-12 text-center') .'" data-aos="fade-right">'.
														'<h1 class="d-inline-block">' . get_the_title() . '</h1>'.
															 get_the_content('<p class="serif">Read the rest of this entry </p>');

                               $link = get_field('single_product_button');
                              if( $link ) {
                                  $link_url = $link['url'];
                                  $link_title = $link['title'];
                                  $link_target = $link['target'] ? $link['target'] : '_self';

                                  echo '<a class="read-more" href="'. esc_url( $link_url ) .'" target="'. esc_attr( $link_target ) .'"><span>'. esc_html( $link_title ) .'</span></a>';
                                }
															 wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));
															 the_tags( '<p>Tags: ', ', ', '</p>');
											 echo '</div>'.
											'</div>'.
                         (
                             has_post_thumbnail() && (get_field('full_width_banner_or_not') == 'No')
                             ? '<div class="product-image position-absolute pin-t pin-r d-992-none">' .
														 		'<div class="innbaner image-src">'.
                                 		wp_image( get_post_thumbnail_id(), 'large' ) .
																'</div>'.
                             '</div>'
                             : ''
                         ) .
								'</div>';
 	            endwhile;
							else :
 	            	echo '<p>Sorry, no posts matched your criteria.</p>';
 	            endif;
 	    echo '</section>';

			// product bottom details
      if( ! is_single( 141 ) ) {
			if(have_rows('product_details')) {
						while(have_rows('product_details')):the_row();
                if(get_sub_field('product_image') || have_rows('product_description') || get_sub_field('product_button') ) {
                echo '<section class="product-details-bottom section-padding position-relative">';
										echo (
                            get_sub_field('product_image')
                            ? '<div class="product-image position-absolute pin-t pin-l">' .
                               '<div class="innbaner image-src">'.
                                   wp_image( get_sub_field('product_image'), 'large' ) .
                               '</div>'.
                            '</div>'
                            : ''
                        ) .
                      '<div class="wrapper d-flex justify-content-end">'.
												'<div class="product-content text-992-center pb-992-15 '. (get_sub_field('product_image') ? ' cell-6 cell-992-12' : 'cell-12') .'" data-aos="fade-left">'.
														(
																get_sub_field('product_detail_heading')
																? '<h3 class="h3 d-inline-block mb-992-10">'. get_sub_field('product_detail_heading') .'</h3>'
																: ''
														);
														if(have_rows('product_description')) {
															echo '<ul class="list-none">';
																while(have_rows('product_description')):the_row();
																		echo '<li><p>'. get_sub_field('content') .'</p></li>';
																endwhile;
															echo '</ul>';
														}
                            echo '<div class="buttons d-block text-center">';
														echo (
																	get_sub_field('product_button')
																	? '<h4 class="mb-0767-10 pt-10">'. get_sub_field('product_button_heading') .'</h4>'
																	: ''
															);
															$link = get_sub_field('product_button');
															if( $link ):
															    $link_url = $link['url'];
															    $link_title = $link['title'];
															    $link_target = $link['target'] ? $link['target'] : '_self';

															    echo '<a class="read-more" href="'. esc_url( $link_url ) .'" target="'. esc_attr( $link_target ) .'"><span>'. esc_html( $link_title ) .'</span></a>';
															endif;
                              echo '</div>'.
												'</div>'.
										'</div>' ;
				echo '</section>';
        }
      endwhile;
			}
    }

      // product image
      if(have_rows('product_repeater')) {
        echo '<section class="product-images">'.
          '<div class="wrapper">'.
            '<ul class="list-none d-flex justify-content-center mb-0">';
          while(have_rows('product_repeater')):the_row();
              $product_image = get_sub_field('product_image');

              echo '<li class="cell-6 pt-0 p-15 p-767-10 cell-568-12">'. wp_image($product_image, 'large') .'</li>';
          endwhile;
          echo '</ul>'.
          '</wrapper>'.
        '</section>';
      }


      // product image end

			/** Our Work */
			get_template_part( 'template-parts/parts', 'our-work' );


			// Product Listing
			$all_products = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1));

			if ($all_products->have_posts()) :
			  echo '<section class="product-listing section-padding position-relative" style="background-image:url('. get_template_directory_uri() .'/images/bg-image.jpg);">'.
			    '<div class="wrapper position-relative">'.
							'<h2 class="text-center">Other Products</h2>'.
			        '<ul class="listing list-none d-flex justify-content-center align-items-center">';
			            while ( $all_products->have_posts()) : $all_products->the_post();

			                echo '<li id=" post-' . get_the_ID() . ' " class="cell-3 cell-1024-4 cell-767-6 cell-480-12 p-10 position-relative '. ( $current_id==$post->ID ? 'current_post ' : '' ) . join( ' listing-single-post ', get_post_class($post->ID) ) .'" data-aos="fade-up">' .
			                  '<a href="'. get_the_permalink($post->ID) .'" classs="d-block shadow-lg" title="Permanent Link to '. get_the_title($post->ID) .'">'.
                          '<div class="product-image innbaner image-src position-relative shadow-lg">' .
  			                    (
  			                        has_post_thumbnail($post->ID)
  			                        ? wp_image( get_post_thumbnail_id(), 'large' )
  			                        : placeholder_image()
  			                    ) .
                          '</div>'.
			                    '<h4 class="px-15 font-normal text-center d-block text-white position-absolute mb-0">'. get_the_title($post->ID) .'</h4>'.
			                  '</a>'.
			                '</li>';
			            endwhile;
			            wp_reset_query();
			            wp_reset_postdata();
			        echo '</ul>'.
			        '</div>'.
			  '</section>';
			endif;
			// end product listing

 echo '</div>';


 get_footer();
