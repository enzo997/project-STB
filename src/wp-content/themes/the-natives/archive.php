<?php

get_header();
$cat = get_queried_object();
$term_id = $cat->term_id;
?>
<div class="taxonomy-page">
    <section class="page_title wow" data-wow-duration="1.5s">
        <div class="container">
            <h1 class="title-h1"><?php echo $cat->name; ?></h1>
        </div>
    </section>
    <section class="taxonomy-cont">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-right wow" data-wow-duration="1.5s">
                    <div class="sidebar">
                        <div class="categoryes">
                            <h2 class="title-h2"></h2>
                            <ul class="nav-category">
                                <li class="category"><a href=""></a></li>
                            </ul>
                        </div>
                        <div class="hot-news">
                            <h2 class="title-h2"></h2>
                            <div class="hot-new-list">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-left wow" data-wow-duration="1.5s">
                    <div class="post-list">
                        <?php
                        
                        $args = array(
                            'post_type' => 'post',
                            'post_status' => 'publish', 
                            'posts_per_page' => 6,
                            'order' => 'DESC', 
                            "orderby" => 'date',
                            'tax_query' => array( 
                                array(
                                    'taxonomy' => $cat->taxonomy,
                                    'field' => 'term_id',
                                    'terms' => $cat->term_id,
                                )
                            ),
                        );
                        
                        $posts = get_posts($args);
                        var_dump($posts);
                        foreach( $posts as $post ) {
                            setup_postdata( $post );
                            
                            echo '
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                '.get_post_box($post).'
                            </div>
                            ';

                            wp_reset_postdata(); 
                        };
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
get_footer();
