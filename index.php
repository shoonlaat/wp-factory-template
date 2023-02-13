<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package factory
 */

get_header(); ?>

<!-- ===============  main visual ============== -->
<section class="mainvisual js-mv">
  <div class="inner">
    <div class="mv-txt">
      <div class="img-blk"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/img_no1.png" width="150" height="150" loading="lazy"></div>
      <h1 class="mv-title">A creative agency<br class="s-pc">for<br class="s-sp"> <span class="redem">redemptive</span><br class="s-pc">brands</h1>
    </div>
    <div class="btn-gp">
      <a href="#" class="inquiry">Inquiry</a>
      <a href="#" class="phno">Request Doc</a>
    </div>
    <div class="txt-blk">
      <p class="probabo-txt">※ Probabo, inquit, modo<br class="s-sp"> ista sis aequitate quam.</p>
      <p>Filium morte multavit si sine<br class="s-sp"> dubio<br class="s-pc"> praeclara sunt,<br class="s-sp"> explicabo nemo<br class="s-pc">enim ad minima. </p>
    </div>
    <div class="img s-pc">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/img_computer.png" width="561" height="441" loading="lazy">
    </div>
  </div>
  <!-- ./ mainvisual-inner -->
</section>
<!-- ./main visual -->
<section class="sec-circle">
  <div class="inner">
    <h2 class="sec-ttl">Filium morte multavit si sine？</h2>
    <div class="circle-list">
      <?php query_posts(
        'posts_per_page=3&post_type=circle&order=ASC&paged=' . $paged
      ); ?>
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) :
          the_post(); ?>
          <div class="circle-blk">
            <span class="circle-icon"><img src="<?php the_post_thumbnail_url(); ?>" width="115" height="115" loading="lazy" alt="Filium morte multavit si sine"></span>
            <div class="circle-txt"><?php the_content(); ?>
            </div>
          </div>
        <?php
        endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_query(); ?>
    </div>
  </div>

</section>
<section class="sec-work">
  <div class="inner">
    <h2 class="sec-ttl"><span class="sub-menu">WORKS</span>caritatem</h2>
    <ul class="work-list">
      <?php query_posts(
        'posts_per_page=6&post_type=work&order=ASC&paged=' . $paged
      ); ?>
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) :
          the_post(); ?>
          <li class="work-detail">
            <a href="<?php the_permalink(); ?>" class="work-detail-list">
              <div class="upper-blk">
                <div class="img-list">
                  <img src="<?php the_post_thumbnail_url(); ?>" width="180" height="180" alt="img01" loading="lazy">
                </div>
                <h4 class="sub-ttl"><?php the_title(); ?></h4>
                <p class="work-txt"><?php the_field('worktext'); ?></p>
              </div>
              <?php if (have_rows('typelist')) : ?>
                <ul class="txt-list">
                  <?php while (have_rows('typelist')) :
                    the_row(); ?>
                    <li class="list-detail"><span class="left-blk"><?php the_sub_field(
                                                                      'type'
                                                                    ); ?></span><span class="right-blk"><?php the_sub_field(
                                                          'detail'
                                                        ); ?></span></li>
                  <?php
                  endwhile; ?>
                </ul>
              <?php endif; ?>
            </a>
            <p class="tags tags-list">
              <?php
              $posttags = get_the_tags();
              if ($posttags) {
                foreach ($posttags as $tag) { ?>
                  <a href="<?php echo esc_url(
                              get_tag_link($tag->term_id)
                            ); ?>" class="tag-detail"><?php echo $tag->name . ' '; ?> </a>
              <?php }
              }
              ?>
            </p>
          </li>
        <?php
        endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_query(); ?>
    </ul>
    <div class="btn-gp">
      <a href="<?php echo site_url(); ?>/work/" class="inquiry btn">View More</a>
    </div>
  </div>
</section>
<section class="sec-column">
  <div class="inner">
    <div class="left-column">
      <h2 class="sec-ttl"><span class="sub-menu">COLUMN</span>aperiam</h2>
      <div class="view-btn s-pc">
        <a href="<?php echo site_url(); ?>/column/" class="inquiry btn">View More</a>
      </div>
    </div>
    <ul class="right-column">
      <?php query_posts(
        'posts_per_page=3&post_type=column&order=DESC&paged=' . $paged
      ); ?>
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) :
          the_post();
          if (has_category(null, $post->ID)) : ?>
            <li class="column-detail">
              <a href="<?php the_permalink(); ?>" class="column-list-detail">
                <div class="img">
                  <img src="<?php the_post_thumbnail_url(); ?>" width="318" height="211" alt="img01" loading="lazy">
                </div>
              </a>
              <div class="col-txtblk">
                <a href="<?php the_permalink(); ?>" class="col-txt">
                  <h4 class="sub-ttl"><?php the_title(); ?></h4>
                  <div class="column-txt s-pc"><?php the_content(); ?></div>
                </a>
                <div class="column-btn">
                  <p class="category-button">
                    <?php the_category(' '); ?>
                  </p>
                  <?php
                  $terms = get_the_terms($post->ID, 'taxonomycolumn');
                  if (!empty($terms)) {
                    foreach ($terms as $term) { ?>
                      <p class="categorybutton">
                        <a href="<?php echo get_term_link(
                                    $term->slug,
                                    'taxonomycolumn'
                                  ); ?>">
                          <?php echo $term->slug; ?>
                        </a>

                    <?php }
                  }
                    ?>
                      </p>
                </div>
              </div>
            </li>
        <?php endif;
        endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_query(); ?>
    </ul>
    <div class="view-btn s-sp">
      <a href="<?php echo site_url(); ?>/column/" class="inquiry btn">View More</a>
    </div>
  </div>
</section>
<section class="sec-faq">
  <div class="inner">
    <h2 class="sec-ttl"><span class="sub-menu">Q&A</span>rem aperiam</h2>
    <ul class="accor-blk">
      <li class="accor-list">
        <div class="question">
          <span class="qes">Q1</span>
          <span class="accor-txt">Inquit, modo ista sis aequitate, quam ob rem aperiam eaque gaudere ut.</span>
          <span class="addButton"></span>
        </div>
        <div class="content">
          Filium morte multavit si sine dubio praeclara sunt, explicabo nemo enim ad minima.
          Probabo, inquit, modo ista sis aequitate, quam ob rem aperiam eaque gaudere ut.
          Vero eos et caritatem, quae ab eo ortum, tam crudelis fuisse, nihil. Et quidem rerum necessitatibus saepe eveniet.
        </div>
      </li>
      <li class="accor-list">
        <div class="question">
          <span class="qes">Q2</span>
          <span class="accor-txt">Inquit, modo ista sis aequitate, quam ob rem aperiam eaque gaudere ut.</span>
          <span class="addButton"></span>
        </div>
        <div class="content">
          Filium morte multavit si sine dubio praeclara sunt, explicabo nemo enim ad minima.
          Probabo, inquit, modo ista sis aequitate, quam ob rem aperiam eaque gaudere ut.
          Vero eos et caritatem, quae ab eo ortum, tam crudelis fuisse, nihil. Et quidem rerum necessitatibus saepe eveniet.
        </div>
      </li>
      <li class="accor-list">
        <div class="question">
          <span class="qes">Q3</span>
          <span class="accor-txt">Inquit, modo ista sis aequitate, quam ob rem aperiam eaque gaudere ut.</span>
          <span class="addButton"></span>
        </div>
        <div class="content">
          Filium morte multavit si sine dubio praeclara sunt, explicabo nemo enim ad minima.
          Probabo, inquit, modo ista sis aequitate, quam ob rem aperiam eaque gaudere ut.
          Vero eos et caritatem, quae ab eo ortum, tam crudelis fuisse, nihil. Et quidem rerum necessitatibus saepe eveniet.
        </div>
      </li>
      <li class="accor-list">
        <div class="question">
          <span class="qes">Q4</span>
          <span class="accor-txt">Inquit, modo ista sis aequitate, quam ob rem aperiam eaque gaudere ut.</span>
          <span class="addButton"></span>
        </div>
        <div class="content">
          Filium morte multavit si sine dubio praeclara sunt, explicabo nemo enim ad minima.
          Probabo, inquit, modo ista sis aequitate, quam ob rem aperiam eaque gaudere ut.
          Vero eos et caritatem, quae ab eo ortum, tam crudelis fuisse, nihil. Et quidem rerum necessitatibus saepe eveniet.
        </div>
      </li>
      <li class="accor-list">
        <div class="question">
          <span class="qes">Q5</span>
          <span class="accor-txt">Inquit, modo ista sis aequitate, quam ob rem aperiam eaque gaudere ut.</span>
          <span class="addButton"></span>
        </div>
        <div class="content">
          Filium morte multavit si sine dubio praeclara sunt, explicabo nemo enim ad minima.
          Probabo, inquit, modo ista sis aequitate, quam ob rem aperiam eaque gaudere ut.
          Vero eos et caritatem, quae ab eo ortum, tam crudelis fuisse, nihil. Et quidem rerum necessitatibus saepe eveniet.
        </div>
      </li>
      <li class="accor-list">
        <div class="question">
          <span class="qes">Q6</span>
          <span class="accor-txt">Inquit, modo ista sis aequitate, quam ob rem aperiam eaque gaudere ut.</span>
          <span class="addButton"></span>
        </div>
        <div class="content">
          Filium morte multavit si sine dubio praeclara sunt, explicabo nemo enim ad minima.
          Probabo, inquit, modo ista sis aequitate, quam ob rem aperiam eaque gaudere ut.
          Vero eos et caritatem, quae ab eo ortum, tam crudelis fuisse, nihil. Et quidem rerum necessitatibus saepe eveniet.
        </div>
      </li>
    </ul>
  </div>
</section>
<!-- =============== content ============== -->
<div class="content">

</div>
<?php get_footer();
