<?php
/*
Template Name: Oil&Gas Template
*/
get_header();
$oil_gas_content =  get_field('oil_gas_content');
?>
<?php ?>
<main class="container Oil_Gas">

  <?php get_template_part('templates/breadcrumbs'); ?>
  <?php if(is_array($oil_gas_content)) {?>

    <?php foreach ($oil_gas_content as $key => $item) { ?>
      <section class="oil_section">

        <?php if ($item['acf_fc_layout'] == 'oilGas') { ?>
            <div class="page_title_block <? if($item['podkast_file']) { echo 'column_2'; }?>">
              <h1 class="Oil_Gas_title-h1 text_page_title text section_title color_title ff_secondary"> <?= $item['title'] ?> </h1>
              <?php get_template_part('templates/audio_player', get_post_type(), $item['podkast_file']); ?>
              <div class="Oil_Gas_subtitle text text_md">
                <p>
                  <?= $item['subtitle'] ?>
                </p>
              </div>
            </div>
            <div class="line_separator Oil_Gas_separator"></div>
            <div class="Oil_Gas_content">
              <div class="Oil_Gas_content_info">
               <div class="Oil_Gas_content_info_wrapper">
                 <?php foreach ($item['info_industry'] as $industry_key => $industry) { ?>
                   <div class="Oil_Gas_content_info_wrapper_item">
                     <div class="Oil_Gas_content_info_wrapper_item_title text text_m"><?=$industry['title'] ?></div>
                     <div class="Oil_Gas_content_info_wrapper_item_text text_m"><?=$industry['text'] ?></div>
                   </div>
                 <?php } ?>
               </div>
              </div>
              <div class="Oil_Gas_content_img">
                <img src="<?= $item['img']['url'] ?>" alt="">
              </div>
            </div>
        <?php } ?>

        <?php if ($item['acf_fc_layout'] == 'customer') { ?>
            <div class="Oil_Gas_customer_content">
              <div class="Oil_Gas_customer_content_text">
                <h2 class="text_l section_title ff_secondary"> <?= $item['title'] ?> </h2>
                <div class="text_m">
                    <?= $item['text'] ?>
                </div>
              </div>
              <div class="Oil_Gas_customer_content_list">
                <div class="Oil_Gas_customer_content_list_title text text_ml">
                  <?= $item['advantages']['title'] ?>
                </div>
                <ul>
                  <?php foreach ($item['advantages']['advantages'] as $advantage) {?>
                    <li class="Oil_Gas_customer_content_list_item text_m"> <?= $advantage['text'] ?> </li>
                  <?php }?>
                </ul>
              </div>
            </div>
        <?php } ?>

        <?php if ($item['acf_fc_layout'] == 'challenge') { ?>
          <div class="Oil_Gas_challenge_content">
            <h2 class="text_l section_title  ff_secondary"> <?= $item['title'] ?> </h2>
            <div class="Oil_Gas_challenge_content_wrapper">
              <div class="Oil_Gas_challenge_content_wrapper_text_left">
                <div class="text_m">
                  <?= $item['text_left'] ?>
                 </div>
              </div>
              <div class="Oil_Gas_challenge_content_wrapper_text_right text_m">
                <?= $item['text_right'] ?>
              </div>
            </div>
          </div>
        <?php } ?>

        <?php if ($item['acf_fc_layout'] == 'encryption') { ?>
            <div class="Oil_Gas_encryption">
              <div class="Oil_Gas_encryption_title">
                <h2 class="text_l section_title  ff_secondary"> <?= $item['title'] ?> </h2>
              </div>
              <div class="Oil_Gas_encryption_content">
                <?php foreach ($item['steep'] as $steep) {?>
                  <div class="Oil_Gas_encryption_content_item">
                    <div class="Oil_Gas_encryption_content_item_img">
                      <div>
                        <img src="<?= $steep['img']['url'] ?>" alt="">
                      </div>
                    </div>
                    <div class="Oil_Gas_encryption_content_item_title text_m">
                      <?= $steep['title'] ?>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>

        <?php } ?>

        <?php if ($item['acf_fc_layout'] == 'solution') { ?>
            <h2 class="text_l section_title  ff_secondary"> <?= $item['title'] ?> </h2>
            <?php foreach ($item['solution_detail'] as $detail) {?>
            <div class="Oil_Gas_solution_content">
                <div class="Oil_Gas_solution_content_text text_m">
                    <?= $detail['text'] ?>
                </div>
                <div class="Oil_Gas_solution_content_wrapper">
                  <?php foreach ($detail['location'] as $local) {?>
                    <div class="Oil_Gas_solution_content_wrapper_item">
                      <img class="Oil_Gas_solution_content_wrapper_item_img" src="<?= $local['img']['url'] ?>" alt="">
                      <div class="Oil_Gas_solution_content_wrapper_item_description text_s">
                        <?= $local['description'] ?>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
            <?php } ?>
        <?php } ?>

        <?php if ($item['acf_fc_layout'] == 'results') { ?>
            <h2 class="text_l result_title section_title  ff_secondary"> <?= $item['title'] ?> </h2>
            <div class="line_separator Oil_Gas_separator"></div>
            <div class="Oil_Gas_results_content">
                <div class="Oil_Gas_results_content_wrapper">
                    <div class="Oil_Gas_results_content_wrapper_list">
                        <?php foreach ($item['spisok_rezultatov'] as $li) { ?>
                          <div class="text_m">
                            <?=$li['text'] ?>
                          </div>
                        <?php } ?>
                    </div>
                    <div class="Oil_Gas_results_content_wrapper_img">
                      <img src="<?= $item['img']['url'] ?>" alt="">
                    </div>
                </div>
            </div>
        <?php } ?>

      </section>
    <?php } ?>

  <?php } ?>
<!--  <h1 class="faq_title">--><?php //= $oil_gas_content['title'] ?><!--</h1>-->
</main>

<?php get_footer() ?>
