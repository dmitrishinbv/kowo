<?php
//add_action( 'save_post', 'CheckPostCats' );
//function CheckPostCats( $post_ID) {
//    $cat_list = get_the_category($post_ID);
//    foreach ($cat_list as $cat) {
//        if ($cat->term_id === 26) {
//            wp_set_post_categories($post_ID, 26);
//        }
//        if ($cat->term_id === 33) {
//            wp_set_post_categories($post_ID, 33);
//        }
//        if ($cat->term_id === 35) {
//            wp_set_post_categories($post_ID, 35);
//        }
//    }
//}


add_action('wp', 'my_activation');
function my_activation()
{
    if (!wp_next_scheduled('change_event')) {
        wp_schedule_event(time(), 'twicedaily', 'change_event');
    }
}

add_action('change_event', 'ChangeCats');
function ChangeCats()
{
    $langs = array('ua', 'ru', 'en');
    $cats = array(24, 33, 35);
    $new_cat = array(26, 37, 39);

    foreach ($langs as $i => $lang) {
        $events = new WP_Query(array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'lang' => $lang,
            'cat' => $cats[$i],
        ));
        if ($events->have_posts()) : ?>
            <?php while ($events->have_posts()) : $events->the_post();
                $id = $events->post->ID;
                $event_date = get_post_meta($id, 'event_date', true);
                $event_date_finish = get_post_meta($id, 'event_date_finish', true);
                $event_date = ($event_date_finish && $event_date_finish > $event_date) ? $event_date_finish : $event_date;
                $event_time = get_post_meta($id, 'event_time', true);
                $change_cat = CompareDateAndTime($event_date, $event_time);
                $cat_list = get_the_category($id);
                foreach ($cat_list as $cat) {
                    if ($cat->term_id === $cats[$i] && $change_cat) {
                        wp_set_post_categories($id, $new_cat[$i]);
                    }
                }
            endwhile;
        endif;
    }
    wp_reset_postdata();
}


function CompareDateAndTime($event_date, $event_time)
{
    date_default_timezone_set('Europe/Kiev');
    $date_now = date("Y-m-d");
    if ($date_now > $event_date) {
        return true;
    }
    if ($date_now === $event_date) {
        $time_now = explode(':', date("H:i"))[0];
        $event_time = explode(':', $event_time)[0];
        return $time_now > $event_time;
    }
    return false;
}