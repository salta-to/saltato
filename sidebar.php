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
	<div class="govuk-grid-column-one-third">
		<h2 class="govuk-heading-m govuk-visually-hidden"><?php esc_html__( 'Related content and links', 'saltato' ); ?></h2>
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-2',
					'container'      => 'ul',
					'menu_class'     => 'app-subnav__section',
					'walker'         => new Saltato_Secondary_Menu_Walker(),
				)
			);
		?>
	<?php if ( ! is_active_sidebar( 'sidebar-1' ) ) : ?>
	</div><!-- .govuk-grid-column-one-third -->
	<?php endif; ?>
<?php endif; ?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<?php if ( ! has_nav_menu( 'menu-2' ) ) : ?>
		<div class="govuk-grid-column-one-third">
		<h2 class="govuk-heading-m govuk-visually-hidden"><?php esc_html__( 'Related content and links', 'saltato' ); ?></h2>
	<?php endif; ?>

	<aside id="secondary" class="widget-area">
		<h2 class="govuk-heading-m govuk-visually-hidden"><?php esc_html__( 'Related content and links', 'saltato' ); ?></h2>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- #secondary -->
	</div><!-- .govuk-grid-column-one-third -->
<?php endif; ?>
