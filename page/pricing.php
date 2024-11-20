<?php
/*
Template Name: Pricing Template
*/
get_header();
$page_content = get_field('pricing_content');
$block_item = [
  [ 'title' => 'Which business model are you most familiar with?', 'type' => 1 ],
  [ 'title' => 'At what price would you find the product too expensive to even consider purchasing? (Too expensive)', 'type' => 0 ],
  [ 'title' => 'At what price would you consider the product so cheap that you would doubt its quality? (Too cheap)', 'type' => 0 ],
  [ 'title' => 'At what price would you still consider the product expensive but would start thinking about purchasing it? (Expensive)', 'type' => 0 ],
  [ 'title' => 'At what price would you consider the product a good deal? (Fair)', 'type' => 0 ]
]
?>

<main class="container pricing">
    <?php get_template_part('templates/breadcrumbs'); ?>

    <div class="page_title_block page_title_block--pricing">
        <h1 class="text_page_title text section_title color_title ff_secondary "><?= $page_content['title'] ?></h1>
        <p class="pricing_description">
          <?= $page_content['description'] ?>
        </p>
        <div class="line_separator AboutUs_separator"></div>
    </div>

    <div class="pricing_content">
        <div class="pricing_content_img">
                <img src=" <?= $page_content['img']['url'] ?>" alt="img">
              </div>
          <div class="form_item" data-form-type="pricing">
            <!-- Pricing form ENG -->
            <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
            <script>
              hbspt.forms.create({
                region: "na1",
                portalId: "45612542",
                formId: "b22c5191-afcc-448a-9ab3-163f0eececac"
              });
            </script>

          </div>



          

    </div>

    <!-- <form action="">
      <div class="pricing_content">

        <div class="pricing_content_block">
          <?php foreach ($block_item as $key => $item) {?>
            <div class="pricing_content_block_item">
              <div class="pricing_content_block_item_title"><?= $item['title'] ?></div>
              <div class="pricing_content_block_item_input">
                <label for="pricing_input<?=$key?>">
                  <?php if ($item['type'] === 0) {?>
                    <span>$</span>
                  <?php }?>
                  <input placeholder="<?= $item['type'] === 0 ? '0.00' : 'text' ?>" id="pricing_input<?=$key?>" type="<?= $item['type'] === 0 ? 'number' : 'text' ?>">
                </label>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="pricing_send">
        <input type="submit" value="send">
      </div>
    </form> -->
</main>

<?php get_footer(); ?>
