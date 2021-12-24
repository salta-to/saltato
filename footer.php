<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package saltato
 */

?>
	<footer class="govuk-footer " role="contentinfo">
		<div class="govuk-width-container ">
			<div class="govuk-footer__meta">
			<div class="govuk-footer__meta-item govuk-footer__meta-item--grow">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'saltato' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'saltato' ), 'WordPress' );
				?>
				</a>
				<span class="sep">&nbsp;|&nbsp;</span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme ‘%1$s’ by %2$s.', 'saltato' ), 'saltato', '<a href="https://www.jooplaan.com/">Joop Laan</a>' );
				?>
			</a>
			</div>
			<div class="govuk-footer__meta-item">
			</div>
			</div>
		</div>
		</footer>
</div><!-- #page -->
<?php wp_footer(); ?>
<script>
	window.GOVUKFrontend.initAll();
</script>
</body>
</html>
