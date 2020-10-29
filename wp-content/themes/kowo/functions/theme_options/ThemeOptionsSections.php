<?php
function add_theme_option_sections()
{
    register_setting('theme_options', 'theme_options');

    $args = [
        ['theme_section_1', 'Відомості про компанію'],

        ['theme_section_2', 'Налаштування текстів сторінки "Організаторам"'],

        ['theme_section_3', 'Налаштування текстів та посилань для кнопок'],
    ];

    foreach ($args as $item) {
        add_settings_section($item[0], $item[1], '', 'options_main');
    }
}

add_action('admin_init', 'add_theme_option_sections');
?>