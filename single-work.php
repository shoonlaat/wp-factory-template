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
<section class="sec-mv work-mv js-mv">
	<div class="inner">
		<h1 class="mv-ttl">
			<span>WORKS</span>
			caritatem
		</h1>
	</div>
	<!-- ./ mainvisual-inner -->
</section>

<div class="content">
	<div class="page-work">
		<div class="inner">
			<?php if ($wp_query->have_posts()) : ?>
				<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
					<div class="work-detail-blk">
						<div class="img-blk">
							<img src="<?php the_post_thumbnail_url(); ?>" width="900" height="600" loading="lazy">
						</div>
						<h4 class="work-ttl"><?php the_title(); ?></h4>
						<p class="work-txt"><?php the_field('worktext'); ?></p>
						<ul class="txt-list">
							<?php
							while (have_rows('typelist')) : the_row(); ?>
								<li class="list-detail"><span class="left-blk"><?php the_sub_field('type'); ?></span><span class="right-blk"><?php the_sub_field('detail'); ?></span></li>
							<?php endwhile; ?>
						</ul>
						<?php
						$acf_repeater_field = get_field('worklistgp');
						if (!empty($acf_repeater_field)) :
							while (have_rows('worklistgp')) : the_row(); ?>
								<div class="txt-blk">
									<h4 class="worklist-subttl"><?php the_sub_field('worklisttl'); ?></h4>
									<div class="worklist-txt"><?php the_sub_field('workisttxt'); ?></div>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				<?php
				endwhile;
				?>
				<div class="single-navigation">
					<?php if (get_adjacent_post(false, '', true)) { ?>
						<span class="prev"><?php previous_post_link('%link', 'Previous') ?></span>
					<?php } ?>
          <span class="list"> <a href="<?php echo site_url(); ?>/work/">list</a></span>
					<?php if (get_adjacent_post(false, '', false)) { ?>
						<span class="next"><?php next_post_link('%link','Next') ?></span>
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
<!-- ./ single-page -->


<?php
get_footer();
