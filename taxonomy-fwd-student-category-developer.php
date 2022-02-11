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
		<h1>Developer Students</h1>

	</header><!-- .page-header -->

	<?php
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
		<section class="developer-section">
			<?php
			while ($query->have_posts()) {
				$query->the_post();
			?>
				<article class="developer-student-item">
					<a href="<?php the_permalink(); ?>">
						<h3><?php the_title(); ?></h3>
					</a>
					<?php the_post_thumbnail('large'); ?>
					<?php the_content(); ?>
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
