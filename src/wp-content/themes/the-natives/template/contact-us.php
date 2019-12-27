<?php
 //*Template Name: Contact Us
get_header();
$post = get_queried_object();
?>
<div class="contact_page">
    <?php  $information = get_field('information',$post->ID);
        ?>
            <section class="section sec_information">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 wow" data-wow-duration="1.5s">
                            <div class="description"><?php echo $information['description']; ?></div>
                        </div>
                        <div class="col-lg-2 offset-lg-1 col-md-6 col-sm-6 col-6 c_cont wow" data-wow-duration="1.5s">
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
                        <div class="col-lg-2 col-md-6 col-sm-6 col-6 c_cont wow" data-wow-duration="1.5s">
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

    <?php if($form = get_field('form', $post->ID)){
        $title = $form['title']?$form['title']:'Get in touch';
        ?>
        <section class="section sec_contact_form wow" data-wow-duration="1.5s">
            <div class="container">
                <h2 class="title-h2"><?php echo $title; ?></h2>
                <?php echo do_shortcode('[formidable id='.$form['select_form'].']'); ?>
            </div>
        </section>
        <?php
    } ?>


</div>
<?php
get_footer();?>