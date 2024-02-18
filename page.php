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
 * @package Wp_Front
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php get_template_part( 'page-templates/content', 'flexible-template' ); ?>
	</main><!-- #main -->

<?php
get_footer();
