<?php
/**
 * Template Name: Project Single
 *
 * @package igeccorp
 */

get_header(null, ['projectClass' => ' general-content-header full-header ', 'projectIdClass' => ' general-content ']);
?>

	<main id="primary" class="site-main general-content">

		<?php
		while ( have_posts() ) : 
			the_post(); ?>
            <div class="is-layout-flex wp-container-3 wp-block-columns" style="display:none">
                <div class="is-layout-flow wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%">
                    <figure class="wp-block-image size-full">
                        <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
                    </figure>
                </div>



                <div class="is-layout-flow wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%">
                    <?php if(get_post_meta($post->ID, 'logo', true)) : ?>
                    <figure class="wp-block-image size-full">
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
                    <?php endif; ?>

                    <figure class="wp-block-table has-small-font-size">
                        <table>
                            <tbody>
                                <tr>
                                    <td><strong>Community Windpower Limited</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Aikengall II Wind Farm </strong>in Dunbar, Scotland.<strong> Community Windpower </strong>are located in Frodsham, Cheshire</td>
                                </tr>
                            </tbody>
                        </table>
                        </figure>
                    <section class="component standalone-button-block">
                        <div class="contain">
                            <a href="https://www.powersystemsuk.co.uk/content/uploads/2022/02/Case_Study_Aikengall-II-Wind-Farm.pdf" class="inline-text-button" target="_blank">Download the full case study</a>
                        </div>
                    </section>  
                </div>
            </div>
		<?php
			the_content();

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
