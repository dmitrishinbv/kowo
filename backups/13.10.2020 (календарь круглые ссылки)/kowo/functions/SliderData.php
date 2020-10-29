<?php
function SliderData()
{
    global $ID;
    global $cat_id_prev;
    global $cat_id_announs;
    $number = intval(get_post_meta($ID, 'number_posts', true) > 3) ?
        intval(get_post_meta($ID, 'number_posts', true)) : 5;
    $announcements_state = get_post_meta($ID, 'announcements', true);
    $prev_state = get_post_meta($ID, 'prev_events', true);
    if ($announcements_state !== 'off' && $prev_state !== 'off') {
        $query = array(
            'numberposts' => $number,
            'post_type' => 'post',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC');
    }
    if ($announcements_state === 'off' && $prev_state !== 'off') {
        $query = array(
            'numberposts' => $number,
            'post_type' => 'post',
            'cat' => $cat_id_prev,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC');
    }
    if ($announcements_state !== 'off' && $prev_state === 'off') {
        $query = array(
            'numberposts' => $number,
            'post_type' => 'post',
            'cat' => $cat_id_announs,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC');
    }
    if ($announcements_state === 'off' && $prev_state === 'off') {
        $query = false;
    }

    return $query;
}