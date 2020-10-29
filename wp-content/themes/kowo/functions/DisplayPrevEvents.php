<?php
$types = ['page'];

// Создает мета-бокс в правой боковой панеле для указанных типов страниц, постов
function DisplayPrevEvents ($types)
{
    global $post;
    if ("page-home.php" === get_post_meta($post->ID, '_wp_page_template', true) ||
        "page-events.php" === get_post_meta($post->ID, '_wp_page_template', true)) {
        do_action('AddCustomMetaBox', 'display_prev_events',
            'Показати в слайдері минулі заходи', 'RenderCheckbox', $types, 'side', 'high', 'prev_events');
    }
}

add_action('add_meta_boxes', 'DisplayPrevEvents');
?>