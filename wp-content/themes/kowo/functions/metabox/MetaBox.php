<?php
get_template_part('functions/metabox/CreateElementFunctions');

class Meta_Box
{
    private $post_type = null;
    private $id_meta = null;
    private $name_meta = null;
    /*группы полей*/
    private $groups = null;
    /*массив мета элементов*/
    private $meta_array = null;
    private $file_name = null;
    private $title_group = null;
    private $context = null;

    public function __construct($args)
    {
        $data = $args;
        $this->id_meta = $data['id_meta'];
        $this->name_meta = $data['name_meta'];
        $this->post_type = $data['post_type'];
        $this->groups = $data['groups'];
        $this->meta_array = $data['meta_array'];
        if (isset($data['file_name']) && $data['file_name'] !== '') {
            $this->file_name = $data['file_name'];
        }
        if (isset($data['title_group']) && $data['title_group'] !== '') {
            $this->title_group = $data['title_group'];
        }
        if (isset($data['context']) && $data['context'] !== '') {
            $this->context = $data['context'];
        } else {
            $this->context = 'advanced';
        }
        add_action('add_meta_boxes', array($this, 'add_meta_box'));
        add_action('save_post', array($this, 'save_meta_box'));
    }

    ## Добавляет матабоксы
    public function add_meta_box()
    {
        global $post;
        if (!is_null($this->file_name) && $this->file_name !== '') {
            if ($this->file_name ===
                get_post_meta($post->ID, '_wp_page_template', true)) {
                add_meta_box($this->id_meta,
                    $this->name_meta, array($this, 'render_meta_box'), $this->post_type,
                    $this->context, 'high');
            }
        } else {
            add_meta_box($this->id_meta,
                $this->name_meta, array($this, 'render_meta_box'), $this->post_type,
                $this->context, 'high');
        }
    }

    ## обрабатываем элемент перед сохранением
    private function processElement($meta)
    {
        $item = $_POST[$meta];
        if (count($item) === 1) {
            return sanitize_text_field($item[0]);
        }
        return array_filter($item);
    }

    ## проверяем мета элемент
    private function checkMeta($array)
    {
        foreach ($array as $elem) {
            if (!isset($_POST[$elem])) {
                return false;
            }
        }

        return true;
    }

    ## Очищает и сохраняет значения полей
    public function save_meta_box($post_id)
    {

        if (wp_is_post_autosave($post_id))
            return;

        if (wp_is_post_revision($post_id))
            return;

        if (!current_user_can('edit_post', $post_id))
            return;

        foreach ($this->groups as $meta_array) {
            if ($item = $this->checkMeta($meta_array)) {
                foreach ($meta_array as $meta) {
                    $item = $this->processElement($meta);
                    if ($item) {
                        update_post_meta($post_id, $meta, $item);
                    } else {
                        delete_post_meta($post_id, $meta);
                    }
                }
            }
        }
    }

    ## Отображает метабокс на странице редактирования поста
    public function render_meta_box($post)
    {
        wp_nonce_field($this->id_meta, $this->id_meta . '_wpnonce',
            false, true);
        ?>
        <div class="info">
            <?php
            foreach ($this->groups as $key => $group) {
                ?>
                <div class="list-<?php echo $key ?>">
                    <?php if (isset($this->title_group)) : ?>
                        <h6>
                            <?php echo $this->title_group[$key] ?>
                        </h6>
                    <?php endif; ?>
                    <?php

                    $max = 0;
                    $array = [];
                    $clone = false;
                    $delete = false;
                    $button = create_add_button($key);
                    $input = '<div class="item-' . $key . '">';
                    $counter = 0;
                    $img_position = -1;

                    foreach ($group as $elem) {

                        $meta = $this->meta_array[$elem];

                        $delete = check_delete($delete, $meta);

                        $clone = check_clone($clone, $meta);

                        $array[] = get_post_meta($post->ID, $elem, true);

                        $max = find_max_length($max, $array);

                        $input = createItem($input, $meta, $elem);

                        $input = add_custom_button($input, $meta);

                        if ($meta['input'] === 'img') {
                            $img_position = $counter;

                        } else {
                            $counter++;
                        }

                    }

                    $input = add_button_delete($input, $delete, $key);

                    $input .= '</div>';

                    $this->fill_in_items($max, $array, $clone, $input, $button, $meta, $img_position);

                    ?> </div> <?php
            }
            ?>
        </div>
        <?php
    }

    ## заполняем элементы
    private function fill_in_items($max, $array, $clone, $input, $button, $meta, $img_position)
    {

        for ($i = 0; $i < $max; $i++) {
            $values = [];

            foreach ($array as $value) {
                if (is_array($value) && isset($value[$i])) {
                    $values[] = htmlspecialchars($value[$i]);
                } elseif (!isset($value[$i])) {
                    $values[] = '';
                } elseif (isset($value)) {
                    $values[] = htmlspecialchars($value);
                } else {
                    $values[] = '';
                }
            }

            if ($meta['input'] === 'img') {
                $resolution = isset($meta['size']) ? $meta['size'] : 'thumbnail';
                $image_prev = null;

                if ($img_position === -1 && !is_array($array)) {
                    $image_prev = wp_get_attachment_image_src(intval($array), $resolution);
                }

                if ($img_position !== -1 && is_array($array)) {
                    $image_prev = wp_get_attachment_image_src($array[$img_position], $resolution);
                }

                if (is_array($array[0]) && count($array[0]) > 0) {
                    $image_prev = wp_get_attachment_image_src($array[$img_position][$i], $resolution);
                }

                if ($image_prev) {
                    echo "<div class='image-preview'>" . "<img src='$image_prev[0]'></div>";
                } else {
                    echo "<div class='image-preview'>" . "<img src=''></div>";
                }
            }

            printf($i + 1 == $max && $clone ? $input . $button :
                $input, ...$values);
        }
    }
}

?>