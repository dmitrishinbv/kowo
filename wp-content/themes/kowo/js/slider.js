jQuery(document).ready(function ($) {
    if ($("div").is(".slider-wrapper")) {
        $('.slider-wrapper').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: true,
            infinity: true,
            variableWidth: true,
            autoplay: true,
            autoplaySpeed: 2000,
            centerMode: true,
            pauseOnDotsHover: true,
            arrows: true,
            responsive: [
                {
                    breakpoint: 1500,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        centerMode: true,
                        dots: true,
                        arrows: true,
                    }
                },
                {
                    breakpoint: 680,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: true,
                        dots: true,
                        arrows: true,
                    }
                },
            ]
        });
    }

    // var dots = $('.slick-dots li');
    // //вешаем обработчик на наши точки
    //
    // //если мы в самом начале - добавляем пару последующих точек
    // if (!$this.prev().length) {
    //     $this.next().next().next()
    //         .addClass('after').next()
    //         .addClass('after');
    // }
    // //на 2й позиции - добавляем одну точку
    // if (!$this.prev().prev().length) {
    //     $this.next().next().next()
    //         .addClass('after');
    // }
    // //в самом конце - добавляем пару доп. предыдущих точек
    // if (!$this.next().length) {
    //     $this.prev().prev().prev()
    //         .addClass('before').prev()
    //         .addClass('before');
    // }
    // //предпоследний элемента - добавляем одну пред. точку
    // if (!$this.next().next().length) {
    //     $this.prev().prev().prev()
    //         .addClass('before');
    // }

});