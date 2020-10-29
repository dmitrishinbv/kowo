<?php
function theme_options()
{
    add_options_page('Параметри теми', 'Параметри теми', 'manage_options',
        'options_main', 'theme_options_page');
}

add_action('admin_menu', 'theme_options');

get_template_part('functions/theme_options/ThemeOptionsPage');
get_template_part('functions/theme_options/ThemeOptionsSections');
get_template_part('functions/theme_options/ThemeOptionsFieldsInit');
?>