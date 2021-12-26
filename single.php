<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package saltato
 */

get_header();
?>
<div class="govuk-width-container ">
	<main class="govuk-main-wrapper " id="main-content" role="main">
		<div class="govuk-grid-row">
			<?php get_sidebar(); ?>
			<div class="govuk-grid-column-two-thirds">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'saltato' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'saltato' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
			</div><!-- .govuk-grid-column-two-thirds -->
	</div><!-- .govuk-grid-row -->
	</main><!-- .govuk-width-container -->
</div><!-- #main -->
<?php

get_footer();
