<?php
function ThemeOptionRenderSettings($args)
{

    extract($args);
    $option_name = $args['options_name'];
    $o = get_option($option_name);
    if (isset($o[$id])) {
//        $o[$id] = esc_attr(stripslashes($o[$id]));
        $value = $o[$id];
    }

    else {
        $value = '';
    }

    switch ($type) {
        case 'input':
            echo "<input class='code large-text' type='text' maxlength='$size' placeholder='$placeholder' value='$value'
            id='$id' name='" . $option_name . "[$id]'/>";
            echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
            break;

        case 'img':
            $image_prev = [''];
            if ($value) {
                $image_prev = wp_get_attachment_image_src($value, 'medium');
            }
            echo "<div class='document-list'>
       <label for='main_page_image'> <input type='text' class='code meta-image hidden' id='$id'
         size='4'   name='" . $option_name . "[$id]' value='$value' />
          <div class='image-preview'> <img src='$image_prev[0]'></div>
        <button type='button' class='img-button'>  Вибрати зображення </button></label>
            </div>";
            break;

        case 'number':
            echo "<input class='code' type='number' placeholder='$placeholder' min='0'
            id='$id' name='" . $option_name . "[$id]' value='$value' />";
            echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
            break;

        case 'url':
            echo "<input class='code large-text' type='url' placeholder='$placeholder' value='$value'
            id='$id' name='" . $option_name . "[$id]'/>";
            echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
            break;
    }
}

?>