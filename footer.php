	<footer class="footer">
		<div class="container">
			<div class="scroll_btn" id="back_link">
				<div class="inner">
					<p class="text_ml">back</p>
					<span class="arrow"></span>
				</div>
			</div>
			<script>
				document.getElementById('back_link').addEventListener('click', function() {
					window.scrollTo({
						top: 0,
						behavior: 'smooth'
					});
				});
			</script>
			<div class="footer_inner">
				<div class="contacts">
					<p class="contact_title">See how we can help you, get in touch today.</p>
					<div class="button_block">
						<a href="mailto:<?= get_field('e-mail', 'option'); ?>" class="btn btn--right btn--white">
							<span class="text_m normal">email us</span>
						</a>
						<a target="_blank" href="<?= get_field('community', 'option')['btn_link']; ?>" class="btn btn--left btn--white btn--icon_discord">
							<span class="text_m normal"><?= get_field('community', 'option')['btn_text']; ?></span>
						</a>
					</div>
				</div>

				<div class="menu_wrapper">
					<?php
					wp_nav_menu([
					'theme_location'  => '',
					'menu'            => 'Меню в подвале',
					'container'       => 'ul',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 'menu',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 0,
					'walker'          => '',
					]);
					?>
				</div>


			</div>
			<div class="footer_bottom">
				<div class="name_text">guardora</div>

				<div class="links_block">
					<a href="<?= get_field('footer_link', 'option')['footer_link']; ?>" class="text_s legal_link"><?= get_field('footer_link', 'option')['footer_text']; ?></a>

					<a href="<?= get_field('footer_link_2', 'option')['footer_link']; ?>" class="text_s legal_link" target="_blank"><?= get_field('footer_link_2', 'option')['footer_text']; ?></a>

					<p class="text_s"><?= get_field('copyright', 'option'); ?></p>
				</div>
			</div>
		</div>
	</footer>


	<!-- <?= do_shortcode('[cookie_declaration]'); ?> -->
  <!-- Yandex.Metrika counter -->
  <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date(); for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }} k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(97078438, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/97078438" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
  <!-- /Yandex.Metrika counter -->
  <?php wp_footer(); ?>

  <?= get_field('footer_metriks', 'option'); ?>

</body>
</html>
