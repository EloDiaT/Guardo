<?php
/*
Template Name: Industry Template
*/
get_header();
$industry_content =  get_field('Industry_content');
?>

<main class="container industry">
  <?php get_template_part('templates/breadcrumbs'); ?>
  <?php if(is_array($industry_content)) {?>
    <?php foreach ($industry_content as $key => $item) { ?>
      <section class="industry_section">

      <?php if ($item['acf_fc_layout'] == 'industry') { ?>
        <div class="page_title_block <? if($item['podkast_file']) { echo 'column_2'; }?>">
            <h1 class="text_page_title text section_title color_title ff_secondary"> <?= $item['title'] ?> </h1>
            <?php get_template_part('templates/audio_player', get_post_type(), $item['podkast_file']); ?>
            <div class="text text_md">
              <p class="industry_subtitle">
                <?= $item['subtitle'] ?>
              </p>
            </div>
          </div>
          <div class="line_separator industry_separator"></div>
          <div class="industry_content">
            <div class="industry_content_wrapper">
                <div class="industry_content_wrapper_list">
                <?php foreach ($item['content']['list'] as $industry_key => $industry) { ?>
                  <div class="industry_content_wrapper_list_item">
                    <div class="item_title"> <?= $industry['title'] ?></div>  
                    <div class="text_m"> <?= $industry['text'] ?></div>  
                  </div>
                <?}?>

                </div>
            </div>
            <div class="industry_content_img">
              <img src="<?= $item['content']['img']['url'] ?>" alt="">
            </div>
          </div>
        </div>
      <?}?>
      <?php if ($item['acf_fc_layout'] == 'Customers') { ?>
        <div class="industry_customer_content">
          <div class="industry_customer_content_text">
            <h2 class="text_l section_title ff_secondary"> <?= $item['left_block']['title'] ?> </h2>
            <div class="text_m">
                <?= $item['left_block']['text'] ?>
            </div>
          </div>
          <div class="industry_customer_content_list">
            <div class="industry_customer_content_list_title text text_ml">
              <?= $item['right_block']['title'] ?>
            </div>
            <ul>
              <?php foreach ($item['right_block']['list'] as $list_item) {?>
                <li class="industry_customer_content_list_item text_m"> <?= $list_item['text'] ?> </li>
              <?php }?>
            </ul>
          </div>
        </div>
      <?}?>
      <?php if ($item['acf_fc_layout'] == 'Challenge') { ?>
        <div class="industry_customer_content industry_challenge_content">
          <div class="industry_customer_content_text">
            <h2 class="text_l section_title ff_secondary"> <?= $item['left_block']['title'] ?> </h2>
            <div class="text_m">
                <?= $item['left_block']['text'] ?>
            </div>
          </div>
          <div class="industry_customer_content_list">
            <div class="industry_customer_content_list_title industry_challenge_content_list_title text text_ml">
              <?= $item['right_block']['title'] ?>
            </div>
            <div class="industry_block_purple text_m"> <?= $item['right_block']['text'] ?> </div>
          </div>
        </div>
      <?}?>
      <?php if ($item['acf_fc_layout'] == 'functional_transformation') { ?>
        <div class="industry_encryption">
          <div class="industry_encryption_title">
            <h2 class="text_ls section_title  ff_secondary"> <?= $item['title'] ?> </h2>
          </div>
          <div class="industry_encryption_content">
            <?php foreach ($item['steep'] as $steep) {?>
              <div class="industry_encryption_content_item">
                <div class="industry_encryption_content_item_img">
                  <div>
                    <img src="<?= $steep['img']['url'] ?>" alt="">
                  </div>
                </div>
                <div class="industry_encryption_content_item_title text_m">
                  <?= $steep['text'] ?>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      <?}?>
      <?php if ($item['acf_fc_layout'] == 'Solution') { ?>
          <h2 class="text_l section_title  ff_secondary"> <?= $item['title'] ?> </h2>
            <div class="industry_solution_content">
               <div class="industry_solution_content_wrapper">
                <div class="industry_solution_content_text text_m">
                      <?= $item['description']['text'] ?>
                  </div>
                  <div class="industry_solution_content_wrapper_img">
                    <img src="<?= $item['description']['img']['url'] ?>" alt="">
                  </div>
               </div>
               <div class="industry_solution_content_text industry_solution_content_text_mt  text_m">
                    <?= $item['description']['text_2'] ?>
               </div>
               <div class="industry_solution_content_list industry_section">
                <div class="industry_solution_content_list_carusel">
                  <div class="industry_carusel">
                    <?php foreach ($item['list'] as $list_c) {?>
                      <div class="industry_solution_content_list_carusel_item">
                        <img src="<?= $list_c['img']['url'] ?>" alt="">
                      </div>
                    <?}?>
                  </div>
                  <div class="slider-pagination">
                    <a class="slider-pagination-prev">
                      <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.828 11.4684L13.192 6.10443L11.778 4.69043L4 12.4684L11.778 20.2464L13.192 18.8324L7.828 13.4684H20V11.4684H7.828Z" fill="black"/>
                      </svg>
                    </a>
                    <div>
                      <span class="current-slide">01</span> \ <span class="total-slides">
                          <? if (count($item['list']) <= 9) { ?>0<?}?><?=count($item['list'])?>
                      </span> 
                    </div>
                    <a class="slider-pagination-next">
                      <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.172 11.4684L10.808 6.10443L12.222 4.69043L20 12.4684L12.222 20.2464L10.808 18.8324L16.172 13.4684H4V11.4684H16.172Z" fill="black"/>
                      </svg>
                    </a>
                  </div>
                </div>
                <div class="industry_solution_content_list_grid">
                  <?php foreach ($item['list'] as $list) {?>
                    <div class="industry_solution_content_list_grid_item">
                      <img src="<?= $list['img']['url'] ?>" alt="">
                    </div>
                  <?}?>
                </div>
                
               </div>
               <div class="industry_solution_content_detailed_description">
                  <div class="industry_solution_content_detailed_description_text">
                      <?= $item['detailed_description']['text']?>
                  </div>
                  <div class="industry_solution_content_detailed_description_table industry_section">
                    <table>
                        <tr>
                          <th><span>Input data</span></th>
                          <th><span>Batch size</span></th>
                          <th><span>Epochs</span></th>
                          <th><span>Workers</span></th>
                          <th><span>Max mAP_0.5</span></th>
                          <th><span>Max <br> mAP_0.5:0.95</span></th>
                          <th><span>Run time <br> (hours)</span></th>
                          <th><span>Dataset size</span></th>
                        </tr>
                        <?php foreach ($item['detailed_description']['table'] as $row) {?>
                          <tr>
                            <td><span><?= $row['row']['input_data']?></span></td>
                            <td><span><?= $row['row']['batch_size']?></span></td>
                            <td><span><?= $row['row']['epochs']?></span></td>
                            <td><span><?= $row['row']['workers']?></span></td>
                            <td><span><?= $row['row']['max_map_05']?></span></td>
                            <td><span><?= $row['row']['max_map_05095']?></span></td>
                            <td><span><?= $row['row']['run_time_hours']?></span></td>
                            <td><span><?= $row['row']['dataset_size']?></span></td>
                          </tr>
                        <?}?>
                      </table>
                  </div>
                  <div class="industry_solution_content_detailed_description_additional_information industry_section">
                    <div class="additional_information_left">
                      <?= $item['detailed_description']['additional_information']['left_block'] ?>
                    </div>
                    <div class="additional_information_right">
                      <div class="industry_block_purple">
                        <?= $item['detailed_description']['additional_information']['right_block'] ?>
                      </div>
                    </div>
                  </div>
                  <div class="industry_solution_content_detailed_description_list">
                    <?php foreach ($item['detailed_description']['list'] as $li) {?>
                      <div class="industry_solution_content_detailed_description_list_item">
                        <div class="item_img">
                          <img src="<?= $li['img']['url']?>" alt="">
                        </div>
                        <div class="item_text"><?= $li['description']?></div>
                      </div>
                    <?}?>
                  </div>
               </div>
            </div>
      <?}?>
      <?php if ($item['acf_fc_layout'] == 'results') { ?>
        <h2 class="text_l result_title section_title  ff_secondary"> <?= $item['title'] ?> </h2>
        <div class="line_separator industry_separator"></div>
        <div class="industry_content industry_content_results industry_section">
          <div class="industry_content_wrapper">
              <div class="industry_content_wrapper_list">
              <?php foreach ($item['content']['list'] as $industry_key => $industry) { ?>
                <div class="industry_content_wrapper_list_item">
                  <div class="text_m"> <?= $industry['text'] ?></div>  
                </div>
              <?}?>
              </div>
          </div>
          <div class="industry_content_img">
            <img src="<?= $item['content']['img']['url'] ?>" alt="">
          </div>
        </div>
        <div class="industry_results_link industry_section">
          <div class="industry_results_link_title"><?= $item['blok_link']['description'] ?></div>
          <div class="industry_results_link_text"><?= $item['blok_link']['link'] ?></div>
        </div>
        <div class="about_list industry_results_demo">
            <div class="inner">
              <div class="bg_pos">
                <div class="bgr1"></div>
              </div>
              <div class="bg_pos">
                <div class="bgr2"></div>
              </div>
              <div class="industry_results_demo_content">
                <div class="industry_results_demo_content_text">
                  <div class="text_l ff_secondary industry_results_demo_content_title">
                    <span>Give it</span> a try yourself!
                  </div>
                  <div class="text_ml industry_results_demo_content_subtitle">Request a Demo Version of the Data Protection Software here</div>
                </div>
                <div>
                  <a href="/product/demo/" class="btn btn--right btn--white">
                    <span class="text_m normal">Request a Demo</span>
                  </a>
                </div>
              </div>
            </div>
        </div>
      <?}?>
      </section>
    <?}?>
  <?}?>
</main>

<?php get_footer() ?>