<?php

new Meta_Box(array(
    'id_meta' => 'info_available_places',
    'name_meta' => 'Додаткові налаштування',
    'post_type' => 'available_places',
    'meta_array' => array(

        'register_text' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'text',
            'required' => true,
            'title' => 'Текст на кнопку з формою',
            'placeholder' => 'Приклад Заповнити форму',
            'class' => '',
        ),
        'register_link' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'url',
            'required' => true,
            'title' => 'Посилання для кнопки з формою',
            'placeholder' => 'Введіть посилання на форму реєстрації',
            'class' => '',
        ),

    ),
    'groups' => array(
        array('register_text', 'register_link'),

    ),
    'title_group' => array(
        'Кнопка для форми',
    ),
));

?>