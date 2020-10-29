jQuery(document).ready(function ($) {
    $centerMode = true;
    $sliderClass = null;
    if ($("div").is(".slider-wrapper")) {
        $sliderClass = $('.slider-wrapper');
    }
    else {
        $sliderClass = $('.slider-nowrapper');
        $centerMode = false;
    }

    $sliderClass.slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: true,
        infinity: true,
        variableWidth: true,
        autoplay: true,
        autoplaySpeed: 2000,
        centerMode: $centerMode,
        pauseOnDotsHover: true,
        pauseOnFocus: true,
        arrows: false,
        responsive: [
            {
                breakpoint: 1500,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    centerMode: true,
                    dots: true
                }
            },
            {breakpoint: 800,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    centerMode: true,
                    dots: true
                }},

        ]
    });
});