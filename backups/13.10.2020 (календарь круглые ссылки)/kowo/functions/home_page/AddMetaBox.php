<?php

new Meta_Box(array(
    'id_meta' => 'home_page_info',
    'name_meta' => 'Налаштування полів сторінки',
    'post_type' => 'page',
    'file_name' => 'page-home.php',
    'meta_array' => array(

        'left_btn_text' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'text',
            'required' => true,
            'title' => 'Текст на ліву кнопку першого екрану',
            'placeholder' => 'Приклад - Події',
            'class' => '',
        ),
        'left_btn_link' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'url',
            'required' => true,
            'title' => 'Посилання на ліву кнопку першого екрану',
            'placeholder' => 'Введіть посилання на сторінку',
            'class' => '',
        ),
        'right_btn_text' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'text',
            'required' => true,
            'title' => 'Текст на праву кнопку першого екрану',
            'placeholder' => 'Приклад - Коворкінг',
            'class' => '',
        ),
        'right_btn_link' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'url',
            'required' => true,
            'title' => 'Посилання на праву кнопку першого екрану',
            'placeholder' => 'Введіть посилання на сторінку',
            'class' => '',
        ),

        'section_main_img' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'img',
            'size' => 'medium',
            'title' => 'Головне фото секції',
            'placeholder' => '',
            'class' => 'meta-image hidden',
            'button' => array(
                'title' => 'Вибрати файл зображення',
                'class' => 'img-button',
            ),
        ),
        'gallery_img1' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'img',
            'size' => 'medium',
            'title' => 'Фото 1 блоку з 4 фото',
            'placeholder' => '',
            'class' => 'meta-image hidden',
            'button' => array(
                'title' => 'Вибрати файл зображення',
                'class' => 'img-button',
            ),
        ),
        'gallery_img2' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'img',
            'size' => 'medium',
            'title' => 'Фото 2 блоку з 4 фото',
            'placeholder' => '',
            'class' => 'meta-image hidden',
            'button' => array(
                'title' => 'Вибрати файл зображення',
                'class' => 'img-button',
            ),
        ),
        'gallery_img3' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'img',
            'size' => 'medium',
            'title' => 'Фото 3 блоку з 4 фото',
            'placeholder' => '',
            'class' => 'meta-image hidden',
            'button' => array(
                'title' => 'Вибрати файл зображення',
                'class' => 'img-button',
            ),
        ),
        'gallery_img4' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'img',
            'size' => 'medium',
            'title' => 'Фото 4 блоку з 4 фото',
            'placeholder' => '',
            'class' => 'meta-image hidden',
            'button' => array(
                'title' => 'Вибрати файл зображення',
                'class' => 'img-button',
            ),
        ),

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
            'title' => 'Текст на кнопку подій',
            'placeholder' => 'Приклад - Усі події простору',
            'class' => '',
        ),
        'events_btn_link' => array(
            'clone' => false,
            'delete' => false,
            'input' => 'url',
            'required' => true,
            'title' => 'Посилання на кнопку подій',
            'placeholder' => 'Введіть посилання на сторінку',
            'class' => '',
        ),



    ),
    'groups' => array(
        array('left_btn_text', 'left_btn_link', 'right_btn_text', 'right_btn_link'),
        array('section_main_img'),
        array ('gallery_img1'),
        array('gallery_img2'),
        array('gallery_img3'),
        array('gallery_img4'),
        array('number_posts', 'events_btn_text', 'events_btn_link'),

    ),

    'title_group' => array(
        'Налаштування кнопок першого екрану',
        'Налаштування секції "Опис простору" з фотогалереєю',
        '',
        '',
        '',
        '',
        'Слайдер та кнопка подій простору',
    ),
));

?>