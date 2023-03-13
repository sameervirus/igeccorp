<?php
/**
 * Template Name: Services
 *
 * This template displays a service.
 *
 * @package igeccorp
 */
get_header(null, ['headerClass' => ' services-header ', 'serviceaIdClass' => ' services ']);
?>

<main class="services-page">
   <div class="services-list">
      <div class="contain">
      <?php
               
         $args = array(
            'post_type'      => 'page',
            'posts_per_page' => 999,
            'post_parent'    => get_the_ID(),
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
</main>

<?php
   get_footer();
?>