<?php

new Meta_Box(array(
    'id_meta' => 'info_posts',
    'name_meta' => 'Налаштування події',
    'post_type' => 'post',
    'meta_array' => array(

        'event_date' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'date',
            'required' => true,
            'title' => 'Дата проведення заходу (початкова)',
            'placeholder' => '',
            'class' => '',
        ),
        'event_date_finish' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'date',
            'required' => true,
            'title' => 'Дата проведення заходу (кінцева), заповніть поле якщо захід триває кілька днів',
            'placeholder' => '',
            'class' => '',
        ),
        'event_time' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'time',
            'required' => true,
            'title' => 'Час початку проведення заходу',
            'placeholder' => '',
            'class' => '',
        ),
        'event_fb_link' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'url',
            'required' => true,
            'title' => 'Посилання для кнопки "Подія у FB"',
            'placeholder' => 'Якщо є, введіть посилання на цю подію',
            'class' => '',
        ),
        'event_register_link' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'url',
            'required' => true,
            'title' => 'Посилання для кнопки "Реєстрація"',
            'placeholder' => 'Якщо необхідно, введіть посилання на форму реєстрації',
            'class' => '',
        ),

    ),
    'groups' => array(
        array('event_date', 'event_date_finish', 'event_time', 'event_fb_link', 'event_register_link'),

    ),
    'title_group' => array(
        'Інформація про подію',
    ),
));

?>