<?php
function AddCalendar()
{
    global $theme_options;
    do_action('AddCalendar');
    $event_data = [];
    $events = new WP_Query(array(
        'post_type' => 'post',
        'post_status' => 'publish',
    ));
    if ($events->have_posts()) : ?>
        <?php while ($events->have_posts()) :
            $events->the_post();
            $id = $events->post->ID;
            $event_link = get_permalink();
            $event_title = get_the_title();
            $event_date = get_post_meta($id, 'event_date', true);
            $event_date_finish = get_post_meta($id, 'event_date_finish', true);
            $event_time = get_post_meta($id, 'event_time', true);
            $event_calendar_title = get_post_meta($id, 'event_calendar_title', true);
            $event_calendar_title = ($event_calendar_title === '') ? BreakText($event_title, 45)
                : $event_calendar_title;
            $item_data = array(
                'link' => $event_link,
                'title' => $event_title,
                'calendar_title' => $event_calendar_title,
                'date_start' => $event_date,
                'date_finish' => $event_date_finish,
                'time' => $event_time,
            );
            array_push($event_data, $item_data);
        endwhile;
    endif;
    wp_reset_postdata();

    ?>
    <script> let eventsData = '<?= json_encode($event_data) ?>'; </script>
    <div class="calendar">
        <div class="faq-title">
            <h5><?php pl_e($theme_options['calendar_title']); ?></h5>
        </div>
        <div id="datepicker"></div>
    </div>
    <?php
}