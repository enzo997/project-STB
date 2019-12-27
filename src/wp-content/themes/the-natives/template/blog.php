<?php
 //*Template Name: Blog
get_header();
$post = get_queried_object();
?>
<div class="blog_page">
    <section class="section section_blog">
        <div class="container">
            <div class="col-header">
                <?php $title=get_field('title', $post->ID)?get_field('title', $post->ID):'Here you can find out about our latest insights, projects, jobs and musings on the world of digital. '; 
                    echo '<h1 class="page_title title-h1 wow" data-wow-duration="1.5s">'.$title.'</h1>';
                ?>                
                <div class="filters d-flex justify-content-between align-items-center">
                    <?php $title_tab=get_field('title_tab', $post->ID)?get_field('title_tab', $post->ID):'insights.'; ?>
                    <h3 class="title-h3"><?php echo $title_tab; ?></h3>
                    <ul id="fielter" class="fielter d-flex flex-wrap align-items-center">
                        <li>Filters:</li>
                        <?php 
                            $args = array(
                                'type'  => 'post',
                                'hide_empty' => 0,
                                'orderby' => 'id',
                                'order' => 'ASC'
                            );
                            if($categories = get_categories($args)){

                                foreach($categories as $cat) {
                                    echo '<li><button term_id="'.$cat->term_id.'">'.$cat->name.'.</button></li>';
                                }

                            }
                        ?>
                    </ul>
                </div>
            </div>
            <div id="article_list" class="col-body">
                <?php 
                    $paged =  get_query_var('paged')?get_query_var('paged'):1;
                    $args = array(
                        'post_type'=> 'post',
                        'orderby'    => 'date',
                        'post_status' => 'publish',
                        "posts_per_page" => 6,
                        'order'    => 'DESC',
                        "paged"=>$paged,
                    );
                    $i=0;
                    foreach(get_posts($args) as $post){
                        $i++;
                        $class=($i%2)==0?'flex-row-reverse':'';
                        // var_dump($post->ID);
                        echo get_article_box($post, $class);
                    }
                    nt_pagination($args,array('posts_per_page'=>$args['posts_per_page']));
                ?>
            </div>
        </div>
    </section>

</div>
<?php
get_footer();?>
