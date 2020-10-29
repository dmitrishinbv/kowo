<?php

new Meta_Box(array(
    'id_meta' => 'info_events',
    'name_meta' => 'Налаштування полів сторінки',
    'post_type' => 'page',
    'file_name' => 'page-events.php',
    'meta_array' => array(

        'number_posts' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'number',
            'required' => true,
            'min' => 4,
            'title' => 'Кількість подій, які будуть відображені в слайдері (по замовчуванню 5)',
            'class' => '',
        ),

        'events_btn_text' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'text',
            'required' => true,
            'title' => 'Текст кнопки проведення заходу',
            'placeholder' => 'Приклад - Хочу провести захід',
            'class' => '',
        ),
        'events_btn_link' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'url',
            'required' => true,
            'title' => 'Посилання для кнопки "Хочу провести захід"',
            'placeholder' => 'Введіть посилання на ресурс або сайт',
            'class' => '',
        ),

        'events_next_section_text' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'text',
            'required' => true,
            'title' => 'Заголовок секції майбутніх подій',
            'placeholder' => 'Приклад - Анонси',
            'class' => '',
        ),
        'events_next_display_num' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'number',
            'min' => 1,
            'required' => true,
            'title' => 'Кількість подій, які будуть показані в секції (по замовчуванню 2)',
            'class' => '',
        ),

        'events_prev_section_text' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'text',
            'required' => true,
            'title' => 'Заголовок секції минулих подій',
            'placeholder' => 'Приклад - Минулі події',
            'class' => '',
        ),
        'events_prev_display_num' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'number',
            'min' => 1,
            'required' => true,
            'title' => 'Кількість подій, які будуть показані в секції (по замовчуванню 2)',
            'class' => '',
        ),
        'faq_title' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'text',
            'required' => true,
            'title' => 'Заголовок секції',
            'placeholder' => 'Приклад - Поширені питання',
            'class' => '',
        ),
        'faq_question' => array(
            'clone' => true,
            'delete' => true,
            'input' => 'text',
            'required' => true,
            'title' => 'Назва питання',
            'placeholder' => 'Будь-ласка, заповніть це поле',
            'class' => '',
        ),
        'faq_answer' => array(
            'clone' => true,
            'delete' => true,
            'input' => 'text',
            'required' => true,
            'title' => 'Відповідь на питання',
            'placeholder' => 'Будь-ласка, заповніть це поле',
            'class' => '',
        ),
    ),
    'groups' => array(
        array('number_posts'),
        array('events_btn_text', 'events_btn_link'),
        array('events_next_section_text', 'events_next_display_num'),
        array('events_prev_section_text', 'events_prev_display_num'),
        array('faq_title'),
        array('faq_question', 'faq_answer'),

    ),
    'title_group' => array(
        'Налаштування слайдера',
        'Налаштування кнопки проведення заходу',
        'Налаштування заголовків секцій та кількості показуваних подій',
        '',
        'Секція "Поширені питання"',
        '',
    ),
));

?>