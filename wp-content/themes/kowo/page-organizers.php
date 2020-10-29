<?php
/*
Template Name: Організаторам
*/

get_header();
do_action('PageOrganizersStyle');
do_action('FancyBox');
global $theme_uri;
global $ID;
?>


<main class="main-organizers">
    <?php
    AddPageTopSection(true);
    AddGradientLine();
    ?>
    <?php
    AddAvailablePlaces();
    AddGradientLine();
    AddCalendar();
    AddGradientLine();
    AddFaqBlock();
    AddMap();
    ?>

</main>
<?php get_footer(); ?>