<?php
/*
Template Name: Demo
*/
get_header();
$demo_features =  get_field('demo_features');
$steps =  get_field('steps_testing');
$demo_form =  get_field('demo_form');
?>
<main class="container demo_common">
    <?php get_template_part('templates/breadcrumbs'); ?>
	<div class="page_title_block">
		<h1 class="federated_learning_title text_page_title text section_title color_title ff_secondary">
			<?= get_the_title(); ?>
		</h1>
		<div class="line_separator"></div>
	</div>	

	<section class="demo_features">
		<div class="demo_features_inner">
			<div class="scheme_block">
				<div class="img_wrapper">
					<img src="<?= $demo_features['scheme_image']['url']; ?>" alt="<?= $demo_features['scheme_image']['alt']; ?>">
				</div>
				<? foreach ($demo_features['scheme_text'] as $key => $value) { ?>
					<p class="text_item text_item_<?= $key + 1; ?> <? if($key == 0) { echo 'active'; }?>"><?= $value['text_item']; ?></p>
					<div class="js-scheme-number inner inner_<?= $key + 1; ?> <? if($key == 0) { echo 'active'; }?> <? if($key == 1) { echo 'pulse'; }?>" data-number="<?= $key + 1; ?>">
						<div class="number_item"><? get_number($key); ?></div>
					</div>
					<div class="line line_<?= $key + 1; ?> <? if($key == 0) { echo 'active'; }?>"></div>
				<? } ?>
			</div>
			<div class="text_block common_text">
				<?= $demo_features['text_block']; ?>
			</div>
		</div>
	</section>

	<section class="steps_block">
		<div class="title_wrapper">
			<h2 class="text_l section_title ff_secondary"><?= $steps['title']; ?></h2>
			</div>
			<? foreach ($steps['step_item'] as $key => $step) { ?>
				<div class="step_item wow fadeInLeft" style="z-index: <?= 20 - $key; ?>;" data-wow-duration="1000ms" data-wow-delay="<?= $key * 100; ?>ms" data-wow-offset="50">
					<div class="step_inner">
						<div class="icon_wrapper">
							<img src="<?= $step['image']['url']; ?>" alt="<?= $step['image']['alt']; ?>">
						</div>
						<p class="text_m"><?= $step['text']; ?></p>
						<div class="number"><? get_number($key); ?></div>
					</div>
				</div>				
			<? } ?>
	</section>

	<section class="demo_form">
			<div class="text_block">
				<h2 class="text_l section_title ff_secondary"><?= $demo_form['title']; ?></h2>
				<div class="text_m"><?= $demo_form['description']; ?></div>
			</div>
			<div class="form_wrapper">
				<div class="form_item" data-form-type="get_demo">
                    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
                    <script>
                    hbspt.forms.create({
                        region: "<?= $demo_form['form_hubspot']['region']; ?>",
                        portalId: "<?= $demo_form['form_hubspot']['portalid']; ?>",
                        formId: "<?= $demo_form['form_hubspot']['formid']; ?>"
                    });
                    </script>
                </div>
			</div>
	</section>
</main>

<?php  get_footer()?>