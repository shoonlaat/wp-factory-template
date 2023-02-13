<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package factory
 */

get_header();
?>

<section id="primary" class="content-area js-mv">
	<main id="main" class="site-main">
		<div class="inner">

			<?php if (have_posts()) : ?>

				<header class="page-header">
					<!-- <h1 class="page-title"><?php printf(__('Search Results for: %s', 'factory'), '<span>' . get_search_query() . '</span>'); ?></h1> -->
				</header><!-- .page-header -->
				<div class="search-detail">
				<?php
				/* Start the Loop */
				while (have_posts()) :
					the_post(); ?>
						<a href="<?php the_permalink(); ?>" class="search-list">
							<h3 class="search-title"><?php the_title(); ?></h3>
							<div class="search-image"><?php the_post_thumbnail() ?></div>
						</a>

			<?php
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part('template-parts/content', 'search');


				endwhile; ?>
				</div>
      <?php 
				the_posts_pagination();

			else :

				get_template_part('template-parts/content', 'none');
				global $wp_query;
				$wp_query->set_404();
				status_header(404);
				get_template_part(404);
				exit();

			endif;
			?>
		</div>
	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
