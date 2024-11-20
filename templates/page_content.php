<? $services_data = $args; ?>
<? $post_slug = get_post_field( 'post_name', get_post() ); ?>

<? if($post_slug != 'main') {
    echo '<div class="container">';
        get_template_part('templates/breadcrumbs');
    echo '</div>';
} ?>

<? if(is_array($services_data)) {
foreach ($services_data as $key => $item) {
  if($item['acf_fc_layout'] == 'promo') { ?>
    <? $ancestors = get_ancestors( get_the_ID(), 'page' ); ?>

    <section class="promo">
        <div class="bgr_desktop" style="background-image: url(<?= $item['bgr_images']['desktop']; ?>);">
            <p>artificial intelligence</p>
            <div class="dot dot_1"></div>
            <div class="dot dot_2"></div>
        </div>
        <div class="container">
            <div class="promo_inner">
                <div class="promo_text">
                    <h1 class="title ff_secondary" data-wow-duration="1000ms" data-wow-delay="300ms" data-wow-offset="50">
                      <?= $item['title']; ?>
                    </h1>
                    <p class="text_ml" data-wow-duration="600ms" data-wow-delay="600ms" data-wow-offset="50">
                      <?= $item['text_description']; ?>
                    </p>
                </div>
            </div>

            <a href="#text_box_about_1" class="scroll_btn" id="down_link">
                <span class="inner">
                    <span class="text_ml">scroll</span>
                    <span class="arrow"></span>
                </span>
			</a>
        </div>
    </section>

  <? } if($item['acf_fc_layout'] == 'page_title_block') { ?>

    <div class="container">
        <section class="page_title_block page_title_block--<?= $post_slug; ?> <? if($item['podkast_file']) { echo 'column_2'; }?>">
            <h1 class="text_page_title text section_title color_title ff_secondary"> <?= $item['text_page_title'] ?> </h1>
            <?php get_template_part('templates/audio_player', get_post_type(), $item['podkast_file']); ?>
            <div class="subtitle_wrapper">
                <p class="text text_md">
                    <?= $item['subtitle'] ?>
                </p>
            </div>

            <div class="line_separator"></div>
        </section>
    </div>

  <? } if($item['acf_fc_layout'] == 'list_image_right_block') { ?>

    <section class="list_image_right_block section_item">
        <div class="container">
            <div class="inner">
                <div class="content_wrapper">
                    <div class="content_wrapper_list">
                        <?php foreach ($item['list'] as $key => $list_item) { ?>
                            <div class="content_wrapper_list_item">
                                <p class="item_title"> <?= $list_item['title'] ?></p>  
                                <div class="text_m"> <?= $list_item['text'] ?></div>  
                            </div>
                        <?}?>
                    </div>
                </div>
                <div class="industry_content_img">
                    <img src="<?= $item['image']['url'] ?>" alt="<?= $item['image']['alt'] ?>">
                </div>
            </div>
        </div>
    </section>

  <? } if($item['acf_fc_layout'] == 'two_column_text_list_block') { ?>

    <section class="two_column_text_list_block section_item">
        <div class="container">
            <div class="text_list_content">

                <div class="text_list_content_text">
                    <h2 class="text_l section_title ff_secondary"><?= $item['title']; ?></h2>
                    <div class="text_m"><?= $item['text_block']; ?></div>
                </div>

                <? if($item['right_column_content_type'] == 1) { ?>
                    <div class="text_list_content_list text_list_content_list--mono">
                        <div class="text_list_content_list_title text text_ml"><?= $item['right_list']['subtitle']; ?></div>
                        <ul>
                            <? foreach ($item['right_list']['list_item'] as $key => $point) { ?>
                                <li class="text_list_content_list_item text_m">
                                    <p><?= $point['text']; ?></p>
                                </li>
                            <? } ?>
                        </ul>
                    </div>
                <? } else { ?>
                    <div class="text_list_content_list text_m">
                        <?= $item['right_text_content']['content']; ?>
                    </div>
                <? } ?>
        </div>
        </div>
    </section>

  <? } if($item['acf_fc_layout'] == 'text_box_about') { ?>

    <section class="about" id="<?= $item['acf_fc_layout'] . '_' . $key; ?>">
        <div class="container">
            <div class="text_block">
                <div class="title_box">
                    <h2 class="text_xl section_title ff_secondary " data-wow-duration="1000ms" data-wow-delay="0ms" data-wow-offset="50">
                      <?= $item['title']; ?>
                    </h2>
                </div>
                <div class="text_box" data-wow-duration="1000ms" data-wow-delay="0ms" data-wow-offset="100">
                    <div class="text text_ml animate_words_off"><?= $item['text_box']; ?></div>
                </div>
                <div class="line_separator"></div>
                <div class="about_cards_list">
                    <? foreach ($item['about_cards_list'] as $key => $card) { ?>
                        <div class="about_card_item wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="<?= $key * 300; ?>ms" data-wow-offset="100">
                            <div class="icon_wrapper">
                                <img src="<?= $card['icon']['url']; ?>" alt="<?= $card['icon']['alt']; ?>">
                            </div>
                            <p class="text_m"><?= $card['decription']; ?></p>
                        </div>
                    <? } ?>
                </div>
            </div>
        </div>
    </section>

  <? } if($item['acf_fc_layout'] == 'technology_cards') { ?>


    <section class="technology" id="<?= $item['acf_fc_layout'] . '_' . $key; ?>">
        <div class="container">
            <h2 class="text_xl section_title ff_secondary">
                <?= $item['title']; ?>
            </h2>

            <div class="line_separator"></div>
            <div class="knight_wrapper">

                <div class="knight_list">

                    <? foreach ($item['cards_list'] as $key => $card) { ?>

                        <div class="knight_point knight_point--item_<?= $key + 1; ?>" data-number="<?= $key + 1; ?>">
                            <p class="text_m"><?= $card['item_text']?></p>
                        </div>

                    <? } ?>
                </div>

                <div class="knight_item">

                    <div id="knight_item_skel" style="width: 106.7em; height: 103.3em;"></div>

                    <script>
                    new spine.SpinePlayer("knight_item_skel", {
                        showControls: false,
                        alpha: true,
                        backgroundColor: "#f5f8ff",
                        fullScreenBackgroundColor: "#f5f8ff",
                        animation: "animation",
                        skeleton: "<?= get_stylesheet_directory_uri(); ?>/animation/knight_6/knight.skel",
                        atlas: "<?= get_stylesheet_directory_uri(); ?>/animation/knight_6/knight.atlas",
                        viewport: {
                            width: 1247,
                            height: 1123,
                            padLeft: 0,
                            padRight: 0,
                            padTop: 0,
                            padBottom: 0
                        }
                    });
                    </script>

                    <div class="line_item line_item_1"></div>
                    <div class="js_number_item inner num_wrapper_1" data-number="1">
                        <span class="number_item">01</span>
                    </div>
                    <div class="line_item line_item_2"></div>
                    <div class="js_number_item inner num_wrapper_2" data-number="2">
                        <span class="number_item">02</span>
                    </div>
                    <div class="line_item line_item_3"></div>
                    <div class="js_number_item inner num_wrapper_3" data-number="3">
                        <span class="number_item">03</span>
                    </div>
                    <div class="line_item line_item_4"></div>
                    <div class="js_number_item inner num_wrapper_4" data-number="4">
                        <span class="number_item">04</span>
                    </div>
                    <div class="line_item line_item_5"></div>
                    <div class="js_number_item inner num_wrapper_5" data-number="5">
                        <span class="number_item">05</span>
                    </div>
                </div>


            </div>
        </div>
    </section>


  <? } if($item['acf_fc_layout'] == 'benefits') { ?>

    <section class="benefits" id="<?= $item['acf_fc_layout'] . '_' . $key; ?>">
        <div class="container">
            <h2 class="text_xl section_title  ff_secondary " data-wow-duration="1000ms" data-wow-delay="0ms" data-wow-offset="0">
                <?= $item['title']; ?>
            </h2>
            <div class="text_box" data-wow-duration="1000ms" data-wow-delay="0ms" data-wow-offset="0">
                <p class="text_ml animate_words_off"><?= $item['text']; ?></p>
            </div>
            <div class="benefit_list">
                <? foreach ($item['benefit_cards'] as $key => $card) { ?>

                    <div class="benefit_card_item wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="<?= $key * 300; ?>ms" data-wow-offset="50">
                        <div class="label"><p class="text_m"><?= $card['label']; ?></p></div>
                        <p class="text_m"><?= $card['benefit_text']?></p>
                        <div class="number normal"><? get_format_number($key); ?></div>
                    </div>

                <? } ?>
            </div>

            <div class="line_separator wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0ms" data-wow-offset="0"></div>
        </div>
    </section>


  <? } if($item['acf_fc_layout'] == 'about_list') { ?>

    <section class="about_list" id="<?= $item['acf_fc_layout'] . '_' . $key; ?>">
        <div class="container">
            <div class="inner">
                <div class="bgr"></div>
            <h2 class="text_xl section_title  ff_secondary " data-wow-duration="1000ms" data-wow-delay="0ms" data-wow-offset="50">
                <?= $item['title']; ?>
            </h2>
            <div class="line_separator"></div>

            <div class="list">
                <? foreach ($item['list'] as $key => $card) { ?>

                    <div class="item wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="<?= $key * 300; ?>ms" data-wow-offset="0">
                        <p class="text_ml ff_secondary semibold"><?= $card['list_title']; ?></p>
                        <div class="text_m"><?= $card['list_text']; ?></div>
                    </div>

                <? } ?>
            </div>

            </div>

        </div>
    </section>

  <? } if($item['acf_fc_layout'] == 'sphere') { ?>

    <section class="sphere_block" id="<?= $item['acf_fc_layout'] . '_' . $key; ?>">
        <div class="container">
            <div class="sphere_inner">

                <h2 class="text_xl section_title  ff_secondary " data-wow-duration="1000ms" data-wow-delay="0ms" data-wow-offset="50">
                    <?= $item['title']; ?>
                </h2>

                <? foreach ($item['sphere_tag_list'] as $key => $tag) {
                    if($tag['link'] != '') { ?>
                        <div class="tag wow fadeInLeft active tag_item_<?= $key + 1; ?>" data-wow-duration="1000ms" data-wow-delay="0ms" data-wow-offset="50">
                            <a href="<?= $tag['link']; ?>" class="text_ml"><?= $tag['text']; ?></a>
                        </div>
                    <? } else { ?>

                        <div class="tag wow fadeInLeft tag_item_<?= $key + 1; ?>" data-wow-duration="1000ms" data-wow-delay="0ms" data-wow-offset="50">
                            <span class="text_ml"><?= $tag['text']; ?></span>
                        </div>

                    <? }
                } ?>

                <div id="sphere_item" style="width: 74.5em; height: 74.5em; background-color: #F5F8FF;"></div>

                <script>
                new spine.SpinePlayer("sphere_item", {
                    showControls: false,
                    alpha: true,
                    backgroundColor: "#F5F8FF",
                    fullScreenBackgroundColor: "#F5F8FF",
                    animation: "animation",
                    skeleton: "<?= get_stylesheet_directory_uri(); ?>/animation/sphere/skeleton.skel",
                    atlas: "<?= get_stylesheet_directory_uri(); ?>/animation/sphere/skeleton.atlas",
                    viewport: {
                        width: 745,
                        height: 745,
                        padLeft: 0,
                        padRight: 0,
                        padTop: 0,
                        padBottom: 0
                    }
                });
                </script>



            </div>
        </div>
    </section>


  <? } if($item['acf_fc_layout'] == 'feedback') { ?>

    <section class="feedback" id="contact_us">
        <div class="container">
            <div class="feedback_inner">

                <h2 class="text_xl section_title ff_secondary  " data-wow-duration="1000ms" data-wow-delay="300ms" data-wow-offset="50">
                    <?= $item['title']; ?>
                </h2>
                <div class="line_separator left"></div>
                <div class="contact_block wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms" data-wow-offset="50">
                    <p class="contact_title normal ff_secondary"><?= $item['mail_subtitle']; ?></p>
                    <a href="mailto:<?= get_field('e-mail', 'option'); ?>" class="mail"><?= get_field('e-mail', 'option'); ?></a>
                    <a href="<?= get_field('community', 'option')['btn_link']; ?>" class="btn btn--left btn--icon_discord">
                        <span class="bold text_m"><?= get_field('community', 'option')['btn_text']; ?></span>
                    </a>
                </div>
                <div class="form_item wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms" data-wow-offset="50">
                    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
                    <script>
                    hbspt.forms.create({
                        region: "<?= $item['form_hubspot']['region']; ?>",
                        portalId: "<?= $item['form_hubspot']['portalid']; ?>",
                        formId: "<?= $item['form_hubspot']['formid']; ?>"
                    });
                    </script>
                </div>
            </div>
        </div>
    </section>

  <? } if($item['acf_fc_layout'] == 'result_block') { ?>

    <section class="result_block section_item" id="result_block">
        <div class="container">

            <h2 class="text_l result_title section_title ff_secondary"> <?= $item['title'] ?> </h2>
            <div class="line_separator"></div>

            <div class="result_block_content">
                <div class="result_block_list">
                    <?php foreach ($item['result_list'] as $key => $content) { ?>
                        <div class="result_block_item">
                            <div class="text_m">
                                <?= $content['text'] ?>
                            </div>
                        </div>
                    <?}?>
                </div>
                <div class="result_block_img">
                    <img src="<?= $item['result_image']['url'] ?>" alt="<?= $item['result_image']['alt'] ?>">
                </div>
            </div>
        </div>
    </section>

  <? } if($item['acf_fc_layout'] == 'reference_block') { ?>

    <section class="reference_block section_item" id="reference_block">
        <div class="container">
            <div class="reference_inner">
                <p class="reference_subtitle text_m bold"><?= $item['subtitle'] ?></p>
                <div class="reference_list text_m">
                    <?php foreach ($item['reference_list'] as $key => $reference) { ?>
                        <a href="<?= $reference['link']; ?>" target="_blank" rel="noopener">
                            [<?= $key + 1; ?>] <span style="color: #9588e8;"><?= $reference['text']; ?></span>
                        </a>
                    <?}?>
                </div>
            </div>
        </div>
    </section>

  <? } if($item['acf_fc_layout'] == 'block_btn_link') { ?>

    <section class="block_btn_link section_item" id="block_btn_link">
        <div class="container">
            <div class="about_list button_block_demo">
                <div class="inner">
                    <div class="bg_pos">
                        <div class="bgr1"></div>
                    </div>
                    <div class="bg_pos">
                        <div class="bgr2"></div>
                    </div>
                    <div class="button_block_demo_content">
                        <div class="button_block_demo_content_text">
                            <div class="text_l ff_secondary button_block_demo_content_title">
                                <?= $item['title']; ?>
                            </div>
                            <div class="text_ml button_block_demo_content_subtitle">
                                <?= $item['subtitle']; ?>
                            </div>
                        </div>
                        <div>
                        <a href="<?= $item['button']['link']; ?>" class="btn btn--right btn--white">
                            <span class="text_m normal"><?= $item['button']['text']; ?></span>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

  <? } if($item['acf_fc_layout'] == 'text_content') { ?>

    <section class="legal" id="<?= $item['acf_fc_layout'] . '_' . $key; ?>">
        <div class="container">
            <?
            $all_pages = ( new WP_Query() )->query( [
                'post_type' => 'page',
                'posts_per_page' => -1
            ] );

            if ( wp_get_post_parent_id() )	{
                $ancestors = get_post_ancestors( get_the_ID() );
                $parent_id = end( $ancestors );
                $menu = true;
                $about_childrens = get_page_children( $parent_id, $all_pages );
            } else {
                $parent_id = get_the_ID();
                $menu = false;
            }
            ?>
            <? if($menu) { if(count($about_childrens) > 1) { ?>
                <div class="legal_links" style=" text-align: center;">
                    <? foreach ($about_childrens as $key => $menu_item) {
                        if($menu_item->post_status == 'publish') { ?>
                            <a href="<?= get_permalink($menu_item->ID); ?>" class="<? if($menu_item->ID == get_the_ID()) { echo 'active'; }?>">
                                <span class="nowrap"><?= $menu_item->post_title; ?></span>
                            </a>
                        <? }
                    } ?>
                </div>
            <? } } ?>

            <?= $item['content_item']; ?>
        </div>
    </section>
  <? } if($item['acf_fc_layout'] == 'block_shield') {?>
    <section class="container section_item">
            <div class="block_shield">
                <div class="block_shield_title">
                    <h2 class="text_l section_title  ff_secondary"> <?= $item['title'] ?> </h2>
                </div>
                <div class="block_shield_content">
                <?php foreach ($item['list'] as $li) {?>
                    <div class="block_shield_content_item">
                        <? if ($item['combine_last_two_steps']['check'])  {?>
                            <div class="block_shield_content_item_figure">
                                <div class="block_shield_content_item_figure_text">
                                    <?= $item['combine_last_two_steps']['text'] ?>
                                </div>
                            </div>
                        <? } ?>
                        <div class="block_shield_content_item_img">
                            <div>
                                <img src="<?= $li['img']['url'] ?>" alt="">
                            </div>
                        </div>
                        <div class="block_shield_content_item_text text_m">
                            <?= $li['text'] ?>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </section>
  <? } if($item['acf_fc_layout'] == 'column_text_and_two_img') {?>
        <section class="container section_item column_text_and_two_img">
            <h2 class="text_l section_title  ff_secondary"> <?= $item['title'] ?> </h2>
            <?php foreach ($item['block'] as $detail) {?>
            <div class="column_text_and_two_img_content">
                <div class="column_text_and_two_img_content_text text_m">
                    <?= $detail['text'] ?>
                </div>
                <div class="column_text_and_two_img_content_wrapper">
                  <?php foreach ($detail['list'] as $local) {?>
                    <div class="column_text_and_two_img_content_wrapper_item">
                      <img class="column_text_and_two_img_content_wrapper_item_img " src="<?= $local['img']['url'] ?>" alt="">
                      <div class="column_text_and_two_img_content_wrapper_item_text text_s">
                        <?= $local['text'] ?>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
            <?php } ?>
        </section>
  <? } if($item['acf_fc_layout'] == 'template_grid_img') {?>
        <section class="container template_grid_img_content section_item">
            <div class="industry_section template_grid_img_content_list">
                <div class="template_grid_img_content_list_carusel">
                  <div class="industry_carusel">
                    <?php foreach ($item['list'] as $list_c) {?>
                      <div class="template_grid_img_content_list_carusel_item">
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
                <div class="template_grid_img_content_list_grid">
                  <?php foreach ($item['list'] as $list) {?>
                    <div class="template_grid_img_content_list_grid_item">
                      <img src="<?= $list['img']['url'] ?>" alt="">
                    </div>
                  <?}?>
                </div>
            </div>
        </section>
  <? } if($item['acf_fc_layout'] == 'template_table') {?>
        <section class="container section_item">
            <div class="template_table">
                  <div class="template_table_text">
                      <?= $item['text']?>
                  </div>
                  <div class="template_table_pm template_table_table">
                    <table>
                        <tr>
                        <?php foreach ($item['table']['thead']['title'] as $title) {?>
                            <th><span><?= $title['text']?></span></th>
                        <?}?>
                        </tr>
                        <?php foreach ($item['table']['row']['row'] as $row) {?>
                          <tr>
                            <?php foreach ($row['elem'] as $text) {?>
                                <td><span><?= $text['text']?></span></td>
                            <?}?>
                          </tr>
                        <?}?>
                      </table>
                  </div>
                  <div class="template_table_additional_information template_table_pm">
                    <div class="template_table_additional_information_left">
                      <?= $item['additional_information']['left_block'] ?>
                    </div>
                    <div class=" template_table_additional_informationt_righ">
                      <div class="template_table_additional_informationt_purple">
                        <?= $item['additional_information']['right_block'] ?>
                      </div>
                    </div>
                  </div>
            </div>
        </section>
  <? } if($item['acf_fc_layout'] == 'img_description') {?>
        <section class="container section_item">
            <div class="img_description">
                <?php foreach ($item['list'] as $li) {?>
                    <div class="img_description_item">
                    <div class="img_description_item_img">
                        <img src="<?= $li['img']['url']?>" alt="">
                    </div>
                    <div class="img_description_item_text"><?= $li['text']?></div>
                    </div>
                <?}?>
            </div>
        </section>
  <? } ?>
  <? }
  } ?>

