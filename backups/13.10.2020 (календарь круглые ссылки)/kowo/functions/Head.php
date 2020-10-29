<?php
add_action('wp_head', function () {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('headerStyle', get_template_directory_uri() . '/css/header.css');
    wp_enqueue_style('navMenuStyle', get_template_directory_uri() . '/css/nav.css');
    wp_enqueue_style('footerStyle', get_template_directory_uri() . '/css/footer.css');
//    wp_enqueue_style('breadcrumbStyle', get_template_directory_uri() . '/css/breadcrumb.css');
//    wp_enqueue_style('popUpStyle', get_template_directory_uri() . '/css/products/pop_up.css');
//    wp_enqueue_style('leafletStyle', get_template_directory_uri() . '/css/lib/leaflet.css');
});
// resolve wp error - Notice: ob_end_flush(): failed to send buffer of zlib output compression
//remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
?>