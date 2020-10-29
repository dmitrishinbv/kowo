jQuery(document).ready(function() {
    jQuery('.burger').click( function (e) {
        e.stopPropagation();
        jQuery('.burger').toggleClass('burger-btn_active');
        jQuery('body .wrapper').toggleClass('active-fon');

        jQuery('body .wrapper.active-fon, body .wrapper.active-fon #menu_id').click( function (e) {
            jQuery('.burger').removeClass('burger-btn_active');
            jQuery('body .wrapper').removeClass('active-fon');
        });

        jQuery('.menu .menu-list .menu-item a').click( function (e) {
            e.stopPropagation();
            if (this.hash !== '') {
                jQuery('.burger').removeClass('burger-btn_active');
                jQuery('body .wrapper').removeClass('active-fon');
            }
        });
    });

    jQuery('.menu-item-has-children').click( function (e) {
        const width = jQuery( window ).width();
        if( width <= 980 ) {
            jQuery(this).toggleClass('has-children-active');
            e.preventDefault();
            e.stopPropagation();
            jQuery(this).children('.sub-menu').slideToggle();
        }
    });

    jQuery('.sub-menu').click( function (e) {
        e.stopPropagation();
    });

    jQuery('#menu_id, .main-header .main-nav .right-col div.menu .menu-list').click( function (e) {
        e.stopPropagation();
    });
});