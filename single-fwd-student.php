<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package School_Theme
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
	while (have_posts()) :
		the_post();

	?>
		<article class="single-student">
			<h2><?php the_title(); ?></h2>
			<?php

			the_post_thumbnail('medium');

			the_content();

			if (has_term('designer', 'fwd-student-category')) :
			?>
				<!-- Display other designer student's names -->
				<h3>Meet other Designer Students:</h3>
				<?php
				$args = array(
					'post__not_in'	  => array(
						get_the_ID(),
					),
					'post_type'		  => 'fwd-student',
					'posts_per_page'  => -1,
					'tax_query'		  => array(
						array(
							'taxonomy'		=> 'fwd-student-category',
							'field'			=> 'slug',
							'terms'			=> 'designer'
						),
					),
				);

				$query = new WP_Query($args);

				if ($query->have_posts()) :
				?>
					<ul>

						<?php
						while ($query->have_posts()) :
							$query->the_post();
						?>
							<li>
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</li>
						<?php

						endwhile;
						?>

					</ul>
				<?php
				endif;
				?>
			<?php
			endif;

			if (has_term('developer', 'fwd-student-category')) :
			?>
				<!-- Display other developer student's names -->

				<h3>Meet other Developer Students:</h3>

				<?php
				$args = array(
					'post__not_in'	  => array(
						get_the_ID(),
					),
					'post_type'		  => 'fwd-student',
					'posts_per_page'  => -1,
					'tax_query'		  => array(
						array(
							'taxonomy'		=> 'fwd-student-category',
							'field'			=> 'slug',
							'terms'			=> 'developer'
						),
					),
				);

				$query = new WP_Query($args);

				if ($query->have_posts()) :
				?>
					<ul>

						<?php
						while ($query->have_posts()) :
							$query->the_post();
						?>
							<li>
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</li>
						<?php

						endwhile;
						?>

					</ul>
				<?php
				endif;
				?>
		</article>
<?php
			endif;
		endwhile; // End of the loop.
?>

</main><!-- #main -->

<?php
get_footer();
