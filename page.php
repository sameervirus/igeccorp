<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package igeccorp
 */

get_header(null, ['pageClass' => ' general-content-header full-header ', 'pageIdClass' => ' general-content ']);
?>

	<main id="primary" class="general-content full-header">

		<?php
		while ( have_posts() ) : 
			the_post(); ?>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			<div class="full-width-header" style="background-image:url(<?php echo $image[0]; ?>);"></div>
			<?php if(get_post_meta($post->ID, 'logo', true)) : ?>
			<div class="is-layout-flex wp-container-3 wp-block-columns are-vertically-aligned-center">
				<div class="is-layout-flow wp-block-column is-vertically-aligned-center">
					<h4 class="has-text-align-left" id="trusted-experience-in-wind-farm-grid-and-ebop-contracts"><?php echo get_post_meta($post->ID, 'sub_title', true); ?></h4>
				</div>
				<div class="is-layout-flow wp-block-column is-vertically-aligned-center">
					<div class="wp-block-image">
						<figure class="aligncenter size-large">
							<img decoding="async" width="1024" height="333" 
								src="/wp-content/uploads/2023/03/cropped-white-logo-png.png" alt="" 
								class="wp-image-1280" 
								srcset="<?php echo get_post_meta($post->ID, 'logo', true); ?> 1024w, 
								<?php echo get_post_meta($post->ID, 'logo', true); ?> 300w,
								<?php echo get_post_meta($post->ID, 'logo', true); ?> 768w, 
								<?php echo get_post_meta($post->ID, 'logo', true); ?> 1536w,
								<?php echo get_post_meta($post->ID, 'logo', true); ?> 2048w" 
								sizes="(max-width: 1024px) 100vw, 1024px">
						</figure>
					</div>
				</div>
			</div>
			<?php endif; ?>
		<?php
			the_content();

		endwhile; // End of the loop.
		?>

		<?php if(get_the_title() == 'Job Opportunities') : ?>
			<?php 
				$args = array( 'post_type' => 'jobs', 'posts_per_page' => 10 );
				$the_query = new WP_Query( $args ); 
				?>
			<?php if ( $the_query->have_posts() ) : ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
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
			<?php endwhile;
			wp_reset_postdata(); ?>
			<?php else:  ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>

		<?php endif; ?>

	</main><!-- #main -->

<?php
get_footer();
