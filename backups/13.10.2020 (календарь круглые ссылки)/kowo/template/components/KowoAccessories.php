<?php
function AddKowoAccessories($id = '')
{
    global $theme_uri;
    global $ID;
    do_action('KowoAccessoriesStyle');
    $ID = ($id === '') ? $ID : $id;
    $section_title = get_post_meta($ID, 'accessories_title', true);
    $icons = get_post_meta($ID, 'accessory_icon', true);
    $names = get_post_meta($ID, 'accessory_name', true);
    ?>

    <section class="kowo-accessories container">
        <?php
        if (is_array($names) && is_array($icons)) {
        ?>
        <div class="title"><h4><?php echo $section_title; ?></h4></div>
        <div class="column-wrapper">
            <?php
            foreach ($names as $i => $name) {
                ?>
                <div class="t-col">
                    <div class="icon"
                         style="background-image: url('<?php echo $theme_uri . '/img/svg/' . $icons[$i]; ?>')">
                    </div>
                    <div class="caption"><?php echo $name; ?>
                    </div>
                </div>

            <?php }
            } ?>
        </div>
    </section>
    <?php

}