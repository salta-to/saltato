<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saltato
 */

get_header();
?>
<div class="govuk-width-container ">
	<main class="govuk-main-wrapper " id="main-content" role="main">
		<div class="govuk-grid-row">
			<div class="govuk-grid-column-two-thirds">
				<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div><!-- .govuk-grid-column-two-thirds -->
			<div class="govuk-grid-column-one-third">
				<?php get_sidebar( 'blog' ); ?>
			</div>
		</div><!-- .govuk-grid-row -->
	</main><!-- .govuk-width-container -->
</div><!-- #main -->
<?php

get_footer();
