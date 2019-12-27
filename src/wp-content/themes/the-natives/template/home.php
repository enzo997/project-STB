<?php
 //*Template Name: Homepage
get_header();
$post = get_queried_object()->ID;
?>
<div class="home-page color-1c f-w-400 home_page">
    <!-- section top -->
    <section class="sec-top container">
        <?php do_action('page_title');?>
        <?php
        if($secTop = get_field('sec_top')):
            ?>
            <div class="video wow" data-wow-duration="1.5s">
                <?php
                    if($videoImage = $secTop['video']['thumb'])
                        $videoImage = $secTop['video']['thumb']['url'];
                    else
                        $videoImage = DEFAULT_IMG. '/noimage_765x510.png';
                    ?>
                    <div class="col-thumb">
                        <img src="<?php echo $videoImage;?>" alt="<?php echo $videoImage;?>" class="video-image">
                        <button class="btn-play"><i class="icon-play"></i></button>
                    </div>
                    <?php

                if($videoLink = $secTop['video']['video_link']):
                    $video_link = str_replace(array('watch?v=','vimeo.com/'), array('embed/','player.vimeo.com/video/'), $videoLink);
                    ?>
                    <div class="video-popup">
                        <div class="popup-container">
                            <div class="container">
                                <iframe id='stream-video' width="1280" height="720" src="<?php echo $video_link;?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen allow="autoplay"></iframe>
                                <button class="close-button"><i class="fa fa-times-circle-o" aria-hidden="true"></i></button>

                            </div>
                        </div>
                    </div>
                    <?php
                endif;

                ?>
            </div>
            <?php
            if($description = $secTop['description']):
                ?>
                <div class="description f-size-30 f-w-400 wow" data-wow-duration="1.5s"><?php echo $description;?></div>
                <?php
            endif;
        endif;
        ?>
    </section>
    <!-- section recent work -->
    <section class="sec-recent-work container">
        <?php
        if($rw = get_field('recent_work')):
            if($title = $rw['title']):
                ?>
                <h3 class="f-size-30 f-w-400 wow" data-wow-duration="1.5s"><?php echo $title;?></h3>
                <?php
            endif;
            if($imagesGrs = $rw['image_group']):
                ?>
                <div class="img-group row">
                    <?php
                    foreach($imagesGrs as $imagesGr):
                        if($image = $imagesGr['image']):
                            $width = $imagesGr['image']['width'];
                            $imageUrl = $image ? $image['url'] : DEFAULT_IMG. '/noimage_601x601.png';
                            if($width > 500):
                                ?>
                                <div class="big-col image-col wow" data-wow-duration="1.5s">
                                    <div class="col-content">
                                        <img src="<?php echo $imageUrl;?>" alt="<?php echo $imageUrl;?>">
                                        <div class="text-container f-w-400">
                                            <?php
                                            if($title = $imagesGr['title']):
                                                ?>
                                                <h4 class="color-w f-size22"><?php echo $title;?></h4>
                                                <?php
                                            endif;
                                            if($description = $imagesGr['description']):
                                                ?>
                                                <div class="color-w f-size-18"><?php echo $description;?></div>
                                                <?php
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endif;
                            if ($width < 500):
                                ?>
                                <div class="small-col image-col wow" data-wow-duration="1.5s">
                                    <div class="col-content">
                                        <img src="<?php echo $imageUrl;?>" alt="<?php echo $imageUrl;?>">
                                        <div class="text-container f-w-400">
                                            <?php
                                            if($title = $imagesGr['title']):
                                                ?>
                                                <h4 class="color-w f-size-22"><?php echo $title;?></h4>
                                                <?php
                                            endif;
                                            if($description = $imagesGr['description']):
                                                ?>
                                                <div class="color-w f-size-18"><?php echo $description;?></div>
                                                <?php
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endif;
                            ?>
                            <?php
                        endif;
                    endforeach;
                    ?>
                </div>
                <?php
            endif;
        endif;
        ?>
    </section>
    <!-- sec-slider -->
    <section class="sec-slider">
        <?php
        if($secSlider = get_field('sec_slider')):
            //title
            if($title = $secSlider['title']):
                ?>
                <h3 class="title f-size-30 wow" data-wow-duration="1.5s"><?php echo $title;?></h3>
                <?php
            endif;
            ?>
            <!-- slider -->
            <div class="slider-group"
                <?php
                $backgroundUrl = $secSlider['background']?$secSlider['background']['url']:DEFAULT_IMG. '/noimage_1276x480.png';
                ?>
                style = "background-image: url('<?php echo $backgroundUrl;?>');"
            >
                <div class="text-slider">
                    <div class="slider-container wow" data-wow-duration="1.5s">
                        <?php
                        if($sliders = $secSlider['text_slider']):
                            foreach($sliders as $slider):
                                ?>
                                <div class="slider-member">
                                    <div class="avatar-col">
                                        <?php
                                        $avatarUrl = $slider['avatar']?$slider['avatar']['sizes']['thumb_avatar']:DEFAULT_IMG. '/noimage_63x63.png';
                                        ?>
                                        <img src="<?php echo $avatarUrl;?>" alt="<?php echo $avatarUrl;?>" class='avatar-image'>
                                    </div>
                                    <div class="text-col color-w">
                                        <?php
                                        if($description = $slider['description']):
                                            ?>
                                            <p class="description f-size-16"><?php echo $description;?></p>
                                            <?php
                                        endif;
                                        if($name = $slider['name']):
                                            ?>
                                            <h4 class="name f-size-16"><?php echo $name;?></h4>
                                            <?php
                                        endif;
                                        if($position = $slider['position']):
                                            ?>
                                            <h4 class="position f-size-16"><?php echo $position;?></h4>
                                            <?php
                                        endif;
                                        ?>
                                    </div>
                                </div>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            <?php
        endif;
        ?>
    </section>
    <!-- sec-introduce -->
    <section class="sec-introduce container f-w-400">
        <?php
        if($introduce = get_field('sec_introduce')):
        ?>
        <div class="row">
            <div class="col-title col-md-6 col-sm-6 col-12 wow" data-wow-duration="1.5s">
                <?php
                if($title = $introduce['title']):
                    ?>
                    <h4 class="title f-size-18 color-3a"><?php echo $title;?></h4>
                    <?php
                endif;
                ?>
            </div>
            <div class="col-introduce col-md-6 col-sm-6 col-12 wow" data-wow-duration="1.5s">
                <?php
                if($introList = $introduce['inroduce_list']):
                    ?>
                    <ul class="intro-list color-v f-size-38">
                        <?php
                        foreach($introList as $intro):
                            if($content = $intro['introduce']):
                                ?>
                                <li class="intro-item"><span><?php echo $content;?></span></li>
                                <?php
                            endif;
                        endforeach;
                        ?>
                    </ul>
                    <?php
                endif;
                ?>
            </div>
        </div>
        <?php
        endif;
        ?>
    </section>
    <!-- sec-latest-post-->
    <section class="sec-latest-post container">
        <h3 class="title f-size-30 wow" data-wow-duration="1.5s">Latest posts</h3>
        <div class="col-body row wow" data-wow-duration="1.5s">
            <?php 
            $args = array(
                'post_type'=> 'post',
                'orderby'    => 'date',
                'post_status' => 'publish',
                "posts_per_page" => 3,
                'order'    => 'DESC',
            ); 
            foreach(get_posts($args) as $post){
                echo '<div class="col-lg-4 col-md-4 col-sm-12">';
                echo get_article_box($post);
                echo '</div>';
            }
            ?>
        </div>
    </section>
</div>
<?php
get_footer();?>