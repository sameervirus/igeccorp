<?php /* Template Name: Contact Us Page */ 
    get_header(null, ['homeIdClass' => ' site ']);
    $the_post = get_post();
?>

<main id="primary" class="contact">
    <div class="contain">
        <div class="contact-split">
            <div class="contact-split-left">
                <div class="text">
                    <span>Contact Us</span>
                    <h1 class="h2">We’d love to hear from you.</h1>
                </div>
                <div class="component container-block">
                    <div class="contact-details">
                    <div class="text">
                        <h5>Speak to an expert engineer.</h5>
                        <div>Our team of high voltage electrical engineering specialists are on hand and ready to support you.</div>
                        <div></div>
                    </div>
                    <div class="contact-details-buttons">
                        <a href="tel: <?php echo get_theme_mod('igeccorp_phone_op'); ?>" class="btn alt"><span>Call us</span> <?php echo get_theme_mod('igeccorp_phone_op'); ?></a>
                        <a href="mailto: <?php echo get_theme_mod('igeccorp_email_op'); ?>" class="btn"><span>Email us</span> <?php echo get_theme_mod('igeccorp_email_op'); ?></a>                
                    </div>
                    </div>
                </div>
                <figure class="wp-block-image size-full">
                    <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
                </figure>
                <p><strong><?php echo get_bloginfo( 'name' ); ?></strong><br><?php echo get_theme_mod('igeccorp_address_op'); ?></p>
            </div>
            <div class="contact-split-right">
                <div class="contact-split-right-form">
                    
                    <?php echo do_shortcode("[crmperks-forms id=1]"); ?>
                    
                </div>
                <div class="contact-split-right-notice">
                    <p><strong>Privacy Notice – Enquiries</strong></p>
                    <p>The information you provide us (name, email, phone number, and any other personal details within your message) will only be used to contact you in regards to your enquiry. By providing the above information you confirm that you are happy for us to contact you in regards to your enquiry. Your information will not be passed on to any third parties or used for marketing purposes by Powersystems UK.</p>
                </div>
            </div>
        </div>
        </div>
</main><!-- #main -->
<?php
    get_footer();
?>