<?php
 //*Template Name: Blog *//
get_header();
$post = get_queried_object();
?>
<div class="content site-content">
    <div class="blog_page">
        <section class="section banner-top">
            <div class="container">
                <div class="col-body">
                    <div class="content">
                        <h5 class="title-h5 sub-title">Blog</h5>
                        <h1 class="title-h1">
                            COME CHECK OUT OUR ARTICLES ON EVRYTHING TO DO WITH THE NFL, NBL AND MBL LEGUES AND MORE.
                        </h1>
                    </div>
                    <div class="col-image">
                        <img src="https://stb.nativesstaging.com.au/wp-content/uploads/2019/08/banner-top.png" alt="Come check out our articles on everything to do with the NFL, NBL and MBL leagues and more.">
                    </div>
                </div>
            </div>
        </section>
        <section class="section blog-post">
            <div class="container">
                <div class="blog-post--list">
                    <div class="row">
                        <?php

                            $paged =  get_query_var('paged')?get_query_var('paged'):1;//code phan trang
                            $args = array(
                                'orderby'    => 'date',
                                'post_status' => 'publish',
                                "posts_per_page" => 6,//SO LUONG BAI POST
                                'order'    => 'DESC',
                                "paged"=>$paged,
                            );
                            $posts = get_posts($args);//ham truyen vao

                                foreach($posts as $post){
                                    //var_dump($post);// hien thi toan bo nhung gia trij ma bai post co
                                    ?>
                                        <div class="col-lg-4 col-md-6 col-sm-12 ">
                                            <div class="blog-post--box">
                                                <div class="col-image">
                                                    <a href="<?php echo get_permalink($post->ID); ?>" title="NBA Finals 2018/19:  What You Need to Know">
                                                        <img src="<?php echo get_the_post_thumbnail_url($post->ID);?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="blog-post--content">
                                                    <h3 class="title-h3">
                                                        <a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a>
                                                    </h3>
                                                    <div class="date">
                                                        <?php echo get_the_date( 'j F, Y',$post->ID )?>
                                                    </div>
                                                    <?php $post_excerpt = $post->post_excerpt?$post->post_excerpt:"Updating.."; ?>
                                                    <div class="description"><p><?php echo $post_excerpt; ?></p></div>
                                                    <a href="<?php echo get_permalink($post->ID); ?>" class="btn-read-more">READ MORE</a>
                                                </div>
                                            </div>
                                        </div> 
                                    <?php
                                }
                            ?>
                        
                        <?php //Giong nhu danh sanh ul li, xem chi tiet tai inspect// phan trang
                        nt_pagination($args,array('posts_per_page'=>$args['posts_per_page'])); ?>
                </div>
            </div>
        </section>
    </div>
</div>

<?php
get_footer();?>