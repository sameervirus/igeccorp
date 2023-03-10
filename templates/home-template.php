<?php /* Template Name: Main Page */ 
    get_header(null, ['homeIdClass' => ' site ']);
    $the_post = get_post();
    $video = '';
    if( get_post_meta( $the_post->ID, 'home_video', true ) ) {
      $video = get_post_meta( $the_post->ID, 'home_video', true );
    }

?>

<main id="primary" class="home">
    <div class="home-hero">
        <div class="contain">
            <div class="intro">
                <h1>Powering the transition to a carbon-free future</h1>
                <p>Using high voltage engineering, we take projects from application to energisation, with the goal of protecting the environment</p>
                <a class="btn alt arrow" href="/contact/">Start your project</a>				
            </div>
        </div>
        <div class="video-container">
            <video autoplay="" loop="" muted="" preload="auto" src="<?php echo $video; ?>"></video>
        </div>
    </div>
    <div class="home-gradient">
      <?php $section_sectors_page = get_page_by_title('Sectors'); if($section_sectors_page) : ?>
      <div class="home-sectors">
         <div class="contain">
            <div class="intro">
               <div class="text">
                  <span><?php echo $section_sectors_page->post_title; ?></span>
                  <h2><?php echo get_post_meta($section_sectors_page->ID, 'sub_title', true); ?></h2>
                  <p><?php echo $section_sectors_page->post_excerpt; ?></p>
               </div>
               <div class="button">
                  <a href="/sectors/" class="btn arrow">View all sectors</a>
               </div>
            </div>
            <div class="featured">
               <?php
               
               $args = array(
                  'post_type'      => 'page',
                  'posts_per_page' => 2,
                  'post_parent'    => $section_sectors_page->ID,
                  'order'          => 'ASC',
               );


               $section_sectors_parent = new WP_Query( $args );

               if ( $section_sectors_parent->have_posts() ) : ?>

                  <?php while ( $section_sectors_parent->have_posts() ) : $section_sectors_parent->the_post(); ?>

                  <?php if (has_post_thumbnail( $post->ID ) ): ?>
                  <a href="<?php the_permalink(); ?>" class="featured-item">
                     <div class="featured-item-image">
                        <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
                     </div>
                     <div class="featured-item-content">
                        <h4><?php the_title(); ?></h4>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 36);?></p>
                        <span class="inline-btn arrow">Read more</span>
                     </div>
                  </a>
                  <?php endif; ?>

               <?php endwhile; ?>

               <?php endif; wp_reset_postdata(); ?>
            </div>
            <div class="sectors">
               <?php
               $args = array(
                  'post_type'      => 'page',
                  'posts_per_page' => 20,
                  'post_parent'    => $section_sectors_page->ID,
                  'order'          => 'ASC',
                  'offset'         => 2
               );


               $section_sectors_parent = new WP_Query( $args );

               if ( $section_sectors_parent->have_posts() ) : ?>

                  <?php while ( $section_sectors_parent->have_posts() ) : $section_sectors_parent->the_post(); ?>

                  <?php if (has_post_thumbnail( $post->ID ) ): ?>
                  <a href="<?php the_permalink(); ?>" class="sectors-item">
                     <div class="sectors-item-image">
                        <?php echo get_the_post_thumbnail( $post->ID, 'medium' ); ?>
                     </div>
                     <div class="sectors-item-content">
                        <h6><?php the_title(); ?></h6>
                        <span class="inline-btn arrow">Read more</span>
                     </div>
                  </a>
                  <?php endif; ?>

               <?php endwhile; ?>

               <?php endif; wp_reset_postdata(); ?>
            </div>
         </div>
      </div>
      <?php endif; ?>
      <?php
         $section_services_page = get_page_by_title('Services'); // enter your page title
         if ( $section_services_page ) : ?>
      <div class="home-services">
         <div class="contain">
            <div class="intro">
               <div class="text">
                  <span><?php echo $section_services_page->post_title; ?></span>
                  <h2><?php echo get_post_meta($section_services_page->ID, 'sub_title', true); ?></h2>
                  <p><?php echo $section_services_page->post_excerpt; ?></p>
               </div>
               <div class="button">
                  <a href="/services/electrical-infrastructure/" class="btn arrow">View all services</a>
               </div>
            </div>
            <div class="services-grid">
            <?php
                  
               $args = array(
                  'post_type'      => 'page',
                  'posts_per_page' => 8,
                  'post_parent'    => $section_services_page->ID,
                  'order'          => 'ASC',
               );


               $section_services_parent = new WP_Query( $args );

               if ( $section_services_parent->have_posts() ) : ?>

                  <?php while ( $section_services_parent->have_posts() ) : $section_services_parent->the_post(); ?>

                  <?php if (has_post_thumbnail( $post->ID ) ): ?>
                  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                  <a href="<?php the_permalink(); ?>" class="service" style="background-image:url('<?php echo $image[0]; ?>')">
                     <h6><?php the_title(); ?></h6>
                     <span>Read more</span>
                  </a>
                  <?php endif; ?>

               <?php endwhile; ?>

               <?php endif; wp_reset_postdata(); ?>
            </div>
         </div>
      </div>
      <?php endif; ?>
    </div>
   <div class="home-gradient">
      <?php
         $section_projects_page = get_page_by_title('Projects'); // enter your page title
         if ( $section_projects_page ) : ?>
      <div class="home-projects">
         <div class="contain">
            <div class="intro">
               <span><?php echo $section_projects_page->post_title; ?></span>
               <h2><?php echo get_post_meta($section_projects_page->ID, 'sub_title', true); ?></h2>
               <a class="btn arrow" href="/projects/">View all projects</a>
            </div>
            <div class="featured">
            <?php
               
               $args = array(
                  'post_type'      => 'page',
                  'posts_per_page' => 4,
                  'post_parent'    => $section_projects_page->ID,
                  'order'          => 'ASC',
               );


               $section_projects_parent = new WP_Query( $args );

               if ( $section_projects_parent->have_posts() ) : ?>

                  <?php while ( $section_projects_parent->have_posts() ) : $section_projects_parent->the_post(); ?>

                  <?php if (has_post_thumbnail( $post->ID ) ): ?>
                  <a class="project" href="<?php the_permalink(); ?>">
                     <div class="project-image">
                        <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
                     </div>
                     <div class="project-content">
                        <h6><?php the_title(); ?></h6>
                        <span class="inline-btn arrow">Read more</span>
                     </div>
                  </a>
                  <?php endif; ?>

               <?php endwhile; ?>

               <?php endif; wp_reset_postdata(); ?>               
            </div>
         </div>
      </div>
      <?php endif; ?>
      <div class="home-news">
         <div class="contain">
            <div class="intro">
               <h2>Latest News</h2>
               <a class="btn arrow" href="/news/">View all news</a>
            </div>
            <div class="news-articles">
               <input type="hidden" id="currentNumScrollsNews" value="0">
               <input type="hidden" id="newsPostsPerScroll" value="3">
               <input type="hidden" id="totalNewsPosts" value="6">
               <input type="hidden" id="totalNumScrollsNews" value="3">
               <div class="news-scroll-wrapper">
                  <div class="scroll-wrapper-inner" style="transform: translateX(0px);">
                     <?php
                     
                     $args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => 10,
                        'order'          => 'DESC',
                     );


                     $posts = new WP_Query( $args );

                     if ( $posts->have_posts() ) : ?>

                        <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>

                        <?php if (has_post_thumbnail( $post->ID ) ): ?>                        
                        <div>
                           <a href="<?php the_permalink(); ?>" class="news-article">
                              <div class="news-article-image">
                                 <?php echo get_the_post_thumbnail( $post->ID, 'medium' ); ?>
                              </div>
                              <div class="news-article-content">
                                 <h6><?php the_title(); ?></h6>
                                 <span class="inline-btn arrow">Read more</span>
                              </div>
                           </a>
                        </div>
                        <?php endif; ?>

                     <?php endwhile; ?>

                     <?php endif; wp_reset_postdata(); ?>                      
                  </div>
               </div>
               <div class="scroll-navigation">
                  <a href="#" class="prev disabled">Prev</a>
                  <a href="#" class="next">Next</a>
               </div>
            </div>
            <a class="btn mobile-btn arrow" href="#">View all news</a>
         </div>
      </div>
   </div>

   <div class="home-carbon-free">
      <div class="contain">
         <img src="https://www.powersystemsuk.co.uk/content/uploads/2022/02/carbon-free-future.jpg" alt="Powering the transition to a carbon free future" width="1100px">
      </div>
   </div>

   <div class="home-customer-services">
      <div class="contain">
         <div class="customer-services">
            <h3>Customer services</h3>
            <ul>
               <li><a class="btn arrow" href="/contact/">Report an Emergency</a></li>
            </ul>
            <p>Office opening hours: 9:00 am - 5:00 pm</p>
         </div>
         <div class="connect">
            <h3>Connect with us</h3>
            <ul>
               <?php if(get_theme_mod('igeccorp_in_op')) : ?>
               <li><a class="btn arrow" href="<?php echo get_theme_mod('igeccorp_in_op'); ?>" target="_blank">Connect with us on LinkedIn</a></li>
               <?php endif; ?>
               <?php if(get_theme_mod('igeccorp_fb_op')) : ?>
               <li><a class="btn arrow" href="<?php echo get_theme_mod('igeccorp_fb_op'); ?>" target="_blank">Follow us on Facebook</a></li>
               <?php endif; ?>
               <?php if(get_theme_mod('igeccorp_tw_op')) : ?>
               <li><a class="btn arrow" href="<?php echo get_theme_mod('igeccorp_tw_op'); ?>" target="_blank">Tweet us on Twitter</a></li>
               <?php endif; ?>
            </ul>
         </div>
      </div>
   </div>
</main><!-- #main -->
<?php
    get_footer();
?>