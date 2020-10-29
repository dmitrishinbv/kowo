<?php
global $theme_options;
global $theme_uri;
?>
<?php AddBtn('Підтримати нас', $theme_options['btn_donate_link']); ?>
<footer id="footer">
    <div class="footer-main">
        <div class="left-col"><?php pl_e('Made with ❤ by Ш++'); ?></div>
        <div class="social-links">
            <div class="left-item">
                <a href="<?php echo $theme_options['social_link_facebook'] ?>" target="_blank">
                    <img src="<?php echo $theme_uri . '/img/svg/facebook.svg' ?>" alt="social_link_facebook">
                </a>
            </div>
            <div class="center-item">
                <a href="<?php echo $theme_options['social_link_youtube'] ?>" target="_blank">
                    <img src="<?php echo $theme_uri . '/img/svg/youtube.svg' ?>" alt="social_link_youtube">
                </a>
            </div>
            <div class="right-item">
                <a href="<?php echo $theme_options['social_link_instagram'] ?>" target="_blank">
                    <img src="<?php echo $theme_uri . '/img/svg/instagram.svg' ?>" alt="social_link_instagram">
                </a>
            </div>
            <div class="right-item">
                <a href="<?php echo $theme_options['social_link_telegram'] ?>" target="_blank">
                    <img src="<?php echo $theme_uri . '/img/svg/telegram.svg' ?>" alt="social_link_telegram">
                </a>
            </div>
        </div>
        <div class="right-col">
            <a id="scrollToTop" class="scroll-top"><?php pl_e('Повернутись вгору'); ?><span>
                <svg width="5" height="17" viewBox="0 0 6 20" version="1.1">
                    <defs></defs> <g id="Welcome" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Desktop-HD-Copy-39" transform="translate(-569.000000, -1797.000000)" fill="#000000" "="">
                        <path d="M565.662286,1804.2076 L562.095536,1806.87166 C561.958036,1807.00916 561.958036,1807.16385 562.095536,1807.30135 L565.662286,1809.96541 C565.799786,1810.10291 565.941411,1810.0431 565.941411,1809.83616 L565.941411,1808.11741 L581.816411,1808.11741 L581.816411,1806.05491 L565.941411,1806.05491 L565.941411,1804.33616 C565.941411,1804.18147 565.866474,1804.1141 565.769536,1804.14297 C565.737224,1804.1526 565.696661,1804.17322 565.662286,1804.2076 Z"
                              id="Shape"
                              transform="translate(571.904411, 1807.088000) rotate(-270.000000) translate(-571.904411, -1807.088000) ">
                          </path> </g>
                    </g></svg>
                </span>
            </a>
        </div>
</footer>

<?php
do_action('AddScriptsFooter');
do_action('ScrollScript');
wp_footer();
?>

</body>
</html>