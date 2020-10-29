<?php
## содаем костомный тип поста
add_action('init', function () {
    $labels = array(
        'name'               => _x( 'Доступні місця', 'post type general name' ),
        'singular_name'      => _x( 'Доступні місця', 'post type singular name' ),
        'add_new'            => _x( 'Додати доступне місце', 'resource_report' ),
        'add_new_item'       => __( 'Додати доступне місце'),
        'edit_item'          => __( 'Редагувати доступне місце' ),
        'new_item'           => __( 'Нові доступні місця' ),
        'all_items'          => __( 'Всі доступні місця' ),
        'view_item'          => __( 'Дивитись доступні місця' ),
        'search_items'       => __( 'Шукати доступні місця' ),
        'not_found'          => __( 'Не знайдено' ),
        'not_found_in_trash' => __( 'Не знайдено в кошику' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Доступні місця'
    );

    $args = array(
        'labels'        => $labels,
        'description'   => 'Короткий опис доступного місця',
        'public'        => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-post-status',
        'supports'      => array( 'title', 'editor', 'thumbnail'),
        'has_archive'   => true
    );
    register_post_type( 'available_places', $args);
});
?>
