<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package igeccorp
 */

?>


<hr class="wp-block-separator has-alpha-channel-opacity">
			<div class="is-layout-flex wp-container-9 wp-block-columns">
				<div class="is-layout-flow wp-block-column" style="flex-basis:80%">
					<div class="is-layout-flex wp-container-5 wp-block-columns">
						<div class="is-layout-flow wp-block-column" style="flex-basis:100%"></div>
					</div>
					<section class="component accordion-block">
						<div class="contain">
							<div class="accordion active">
							<div class="accordion-outer-panel">
								<button class="toggle-accordion">
								<span><?php the_title(); ?></span>
								</button>
								<div class="accordion-panel">
									<div class="inner">
										<?php the_content(); ?> 
										<p><strong>To apply for this position, click here &gt;&gt;&gt;&gt;</strong></p>
									</div>
								</div>
							</div>
							</div>
						</div>
					</section>
				</div>
				<div class="is-layout-flow wp-block-column is-vertically-aligned-bottom" style="flex-basis:20%">
					<div class="is-content-justification-center is-layout-flex wp-container-7 wp-block-buttons">
						<div class="wp-block-button is-style-fill">
							<a class="wp-block-button__link wp-element-button" 
								href="mailto:<?php echo get_theme_mod('igeccorp_email_op'); ?>?subject=<?php echo the_title(); ?>"
							>Apply Here</a>
						</div>
					</div>
				</div>
			</div>