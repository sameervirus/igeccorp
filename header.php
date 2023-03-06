<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package igeccorp
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header class="<?php echo is_front_page() ? 'home' : ''; ?>">
		<div class="top-header">
			<div class="contain">
				<a href="tel:+44(0)1454318000">+44 (0) 1454 318000</a>
			</div>
		</div>
		<div class="contain nav-contain">
			<a href="/">
				<img class="logo" src="<?php echo esc_url( wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ) );?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
			</a>
			<nav id="site-navigation" class="main-navigation">
    			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">Primary Menu</button>
    			<div class="menu-main-menu-container">
					<div>
					<?php
						wp_nav_menu(
							array(
								'container' => 'null',
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							)
						);
					?>
					</div>
				</div>
				<?php get_search_form(); ?>
				<a href="/contact" class="btn alt nav-contact">Contact Us</a>
			</nav>
		</div>
		<div id="mega-menu-holder">
			<div class="contain">
			<?php
						wp_nav_menu(
							array(
								'container' => 'null',
								'theme_location' => 'menu-1',
								'menu_id'        => 'mega-menu',
							)
						);
					?>
			</div>
		</div>
	</header>
