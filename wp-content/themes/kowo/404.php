<?php get_header(); ?>
<?php
do_action('HomePageStyle');
do_action('VidbgModule');
do_action('PageNotFoundStyles');
?>

    <div class="page-404">
        <h2>
            <?php pll_e('404 Сторінку не знайдено'); ?>
        </h2>
        <a href="/">
            <?php pll_e("Повернутись на головну") ?>
        </a>
    </div>

<?php get_footer(); ?>