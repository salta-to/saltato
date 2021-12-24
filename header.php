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
	document.body.classList.remove("no-js");
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
					$saltato_custom_logo_id = get_theme_mod( 'custom_logo' );
					if ( $saltato_custom_logo_id ) :
						$saltato_custom_logo_image = wp_get_attachment_image_src( $saltato_custom_logo_id, 'full' );
						?>
						<img class="saltato-logo" src="<?php echo esc_url( $saltato_custom_logo_image[0] ); ?>" alt="" />
					<?php else : ?>
						<svg aria-hidden="true" focusable="false" class="saltato-logo saltato-logo-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" height="32" width="32" xml:space="preserve">
							<style type="text/css">
								.st0{fill:none;stroke:#ffffff;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
								.st1{fill:none;stroke:#ffffff;stroke-width:2;stroke-linejoin:round;stroke-miterlimit:10;}
							</style>
							<polyline class="st0" points="27,19 27,6 5,6 5,19 "/>
							<polygon class="st0" points="30,26 2,26 4,22 28,22 "/>
							<polyline class="st0" points="11,11 8,14 11,17 "/>
							<polyline class="st0" points="21,11 24,14 21,17 "/>
							<line class="st0" x1="18" y1="10" x2="14" y2="18"/>
							<image src="<?php bloginfo( 'template_url' ); ?>/images/saltato-logo-32x32.png" xlink:href="" class="saltato-logo-fallback-image" width="32" height="32"></image>
						</svg>
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
			<div class="app-header-mobile-nav-toggler-wrapper">
				<button id="app-mobile-nav-toggler" class="govuk-button app-header-mobile-nav-toggler js-app-mobile-nav-toggler" aria-controls="app-mobile-nav" aria-expanded="false"><?php esc_html_e( 'Menu', 'saltato' ); ?></button>
			</div>
		</div>
	</header>

	<?php if ( has_nav_menu( 'menu-1' ) ) : ?>
	<nav id="app-mobile-nav" class="app-mobile-nav js-app-mobile-nav" role="navigation" aria-labelledby="app-mobile-navigation-heading" aria-hidden="false">
		<h2 class="govuk-visually-hidden" id="app-mobile-navigation-heading">Menu</h2>
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'container'      => 'ul',
					'menu_class'     => 'app-mobile-nav__list',
					'walker'         => new Saltato_Primary_Menu_Walker(),
					'is_mobile_menu' => true,
				)
			);
		?>
	</nav>

	<nav class="app-navigation app-navigation-desktop govuk-clearfix">
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'container'      => 'ul',
						'menu_class'     => 'app-navigation__list app-width-container',
						'walker'         => new Saltato_Primary_Menu_Walker(),
						'depth'          => 1,
						'is_mobile_menu' => false,
					)
				);
			?>
	</nav>
	<?php endif; ?>
