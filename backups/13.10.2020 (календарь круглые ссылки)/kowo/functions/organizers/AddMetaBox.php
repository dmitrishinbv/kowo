<?php

new Meta_Box(array(
    'id_meta' => 'info_organizers',
    'name_meta' => 'Налаштування полів сторінки',
    'post_type' => 'page',
    'file_name' => 'page-organizers.php',
    'meta_array' => array(

        'left_btn_text' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'text',
            'required' => true,
            'title' => 'Текст на ліву кнопку форми',
            'placeholder' => 'Приклад - Форма для соціальних заходів',
            'class' => '',
        ),
        'left_btn_link' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'url',
            'required' => true,
            'title' => 'Посилання на ліву кнопку форми',
            'placeholder' => 'Введіть посилання на ресурс або сайт',
            'class' => '',
        ),

        'right_btn_text' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'text',
            'required' => true,
            'title' => 'Текст на праву кнопку форми',
            'placeholder' => 'Приклад - Форма для внутрішніх зустрічей',
            'class' => '',
        ),
        'right_btn_link' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'url',
            'required' => true,
            'title' => 'Посилання на праву кнопку форми',
            'placeholder' => 'Введіть посилання на ресурс або сайт',
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
        array('left_btn_text', 'left_btn_link'),
        array('right_btn_text', 'right_btn_link'),
        array('faq_title'),
        array('faq_question', 'faq_answer'),
    ),

    'title_group' => array(
        'Кнопки форм для соціальних заходів та внутрішніх зустрічей',
        '',
        'Секція "Поширені питання"',
        '',
    ),
));

?>