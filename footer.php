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
						<h5>About Us</h5>
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
						<h5>Legal</h5>
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
				<p class="phone">Call <a href="tel:+44(0)1454318000">+44 (0) 1454 318000</a></p>
				<p class="email">Email <a href="mailto:enquiries@igeccorp.com">enquiries@igeccorp.com</a></p>
			</div>
		</div><!-- .contain -->
		<div class="site-footer-extra">
			<div class="contain">
				<p>© 2023 Igeccorp</p>
				<ul class="social">
					<li><a class="twitter" href="#" target="_blank">Twitter</a></li>
					<li><a class="instagram" href="#" target="_blank">Instagram</a></li>
					<li><a class="linkedIn" href="#" target="_blank">LinkedIn</a></li>
				</ul>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
