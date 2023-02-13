<?php

/**
 * The template for displaying Category
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package factory
 */

get_header();
?>

<section class="sec-mv column-mv js-mv">
  <div class="inner">
    <h1 class="mv-ttl">
      <span>EVENT & COLUMN</span>
      aperiam
    </h1>
  </div>
  <!-- ./ mainvisual-inner -->
</section>
<!-- =============== content ============== -->
<div class="content w-980 js-page">
  <div class="page-column">
    <div class="tabs">
      <ul class="tabs-nav js-nav" id="tab-nav">
        <li>
          <a href="<?php echo site_url(); ?>/column/" class="tab">ALL</a>
        </li>
        <?php $categories = get_categories(array("hide_empty" => 0));
        foreach ($categories as $category) {
          if ($category->name != "Uncategorized") {
            echo '<li><a href="' . get_category_link($category->term_id) . '" class="tab">' . $category->name . '</a></li>';
          }
        }
        ?>
      </ul>

      <ul class="category" id="tab-content">
        <?php
        global $query_string;
        $posts = query_posts($query_string . '&post_type=column');
        if (have_posts()) while (have_posts()) : the_post();
        ?>
          <li class="category-list">
            <a href="<?php the_permalink(); ?>">
              <img src="<?php the_post_thumbnail_url(); ?>" width="382" height="254" alt="img01" loading="lazy">
            </a>
            <h4 class="category-list-ttl"><?php the_title(); ?></h4>
            <div class="archive-txt"><?php the_content(); ?></div>
            <div class="category-btn-blk">
              <p class="tags">
                <?php
                $posttags = get_the_tags();
                if ($posttags) {
                  foreach ($posttags as $tag) {
                    echo $tag->name . ' ';
                  }
                }
                ?>
              <div class="category-btn">
                <p class="category-button">
                  <?php the_category(' '); ?>
                </p>
                <?php $terms = get_the_terms($post->ID, 'taxonomycolumn');
                if (!empty($terms)) {
                  foreach ($terms as $term) {
                    $term->slug;
                ?>
                    <p class="categorybutton">
                      <a href="<?php echo get_term_link($term->slug, 'taxonomycolumn') ?>">
                        <?php echo  $term->slug; ?>
                      </a>
                    </p>
                <?php }
                } ?>
              </div>
            </div>
          </li>
        <?php endwhile; ?>
      </ul>
      <?php the_posts_pagination() ?>
    </div>
  </div>
</div>
<!-- ./content -->

<?php
get_footer();
