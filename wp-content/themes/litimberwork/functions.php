<?php
/**
 * Twenty Nineteen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

/**
 * Twenty Nineteen only works in WordPress 4.7 or later.
 */

include ('svg-icons.php');

if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Fire on the initialization of WordPress.
 */
function the_dramatist_fire_on_wp_initialization() {
    /** to detect mobile  */
    function my_wp_is_mobile() {

        static $is_mobile;

        if ( isset($is_mobile) )
            return $is_mobile;

        if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
            $is_mobile = false;
        } elseif (
            strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
            || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
            || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
            || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
            || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false ) {
                $is_mobile = true;
        } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') == false) {
                $is_mobile = true;
        } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false) {
            $is_mobile = false;
        } else {
            if (preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false)) {
              $is_mobile = 'ie11';
          } else {
              $is_mobile = false;
          }
        }
        return $is_mobile;
    }
}
add_action( 'init', 'the_dramatist_fire_on_wp_initialization' );


function wp_IE_detection_function(){
    function my_wp_is_IE() {
        if( wp_is_mobile() ){
        } else {
            static $is_IE;
            if ( isset($is_IE) )
                return $is_IE;
            if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
                $is_IE = false;
            } elseif (
                strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
                || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
                || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
                || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
                || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false ) {
                    $is_IE = false;
            } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') == false) {
                    $is_IE = false;
            } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false) {
                $is_IE = false;
            } else {
                if (preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false)) {
                  $is_IE = 'ie11';
              } else {
                  $is_IE = false;
              }
            }
            return $is_IE;
        }
    }
}
add_action( 'init', 'wp_IE_detection_function' );




/** placeholder image function */
function placeholder_image($attr = ''){
	ob_start();
	echo '<img class="' . ( my_wp_is_IE() == 'ie11' ? ' skip-lazy ' : '' ) . '" src="' . get_template_directory_uri() .'/images/placeholder-image.jpg" alt="' . wp_strip_all_tags( $attr ) . '" />';
	return ob_get_clean();
}


/** wp image function */
function wp_image($id = '', $size = 'large', $classes = '' ){
	ob_start();
    if( my_wp_is_IE() == 'ie11' ){
        echo wp_get_attachment_image( $id, $size, '', array( "class" => " attachment-$size size-$size $classes skip-lazy" ) );
    } else {
        echo wp_get_attachment_image( $id, $size, '', array( "class" => "attachment-$size size-$size $classes" ) );
    }
	return ob_get_clean();
}


function google_font_load_function() { ?>
    <script>
        WebFontConfig = {
            google: { families: [ 'Montserrat:wght@300;400;500;600;700;800;900' ] }
        };

        (function() {
            var wf = document.createElement('script');
            wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>
<?php
}
add_action('wp_footer','google_font_load_function');


if ( ! function_exists( 'twentynineteen_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function twentynineteen_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Nineteen, use a find and replace
		 * to change 'twentynineteen' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'twentynineteen', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		// This theme uses wp_nav_menu() in two locations.

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus(
        array(
            'main-navigation' => __( 'Primary', 'twentynineteen' ),
        )
    );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
          'flex-width'  => false,
          'flex-height' => false,
      )
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'twentynineteen_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentynineteen_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Footer Menu', 'twentynineteen' ),
			'id'            => 'footer-menu',
			'description'   => __( 'Appears in the footer of the site.', 'twentynineteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title text-brand-secondary mb-10 text-992-center">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Instagram Area', 'twentynineteen' ),
			'id'            => 'footer-instagram',
			'description'   => __( 'Appears in the footer of the site.', 'twentynineteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title text-brand-secondary mb-10">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Facebook Area', 'twentynineteen' ),
			'id'            => 'footer-facebook',
			'description'   => __( 'Appears in the footer of the site.', 'twentynineteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title text-brand-secondary mb-10">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'twentynineteen_widgets_init' );


/** footer navigation */
function footer_navigation() {
    ob_start();

    if ( is_active_sidebar( 'footer-menu' ) ) {
        dynamic_sidebar( 'footer-menu' );
    }

    return ob_get_clean();
}
add_shortcode('footer-navigation', 'footer_navigation');

/** footer navigation */
function footer_facebook() {
    ob_start();

    if ( is_active_sidebar( 'footer-facebook' ) ) {
        dynamic_sidebar( 'footer-facebook' );
    }

    return ob_get_clean();
}
add_shortcode('footer-facebook', 'footer_facebook');

/** footer navigation */
function footer_instagram() {
    ob_start();

    if ( is_active_sidebar( 'footer-instagram' ) ) {
        dynamic_sidebar( 'footer-instagram' );
    }

    return ob_get_clean();
}
add_shortcode('footer-instagram', 'footer_instagram');
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function twentynineteen_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'twentynineteen_content_width', 640 );
}
add_action( 'after_setup_theme', 'twentynineteen_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function twentynineteen_scripts() {
	wp_enqueue_style( 'twentynineteen-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	wp_style_add_data( 'twentynineteen-style', 'rtl', 'replace' );

	if ( has_nav_menu( 'menu-1' ) ) {
		wp_enqueue_script( 'twentynineteen-priority-menu', get_theme_file_uri( '/js/priority-menu.js' ), array(), '20181214', true );
		wp_enqueue_script( 'twentynineteen-touch-navigation', get_theme_file_uri( '/js/touch-keyboard-navigation.js' ), array(), '20181231', true );
	}

	wp_enqueue_style( 'twentynineteen-print-style', get_template_directory_uri() . '/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'general-script', get_theme_file_uri( '/js/general.js' ), array(), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'masonry-script', get_theme_file_uri( '/js/masonry.pkgd.min.js' ), array(), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'imagesloaded-script', get_theme_file_uri( '/js/imagesloaded.pkgd.min.js' ), array(), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'aos-script', get_theme_file_uri( '/js/aos.js' ), array(), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'wp_enqueue_scripts', 'twentynineteen_scripts' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function twentynineteen_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'twentynineteen_skip_link_focus_fix' );

/**
 * Enqueue supplemental block editor styles.
 */
function twentynineteen_editor_customizer_styles() {

	wp_enqueue_style( 'twentynineteen-editor-customizer-styles', get_theme_file_uri( '/style-editor-customizer.css' ), false, '1.1', 'all' );

	if ( 'custom' === get_theme_mod( 'primary_color' ) ) {
		// Include color patterns.
		require_once get_parent_theme_file_path( '/inc/color-patterns.php' );
		wp_add_inline_style( 'twentynineteen-editor-customizer-styles', twentynineteen_custom_colors_css() );
	}
}
add_action( 'enqueue_block_editor_assets', 'twentynineteen_editor_customizer_styles' );

/**
 * Display custom color CSS in customizer and on frontend.
 */
function twentynineteen_colors_css_wrap() {

	// Only include custom colors in customizer or frontend.
	if ( ( ! is_customize_preview() && 'default' === get_theme_mod( 'primary_color', 'default' ) ) || is_admin() ) {
		return;
	}

	require_once get_parent_theme_file_path( '/inc/color-patterns.php' );

	$primary_color = 199;
	if ( 'default' !== get_theme_mod( 'primary_color', 'default' ) ) {
		$primary_color = get_theme_mod( 'primary_color_hue', 199 );
	}
	?>

	<style type="text/css" id="custom-theme-colors" <?php echo is_customize_preview() ? 'data-hue="' . absint( $primary_color ) . '"' : ''; ?>>
		<?php echo twentynineteen_custom_colors_css(); ?>
	</style>
	<?php
}
add_action( 'wp_head', 'twentynineteen_colors_css_wrap' );

/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-twentynineteen-svg-icons.php';

/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/classes/class-twentynineteen-walker-comment.php';

/**
 * Common theme functions.
 */
require get_template_directory() . '/inc/helper-functions.php';

/**
 * SVG Icons related functions.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/* ACF Options page Multiple choices */
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' 	=> 'Theme General Options',
        'menu_title'	=> 'Theme options',
        'menu_slug' 	=> 'theme-general-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Header Options',
        'menu_title'	=> 'Header',
        'parent_slug'	=> 'theme-general-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Footer Options',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'theme-general-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Social Options',
        'menu_title'	=> 'Social',
        'parent_slug'	=> 'theme-general-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme 404 Options',
        'menu_title'	=> '404',
        'parent_slug'	=> 'theme-general-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme General Options',
        'menu_title'	=> 'General',
        'parent_slug'	=> 'theme-general-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Home Slider',
        'menu_title'	=> 'Home Slider',
        'parent_slug'	=> 'theme-general-options',
    ));
}

/** Social Media Function Start */
function social_media_options(){
    ob_start();
    global $facebook;
    global $insta;
    global $twitter;
    global $youtube;
    global $linkedin;
    global $yelp;
    if( have_rows('social_media', 'options') ){
        echo '<div class="socialmedialinks"><ul class="justify-content-start">';
            while ( have_rows('social_media', 'options')) : the_row();
            $icon = get_sub_field('social_media_name', 'options');
            echo '<li class="p-0">' .
                    '<a href="' . get_sub_field('social_media_link', 'options') . '" target="_blank" class="' . get_sub_field('social_media_name', 'options') . '">';
                        if($icon == "Facebook"){
                            echo $facebook;
                        } else if($icon == "Insta") {
                            echo $insta;
                        } else if($icon == "Twitter") {
                            echo $twitter;
                        } else if($icon == "Youtube") {
                            echo $youtube;
                        } else if($icon == "Linkedin") {
                            echo $linkedin;
                        } else if($icon == "Yelp") {
                            echo $yelp;
                        }
                    echo '</a>' .
                '</li>';
            endwhile;
        echo '</ul></div>';
    }
    return ob_get_clean();
}
/** Social Media Function End */


/** main navigation */
function main_navigation() {
    ob_start();
    wp_nav_menu(
        array(
            'theme_location' => 'main-navigation',
            'menu_class' => 'nav_menu',
        )
    );
    return ob_get_clean();
}

/* site url for terms of use and privacy policy page */
function siteUrlFunction(){
	$siteUrlHtml = '<a class="link" href="' . site_url() . '">' . get_bloginfo( 'name' ) . '</a>';
	return $siteUrlHtml;
}
add_shortcode('site-url', 'siteUrlFunction');

/* site name for terms of use and privacy policy page */
function siteNameFunction(){
	$siteNameHTML = get_bloginfo( 'name' );
	return $siteNameHTML;
}
add_shortcode('site-name', 'siteNameFunction');

/** svg file upload permission */
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


/**
 * Enqueue scripts and styles.
 */
function site_styles() {
	wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap', array(), wp_get_theme()->get( 'Version' ) );
	if( is_front_page() ){
	        wp_enqueue_style( 'litimberwork-style', get_template_directory_uri() . '/assets/css/style.css' , array(), wp_get_theme()->get( 'Version' ) );
	    } else {
	        wp_enqueue_style( 'litimberwork-style', get_template_directory_uri() . '/assets/css/inner-styles.css' , array(), wp_get_theme()->get( 'Version' ) );
	    }
	    wp_style_add_data( 'litimberwork-style', 'rtl', 'replace' );
			wp_register_style( 'parts-service', get_theme_file_uri() . '/assets/css/parts-service.css' );
			wp_register_style( 'parts-our-work', get_theme_file_uri() . '/assets/css/parts-our-work.css' );
			wp_register_style( 'parts-contact', get_theme_file_uri() . '/assets/css/parts-contact.css' );
			wp_register_style( 'process-list', get_theme_file_uri() . '/assets/css/parts-process-list.css' );
			wp_register_style( 'company-promise', get_theme_file_uri() . '/assets/css/parts-company-promise.css' );
			wp_register_style( 'company-welcome', get_theme_file_uri() . '/assets/css/parts-company-welcome.css' );
			wp_enqueue_style( 'aos-css', get_theme_file_uri() . '/assets/css/aos.css' , array(), wp_get_theme()->get( 'Version' ));

}
add_action( 'wp_enqueue_scripts', 'site_styles' );


function site_script() {
    wp_enqueue_script('jquery');
    wp_script_add_data( 'jquery', 'rtl', 'replace' );
    wp_enqueue_script( 'slick-script', get_theme_file_uri() . '/js/slick.min.js', array(), wp_get_theme()->get( 'Version' ) , true );
    wp_enqueue_script( 'matchheight-script', get_theme_file_uri() . '/js/jquery.matchheight.min.js', array(), wp_get_theme()->get( 'Version' ) , true );
    wp_enqueue_script( 'fancy-script', get_theme_file_uri() . '/js/jquery.fancybox.min.js', array(), wp_get_theme()->get( 'Version' ) , true );
    wp_enqueue_script( 'general-script', get_theme_file_uri() . '/js/general.js', array(), wp_get_theme()->get( 'Version' ) , true );
    wp_register_script( 'home-banner-script', get_theme_file_uri() . '/js/home-banner-functions.js', array(), wp_get_theme()->get( 'Version' ) , true );
}
add_action( 'wp_enqueue_scripts', 'site_script' );


/** stop autoupdate wp-scss plugin  */
function my_filter_plugin_updates( $value ) {
   if( isset( $value->response['WP-SCSS-1.2.4/wp-scss.php'] ) ) {
      unset( $value->response['WP-SCSS-1.2.4/wp-scss.php'] );
    }
    return $value;
 }
 add_filter( 'site_transient_update_plugins', 'my_filter_plugin_updates' );


 /** location map function will display map or custom map in footer, contact page, location single page */
  function locationMap(){
      ob_start();
      if( get_field( 'address_map_iframe' ,'options') ){
          echo '<div class="location-map cell-12">' .
              get_field( 'address_map_iframe' ,'options') .
          '</div>' ;
      }
      return ob_get_clean();
  }
  add_shortcode('location-map', 'locationMap');


	 /** Location Custom Title */
	function locationCustomTitle(){
	    ob_start();
	        $customTitle = get_field('location_title','options');
	        if( $customTitle ){
	            echo '<h5><a href="' . get_field('location_map_link','options') . '" target="_blank">' . $customTitle . '</a></h5>';
	        }
	    return ob_get_clean();
	}
	add_shortcode('location-custom-title', 'locationCustomTitle');

	/** Location address */
	function locationAddress(){
	    ob_start();
	        $locationAddress = get_field('location_address','options');
	        $locationMapLink = get_field('location_map_link','options');
	        if( $locationAddress ){
	            echo '<p data-match-height="loc-address" ><a href="'. $locationMapLink .'" target="_blank">' . $locationAddress . '</a></p>';
	        }
	    return ob_get_clean();
	}
	add_shortcode('location-address', 'locationAddress');

	/** Location Phone Number */
	function locationPhoneNumber(){
	    ob_start();
	        $locationPhoneNumber = get_field('location_phone','options');
	        if( $locationPhoneNumber ){
	            echo '<p class="call mb-0"><a href="tel:' . preg_replace('/[^0-9]/', '', $locationPhoneNumber ) . '">' . $locationPhoneNumber . '</a></p>';
	        }
	    return ob_get_clean();
	}
	add_shortcode('location-phone', 'locationPhoneNumber');


	function locationHours() {
	    ob_start();
	    $locationWorkingHours = get_field('location_hours','options');
	    if( $locationWorkingHours ){
	        echo '<p class="mb-0">' . $locationWorkingHours . '</p>';
	    }
	    return ob_get_clean();
	}
	add_shortcode('location-hours', 'locationHours');
