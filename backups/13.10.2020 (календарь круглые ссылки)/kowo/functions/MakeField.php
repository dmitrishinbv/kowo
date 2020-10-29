<?php
function MakeThemeOptionField ($settings_section, $title, $id, $size, $desc, $type, $placeholder,
                               $options_page, $options_name) {

    $field_params = array(
        'id' => $id,
        'type' => $type,
        'size' => $size,
        'placeholder' => $placeholder,
        'desc' => $desc,
        'page' => $options_page,
        'options_name' => $options_name
    );

    add_settings_field("set_".$id, $title, 'ThemeOptionRenderSettings',
        $options_page, $settings_section, $field_params);
}
?>