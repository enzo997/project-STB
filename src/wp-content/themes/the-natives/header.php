<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
<header id="header" class="site-header" role="banner">
	<?php 
		$header = get_field('header', 'option');
		$logo_blue = $header['logo']?$header['logo']['url']:THEME_URI.'/assets/images/logo_blue.svg';
		$logo_white = $header['logo_2']?$header['logo_2']['url']:THEME_URI.'/assets/images/logo_white.svg';
	?>
	<div class="header_desktop">
		<div class="container">
			<div class="content d-flex justify-content-between align-items-center">
				<div class="logo">
					<a href="<?php echo home_url(); ?>" title="<?php echo get_bloginfo('name'); ?>">
						<img class="logo_1" src="<?php echo $logo_blue; ?>" alt="<?php echo get_bloginfo('name'); ?>">
						<!-- <img class="logo_2" src="<?php echo $logo_white; ?>" alt="<?php echo get_bloginfo('name'); ?>"> -->
					</a>
				</div>
				<div class="nav_menu">
					<?php		
						wp_nav_menu(
							array(
								'menu' => 'Main menu',
								'container' => 'false',
								'menu_class' => 'header-menu d-flex '
							)
						);
					?>
				</div>
			</div>
		</div>
	</div>

	<div class="header_mobile">
		<div class="container">
			<div class="content">
				<a href="javascript:void(0);" class="btn_bar">
					<i class="icon-menu"></i>
					<i class="icon-close"></i>
				</a>
				<div class="logo">
					<a href="<?php echo home_url(); ?>" title="<?php echo get_bloginfo('name'); ?>">
						<img class="logo_1" src="<?php echo $logo_blue; ?>" alt="<?php echo get_bloginfo('name'); ?>">
						<!-- <img class="logo_2" src="<?php echo $logo_white; ?>" alt="<?php echo get_bloginfo('name'); ?>"> -->
					</a>
				</div>
			</div>
		</div>
	</div>
</header>
	
<div class="nav_mobile_show">
	<div class="container">
		<div class="content">
			<div class="nav_menu">
				<?php		
					wp_nav_menu(
						array(
							'menu' => 'Main menu',
							'container' => 'false',
							'menu_class' => 'header-menu d-flex '
						)
					);
				?>
			</div>
			<div class="nav_social">
				<?php		
					$socials = get_field('social','option');
					if(!empty($socials)){
						echo '<ul>';
						foreach($socials  as $social){
							echo '<li><a href="'.$social['link_social']['url'].'" target="'.$social['link_social']['target'].'">'.$social['link_social']['title'].'</a></li>';
						}
						echo '</ul>';
					};
				?>
			</div>
		</div>
	</div>
</div>

<?php if(is_page_template('template/service.php')){
	?>
	<script type="text/javascript">
	    var $ = jQuery;
		$('.header_desktop .menu-item-has-children > a').parent().addClass('active');
		$('body').addClass('sub_menu_show');
	</script>
	<?php
} ?>

