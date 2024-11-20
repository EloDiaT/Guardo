<?php
/*
Template Name: Federated Learning
*/
get_header();
$federated_learning =  get_field('federated_learning_content');
?>

  <main class="container federated_learning_common">
    <?php get_template_part('templates/breadcrumbs'); ?>
    <?php foreach ($federated_learning as $key => $item) { ?>
      <section class="mb-120">
        <?php if ($item['acf_fc_layout'] == 'federated_learning') { ?>
          <div class="federated_learning">
            <div class="page_title_block <? if($item['podkast_file']) { echo 'column_2'; }?>">
              <h1 class="federated_learning_title text_page_title text section_title color_title ff_secondary">
                <?= $item['title'] ?>
              </h1>
              <?php get_template_part('templates/audio_player', get_post_type(), $item['podkast_file']); ?>
              <div class="federated_learning_common_left subtitle">
                <span class="text text_md">
                  <?= $item['subtitle'] ?>
                </span>
              </div>
              <div class="line_separator"></div>
            </div>
            <div class="federated_learning_content federated_learning_common_left">
              <div class="mb-120">
                <?php foreach ($item['types_machine_learning'] as $learning_key => $learning_item) { ?>
                  <div class="federated_learning_common_separator">
                    <div class="federated_learning_common_grid wow fadeInLeft">
                      <div class="coll">
                        <div class="custom_coll_div text_m">
                          <?= $learning_item['description']?>
                        </div>
                      </div>
                      <div class="coll federated_learning_common_img_left">
                        <img src="<?= $learning_item['img']['url']?>" alt="<?= $learning_item['img']['name']?>">
                      </div>
                    </div>
                  </div>
                <?php }?>
              </div>
              <div class="federated_learning_content_obstacle mb-120 wow fadeInLeft">
                <div class="item federated_learning_common_grid">
                  <div class="coll">
                      <div class="text_m">
                         <?=$item['obstacle_machine_learning']['right_col']['description_mini'] ?>
                      </div>
                     <div class="federated_learning_content_obstacle_list">
                       <?php foreach ($item['obstacle_machine_learning']['right_col']['obstacle_list'] as $obstacle_key => $obstacle_item) { ?>
                         <div class="federated_learning_content_obstacle_list_item">
                           <div>
                             <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <path d="M12 0.5C5.38835 0.5 0 5.88835 0 12.5C0 19.1117 5.38835 24.5 12 24.5C18.6117 24.5 24 19.1117 24 12.5C24 5.88835 18.6117 0.5 12 0.5ZM1.74758 12.5C1.74758 6.84952 6.34952 2.24758 12 2.24758C14.534 2.24758 16.835 3.15049 18.6117 4.66504L4.16504 19.1117C2.65049 17.3349 1.74758 15.034 1.74758 12.5ZM12 22.7524C9.49512 22.7524 7.19418 21.8495 5.4175 20.3641L19.8641 5.9175C21.3495 7.69418 22.2524 9.99518 22.2524 12.5C22.2524 18.1505 17.6505 22.7524 12 22.7524Z" fill="#9588E8"/>
                             </svg>
                           </div>
                           <div class="text_m">
                             <?= $obstacle_item['obstacle'] ?>
                           </div>
                         </div>
                       <?php }?>
                     </div>
                  </div>
                  <div class="coll">
                    <div class="custom_coll_div text_m">
                      <?=$item['obstacle_machine_learning']['left_col']['description'] ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="federated_learning_content_federated wow fadeInLeft">
                  <div class="federated_learning_common_grid">
                      <div class="coll">
                        <div class="text_m federated_learning_content_federated_right_col">
                          <?= $item['federated_learning']['right_col'] ?>
                        </div>
                      </div>
                      <div class="coll">
                        <div class="federated_learning_content_federated_list">
                          <?php foreach ($item['federated_learning']['left_col']['confrontation'] as $confrontation_key => $confrontation_item) { ?>
                              <div class="federated_learning_content_federated_list_item">
                                  <div class="federated_learning_content_federated_list_item_element">
                                    <div>
                                      <img src="<?= $confrontation_item['confrontation_element_1']['img']['url']?>"
                                           alt="<?= $confrontation_item['confrontation_element_1']['img']['name'] ?>">
                                    </div>
                                    <div class="text_m">
                                      <?= $confrontation_item['confrontation_element_1']['description'] ?>
                                    </div>
                                  </div>
                                  <div class="federated_learning_content_federated_list_item_separator">
                                    <div class="text_m">
                                      <?= $confrontation_item['separator'] ?>
                                    </div>
                                  </div>
                                  <div class="federated_learning_content_federated_list_item_element">
                                    <div>
                                      <img src="<?= $confrontation_item['confrontation_element_2']['img']['url'] ?>"
                                           alt="<?= $confrontation_item['confrontation_element_2']['img']['name'] ?>">
                                    </div>
                                    <div class="text_m">
                                      <?= $confrontation_item['confrontation_element_2']['description'] ?>
                                    </div>
                                  </div>
                              </div>
                          <?php }?>
                        </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        <?php }?>


        <?php if ($item['acf_fc_layout'] == 'basic_principles') { ?>
          <div class="basic_principles">
            <div class="page_title_block">
              <div class="basic_principles_title">
                <h2 class="text_l section_title ff_secondary"> <?= $item['title'] ?> </h2>
              </div>
              <div class="line_separator"></div>
            </div>
              <div class="basic_principles_content ">
                  <div class="basic_principles_content_step_list mb-120 federated_learning_common_left">
                    <?php foreach ($item['basic_principles_list'] as $list_key => $list_item) { ?>
                      <div class="basic_principles_content_step_list_item federated_learning_common_separator">
                        <div class="federated_learning_common_grid wow fadeInLeft">
                          <div class="coll">
                            <?php if ($list_key < count($item['basic_principles_list']) - 1) {?>
                              <div class="text_l semibold ff_secondary">Step <?= $list_key ?></div>
                            <?php }?>
                            <div class="basic_principles_content_step_list_item_description">
                              <div class="text_m "><?= $list_item['description'] ?></div>
                            </div>
                          </div>
                          <?php if ($list_item['img']) {?>
                            <div class="coll">
                              <div class="federated_learning_common_img_left">
                                  <img src="<?= $list_item['img']['url'] ?>" alt="<?= $list_item['img']['name'] ?>">
                              </div>
                            </div>
                          <?php }?>
                        </div>
                      </div>
                    <?php }?>
                  </div>
                  <div class="basic_principles_content_card">
                      <div class="federated_learning_common_grid">
                          <?php foreach ($item['card'] as $card_key => $card_item) {?>
                            <div class="basic_principles_content_card_item">
                              <div>
                                <h3 class="text_ls ff_secondary"><?= $card_item['title'] ?></h3>
                              </div>
                              <div
                                class="basic_principles_content_card_item_card
                                <?=$card_item['card_color'] ? 'card_item_white' : 'card_item_violet'  ?>"
                              >
                                <div>
                                  <?php foreach ($card_item['list'] as $card_list_key => $card_list_item) {?>
                                    <div class="item federated_learning_common_separator wow">
                                      <div>
                                        <div class="item_title">
                                          <div class="text_ml semibold">
                                            <?= $card_list_item['title']?>
                                          </div>
                                        </div>
                                        <div class="text_m"><?= $card_list_item['description']?></div>
                                      </div>
                                    </div>
                                  <?php }?>
                                </div>
                              </div>
                            </div>
                          <?php }?>
                      </div>
                  </div>
                  <div class="basic_principles_content_conclusion federated_learning_common_left">
                      <div class="federated_learning_common_grid">
                        <div class="coll">
                          <div class="custom_coll_div text_m">
                            <?= $item['conclusion']['left_col'] ?>
                          </div>
                        </div>
                        <div class="coll">
                          <div class="custom_coll_div text_m">
                            <?= $item['conclusion']['right_col'] ?>
                          </div>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
        <?php }?>

      </section>
    <?php }?>
  </main>



<?php  get_footer()?>
