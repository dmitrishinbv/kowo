
<?php
/*выводимм миниатюру*/
function PrintThumbnail($img_id = '', $thumb_size = '', $post_thumb = false){

    global $theme_uri;
    $thumb_size = ($thumb_size !== '') ? $thumb_size : 'medium';

    if ($img_id && !$post_thumb) {
        $img_url = wp_get_attachment_image_url($img_id, $thumb_size);
        ?>
        <div class="img lazy"
             data-src="<?php echo $img_url; ?>"
             style="background: url('<?php echo $img_url; ?>') center center / cover no-repeat;">
        </div>
        <?php
    }

    if ($post_thumb ) {
        $img = get_post_thumbnail_id() ? wp_get_attachment_image_url(get_post_thumbnail_id(), $thumb_size) :
            $theme_uri . '/img/unnamed.png'; ?>
        <a class="permalink" href="<?php the_permalink(); ?>">
            <img src="<?php echo $img ?>" alt="<?php the_title() ?>" class="img-news lazy"'>
        </a>
    <?php }
}
?>
