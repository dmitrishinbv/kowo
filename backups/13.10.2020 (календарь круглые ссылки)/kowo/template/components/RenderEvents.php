<?php
function RenderEvents($events, $announcements)
{
    global $ID;
    $announcements_max = (get_post_meta($ID, 'events_next_display_num', true) > 0) ?
        get_post_meta($ID, 'events_next_display_num', true) : 2;
    $prev_max = (get_post_meta($ID, 'events_prev_display_num', true) > 0) ?
        get_post_meta($ID, 'events_prev_display_num', true) : 2;
    $announcements_counter = 0;
    $prev_counter = 0;

    if ($events->have_posts()) : ?>
        <div class="event">
            <?php while ($events->have_posts()) : $events->the_post();
                $id = $events->post->ID;

                if ($announcements) {
                    RenderSingle($id, false);
                    $announcements_counter++;
                    if ($announcements_counter === intval($announcements_max)) {
                        break;
                    }
                }

                if (!$announcements) {
                    RenderSingle($id, false);
                    $prev_counter++;
                    if ($prev_counter === intval($prev_max)) {
                        break;
                    }

                } else {
                    continue;
                }
            endwhile; ?>
        </div>
    <?php endif;
}


function RenderSingle($id, $is_single_post)
{
    global $theme_options;
    $h_open = ($is_single_post) ? '<h2>' : '<h6>';
    $h_close = ($is_single_post) ? '</h2>' : '</h6>';
    $fb_link = get_post_meta($id, 'event_fb_link', true);
    $reg_link = get_post_meta($id, 'event_register_link', true);
    ?>
    <div class="current-item"><a href="<?php the_permalink() ?>">
            <?php if (get_post_thumbnail_id()) {
                $img = wp_get_attachment_image_url(get_post_thumbnail_id(), 'thumb_event'); ?>
                <img class="event-image" src="<?php echo $img ?>" alt="<?php echo the_title() ?>">
            <?php } ?>
            <?php echo $h_open;
            the_title();
            echo $h_close; ?></a>
        <?php the_content(); ?>
        <div class="btn-row">
            <?php if ($fb_link !== '') { ?>
                <a href="<?php echo get_post_meta($id, 'event_fb_link', true); ?>">
                    <div class="fb-btn">
                        <?php pl_e($theme_options['fb_btn_text']); ?>
                    </div>
                </a>
            <?php }
            if ($reg_link !== '') {
                ?>
                <a href="<?php echo get_post_meta($id, 'event_register_link', true); ?>">
                    <div class="register-btn">
                        <?php pl_e($theme_options['register_btn_text']); ?>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>

    <?php
}