<?php
/*
Template Name: Головна
*/

get_header();
do_action('HomePageStyle');
do_action('VidbgModule');
global $options_prod_blog;
global $ID;
global $theme_uri;
$main_image = wp_get_attachment_image_url(get_post_meta($ID, 'title_image', true), 'home_main_image');
$sale_block_text = get_post_meta($ID, 'sale_block_text', true);
$sale_block_text_cover = get_post_meta($ID, 'sale_block_text_cover', true);
$about_caption = get_post_meta($ID, 'about_caption', true);
$about_image =  wp_get_attachment_image_url(get_post_meta($ID, 'about_image', true), 'full');
$comment_block_caption = get_post_meta($ID, 'comment_block_caption', true);
$comment_block_caption_cover = get_post_meta($ID, 'comment_block_caption_cover', true);
$h1_text = get_post_meta($ID, 'h1_text', true);
$h1_text_first_letter = substr($h1_text, 0, strpos($h1_text, ' '));
$h1_text_second_letter = substr($h1_text, strpos($h1_text, ' '));
?>
    <main class="main-home">
        <section class="container">
            <h1 class="title-container">
                <div class='h1-main-title'>
                    <?= $h1_text_first_letter ?>
                </div>
                <span>
                    <?= $h1_text_second_letter ?>
                </span>
            </h1>
            <div class="main-image">
                <img alt='' data-src="<?php echo $main_image; ?>" class="lazy mainimg">
            </div>
            <div class="mouse-icon"><a href='#sale'>
                    <img src="<?php echo $theme_uri . '/img/svg/mouse.svg' ?>"
                         alt="mouse svg"></a></div>
        </section>
        <section class="sale" id='sale'>
            <div class="container">
                <div class="titles-group-container">
                    <div class="title-cover">
                        <?php echo $sale_block_text_cover; ?>
                    </div>
                    <h2 class="main-title">
                        <?php echo $sale_block_text; ?>
                    </h2>
                </div>
                <?php
                $taxonomy_lang_id = get_bloginfo('language') === 'ru' ? 42 : 29 ;
                $query = new WP_Query(array(
                        'post_type' => 'products',
                        'showposts' => 5,
                        'orderby' => 'rand',
                        'tax_query' => array(
                            'relation' => 'OR',
                            array(
                                'taxonomy' => 'products_category',
                                'field' => 'id',
                                'terms' => $taxonomy_lang_id,
                            ),
                        ),
                ));

                if ($query->have_posts()) : ?>
                    <div class="products">
                        <?php while ($query->have_posts()) : $query->the_post();
                            $id = $query->post->ID;
                            $post_terms = get_the_terms($id, 'products_category');
                            global $id_cat;
                            foreach ($post_terms as $term) {
                                if ($term->slug !== 'sale' && $term->slug !== 'catalog' && $term->slug !== 'all') {
                                    $id_cat = $term->term_id;
                                    break;
                                }
                            }
                            $start_amount = get_post_meta($id, 'start_amount', true); ?>
                            <div class="home product">
                                <?php PrintThumbnail() ?>
                                <div class="info">
                                    <div class="title-height">
                                        <div class="title-products">
                                            <a href="<?php the_permalink() ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="type-order">
                                        <?php if ($start_amount !== '') : ?>
                                            <div class="type-order-start">
                                            <span>
                                                <?php pl_e($options_prod_blog['products_order_start']) ?>
                                            </span>
                                                <span>
                                                <?php echo number_format($start_amount,
                                                        2, ',', ' ') . ' ' ?>
                                                </span>
                                                <span>
                                                    <?php pl_e($options_prod_blog['products_money']); ?>
                                                </span>
                                            </div>
                                        <?php else : ?>
                                            <p class="type-order-info">
                                                <?php pl_e($options_prod_blog['products_info']) ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <section class="why-we container">
            <div class="titles-group-container">
                <div class='main-title'>
                    <?= get_post_meta($ID, 'why_block_text', true); ?>
                </div>
                <div class='title-cover'>
                    <?= get_post_meta($ID, 'why_block_text_cover', true); ?>
                </div>
            </div>
            <div class="why-we-texts">
                <?php
                for ($i = 1; $i < 5; $i++) {
                    $title = "0" . $i;
                    $caption = get_post_meta($ID, "caption_text_0" . $i, true);
                    $text = get_post_meta($ID, "text_0" . $i, true);
                    echo "<div class='why-we-container'><div class='title'><div>" . $title . "</div></div>
                <div class='why-we-caption'>" . $caption . " </div>
                <div class='why-we-text'>" . $text . "</div>
                </div>";
                } ?>
            </div>
        </section>
        <section class="about-us">
            <div class="left-col">
                <div class="img lazy" data-src='<?php echo $about_image; ?>' style="background: url('') center / cover no-repeat;"></div>
            </div>
            <div class="right-col">
                <h2 class="title-about-us">
                    <?php echo $about_caption; ?>
                </h2>
                <div class="info-about-us">
                    <?php if (have_posts()) : while (have_posts()) : the_post();
                        the_content(); endwhile; endif; ?>
                </div>
            </div>
        </section>
        <section class="review-block">
            <div class="container">
                <div class="titles-group-container center">
                    <div class="title-cover">
                        <?php echo $comment_block_caption_cover; ?>
                    </div>
                    <h2 class="main-title about-us-center">
                        <?php echo $comment_block_caption ?>
                    </h2>
                </div>
                <?php
                $reviews = new WP_Query(array(
                    'post_type' => 'reviews',
                    'showposts' => 5,
                    'orderby' => 'rand',
                ));
                if ($reviews->have_posts()) :
                    ?>
                    <div class="reviews-slider">
                        <?php while ($reviews->have_posts()) : $reviews->the_post();
                            $id = $reviews->post->ID;
                            $name_social = get_post_meta($id, 'name_social', true);
                            $link_social = get_post_meta($id, 'link_social', true);
                            $icon = wp_get_attachment_image_url(get_post_thumbnail_id(), 'thumbnail'); ?>
                            <div class="review">
                                <div class="left-col">
                                    <div class="icon-review" style="
                                            background: url('<?php echo $icon; ?>') center / cover no-repeat"></div>
                                </div>
                                <div class="right-col">
                                    <?php the_title('<div class="name-review">', '</div>') ?>
                                    <div class="review-info">
                                        <?php echo BreakText(get_the_content(), 300); ?>
                                    </div>
                                    <a href="<?php echo $link_social; ?>" class="social-name">
                                        <?php echo $name_social; ?>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif;
                wp_reset_postdata();
                ?>
            </div>
        </section>
        <div class="container">
            <?php
            $title1 = get_post_meta($ID, "blog_block_caption", true);
            $title2 = get_post_meta($ID, "blog_block_caption_cover", true);
            ShowAnotherPosts($post, true, $title1, $title2, 'page-home'); ?>
        </div><!-- container -->
    </main><!-- main -->

<?php
do_action('AddScriptHome');
get_footer(); ?>