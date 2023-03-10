<?php
/**
 * Template Name: Archives
 *
 * This template displays a archive.
 *
 * @package igeccorp
 */
get_header(null, ['headerClass' => ' archive-header ', 'archiveIdClass' => ' archive ']);
?>

<main class="archive-page project">
   <div class="services-list">
      <div class="contain">
         <?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>
         <?php
               
         $args = array(
            'post_type'      => 'page',
            'posts_per_page' => 9,
            'post_parent'    => get_the_ID(),
            'order'          => 'ASC',
            'paged'          => $paged,
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
                           <p><?php echo wp_trim_words(get_the_excerpt(), 26);?></p>
                        </div>
                     </div>
                  </a>
               </div>
               <?php endif; ?>

            <?php endwhile; ?>

         <?php endif; ?>
         
      </div>
      <div class="post-pagination">
         <div class="contain">
            <?php 
            $pages = paginate_links( array(
               'current' => $paged,
               'mid_size'  => 2,
               'total' => $parent->max_num_pages,
               'type' => 'array'
            ) );
            if( is_array( $pages ) ) {
               $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
               echo '<ul>';
               foreach ( $pages as $page ) {
                       echo "<li>$page</li>";
               }
              echo '</ul>';
               };
                 wp_reset_postdata(); ?>
         </div>
      </div>
   </div>
</main>

<?php
   get_footer();
?>