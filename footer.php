<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package igeccorp
 */

?>

	<footer class="site-footer">
		<div class="contain">
			<div class="link-grid">
				<div class="site-footer-links">
					<div class="content">
						<h5>Engineering</h5>
						<div class="menu-engineering-container">
							<?php
								wp_nav_menu(
									array(
										'container' => 'null',
										'theme_location' => 'engineering-menu',
									)
								);
							?>
						</div>
					</div>
				</div>
				<div class="site-footer-links">
					<div class="content">
						<h5>Company</h5>
						<div class="menu-about-us-container">
							<?php
								wp_nav_menu(
									array(
										'container' => 'null',
										'theme_location' => 'about-us-menu',
									)
								);
							?>
						</div>
					</div>
				</div>
				<div class="site-footer-links">
					<div class="content">
						<h5>News</h5>
						<div class="menu-legal-container">
							<?php
								wp_nav_menu(
									array(
										'container' => 'null',
										'theme_location' => 'legal-menu',
									)
								);
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="site-footer-company">
				<p><strong>Powering the transition to a carbon-free future</strong></p>
				<a class="btn alt arrow" href="/contact/">Start your project</a>
				<p class="phone">Call <a href="<?php echo get_theme_mod('igeccorp_phone_op'); ?>"><?php echo get_theme_mod('igeccorp_phone_op'); ?></a></p>
				<p class="email">Email <a href="mailto:<?php echo get_theme_mod('igeccorp_email_op'); ?>"><?php echo get_theme_mod('igeccorp_email_op'); ?></a></p>
			</div>
		</div><!-- .contain -->
		<div class="site-footer-extra">
			<div class="contain">
				<p>© 2023 <?php echo get_bloginfo( 'name' ); ?></p>
				<ul class="social">
					<?php if(get_theme_mod('igeccorp_tw_op')) : ?>
						<li><a class="twitter" href="<?php echo get_theme_mod('igeccorp_tw_op'); ?>" target="_blank">Twitter</a></li>
					<?php endif; ?>
					<?php if(get_theme_mod('igeccorp_fb_op')) : ?>
						<li><a class="facebook" href="<?php echo get_theme_mod('igeccorp_fb_op'); ?>" target="_blank">Facebook</a></li>
					<?php endif; ?>
					<?php if(get_theme_mod('igeccorp_in_op')) : ?>
						<li><a class="linkedIn" href="<?php echo get_theme_mod('igeccorp_in_op'); ?>" target="_blank">LinkedIn</a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
