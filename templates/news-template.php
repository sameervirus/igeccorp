<?php
/**
 * Template Name: News
 *
 * This template displays a archive.
 *
 * @package igeccorp
 */
get_header(null, ['headerClass' => ' archive-header ', 'archiveIdClass' => ' archive ']);
?>

<main class="archive-page">
    <div class="services-list">
        <div class="contain news-container">
            <div class="post-archive-wrapper">
                <div class="left">
                    <?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>
                    <?php
                        
                    $args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => 9,
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
                                        <p><?php echo get_the_date(); ?></p>
                                        <p><?php echo wp_trim_words(get_the_excerpt(), 26);?></p>
                                    </div>
                                </div>
                            </a>
                            <?php
                                $pc = get_the_category();
                                if ( ! empty( $pc ) ) {
                                    echo '<ul class="categories">';
                                    foreach ($pc as $pcategory) {
                                        echo '<li><a href="' . esc_url( get_category_link( $pcategory->term_id ) ) . '">' . esc_html( $pcategory->name ) . '</a></li>';
                                    }
                                    echo '</ul>';
                                }
                            ?>
                        </div>
                        <?php endif; ?>

                        <?php endwhile; ?>

                    <?php endif; ?>
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
                
                <div class="sidebar">
                    <aside id="secondary" class="widget-area">
                        <a href="#" class="mobile-category-toggle">Categories</a>
                        <ul class="news-categories">
                            <li>
                                <span>Categories</span>
                                <?php
                                    $categories = get_categories();
                                    if ( ! empty( $categories ) ) {
                                        echo '<ul class="child-categories">';
                                        foreach ($categories as $category) {
                                            echo '<li><a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a></li>';
                                        }
                                        echo '</ul>';
                                    }
                                ?>
                            </li>
                        </ul>
                    </aside>
                    <!-- #secondary -->
                </div>
            </div>
        </div>
   </div>
</main>

<?php
   get_footer();
?>