<?php
/**
 * Registers user's strings for translate with polylang
 */

pll_register_string('header_text', "Креативний ІТ-простір", 'Загальні налаштування');
pll_register_string('faq_title', "Поширені питання", 'Загальні налаштування');
pll_register_string('back_btn', "Повернутися назад", 'Загальні налаштування');
pll_register_string('first_title', "Працюємо щодня:", 'Налаштування блоку контактів');
pll_register_string('left_col_text', "Made with ❤ by Ш++", 'Налаштування блоку контактів');
pll_register_string('company_working_days', "будні з 9:00-21:00", 'Налаштування блоку контактів');
pll_register_string('company_weekend', "вихідні з 10:00-18:00", 'Налаштування блоку контактів');
pll_register_string('company_city', "м. Кропивницький,", 'Налаштування блоку контактів');
pll_register_string('footer_btn_text', "Підтримати нас", 'Налаштування блоку контактів');
pll_register_string('footer_right_text', "Повернутись вгору", 'Налаштування блоку контактів');
pll_register_string('company_street', "пров. Василівський 10 (5 поверх)", 'Налаштування блоку контактів');
pll_register_string('404_main_title', "404 Сторінку не знайдено", 'Налаштування сторінки 404');
pll_register_string('404_link_name', "Повернутись на головну", 'Налаштування сторінки 404');

$theme_options = get_option('theme_options');
if (isset($theme_options['register_btn_text'])) {
    pll_register_string('register_btn_text', $theme_options['register_btn_text'], 'Загальні налаштування');
}
if (isset($theme_options['fb_btn_text'])) {
    pll_register_string('fb_btn_text', $theme_options['fb_btn_text'], 'Загальні налаштування');
}

/*holders page*/
if (isset($theme_options['calendar_title'])) {
    pll_register_string('calendar_title', $theme_options['calendar_title'],
        'Налаштування текстів сторінки "Організаторам"');
}
if (isset($theme_options['price_title'])) {
    pll_register_string('price_title', $theme_options['price_title'],
        'Налаштування текстів сторінки "Організаторам"');
}
if (isset($theme_options['commerc_title'])) {
    pll_register_string('commerc_title', $theme_options['commerc_title'],
        'Налаштування текстів сторінки "Організаторам"');
}
if (isset($theme_options['noncommerc_title'])) {
    pll_register_string('noncommerc_title', $theme_options['noncommerc_title'],
        'Налаштування текстів сторінки "Організаторам"');
}
if (isset($theme_options['noncommerc_pay'])) {
    pll_register_string('noncommerc_pay', $theme_options['noncommerc_pay'],
        'Налаштування текстів сторінки "Організаторам"');
}
if (isset($theme_options['money_caption'])) {
    pll_register_string('money_caption', $theme_options['money_caption'],
        'Налаштування текстів сторінки "Організаторам"');
}
if (isset($theme_options['booking_btn_text'])) {
    pll_register_string('booking_btn_text', $theme_options['booking_btn_text'],
        'Налаштування текстів сторінки "Організаторам"');
}
if (isset($theme_options['pay_btn_text'])) {
    pll_register_string('pay_btn_text', $theme_options['pay_btn_text'],
        'Налаштування текстів сторінки "Організаторам"');
}

/**
 * Outputs localized string if polylang exists or output not translated one as a fallback
 *
 * @param $string
 *
 * @return  void
 */
function pl_e($string = '')
{
    if (function_exists('pll_e')) {
        pll_e($string);
    } else {
        echo $string;
    }
}