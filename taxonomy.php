<?php

/**
 * The template for displaying Taxonomy
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
			<?php $terms = get_terms('taxonomycolumn'); ?>
			<ul class="tabs-nav js-nav" id="tab-nav">
				<li>
					<a href="<?php echo site_url(); ?>/column" class="tab">ALL</a>
				</li>
				<?php foreach ($terms as $term) { ?>
					<li>
						<a href="<?php echo get_term_link($term->slug, 'taxonomycolumn'); ?>" class="tab">
							<?php echo $term->slug; ?>
						</a>
					</li>
				<?php }  ?>
			</ul>
			<ul class="category" id="tab-content">
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); 
					if (has_category(null, $post->ID)) :
					?>
						<li class="category-list">
							<a href="<?php the_permalink(); ?>">
								<img src="<?php the_post_thumbnail_url(); ?>" width="382" height="254" alt="img01" loading="lazy">
							</a>
							<h4 class="category-list-ttl"><?php the_title(); ?></h4>
							<div class="archive-txt"><?php the_content(); ?></div>
							<div class="category-btn-blk">
								<div class="category-btn">
								<p class="category-button">
                  <?php echo the_category(' '); ?>
						  	</p>
									<?php $terms = get_the_terms($post->ID, 'taxonomycolumn');
									if (!empty($terms)) {
										foreach ($terms as $term) {
									?>
											<p class="categorybutton">
												<a href="<?php echo get_term_link($term->slug, 'taxonomycolumn') ?>">
													<?php echo  $term->slug; ?>
												</a>
										<?php }
									} ?>
											</p>
								</div>
							</div>
						</li>
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</ul>
			<?php the_posts_pagination( )?>
		</div>
	</div>
</div>
<!-- ./content -->

<?php
get_footer();
