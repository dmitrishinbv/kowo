<?php
/*
Template Name: Ш++
*/

get_header();
do_action('PageSchoolStyle');
do_action('FancyBox');
global $theme_uri;
global $ID;
?>

    <main class="main-school">

        <?php
        AddPageTopSection();
        AddGradientLine();
        $history_img_id = get_post_meta($ID, 'history_image', true);
        ?>
        <section class="description-block container">
            <div class="left-col">
                <?php while (have_posts()) : the_post(); the_content(); endwhile; ?>
            </div>
            <div class="right-col"><img src="<?php echo wp_get_attachment_image_url($history_img_id, 'history_img'); ?>"
                                        alt="<?php echo get_bloginfo('name'); ?> school history"></div>
        </section>
        <section class="study-block container">
            <div class="title-container">
                <h5><?php pl_e('Ш++ навчає') ?></h5>
            </div>
            <div class="container">
                <div class="t-col-4">
                    <img src="<?php echo $theme_uri . '/img/svg/12ft_kid.svg' ?>"
                         alt="<?php echo get_bloginfo('name'); ?> school study kids">
                    <div class="t-col-4-title"><?php pl_e('Школярів') ?></div>
                    <div class="t-col-4-after-title"><?php pl_e('8-11 років') ?></div>
                    <div class="t-col-4-descr left-align"> - <?php pl_e('Scratch (створення анімацій та ігор)') ?><br>
                        - <?php pl_e('HTML/CSS (розробка веб-сайтів)') ?><br>
                        - <?php pl_e('Python (написання ігор та програм)') ?>
                    </div>
                </div>
                <div class="t-col-4">
                    <img src="<?php echo $theme_uri . '/img/svg/stud12-16.svg' ?>"
                         alt="<?php echo get_bloginfo('name'); ?> school study 12-16 years">
                    <div class="t-col-4-title"><?php pl_e('Підлітків') ?></div>
                    <div class="t-col-4-after-title"><?php pl_e('12-16 років') ?></div>
                    <div class="t-col-4-descr"><?php pl_e('Вивчають мову програмування') ?><br>JavaScript</div>
                </div>
                <div class="t-col-4">
                    <img src="<?php echo $theme_uri . '/img/svg/adults.svg' ?>"
                         alt="<?php echo get_bloginfo('name'); ?> school study adults">
                    <div class="t-col-4-title"><?php pl_e('Дорослих') ?></div>
                    <div class="t-col-4-after-title"><?php pl_e('від 17 років') ?></div>
                    <div class="t-col-4-descr">
                        <?php pl_e('4 місяці вивчають основи програмування (computer sciense) по Java. Після нього ще +4 місяці навчаються разом з ментором за прикладним спрямуванням: android, web, php, golang та іншими') ?></div>
                </div>
            </div>
        </section>

        <?php
        AddBtn('Дізнатися більше', $theme_options['shplus_btn_link'], 'white-background-line');
        AddGradientLine();

        ?>
        <section class="vesnasoft">
            <div class="container">
                <div class="left-col">
                    <h5> <?php echo get_post_meta($ID, 'vesnasoft_h5', true) ?></h5>
                    <div class="content-block"> <?php echo get_post_meta($post->ID, 'metabox-content', true) ?>
                    </div>
                </div>
                <div class="right-col">
                    <div class="video-block">
                        <iframe width="100%" height="100%" src="<?php echo get_post_meta($ID, 'video_link', true) ?>"
                                frameborder="0" allowfullscreen=""></iframe>
                    </div>
                    <div class="video-caption">
                        <?php echo get_post_meta($post->ID, 'video_caption', true) ?>
                    </div>
                </div>
            </div>
            <?php AddImagesGallery('img_gallery', 'large'); ?>
        </section>

    </main>
<?php get_footer(); ?>