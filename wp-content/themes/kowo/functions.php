<?php
/*подключаем основные стили*/
get_template_part('functions/Head');

/*подключаем класс метабоксов*/
get_template_part('functions/metabox/MetaBox');
//
/*стандартные настройки админки*/
get_template_part('functions/BasicAdmin');
//
/*стандартные настройки сайта*/
get_template_part('functions/BasicSite');

/*регистрируем пользователськие строки для перевода*/
get_template_part('functions/LangVariables');

/*подключаем миниатюры*/
get_template_part('template/components/Thumbnail');

///*подключаем слайдер*/
////get_template_part('template/components/Slider');
////
/*Создает новый метабокс для чекбоксов*/
get_template_part('functions/AddCustomMetaBox');

/*Отображает в админке мета-бокс с чекбоксом показа в слайдере анонсов*/
get_template_part('functions/DisplayAnnouncements');

/*Отображает в админке мета-бокс с чекбоксом показа в слайдере прошедших мероприятий*/
get_template_part('functions/DisplayPrevEvents');
//
///*Создает новый метабокс для чекбоксов*/
//get_template_part('functions/AddCustomMetaBox');
//
/*подключаем вспомогательные функции*/
get_template_part('functions/Support');

/*подключаем выборку постов с базы для слайдера*/
get_template_part('functions/SliderData');

/*подключаем функци вывода кнопки*/
get_template_part('template/components/Btn');

/*подключаем функци вывода блока с градиентной полосой*/
get_template_part('template/components/GradientLine');
//
/*подключаем функцию блока с контактами*/
get_template_part('template/components/ContactsBlock');

/*подключаем функцию вывода постов событий в соотвествии с текущим временем*/
get_template_part('template/components/RenderEvents');

/*подключаем функцию вывода блока "Поширені питання"*/
get_template_part('template/components/FaqBlock');

/*подключаем функцию вывода блока c 3 фото*/
get_template_part('template/components/PhotoBlock');

/*обрезаем текст на заданное количество символов*/
get_template_part('template/components/BreakText');

/*подключаем функцию гугл-карт*/
get_template_part('template/components/Map');

/*подключаем функцию вывода на странице секции главного заголовка с фоновым изображением*/
get_template_part('template/components/PageTopSection');

/*подключаем функцию вывода на странице секции доступных помещений*/
get_template_part('template/components/AvailablePlaces');

/*подключаем функцию вывода на странице блока с галереей*/
get_template_part('template/components/RenderGallery');

/*подключаем функцию вывода на странице блока с календарем мероприятий*/
get_template_part('template/components/Calendar');

/*подключаем функцию вывода на странице блока с 9 иконками (KOWO має)*/
get_template_part('template/components/KowoAccessories');

/*меняет категорию поста с анонса на прошедшее мероприятие при превышении даты события текущую*/
get_template_part('functions/ChangePostsCats');

get_template_part('functions/MakeField');

get_template_part('functions/RenderOptionsSettings');

/*подключаем метабоксы для страниц шаблонов и стандартных записей*/
get_template_part('functions/home_page/AddMetaBox');
get_template_part('functions/organizers/AddMetaBox');
get_template_part('functions/kowork/AddMetaBox');
get_template_part('functions/events/AddMetaBox');
get_template_part('functions/posts/AddMetaBox');

/*подключаем создание нового пост-типа, метабоксы и галерею для доступных мест*/
get_template_part('functions/available_places/AvailablePlacesMain');

/*подключаем страницу админки для основных параметров темы*/
get_template_part('functions/theme_options/ThemeOptionsMain');
//
///*подключаем страницу админки для параметров страниц блогов и продуктов*/
//get_template_part('functions/options_products_blogs/options_main');

/*подключаем меню*/
get_template_part('functions/NavMenu');

?>