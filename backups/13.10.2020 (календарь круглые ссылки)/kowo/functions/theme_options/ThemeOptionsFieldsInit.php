<?php
function add_theme_option_fields()
{
    $args = [
        ['theme_section_1', 'Номер телефону, що відображається в хедері', 'company_header_phone', 20,
            'Приклад 050 20 111 80', 'input', 'Введіть номер телефону'],

        ['theme_section_1', 'Електронна адреса (блок контактів над футером)', 'company_email', '',
            'Приклад info@kowo.me', 'input', 'Введіть електронну адресу'],

        ['theme_section_1', 'Посилання на сторінку в Facebook', 'social_link_facebook', '',
            'Приклад https://www.facebook.com/kowo.me/', 'url', 'Введіть посилання'],

        ['theme_section_1', 'Посилання на канал в Youtube', 'social_link_youtube', '',
            'Приклад https://www.youtube.com/channel/UChye5o8tZ9MnzgvoH1EVt-w/featured', 'url', 'Введіть посилання'],

        ['theme_section_1', 'Посилання на сторінку в Instagram', 'social_link_instagram', '',
            'Приклад https://www.instagram.com/kowo.me/?hl=ru', 'url', 'Введіть посилання'],

        ['theme_section_1', 'Посилання на контакт в Telegram', 'social_link_telegram', '',
            'Приклад https://t.me/kowohub', 'url', 'Введіть посилання'],

        ['theme_section_1', 'Зображення для блоку контактів', 'contacts_block_img', '',
            '', 'img', ''],

       ['theme_section_2', 'Заголовок секції "Доступні місця для оренди"', 'available_places_title', 40,
            'Приклад Доступні місця для оренди', 'input', 'Введіть заголовок (не більше 40 символів)'],

        ['theme_section_2', 'Заголовок секції "Календар"', 'calendar_title', 40,
            'Приклад Календар заходів', 'input', 'Введіть заголовок (не більше 40 символів)'],

        ['theme_section_3', 'Посилання для кнопки підтримати нас', 'btn_donate_link', '',
            'Приклад https://donate.kowo.me', 'url', 'Введіть посилання'],

        ['theme_section_3', 'Посилання для кнопки "Дізнатися більше"', 'shplus_btn_link', '',
            'Приклад https://programming.kr.ua/ua/courses', 'url', 'Введіть посилання'],

        ['theme_section_3', 'Текст кнопки події у Facebook', 'fb_btn_text', '',
            'Приклад Подія у FB', 'input', 'Введіть текст кнопки'],

        ['theme_section_3', 'Посилання для кнопки реєстрації на подію', 'register_btn_text', '',
            'Приклад Реєстрація', 'input', 'Введіть текст кнопки'],






 //        ['theme_section_1', 'Copyright', 'copyright_text', '',
//            'Приклад Olberg © Copyright 2018. All Rights Reserved. Designed by BlueBird.', 'input',
//            'Введіть Copyright текст'],
//
//        ['theme_section_1', 'Назва кнопки зв`язку', 'btn_name1', 20,
//            'Приклад Напишіть нам', 'input', 'Введіть назву кнопки зв`язку (не більше 20 символів)'],
//
//        ['theme_section_2', 'Заголовок 1', 'popup_title1', '',
//            'Приклад замовлення', 'input', 'Введіть Заголовок 1'],
//
//        ['theme_section_2', 'Заголовок 2', 'popup_title2', '',
//            'Приклад Ваші контактні дані', 'input', 'Введіть Заголовок 2'],
//
//        ['theme_section_2', 'Заголовок 3', 'popup_title3', '',
//            'Приклад ДЯКУЄМО ЗА ВАШЕ ЗАМОВЛЕННЯ', 'input', 'Введіть Заголовок 3'],
//
//        ['theme_section_2', 'Заголовок 4', 'popup_title4', '',
//            'Приклад Напишіть нам', 'input', 'Введіть Заголовок 2'],
//
//        ['theme_section_2', 'Заголовок 5', 'popup_title5', '',
//            'Приклад ДЯКУЄМО ЗА ВАШЕ ПОВІДОМЛЕННЯ', 'input', 'Введіть Заголовок 3'],
//
//        ['theme_section_2', 'Placeholder 1', 'popup_placeholder1', '',
//            'Приклад СТІЛЕЦЬ БРУНО', 'input', 'Введіть текст'],
//
//        ['theme_section_2', 'Placeholder 2', 'popup_placeholder2', '',
//            'Приклад К-ть', 'input', 'Введіть текст'],
//
//        ['theme_section_2', 'Placeholder 3', 'popup_placeholder3', '',
//            'Приклад Ім’я', 'input', 'Введіть текст'],
//
//        ['theme_section_2', 'Placeholder 4', 'popup_placeholder4', '',
//            'Приклад Телефон', 'input', 'Введіть текст'],
//
//        ['theme_section_2', 'Placeholder 5', 'popup_placeholder5', '',
//            'Приклад Повідомлення', 'input', 'Введіть текст'],
//
//        ['theme_section_2', 'Текст на кнопці', 'popup_btn', '',
//            'Приклад ЗАМОВИТИ', 'input', 'Введіть текст на кнопці'],
//
//        ['theme_section_2', 'Повідомлення про успішну відправку', 'popup_ok', '',
//            'Приклад НАЙБЛИЖЧИМ ЧАСОМ З ВАМ ЗВ’ЯЖЕТЬСЯ НАШ МЕНЕДЖЕР', 'input',
//            'Введіть повідомлення про успішну відправку'],
//
//        ['theme_section_3', 'Пошта для відправки листів', 'popup_email', '',
//            'Приклад office@gmail.com', 'input', 'Введіть адресу електронної пошти'],
//
//        ['theme_section_3', 'Заголовок 1', 'comments_title1', '',
//            'Приклад Назва соціалки', 'input', 'Введіть Заголовок 1'],
//
//        ['theme_section_3', 'Заголовок 2', 'comments_title2', '',
//            'Приклад Посилання на соціалку', 'input', 'Введіть Заголовок 2'],
//
//        ['theme_section_3', 'Підзаголовок 1', 'comments_title3', '',
//            'Приклад Назва', 'input', 'Введіть Підзаголовок 1'],
//
//        ['theme_section_3', 'Підзаголовок 2', 'comments_title4', '',
//            'Приклад Посилання', 'input', 'Введіть Підзаголовок 2'],
//
//        ['theme_section_4', 'Заголовок', 'breadcrumb_home_title', '',
//            'Приклад Головна', 'input', 'Введіть заголовок'],

    ];

    foreach ($args as $field) {
        MakeThemeOptionField($field[0], $field[1], $field[2], $field[3], $field[4], $field[5], $field[6],
            'options_main', 'theme_options');
    }
}

add_action('admin_init', 'add_theme_option_fields');
?>