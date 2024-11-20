<?php
/*
Template Post Type: post, page, portfolio
*/
get_header();
?>

<main class="blogPage">
  <div class="blog_bg_round"></div>
  <section class="block_item">
    <div class="container">
      <div class="blog_header">

        <?php get_template_part('templates/breadcrumbs'); ?>

        <div class="page_title_block page_title_block--blog">
          <h1 class="text_page_title text section_title color_title ff_secondary  ">Blog</h1>
          <div class="line_separator AboutUs_separator  "></div>
        </div>

      </div>

      <div class="blog_list">
        <?php
        $current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;
        $posts_per_page = get_option('posts_per_page') ? get_option('posts_per_page') : 10;

        $args = array(
          'post_type'      => 'blog_articles',
          'posts_per_page' => $posts_per_page,
          'order'          => 'DESC',
          'paged'          => $current_page
        );
        $query = new WP_Query($args); ?>

        <?php if ($query->have_posts()) : ?>
          <?php while ($query->have_posts()) : $query->the_post(); ?>
            <?php get_template_part('templates/article_card', get_post_type(), get_field('blog_article_content')); ?>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <p><?php _e('No posts found'); ?></p>
        <?php endif; ?>
      </div>

      <div class="blog_next">
        <?php
        $pagination_args = array(
          'base' => home_url($wp->request) . '/%_%',
          'format' => '?page=%#%',
          'total'   => $query->max_num_pages,
          'current' => $current_page,
          'prev_next' => true,
          'prev_text' => __('<div class="paginate_center paginate_center-left">
                                <span style="transform: rotate(180deg)">
                                   <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M12.172 7.00017L6.808 1.63617L8.222 0.222168L16 8.00017L8.222 15.7782L6.808 14.3642L12.172 9.00017H0V7.00017H12.172Z" fill="black"/>
                                  </svg>
                                </span>
                                <p>PREV</p>
                              </div>'
          ),
          'next_text' => __('<div class="paginate_center paginate_center-right">
                              <p>NEXT</p>
                              <span>
                                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M12.172 7.00017L6.808 1.63617L8.222 0.222168L16 8.00017L8.222 15.7782L6.808 14.3642L12.172 9.00017H0V7.00017H12.172Z" fill="black"/>
                                  </svg>
                              </span>
                            </div>'
          ),
        );

        echo paginate_links($pagination_args);
        ?>
      </div>

      <div class="blog_subcribe_form">
        <!-- <div class="blog_subcribe_form_bgi"></div> -->
        <div class="bg_pos">
                <div class="bgr1"></div>
              </div>
              <div class="bg_pos">
                <div class="bgr2"></div>
              </div>
        <div class="blog_subcribe_form_wrapper">
          <div class="blog_subcribe_form_title">
            <span>Subscribe</span> to <br> our Newsletter
          </div>
          <div class="form_item" data-form-type="subscribe">

            <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
            <script>
              hbspt.forms.create({
                region: "na1",
                portalId: "45612542",
                formId: "c553407c-d414-48d1-80c3-9855b9fa33bf"
              });
            </script>

          </div>
        </div>
      </div>
    </div>
  </section>
</main>


<?php
get_footer();
?>
