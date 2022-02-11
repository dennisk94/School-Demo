<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="front-page-wrapper">
		<?php
		while (have_posts()) :
			the_post();

			if (function_exists('get_field')) {
				if (get_field('title')) {
		?>
					<h1><?php the_field('title'); ?></h1>
			<?php

				}
			}

			if (function_exists('get_field')) {
				if (get_field('intro_text')) {
					the_field('intro_text');
				}
			}

			?>
			<div class="intro-image-wrapper">
				<?php
				$image = get_field('intro_image');

				if (function_exists('get_field')) {
					if (get_field('intro_image')) {
						echo wp_get_attachment_image($image, 'full-size');
					}
				}
				?>
			</div>
			<section class="columns-wrapper">
				<article class="column-item">
					<?php
					if (function_exists('get_field')) {
						if (get_field('left_section_heading')) {
					?>
							<h2><?php the_field('left_section_heading'); ?></h2>
					<?php

						}
					}

					if (function_exists('get_field')) {
						if (get_field('left_section_text')) {
							the_field('left_section_text');
						}
					}
					?>
				</article>
				<article class="column-item">
					<?php

					if (function_exists('get_field')) {
						if (get_field('right_section_heading')) {
					?>
							<h2><?php the_field('right_section_heading'); ?></h2>
					<?php

						}
					}

					if (function_exists('get_field')) {
						if (get_field('right_section_text')) {
							the_field('right_section_text');
						}
					}
					?>
				</article>
			</section>
			<section class="second-image-text-wrapper">
				<?php

				$image = get_field('body_image');

				if (function_exists('get_field')) {
					if (get_field('body_image')) {
						echo wp_get_attachment_image($image, 'full-size');
					}
				}

				if (function_exists('get_field')) {
					if (get_field('body_text')) {
						the_field('body_text');
					}
				}


				?>
			</section>
			<section class="latest-posts">
				<h2>Recent News</h2>
				<div class="articles-wrapper">
					<?php
					$args = array(
						'post-type'		  => 'post',
						'posts_per_page'  => 3,
					);

					$blog_query = new WP_Query($args);
					if ($blog_query->have_posts()) {
						while ($blog_query->have_posts()) {
							$blog_query->the_post();

					?>
							<article>
								<a href="<?php the_permalink(); ?>">
									<p><?php the_title(); ?></p>

									<?php the_post_thumbnail('medium'); ?>
								</a>
							</article>
					<?php
						}
						wp_reset_postdata();
					}

					?>
				</div>
			</section>

		<?php

		endwhile; // End of the loop.
		?>
	</div>
</main><!-- #main -->

<?php
get_footer();
