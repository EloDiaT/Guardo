<?php
/*
Template Name: FAQ Template
*/
get_header();
$faq_content =  get_field('faq_content');
?>

<main class="container faq">

  <?php get_template_part('templates/breadcrumbs'); ?>

   <div class="page_title_block page_title_block--faq">
    <h1 class="text_page_title text section_title color_title ff_secondary"><?= $faq_content['title'] ?></h1>
    <div class="line_separator AboutUs_separator "></div>
  </div>

  <div class="faq_content">
    <div class="faq_content_feedback" id="parent">
        <div class="feedback_fixed" id="child">
            <div>
              <div class="feedback_fixed_title text_ls ff_secondary normal"><?= $faq_content['description']['description_title'] ?></div>
              <p class="feedback_fixed_text text_m"><?= $faq_content['description']['description_text'] ?></p>
            </div>
          <div class="feedback_fixed_img">
            <img src="<?= $faq_content['img']['url'] ?>" alt="img">
          </div>
        </div>
    </div>
    <div class="faq_content_questions">
      <?php foreach ($faq_content['question_answer'] as $key => $items) {?>
        <div class="faq_content_questions_element">
          <div class="faq_content_questions_item">
            <div class="faq_content_questions_item_top" onclick="questions_answer(<?= $key ?>)">
              <div class="faq_content_questions_item_top_icon" id="questions_top_icon-<?= $key ?>">
                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8.51172 1V15" stroke="#9588E8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M1.33984 8L15.6813 8" stroke="#9588E8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <div class="faq_content_questions_item_top_question" id="questions_top_question-<?= $key ?>">
                <?= $items['question'] ?>
              </div>
            </div>
            <div class="faq_content_questions_item_answer answer_false" id="content_questions_answer-<?= $key ?>">
              <?= $items['answer'] ?>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</main>

<?php get_footer() ?>
