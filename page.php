<?php
/*
The main template file
Template Post Type: post, page, portfolio
*/
get_header();
?>

<main class="main">

	<?
	$page_content = get_field('page_content');
	get_template_part('templates/page_content', get_post_type(), $page_content);
	?>
	
</main>

<?php
get_footer();
?>
