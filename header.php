<!DOCTYPE html>
  <?
  $locale = get_locale();
  $lang = '';

  if ( $locale === 'en_US' ) {
      $lang = 'En';
  } else if ( $locale === 'es_ES' ) {
      $lang = 'Es';
  } else if ( $locale === 'pt_PT' ) {
      $lang = 'Pt';
  }
  ?>

<html lang="<?= $lang; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="format-detection" content="telephone=no">
    <? if(is_home()) {
      $meta_tags = get_field('meta_tags', 221);
    } else {
      $meta_tags = get_field('meta_tags');
    }?>

  <? $page_id = get_the_ID(); ?>


  <?php if (get_post_type() == 'blog_articles') { ?>
    <?php if ($meta_tags['title']) { ?>
        <title><?= $meta_tags['title']; ?></title>
    <?php } else { ?>
        <title><?= get_the_title($page_id); ?></title>
    <?php } ?>
    <?php if ($meta_tags['description']) { ?>
        <meta name="description" content="<?= $meta_tags['description']; ?>">
    <?php } else { ?>
        <meta name="description" content="<?= get_field('atlas_item')['atlas_description']; ?>">
    <?php } ?>
  <?php } else { ?>
      <title><?= $meta_tags['title']; ?></title>
      <meta name="description" content="<?= $meta_tags['description']; ?>">
  <?php } ?>
  <?php if ($meta_tags['keywords']) { ?>
      <meta name="keywords" content="<?= $meta_tags['keywords']; ?>">
  <?php } ?>


    <link rel="apple-touch-icon" sizes="180x180" href="<?= get_stylesheet_directory_uri(); ?>/static/img/favicon/Favicon_180.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= get_stylesheet_directory_uri(); ?>/static/img/favicon/Favicon_512.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= get_stylesheet_directory_uri(); ?>/static/img/favicon/Favicon_32.png">
    <link rel="icon" type="image/svg+xml" href="<?= get_stylesheet_directory_uri(); ?>/static/img/favicon/Favicon.svg" >
    <link rel="manifest" href="<?= get_stylesheet_directory_uri(); ?>/static/img/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- author - rednosed -->
    <?php wp_head(); ?>

    <? if(is_home()) { ?> <link rel="canonical" href="<?= get_the_permalink(get_option( 'page_for_posts' )); ?>" />  <? } ?>

    <script src="<?= get_stylesheet_directory_uri(); ?>/animation/spine-player.js"></script>
    <script src="<?= get_stylesheet_directory_uri(); ?>/static/js/clamp.min.js"></script>
    <script src="<?= get_stylesheet_directory_uri(); ?>/static/js/slick.min.js"></script>
    <script src="<?= get_stylesheet_directory_uri(); ?>/static/js/howler.min.js"></script>
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri(); ?>/animation/spine-player.css">


    <? if (get_post_type() == 'blog_articles') {
      $article_og = get_field('blog_article_content'); ?>

      <meta property='og:locale' content='<?= $locale; ?>' />
      <meta property='og:type' content='website' />
      <meta property='og:title' content='<? the_title(); ?>'>
      <meta property='og:description' content='<?= strip_tags($article_og['description_card']); ?>'>

      <meta property="og:logo" content="<?= get_field('header_logo', 'option')['color']['url']; ?>" />

      <meta property='og:url' content='<?= get_the_permalink(); ?>'>
      <meta property='og:site_name' content=''>
      <meta property="og:image:width" content="1200">
      <meta property="og:image:height" content="628">
      <meta name="twitter:title" content="<? the_title(); ?>" />
      <meta name="twitter:card" content="summary_large_image" />
      <meta property='og:image' content='<?= $article_og['blog_logo']['url']; ?>' />
      <meta property='vk:image' content='<?= $article_og['blog_logo']['url']; ?>' />
      <meta name="twitter:image" content="<?= $article_og['blog_logo']['url']; ?>" />

    <? } ?>

      <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "Organization",
        "url": "<?= get_site_url(); ?>",
        "logo": "<?= get_field('header_logo', 'option')['color']['url']; ?>"
      }
      </script>


    <?php if(is_front_page()){ $page_type = 'main_page'; } else { $page_type = ''; }?>

    <?= get_field('head_metriks', 'option'); ?>
</head>

<body class="homeBody">

    <header class="<?php echo $page_type; ?>">
        <div class="container">
            <a href="/" class="logo">
                <?php if(is_front_page()){  ?>
                  <img src="<?= get_field('header_logo', 'option')['white']['url']; ?>" alt="<?= get_field('header_logo', 'option')['white']['alt']; ?>">
                <? } else { ?>
                  <img src="<?= get_field('header_logo', 'option')['color']['url']; ?>" alt="<?= get_field('header_logo', 'option')['white']['alt']; ?>">
                <? } ?>
            </a>
            <div class="menu_wrapper">
              <nav class="main_menu">

                  <?php
                  wp_nav_menu([
                    'theme_location'  => '',
                    'menu'            => 'Главное меню',
                    'container'       => 'ul',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 'menu menu_pages',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => '',
                  ]);
                  ?>

                  <div class="mob_block">
                    <div class="main_menu lang_menu">
                      <ul class="menu">
                        <li class="menu-item menu-item-has-children">
<!--                          <a href="#">--><?php //= $lang; ?><!--</a>-->
<!--                          --><?php //= my_site_custom_languages_selector_template(); ?>
                        </li>
                      </ul>
                    </div>

                    <a href="<?= get_field('header_btn', 'option')['btn_link']; ?>" class="btn btn--right btn--violet">
                        <span class="text_m uppercase"><?= get_field('header_btn', 'option')['btn_text']; ?></span>
                    </a>

                    <a href="mailto:<?= get_field('e-mail', 'option'); ?>" class="link text_m bold uppercase"><?= get_field('e-mail', 'option'); ?></a>
                  </div>
              </nav>

            </div>

            <script>
              jQuery(document).ready(function($) {
                var winWidth = $(window).width();
                $('#menu-item-90').hover(
                  function() {
                    var first_sub_header = $(this).find('> .sub-menu').find('> .menu-item:first-child')
                    var min_height = parseInt($(this).find('> .sub-menu').css('height')) + 32;
                    var height = parseInt(first_sub_header.find('.sub-menu').css('height')) + 32;
                    first_sub_header.addClass('active');
                    if(height > min_height) {
                      $(this).find('> .sub-menu').css('height', height);
                    }
                  }, function() {
                    // $(this).find('> .sub-menu').css('height', 'initial');
                    // $('.menu_group_anchor').removeClass('active');
                  }
                );

                $('.js-lang-btn-current, .menu-item-has-children').on('click', function() {
                  $('.menu-item').removeClass('opened');
                  $('.menu-item').find('> .sub-menu').removeClass('visible sub-menu-padding');
                  $(this).addClass('opened');
                  $(this).find('> .sub-menu').addClass('visible sub-menu-padding');
                });

                $('main').on('click', function(){
                  $('.sub-menu').removeClass('visible');
                })

                $('.menu_group_anchor').hover(
                  function() {
                    if(winWidth > 980) {
                      $('.menu_group_anchor').removeClass('active');
                      $(this).addClass('active');
                    }
                  }, function() {

                  }
                );
              })
            </script>

            <div class="main_menu lang_menu">
              <ul class="menu">
                <li class="menu-item menu-item-has-children">
<!--                  <a href="#" class="js-lang-btn-current">--><?php //= $lang; ?><!--</a>-->
<!--                  --><?php //= my_site_custom_languages_selector_template(); ?>
                </li>
              </ul>
            </div>

            <script>
              const btn = document.querySelector('.js-lang-btn-current > a, .menu-item-has-children > a, .menu-image-title-after > a');

              btn.addEventListener('click', (e) => {
                  e.preventDefault();
              });
            </script>


            <?php if(is_front_page()){  ?>
              <a href="<?= get_field('header_btn', 'option')['btn_link']; ?>" class="btn btn--right btn--white">
                  <span class="text_m uppercase normal"><?= get_field('header_btn', 'option')['btn_text']; ?></span>
              </a>
            <? } else { ?>
              <a href="<?= get_field('header_btn', 'option')['btn_link']; ?>" class="btn btn--right btn--violet">
                  <span class="text_m uppercase normal"><?= get_field('header_btn', 'option')['btn_text']; ?></span>
              </a>
            <? } ?>

            <div class="burger_wrapper">
              <div class="burger"></div>
            </div>
        </div>
    </header>
