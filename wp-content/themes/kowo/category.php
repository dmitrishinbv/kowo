<?php

/**
 * The template for posts category
 */
do_action('TemplateStyle');
do_action('PaginateStyle');
do_action('SeeAlsoStyles');
do_action('CategoryStyle');
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
get_header();
$curr = get_queried_object();
global $id_cat;
global $options_prod_blog;
$id_cat = $curr->term_id;
TheBreadcrumb();
?>

<main>
    <div class="container">
        <section class="section-news">
            <?php
            $query = new WP_Query(array(
                'posts_per_page' => 12,
                'paged' => $current_page,
                'post_type' => 'post',
            ));
            if ($query->have_posts()) :
                ?>

                <div class="all-news">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="news">
                            <?php PrintThumbnail(); ?>
                            <div class="info">
                                <div class="info-main">
                                    <?php PrintText(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>

                </div>
                <div class="paginate">
                    <?php
                    $link = get_category_link( $curr->term_id );
                    Paginate($query->max_num_pages, $current_page, $link, 'page');
                    wp_reset_postdata();
                    ?>
                </div>
            <?php
            else: echo '<div class="error-wrp">
                <p class="error">' . pl_e($options_prod_blog['blog_empty_posts']) . '</p>
            </div>';
            endif;
            ?>
        </section>
    </div>
</main>

<?php get_footer(); ?>