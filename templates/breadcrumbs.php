<? $page_id;
if(is_home()) {
    $page_id = get_option('page_for_posts');
} else {
    $page_id = get_the_ID();
}

$ancestors = get_ancestors( $page_id, 'page' );
$site_url = get_site_url();
$last = 0;

?>

<div class="breadcrumbs">
    <a href="/" class="link_main">
    <svg><use href="#dots"></use></svg>
    </a>
    <div class="divider"><svg><use href="#chevron_right"></use></svg></div>

    <? if (get_post_type() == 'blog_articles') { ?>
        <a href="<?= get_the_permalink(221); ?>" class="link text_s color_dark_gray"><?= get_the_title(221); ?></a>
        <div class="divider"><svg><use href="#chevron_right"></use></svg></div>
    <? } ?>

    <? foreach ($ancestors as $key => $ancestor_id) { ?>
        <a href="<?= get_the_permalink($ancestor_id); ?>" class="link text_s color_dark_gray"><?= get_the_title($ancestor_id); ?></a>
        <div class="divider"><svg><use href="#chevron_right"></use></svg></div>
    <? } ?>

    <span class="text_s js-last-item"><?= get_the_title($page_id); ?></span>
</div>


<!--<script>-->
<!--  jQuery(document).ready(function($) {-->
<!--    var winWidth = $(window).width();-->
<!--    if(winWidth <= 700) {-->
<!--      var item_width = parseInt($('.js-last-item').css('width'));-->
<!--      $('.js-last-item').css('width', item_width);-->
<!--    }-->
<!--  });-->
<!--  -->
<!--</script>-->

<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [{
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "<?= $site_url; ?>"
    },

    <? if (get_post_type() == 'blog_articles') {
        $last = 2; ?>
        {
        "@type": "ListItem",
        "position": 2,
        "name": "<?= get_the_title(221); ?>",
        "item": "<?= get_the_permalink(221); ?>"
        },
    <? } ?>

    <? foreach ($ancestors as $key => $ancestor_id) {
        $last = $key + 3; ?>
        {
        "@type": "ListItem",
        "position": <?= $key + 2?>,
        "name": "<?= get_the_title($ancestor_id); ?>",
        "item": "<?= get_the_permalink($ancestor_id); ?>"
        },
    <? } ?>

    {
      "item": "item",
      "@type": "ListItem",
      "position": 3,
      "name": "<?= get_the_title($page_id); ?>"
    }]
  }
  </script>

<svg style="display: none;">
    <svg viewBox="0 0 16 16" id="dots">
    <path d="M5 8C5 8.55228 4.55228 9 4 9C3.44772 9 3 8.55228 3 8C3 7.44772 3.44772 7 4 7C4.55228 7 5 7.44772 5 8Z" fill="#6E7C87"/>
    <path d="M9 8C9 8.55228 8.55228 9 8 9C7.44772 9 7 8.55228 7 8C7 7.44772 7.44772 7 8 7C8.55228 7 9 7.44772 9 8Z" fill="#6E7C87"/>
    <path d="M12 9C12.5523 9 13 8.55228 13 8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8C11 8.55228 11.4477 9 12 9Z" fill="#6E7C87"/>
    </svg>
    <svg viewBox="0 0 12 16" id="chevron_right">
    <path d="M4 3.5L8.5 8L4 12.5" stroke="#6E7C87"/>
    </svg>
</svg>


