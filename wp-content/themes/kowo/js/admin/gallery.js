jQuery(document).ready(function() {
    jQuery('.add-btn-gallery').on('click', function () {
        let send_attachment_bkp = wp.media.editor.send.attachment;
        let button = jQuery(this);
        wp.media.editor.send.attachment = function (props, attachment) {
            const galleryItem = jQuery('<div></div>').addClass('item-gallery');
            const img = jQuery('<img/>').attr('src', attachment.url);
            img.attr('alt', 'img');
            galleryItem.append(img);
            const div = jQuery('<div></div>');
            const buttonRemove = jQuery('<button></button>').attr('type', 'button').on('click', function(){
                jQuery(this).parent().parent().remove();
            });
            buttonRemove.text('Видалити');
            buttonRemove.addClass('remove_image_button button')
            const hidden = jQuery('<input>').attr('type', 'hidden');
            hidden.attr('name', 'img_gallery[]');
            hidden.attr('value', attachment.id);
            div.append(hidden, buttonRemove);
            galleryItem.append(div);
            jQuery('.gallery-list').append(galleryItem);
            wp.media.editor.send.attachment = send_attachment_bkp;
            jQuery('.gallery-list .error-title').remove();
        }
        wp.media.editor.open(button);
        return false;
    });

    jQuery('.remove_image_button').on('click', function(){
        jQuery(this).parent().parent().parent().append('<input type="hidden" name="img_gallery[]" value="">');
        jQuery(this).parent().parent().remove();
    });
});