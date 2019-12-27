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

    <?php
        if($sections = get_field('sections', $post->ID)){
            foreach($sections as $key => $section){
                if ($section["acf_fc_layout"] == "banner_top"){
                    $title = $section['title']?$section['title']:$post->post_title;
                    $img = '<img src="'.$section['thumb_image']['sizes']['thumb_default'].'" alt="'.$title.'">';
                    ?>
                        <section class="section p_banner_top section_<?php echo $key; ?>">
                            <div class="container">
                                <h1 class="title-h1 wow" data-wow-duration="1.5s"><?php echo $title; ?></h1>
                                <div class="information d-flex justify-content-between wow" data-wow-duration="1.5s">
                                    <div class="date-author d-flex ">
                                        <div class="date"><?php echo get_the_date(); ?></div>
                                        <div class="author">- By <a href="<?php echo get_author_posts_url($post->post_author); ?>"><?php the_author_meta( 'user_nicename' , $post->post_author ); ?></a> </div>
                                    </div>
                                    <?php echo get_new_categories();?>
                                </div>
                                <div class="row wow" data-wow-duration="1.5s">
                                    <div class="col-md-9 col-12">
                                        <div class="featured-image">
                                            <?php 
                                            if (!empty($section['thumb_image']))
                                                echo $img;
                                            else
                                                get_featured_image($post); 
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php
                }
                elseif ($section["acf_fc_layout"] == "content"){
                    $position = $section['body']['position'];
                    ?>
                    <section class="section p_content section_<?php echo $key; ?> wow" data-wow-duration="1.5s">
                        <div class="container">
                            <div class="row <?php echo ($position == 'left')?'flex-row-reverse':''; ?>">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="content">
                                        <?php if(!empty($title = $section['title'])) 
                                            echo '<h5 class="title-h5">'.$title.'</h5>';
                                        ?>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <div class="content">
                                        <?php 
                                            if (!empty($section['body']['description']))
                                                echo $section['body']['description'];
                                            
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php 
                }
                elseif ($section["acf_fc_layout"] == "image"){
                    $select =$section['select'];
                    ?>
                    <section class="section sec_image section_<?php echo $key; ?> wow" data-wow-duration="1.5s">
                        <div class="container">
                        <?php if($select=='image'){
                            $single_image= $section['single_image'];
                            $width = $single_image['width'];
                            $img = $single_image['image']?$single_image['image']['url']:THEME_URI.'/assets/images/default/noimage_1276x480.png';
                            ?>
                            <div class="row">
                                <div class="col-lg-<?php echo $width; ?> col-md-<?php echo $width; ?> col-sm-12">
                                    <div class="col-image">
                                        <img src="<?php echo $img; ?>" alt="<?php echo $single_image['image']['alt']; ?>">
                                    </div>
                                </div>
                            </div>
                            <?php
                        } elseif($select=='Gallery'){
                            $gallery=$section['gallery'];
                            ?>
                            <div class="gallery">
                                <div class="row">
                                    <?php foreach($gallery as $image){
                                        $img = $image?$image['sizes']['thumb_631x362']:THEME_URI.'/assets/images/default/noimage_631x362.png';
                                        echo '
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="col-image">
                                                <img src="'.$img.'" alt="'.$image['alt'].'">
                                            </div>
                                        </div>';
                                    } ?>
                                </div>
                                
                            </div>
                            <?php
                        }?>                            
                            
                        </div>
                    </section>
                    <?php
                }
                elseif ($section["acf_fc_layout"] == "contact"){
                    ?>
                    <section class="section sec_pcontact section_<?php echo $key; ?> wow" data-wow-duration="1.5s">
                        <div class="container">
                            <div class="content">
                                <div class="description">
                                    <a href="<?php echo $section['cat']['url']; ?>" target="<?php echo $section['cta']['target']; ?>" ><?php echo $section['description']; ?></a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                }

            }
        }
    ?>
</div>

<?php
get_footer();
