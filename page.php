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
					<h4 class="has-text-align-left" id=""><?php echo the_excerpt(); ?></h4>
				</div>
				<div class="is-layout-flow wp-block-column is-vertically-aligned-center">
					<div class="wp-block-image">
						<figure class="aligncenter size-large">
							<img decoding="async" style="width: 100%; height:auto;" 
								src="https://igeccorp.com/wp-content/uploads/2023/03/logo-png-1-e1678670653380.png" alt="" 
								class="wp-image-1280" 
								/>
						</figure>
					</div>
				</div>
			</div>
			<?php endif; ?>
		<?php
			the_content();

		endwhile; // End of the loop.
		?>
		
		<?php get_template_part( 'template-parts/content', 'speak' ); ?>

		<div class="services-list">
			<div class="contain">
		<?php 

			$current_parent_id = wp_get_post_parent_id(get_the_ID());

			$args = array(
				'post_type'      => 'page',
				'posts_per_page' => 999,
				'post_parent'    => $current_parent_id,
    			'post__not_in'   => array(get_the_ID()),
				'order'          => 'ASC',
			 );
	
	
			 $parent = new WP_Query( $args );
	
			 if ( $parent->have_posts() ) : ?>
	
				<?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
	
				   <?php if (has_post_thumbnail( $post->ID ) ): ?>
	
						<?php get_template_part( 'template-parts/content', 'service' ); ?>
	
				   <?php endif; ?>
	
				<?php endwhile; ?>
	
			 <?php endif; wp_reset_postdata(); ?>
			</div>
		</div>

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
