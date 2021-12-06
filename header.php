<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package saltato
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="govuk-template">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<script>
	document.body.className = ((document.body.className) ? document.body.className + ' js-enabled' : 'js-enabled');
</script>
<a href="#main-content" class="govuk-skip-link"><?php esc_html_e( 'Skip to main content', 'saltato' ); ?></a>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header class="govuk-header " role="banner" data-module="govuk-header">
		<div class="govuk-header__container govuk-width-container">
			<div class="govuk-header__logo">
				<a class="link-header-home" href="<?php echo esc_url( home_url() ); ?>">
				<?php
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				if ( $custom_logo_id ) :
					$image = wp_get_attachment_image_src( $custom_logo_id, 'full' );
					?>
					<span class="govuk-header__logotype">
						<img class="site-logo" src="<?php echo esc_url( $image[0] ); ?>" alt="" />
					</span>
				<?php endif; ?>
				<span class="govuk-header__logotype-text">
					<?php
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
						<?php
					else :
						?>
						<p class="site-title"><?php bloginfo( 'name' ); ?></p>
						<?php
					endif;
					?>
				</a>
				</span>
			</a>
			</div>
		</div>
	</header>
	<div class="govuk-width-container">
		<div class="govuk-grid-row">
			<div class="govuk-grid-column-two-thirds">
				<p class="govuk-heading-xl"><?php bloginfo( 'description' ); ?></p>
			</div>
			<div class="govuk-grid-column-one-third">
				<div class="bottom search-container">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</div>
