<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
<div class="content">
	<div class="page-column">
		<div class="inner">
			<?php if ($wp_query->have_posts()) : ?>
				<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
					<div class="single-column">
						<div class="column-img-blk">
							<img src="<?php the_post_thumbnail_url(); ?>" loading="lazy" width="900" height="597" alt="column-image">
						</div>
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
						<h4 class="category-ttl"><?php the_title(); ?></h4>
						<div class="column-txt"><?php the_content(); ?></div>
					</div>
				<?php
				endwhile;
				?>
				<div class="related-post">
					<h4 class="category-ttl">Related Post</h4>;
					<?php

					//get the taxonomy terms of custom post type
					$customTaxonomyTerms = wp_get_object_terms($post->ID, 'taxonomycolumn', array('fields' => 'ids'));

					//query arguments
					$args = array(
						'post_type' => 'column',
						'posts_per_page' => 3,
						'orderby' => 'rand',
						'tax_query' => array(
							array(
								'taxonomy' => 'taxonomycolumn',
								'field' => 'id',
								'terms' => $customTaxonomyTerms
							)
						),
						'post__not_in' => array($post->ID),
					);

					//the query
					$relatedPosts = new WP_Query($args);

					//loop through query
					if ($relatedPosts->have_posts()) {
						echo '<div class="tabs">';
						echo '<ul class="category related-list">';
						while ($relatedPosts->have_posts()) {
							$relatedPosts->the_post();
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
									</p>
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
					<?php
						}
						echo '</ul>';
						echo '</div>';
					} else {
						echo '<h4 class="category-ttl">Related Has No Post Found</h4>';
					}

					//restore original post data
					wp_reset_postdata();

					?>
				</div>
				<div class="single-navigation">
					<?php if (get_adjacent_post(false, '', true)) { ?>
						<span class="prev"><?php previous_post_link('%link', 'Previous') ?></span>
					<?php } ?>
					<span class="list"> <a href="<?php echo site_url(); ?>/column/">category</a></span>
					<?php if (get_adjacent_post(false, '', false)) { ?>
						<span class="next"><?php next_post_link('%link', 'Next') ?></span>
					<?php } ?>
				</div><!--/single navigation-->
			<?php endif; ?>

			<?php
			$wp_query = null;
			wp_reset_query();
			?>
		</div>
	</div>
</div>
<?php
get_footer();
