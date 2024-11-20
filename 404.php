<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri(); ?>/static/css/style.css?v=18">
    <title><?= the_field('title'); ?></title>
    <meta name="description" content="<?php the_field('description'); ?>">
    <? if(get_field('keywords')) {?>
    <meta name="keywords" content="<?php the_field('keywords'); ?>">
    <?
}?>
    <link rel="apple-touch-icon" sizes="180x180" href="<?= get_stylesheet_directory_uri(); ?>/static/img/favicon/Favicon_180.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= get_stylesheet_directory_uri(); ?>/static/img/favicon/Favicon_512.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= get_stylesheet_directory_uri(); ?>/static/img/favicon/Favicon_32.png">
    <link rel="icon" type="image/svg+xml" href="<?= get_stylesheet_directory_uri(); ?>/static/img/favicon/Favicon.svg" >
    <link rel="manifest" href="<?= get_stylesheet_directory_uri(); ?>/static/img/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <?php wp_head(); ?> 
    <script src="<?= get_stylesheet_directory_uri() . '/static/js/script.min.js?v=18'; ?>"></script>
</head>

<body>
    <main class="page_404">
        <a href="/" class="logo">
            <img src="<?= get_field('header_logo', 'option')['url']; ?>" alt="<?= get_field('header_logo', 'option')['alt']; ?>">
        </a>
        <h1 class="color_gradient">404</h1>
        <p class="text_l">Page not found</p>
        <a href="/" class="btn btn--transp">
            <span class="text_s uppercase">Main page</span>
        </a>
    </main>
</body>

</html>