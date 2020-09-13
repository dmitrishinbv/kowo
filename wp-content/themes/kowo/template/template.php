<?php
/**
 * The template single and pages
 */
get_header();
$obj = get_queried_object();
TheBreadcrumb();
?>
    <div class="container">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php
        while (have_posts()) : the_post();
            the_content();
        endwhile;; ?>
    </article>
<?php
global $options_prod_blog;
$title_text1 = $options_prod_blog['title_blog_info1'];
$title_text2 = $options_prod_blog['title_blog_info2'];
ShowAnotherPosts($post, false, $title_text1, $title_text2);
echo "</div>"; // container end
do_action('FancyBox');
do_action('LazyScripts');
get_footer();
?>