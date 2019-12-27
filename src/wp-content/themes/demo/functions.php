<?php
    define('THEME_URL', get_template_directory_uri());
    define('THEMEPATH',get_bloginfo('template_url'));
    function fresh_numbers_style() {
        $date = date('l jS \of F Y h:i:s A');
        // $mainCss  = get_bloginfo('template_url')."/css/main.css?".$date;
        // $mainJs  = get_bloginfo('template_url')."/js/main.js?".$date;
    
        wp_enqueue_style( 'style', get_stylesheet_uri() );
        // wp_enqueue_style('font-awesome', THEME_URL.'/css/font-awesome.min.css');
        wp_enqueue_style('bootstrap', THEME_URL.'/assets/css/bootstrap.min.css');
        // wp_enqueue_style('main', $mainCss);
        // wp_enqueue_style('reponsive', THEME_URL.'/css/reponsive.css');
		// wp_enqueue_style('section', THEME_URL.'/css/section.css');
        wp_enqueue_style('main', THEME_URL.'/assets/css/main.css?'.$date);
        wp_enqueue_style('slick', THEME_URL.'/assets/css/slick.css?'.$date);
        //JS
        wp_enqueue_script( 'main', THEME_URL. '/assets/js/main.js', '','' , true);
        wp_enqueue_script( 'slick', THEME_URL. '/assets/js/slick.min.js?'.$date, '','' , true);
    
        // wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'bootstrap', THEME_URL. '/assets/js/bootstrap.min.js', '','' , true);
        wp_enqueue_script( 'jquery', THEME_URL. '/assets/js/jquery-3.4.1.min.js', '','' , true);
        // wp_enqueue_script( 'slick', THEME_URL. '/js/slick.min.js', '','' , true);
        // wp_enqueue_script( 'main', $mainJs, '','' , true);
    }
    add_action( 'wp_enqueue_scripts', 'fresh_numbers_style' );
    
    register_nav_menus( array() );
    
    if( function_exists('acf_add_options_page') ) {
        //acf_add_options_page('Theme Options');
        $parent = acf_add_options_page(array(
            'page_title'    => 'Theme Options',
            'menu_title'    => 'Theme Options',
            'redirect'      => false
        ));
    }
    
    // =============== upload svg ============= 
    function cc_mime_types($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
    add_filter('upload_mimes', 'cc_mime_types');

// =============================================
register_nav_menus( array(
    'social_menu' => 'Social Links Menu',
    'header_menu' => 'Header Menu',
    'header_menu_center' => 'Header Menu Center',
    'footer_menu' => 'Footer Menu'
) );
add_theme_support( 'post-thumbnails' );
add_filter('intermediate_image_sizes_advanced', 'hero_remove_default_image_sizes');
function hero_remove_default_image_sizes( $sizes) {
    unset( $sizes['thumbnail']);
    unset( $sizes['medium']);
    unset( $sizes['large']);
    unset( $sizes['medium_large']);
    return $sizes;
}
add_action( 'after_setup_theme', 'pp_setup' );
function pp_setup() {
    load_theme_textdomain( 'pp' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'Thumb_432x280', 432, 280, true ); 
    add_image_size( 'Thumb_414x264', 414, 264, true ); 
    add_image_size( 'Thumb_475x640', 475, 640, true ); 
    add_image_size( 'Banner_post', '', 650, false);
}

//The hinh anh vao wordpress
add_theme_support( 'post-thumbnails' ); //tghêm ảnh


//nav-pagination code phan trang cho blog////
function nt_posts_count($args, $all = true) {
    global $wpdb;
    if($all === true) {
        $args['posts_per_page'] = -1;
    }
    $args['count'] = 1;
    $the_query = new WP_Query( $args );
    $sql = "SELECT count(*) as count from (".str_replace("SQL_CALC_FOUND_ROWS ",'',$the_query->request).") as sub";
    $row = $wpdb->get_row( $sql );
    if($row){
        return $row->count;
    }
    return 0;
}

function nt_page_link($page = 1, $link='') {
    if(!$link) return;
    $newLink = '';
    $subLink = '';
    $pos =  strpos($link,'page');
    $pos = ($pos!==false)?$pos:strpos($link,'paged');
    if($pos!==false){
        $newLink = substr($link,0,$pos-1);
    }
    $newLink = $newLink?$newLink:$link;

    $page = is_numeric($page)?$page:1;

    $pos =  strpos($link,'/?');
    if($pos!==false){
        $newLink = substr($newLink,0,$pos);
        $subLink = substr($link,$pos);
    }
    if($page > 1 && is_archive()){
        $newLink .='/?page='.$page;
    }
    elseif($page > 1) {
        $newLink .='/page/'.$page;
    }
    $newLink .= $subLink;
    return $newLink;
}

function nt_pagination($args,$params = array(),$page='') {
    if(!$page) {
        global $wp;
        $current_url = home_url(add_query_arg(array(),$wp->request));
    }
    else {
        $current_url = $page;
    }
    $number = $args['posts_per_page'];
    $args['posts_per_page'] = -1;
    $all = nt_posts_count($args);
    if($all) {
        $percent = $all % $number;
        $number_p = ($percent)?(($all-$percent)/$number + 1):($all/$number);
        if($number_p>1){
            $display = wp_is_mobile()?3:5;
            if($display%2==0) {
                $display -= 1;
            }
            $paged = (isset($args['paged']) && $args['paged']>1)?$args['paged']:1;
            $data = ' data-link='.$current_url;
            if(is_array($params) && count($params)) {
                foreach ($params as $key=>$param){
                    $data.= ' data-'.$key.'="'.$param.'"';
                }
            }
            $number_plus = floor($display/2);
            ?>
            <ul class="nav_pagination">
                <?php 
                    $url = nt_page_link( 1,$current_url ); 
                    $prev = $paged>1?$paged-1:1; 
                    $url = nt_page_link( $prev,$current_url );
                ?>
                <?php
                    if($paged > $prev):
                        ?>
                        <li class="btn-prev">
                            <a <?php echo $data; ?> data-page="<?php echo $prev; ?>" href="<?php echo $url; ?>"><</a>
                        </li>
                        <?php
                    endif;
                ?>
                

                <?php 
                if($number_p < $display): 
                    for($i=1; $i<=$number_p;$i++):
                        $url = nt_page_link( $i,$current_url ); ?>
                        <li <?php echo ($i==$paged)?' class="active"':''; ?>><a <?php echo $data; ?> data-page="<?php echo $i ?>" href="<?php echo $url; ?>"><span><?php echo $i ?></span></a></li>
                        <?php 
                    endfor; 
                elseif($paged > $number_p - $number_plus) :
                    for($i=$number_p-$display+1; $i<=$number_p;$i++): ?>
                        <?php $url = ($i==$paged)?'javascript:void(0)':nt_page_link( $i,$current_url ); ?>
                        <li <?php echo ($i==$paged)?' class="active"':''; ?>><a <?php echo $data; ?> data-page="<?php echo $i ?>" href="<?php echo $url; ?>"><span><?php echo $i ?></span></a></li>
                        <?php 
                    endfor; 
                else: 
                    if($paged <= $number_plus): 
                        for($i=1; $i<=$display;$i++): ?>
                            <?php $url = ($i==$paged)?'javascript:void(0)':nt_page_link( $i,$current_url ); ?>
                            <li <?php echo ($i==$paged)?' class="active"':''; ?>><a <?php echo $data; ?> data-page="<?php echo $i ?>" href="<?php echo $url; ?>"><span><?php echo $i ?></span></a></li>
                            <?php 
                        endfor; 
                    else: 
                        for($i=$paged-$number_plus; $i<$paged;$i++): 
                            $url = nt_page_link( $i,$current_url ); 
                                ?>
                            <li><a <?php echo $data; ?> data-page="<?php echo $i ?>" href="<?php echo $url; ?>"><span><?php echo $i ?></span></a></li>
                        <?php endfor; ?>

                        <li class="active"><a <?php echo $data; ?> data-page="<?php echo $paged ?>" href="javascript:void(0)"><span><?php echo $i ?></span></a></li>

                        <?php for($i=$paged+1; $i<=$paged+$number_plus;$i++):
                            $url = nt_page_link( $i,$current_url ); ?>
                            <li><a <?php echo $data; ?> data-page="<?php echo $i ?>" href="<?php echo $url; ?>"><span><?php echo $i ?></span></a></li>
                        <?php endfor; 
                    endif; 
                endif; 
                $next = $paged < $number_p?$paged+1:$number_p; 
                $url = nt_page_link( $next,$current_url ); 
                ?>
                <?php if($paged < $next): ?>
                    <li class="btn-next">
                        <a <?php echo $data; ?> data-page="<?php echo $next; ?>" href="<?php echo $url; ?>">></a>
                    </li>
                <?php endif; ?>
            </ul>
            <?php
        }
    }
}
///end code phan trang cho blog

//Home page cach tao custom post type
function nt_create_post_type($args) {
    if(!is_array($args) || !$args['post_type'] || !$args['name'] || !$args['single'] || !$args['slug']) return;
    $post_type = $args['post_type'];
    $name = $args['name'];
    $single = $args['single'];
    $slug = $args['slug'];
    $icon = $args['menu_icon'];

    register_post_type($post_type, array(
        'labels' => array(
            'name' => __($name),
            'singular_name' => __($single),
            'add_new' => __('Add New '.$single),
            'add_new_item' => __('Add New '.$single),
            'edit_item' => __('Edit '.$single),
            'new_item' => __('New '.$single),
            'all_items' => __('All '.$name),
            'view_item' => __('View '.$single),
            'search_items' => __('Search '.$name),
            'not_found' => __('Not Found '.$single),
            'not_found_in_trash' => __('Not Found '.$single.' In Trash'),
            'parent_item_colon' => '',
            'menu_name' => __($name)
        ),
        'public' => true,
        'menu_icon' => $icon,
        'exclude_from_search' => false,
        'menu_position' => 6,
        'has_archive' => true,
        'taxonomies' => array($post_type),
        'rewrite' => array('slug' => $slug),
        'supports' => array('title', 'editor', 'excerpt', 'revisions', 'thumbnail', 'author')
    ));
}
//////end
////
function create_new_custom_post_type_testimonials(){

    $args = array(
        "post_type" => 'Testimonials',
        "name" => "Testimonials",//show menu left
        "single" => "Testimonials",
        "slug" => "testimonials",//link ten bai post
        'menu_icon' => 'dashicons-star-empty',
    );
    nt_create_post_type($args);
}
add_action('init', 'create_new_custom_post_type_testimonials');
/////end custom post type