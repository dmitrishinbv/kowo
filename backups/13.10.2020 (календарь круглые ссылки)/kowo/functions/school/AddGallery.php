<?php
add_action('add_meta_boxes', 'AddGallery');

// добавляет мета бокс с галереей на страницу проектов в админке
function AddGallery()
{
    global $post;
    if ('page-school.php' === get_post_meta($post->ID, '_wp_page_template', true)) {
        add_meta_box('school_gallery', 'Фотогалерея для секції Vesnasoft', 'RenderGallery',
            'page', 'advanced', 'high', false);
    }
}

function RenderGallery($post, $home_page)
{
    $gallery = get_post_meta($post->ID, 'img_gallery', 1);
    $item_gallery = '<div class="item-gallery">
                        <img src="%s" alt="img">
                        <div>
                            <input type="hidden" name="img_gallery[]" value="%s">
                            <button type="button" class="remove_image_button button">Видалити</button>
                        </div>
                     </div> ';
    ?>
    <div>
        <?php if ($home_page['args']) { ?>
            <div class="gallery-info"> <?php echo (!is_array($gallery)) ? 'Зображення не знайдені' : "" ?></div>
        <?php } ?>
        <div>
            <button type="submit" class="add-btn-gallery button">
                Завантажити зображення
            </button>
        </div>
        <div class="gallery-list">
            <?php
            if (is_array($gallery)) {
                foreach ($gallery as $key => $item) {
                    printf($item_gallery, wp_get_attachment_image_src(esc_attr($item), 'medium')[0],
                        esc_attr($item));
                }
            }
            ?>
        </div>
    </div>
    <?php
}

add_action('save_post', 'SaveData');

function SaveData($post_id)
{
    if (wp_is_post_autosave($post_id))
        return;

    if (wp_is_post_revision($post_id))
        return;

    if (!current_user_can('edit_post', $post_id))
        return;

    if (isset($_POST['img_gallery'])) {
        $item = $_POST['img_gallery'];
        $item = array_map('sanitize_text_field', $item);
        $item = array_filter($item);

        if ($item) {
            update_post_meta($post_id, 'img_gallery', $item);
        } else {
            delete_post_meta($post_id, 'img_gallery');
        }
    }
}
?>