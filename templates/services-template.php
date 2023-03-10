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
               <?php endif; ?>

            <?php endwhile; ?>

         <?php endif; wp_reset_postdata(); ?>
         
      </div>
   </div>
</main>

<?php
   get_footer();
?>