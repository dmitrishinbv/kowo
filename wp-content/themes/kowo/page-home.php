<?php
/*
Template Name: Головна
*/

get_header();
do_action('HomePageStyle');
do_action('AddSlider');

global $ID;
global $theme_uri;
global $theme_options;
global $cat_id_announs;
global $cat_id_prev;
$events_btn_text = get_post_meta($ID, 'events_btn_text', true);
$events_btn_link = get_post_meta($ID, 'events_btn_link', true);
if (get_post_thumbnail_id()) {
    $main_img = wp_get_attachment_image_url(get_post_thumbnail_id(), 'full');
} else {
    $main_img = '';
}
?>
    <main class="main-home">
        <section class="home-first">
            <div class="img-cover"
                 style="background: url('<?php echo $main_img ?>') center center / cover no-repeat; "></div>
            <div class="t-cover__filter"></div>
            <div class="titles">
                <?php
                $h2 = get_post_meta($ID, 'h2_text', true);
                if ($h2) echo '<h2>'.$h2.'</h2>';
                $h3 = get_post_meta($ID, 'h3_text', true);
                if ($h3) echo '<h3>'.$h3.'</h3>'; ?>
            <div class="btn-row">
                <?php
                $left_btn_text = get_post_meta($ID, 'left_btn_text', true);
                $left_btn_link = get_post_meta($ID, 'left_btn_link', true);

                if ($left_btn_text && $left_btn_link) {
                    AddBtn($left_btn_text, $left_btn_link);
                }

                $right_btn_text = get_post_meta($ID, 'right_btn_text', true);
                $right_btn_link = get_post_meta($ID, 'right_btn_link', true);

                if ($left_btn_text && $left_btn_link) {
                    AddBtn($right_btn_text, $right_btn_link);
                }

                ?>
            </div>
            </div>
        </section>
        <?php AddGradientLine();
        $checkContent = get_the_content();
        if (!empty($checkContent)) {
            ?>
            <section class="kowo-description">
                <div class="row">
                    <?php
                    $img_id = get_post_meta($ID, 'section_main_img', true);
                    $main_img_url = wp_get_attachment_image_url($img_id, 'home_kowo_main');
                    ?>
                    <div class="content">
                        <?php while (have_posts()) : the_post();
                            the_content(); endwhile; ?>
                    </div>
                    <?php PrintThumbnail($img_id, 'home_kowo_main'); ?>
                </div>

                <div class="gallery-row">
                    <?php
                    for ($i = 1; $i < 5; $i++) {
                        $img_id = get_post_meta($ID, 'gallery_img' . $i, true);
                        PrintThumbnail($img_id, 'contacts_img');
                    }
                    ?>
                </div>
            </section>
            <?php
            AddGradientLine();
        }
        $query = SliderData();
        if ($query) {
            $query_projects = get_posts($query);
            $count = count($query_projects);
            if ($count > 3) {
                ?>
                <section class="events-slider">
                    <div class="slider-wrapper">
                        <?php
                        foreach ($query_projects as $post) : setup_postdata($post);
                            $post_id = $post->ID;
                            ?>
                            <div class="news">
                                <?php PrintThumbnail('', 'slider_img', true); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
                <?php
            }
        } ?>
        <?php
        if ($events_btn_text && $events_btn_link) {
            AddBtn($events_btn_text, $events_btn_link, 'white-background-line');
        } ?>
        <?php
        $pages = get_pages(array(
            'meta_key' => '_wp_page_template',
            'meta_value' => 'page-kowowork.php'
        ));
        if (is_array($pages) && count($pages) > 0) {
            AddKowoAccessories($pages[0]->ID);
            AddGradientLine();
        }
        AddContactsBlock();
        AddMap();
        ?>
    </main>

<?php
do_action('AddScriptHome');
get_footer(); ?>