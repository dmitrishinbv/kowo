<?php

new Meta_Box(array(
    'id_meta' => 'info_available_places',
    'name_meta' => 'Додаткові налаштування',
    'post_type' => 'available_places',
    'meta_array' => array(

        'specifics_text' => array(
            'clone' => true,
            'delete' => true,
            'input' => 'text',
            'title' => 'Характеристика приміщення',
            'class' => '',
        ),
        'price' => array(
            'input' => 'number',
            'min' => 0,
            'title' => 'Вартість оренди (грн./год)',
            'class' => '',
        ),
        'booking_link_nocommerc' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'url',
            'title' => 'Посилання для кнопки "забронювати" (некомерційний захід)',
            'placeholder' => 'Введіть посилання',
            'class' => '',
        ),
        'booking_link_commerc' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'url',
            'title' => 'Посилання для кнопки "забронювати" (комерційний захід)',
            'placeholder' => 'Введіть посилання',
            'class' => '',
        ),
        'pay_link' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'url',
            'title' => 'Посилання для кнопки "оплатити"',
            'placeholder' => 'Введіть посилання',
            'class' => '',
        ),

    ),
    'groups' => array(
        array('specifics_text'),
        array('price'),
        array('booking_link_nocommerc', 'booking_link_commerc', 'pay_link'),
    ),
    'title_group' => array(
        'Характеристики',
        'Ціна',
        'Кнопки'
    ),
));

?>