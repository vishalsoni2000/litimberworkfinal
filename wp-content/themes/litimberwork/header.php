<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>  >
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <link rel="profile" href="https://gmpg.org/xfn/11" />
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

       <?php
       /** mobile navigation */
       if( my_wp_is_mobile() == 1 ) {

           echo '<div class="mobile_menu d-none">' .
                '<a class="close-btn" href="#"></a>' .
                '<div class="inner">' .
                    main_navigation() .
                '</div>' .
           '</div>';
       }
       ?>

        <div id="wrapper">

            <?php
                /** Brand Logo Function Start */
                function brand_logo() {
                    ob_start();
                    if( has_custom_logo() ){
                        $desktopBrandLogoID = get_theme_mod( 'custom_logo' ); //Desktop Main brand Logo ID
                        $desktopBrandLogoImage = wp_get_attachment_image( $desktopBrandLogoID , 'large', '', ["class" => "large-logo transition"] ); //Desktop Main brand Logo Image
                        echo '<div class="header-logo position-relative height-auto transition twidth">' .
                            '<a href="' . get_option('home') . '" class="cell-12 transition position-relative">' .
                                ( $desktopBrandLogoID ? $desktopBrandLogoImage : '' ) .
                              '</a>' .
                        '</div>';
                    }
                    return ob_get_clean();
                }
                /** Brand Logo Function End */

                /** Call Button Function Start */
				function call_buttton() {
                    ob_start();
                    if (get_field('header_phone_number', 'options')) {
                    $total = count(get_field('header_phone_number', 'options'));
                    echo '<li class="call position-relative m-0 p-0 ">';
                        $i = 1;
                        while (have_rows('header_phone_number', 'options')): the_row();
                        global $callIcon;
                        echo (
                            $total == 1
                            ? '<a href="tel:' . preg_replace('/[^0-9]/', '', get_sub_field('tel_tag', 'options') ) . '" class=" one position-relative"><span class="call-icon">' . $callIcon . '</span>' . '<span class="call-us-text">' . get_field('phone_cta_text', 'options') . '</span>' . '</a>'
                            : (
                                $i == 1
                                ? '<a href="#" class="calldd position-relative"><span class="call-icon">'. $callIcon .'</span><span>' . get_field('phone_cta_text', 'options') . '</span></a>' .
                                    '<ul class="callddlist quick-dropdown block-hide position-absolute">'
                                : ''
                            ) .
                            '<li class="' . $i . '"><a href="tel:' . preg_replace('/[^0-9]/', '', get_sub_field('tel_tag', 'options') ) . '" class="one d-block"><span> ' . get_sub_field('phone_number', 'options') . '</span></a></li>' .
                            ( $i == $total ? '</ul>' : '' )
                        );
                        $i++;
                        endwhile;
                    echo '</li>';
                    }
                    return ob_get_clean();
                }
                /** Call Button Function End */
				
                echo '<header class=" d-block cell-12 transition top-header">' .
					'<div class="wrapper d-flex align-items-center justify-content-between">' .
                   brand_logo() .
                    '<div class="quick-links d-flex justify-content-end cell-12 height-auto">'.
                        '<ul class="contact-links d-flex align-items-center justify-content-end m-0 p-0 list-none ">'.
                           /* call */
                           call_buttton() .
                        '</ul>'.
												social_media_options() .
                       '<a class="navbar-toggle" href="javascript:void(0)"><span class="navbar-toggle__icon-bar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </span> </a>'.
                    '</div>' .
                '</div>' .
					'</header>'.
				'<header id="myHeader" class=" d-block cell-12 transition">' .
                
                (
                    my_wp_is_mobile() === false
                    ? '<div class="main-navigation cell-12 height-auto d-block position-relative pt-30 transition">' .
                        '<div class="wrapper">'.
                          (
                              has_nav_menu( 'main-navigation' )
                              ? '<nav id="site-navigation" class="" aria-label="' . esc_attr( 'Top Menu', 'twentynineteen' ) . '">' .
                                main_navigation() .
                             '</nav>'
                              : ''
                          ) .
                        '</div>'.
                    '</div>'
                    : ''
                ) .
            '</header>' .

            '<div id="content-area">';
