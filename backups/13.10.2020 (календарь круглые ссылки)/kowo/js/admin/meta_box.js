/**
 * кнопки добаления и удаления элемента в метабоксе
 * */
jQuery(document).ready(function ($) {
    const $info = $('.info');
    $info.stop().on('click', '.add-info', function () {
        const $list = $(`.${$(this).data('list')}`);
        $item = $list.find(`.${$(this).data('target')}`).first().clone();
        $item.find('input').val(''); // чистим знанчение
        $img = $list.find('.image-preview').first().clone();
        if ($img) {
            $img.find('img').attr('src', '');
            $(this).before($img);
        }
        $(this).before($item);
    });

    $info.stop().on('click', '.remove-info', function () {
        if ($(`.${$(this).data('target')}`).length > 1) {
            $(this).parent().prev().remove();
            $(this).closest(`.${$(this).data('target')}`).remove();
        } else {
            $(this).closest(`.${$(this).data('target')}`).find('input').val('');
        }
    });
});