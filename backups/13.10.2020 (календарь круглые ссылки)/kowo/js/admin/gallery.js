jQuery(document).ready(function() {
    let meta_image_frame;
    jQuery('.add-btn-gallery').on('click', function (e) {
        e.preventDefault();

        // If the frame already exists, re-open it.
        if (meta_image_frame) {
            meta_image_frame.open();
            return;
        }

        // Sets up the media library frame
        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
            library: {type: 'image'},
            multiple: true,
        });

        // Runs when an image is selected.
        meta_image_frame.on('select', function () {
            // Grabs the attachment selection and creates a JSON representation of the model.
            const media_attachment = meta_image_frame.state().get('selection').toJSON();
            console.log(media_attachment);
            media_attachment.forEach(function (attachment) {
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
            });
            jQuery('.gallery-list .error-title').remove();
        });

        // Opens the media library frame.
        meta_image_frame.open();
    });

    // jQuery('.add-btn-gallery').on('click', function () {
    //     let send_attachment_bkp = wp.media.editor.send.attachment;
    //     let button = jQuery(this);
    //     console.log(send_attachment_bkp);
    //
    //     wp.media.editor.send.attachment = function (props, attachment = []) {
    //         const galleryItem = jQuery('<div></div>').addClass('item-gallery');
    //         const img = jQuery('<img/>').attr('src', attachment.url);
    //         console.log(attachment);
    //         img.attr('alt', 'img');
    //         galleryItem.append(img);
    //         const div = jQuery('<div></div>');
    //         const buttonRemove = jQuery('<button></button>').attr('type', 'button').on('click', function(){
    //             jQuery(this).parent().parent().remove();
    //         });
    //         buttonRemove.text('Видалити');
    //         buttonRemove.addClass('remove_image_button button')
    //         const hidden = jQuery('<input>').attr('type', 'hidden');
    //         hidden.attr('name', 'img_gallery[]');
    //         hidden.attr('value', attachment.id);
    //         div.append(hidden, buttonRemove);
    //         galleryItem.append(div);
    //         jQuery('.gallery-list').append(galleryItem);
    //         wp.media.editor.send.attachment = send_attachment_bkp;
    //         jQuery('.gallery-list .error-title').remove();
    //     }
    //     wp.media.editor.open(button);
    //     return false;
    // });

    jQuery('.remove_image_button').on('click', function(){
        jQuery(this).parent().parent().parent().append('<input type="hidden" name="img_gallery[]" value="">');
        jQuery(this).parent().parent().remove();
    });
});