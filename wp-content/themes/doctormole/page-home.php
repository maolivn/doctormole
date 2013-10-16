<?php
/**
 * Template Name: Home
 *
 * @package WordPress
 * @subpackage Doctor_Mole
 * @since Doctor Mole 1.0
 */

get_header(); ?>

<div id="features">
    <?php $custom_query = new WP_Query(array('post_type' => 'feature_post', 'post_status' => 'publish', 'orderby' => 'rand'));?>
    <?php if ($custom_query->have_posts()) :
    $i = 0;
    while ($custom_query->have_posts()) : $custom_query->the_post();
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');
    $url = $thumb['0'];
    ?>
        <?php if ($i % 3 == 0){ ?>
        <div class="feature-row">
        <?php } ?>
            <div class="feature">
                <img class="icon" src="<?php echo $url; ?>" alt="Feature #<?php echo $i; ?>" title="Feature #<?php echo $i; ?>"/>

                <h2><?php the_title(); ?></h2>
                <p>
                <?php
                $content = get_the_content();
                $trimmed_content = wp_trim_words( $content, 60, '<a href="'. get_permalink() .'"> ...Read More</a>' );
                echo $trimmed_content; ?>
                </p>
            </div>
        <?php $i++; if ($i % 3 == 0){ ?>
        </div>
        <?php } ?>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); // reset the query ?>
</div>
        <!-- Screenshots -->
        <div id="screenshots">
            <div class="screenshot-row">
                <div class="screenshot screenshot-first">
                    <a title="Screenshot #1" href="<?php echo get_template_directory_uri(); ?>/images/screenshots/1-full-iphone.jpg"><img src="<?php echo get_template_directory_uri(); ?>/images/screenshots/1-thumb-iphone.jpg" alt="Screenshot #1" title="Screenshot #1"/></a>
                </div>

                <div class="screenshot">
                    <a title="Screenshot #2" href="<?php echo get_template_directory_uri(); ?>/images/screenshots/2-full-iphone.jpg"><img src="<?php echo get_template_directory_uri(); ?>/images/screenshots/2-thumb-iphone.jpg" alt="Screenshot #2" title="Screenshot #2"/></a>
                </div>

                <div class="screenshot">
                    <a title="Screenshot #3" href="<?php echo get_template_directory_uri(); ?>/images/screenshots/3-full-iphone.jpg"><img src="<?php echo get_template_directory_uri(); ?>/images/screenshots/3-thumb-iphone.jpg" alt="Screenshot #3" title="Screenshot #3"/></a>
                </div>

                <div class="screenshot">
                    <a title="Screenshot #4" href="<?php echo get_template_directory_uri(); ?>/images/screenshots/4-full-iphone.jpg"><img src="<?php echo get_template_directory_uri(); ?>/images/screenshots/4-thumb-iphone.jpg" alt="Screenshot #4" title="Screenshot #4"/></a>
                </div>
            </div>
        </div>

        <div id="columns">
            <!-- Testimonials -->
            <div id="testimonials">
                <h2>WHAT IS A MELANOMA?</h2>

                <p>Melanoma is a cancer of the melanocytes (cells that produce pigment giving our skin its natural
                    colour).
                    Melanoma is by far the most serious and dangerous type of skin cancer, because it can spread easily
                    to
                    other organs in the body. </p>

                <p>When it spreads, the cancer extends downwards from the epidermis and can invade healthy tissue such
                    as
                    nearby lymph nodes or it can get into your bloodstream. Once in the bloodstream or lymphatic system,
                    the
                    cancer can easily spread to other parts of the body. That's why, even if a melanoma is cut out, the
                    cancer can reappear months or years later, often in your lungs, liver or brain.</p>

                <p>The good news is that survival rates for melanoma are high in Australia, and that melanoma develops
                    on
                    the skin so by checking your skin and being aware of any changes, melanomas can be detected before
                    they
                    have the chance to spread. However, the outcome very much depends on how deep the cancer has grown.
                    A
                    melanoma need only be 1mm deep to get into your bloodstream and spread. So detecting melanoma early
                    is
                    important. The other piece of good news is that melanoma is preventable by avoiding over exposure to
                    UVR.</p>
            </div>

            <!-- Reviews -->
            <div id="reviews">
                <h2>WHAT OUR USERS ARE SAYING</h2>

                <div class="review">
                    <h3>Elizabeth - Wow. Amazing</h3>

                    <div class="rating five"></div>
                    <p>"I have never reviewed an app but had to. U can even save analysis and name mole to show dr or
                        compare w next months photo. This will save lives."</p>
                </div>

                <div class="review">
                    <h3>Stuart - Right in the nick of time</h3>

                    <div class="rating four"></div>
                    <p>"I think I may have found one that needs checking out at the doctor and it's only been there for
                        a
                        little while. Thanks... was wondering when I should start checking out moles. :D Now I will
                        definitely ask when I see my doctor next. Would be handy if you could use photos already taken
                        on
                        the phone as the in-app camera didn't seem to work very well, and you couldn't use a flash or
                        led
                        for lighting. 4 stars. Awesome job"</p>
                </div>

                <div class="review">
                    <h3>EtheB - Thanks for providing this FOC</h3>

                    <div class="rating five"></div>
                    <p>"An interesting and potentially very useful app. Anything that heightens one's awareness of
                        diagnostic medical procedures, used with a degree of caution, is well worth investigatin and
                        this
                        one certainly appears to be a rather good example - thank you!"</p>
                </div>

                <div class="review">
                    <h3>Alan - Excellent idea </h3>

                    <div class="rating five"></div>
                    <p>"As tanning and solariums become increasingly popular skin cancer awareness should be stressed to
                        all
                        ages and demographics. This app is very innovative as it lets you see in real time the risk that
                        your mole is malignant (dangerous) it also reminds us that our moles need to be kept under
                        observation and that new moles may not always be benign. With some refinement (understandably
                        difficult with the range of cameras and knowlege of users) required to enhance user expereience
                        i
                        still think this app is a must have for anyone with a mole.. which is pretty much everyone!"</p>
                </div>
            </div>
        </div>
        <?php get_footer(); ?>
