<?php
global $theme_options;
$theme_options = get_option('theme_options');
global $HomeUrl;
$HomeUrl = pll_home_url();
global $theme_uri;
$theme_uri = get_template_directory_uri();
global $CurrenLanguage;
$CurrenLanguage = pll_current_language();
global $ID;
$ID = get_the_ID();
global $cat_id_announs, $cat_id_prev;
if ($CurrenLanguage === 'ua') {
    $cat_id_announs = 24;
    $cat_id_prev = 26;
    $home = get_site_url();
}
if ($CurrenLanguage === 'ru') {
    $cat_id_announs = 33;
    $cat_id_prev = 37;
    $home = get_site_url().'/ru/';
}
if ($CurrenLanguage === 'en') {
    $cat_id_announs = 35;
    $cat_id_prev = 39;
    $home = get_site_url().'/en/';
}

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo $theme_uri.'/img/favicon-32x32.png' ?>">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo get_bloginfo('name'); ?></title>

    <?php wp_head(); ?>

</head>
<body>
<div class="wrapper">
    <header class="main-header">
        <div class="logo-row container">
            <h1><?php pl_e('Креативний ІТ-простір');  ?></h1>
            <input id="site_url" type="text" hidden value="<?php echo get_site_url() ?>">
            <?php if (!is_front_page()) { ?>
            <a href="<?php echo $home ?>"
               class="logo-link"><img alt="Kowo logo" src="<?php echo $theme_uri.'/img/kowologo.png' ?>"></a>
            <?php }
            else { ?>
            <a class="logo-link"><img alt="Kowo logo" src="<?php echo $theme_uri.'/img/kowologo.png' ?>"></a>
            <?php } ?>
            <a class='phone' href="tel:+38<?php echo preg_replace("/[^0-9]/", '',
                $theme_options['company_header_phone']); ?>" >✆ <?php echo $theme_options['company_header_phone'] ?></a>
        </div>
        <nav class="main-nav container">
                <div class="burger">
                    <span></span>
                </div>
                <?php
                wp_nav_menu([
                    'theme_location' => 'main_nav_menu',
                    'container' => 'div',
                    'container_class' => 'menu',
                    'container_id' => 'menu_id',
                    'menu_class' => 'menu-list',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                ]);
 ?>
        </nav>
    </header>