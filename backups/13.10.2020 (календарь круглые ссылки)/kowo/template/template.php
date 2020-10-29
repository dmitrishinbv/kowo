<?php
/**
 * The template single and pages
 */
get_header();
?>
    <div class="container">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php
        while (have_posts()) : the_post();
            the_content();
        endwhile;; ?>
    </article>
<?php
get_footer();
?>