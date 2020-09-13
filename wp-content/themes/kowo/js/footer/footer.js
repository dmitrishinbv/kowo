jQuery(document).ready(function() {
    jQuery('.pop-up-fon-footer form.pop-up-footer').click(function (e) {
        e.stopPropagation()
    });

    jQuery('#footer .btn-footer').click(function () {
        jQuery('.pop-up-fon-footer form.pop-up-footer').addClass('active');
        jQuery('.pop-up-fon-footer').addClass('active');
    });

    jQuery('.pop-up-fon-footer form.pop-up-footer .close, .pop-up-fon-footer .modal-pop-up-footer .close, .pop-up-fon-footer').on(
        'click', function () {
        jQuery('.pop-up-fon-footer form.pop-up-footer').removeClass('active');
        jQuery('.pop-up-fon-footer .modal-pop-up-footer').removeClass('active');
        jQuery('.pop-up-fon-footer').removeClass('active');
    });

    jQuery('.pop-up-fon-footer form.pop-up-footer').submit(function(e){
        e.preventDefault();
        const name = jQuery('.name-pop-up', this).val();
        const tel = jQuery('.tel-pop-up', this).val();
        const message = jQuery('.message', this).val();
        const typeForm = jQuery('.type-form', this).val();
        jQuery.ajax({
            url: ajax_footer.url,
            type: 'POST',
            data: {
                action: 'message_email',
                name,
                tel,
                message,
                typeForm,
            },
            success: function (data) {
                console.log();
                jQuery('.pop-up-fon-footer form.pop-up-footer').removeClass('active');
                jQuery('.pop-up-fon-footer .modal-pop-up-footer').addClass('active');
            }
        });
    });
});