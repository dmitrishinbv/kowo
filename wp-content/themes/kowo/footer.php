<?php
global $theme_options;
?>
<footer id="footer">
    <div class="footer-main container">
        <div class="footer-content">
            <h2>
                <?php pl_e($theme_options['company_footer_fields_title']); ?>
            </h2>
            <div class="footer-address-street">
                <?php get_template_part('template/footer/address'); ?>
            </div>
            <div class="footer-contacts">
                <?php get_template_part('template/footer/contacts'); ?>
            </div>
            <div class="footer-mail">
                <?php get_template_part('template/footer/mail'); ?>
            </div>
        </div>
        <div class="footer-map">
            <div id = "map"></div>
        </div>
    </div>
    <div class="footer-copyright">

        <?php pl_e($theme_options['copyright_text']); ?>
    </div>
</footer>
</div>

<?php
do_action('AddScriptsFooter');
wp_footer();
PopUpFooter();
?>

</body>
</html>
