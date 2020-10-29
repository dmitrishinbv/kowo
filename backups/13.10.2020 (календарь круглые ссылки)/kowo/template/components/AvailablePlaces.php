<?php
function AddAvailablePlaces()
{
    global $theme_options;
    do_action('PhotoBlockStyle');
    do_action('AvailablePlacesStyle');
    ?>

    <section class="available-places">
        <?php
        $places = new WP_Query(array(
            'post_type' => 'available_places',
            'post_status' => 'publish',
        ));
        if ($places->have_posts()) :
            ?>
            <h4><?php pl_e($theme_options['available_places_title']); ?></h4>
            <div class="photo-container">
                <?php while ($places->have_posts()) : $places->the_post();
                    $id = $places->post->ID;
                    $gallery = get_post_meta($id, 'img_gallery', true);
                    $icon = '';
                    if (get_post_thumbnail_id()) {
                        $icon = wp_get_attachment_image_url(get_post_thumbnail_id(), 'thumbnail');
                    } else if (is_array($gallery)) {
                        $icon = wp_get_attachment_image_url($gallery[0], 'available_places_thumb');
                    }

                    $icon_hover = (is_array($gallery) && count($gallery) > 1) ?
                        wp_get_attachment_image_url($gallery[1], 'available_places_thumb') : false;

                    ?>
                    <div class="current-item">
                        <a href="<?php echo get_permalink($id) ?>"><div class="img-wrapper">
                            <?php if ($icon_hover) { ?>
                                 <div class="image" style=" background-image: url('<?php echo $icon; ?>')"></div>
                                 <div class="image second" style="background-image: url('<?php echo $icon_hover; ?>')"></div>

                            <?php } else { ?>
                                <div class="image" style="background-image: url('<?php echo $icon; ?>')"></div>
                            <?php } ?>
                            </div>
                            <div class="caption"><?php echo get_the_title($id) ?></div>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif;
        wp_reset_postdata();
        ?>
    </section>

    <?php
}