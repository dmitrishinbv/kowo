<?php
/*
Template Name: Коворкінг
*/

get_header();
do_action('PageKoworkStyle');
global $theme_uri;
global $ID;
?>


<main class="main-kowowork">
    <?php
    AddPageTopSection();
    AddGradientLine();
    ?>
    <section class="photo-block">
      <?php  AddPhotoBlock(array('left', 'center', 'right')); ?>
    </section>

    <section class="main-content container">
        <?php while (have_posts()) : the_post(); the_content(); endwhile; ?></section>
    <section class="work-rules container">
        <?php
        $rules = get_post_meta($ID, 'rule_name', true);
        $rules_description = get_post_meta($ID, 'rule_description', true);

        if (is_array($rules)) { ?>
            <div class="rules-title">
                <h4><?php echo get_post_meta($ID, 'work_rules_title', true); ?></h4>
            </div>
            <?php foreach ($rules as $i => $rule) { ?>
                <div class="rule-item pl-200">
                    <div class="rule-counter">
                        <div class="circle"><?php echo $i + 1; ?></div>
                    </div>
                    <div class="text-wrapper">
                        <div class="rule-name">
                            <?php echo $rule ?>
                        </div>
                        <div class="rule-description">
                            <?php if (isset($rules_description[$i])) echo $rules_description[$i] ?>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </section>
    <?php
    AddGradientLine();
    AddKowoAccessories();
    AddGradientLine();
    ?>
    <section class="kowowork-pay container">
        <h4><?php echo get_post_meta($ID, 'section_pay_title', true); ?></h4>
        <p><?php echo get_post_meta($ID, 'pay_main_text', true); ?></p>
        <div class="row">
            <form target="_blank" method="POST" accept-charset="utf-8" action="https://www.liqpay.ua/api/3/checkout">
                <input type="hidden" name="data" value="eyJ2ZXJzaW9uIjozLCJhY3Rpb24iOiJwYXlkb25hdGUiLCJhbW91bnQiOiI1MCIsImN1cnJlbmN5IjoiVVNEIiwiZGVzY3JpcHRpb24iOiLQl9CwINC60L7RgNC40YHRgtGD0LLQsNC90L3RjyDQutC+0LLQvtGA0LrRltC90LPQvtC8INGDINGB0LXRgNC/0L3RliAyMDIwINCy0ZbQtCDQn9GA0ZbQt9Cy0LjRidC1INCGLtCRLiAiLCJwdWJsaWNfa2V5IjoiaTc5MTYxNjA2NzY5IiwibGFuZ3VhZ2UiOiJ1ayJ9">
                <input type="hidden" name="signature" value="HQqucFFuACd72LPL89X6HMKjdLc=">
                <button>
                    <img src="https://static.liqpay.ua/buttons/logo-small.png" name="btn_text">
                    <span><?php echo get_post_meta($ID, 'pay_btn_left', true); ?></span>
                </button>
            </form>

            <form target="_blank" method="POST" accept-charset="utf-8" action="https://www.liqpay.ua/api/3/checkout">
                <input type="hidden" name="data" value="eyJ2ZXJzaW9uIjozLCJhY3Rpb24iOiJwYXlkb25hdGUiLCJhbW91bnQiOiIyNSIsImN1cnJlbmN5IjoiVVNEIiwiZGVzY3JpcHRpb24iOiLQl9CwINC60L7RgNC40YHRgtGD0LLQsNC90L3RjyDQutC+0LLQvtGA0LrRltC90LPQvtC8INC3IDAxLjEyLjIwMjAg0L/QviAxNS4xMi4yMDIwINCy0ZbQtCDQn9GA0ZbQt9Cy0LjRidC1INCGLtCRLiAiLCJwdWJsaWNfa2V5IjoiaTc5MTYxNjA2NzY5IiwibGFuZ3VhZ2UiOiJ1ayJ9">
                <input type="hidden" name="signature" value="CkYDULcq+RrzugfFSIKp37Jp7oM=">
                <button>
                    <img src="https://static.liqpay.ua/buttons/logo-small.png" name="btn_text">
                    <span><?php echo get_post_meta($ID, 'pay_btn_center', true); ?></span>
                </button>
            </form>

            <form target="_blank" method="POST" accept-charset="utf-8" action="https://www.liqpay.ua/api/3/checkout">
                <input type="hidden" name="data" value="eyJ2ZXJzaW9uIjozLCJhY3Rpb24iOiJwYXlkb25hdGUiLCJhbW91bnQiOiIyNSIsImN1cnJlbmN5IjoiVVNEIiwiZGVzY3JpcHRpb24iOiLQl9CwINC60L7RgNC40YHRgtGD0LLQsNC90L3RjyDQutC+0LLQvtGA0LrRltC90LPQvtC8INCy0ZbQtCDQn9GA0ZbQt9Cy0LjRidC1INCGLtCRLiAiLCJwdWJsaWNfa2V5IjoiaTc5MTYxNjA2NzY5IiwibGFuZ3VhZ2UiOiJ1ayJ9">
                <input type="hidden" name="signature" value="kmD6F5c4XbT2DUJXCpzbvdY7P5g=">
                <button>
                    <img src="https://static.liqpay.ua/buttons/logo-small.png" name="btn_text">
                    <span><?php echo get_post_meta($ID, 'pay_btn_right', true); ?></span>
                </button>
            </form>
        </div>
    </section>
    <?php
    AddFaqBlock();
    AddGradientLine();
    ?>
</main>

<?php
do_action('PageKoworkScripts');
get_footer(); ?>
