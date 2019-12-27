<?php
 //*Template Name: Case Studies
get_header();
$post = get_queried_object();

?>
<div class="case_studies_page">
<section class="section section_studies">
        <div class="container">
            <div class="col-header">
                <?php $title=get_field('title', $post->ID)?get_field('title', $post->ID):'Our latest work. When everything clicks, beautiful things happen.'; 
                    echo '<h1 class="page_title title-h1 wow" data-wow-duration="1.5s">'.$title.'</h1>';
                ?>                
            </div>
            <div id="studies_list" class="col-body">
                <?php 
                    $paged =  get_query_var('paged')?get_query_var('paged'):1;
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
                            echo '<div class="col-lg-12 col-md-12 col-sm-12 wow" data-wow-duration="1.5s">';
                            $img = get_the_post_thumbnail($post->ID)?get_the_post_thumbnail_url($post->ID, 'thumb_default'):THEME_URI.'/assets/images/default/noimage_1276x480.png';
                        }                            
                        elseif ( ($key == 1) || ($key == 7) ){
                            echo '<div class="col-lg-6 col-md-6 col-sm-12 wow" data-wow-duration="1.5s">';
                            $img = get_the_post_thumbnail($post->ID)?get_the_post_thumbnail_url($post->ID, 'thumb_607x566'):THEME_URI.'/assets/images/default/noimage_607x566.png';
                        }
                           
                        elseif ( ($key == 2) || ($key == 6) ){
                            echo '<div class="col-lg-6 col-md-6 col-sm-12 wow" data-wow-duration="1.5s">';
                            $img = get_the_post_thumbnail($post->ID)?get_the_post_thumbnail_url($post->ID, 'thumb_480x753'):THEME_URI.'/assets/images/default/noimage_480x753.png';
                        }
                            
                        elseif ( ($key == 3) ){
                            echo '<div class="col-lg-5 col-md-6 col-sm-12 wow" data-wow-duration="1.5s">';
                            $img = get_the_post_thumbnail($post->ID)?get_the_post_thumbnail_url($post->ID, 'thumb_358x358'):THEME_URI.'/assets/images/default/noimage_358x358.png';
                        }
                           
                        elseif ( ($key == 4) ){
                            echo '<div class="col-lg-7 col-md-6 col-sm-12 wow" data-wow-duration="1.5s">';
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
                    //nt_pagination($args,array('posts_per_page'=>$args['posts_per_page']));
                ?>
            </div>
        </div>
    </section>

</div>
<?php
get_footer();?>