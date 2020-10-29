<?php
function add_theme_option_fields()
{
    $args = [
        ['theme_section_1', 'Номер телефону', 'company_header_phone', 20,
            'Приклад 050 20 111 80', 'input', 'Введіть номер телефону'],

        ['theme_section_1', 'Електронна адреса', 'company_email', '',
            'Приклад info@kowo.me', 'input', 'Введіть електронну адресу'],

        ['theme_section_1', 'Посилання на сторінку в Facebook', 'social_link_facebook', '',
            'Приклад https://www.facebook.com/kowo.me/', 'url', 'Введіть посилання'],

        ['theme_section_1', 'Посилання на канал в Youtube', 'social_link_youtube', '',
            'Приклад https://www.youtube.com/channel/UChye5o8tZ9MnzgvoH1EVt-w/featured', 'url', 'Введіть посилання'],

        ['theme_section_1', 'Посилання на сторінку в Instagram', 'social_link_instagram', '',
            'Приклад https://www.instagram.com/kowo.me/?hl=ru', 'url', 'Введіть посилання'],

        ['theme_section_1', 'Посилання на контакт в Telegram', 'social_link_telegram', '',
            'Приклад https://t.me/kowohub', 'url', 'Введіть посилання'],

        ['theme_section_1', 'Посилання на карту гугл', 'google_map_link', '',
            'Приклад https://www.google.com/maps/place/%D0%A8%2B%2B/@48.5049199,32.2599289,15z/data=!4m5!3m4!1s0x0:0x283b77c23e4b16bf!8m2!3d48.5049199!4d32.2599289',
            'url', 'Введіть посилання'],

        ['theme_section_1', 'Зображення для блоку контактів', 'contacts_block_img', '',
            '', 'img', ''],

         ['theme_section_2', 'Заголовок для полів з характеристиками приміщення', 'spec_caption', 30,
            'Приклад Характеристики', 'input', 'Введіть заголовок (не більше 30 символів)'],

        ['theme_section_2', 'Заголовок для цінових полів', 'price_title', 30,
            'Приклад Ціни', 'input', 'Введіть заголовок (не більше 30 символів)'],

        ['theme_section_2', 'Поле комерційногого заходу', 'commerc_title', 40,
            'Приклад комерційний захід', 'input', 'Введіть текст (не більше 40 символів)'],

        ['theme_section_2', 'Поле некомерційногого заходу', 'noncommerc_title', 40,
            'Приклад некомерційний захід', 'input', 'Введіть текст (не більше 40 символів)'],

        ['theme_section_2', 'Оплата некомерційногого заходу', 'noncommerc_pay', 30,
            'Приклад безкоштовно', 'input', 'Введіть текст (не більше 30 символів)'],

        ['theme_section_2', 'Підпис поля з ціною', 'money_caption', 20,
            'Приклад грн/год', 'input', 'Введіть текст (не більше 20 символів)'],

        ['theme_section_2', 'Заголовок секції "Календар"', 'calendar_title', 40,
            'Приклад Календар заходів', 'input', 'Введіть заголовок (не більше 40 символів)'],

        ['theme_section_3', 'Посилання для кнопки підтримати нас', 'btn_donate_link', '',
            'Приклад https://donate.kowo.me', 'url', 'Введіть посилання'],

        ['theme_section_3', 'Посилання для кнопки "Дізнатися більше"', 'shplus_btn_link', '',
            'Приклад https://programming.kr.ua/ua/courses', 'url', 'Введіть посилання'],

        ['theme_section_3', 'Текст кнопки події у Facebook', 'fb_btn_text', 30,
            'Приклад Подія у FB', 'input', 'Введіть текст кнопки (не быльше 30 символів)'],

        ['theme_section_3', 'Посилання для кнопки реєстрації на подію', 'register_btn_text', 20,
            'Приклад Реєстрація', 'input', 'Введіть текст кнопки (не быльше 20 символів)'],

        ['theme_section_3', 'Текст кнопки бронювання приміщення на сторінці "Організатори"', 'booking_btn_text', 30,
            'Приклад забронювати', 'input', 'Введіть текст кнопки (не быльше 30 символів)'],

        ['theme_section_3', 'Текст кнопки оплати приміщення на сторінці "Організатори"', 'pay_btn_text', 30,
            'Приклад оплатити', 'input', 'Введіть текст кнопки (не быльше 30 символів)'],
    ];

    foreach ($args as $field) {
        MakeThemeOptionField($field[0], $field[1], $field[2], $field[3], $field[4], $field[5], $field[6],
            'options_main', 'theme_options');
    }
}

add_action('admin_init', 'add_theme_option_fields');
?>