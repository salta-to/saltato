<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package saltato
 */

?>

<?php if ( has_nav_menu( 'menu-2' ) ) : ?>
		<div class="app-pane__subnav">
			<nav class="app-subnav" aria-labelledby="app-subnav-heading">
				<h2 class="govuk-heading-m govuk-visually-hidden"><?php esc_html__( 'Related content and links', 'saltato' ); ?></h2>
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-2',
							'container'      => 'ul',
							'menu_class'     => 'app-subnav__section',
							'depth'          => 3,
							'walker'         => new Saltato_Secondary_Menu_Walker(),
						)
					);
				?>
			</nav><!-- .app-subnav -->
		</div><!-- .app-pane__subnav -->
	<?php if ( ! is_active_sidebar( 'sidebar-1' ) ) : ?>
	<?php endif; ?>
<?php endif; ?>
