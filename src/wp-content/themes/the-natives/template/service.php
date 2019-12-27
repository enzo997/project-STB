<?php
 //*Template Name: Service
get_header();
$post = get_queried_object();
?>
<div class="service_page">
    <?php 
        $header_top = get_field('header_top', $post->ID);
        $title = $header_top['description']?$header_top['description']:$post->post_title;
    ?>
        <section class="section sec_head_top">
            <div class="container">
                <h1 class="tilte-h1"><?php echo $title; ?></h1>
            </div>
        </section>

 
    <?php if(!empty($workshops=get_field('discovery_workshops', $post->ID))){
        $tab_title = $workshops['title']?$workshops['title']:'Updating...';
        ?>
            <section class="section workshops">
                <div class="container">
                    <div class="tab_title tab_line"><h3 class="title-h3"><?php echo $tab_title; ?></h3></div>
                    <div class="workshops_list">
                        <?php 
                            $i=0;
                            foreach($workshops['workshops_box'] as $item){
                                $i++;
                                $img = $item['image']?$item['image']['sizes']['thumb_601x601']:THEME_URI.'/assets/images/default/noimage_601x601.png';
                                ?>
                                    <div class="workshops_box <?php echo ($i%2==0)?'flex-row-reverse':''; ?>">
                                        <div class="col-image">
                                            <img src="<?php echo $img; ?>" alt="<?php echo $item['image']['alt']; ?>">
                                        </div>
                                        <div class="col-cont">
                                            <div class="content">
                                                <?php
                                                    if(!empty($title = $item['content']['title']))
                                                        echo '<h3 class="title-h3">'.$title.'</h3>';

                                                    if(!empty($sub_title = $item['content']['sub_title']))
                                                        echo '<h4 class="title-h4">'.$sub_title.'</h4>';

                                                    if(!empty($description = $item['content']['description']))
                                                        echo '<div class="description">'.$description.'</div>';
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            } 
                        ?>


                    </div>
                </div>
            </section>
        <?php
    } ?>



</div>
<?php
get_footer();?>