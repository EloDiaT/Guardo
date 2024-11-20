<?php
/**
 * The template for displaying all single posts
 */

get_header();
$article_data = get_field('blog_article_content');

?>

  <main class="blogArticle">

    <article class="blogArticle_item" itemscope itemtype="http://schema.org/Article">
      <div class="container">
        <?php get_template_part('templates/breadcrumbs'); ?>
        
        <div class="blog_detailed">
          <div class="blog_detailed_info">

            <div class="blog_detailed_image_wrapper">
              <span itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                  <img class="news_left_sided_img" src="<?= $article_data['blog_logo']['url']; ?>" alt="<?= $article_data['blog_logo']['filename']; ?>" itemprop="url image" />
              </span>
            </div>

            <?php get_template_part('templates/audio_player', get_post_type(), $article_data['podkast_file']); ?>

            <div class="blog_detailed_info_hr"></div>
            <div class="blog_detailed_info_publishin">
              <div class="blog_detailed_info_publishin_date">
                <span>Date</span>
                <!--              <p class="text_s center blog_detailed-date" >--><?php //= get_the_date('j F Y G:i'); ?><!--</p>-->
                <p class="text_s center blog_detailed-date" itemprop="datePublished" content="<?php the_time( 'c' ); ?>"><?= get_the_date('j F Y'); ?></p>
              </div>
              <div class="blog_detailed_info_publishin_view">
                <span>Viewed</span>
                <div class="blog_count">
                  <img class="eye" src="<?= get_stylesheet_directory_uri(); ?>/static/img/eye.svg" alt="eye">
                  <span>
                    <?php if(function_exists('the_views')) { the_views(); } ?>
                 </span>
                </div>
              </div>
            </div>
          </div>
          <div class="article_header">
            <span class="blog_detailed_content_type">Company news</span>
            <h1 class="blog_detailed_content_title">
              <span itemprop="name headline"><?= get_the_title(); ?></span>
            </h1>
            <? if($article_data['description']) { ?>
              <p class="blog_detailed_content_description"><?= $article_data['description']; ?></p>
            <? } ?>
          </div>
          <div class="blog_detailed_content">
            <div class="blog_detailed_content_text common_text" itemprop="articleBody">
              <?= $article_data['article_content']; ?>
            </div>
          </div>
        </div>
      </div>

      <div class="newsBlockFooterSignature" itemprop="author" itemscope itemtype="https://schema.org/Person">
          <a itemprop="url" style="display: none;" href="<?= get_site_url(); ?>" class="news_author">
            <span itemprop="name">Oz Forensics</span>
          </a>
      </div>

      <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?= get_site_url(); ?>" content="<?= get_site_url(); ?>" />
      <meta itemprop="author" content="Guardora Admin">

      <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
        <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
          <img itemprop="url image" alt="logo" src="<?= get_field('header_logo', 'option')['color']['url']; ?>" style="display:none;" />
        </div>
        <meta itemprop="name" content="Guardora">
      </div>

    </article>
    <div class="container">
      <div class="line_separator"></div>
      <div class="single_blog_mini">
        <h2 class="single_blog_mini_title ff_secondary">Latest Articles</h2>
        <a class="link_blog" href="/blog">
          <span>all articles</span>
          <span class="link_blog-arrow">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M16.172 11L10.808 5.63605L12.222 4.22205L20 12L12.222 19.778L10.808 18.364L16.172 13H4V11H16.172Z" fill="black"/>
            </svg>
          </span>
        </a>
      </div>
      <div class="blog_list">

        <?php

        $args = array(
          'post_type'      => 'blog_articles',
          'posts_per_page' => 5,
          'order'          => 'ASC'
        );

        $inc = 0;

        $query = new WP_Query($args); ?>

        <?php if ($query->have_posts()) : ?>
          <?php while ($query->have_posts()) : $query->the_post(); ?>
              <?php if ($article_data['blog_logo']['ID'] !== get_field('blog_article_content')['blog_logo']['ID'] && $inc < 3) { ?>
                <?php get_template_part('templates/article_card', get_post_type(), get_field('blog_article_content')); $inc++; ?>
              <?php }?>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <p><?php _e('No posts found'); ?></p>
        <?php endif; ?>

      </div>

      <a class="link_blog mobile_link_blog" href="/blog">
        <span>all articles</span>
        <span class="link_blog-arrow">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M16.172 11L10.808 5.63605L12.222 4.22205L20 12L12.222 19.778L10.808 18.364L16.172 13H4V11H16.172Z" fill="black"/>
            </svg>
          </span>
      </a>
    </div>

    <div class="container">
      <div class="blog_subcribe_form">
        <!-- <div class="blog_subcribe_form_bgi"></div> -->
        <div class="bg_pos">
                <div class="bgr1"></div>
              </div>
              <div class="bg_pos">
                <div class="bgr2"></div>
              </div>
        <div class="blog_subcribe_form_wrapper">
          <div class="blog_subcribe_form_title">
            <span>Subscribe</span> to <br> our Newsletter
          </div>
          <div class="form_item" data-form-type="subscribe">
            <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
            <script>
              hbspt.forms.create({
                region: "na1",
                portalId: "45612542",
                formId: "c553407c-d414-48d1-80c3-9855b9fa33bf"
              });
            </script>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script>
    jQuery(document).ready(function($) {
      $('.tablepress').each(function(ind, e){
        var table = $(this);
        table.before('<div class="wp_table_wrapper" id="table_wrapper_'+ ind +'"></div>');
        $('#table_wrapper_'+ ind).html(e);
      })
    });
  </script>


<?
get_footer();
