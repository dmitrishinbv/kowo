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
            <div class="btn-row">
                <?php
                $left_btn_text = get_post_meta($ID, 'left_btn_text', true);
                $left_btn_link = get_post_meta($ID, 'left_btn_link', true);
                AddBtn($left_btn_text, $left_btn_link);
                $right_btn_text = get_post_meta($ID, 'right_btn_text', true);
                $right_btn_link = get_post_meta($ID, 'right_btn_link', true);
                AddBtn($right_btn_text, $right_btn_link);
                ?>
            </div>
        </section>
        <?php AddGradientLine(); ?>
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
        <?php AddGradientLine(); ?>
        <section class="events-slider">
            <?php
            $query = SliderData();
            if ($query) {
            $query_projects = get_posts($query);
            $count = count($query_projects);
            $class = $count > 3 ? "slider-wrapper" : "slider-nowrapper";
            ?>
            <div class="<?php echo $class; ?>">
                <?php
                foreach ($query_projects as $post) : setup_postdata($post);
                    $post_id = $post->ID;
                    ?>
                    <div class="news">
                        <?php PrintThumbnail('', 'large', true); ?>
                    </div>
                <?php endforeach;
                } ?>
            </div>
            <?php AddBtn($events_btn_text, $events_btn_link, 'white-background-line'); ?>
        </section>
        <?php
        $pages = get_pages(array(
            'meta_key' => '_wp_page_template',
            'meta_value' => 'page-kowowork.php'
        ));
        if (is_array($pages) && count($pages) > 0) {
            AddKowoAccessories($pages[0]->ID);
        }
        AddGradientLine();
        AddContactsBlock();
        AddMap();


        ?>
    </main>


<?php
do_action('AddScriptHome');
get_footer(); ?>