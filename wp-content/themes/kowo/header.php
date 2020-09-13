<!doctype html>
<html lang="uk">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;900&family=Playfair+Display:wght@400;900&display=swap"
          rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo wp_get_document_title(); ?></title>

    <?php
    wp_head();
    get_template_part('template/init_globals'); //подключаем глобальные переменные
    global $theme_options;
    global $options_prod_blog;
    $social_link1 = $theme_options['social_link1'];
    $social_link2 = $theme_options['social_link2'];
    $social_link3 = $theme_options['social_link3'];
    $social_img1 = $theme_options['social_img1'];
    $social_img2 = $theme_options['social_img2'];
    $social_img3 = $theme_options['social_img3'];
    $logo_id = (isset($theme_options['site_logo']) ? $theme_options['site_logo'] : '#');

    if (is_404()) {
        do_action('HomePageStyle');
        do_action('VidbgModule');
        do_action('PageNotFoundStyles');
    }

    $used_pll = false;

    if (is_tax()) {
        $title = single_cat_title('', 0);
        $current_term = get_queried_object();
        $id = get_term_meta($current_term->term_id, 'image_fon_meta', 1);
        $src = wp_get_attachment_image_url($id, 'full');

    } else if (is_category()) {
        $used_pll = true;
        $title = $options_prod_blog['title_page_blog'];
        $id = $options_prod_blog['page_blog_img'];
        $src = wp_get_attachment_image_url($id, 'full');

    } else {
        $title = get_the_title();
        $src = wp_get_attachment_image_url(get_post_thumbnail_id(), 'full');
    }
    ?>
</head>
<body>
<div class="wrapper">
    <header class="main-header">
        <div class="fon">
            <div class="lines"></div>
            <div class="lazy image video-container" style="  background: url(<?php echo $src ?>) no-repeat center;
                    background-size: cover;">
            </div>
        </div>

        <nav class="main-nav container">
            <div class="left-col">
                <div class="logo">
                    <a href="<?php echo get_home_url(); ?>">
                        <img class="lazy" src="<?php echo wp_get_attachment_image_url($logo_id, 'logo_image') ?>"
                             alt="company_logo">
                    </a>
                </div>
                <div class="social">
                    <ul class="social-list">
                        <li class="social-item">
                            <a href="<?php echo $social_link1; ?>">
                                <img src="<?php echo wp_get_attachment_image_url($social_img1, 'medium') ?>"
                                     alt="social 1">
                            </a>
                        </li>
                        <li class="social-item">
                            <a href="<?php echo $social_link2; ?>">
                                <img src="<?php echo wp_get_attachment_image_url($social_img2, 'medium') ?>"
                                     alt="social 2">
                            </a>
                        </li>
                        <li class="social-item">
                            <a href="<?php echo $social_link3; ?>">
                                <img src="<?php echo wp_get_attachment_image_url($social_img3, 'medium') ?>"
                                     alt="social 3">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="right-col">
                <div class="burger">
                    <span></span>
                </div>
                <?php
                wp_nav_menu([
                    'theme_location' => 'main_nav_menu',
                    'container' => 'div',
                    'container_class' => 'menu',
                    'container_id' => 'menu_id',
                    'menu_class' => 'menu-list',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                ]);

                if (!is_front_page()) {
                    ?>

                    <h1 class="title-page">
                        <?php
                        if ($used_pll) {
                            pl_e($title);
                        } else {
                            echo $title;
                        } ?>
                    </h1>
                <?php } ?>
            </div>
        </nav>
    </header>