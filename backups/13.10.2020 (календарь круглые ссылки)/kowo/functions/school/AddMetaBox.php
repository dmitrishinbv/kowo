<?php

new Meta_Box(array(
        'id_meta' => 'school_info',
        'name_meta' => 'Налаштування блоку з історією',
        'post_type' => 'page',
        'file_name' => 'page-school.php',
        'meta_array' => array(
            'history_image' => array(
                'clone' => false,
                'delete' => false,
                'input' => 'img',
                'size' => 'medium',
                'title' => 'Фото на блок',
                'placeholder' => '',
                'class' => 'meta-image hidden',
                'button' => array(
                    'title' => 'Вибрати файл зображення',
                    'class' => 'img-button',
                ),
            ),
        ),

        'groups' => array(
            array('history_image'),

        ),

        'title_group' => array(
            '',
        ),
    )
);



new Meta_Box(array(
        'id_meta' => 'school_info1',
        'name_meta' => 'Налаштування секції Vesnasoft',
        'post_type' => 'page',
        'file_name' => 'page-school.php',
        'meta_array' => array(
            'vesnasoft_h5' => array(
                'input' => 'input',
                'title' => 'Текст заголовку секції (h5)',
                'maxlength' => 60,
                'placeholder' => 'Введіть текст заголовку секції (максимум 60 символів)'
            ),
        ),

        'groups' => array(
            array('vesnasoft_h5'),

        ),

        'title_group' => array(
            'Ліва колонка секції',
        ),
    )
);

get_template_part('functions/school/AddTextareaMetaBox');

new Meta_Box(array(
        'id_meta' => 'school_info2',
        'name_meta' => ' ',
        'post_type' => 'page',
        'file_name' => 'page-school.php',
        'meta_array' => array(
            'video_link' => array(
                'input' => 'input',
                'title' => 'Посилання на відеоролик',
                'placeholder' => 'Введіть url-адресу'
            ),
            'video_caption' => array(
                'input' => 'input',
                'maxlength' => 50,
                'title' => 'Назва відеоролика',
                'placeholder' => 'Введіть назву відеоролика (не більш ніж 50 символів)'
            ),
        ),

        'groups' => array(
            array('video_link', 'video_caption'),
        ),

        'title_group' => array(
            'Права колонка секції',
        ),
    )
);

get_template_part('functions/school/AddGallery');
?>