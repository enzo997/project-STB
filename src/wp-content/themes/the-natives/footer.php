    <?php 

        if(is_singular('case_study'))
            $s_contact = get_field('contact_us', 'option')['s_contact_us'];
        elseif(!is_404())
            $s_contact = get_field('s_contact_us', get_queried_object()->ID);
            
        if (!is_404() && ($s_contact['select']=='show') && (!empty($s_contact['content']['description']) && (!empty($s_contact['content']['cta'])))){
        ?>
            <section class="section sec_contact_us">
                <div class="container">
                    <div class="content">
                        <div class="description wow" data-wow-duration="1.5s"><?php echo $s_contact['content']['description']; ?></div>
                        <a class="button btn_contact wow" data-wow-duration="1.5s" href="<?php echo $s_contact['content']['cta']['url']; ?>" target="<?php echo $s_contact['content']['cta']['target']; ?>"><?php echo $s_contact['content']['cta']['title']; ?></a>
                    </div>
                </div>
            </section>
        <?php
    } ?>


    <footer id="footer" class="">
        <div class="footer">
            <?php 
                $footer = get_field('footer','option');
                // var_dump($footer);
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 desktop_show">
                        <div class="content">
                            <?php 
                                $logo = $footer['colum1']['logo']?$footer['colum1']['logo']['url']:THEME_URI.'/assets/images/logo_white.svg';
                            ?>
                            <div class="logo">
                                <a href="<?php echo home_url(); ?>" title="<?php echo get_bloginfo('name'); ?>">
                                    <img src="<?php echo $logo; ?>" alt="<?php echo get_bloginfo('name'); ?>">
                                </a>
                            </div>
                            <div class="copyright"><?php echo $footer['colum1']['copyright']; ?></div>
                            <div class="nav_menu">
                                <?php 
                                    if($f_menu = $footer['colum1']['menu']){
                                        wp_nav_menu(
                                            array(
                                                'menu' => $f_menu,
                                                'container' => 'false'
                                            )
                                        );
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="content">
                            <?php if($address = $footer['colum2']['address_group']){
                                foreach($address as $addres){
                                    ?>
                                    <div class="address"><?php echo $addres['address']; ?></div>
                                    <?php
                                }
                            }
                            
                            ?>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 desktop_show">
                        <div class="content">
                            <div class="nav_footer">
                                <?php 
                                    if($f_menu2 = $footer['colum3']['menu']){
                                        wp_nav_menu(
                                            array(
                                                'menu' => $f_menu2,
                                                'container' => 'false'
                                            )
                                        );
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="content">
                            <div class="nav_social">
                                <?php		
                                    $socials = get_field('social','option');
                                    if(!empty($socials)){
                                        echo '<div class="row">';
                                        foreach($socials  as $social){
                                            echo '
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-4 f_social">
                                                <div class="content">
                                                    <a href="'.$social['link_social']['url'].'" target="'.$social['link_social']['target'].'">'.$social['link_social']['title'].'</a>
                                                </div>
                                            </div>';
                                        }
                                        echo '</div>';
                                    };
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 mobile_show">
                        <div class="content">
                            <?php 
                                $logo = $footer['colum1']['logo']?$footer['colum1']['logo']['url']:THEME_URI.'/assets/images/logo_white.svg';
                            ?>
                            <div class="logo">
                                <a href="<?php echo home_url(); ?>" title="<?php echo get_bloginfo('name'); ?>">
                                    <img src="<?php echo $logo; ?>" alt="<?php echo get_bloginfo('name'); ?>">
                                </a>
                            </div>
                            <div class="nav_menu">
                                <?php 
                                    if($f_menu = $footer['colum1']['menu']){
                                        wp_nav_menu(
                                            array(
                                                'menu' => $f_menu,
                                                'container' => 'false'
                                            )
                                        );
                                    }
                                ?>
                            </div>
                            <div class="copyright"><?php echo $footer['colum1']['copyright']; ?></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php wp_footer(); ?>
</div>
</body>
</html>
