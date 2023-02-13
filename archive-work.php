<?php

/**
 * The template for displaying Archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package factory
 */

get_header();
?>
<section class="sec-mv work-mv js-mv">
  <div class="inner">
    <h1 class="mv-ttl">
      <span>WORKS</span>
      caritatem
    </h1>
  </div>
  <!-- ./ mainvisual-inner -->
</section>
<div class="content w-980 js-page">
  <div class="page-work">
    <div class="inner">
      <ul class="work-list" id="tab-content">
        <?php query_posts('post_type=work&order=ASC&paged=' . $paged); ?>
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <li class="work-detail">
              <a href="<?php the_permalink(); ?>" class="work-detail-list">
                <div class="upper-blk">
                  <div class="img-list">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="img01" loading="lazy">
                  </div>
                </div>
                <div class="right-blk">
                  <h4 class="work-ttl"><?php the_title(); ?></h4>
                  <p class="work-txt"><?php the_field('worktext'); ?></p>
                  <?php if (have_rows('typelist')) : ?>
                    <ul class="txt-list">
                      <?php while (have_rows('typelist')) : the_row(); ?>
                        <li class="list-detail"><span class="left-blk"><?php the_sub_field('type'); ?></span><span class="right-blk"><?php the_sub_field('detail'); ?></span></li>
                      <?php endwhile; ?>
                    </ul>
                  <?php endif; ?>
                </div>
              </a>
              <p class="tags tags-list">
                <?php
                $posttags = get_the_tags();
                if ($posttags) {
                  foreach ($posttags as $tag) { ?>
                    <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="tag-detail"><?php echo $tag->name . ' '; ?> </a>
                <?php }
                } ?>
              </p>
            </li>
          <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
      </ul>
      <?php the_posts_pagination() ?>
    </div>
  </div>
</div>
<?php
get_footer();
