<?php
add_action( 'add_meta_boxes', 'wk_create_custom_meta_box');

function wk_create_custom_meta_box() {
    global $post;
    if ('page-school.php' === get_post_meta($post->ID, '_wp_page_template', true)) {
        add_meta_box('custom-textbox', __('Основний текст секції', 'wk-custom-meta-box'),
            'wk_custom_meta_box_content', 'page', 'advanced', 'high');
    }
}

/**
 *  Custom Meta Box content
 */
function wk_custom_meta_box_content( $post ) {
          ?>
        <textarea cols="30" rows="8" class="widefat"
                  name="wk-custom-content"><?php echo get_post_meta($post->ID, 'metabox-content', true); ?></textarea>
        <?php
    }

/**
 *  Save textbox content
 */
function wk_save_custom_meta_box_content( $post_id ) {
    if (isset($_POST['wk-custom-content'])) {
        $textbox_content = $_POST['wk-custom-content'];
        update_post_meta($post_id, 'metabox-content', $textbox_content);
    }
}

add_action( 'save_post', 'wk_save_custom_meta_box_content' );



