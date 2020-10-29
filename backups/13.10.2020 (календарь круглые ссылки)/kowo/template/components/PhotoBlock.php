<?php
function AddPhotoBlock($img_keys)
{
    global $ID;
    do_action('PhotoBlockStyle');
    ?>

    <div class="photo-container">
    <?php foreach ($img_keys as $item) {
    $img = get_post_meta($ID, $item . '_block_image', true);
    $img_hover = get_post_meta($ID, $item . '_block_image_hover', true);
    ?>
    <div class="current-item">
        <a href="<?php echo wp_get_attachment_image_url($img, 'full') ?>" data-fancybox="gallery-alt">
            <div class="img-wrapper">
                <?php
                if ($img_hover) { ?>
                    <div class="image lazy" style=" background-image: url('<?php
                    echo wp_get_attachment_image_url($img, 'available_places_thumb'); ?>')"
                         data-src="<?php echo wp_get_attachment_image_url($img, 'large'); ?>"></div>
                    <div class="image second lazy" style="background-image:
                            url('<?php echo wp_get_attachment_image_url($img_hover, 'available_places_thumb'); ?>')"
                         data-src="<?php echo wp_get_attachment_image_url($img_hover, 'large'); ?>"></div>

                <?php } else { ?>
                    <div class="image lazy" style="background-image:
                            url('<?php echo wp_get_attachment_image_url($img, 'available_places_thumb');; ?>')"
                         data-src="<?php echo wp_get_attachment_image_url($img, 'large');; ?>"></div>
                <?php } ?>
        </a>
    </div>
    <h6 class="caption"><?php echo get_post_meta($ID, $item . '_block_title', true); ?></h6>

    </div>
<?php } ?>
    </div>

    <?php
}
