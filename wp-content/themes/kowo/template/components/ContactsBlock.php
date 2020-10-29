<?php
function AddContactsBlock()
{
    global $theme_options;
    $email = $theme_options['company_email'];
    do_action('ContactsBlockStyle');
    ?>

    <section class="contacts-container container" id="contacts">
        <div class="left-block">
            <h5><?php pl_e('Працюємо щодня:') ?></h5>
            <div class="line"></div>
            <div class="contacts-description">
                <?php pl_e('будні з 9:00-21:00') ?><br>
                <?php pl_e('вихідні з 10:00-18:00') ?><br><br>
                <?php pl_e('м. Кропивницький,') ?><br>
                <a href="<?php echo $theme_options['google_map_link'] ?>" target="_blank" title="go to google map">
                    <?php pl_e('пров. Василівський 10 (5 поверх)') ?><br></a>
            </div>
            <div class="phone">
                <a href="tel:+38<?php echo preg_replace("/[^0-9]/", '',
                    $theme_options['company_header_phone']); ?>">✆ <?php echo $theme_options['company_header_phone'] ?></a>
            </div>
            <div class="email">
                <?php echo "<a href=\"mailto:$email\">$email</a>"; ?><br>
            </div>
        </div>
        <div class="contacts-img-container">
            <div class="contacts-image"
                 style="background:
                         url('<?php echo wp_get_attachment_image_url($theme_options['contacts_block_img'],
                     'contacts_img'); ?>') center/cover no-repeat; "></div>
        </div>
    </section>
    <?php
}