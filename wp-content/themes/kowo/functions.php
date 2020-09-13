<?php
/*подключаем основные стили*/
get_template_part('functions/Head');

/*подключаем класс метабоксов*/
get_template_part('functions/metabox/MetaBox');

/*стандартные настройки админки*/
get_template_part('functions/BasicAdmin');

/*стандартные настройки сайта*/
get_template_part('functions/BasicSite');

/*регистрируем пользователськие строки для перевода*/
get_template_part('functions/LangVariables');

/*подключаем миниатюры*/
get_template_part('template/components/thumbnail');

/*Отображает мета-бокс с чекбоксом включения секции дполнительніх постов на страницу в админке*/
get_template_part('functions/DisplayAnotherPosts');

/*Создает новый метабокс для чекбоксов*/
get_template_part('functions/AddCustomMetaBox');

/*подключаем вспомогательные функции*/
get_template_part('functions/support');

/*подключаем шаблон paginate*/
get_template_part('template/components/paginate');

/*подключаем шаблон вывода на странице дополнительных постов (продуктов)*/
get_template_part('template/components/ShowAnotherPosts');

/*подключаем контент*/
get_template_part('template/components/ContentBlock');

/*обрезаем текст на заданное количество символов*/
get_template_part('template/components/BreakText');

/*подключаем хлебные крошки*/
get_template_part('template/components/breadcrumb');

/*Метабоксы для главной страницы*/
get_template_part('functions/home_page_options/add_meta_box');

get_template_part('functions/MakeField');

get_template_part('functions/RenderOptionsSettings');

/*подключаем пост продукты
    для работы используются захардкореные айди категорий товаров
*/
get_template_part('functions/products/Product');

/*подключаем отзывы*/
get_template_part('functions/reviews/Reviews');

/*подключаем попап*/
get_template_part('template/components/pop_up');

/*подключаем страницу админки для основных параметров темы*/
get_template_part('functions/theme_options/theme_options_main');

/*подключаем страницу админки для параметров страниц блогов и продуктов*/
get_template_part('functions/options_products_blogs/options_main');

/*подключаем меню*/
get_template_part('functions/NavMenu');

remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );

?>