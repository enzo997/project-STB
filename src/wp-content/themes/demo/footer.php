<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>
<?php 
	$footer = get_field('footer', 'option');
	$logo = $footer['logo']['url'];
	$descript = $footer['description'];
	$menuItem= $footer['menu_item'];
	$menuItem1= $footer['menu_item-1'];
	$imageGroup = $footer['img-group'];
	$imageBack = $imageGroup['img-background']['url'];
	$imagePlayer= $imageGroup['img-player']['url'];
?>
<!--Form contact-->
<body>
	<div class="section sec-contact-form" style="background-image: url('<?php echo $imageBack; ?>');background-repeat: no-repeat; background-color: rgb(12, 4, 28)">
		<div class="container">
			<div class="col-body">
				<h2 class="title-h2">Get your free 7 - Day trial now</h2>
				<div class="description">
					<p>For daily MBL, NBA & major sporting event tips.
					</p>
				</div>
				<div class="contact-form">
					<?php echo do_shortcode('[contact-form-7 id="270"]');?>
				</div>
			</div>
		</div>
		<div class="col-image">
			<img src="<?php echo $imagePlayer; ?>" alt="<?php echo $imagePlayer; ?>">
		</div>
	</div>
	<!-- Footer -->
	<footer id="footer">
		<div class="footer-desktop">
			<div class="container">
				<div class="logo">
					<a href="<?php echo home_url(); ?>">
						<img src="<?php echo $logo ;?>" alt="<?php echo $logo;?>">
					</a>
				</div>
				<div class="Copyright"><?php echo $descript ;?></div>
				<div class="content-left">
					<div class="col-common col-left">
						<div class="f-nav-menu f-nav-menu-1">
							<ul id="menu-footer-menu-1" class="d-flex">
								<li class="menu-item item-1">
									<a href="<?php echo $menuItem; ?>">Terms of Use</a>
								</li>
								<li class="menu-item item-2">
									<a href="<?php echo $menuItem1; ?>">Privacy policy</a>
								</li>
							</ul>
						</div>	
					</div>
					<div class="col-common col-right">
					<div class="f-nav-menu f-nav-menu-2">
						<?php // lay cac gia tri tu wordpress//phan moi them----tao menutop----
						wp_nav_menu(
							array(
								'menu' => 'Menu Bottom',
								'container' => 'false',
								'menu_class' => 'footer-menu d-flex'
							)
							);
						?>
					</div>
				</div>
				</div>
				
			</div>
		</div>
	</footer><!-- #colophon -->
</body>

<?php wp_footer(); ?>
</body>
</html>
