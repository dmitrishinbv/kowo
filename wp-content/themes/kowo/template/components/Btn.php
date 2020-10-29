<?php
function AddBtn($innerText = '', $link = '', $line_class='', $submit_class='', $target='')
{
    do_action('BtnStyle');
    ?>

    <div class="btn-line <?php echo  $line_class; ?>">
        <div class="btn-container">
            <a target="<?php echo $target; ?>" href="<?php echo $link ?>">
                <div class="t-btn btn-submit <?php echo  $submit_class; ?>"
                     data-btneffects-first="btneffects-light"><?php pl_e($innerText); ?>
                    <div class="t-btn_wrap-effects">
                        <div class="t-btn_effects"></div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <?php
}