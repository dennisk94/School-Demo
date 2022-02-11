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

	<?php
	while (have_posts()) :
		the_post();

		get_template_part('template-parts/content', 'page');

		// Schedule Row
		if (have_rows('course_schedules')) :
			// Loop through rows
	?>
			<table>
				<?php
				while (have_rows('course_schedules')) :
					$arr = the_row();
					$sub_field_date 		= get_sub_field('date');
					$sub_field_course 		= get_sub_field('course');
					$sub_field_instructor   = get_sub_field('instructor');
				?>

					<tr>
						<th><?php echo $sub_field_date ?></th>
						<td><?php echo $sub_field_course ?></td>
						<td><?php echo $sub_field_instructor ?></td>
					</tr>

				<?php

				endwhile;
				?>
			</table>
	<?php
		endif;

	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
