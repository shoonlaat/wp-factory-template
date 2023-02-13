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
<div class="content page-content w-980">
  <?php query_posts('posts_per_page=5&post_type=goods&order=DESC&paged=' . $paged); ?>
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <?php endwhile; ?>
  <?php endif; ?>
  <?php wp_reset_query(); ?>
</div>
<?php
get_footer();
