<?php
/**
 * ===================================================================
 * THEME FUNCTIONS FILE (functions.php)
 * ===================================================================
 * This file controls:
 * - CSS & JS loading
 * - Theme features
 * - Menus
 * - Widgets
 * - Security
 * - Custom Post Types
 * - REST API
 * - Login customization
 * - Performance
 * ===================================================================
 */


/* ==========================================================
   1️⃣ LOAD CSS & JS FILES PROPERLY
   ========================================================== */
function theme_assets() {

    // ✅ MAIN STYLESHEET
    wp_enqueue_style(
        'main-style',                                 // Unique name
        get_stylesheet_uri(),                         // style.css
        array(),                                      // Dependencies
        time()                                        // Version (auto refresh)
    );

    // ✅ CUSTOM CSS FILE
    wp_enqueue_style(
        'custom-style',
        get_template_directory_uri() . '/css/style.css',
        array(),
        time()
    );

    // ✅ JQUERY (BUILT-IN WORDPRESS)
    wp_enqueue_script('jquery');

    // ✅ MAIN JAVASCRIPT FILE
    wp_enqueue_script(
        'main-js',
        get_template_directory_uri() . '/js/main.js',
        array('jquery'),
        time(),
        true                                          // Load in footer
    );
}
add_action('wp_enqueue_scripts', 'theme_assets');



/* ==========================================================
   2️⃣ ENABLE IMPORTANT THEME FEATURES
   ========================================================== */
function theme_setup() {

    // ✅ Enable dynamic <title>
    add_theme_support('title-tag');

    // ✅ Enable featured images
    add_theme_support('post-thumbnails');

    // ✅ Enable custom logo
    add_theme_support('custom-logo');

    // ✅ Enable HTML5 support
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'gallery'
    ));

    // ✅ Enable full block editor
    add_theme_support('align-wide');
}
add_action('after_setup_theme', 'theme_setup');



/* ==========================================================
   3️⃣ REGISTER NAVIGATION MENUS
   ========================================================== */
function theme_menus() {
    register_nav_menus(array(
        'main-menu'   => __('Main Menu'),
        'footer-menu' => __('Footer Menu'),
    ));
}
add_action('init', 'theme_menus');



/* ==========================================================
   4️⃣ REGISTER WIDGET AREAS (SIDEBAR)
   ========================================================== */
function theme_widgets() {
    register_sidebar(array(
        'name'          => __('Main Sidebar'),
        'id'            => 'main-sidebar',
        'before_widget'=> '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title'  => '</h3>'
    ));
}
add_action('widgets_init', 'theme_widgets');



/* ==========================================================
   5️⃣ REMOVE WORDPRESS VERSION (SECURITY)
   ========================================================== */
remove_action('wp_head', 'wp_generator');



/* ==========================================================
   6️⃣ DISABLE EMOJI (SPEED BOOST)
   ========================================================== */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');



/* ==========================================================
   7️⃣ CUSTOM LOGIN PAGE LOGO
   ========================================================== */
function custom_login_logo() { ?>
    <style>
        body.login div#login h1 a {
            background-image: url('<?php echo get_template_directory_uri(); ?>/images/logo.png');
            width: 100%;
            background-size: contain;
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'custom_login_logo');



/* ==========================================================
   8️⃣ CHANGE LOGIN PAGE URL
   ========================================================== */
function custom_login_url() {
    return home_url();
}
add_filter('login_headerurl', 'custom_login_url');



/* ==========================================================
   9️⃣ CHANGE LOGIN PAGE TITLE
   ========================================================== */
function custom_login_title() {
    return get_bloginfo('name');
}
add_filter('login_headertext', 'custom_login_title');



/* ==========================================================
   🔟 CREATE CUSTOM POST TYPE (clothS)
   ========================================================== */
function cloth_post_type() {
    register_post_type('cloths',
        array(
            'labels' => array(
                'name' => __('Cloths'),
                'singular_name' => __('Cloth')
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-video-alt2',
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );
}
add_action('init', 'cloth_post_type');



/* ==========================================================
   1️⃣1️⃣ ADD CUSTOM IMAGE SIZE
   ========================================================== */
add_image_size('cloth-thumb', 400, 600, true);



/* ==========================================================
   1️⃣2️⃣ ADD CUSTOM SHORTCODE
   ========================================================== */
function site_year_shortcode() {
    return date('Y');
}
add_shortcode('year', 'site_year_shortcode');



/* ==========================================================
   1️⃣3️⃣ ENABLE SVG UPLOAD
   ========================================================== */
function allow_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');



/* ==========================================================
   1️⃣4️⃣ LIMIT EXCERPT LENGTH
   ========================================================== */
function custom_excerpt_length() {
    return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length');



/* ==========================================================
   1️⃣5️⃣ REMOVE ADMIN BAR FROM FRONTEND
   ========================================================== */
add_filter('show_admin_bar', '__return_false');



/* ==========================================================
   1️⃣6️⃣ ENABLE REST API SUPPORT
   ========================================================== */
add_theme_support('rest-api');



/* ==========================================================
   1️⃣7️⃣ ADD FOOTER COPYRIGHT TEXT
   ========================================================== */
function site_footer_text() {
    echo "© " . date('Y') . " " . get_bloginfo('name') . ". All rights reserved.";
}
add_action('wp_footer', 'site_footer_text');



/* ==========================================================
   1️⃣8️⃣ 404 PAGE REDIRECT OPTION (OPTIONAL)
   ========================================================== */
function redirect_404_to_home() {
    if (is_404()) {
        wp_redirect(home_url());
        exit();
    }
}
// Uncomment this if you want auto redirect
// add_action('template_redirect', 'redirect_404_to_home');



/* ==========================================================
   ✅ END OF FUNCTIONS FILE
   ========================================================== */


   function ecommerce_footer_menu() {
    register_nav_menus(array(
        'footer-menu' => __('Footer Menu')
    ));
}
add_action('init', 'ecommerce_footer_menu');
