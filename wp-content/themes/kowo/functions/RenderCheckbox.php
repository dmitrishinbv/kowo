<?php
// Отображает чекбокс в админпанели
function RenderCheckbox($post, $key)
{
    $checkboxMeta = get_post_meta($post->ID, $key['args'], 1);
    ?>
    <input type="hidden" name="extra[<?= $key['args'] ?>]" value="">
    <label><input type="checkbox" name="extra[<?= $key['args'] ?>]" value="1"
            <?php if ($checkboxMeta === '' || $checkboxMeta == 'on' || $checkboxMeta == 1) { ?>
                checked='checked'
            <?php } ?> /> Показати</label>

    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>"/>
    <?php

}


// Сохраняем данные, при сохранении поста (страницы)
function SaveMetaData($post_id)
{
    // базовая проверка
    if (
        empty($_POST['extra'])
        || !wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__)
        || wp_is_post_autosave($post_id)
        || wp_is_post_revision($post_id)
    )
        return false;

    if (!current_user_can('edit_post', $post_id))
        return false;

    // Все ОК! Теперь, нужно сохранить/удалить данные
    foreach ($_POST['extra'] as $key => $value) {

        if (!isset($value) || $value == 1 || $value == 'on') {
            update_post_meta($post_id, $key, 'on');

        } else {
            update_post_meta($post_id, $key, "off");
        }
    }


    return $post_id;
}

add_action('save_post', 'SaveMetaData');
?>