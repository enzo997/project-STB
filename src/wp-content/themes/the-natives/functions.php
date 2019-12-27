<?php 
define('THEME_URI', get_template_directory_uri());
define('THEME_DIR', get_template_directory());
define('DEFAULT_IMG', THEME_URI. '/assets/images/default');
include TEMPLATEPATH .'/function/function.php';

define('AJAX_URI', admin_url('admin-ajax.php'));
define('THEME_FUNCTIONS', THEME_DIR . '/function'); 

$functions = array('ajaxs');
foreach($functions as $function) {
    if(file_exists(THEME_FUNCTIONS."/{$function}.php")) {
        require_once THEME_FUNCTIONS."/{$function}.php";
    }
}

// Add localtion menu
register_nav_menus(
    array(
        'menu' => __( 'Primary Menu' ),
        'footer' => __( 'Footer Menu' ),
        'social' => __( 'Social Links Menu' ),
    )
);

// Local JSON acf
add_filter('acf/settings/save_json', 'my_acf_json_save_point');

function my_acf_json_save_point( $path ) {
    $path = get_stylesheet_directory() . '/acf-field';
    return $path;
}
add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point( $paths ) {
    // remove original path (optional)
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-field';
    return $paths;
}

// Add css & js
function the_natives_style() {
	$date = date('l jS \of F Y h:i:s A');
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style('bootstrap', THEME_URI. '/assets/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('font', THEME_URI. '/assets/css/font.css');
    wp_enqueue_style('slick', THEME_URI. '/assets/css/slick.css');
    wp_enqueue_style('animate', THEME_URI. '/assets/css/animate.css');
    wp_enqueue_style('main', THEME_URI. '/assets/css/main.css?'.$date);
    wp_enqueue_style('style-new', THEME_URI. '/assets/css/style.css?'.$date);
    wp_enqueue_style('global', THEME_URI. '/assets/css/global.css?'.$date);
    
    // style for article pages
    if(is_single())
        wp_enqueue_style('post-detail', THEME_URI. '/assets/css/pages/post-detail.css?'.$date);
    // style for article pages
    // if(is_page(array('blog', 42)))
        wp_enqueue_style('blog', THEME_URI. '/assets/css/pages/blog.css?'.$date);

    // style for Service pages
    if(is_page(array('service')) || is_page_template('template/service.php'))
        wp_enqueue_style('service', THEME_URI. '/assets/css/pages/service.css?'.$date);
    // style for Home page
    if(is_page(array('home')))
        wp_enqueue_style('home', THEME_URI. '/assets/css/pages/home.css?'.$date);
    // style for About page
    if(is_page(array('about')))
        wp_enqueue_style('about-page', THEME_URI. '/assets/css/pages/about.css?'.$date);
    

    if(is_page(array('case-studies')))
        wp_enqueue_style('case-studies', THEME_URI. '/assets/css/pages/case-studies.css?'.$date);

    if(is_page(array('contact-us', 'thank-you')))
        wp_enqueue_style('contact-us', THEME_URI. '/assets/css/pages/contact-us.css?'.$date);

    if(is_singular('case_study'))    
        wp_enqueue_style('case-study-detail', THEME_URI. '/assets/css/pages/case-study-detail.css?'.$date);

    wp_enqueue_script( 'ajax', THEME_URI. '/assets/js/ajax.js',array('jquery'),'' , true);
    wp_enqueue_script( 'labory', THEME_URI. '/assets/js/labory.js', '','' , true);
    wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.4.1.js', '','' , true);
    //youtube
//	wp_enqueue_script( 'youtube', 'https://www.youtube.com/player_api', '','' , true);
	wp_enqueue_script( 'jquery-migrate', 'https://code.jquery.com/jquery-migrate-3.1.0.js', '','' , true);
	wp_enqueue_script( 'bootstrap', THEME_URI. '/assets/js/bootstrap.min.js', '','' , true);
    wp_enqueue_script( 'slick', THEME_URI. '/assets/js/slick.min.js', '','' , true);
    wp_enqueue_script( 'paroller', THEME_URI. '/assets/js/jquery.paroller.min.js', '','' , true);
    wp_enqueue_script( 'wow', THEME_URI. '/assets/js/wow.min.js', '','' , true);
    wp_enqueue_script( 'main', THEME_URI. '/assets/js/main.js?'.$date, '','' , true);
    wp_enqueue_script( 'call-slick', THEME_URI. '/assets/js/call-slick.js?'.$date, '','' , true);
    wp_enqueue_script( 'call-event', THEME_URI. '/assets/js/event.js?'.$date, '','' , true);
    wp_localize_script('ajax', 'hr', array('p_url' => THEME_URI,'a_url'=>AJAX_URI));
}
add_action( 'wp_enqueue_scripts', 'the_natives_style' );

// Add option page ACF
if( function_exists('acf_add_options_page') ) {
    // add parent
   $parent = acf_add_options_page(array(
	'page_title' 	=> 'Theme Options',
	'menu_title' 	=> 'Theme Options',
	'redirect' 		=> false
   ));
   
}

// Add file media upload
function my_custom_mime_types( $mimes ) {
	
    // New allowed mime types.
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';

    return $mimes;
}
add_filter( 'upload_mimes', 'my_custom_mime_types' );






