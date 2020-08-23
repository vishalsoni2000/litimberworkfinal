<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

?>

	</div><!-- #content -->
<?php
	echo '<footer class="site-footer position-relative" style="background-image:url('. get_template_directory_uri() .'/images/footer-bg.jpg);">'.
				'<div class="wrapper position-relative">'.
						'<div class="footer-top d-flex justify-content-center pb-20 pb-992-0">'.
								'<div class="left-part cell-6 cell-992-12 d-flex justify-content-center pr-15 pr-992-0 pb-992-20">'.
										'<div class="contact-part cell-6 cell-480-12 pr-15 pr-480-0 pb-480-20 text-992-center">'.
												(
														get_field('location_address','options')
														? '<div class="footer-details">'.
																'<h4 class="text-brand-secondary mb-10">Contact</h4>'.
																do_shortcode('[location-custom-title]') .
																do_shortcode('[location-address]') .
																'<span class="d-block p-5"></span>'.
																do_shortcode('[location-phone]') .
																'<span class="d-block p-5"></span>'.
																do_shortcode('[location-hours]') .
														'</div>'
														: ''
												) .
										'</div>'.
										'<div class="footer-menu cell-6 cell-480-12">'.
												do_shortcode('[footer-navigation]') .
										'</div>'.
								'</div>'.
								'<div class="right-part cell-6 cell-992-12 d-flex justify-content-center">'.
										'<div class="cell-6 cell-480-12 pr-10 pr-480-0 pb-480-15">'.
												do_shortcode('[footer-instagram]') .
										'</div>'.
										'<div class="cell-6 cell-480-12 pl-10 pl-480-0">'.
												do_shortcode('[footer-facebook]') .
										'</div>'.
								'</div>'.
						'</div>'.
						'<div class="footer-bottom copyright-block pt-20 pb-20 text-center">' .
		            (
		                get_field('copyright', 'options')
		                ? '<div class="copyright pt-992-10">&copy;' . ' ' . do_shortcode("[site-name]") . ' ' .  date("Y") . ' | ' . get_field('copyright', 'options') . '</div>'
		                : ''
		            ) .
			    '</div>' .
			'</div>'.
	'</footer>';
	?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
