<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
$post = get_queried_object();
// var_dump($post);
?>
<div class="post_detail_page">
    <article class="post_cont">
        <div class="container">
            <div class="col-header">
                <h1 class="page_title title-h1 wow" data-wow-duration="1.5s"><?php echo $post->post_title; ?></h1>
                <div class="information d-flex justify-content-between">
                    <div class="date-author d-flex ">
                        <div class="date"><?php echo get_the_date(); ?></div>
                        <div class="author">- By <a href="<?php echo get_author_posts_url($post->post_author); ?>"><?php the_author_meta( 'user_nicename' , $post->post_author ); ?></a> </div>
                    </div>
                    <?php echo get_new_categories();?>
                </div>
                <div class="featured-image">
                    <?php get_featured_image($post); ?>
                </div>
            </div>
            <div class="col-body">
                <?php echo $post->post_content; ?>
            </div>
        </div>
    </article>
</div>

<?php
get_footer();
