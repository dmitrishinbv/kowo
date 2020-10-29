<?php
$types = ['page'];

// Создает мета-бокс в правой боковой панеле для указанных типов страниц, постов
function DisplayAnnouncements ($types)
{
    global $post;
    if ("page-home.php" === get_post_meta($post->ID, '_wp_page_template', true) ||
        "page-events.php" === get_post_meta($post->ID, '_wp_page_template', true)) {
        do_action('AddCustomMetaBox', 'display_announcements',
            'Показати в слайдері анонси', 'RenderCheckbox', $types, 'side', 'high', 'announcements');
    }
}

add_action('add_meta_boxes', 'DisplayAnnouncements');

get_template_part('functions/RenderCheckbox');
?>