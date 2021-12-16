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
	<header class="govuk-header app-header" role="banner" data-module="govuk-header">
		<div class="govuk-header__container app-width-container app-header__container">
			<div class="govuk-header__logo app-header__logo">
				<a class="govuk-header__link govuk-header__link--homepage" href="<?php echo esc_url( home_url() ); ?>">
					<span class="govuk-header__logotype">
					<?php
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					if ( $custom_logo_id ) :
						$image = wp_get_attachment_image_src( $custom_logo_id, 'full' );
						?>
						<img class="site-logo" src="<?php echo esc_url( $image[0] ); ?>" alt="" />
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
						</span>
					</span>
					<span class="govuk-header__product-name">
						<?php bloginfo( 'description' ); ?>
					</span>
				</a>
			</div>
			<div class="app-site-search" data-module="app-search">
				<?php get_search_form(); ?>
			</div>
		</div>
	</header>

	<nav class="app-navigation govuk-clearfix">
		<ul class="app-navigation__list app-width-container">

			<li class="app-navigation__list-item">
				<a class="govuk-link govuk-link--no-visited-state govuk-link--no-underline app-navigation__link" href="/get-started/" data-topnav="Get started">Get started</a>
			</li>

			<li class="app-navigation__list-item">
				<a class="govuk-link govuk-link--no-visited-state govuk-link--no-underline app-navigation__link" href="/styles/" data-topnav="Styles">Styles</a>
			</li>

			<li class="app-navigation__list-item">
				<a class="govuk-link govuk-link--no-visited-state govuk-link--no-underline app-navigation__link" href="/components/" data-topnav="Components">Components</a>
			</li>

			<li class="app-navigation__list-item app-navigation__list-item--current">
				<a class="govuk-link govuk-link--no-visited-state govuk-link--no-underline app-navigation__link" href="/patterns/" data-topnav="Patterns">Patterns</a>
			</li>

			<li class="app-navigation__list-item">
				<a class="govuk-link govuk-link--no-visited-state govuk-link--no-underline app-navigation__link" href="/community/" data-topnav="Community">Community</a>
			</li>

		</ul>
	</nav>
