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
		<h1>The Class</h1>
	</header><!-- .page-header -->

	<?php
	/* Start the Loop */
	// Designer Section
	$args = array(
		'post-type'		 => 'fwd-student',
		'posts_per_page' => -1,
		'tax_query'		 => array(
			array(
				'taxonomy' => 'fwd-student-category',
				'field'    => 'slug',
				'terms'    => 'designer'
			),
		),
	);
	$query = new WP_Query($args);

	if ($query->have_posts()) {
	?>
		<div class="students-wrapper">
			<?php
			while ($query->have_posts()) {
				$query->the_post();
				$classification = get_the_term_list($post->ID, 'fwd-student-category');
			?>
				<article class="student-item">

					<h3><?php the_title(); ?></h3>

					<?php the_post_thumbnail('large'); ?>
					<?php the_excerpt(); ?>
					<p>Specialty: <?php echo $classification ?></p>
				</article>
			<?php
			}
			?>
		<?php
	}
		?>
		<?php
		// Developer Section
		$args = array(
			'post-type'		 => 'fwd-student',
			'posts_per_page' => -1,
			'tax_query'		 => array(
				array(
					'taxonomy' => 'fwd-student-category',
					'field'    => 'slug',
					'terms'    => 'developer'
				),
			),
		);
		$query = new WP_Query($args);

		if ($query->have_posts()) {
		?>
			<?php
			while ($query->have_posts()) {
				$query->the_post();
				$classification = get_the_term_list($post->ID, 'fwd-student-category');
			?>
				<article class="student-item">
					<h3><?php the_title(); ?></h3>
					<?php the_post_thumbnail('large'); ?>
					<?php the_excerpt(); ?>
					<p>Specialty: <?php echo $classification ?></p>
				</article>
			<?php
			}
			?>

		</div>
	<?php
		}
	?>
</main><!-- #main -->

<?php
get_footer();
