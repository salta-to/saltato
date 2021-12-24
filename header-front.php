<?php
/**
 * The header for our front page.
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

<!--[if gte IE 9]><!-->
<div class="govuk-cookie-banner " data-nosnippet role="region" aria-label="Cookies on GOV.UK Design System" hidden data-module="govuk-cookie-banner">
	<div class="govuk-cookie-banner__message govuk-width-container app-width-container js-cookie-banner-message">
		<div class="govuk-grid-row">
			<div class="govuk-grid-column-two-thirds">
			<h2 class="govuk-cookie-banner__heading govuk-heading-m">
				<?php
				esc_html_e( 'Cookies on', 'saltato' );
				print ' ';
				bloginfo( 'name' );
				?>
				</h2>
				<div class="govuk-cookie-banner__content">
					<p class="govuk-body">
						<?php esc_html_e( 'We’d like to use analytics cookies so we can understand how you use this website and make improvements.', 'saltato' ); ?>
					</p>
					<p class="govuk-body">
						<?php esc_html_e( 'We also use essential cookies to remember if you’ve accepted analytics cookies.', 'saltato' ); ?>
					</p>
				</div>
			</div>
		</div>
		<div class="govuk-button-group">
			<button type="button" class="govuk-button js-cookie-banner-accept" data-module="govuk-button">
				<?php esc_html_e( 'Accept analytics cookies', 'saltato' ); ?>
			</button>
			<button type="button" class="govuk-button js-cookie-banner-reject" data-module="govuk-button">
				<?php esc_html_e( 'Reject analytics cookies', 'saltato' ); ?>
			</button>
			<a class="govuk-link" href="/cookies/">
				<?php esc_html_e( 'View cookies', 'saltato' ); ?>
			</a>
		</div>
	</div>
	<div class="govuk-cookie-banner__message govuk-width-container js-cookie-banner-confirmation-accept app-width-container" role="alert" hidden>
		<div class="govuk-grid-row">
			<div class="govuk-grid-column-two-thirds">
				<div class="govuk-cookie-banner__content">
					<p class="govuk-body">
						<?php
							/* TODO: Make this url configurable */
							$saltato_cookie_page_link = '/cookies/';
							/* translators: %s is replaced with the link to the page about cookies. */
							print sprintf( wp_kses( __( 'You’ve accepted analytics cookies. You can <a class="govuk-link" href="%s">change your cookie settings</a> at any time.', '$saltato' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( $saltato_cookie_page_link ) );
						?>
					</p>
				</div>
			</div>
		</div>
		<div class="govuk-button-group">
			<button class="govuk-button js-cookie-banner-hide js-cookie-banner-hide--accept" data-module="govuk-button">
				<?php esc_html_e( 'Hide this message', 'saltato' ); ?>
			</button>
		</div>
	</div>
	<div class="govuk-cookie-banner__message govuk-width-container js-cookie-banner-confirmation-reject app-width-container" role="alert" hidden>
		<div class="govuk-grid-row">
			<div class="govuk-grid-column-two-thirds">
				<div class="govuk-cookie-banner__content">
					<p class="govuk-body">
						<?php
							/* TODO: Make this url configurable */
							$saltato_cookie_page_link = '/cookies/';
							/* translators: %s is replaced with the link to the page about cookies. */
							print sprintf( wp_kses( __( 'You’ve rejected analytics cookies. You can <a class="govuk-link" href="%s">change your cookie settings</a> at any time.', '$saltato' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( $saltato_cookie_page_link ) );
						?>
					</p>
				</div>
			</div>
		</div>
		<div class="govuk-button-group">
			<button class="govuk-button js-cookie-banner-hide js-cookie-banner-hide--reject" data-module="govuk-button">
				<?php esc_html_e( 'Hide this message', 'saltato' ); ?>
			</button>
		</div>
	</div>
</div>
<script>
/* If cookie policy changes and/or the user preferences object format needs to
 * change, bump this version up afterwards. The user should then be shown the
 * banner again to consent to the new policy.
 *
 * Note that because isValidCookieConsent checks that the version in the user's
 * cookie is equal to or greater than this number, you should be careful to
 * check backwards compatibility when changing the object format.
 *
 */
window.GDS_CONSENT_COOKIE_VERSION = 1;
(function () {
	/** Check the cookie preferences object.
	*
	* If the consent object is not present, malformed, or incorrect version,
	* returns false, otherwise returns true.
	*
	* This is also duplicated in cookie-functions.js - the two need to be kept in sync
	*/
	function isValidConsentCookie (options) {
		return (options && options.version >= window.GDS_CONSENT_COOKIE_VERSION)
	}

	// Don't show the banner on the cookies page
	if (window.location.pathname !== "/cookies/") {
		// Show the banner if there is no consent cookie or if it is outdated
		var currentConsentCookie = document.cookie.match(new RegExp('(^| )design_system_cookies_policy=([^;]+)'))
		if (!currentConsentCookie || !isValidConsentCookie(JSON.parse(currentConsentCookie[2]))) {
			var cookieBanner = document.querySelector("[data-module='govuk-cookie-banner']")
			cookieBanner.removeAttribute('hidden')
		}
	}
})()
</script>
<!--<![endif]-->

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
			<div class="app-site-search">
				<?php get_search_form(); ?>
			</div>
			<div class="app-header-mobile-nav-toggler-wrapper">
				<button id="app-mobile-nav-toggler" class="govuk-button app-header-mobile-nav-toggler js-app-mobile-nav-toggler" aria-controls="app-mobile-nav">
					<?php esc_html_e( 'Menu', 'saltato' ); ?>
				</button>
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

	<div class="app-masthead">
		<div class="app-width-container govuk-width-container">
		<div class="govuk-grid-row">
			<div class="govuk-grid-column-two-thirds-from-desktop">
			<h1 class="govuk-heading-xl app-masthead__title">Design your website using GOV.UK styles, components and&nbsp;patterns</h1>
			<p class="app-masthead__description">Use this WordPress theme system to make your website consistent with GOV.UK. Learn from the research and experience of other service teams and avoid repeating work that’s already been done.</p>

			<a href="/get-started/" role="button" draggable="false" class="govuk-button app-button--inverted govuk-!-margin-top-6 govuk-!-margin-bottom-0 govuk-button--start" data-module="govuk-button">Get started
		<svg class="govuk-button__start-icon" xmlns="http://www.w3.org/2000/svg" width="17.5" height="19" viewBox="0 0 33 40" aria-hidden="true" focusable="false">
		<path fill="currentColor" d="M0 0h13l20 20-20 20H0l20-20z"></path>
		</svg></a>
			</div>

			<div class="govuk-grid-column-one-third-from-desktop">
			<img class="app-masthead__image" src="<?php bloginfo( 'template_url' ); ?>/images/homepage-illustration.svg" alt="" role="presentation">
			</div>
		</div>
		</div>
	</div>
