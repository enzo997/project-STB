<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"></a>
		<header class="header">
			<div class="header-desktop">
				<div class="container">
					<div class="content">
						<div class="element element-logo">
								<?php 
									$header = get_field('header', 'option');
									$logo = $header['logo']['url'];
									$btnGet = $header['cta'];
								?>
								<a href="<?php echo home_url(); ?>">
									<img src="<?php echo $logo ;?>" alt="<?php echo $logo;?>">
								</a>
							</div>
						<div class="element element-main-menu">
							<div class="main-menu--content">
								<?php // lay cac gia tri tu wordpress//phan moi them----tao menutop----
									wp_nav_menu(
										array(
											'menu' => 'Menu Top',
											'container' => 'false',
											'menu_class' => 'header-menu d-flex'
										)
										);
									?>
							</div>
						</div>
						<a href="<?php echo $btnGet; ?>" target class="element element-btn-get-started">GET STARTED</a>
					</div>
				</div>	
			</div>
		</header><!-- #masthead -->
	<div id="content" class="site-content">

</div>


