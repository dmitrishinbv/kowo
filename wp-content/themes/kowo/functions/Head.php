<?php
add_action('wp_head', function () {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('headerStyle', get_template_directory_uri() . '/css/components/header.css');
    wp_enqueue_style('navMenuStyle', get_template_directory_uri() . '/css/components/nav.css');
    wp_enqueue_style('footerStyle', get_template_directory_uri() . '/css/components/footer.css');
});
// resolve wp error - Notice: ob_end_flush(): failed to send buffer of zlib output compression
//remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );

//Enqueue the Dashicons script
add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );
function load_dashicons_front_end() {
    wp_enqueue_style( 'dashicons' );
}
?>