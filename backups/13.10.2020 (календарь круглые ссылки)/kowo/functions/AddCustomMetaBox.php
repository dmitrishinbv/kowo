<?php
// Создает новый мета-бокс через хук
function AddCustomMetaBoxFunc ($id, $title, $callback, $screen, $context, $priority, $callback_args) {
    add_meta_box( $id, $title, $callback, $screen, $context, $priority, $callback_args);
}
// Регистрируем хук
add_action('AddCustomMetaBox', 'AddCustomMetaBoxFunc', 10, 7);
?>