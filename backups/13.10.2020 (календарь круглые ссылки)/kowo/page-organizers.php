<?php
/*
Template Name: Організаторам
*/

get_header();
do_action('PageOrganizersStyle');

//do_action('FancyBox');
global $theme_uri;
global $ID;
?>


<main class="main-organizers">
    <?php
    AddPageTopSection();
    AddGradientLine();
    ?>
    <section class="main-content container">
        <?php while (have_posts()) : the_post(); the_content(); endwhile; ?></section>
    <section class="btn-forms">
        <div class="btn-wrapper">
            <a href="<?php echo get_post_meta($ID, 'left_btn_link', true); ?>">
                <?php echo get_post_meta($ID, 'left_btn_text', true); ?></a>
            <a href="<?php echo get_post_meta($ID, 'right_btn_link', true); ?>">
                <?php echo get_post_meta($ID, 'right_btn_text', true); ?></a>
        </div>
    </section>
    <?php
    AddGradientLine();
    AddAvailablePlaces();
    AddGradientLine();
    AddCalendar();
    AddGradientLine();
    AddFaqBlock();
    AddMap();
    ?>

</main>
<?php get_footer(); ?>