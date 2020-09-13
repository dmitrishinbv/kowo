// Плавный скролл
jQuery(document).ready(function($) {
    $('a[href^="#"]').click(function(e) {
        e.preventDefault();
        const target = $(this.hash);
        if(this.hash !== '') {
            $('html, body').on("mousewheel", function(){
                $(this).stop();
            });

            $('html, body').animate({
                scrollTop: target.offset().top
            }, 1500);
        }
    });
});