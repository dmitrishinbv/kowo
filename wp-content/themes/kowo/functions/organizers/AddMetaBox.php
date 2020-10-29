<?php

new Meta_Box(array(
    'id_meta' => 'info_organizers',
    'name_meta' => 'Налаштування полів сторінки',
    'post_type' => 'page',
    'file_name' => 'page-organizers.php',
    'meta_array' => array(
        'h2_text' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'text',
            'required' => true,
            'title' => 'Заголовок h2 першого екрану',
            'placeholder' => 'Приклад - KOWO – простір для ваших івентів',
            'class' => '',
        ),
        'h3_text' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'text',
            'required' => true,
            'title' => 'Заголовок h3 першого екрану',
            'placeholder' => 'Приклад - Оренда івент-зони, аудиторії, переговорної в центрі Кропивницького',
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
        array('h2_text', 'h3_text'),
        array('faq_title'),
        array('faq_question', 'faq_answer'),
    ),

    'title_group' => array(
        'Заголовки першого екрану',
        'Секція "Поширені питання"',
        '',
    ),
));

?>