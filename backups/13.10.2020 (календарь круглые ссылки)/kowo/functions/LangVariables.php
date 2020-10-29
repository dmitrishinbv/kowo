<?php
/**
 * Registers user's strings for translate with polylang
 */
$theme_options = get_option('theme_options');

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
pll_register_string('btn_text', "Дізнатися більше", 'Налаштування сторінки Ш++');
pll_register_string('study_section_title', "Ш++ навчає", 'Налаштування сторінки Ш++');
pll_register_string('study_col_title1', "Школярів", 'Налаштування сторінки Ш++');
pll_register_string('study_col_title2', "Підлітків", 'Налаштування сторінки Ш++');
pll_register_string('study_col_title3', "Дорослих", 'Налаштування сторінки Ш++');
pll_register_string('study_col_after_title_text1', "8-11 років", 'Налаштування сторінки Ш++');
pll_register_string('study_col_after_title_text2', "12-16 років", 'Налаштування сторінки Ш++');
pll_register_string('study_col_after_title_text3', "від 17 років", 'Налаштування сторінки Ш++');
pll_register_string('study_col1_descr_text1', "Scratch (створення анімацій та ігор)", 'Налаштування сторінки Ш++');
pll_register_string('study_col1_descr_text2', "HTML/CSS (розробка веб-сайтів)", 'Налаштування сторінки Ш++');
pll_register_string('study_col1_descr_text3', "Python (написання ігор та програм)", 'Налаштування сторінки Ш++');
pll_register_string('study_col2_descr_text', "Вивчають мову програмування", 'Налаштування сторінки Ш++');
pll_register_string('study_col3_descr_text', "4 місяці вивчають основи програмування (computer sciense) по Java. Після нього ще +4 місяці навчаються разом з ментором за прикладним спрямуванням: android, web, php, golang та іншими", 'Налаштування сторінки Ш++');

pll_register_string('available_places_title', $theme_options['available_places_title'], 'Налаштування заголовків');
pll_register_string('calendar_title', $theme_options['calendar_title'], 'Налаштування заголовків');
pll_register_string('register_btn_text', $theme_options['register_btn_text'], 'Загальні налаштування');
pll_register_string('fb_btn_text', $theme_options['fb_btn_text'], 'Загальні налаштування');

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