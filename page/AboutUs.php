<?php
/*
Template Name: AboutUs Template
*/
get_header();
$aboutUs_content =  get_field('aboutUs_content');

?>
<!--wow fadeInLeft-->
<main class="container AboutUs">
  <?php get_template_part('templates/breadcrumbs'); ?>
  <div class="page_title_block page_title_block--about_us <? if($aboutUs_content['podkast_file']) { echo 'column_2'; }?>">
    <h1 class="text_page_title text section_title color_title ff_secondary"><?= $aboutUs_content['title'] ?></h1>
    <?php get_template_part('templates/audio_player', get_post_type(), $aboutUs_content['podkast_file']); ?>
    <div class="line_separator AboutUs_separator"></div>
  </div>
  <div class="AboutUs_content wow fadeInLeft">
      <div class="AboutUs_content_img">
        <img src="<?= $aboutUs_content['img']['url'] ?>" alt="">
      </div>
      <div class="AboutUs_content_text">
        <div>
          <?= $aboutUs_content['description'] ?>
        </div>
      </div>
  </div>
</main>

<?php get_footer(); ?>
