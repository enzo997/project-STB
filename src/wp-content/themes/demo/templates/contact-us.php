<?php
 //*Template Name: Contact Us
get_header();
$post = get_queried_object();
?>
<div class="contact_page">
    <section class="section banner-top">
        <div class="container">
            <div class="col-body">
                <div class="content">
                    <h5 class="title-h5 sub-title">contact</h5>
                    <h1 class="title-h1">
                        CONTACT US TO DAY
                    </h1>
                    <div class="description">
                        <p>Contact Us Today, We’d Love To Hear From You! Got a question about our fool-proof guaranteed sports betting system or any upcoming games?</p>
                    </div>
                </div>
                <div class="col-image">
                <img src="https://stb.nativesstaging.com.au/wp-content/uploads/2019/09/contact-bg.png" alt="Contact us today">
                </div>
            </div>
        </div>
    </section>
    <section class="section contact-form">
        <div class="container">
            <?php echo do_shortcode('[contact-form-7 id="127"]');?>
        </div>
    </section>
</div>
<?php
get_footer();?>