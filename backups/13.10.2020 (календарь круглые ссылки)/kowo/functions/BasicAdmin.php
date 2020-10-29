<?php
// Добавляет js скрипты общего характера
function LoadScripts()
{
    wp_enqueue_script('jquery');
}

add_action('wp_enqueue_scripts', 'LoadScripts');
// Добавляет js скрипты для админпанели
function AdminScript()
{
    wp_enqueue_media();
    wp_enqueue_script('adminMediaLibrary', get_template_directory_uri() . '/js/admin/wp_media.js', array('jquery'));
//    wp_enqueue_script('fonImage', get_template_directory_uri() . '/js/admin/fon_image.js', array('jquery'));
    wp_enqueue_script('metabox', get_template_directory_uri() . '/js/admin/meta_box.js');
    wp_enqueue_script('gallery', get_template_directory_uri() . '/js/admin/gallery.js');
}

add_action('admin_enqueue_scripts', 'AdminScript');

// Добавляет стили css для админпанели
add_action('admin_head', function () {
    wp_enqueue_style('adminItems', get_template_directory_uri() . '/css/admin/items.css');
    wp_enqueue_style('gallery', get_template_directory_uri() . '/css/admin/gallery.css');
});
?>