<?php
 //*Template Name: Thank You
get_header();
$post = get_queried_object();
$contact_ID = get_page_by_path('contact-us', OBJECT, 'page')->ID;

?>
<div class="thanks_page">
    <?php  $information = get_field('information',$contact_ID);
        ?>
            <section class="section sec_information">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="description"><?php echo $post->post_content; ?></div>
                        </div>
                        <div class="col-lg-2 offset-lg-1 col-md-6 col-sm-6 col-6 c_cont">
                            <div class="contact">
                                <?php if (!empty($address_1 = $information['contact']['address_group'][0]['address'])){
                                    echo '<div class="address">'.$address_1.'</div>';
                                } 
                                $hotline = $information['contact']['phone']?$information['contact']['phone']:'1300 844 549';
							    $call_phone = str_replace(array('(', ')',' ','.'), '', $hotline);
                                ?>
                                <a href="tel:<?php echo $call_phone ; ?>" class="phone_number"><?php echo $hotline; ?></a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-6 c_cont">
                            <div class="contact">
                                <?php if (!empty($address_2 = $information['contact']['address_group'][1]['address'])){
                                    echo '<div class="address">'.$address_2.'</div>';
                                } 
                                    $email = $information['contact']['email']?$information['contact']['email']:'info@thenatives.com.au';                             
                                ?>
                                <a href="mailto:<?php echo $email; ?>" class="email"><?php echo $email; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
    ?>
    <section class="section sec_thankyou">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-md-6 col-md-6 col-sm-12">
                    <div class="col-image">
                        <?php echo get_featured_image($post, 'thumb_631x362'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<?php
get_footer();?>