<?php
function AddFaqBlock()
{
    global $ID;
    do_action('FaqBlockStyle');
    ?>

    <section class="faq-block container">

        <?php
    $questions = get_post_meta($ID, 'faq_question', true);
    $answers = get_post_meta($ID, 'faq_answer', true);

    if (is_array($questions) && is_array($answers)) { ?>
        <div class="faq-title pl-200"><h5><?php echo get_post_meta($ID, 'faq_title', true) ;?></h5></div>
        <?php
        foreach ($questions as $i => $question) {
        ?>
        <div class="faq-item pl-200">
            <div class="question"><?php echo $question; ?>
                <div class="tail-left">
                    <svg width="33" height="24" viewBox="0 0 33 24">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-1244.000000, -3123.000000)" fill="#222">
                                <path d="M1255,3123c0,0-0.7,5.7-2,8.8c-1.9,4.3-7.7,13.4-7.7,13.4s9.3-2.5,18-8.8c2.6-1.9,10.4-11,12.6-13.5">
                                </path>
                            </g>
                        </g>
                    </svg>
                </div>
            </div>
            <div class="answer"><?php echo $answers[$i]; ?>
                <div class="tail-right">
                    <svg width="33" height="24" viewBox="0 0 33 24">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-1244.000000, -3123.000000)" fill="#eee">
                                <path d="M1275.13811,3123 C1272.95728,3125.43852 1265.08297,3134.61485 1262.52627,3136.47672 C1253.84354,3142.79977 1244.5,3145.28571 1244.5,3145.28571 C1244.5,3145.28571 1250.29058,3136.12799 1252.15133,3131.84682 C1253.51931,3128.69942 1254.18621,3123 1254.18621,3123"
                                      transform="translate(1259.819055, 3134.142857) scale(-1, 1) translate(-1259.819055, -3134.142857) ">
                                </path>
                            </g>
                        </g>
                    </svg>
                </div>
            </div>
        </div>
        <?php }
        } ?>
    </section>
    <?php
}