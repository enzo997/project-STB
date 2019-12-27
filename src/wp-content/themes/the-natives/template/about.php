<?php
 //*Template Name: About
get_header();
?>

<div class="about">
    <!-- sec-top -->
    <section class="sec-top container f-w-400 color-1c">
        <?php
        do_action('page_title');

        if($secTop = get_field('sec_top')):
            $imageUrl = $secTop['image']?$secTop['image']['url']:DEFAULT_IMG. '/noimage_1276x480.png';
            ?>
            <img src="<?php echo $imageUrl;?>" alt="<?php echo $imageUrl;?>">
            <?php
            if($description = $secTop['description']):
                ?>
                <div class="description f-size-30"><?php echo $description;?></div>
                <?php
            endif;
        endif;
        ?>
    </section>
    <!-- sec-partners -->
    <section class="sec-partners color-1c f-w-400">
        <?php
        if($secPartners = get_field('sec_partners')):
            ?>
            <div class="title-and-logo">
                <?php
                if($title = $secPartners['title']):
                    ?>
                    <h3 class="f-size-30"><?php echo $title;?></h3>
                    <?php
                endif;
                ?>
                <div class="logo-container container">
                    <div class="row">
                        <?php
                        if($logoList = $secPartners['partner_logo_list']):
                            foreach($logoList as $logo):
                                $logoUrl = $logo?$logo['url']:DEFAULT_IMG. '/noimage_601x601.png';
                                ?>
                                <div class="partner-logo col-md-3 col-sm-4 col-6">
                                    <img src="<?php echo $logoUrl;?>" alt="<?php echo $logoUrl;?>" >
                                </div>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            <?php
            if($description = $secPartners['description']):
                ?>
                <div class="description-container container">
                    <div class="f-size-30 description"><?php echo $description;?></div>
                </div>
                <?php
            endif;
        endif;
        ?>
    </section>
    <!-- sec-process -->
    <section class="sec-process container color-1c f-w-400">
        <?php
        if($secProcess = get_field('sec_process')):
            if($title = $secProcess['title']):
                ?>
                <h3 class="f-size-30"><?php echo $title;?></h3>
                <?php
            endif;
            if($processList = $secProcess['process_list']):
                ?>
                <div class="process-container">
                    <?php
                    $countP=0;
                    foreach($processList as $process):
                        $countP++;
                        ?>
                        <div class="process-member row <?php if($countP % 2 == 0) echo 'reverse';?>">
                            <!-- image-col -->
                            <div class="image-col col-md-6 col-12">
                                <?php
                                $imgList = $process['image_list'];
                                $imgCount = count($imgList);

                                //case-1 case <3
                                if($imgCount <3):
                                    $imageUrl = $imgList[0]?$imgList[0]['url']:DEFAULT_IMG. '/noimage_605x727.png';
                                    echo '<div class ="case-1"><img src="'.$imageUrl.'" alt="'.$imageUrl.'"></div>';
                                endif;
                                //case >3
                                if($imgCount >= 3):
                                    $image1Url = $imgList[0]['url'];
                                    $image2Url = $imgList[1]['url'];
                                    $image3Url = $imgList[2]['url'];
                                    //case-2
                                    if($imgList[2]['width'] > 300):
                                        ?>
                                        <div class="case-2">
                                            <div class="row row1">
                                                <div class="col-6 image-1">
                                                    <img src="<?php echo $image1Url;?>" alt="<?php echo $image1Url;?>">
                                                </div>
                                                <div class="col-6 image-2">
                                                    <img src="<?php echo $image2Url;?>" alt="<?php echo $image2Url;?>">
                                                </div>
                                            </div>
                                            <div class="row row2">
                                                <div class="col-12 image-3">
                                                    <img src="<?php echo $image3Url;?>" alt="<?php echo $image3Url;?>">
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    else:
                                    //case3
                                    ?>
                                    <div class="case-3">
                                        <div class="row">
                                            <div class="col1 col-6">
                                                <div class="image-1">
                                                    <img src="<?php echo $image1Url;?>" alt="<?php echo $image1Url;?>">
                                                </div>
                                            </div>
                                            <div class="col2 col-6">
                                                <div class="image-2">
                                                    <img src="<?php echo $image2Url;?>" alt="<?php echo $image2Url;?>">
                                                </div>
                                                <div class="image-3">
                                                    <img src="<?php echo $image3Url;?>" alt="<?php echo $image3Url;?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    endif;
                                endif;
                                ?>
                            </div>
                            <!-- text-col -->
                            <div class="text-col col-md-6 col-12">
                                <div class="text-container">
                                    <?php
                                    if($title = $process['title']):
                                        ?>
                                        <h4 class="title f-size-22 color-b"><?php echo $title;?></h4>
                                        <?php
                                    endif;
                                    if($description = $process['description']):
                                        ?>
                                        <div class="description f-size-18"><?php echo $description;?></div>
                                        <?php
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    ?>
                </div>
                <?php
            endif;
        endif;
        ?>
    </section>
    <!-- sec-awards -->
    <section class="sec-awards f-w-400">
        <div class="aw-container container">
            <div class="content">
            <?php
            if($secAwards = get_field('sec_awards')):
                if($title = $secAwards['title']):
                    ?>
                    <h3 class="f-size-30 color-1c"><?php echo $title;?></h3>
                    <?php
                endif;
                if($awardsList = $secAwards['award_list']):
                    ?>
                    <ul class="aw-list-container">
                        <?php
                        foreach ($awardsList as $award):
                            $name = $award['name'];
                            $event = $award['event'];
                            $year = $award['year'];
                            if(!empty($name) && !empty($event) && !empty($year))
                            ?>
                            <li class="awards-member row color-1d f-size-15">
                                <div class="name col-md-5 col-5"><?php echo $name;?></div>
                                <div class="event col-md-5 col-5"><?php echo $event;?></div>
                                <div class="year col-md-2 col-2"><?php echo $year;?></div>
                            </li>
                            <?php
                        endforeach;
                        ?>
                    </ul>
                    <?php
                endif;
            endif;
            ?>
            </div>
        </div>
    </section>
    <!-- sec-team -->
    <section class="sec-team f-w-400 color-1c">
        <?php
        if($secTeam = get_field('sec_team')):
            if($title = $secTeam['title']):
                ?>
                <h3 class="f-size-30"><?php echo $title;?></h3>
                <?php
            endif;
            ?>
            <div class="team-container">
                <?php
                if($teamMemList = $secTeam['team_member']):
                    $count = 0;
                    foreach($teamMemList as $teamMem):
                        $count++;
                        $imageUrl = $teamMem['image']?$teamMem['image']['url']:DEFAULT_IMG. '/noimage_480x753.png';
                        ?>
                        <div class="team-member <?php if($count % 2 == 0) echo "reverse";?>">
                            <div class="image-row">
                                <img src="<?php echo $imageUrl;?>" alt="<?php echo $imageUrl;?>">
                            </div>
                            <div class="content-row">
                                <?php
                                $position = $teamMem['position'];
                                $fullName= $teamMem['first_name']. " " .$teamMem['last_name'];
                                if(!empty($position) && !empty($fullName)):
                                    ?>
                                    <h5 class="position color-v f-size-14"><?php echo $position;?></h5>
                                    <h4 class="full-name f-size-20"><?php echo $fullName;?></h4>
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
            <?php
        endif;
        ?>
    </section>
    <!-- sec-questions -->
    <section class="sec-questions container f-w-400">
        <?php
        if($secQuestions = get_field('sec_questions')):
            if($title = $secQuestions['title']):
                ?>
                <h3 class="color-1c f-size-30"><?php echo $title;?></h3>
                <?php
            endif;
            if($questionList = $secQuestions['question_list']):
                ?>
                <div class="question-container">
                    <?php
                    foreach($questionList as $question):
                        if($ques = $question['question']):
                            ?>
                            <div class="question-member color-v">
                                <h4 class="question f-size-16">
                                    <?php echo $ques;?>
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                </h4>
                                <div class="answer-container color-3a f-size-18"><?php if($answers = $question['answers']) echo $answers;?></div>
                            </div>
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
</div>

<?php
get_footer();