<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package factory
 */

get_header();
?>
<section class="sec-mv not-mv js-mv">
  <div class="inner">
    <h1 class="mv-ttl">
      <span>404 NOT FOUND</span>
      Not Found
    </h1>
  </div>
  <!-- ./ mainvisual-inner -->
</section>
<div class="content-area w-980">
  <div class="not-found">
    <div class="inner">
      <p class="error-msg">We're sorry, but we couldn't find the page you were looking for.<br>
        The page you are looking for may have been deleted or the URL may have changed.</p>
      <div class="btn-gp">
        <a href="<?php echo get_bloginfo('url'); ?>" class="page">TOP Page</a>
      </div>
    </div>
  </div>
  <!-- ./ not-found -->
</div>
<!-- ./ content-area -->

<?php
get_footer();
