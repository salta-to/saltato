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
<a href="#primary" class="govuk-skip-link"><?php esc_html_e( 'Skip to main content', 'saltato' ); ?></a>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header class="govuk-header " role="banner" data-module="govuk-header">
		<div class="govuk-header__container govuk-width-container">
			<div class="govuk-header__logo">
			<a href="/" class="govuk-header__link govuk-header__link--homepage">
				<span class="govuk-header__logotype">
				<?php the_custom_logo(); ?>
				<span class="govuk-header__logotype-text">
					<?php
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					?>
				</span>
				</span>
			</a>
			</div>
		</div>
	</header>

