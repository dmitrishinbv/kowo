// Позволяет открывать окно выбора изображения с галереи, передает данные и выводит превью изображения в админпанеле
jQuery(document).ready(function ($) {
    let meta_image_frame;
    let input;
    let imgPreview;

    // add images from wp library (used in AddMetaBox.php)
    const $documentList = $('.inside .info, .document-list');
    // Runs when the image button is clicked.
    $documentList.on('click', '.img-button, .image-preview', function (e) {
        const parent = $(this).parent();
        input = $('.meta-image', parent);
        imgPreview = parent.find('.image-preview');
        e.preventDefault();

        // If the frame already exists, re-open it.
        if (meta_image_frame) {
            meta_image_frame.open();
            return;
        }

        // Sets up the media library frame
        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
            library: {type: 'image'}
        });

        // Runs when an image is selected.
        meta_image_frame.on('select', function () {
            // Grabs the attachment selection and creates a JSON representation of the model.
            const media_attachment = meta_image_frame.state().get('selection').first().toJSON();
            input.val(media_attachment.id);
            const parent = input.parent();
            let img;

            if (parent.attr("class") && parent.attr("class").indexOf('item') !== -1) {
                if (parent.siblings('div').find('img').length === 1) {
                    img = parent.siblings('div').find('img');
                }
            } else {
                img = imgPreview.find('img');
            }

            if (!img) {
                img = parent.prev().find('img');
            }

            if (img) {
                img.attr('src', media_attachment.url);
                // img.attr('width', '300px');
            }
        });

        // Opens the media library frame.
        meta_image_frame.open();
    });
});