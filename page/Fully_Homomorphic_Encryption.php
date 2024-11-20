<?php
/*
Template Name: Fully Homomorphic Encryption
*/
get_header();
$fully_encryption_content =  get_field('fully_homomorphic_encryption_content');
?>

  <main class="fully_homomorphic_common">
    <div class="container">
      <?php get_template_part('templates/breadcrumbs'); ?>
    </div>
      <?php foreach ($fully_encryption_content as $key => $item) { ?>
        <section class="">
          <?php if ($item['acf_fc_layout'] == 'fully_homomorphic_encryption') { ?>
            <div class="mb-120 container fully_homomorphic_encryption">
             <div class="page_title_block <? if($item['podkast_file']) { echo 'column_2'; }?>">
               <h1 class="text_page_title text section_title color_title ff_secondary">
                 <?= $item['title'] ?>
               </h1>
               <?php get_template_part('templates/audio_player', get_post_type(), $item['podkast_file']); ?>
               <div class="fully_homomorphic_common_content_left">
                 <p class="fully_subtitle text text_md">
                   <?= $item['subtitle'] ?>
                 </p>
               </div>
               <div class="line_separator fully_separator"></div>
             </div>
              <div class="fully_content fully_homomorphic_common_content_left fully_homomorphic_common_content">
                  <?php foreach ($item['content'] as $content_key => $content) { ?>
                      <div class="text_m">
                        <?= $content ?>
                      </div>
                  <?php }?>
              </div>
            </div>
          <?php }?>

          <?php if ($item['acf_fc_layout'] == 'encrypted_data') { ?>
            <div class="container mb-120">
              <div >
                <h2 class="text_ls section_title ff_secondary encrypted_data_h2_no_left"> <?= $item['title'] ?> </h2>
              </div>
              <div class="encrypted_data fully_homomorphic_common_content_left">
                <div class="encrypted_data_content">
                  <div class="text_m">
                    <?= $item['content']['description_left'] ?>
                  </div>
                </div>
                <div class="encrypted_data_content">
                  <div class="text_m ">
                    <?= $item['content']['description_right'] ?>
                  </div>
                </div>
              </div>
            </div>
          <?php }?>

          <?php if ($item['acf_fc_layout'] == 'schemes_rsa') { ?>
              <div class="schemes_rsa mb-120">
                <div class="container">
                  <div class="inner">
                    <div class="bgr"></div>
                    <div>
                      <h2 class="text_l section_title ff_secondary">
                        <?= $item['title'] ?>
                      </h2>
                    </div>
                    <div class="line_separator"></div>
                    <div class="list">
                      <?php foreach ($item['description_schemes'] as $schemes_key => $schemes) { ?>
                          <div class="item wow fadeInLeft">
                            <div class="text_m">
                              <?= $schemes['description']?>
                            </div>
                          </div>
                      <?php }?>
                    </div>
                  </div>
                </div>
              </div>
          <?php }?>

          <?php if ($item['acf_fc_layout'] == 'basic_operations_with_encrypted_data') { ?>
            <div class="container">
              <div class="basic_operations_with_encrypted_data fully_homomorphic_common_content_left">

                <div class="basic_operations_with_encrypted_data_content">
                  <div>
                    <h2 class="text_ls section_title ff_secondary"> <?= $item['title'] ?> </h2>
                  </div>
                  <div class="text_m">
                    <?= $item['content']['description_left'] ?>
                  </div>
                </div>
                <div class="basic_operations_with_encrypted_data_content_repeat">
                  <div class="basic_operations_with_encrypted_data_content_repeat_line">
                    <div class="line_separator"></div>
                  </div>
                  <div class="basic_operations_with_encrypted_data_content_repeat_box">
                    <div>
                      <?php foreach ($item['content']['advantages'] as $advantages_key => $advantages) { ?>
                        <div class='box_line'>
                          <div class="item">
                            <div class="text_m">
                              <?= $advantages['description']?>
                            </div>
                          </div>
                        </div>
                      <?php }?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php }?>

        </section>
      <?php }?>
  </main>

<?php get_footer() ?>

  <!--          -->
  <!--  -->
  <!--          -->
  <!--  -->
  <!--          -->
