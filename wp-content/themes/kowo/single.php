<?php
/**
 * The template single posts
 */
get_header();
do_action('SinglePostsStyle');
do_action('PageEventsStyle');
do_action('FancyBox');
global $ID;
?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <a class="return-back container" href="#" onclick="history.back();return false;">
            <?php echo '← ';
            pl_e('Повернутися назад'); ?></a>
        <section class="container main-content">
            <?php while (have_posts()) : the_post();
                RenderSingle($ID, true);
            endwhile; ?>
        </section>
    </article>

<?php AddMap(); get_footer(); ?>