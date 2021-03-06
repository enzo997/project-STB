<?php
 //*Template Name: Case Study Template
get_header();
$post = get_queried_object();
// var_dump($post);
?>
<div class="case-study-page">
    <?php 
    if (!empty($sections = get_field('sections', $post->ID))){
        foreach ($sections as $section){
            if ($section["acf_fc_layout"] == "banner_top"){
                $title = $section['title']?$section['title']:$post->post_title;
                $sub_title=$section['sub_title']?$section['sub_title']:'Veneziano Coffee Roasters';
                $img = $section['image']?$section['image']['sizes']['thumb_default']:THEME_URI.'/assets/images/default/noimage_1276x480.png';
                ?>
                <section class="section sec_banner_top">
                    <div class="container">
                        <h1 class="title-h1"><?php echo $title; ?></h1>
                        <div class="sub_title line_bot_blue"><?php echo $sub_title; ?></div>
                        <div class="col-image">
                            <img src="<?php echo $img; ?>" alt="<?php echo $title; ?>">
                        </div>
                    </div>
                </section>
                <?php
            }
            elseif ($section["acf_fc_layout"] == "content"){
                    $total = count($section['body']);                     
                ?>
                <section class="section sec_content <?php echo ($total!==1)?'m-flex-column-reverse':''; ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="content">
                                    
                                    <?php foreach ($section['body'] as $key => $title) {
                                        ?>
                                            <h3 class="title-h3 <?php echo ($total!==1)?'click_tab':''; ?>" data-key="<?php echo $key; ?>"><?php echo $title['title']; ?></h3>
                                        <?php
                                    } ?>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-6 col-sm-12">
                                <div class="content">
                                    <?php foreach ($section['body'] as $key => $description) {
                                        if($key==0)
                                            echo '<div class="description">'.$description['description'].'</div>';
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
            }
            elseif ($section["acf_fc_layout"] == "gallery_or_image"){
                ?>
                <section class="section gallery_or_image">
                    <div class="container">
                        <?php if($section['select'] === 'gallery'){
                            $total = count($section['gallery']);
                            ?>
                                <div class="gallery gallery-<?php echo $total; ?>">
                                    <div class="row">
                                        <?php 
                                        if($total === 3){
                                            foreach($section['gallery'] as $key => $image){
                                                $img =$image?$image['sizes']['thumb_610x352']:THEME_URI.'/assets/images/default/noimage_610x352.png';
                                                if($key == 0){
                                                    $img =$image?$image['sizes']['thumb_611x761']:THEME_URI.'/assets/images/default/noimage_611x761.png';
                                                    ?>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                            <div class="col-image">
                                                                <img src="<?php echo $img; ?>" alt="<?php echo $image['alt']; ?>">
                                                            </div>
                                                        </div>
                                                    <?php
                                                }
                                                if($key == 1){
                                                    echo '<div class="col-lg-6 col-md-6 col-sm-6 col-6">';
                                                    ?>
                                                        <div class="col-image">
                                                            <img src="<?php echo $img; ?>" alt="<?php echo $image['alt']; ?>">
                                                        </div>                                                   
                                                        
                                                    <?php
                                                }
                                                if($key == 2){
                                                    ?>
                                                        <div class="col-image">
                                                            <img src="<?php echo $img; ?>" alt="<?php echo $image['alt']; ?>">
                                                        </div>
                                                    <?php
                                                    echo '</div>';
                                                }

                                                
                                            }
                                        }
                                        if($total === 2){
                                            foreach($section['gallery'] as $image){
                                                // $img =$image?$image['sizes']['thumb_610x352']:THEME_URI.'/assets/images/default/noimage_610x352.png';
                                                $img = $image?$image['sizes']['thumb_default']:THEME_URI.'/assets/images/default/noimage_1276x480.png';

                                                ?>
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="col-image">
                                                            <img src="<?php echo $img; ?>" alt="<?php echo $image['alt']; ?>">
                                                        </div>
                                                    </div>
                                                <?php 
                                            }
                                        } ?>
                                    </div>
                                </div>                          
                            <?php
                        } 
                        elseif ($section['select'] === 'image'){
                            
                            $img = $section['image']?$section['image']['sizes']['thumb_default']:THEME_URI.'/assets/images/default/noimage_1276x480.png';                            
                            ?>
                                <div class="single_image col-image">
                                    <img src="<?php echo $img ; ?>" alt="<?php echo $section['image']['alt']; ?>">
                                </div>
                            <?php 
                        }
                        ?>
                        
                    </div>
                </section>    
                <?php
            }
        }
    }
    
    ?>
</div>
<?php
get_footer();?>