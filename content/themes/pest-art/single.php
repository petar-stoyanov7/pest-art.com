<?php
/**
 * The Template file for displaying single content
 *
 * @package Pest-art.com
 * @since Pest-art.com 0.0.1
 */

get_header();
?>

<main class="pa-content pa-single">
	<?php
	if (have_posts()) {
		while(have_posts()) {
			the_post();
			get_template_part('template-parts/single', get_post_type());
		}
	}
	?>
</main>

<?php get_footer(); ?>
