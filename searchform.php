<?php
/**
 * The template for displaying search form
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package saltato
 */

?>
<div class="search" data-module="search">
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" role="search">

		<label class="govuk-label search__label" for="search" aria-hidden="true"><?php esc_html_e( 'Search this website', 'saltato' ); ?></label>
		<input type="text" id="search" name="s" class="govuk-input govuk-!-margin-bottom-0 search__input" aria-controls="search-results" placeholder="<?php esc_html_e( 'Search', 'saltato' ); ?> <?php bloginfo( 'name' ); ?>" value="<?php echo get_search_query(); ?>">
	</form>
</div>
