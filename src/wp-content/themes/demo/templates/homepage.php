<?php /* Template Name: Home page*/
get_header();?>
<!--**********************************************************************************************************-->

<div class="home-page">
    <?php
    // value baner-top
    $banner = get_field('banner_top');
    $content = $banner['content'];
    $title = $content['title'];
    $description = $content['description'];
    $btnGETSTARTED = $content['btn'];
    $imageGroup = $banner['image_group'];
    $image = $imageGroup['image']['url'];
    $bakgroundImg = $imageGroup['background_image']['url'];
    // var_dump($image);show ra tat ca cac gia tri
    ?>
    <div class="section banner-top">
        <div class="container">
            <div class="col-body">
                <div class="content">
                    <h1 class="title-1"><?php echo $title;//show tile ?></h1>
                    <div class="description">
                        <p><?php echo $description;//show description ?></p>
                    </div>
                    <a href="<?php echo $btnGETSTARTED; ?>" target class="btn-get-started">GET STARTED</a>
                </div>
                <div class="image-group">
                    <div class="col-img col-img--player">
                        <div class="img-player">
                            <!-- neu hinh anh duoc admin nhap alt thi lay alt do, con nguoc lai thi alt se lay title -->
                            <img src="<?php echo  $image ;?>" alt="<?php echo  $image ['alt']?$image ['alt']:$title; ?>">
                        </div>                                        
                    </div>
                    <div class="col-img col-img--background">
                        <div class="img-backgroud">
                            <img src="<?php echo  $bakgroundImg ;?>" alt="<?php echo  $bakgroundImg ;?>">
                        </div>                   
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--home_page section step-box-3-->
    <div class="section sec-step-3">
        <div class="container">
            <div class="steps-list">
                <?php 
                //home page section sec-step-3
                $steps = get_field('steps');
                $steps_box = $steps['step_box'];
                //repeat----foreach//
                $i =0;
                foreach($steps_box as $item): //lap lai tren mmoi item
                    $i++;
                    // var_dump($item);
                    // echo '<br>';
                    $stepsbox_image = $item['image']['url'];
                    $stepsbox_title = $item['title'];
                    $stepsbox_description = $item['description'];
                ?>
                <div class="step-box step-box-<?php echo $i; //tao nhieu class trong mot doan code ?>">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-sm-12">
                        <div class="content">
                            <img src="<?php echo  $stepsbox_image ;?>" alt="<?php echo  $stepsbox_image ;?>">
                            <h3 class="title-h3"><?php echo $stepsbox_title;//show tile ?></h3>
                            <div class="description">
                                <p><?php echo $stepsbox_description; ?></p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
    <!--home_page section-hiw-->
    <div class="section section-hiw">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="col-image">
                    <?php 
                            $sectionHiw = get_field('section-hiw');
                            $Image = $sectionHiw['image']['url'];
                            $Textgroup = $sectionHiw['textgroup'];
                            $Title = $Textgroup['title'];
                            $SmallTitle = $Textgroup['smalltitle'];
                            $description = $Textgroup['description'];
                            $SmallTitle1= $Textgroup['smalltitle1'];
                            $description1 = $Textgroup['description1'];
                            $SmallTitle2 = $Textgroup['smalltitle2'];
                            $description2 = $Textgroup['description2'];
                            $btnLearnMore = $Textgroup['btn'];
                        ?>
                        <img src="<?php  echo $Image; ?>" alt="<?php  echo $Image; ?>">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="col-content">
                        <h2 class="title">
                            <?php echo $Title; ?>
                        </h2>
                        <div class="content content-group">
                            <div class="content-group--step">
                                <h4 class="small-title"><?php echo $SmallTitle; ?></h4>
                                <div class="description"><p><?php echo $description; ?></p></div>
                            </div>
                            <div class="content-group--step">
                                <h4 class="small-title"><?php echo $SmallTitle1; ?></h4>
                                <div class="description"><p><?php echo $description1; ?></p></div>
                            </div>
                            <div class="content-group--step">
                                <h4 class="small-title"><?php echo $SmallTitle2; ?></h4>
                                <div class="description"><p><?php echo $description2; ?></p></div>
                                <a href="<?php echo $btnLearnMore; ?>" target class="btn-style-0">LEARN MORE</a>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--home_page section-Results-->
    <div class="section sec-results">
        <div class="container">
            <?php 
                $sectionResulst = get_field('section_results');
                $Header = $sectionResulst['group_header'];
                $ResulsrTitle = $Header['title'];
                $ResulsrDescription = $Header['description_resulst'];
                $Body = $sectionResulst ['group_body'];
                $ButtonSeeMembershhip = $sectionResulst['btn'];
            ?>
            <div class="col-header">
                <h2 class="title-h2"><?php echo $ResulsrTitle; ?></h2>
                <div class="description">
                    <?php echo $ResulsrDescription; ?>
                </div>
            </div>
            <div class="col-body">
                <?php 
                    $i =0;
                    foreach($Body as $item): //lap lai tren mmoi item
                        $i++;
                        //var_dump($item);
                        // echo '<br>';
                        $percent = $item['percent'];
                        $percentDescription = $item['description_percent'];
                ?>
                    <div class="results-box results-box-<?php echo $i; ?>">
                        <div class="resulst-box--circle">
                            <div class="content">
                                <div class="percent">
                                    <?php echo $percent; ?>
                                </div>
                                <div class="percent-description">
                                    <?php echo $percentDescription?>
                                </div>
                            </div>    
                        </div>
                    </div>
                    <?php endforeach;?>
            </div>
            <div class="line">
                <img class="line-1" src="https://stb.nativesstaging.com.au/wp-content/themes/simply-the-bet/assets/images/line_results.svg" alt="line-1-image">
                <img class="line-2" src="https://stb.nativesstaging.com.au/wp-content/themes/simply-the-bet/assets/images/line_results.svg" alt="line-2-image">
            </div>
            <div class="sec-results--btn">
                <a href="<?php echo $ButtonSeeMembershhip; ?>" target class="btn-style-1">SEE MEMBERSHIP OPTIONS</a>
            </div>
            
        </div>
    </div>
    <!--home_page section-Intelligent-tip-->
    <div class="section sec-intelligent-tip">
        <div class="container">
        <?php 
            $sectionItelligent = get_field('section_intelligent');
            $GroupHeader = $sectionItelligent['group_header'];
            $GroupBody = $sectionItelligent['group_body'];

            //Group header value***************
            $IntelligentTitle = $GroupHeader['title'];
            $IntelligentDescription = $GroupHeader['description'];
            $IntelligentDescription1 = $GroupHeader['description_1'];
            //group body value*****************
            $TabsNBA = $GroupBody['tabs'];
            $TabsMLB = $GroupBody['tabs_1'];
            $imgageNBA = $GroupBody['tabs_content']['url'];
            $imageMLB = $GroupBody['tabs_content_1']['url'];
            $RowDescription = $GroupBody['row_footer'];
            $RowDescription1= $GroupBody['row_footer_1'];
        ?>
            <div class="col-header">
                <h2 class="title-h2"><?php echo $IntelligentTitle; ?></h2>
                <div class="row row-header">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="description des-header-1">
                            <?php echo $IntelligentDescription; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="description des-header-2">
                            <?php echo $IntelligentDescription1; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-body">
                <ul class="nav nav-tabs">
                    <li class="active-color">
                        <a data-toggle="tab" href="#NBA" class="active">NBA</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#MLB" class>MBL</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <img id="NBA" class="active tab-pane imgNBA" src="<?php echo $imgageNBA; ?>" alt="<?php echo $imgageNBA; ?>">
                    <img id="MLB" class="tab-pane imgNBA" src="<?php echo $imageMLB; ?>" alt="<?php echo $imgageMLB; ?>">
                </div>
                <div class="row row-footer">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="description des-leg-1">
                            <?php echo $RowDescription; ?>
                        </div> 
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="description des-leg-2">
                            <?php echo $RowDescription1; ?>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--home_page section testimonials-->
    <div class="section section-testimonials">
        <div class="container">
            <?php 
                $sectionTestimonials = get_field('section_testimonials');
                $GroupHeader = $sectionTestimonials['group_header'];
                //detail value header
                $TitleTestimonnials= $GroupHeader['title'];
                $DescriptionTestimonials= $GroupHeader['description'];
            ?>
            <div class="col-header">
                <h4 class="tile-h4"><?php echo $TitleTestimonnials; ?></h4>
                <div class="description">
                    <?php echo $DescriptionTestimonials; ?>
                </div>
            </div>
            <div class="col-body">
                <div class="container">
                    <div class="post-list">
                        <div class="row row-group">
                            <?php
                            //$paged =  get_query_var('paged')?get_query_var('paged'):1;//code phan trang
                            $args = array(
                                "post_type" => 'Testimonials',
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
                                    <div class="col-lg-3 col-md-6 col-sm-12 ">
                                        <?php
                                        $description = get_field('description',$post->ID);
                                        $name = get_field('name',$post->ID);
                                        $image = get_field('image',$post->ID)['url'];
                                        ?>
                                        <div class="description">
                                            <p><?php echo $description;?></p>
                                        </div>
                                        <ul class="content-group">
                                            <li class="name-writer"><?php echo $name;?></li>
                                            <li class="image-writer">
                                                <img src="<?php echo $image; ?>" alt="<?php echo $image; ?>">
                                            </li>   
                                        </ul>
                                    </div> 
                                <?php
                                }
                                ?>
                        </div>
                        <div class="sec-testimonals--btn">
                            <a href="<?php echo $ButtonSeeMembershhip; ?>" target class="btn-style-1">SEE MEMBERSHIP OPTIONS</a>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>
<!---**********************************************************************************************************-->
<?php 
get_footer();?>