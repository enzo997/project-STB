<?php ////
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
function nt_create_taxonomy($args) {
    if(!is_array($args) || !$args['post_type'] || !$args['name'] || !$args['single'] || !$args['taxonomy'] || !$args['slug']) return;
    $post_type = $args['post_type'];
    $name = $args['name'];
    $single = $args['single'];
    $slug = $args['slug'];
    $taxonomy = $args['taxonomy'];

    $labels = array(
        'name' => __($name),
        'singular_name' => __($single),
        'search_items' => __('Search '.$name),
        'popular_items' => __('Popular '.$name),
        'all_items' => __('All '.$name),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Edit '.$single),
        'update_item' => __('Update '.$single),
        'add_new_item' => __('Add '.$single),
        'new_item_name' => __('New '.$single),
        'menu_name' => __($name),
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => $slug),
    );
    register_taxonomy($taxonomy, $post_type, $args);
}
////
function create_new_custom_post_type_inspiration(){

    $args = array(
        "post_type" => 'case_study',
        "name" => "Case Study ",
        "single" => "Case Study ",
        "slug" => "case_study",
        'menu_icon' => 'dashicons-star-empty',
    );
    nt_create_post_type($args);
}
add_action('init', 'create_new_custom_post_type_inspiration');

function create_custom_taxonomies_inspiration() {

    //taxonomy 

    $args = array(
        "post_type" => array('case_study'),
        "name" => "Categories",
        "single" => "Categories",
        "slug" => "categories_case_study",
        "taxonomy" => "categories_case_study",
    );
    nt_create_taxonomy($args);
}
add_action('init', 'create_custom_taxonomies_inspiration', 0);
// Add custom image size
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
    add_image_size( 'thumb_default', 1276, '', true);
    add_image_size( 'thumb_avatar', 63, 63, true);
    add_image_size( 'thumb_259x317', 259, 317, true);
    add_image_size( 'thumb_358x358', 358, 358, true);
    add_image_size( 'thumb_396x323', 396, 323, true);
    add_image_size( 'thumb_480x753', 480, 753, true);
    add_image_size( 'thumb_559x456', 559, 456, true);
    add_image_size( 'thumb_601x601', 601, 601, true);
    add_image_size( 'thumb_604x369', 604, 369, true);
    add_image_size( 'thumb_605x727', 605, 727, true);
    add_image_size( 'thumb_605x337', 605, 337, true);
    add_image_size( 'thumb_607x566', 607, 566, true);
    add_image_size( 'thumb_610x352', 610, 352, true);
    add_image_size( 'thumb_611x761', 611, 761, true);
    add_image_size( 'thumb_613x659', 613, 659, true);
    add_image_size( 'thumb_622x356', 622, 356, true);
    add_image_size( 'thumb_631x362', 631, 362, true);
    add_image_size( 'thumb_765x510', 765, 510, true);
    add_image_size( 'thumb_1276x480', 1276, 480, true);

    // add_image_size( 'thumb_mobile', 163, 163, true);
    add_image_size( 'thumb_mobile', 300, 300, true);

}

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
            <div class="pagination wow" data-wow-duration="1.5s">
                <ul class="justify-content-center align-items-center d-flex">
                    <?php $url = nt_page_link( 1,$current_url ); ?>

                    <?php if($paged>1) {
                        $prev = $paged>1?$paged-1:1;
                        $url = nt_page_link( $prev,$current_url );
                        echo '
                        <li class="prev-page arrow-page">
                            <a href="javascript:void(0);" data-page="'.$prev.'">
                                <i class="icon-prev"></i>
                                <span>prev page</span>
                            </a>
                        </li>';
                    } 
                    if($paged < $number_p) {
                        $next = $paged < $number_p?$paged+1:$number_p;
                        $url = nt_page_link( $next,$current_url );
                        echo '
                        <li class="next-page arrow-page">
                            <a href="javascript:void(0);" data-page="'.$next.'">
                                <span>next page</span>
                                <i class="icon-next"></i>
                            </a>
                        </li>';
                    }?>
                </ul>
            </div>
            <?php
        }
    }
}

function get_new_categories(){
    echo '<ul class="cayegories">';
    foreach(get_the_category() as $cat){
        echo '
        <li class="category">
            <a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a>
        </li>';
    }
    echo '</ul>';
}

function get_featured_image($post, $size=""){
        $size = $size?$size:'1276x480';
        $featured_desktop = get_the_post_thumbnail_url($post->ID)?get_the_post_thumbnail_url($post->ID,'thumb_'.$size):THEME_URI.'/assets/images/default/noimage_'.$size.'.png'; 
        $featured_mobile = get_the_post_thumbnail_url($post->ID)?get_the_post_thumbnail_url($post->ID,'thumb_mobile'):THEME_URI.'/assets/images/default/noimage_mobile.png'; 

        echo '<img class="featured_desktop" src="'.$featured_desktop.'" alt="'.$post->post_title.'">';
        echo '<img class="featured_mobile" src="'.$featured_mobile.'" alt="'.$post->post_title.'">';
}


function get_article_box($post, $class=""){
    $excerpt = $post->post_excerpt?$post->post_excerpt:'Updating...';
    ?>
    <article class="article_item ">
        <div class="row align-items-center <?php echo $class; ?>">
            <div class="col-image">
                <a class="" href="<?php echo get_permalink($post->ID); ?>">
                    <?php echo  get_featured_image($post, "559x456"); ?>
                </a>
            </div>
            <div class="article_cont">
                <h5 class="date"><?php echo date("m/d/Y", strtotime($post->post_date)); ?></h5>
                <h3 class="title-h3">
                    <a class="" href="<?php echo get_permalink($post->ID); ?>">
                        <?php echo $post->post_title; ?>
                    </a>
                </h3>
                <?php if(!empty($excerpt))
                    echo '<div class="description">'.$excerpt.'</div>';
                
                    echo '<a class="btn_view_post" href="'.get_permalink($post->ID).'">view post.</a>';
                    ?>
            </div>
        </div>  
    </article>
    <?php
}


//get title this page
add_action('page_title', 'page_title_call_back');
function page_title_call_back(){
    if($title = get_field('page_title')):
        ?>
        <h1 class="page-title color-1c f-size-26 f-w-400 wow" data-wow-duration="1.5s"><?php echo $title;?></h1>
        <?php
    endif;
}