/*подключаем lazy*/
jQuery(document).ready(function ($) {
    $('.lazy').lazy();

    $(".slick-slide").on('click', function () {
        $('.lazy').lazy();
    });

    $(".slick-dots").on('click', function () {
        $('.lazy').lazy();
    });
});




