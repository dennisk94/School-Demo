<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

get_header();
?>

<main id="primary" class="site-main">

	<header class="page-header">
		<?php
		echo "<h1>" . post_type_archive_title('', false) . "</h1>";
		the_archive_description('<div class="archive-description">', '</div>');
		?>
	</header><!-- .page-header -->

	<?php
	/* Start the Loop */
	// Adminstrative Staff
	$args = array(
		'post-type'		 => 'fwd-staff',
		'posts_per_page' => -1,
		'tax_query'		 => array(
			array(
				'taxonomy' => 'fwd-staff-category',
				'field'    => 'slug',
				'terms'    => 'administrative'
			),
		),
	);
	$query = new WP_Query($args);

	if ($query->have_posts()) {
	?>
		<section class="staff-wrapper">

			<h2>Adminstrative</h2>

			<?php
			while ($query->have_posts()) {
				$query->the_post();
			?>
				<article class="staff-item">
					<h3><?php the_title(); ?></h3>
					<?php


					if (function_exists('get_field')) {
						if (get_field('staff_biography')) {
							the_field('staff_biography');
						}
					}
					?>
				</article>
			<?php
			}
			?>

		</section>
	<?php
	}

	?>

	<?php
	/* Start the Loop */
	// Faculty Staff
	$args = array(
		'post-type'		=> 'fwd-staff',
		'posts_per_age' => -1,
		'tax_query'		=> array(
			array(
				'taxonomy' => 'fwd-staff-category',
				'field'    => 'slug',
				'terms'    => 'faculty'
			),
		),
	);
	$query = new WP_Query($args);

	if ($query->have_posts()) {
	?>
		<section class="staff-wrapper">

			<h2>Faculty</h2>

			<?php
			while ($query->have_posts()) {
				$query->the_post();
			?>
				<article class="staff-item">

					<?php
					?>
					<h3><?php the_title(); ?></h3>
					<?php
					// Biography
					if (function_exists('get_field')) {
						if (get_field('staff_biography')) {
							the_field('staff_biography');
						}
					}
					?>
					<?php
					// Courses
					if (function_exists('get_field')) {
						if (get_field('courses')) {
					?>
							<p><?php the_field('courses'); ?></p>
					<?php

						}
					}
					?>

					<?php
					// Instructor Website
					if (function_exists('get_field')) {
						if (get_field('instructor_link')) {
					?>
							<a href="<?php the_field('instructor_link'); ?>">Instructor Website</a>
					<?php

						}
					}
					?>
				</article>
			<?php
			}
			?>

		</section>
	<?php
	}
	?>

</main><!-- #main -->

<?php
get_footer();
