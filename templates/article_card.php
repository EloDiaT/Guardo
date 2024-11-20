<?php
$card_data = $args;
?>
<a href="<?php the_permalink(); ?>" class="blog_list_item wow fadeInLeft" data-wow-duration="1000ms" data-wow-offset="200" itemscope itemtype="http://schema.org/Article">
  <!-- <div class="blog_list_item_decor">
    <div class="blog_list_item_decor_fon"></div>
    <img src="<?= get_stylesheet_directory_uri(); ?>/static/img/blog_item_before.png" alt="">
  </div> -->
  <div class="blog_list_item_content">
    <div class="content_date">
      <p class="text_s content_date_date" itemprop="datePublished" content="<?php the_time( 'c' ); ?>"><?= get_the_date('j F Y'); ?></p>
      <span class="content_date_btn">Company news</span>
    </div>

    <div class="content_main-img">
      <?php if ($card_data['blog_logo']) { ?>
          <span itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
              <img class="news_left_sided_img" src="<?= $card_data['blog_logo']['url']; ?>" alt="<?= $card_data['blog_logo']['filename']; ?>" itemprop="url image" />
          </span>

      <?php } else { ?>
        <span class="content_text-title" style="color: red"> Not found </span>
      <?php } ?>

    </div>
    <div class="content_text">
      <div class="content_text_wrapper">
        <h3 class="content_text-title">
          <span id="clampText_title-<?= $card_data['blog_logo']['id']; ?>" itemprop="name headline"><?php the_title(); ?></span>
        </h3>
        <p class="content_text-description">
          <span id="clampText-<?= $card_data['blog_logo']['id']; ?>" itemprop="description">
            <?= $card_data['description_card']; ?>
          </span>
        </p>
      </div>
      <script>
        $clamp(document.getElementById("clampText_title-<?= $card_data['blog_logo']['id']; ?>"), {clamp: 3});
        $clamp(document.getElementById("clampText-<?= $card_data['blog_logo']['id']; ?>"), {clamp: 3});
      </script>
      
      <div class="article_card_footer">
        <?php if($card_data['podkast_file']) {
          get_template_part('templates/audio_player', get_post_type(), $card_data['podkast_file']);
        } ?>
        
      <div class="blog_count">
        <img class="eye" src="<?= get_stylesheet_directory_uri(); ?>/static/img/eye.svg" alt="eye">
        <span>
          <?php if(function_exists('the_views')) { the_views(); } ?>
        </span>
      </div>


      </div>
    </div>
  </div>

  <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php the_permalink(); ?>" content="<?php the_permalink(); ?>" />
  <meta itemprop="author" content="Guardora Admin">

  <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
    <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
      <img itemprop="url image" alt="logo" src="<?= get_field('header_logo', 'option')['color']['url']; ?>" style="display:none;" />
    </div>
    <meta itemprop="name" content="Guardora">
  </div>
</a>
