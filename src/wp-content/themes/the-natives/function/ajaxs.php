<?php
add_action('wp_ajax_article_show','article_show');
add_action('wp_ajax_nopriv_article_show','article_show');
function article_show(){
    $term_id = $_POST['term_id'];
    $paged =  get_query_var('paged')?get_query_var('paged'):1;

    $args = array(
        'post_type'=>'post',
        'cat'=>$term_id,
        'posts_per_page'=>'6',
        'orderby'    => 'date',
        'order'    => 'DESC',
        "paged"=>$paged,
    );
    $i=0;
    foreach(get_posts($args) as $post){
        $i++;
        $class=($i%2)==0?'flex-row-reverse':'';      
        echo get_article_box($post, $class);
    }
    nt_pagination($args,array('posts_per_page'=>$args['posts_per_page']));
    ?>
    <script type="text/javascript">
            jQuery('#article_list .pagination .arrow-page a').attr('data-cat',<?php echo $term_id; ?>);    
    </script>
    <?php
    exit;
}


add_action('wp_ajax_load_pagination','load_pagination');
add_action('wp_ajax_nopriv_load_pagination','load_pagination');
function load_pagination(){
    $term_id = $_POST['data_cat'];
    $paged =  $_POST['data_page'];

    $args = array(
        'post_type'=>'post',
        'posts_per_page'=>'6',
        'orderby'    => 'date',
        'order'    => 'DESC',
        "paged"=>$paged,
    );
    if($term_id !== 'undefined'){
        $args['cat'] = $term_id;       
    }
    $i=0;
    foreach(get_posts($args) as $post){
        $i++;
        $class=($i%2)==0?'flex-row-reverse':'';
        echo get_article_box($post, $class);
        
    }
    nt_pagination($args,array('posts_per_page'=>$args['posts_per_page']));
    ?>
    <script type="text/javascript">
        jQuery("#article_list .pagination .next-page a").attr('data-page','<?php echo ($paged + 1 ); ?>');    
        jQuery("#article_list .pagination .prev-page a").attr('data-page','<?php echo ($paged - 1 ); ?>');    
        jQuery("html, body").animate({ scrollTop: jQuery(jQuery('#article_list')).offset().top }, 600);
    </script>
    <?php
    exit;
}


add_action('wp_ajax_studies_list','studies_list');
add_action('wp_ajax_nopriv_studies_list','studies_list');
function studies_list(){
    $paged = $_POST['data_page'];

    $args = array(
        'post_type'=> 'case_study',
        'orderby'    => 'date',
        'post_status' => 'publish',
        "posts_per_page" => 9,
        'order'    => 'DESC',
        "paged"=>$paged,
    );
    echo '<div class="row">';
    foreach(get_posts($args) as $key => $post){
        if (($key == 0) || ($key == 5) || ($key == 8)){
            echo '<div class="col-lg-12 col-md-12 col-sm-12">';
            $img = get_the_post_thumbnail($post->ID)?get_the_post_thumbnail_url($post->ID, 'thumb_default'):THEME_URI.'/assets/images/default/noimage_1276x480.png';
        }                            
        elseif ( ($key == 1) || ($key == 7) ){
            echo '<div class="col-lg-6 col-md-6 col-sm-12">';
            $img = get_the_post_thumbnail($post->ID)?get_the_post_thumbnail_url($post->ID, 'thumb_607x566'):THEME_URI.'/assets/images/default/noimage_607x566.png';
        }
           
        elseif ( ($key == 2) || ($key == 6) ){
            echo '<div class="col-lg-6 col-md-6 col-sm-12">';
            $img = get_the_post_thumbnail($post->ID)?get_the_post_thumbnail_url($post->ID, 'thumb_480x753'):THEME_URI.'/assets/images/default/noimage_480x753.png';
        }
            
        elseif ( ($key == 3) ){
            echo '<div class="col-lg-5 col-md-6 col-sm-12">';
            $img = get_the_post_thumbnail($post->ID)?get_the_post_thumbnail_url($post->ID, 'thumb_358x358'):THEME_URI.'/assets/images/default/noimage_358x358.png';
        }
           
        elseif ( ($key == 4) ){
            echo '<div class="col-lg-7 col-md-6 col-sm-12">';
            $img = get_the_post_thumbnail($post->ID)?get_the_post_thumbnail_url($post->ID, 'thumb_765x510'):THEME_URI.'/assets/images/default/noimage_765x510.png';
        }
            
        ?>
        <article class="studies_box">
            <a class="<?php echo ($key == 0) || ($key == 5) || ($key == 8)?'w100':''; ?>" href="<?php echo get_permalink($post->ID); ?>" title="<?php echo $post->post_title; ?>">
                <div class="col-image ">
                    <img  src="<?php echo $img; ?>" alt="<?php echo $post->post_title; ?>">
                </div>
            </a>
        </article>
        <?php
        echo '</div>';
    }
    echo '</div>';
    nt_pagination($args,array('posts_per_page'=>$args['posts_per_page']));
    ?>
    <script type="text/javascript">
        jQuery("#studies_list .pagination .next-page a").attr('data-page','<?php echo ($paged + 1 ); ?>');    
        jQuery("#studies_list .pagination .prev-page a").attr('data-page','<?php echo ($paged - 1 ); ?>');    
        jQuery("html, body").animate({ scrollTop: jQuery(jQuery('#studies_list')).offset().top }, 600);
    </script>
    <?php
    exit;
}


// add_action('wp_ajax_load_des_casestudy_post','load_des_casestudy_post');
// add_action('wp_ajax_nopriv_load_des_casestudy_post','load_des_casestudy_post');
// function load_des_casestudy_post(){
//     $data_key = $_POST['data_key'];

//     echo '<div class="description">'.$data_key.'</div>';

//     exit;
// }



?>