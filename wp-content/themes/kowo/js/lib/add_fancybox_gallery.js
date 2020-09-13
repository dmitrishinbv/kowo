// подключаем fancybox для галерей
jQuery(document).ready(function ($) {
    $("figure").each(function () {
        if ($("figure img").length > 1) {
            let newSrc = $('img', this).attr("src");
            $(this).attr('data-src', newSrc);
            $(this).wrapInner("<a data-fancybox='gallery-alt' href=" + newSrc + "\ rel='fancy'></a>")
        }
    });
});