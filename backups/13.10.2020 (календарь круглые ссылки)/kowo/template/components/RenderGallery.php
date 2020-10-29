<?php
function AddImagesGallery($meta_key, $img_size = 'medium', $spec_class = '')
{
    do_action('GalleryStyle');
    global $ID;
    ?>
    <div class="photo-section <?= $spec_class ?>">
        <?php $img_gallery = get_post_meta($ID, $meta_key, true); ?>
        <?php if (is_array($img_gallery)) : ?>
            <?php foreach ($img_gallery as $id) : ?>
                <div class="slider">
                    <a data-fancybox="gallery-alt"
                       href="<?php echo wp_get_attachment_image_url($id, 'full') ?>">
                        <div class="img lazy"
                             data-src="<?php echo wp_get_attachment_image_url($id, $img_size); ?>"
                             style="background: url('<?php echo wp_get_attachment_image_url($id, 'large') ?>')
                                 center center / cover no-repeat;"></div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <?php
}