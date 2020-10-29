<?php
function AddPageTopSection($get_headings = false)
{
    do_action('PageTopSectionStyle');
    global $ID;

    if (get_post_thumbnail_id()) {
        $img_filename = wp_get_attachment_image_url(get_post_thumbnail_id(), 'full');
        $img_min_filename = wp_get_attachment_image_url(get_post_thumbnail_id(), 'thumb_min');
    } else {
        $img_filename = $img_min_filename = '';
    }

    ?>
    <section class="top-block">
        <div class="cover" style="background: url('<?php echo $img_min_filename ?>') center center / cover no-repeat; ">
            <div class="t-cover"
                 style="background: url('<?php echo $img_filename ?>') center center / cover no-repeat; ">
            </div>
            <div class="t-cover__filter"></div>
            <div class="t-container container">
                <div class="t-wrapper">
                    <?php if (!$get_headings) { ?>
                        <h2><?php echo get_the_title(); ?></h2>
                    <?php } else {
                        $h2 = get_post_meta($ID, 'h2_text', true);
                        if ($h2) echo '<h2>'.$h2.'</h2>';
                        $h3 = get_post_meta($ID, 'h3_text', true);
                        if ($h3) echo '<h3>'.$h3.'</h3>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php
}