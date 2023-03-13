<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package igeccorp
 */

?>


<div>
	<a href="<?php the_permalink(); ?>">
		<div class="service">
		<div class="service-image">
			<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
		</div>
		<div class="service-content">
			<h3 class="mt-5"><?php the_title(); ?></h3>
			<p><?php echo wp_trim_words(get_the_excerpt(), 36);?></p>
		</div>
		</div>
	</a>
</div>
	