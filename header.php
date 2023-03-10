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
global $post;
	$head_class = is_front_page() ? 'home' : '';
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
<div id="page" class="<?php 
						echo @$args['pageIdClass']; 
						echo $args['serviceaIdClass']; 
						echo $args['homeIdClass']; 
						echo $args['prjectIdClass']; 
						echo $args['archiveIdClass']; ?>">
	<header class="<?php 
						echo $head_class; 
						echo @$args['headerClass']; 
						echo @$args['pageClass']; 
						echo @$args['projectClass']; 
						echo @$args['archiveIdClass']; ?>">
		<div class="top-header">
			<div class="contain">
				<a href="tel:<?php echo get_theme_mod('igeccorp_phone_op'); ?>"><?php echo get_theme_mod('igeccorp_phone_op'); ?></a>
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
		<?php if(@$args['serviceaIdClass']) : ?>
			<div class="contain">
				<div class="services-header-intro">
					<div>
						<span><?php the_title(); ?></span>
						<h1 class="h3"><?php echo get_post_meta($post->ID, 'sub_title', true); ?></h1>
						<?php the_excerpt(); ?>
					</div>
					<div>
						<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if(@$args['projectIdClass']) : ?>
			<div class="contain">
				<div class="services-header-intro">
					<div>
						<span><?php echo get_post_meta($post->ID, 'sub_title', true); ?></span>
						<h1 class="h3"><?php the_title(); ?></h1>
						<?php the_excerpt(); ?>
					</div>
					<div>
						<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if(@$args['archiveIdClass']) : ?>
			<div class="contain">
				<div class="archive-centered-header-intro">
					<div>
						<h1><?php the_title(); ?></h1>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if(@$args['pageClass']) : ?>
			<div class="contain">
				<div class="general-content-centered-header-intro">
					<div>
						<h1><?php the_title(); ?></h1>
					</div>
				</div>
			</div>
		<?php endif; ?>
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
