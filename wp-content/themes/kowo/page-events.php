<?php
/*
Template Name: Відвідувачам
*/

get_header();
do_action('PageEventsStyle');
do_action('AddSlider');
global $ID;
global $cat_id_announs;
global $cat_id_prev;

?>
    <main class="page-events">
        <?php AddPageTopSection(); ?>
        <?php
        $query = SliderData();
        if ($query) {
            $query_projects = get_posts($query);
            $count = count($query_projects);
            if ($count > 3) {
                ?>
                <section class="slider">
                <div class="slider-wrapper">
                <?php
                foreach ($query_projects as $post) : setup_postdata($post);
                    $post_id = $post->ID;
                    ?>
                    <div class="news">
                        <?php PrintThumbnail('', 'slider_img', true); ?>
                    </div>
                <?php endforeach;
                echo "</div>";
            } ?>
            </section>
            <?php
        }
        AddBtn(get_post_meta($ID, 'events_btn_text', true),
            get_post_meta($ID, 'events_btn_link', true),
            'white-background-line', 'green-background'); ?>
        <?php AddGradientLine();
        $hasSection = false;
        $events = new WP_Query(array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'cat' => $cat_id_announs,
        ));
        if ($events->have_posts()) {
        $hasSection = true;
        ?>
        <section class="announcements container">
            <div class="title">
                <div class="title-line"></div>
                <h5><?php echo get_post_meta($ID, 'events_next_section_text', true); ?></h5>
            </div>
            <?php
            RenderEvents($events, true);
            wp_reset_postdata();
            }
            ?>
        </section>

        <?php
        $events = new WP_Query(array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'cat' => $cat_id_prev,
        ));
        if ($events->have_posts()) {
        $hasSection = true;
        ?>
        <section class="previous-events container">
            <div class="title">
                <div class="title-line"></div>
                <h5><?php echo get_post_meta($ID, 'events_prev_section_text', true); ?></h5>
            </div>
            <?php
            RenderEvents($events, false);
            wp_reset_postdata();
            }
            ?>

        </section>
        <?php
        if ($hasSection) {
            AddGradientLine();
        }
        AddFaqBlock();
        ?>
    </main>

<?php get_footer(); ?>