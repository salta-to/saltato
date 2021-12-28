<?php
/**
 * The template for displaying WordPress errors with comments.
 *
 * @package saltato
 */

get_header();
?>
<div class="govuk-width-container ">
	<main class="govuk-main-wrapper " id="main-content" role="main">
		<div class="govuk-grid-row">
			<div class="govuk-grid-column-two-thirds">
				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"><?php echo esc_html( $title ); ?></title>
					</header><!-- .page-header -->
						<?php
						echo wp_kses(
							$message,
							array(
								'p'      => array(),
								'strong' => array(),
								'a'      => array(
									'href' => array(),
								),
							),
							array(
								'https',
								'javascript',
							)
						);
						?>
				</section>
			</div><!-- .govuk-grid-column-two-thirds -->
	</div><!-- .govuk-grid-row -->
</div><!-- #main -->
<?php

get_footer();
