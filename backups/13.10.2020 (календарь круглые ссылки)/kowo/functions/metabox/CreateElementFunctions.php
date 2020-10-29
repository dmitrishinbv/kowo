<?php
## создаем лейблу элементу
function createLabel($meta, $id, $input)
{
    $label = isset($meta['label']) ? $meta['label'] : true;
    $title = isset($meta['title']) ? $meta['title'] : '';

    if ($label) {
        $input .= '<label class="label" for="' . $id . '">' . $title . '</label>';
    }

    return $input;
}

## Создаем элемент
function createItem($input, $meta, $elem)
{
    global $post;
    $class = isset($meta['class']) ? $meta['class'] : '';
    $type = isset($meta['input']) ? $meta['input'] : 'text';
    $id = isset($meta['id']) ? $meta['id'] : '';
    $parameter = isset($meta['parameter']) ? $meta['name_parameter'] : '';
    $required = isset($meta['required']) && $meta['required'] ? 'required' : '';
    $placeholder = isset($meta['placeholder']) ? $meta['placeholder'] : '';
    $size = isset($meta['size']) ? $meta['size'] : '';
    $maxlength = isset($meta['maxlength']) ? $meta['maxlength'] : '';
    $min = isset($meta['min']) ? $meta['min'] : '';
    $max = isset($meta['max']) ? $meta['max'] : '';
    $checked = isset($meta['parameter']) ?
        checked(get_post_meta($post->ID, $parameter, 1)) : '';
    $value = !isset($meta['parameter']) ? 'value="%s"' : 'value="1"';
    $input = createLabel($meta, $id, $input);


    $input .= '<input min="' . $min . '" max="' . $max . '" placeholder="' . $placeholder . '" id="' . $id .
        '" type="' . $type . '" name="' . $elem . '[]"' . $value . ' size="' . $size . '"  maxlength="'
        . $maxlength . '" class="' . $class . '" ' . $required . ' ' . $checked . '>';

    return $input;
}

## добавляем кастомною кнопку
function add_custom_button($input, $meta)
{
    if (isset($meta['button'])) {
        $btn = $meta['button'];
        $input .= create_custom_button($btn);
    }

    return $input;
}

## создаем кастомною кнопку
function create_custom_button($btn)
{
    $class_btn = isset($btn['class']) ? $btn['class'] : '';
    $title_btn = isset($btn['title']) ? $btn['title'] : '';

    return '<button type="button" class="' . $class_btn . '">
                                           ' . $title_btn . '
                </button>';
}

## создаем кнупку удаления элемента
function create_button_delete($key)
{
    return '<button type="button" class="button remove-info"
                        data-target="item-' . $key . '">
                        Видалити
                </button>';
}

## добавляем кнупку в элемент
function add_button_delete($input, $fDelete, $key)
{
    if ($fDelete) {
        $input .= create_button_delete($key);
    }

    return $input;
}

## находи макс значение
function find_max_length($max, $array)
{
    if (is_array($array[count($array) - 1]) &&
        count($array[count($array) - 1]) > $max) {
        $max = count($array[count($array) - 1]);

    } else if (1 > $max) {
        $max = 1;
    }

    return $max;
}

## проверка элемента надо ли его клонировать
function check_clone($clone, $meta)
{
    if (isset($meta['clone'])) {
        $clone = $meta['clone'];
    }

    return $clone;
}

## будет ли элемент удалятся
function check_delete($delete, $meta)
{
    if (isset($meta['delete'])) {
        $delete = $meta['delete'];
    }

    return $delete;
}

## создаем кнопку добавления элемента
function create_add_button($key)
{
    return '<div>
                     <button class="add-info button button-primary" type="button" 
                             data-target="item-' . $key . '"
                             data-list="list-' . $key . '">
                             Додати пункт
                     </button>
                </div>';
}
?>