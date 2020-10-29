<?php
get_header();
do_action('SingleAvailablePlacesStyle');
do_action('FancyBox');
global $theme_uri;
global $ID;
?>

    <article class="main-available-place container" id="post-<?php the_ID(); ?>">
        <a class="return-back" href="#" onclick="history.back();return false;">
            <?php echo '← ';
            pl_e('Повернутися назад'); ?></a>
        <?php while (have_posts()) :
        the_post(); ?>
        <h4><?php the_title(); ?></h4>
        <div class="main-content"><?php the_content();
            endwhile; ?></div>
        <?php AddImagesGallery('img_gallery', 'available_places_thumb'); ?>
    </article>


<?php get_footer(); ?>