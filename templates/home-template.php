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
                <h1>Empowering Your Vision with Innovative Electrical Solutions: Welcome to IGEC</h1>
                <p>IGEC’s mission is to deliver high-quality and cost-effective solutions for our clients' projects, both domestic and international.</p>
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
                  <a href="/services/" class="btn arrow">View all services</a>
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
    <div class="home-achievements">
      <div class="contain">
         <div class="intro">
            <span>Achievements</span>
            <h2>We're the UK's first independent connection provider since 1997</h2>
            <p>Here’s a few of our recent achievements</p>
         </div>
         <div class="achievements">
            <div class="acheivement-scroll-wrapper">
               <input type="hidden" id="currentNumScrollsAchievements" value="0">
               <input type="hidden" id="AchievementsPerScroll" value="2">
               <input type="hidden" id="totalAchievementsPosts" value="9">
               <input type="hidden" id="totalNumScrollsAchievements" value="7">
               <ul>
                  <li>
                     <p>Powersystems have connected 1,370 projects to the grid since 2000</p>
                     <a href="https://www.powersystemsuk.co.uk/powersystems-have-connected-1370-projects-to-the-grid-since-2000/" class="inline-btn arrow">Read more</a>									
                  </li>
                  <li>
                     <p>Powersystems celebrate 26 years as the UK's first Independent Connection Provider</p>
                     <a href="https://www.powersystemsuk.co.uk/powersystems-celebrate-26-years-ners-accreditation-for-132-kv-work/" class="inline-btn arrow">Read more</a>									
                  </li>
                  <li>
                     <p>Powersystems have connected 30% of all land based wind farms in the UK</p>
                     <a href="https://www.powersystemsuk.co.uk/powersystems-connect-24-of-all-u-k-land-based-wind-farm-generation/" class="inline-btn arrow">Read more</a>									
                  </li>
                  <li>
                     <p>Powersystems powering the world’s largest offshore wind farm Dogger Bank</p>
                     <a href="https://www.powersystemsuk.co.uk/powersystems-powering-the-worlds-largest-offshore-wind-farm-dogger-bank/" class="inline-btn arrow">Read more</a>									
                  </li>
                  <li>
                     <p>Powersystems awarded electrical infrastructure contract for a major tidal project off Anglesey</p>
                     <a href="https://www.powersystemsuk.co.uk/powersystems-awarded-contract-for-a-major-tidal-project-off-anglesey/" class="inline-btn arrow">Read more</a>									
                  </li>
                  <li>
                     <p>Powersystems awarded the HV contract for the 240 MW South Kyle Wind Farm</p>
                     <a href="https://www.powersystemsuk.co.uk/powersystems-awarded-hv-contract-for-south-kyle-wind-farm/" class="inline-btn arrow">Read more</a>									
                  </li>
                  <li>
                     <p>Powersystems Principal Contractor for UK's first greener grid park</p>
                     <a href="https://www.powersystemsuk.co.uk/main-contractors-announced-for-uks-first-greener-grid-park/" class="inline-btn arrow">Read more</a>									
                  </li>
                  <li>
                     <p>Powersystems receives RoSPA Gold Award for health and safety achievements</p>
                     <a href="https://www.powersystemsuk.co.uk/powersystems-receives-rospa-gold-award/" class="inline-btn arrow">Read more</a>									
                  </li>
                  <li>
                     <p>Powersystems return to Ray Wind Farm to integrate a 20 MW battery system</p>
                     <a href="https://www.powersystemsuk.co.uk/powersystems-return-to-ray-wind-farm-to-co-loacte-a-20-mw-battery-system/" class="inline-btn arrow">Read more</a>									
                  </li>
               </ul>
            </div>
            <div class="scroll-navigation">
               <a href="#" class="prev disabled">Prev</a>
               <a href="#" class="next">Next</a>
            </div>
         </div>
      </div>
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
            <p>Saudi Arabia: Office opening hours: 9:00 am - 5:00 pm<br/>
               Egypt: Office opening hours: 9:00 am - 5:00 pm </p>
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