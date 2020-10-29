<?php
function AddAvailablePlaces()
{
    global $theme_options;
    do_action('PhotoBlockStyle');
    do_action('AvailablePlacesStyle');
    ?>

    <section class="available-places container">
    <?php
    $places = new WP_Query(array(
        'post_type' => 'available_places',
        'post_status' => 'publish',
    ));
    if ($places->have_posts()) :
        ?>
        <?php while ($places->have_posts()) : $places->the_post();
        $id = $places->post->ID;
        $gallery = get_post_meta($id, 'img_gallery', true);
        if (is_array($gallery)) : ?>
            <div class="current-item">
                <a href="<?php echo get_permalink($id) ?>">
                    <h4 class="caption"><?php echo get_the_title($id) ?></h4></a>
                <div class="img-wrapper">
                    <?php
                    $counter = 0;
                    foreach ($gallery

                    as $index => $img) :
                    if ($counter === 0) {
                        $counter++;
                        $img_url = wp_get_attachment_image_url($img, 'available_places_main'); ?>
                        <div class="col1">
                            <a data-fancybox="gallery-alt"
                               href="<?php echo wp_get_attachment_image_url($img, 'full') ?>">
                                <img src="<?php echo $img_url; ?>" alt="<?php echo get_the_title($id) ?>"
                                     title="<?php echo get_the_title($id) ?>">
                            </a>
                        </div>
                        <?php
                        if (count($gallery) === 1) {
                            echo "</div>";
                        }
                    } else {
                    $img_url = wp_get_attachment_image_url($img, 'available_places_img');
                    if ($counter === 1) {
                    $counter++; ?>
                    <div class="col2">
                        <a data-fancybox="gallery-alt"
                           href="<?php echo wp_get_attachment_image_url($img, 'full') ?>">
                            <img src="<?php echo $img_url; ?>"
                                 alt="<?php echo get_the_title($id) ?>"
                                 title="<?php echo get_the_title($id) ?>">
                        </a>
                        <?php
                        if (count($gallery) === 2) {
                            echo "</div></div>";
                        }
                        } elseif ($counter === 2) {
                        $counter++; ?>
                        <a data-fancybox="gallery-alt"
                           href="<?php echo wp_get_attachment_image_url($img, 'full') ?>">
                            <img src="<?php echo $img_url; ?>"
                                 alt="<?php echo get_the_title($id) ?>"
                                 title="<?php echo get_the_title($id) ?>">
                        </a>
                    </div>
                </div>
                <?php } else {
                    break;
                }
                }
                endforeach; ?>
                <?php
                $spec = get_post_meta($id, 'specifics_text', true);
                if (is_array($spec)) : ?>
                    <div class="place-spec-block">
                        <h5 class="place-spec-title">
                            <?php pl_e($theme_options['spec_caption']); ?>
                        </h5>
                        <div class="spec-list">
                            <?php
                            foreach ($spec as $spec_el) : ?>
                                <p><?php pl_e($spec_el) ?></p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="place-price-block">
                    <h5 class="place-price-title">
                        <?php pl_e($theme_options['price_title']); ?>
                    </h5>
                    <div class="place-price-container">
                        <div class="left-col">
                            <h6><?php pl_e($theme_options['commerc_title']); ?></h6>
                            <p><?php echo get_post_meta($id, 'price', true) . ' ';
                                pl_e($theme_options['money_caption']); ?></p>
                            <div class="btn-group">
                                <?php
                                $booking_link = get_post_meta($id, 'booking_link_commerc', true);
                                $pay_link = get_post_meta($id, 'pay_link', true);
                                if ($booking_link) {
                                    AddBtn($theme_options['booking_btn_text'], $booking_link,
                                        'white-background-line', '', '_blank');
                                }
                                if ($pay_link) {
                                    AddBtn($theme_options['pay_btn_text'], $pay_link,
                                        'white-background-line', '', '_blank');
                                }
                                ?>
                            </div>
                        </div>
                        <div class="right-col">
                            <h6><?php pl_e($theme_options['noncommerc_title']); ?></h6>
                            <p><?php pl_e($theme_options['noncommerc_pay']); ?></p>
                            <?php
                            $booking_link = get_post_meta($id, 'booking_link_nocommerc', true);
                            if ($booking_link) {
                                AddBtn($theme_options['booking_btn_text'], $booking_link,
                                    'white-background-line', '', '_blank');
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endif;
    endwhile;
        wp_reset_postdata(); ?>
        </section>
    <?php
    endif;
}