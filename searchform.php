<?php
/**
 * The template for displaying search form
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package saltato
 */

?>
<form role="search" method="get" id="searchform" class="form-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="govuk-visually-hidden" for="s">Search for:</label>
	<div class="search-input-wrapper">
		<input type="search" value="<?php echo esc_url( get_search_query() ); ?>" name="s" id="s" class="search-query" placeholder="<?php esc_html_e( 'Search', 'saltato' ); ?>">
		<input type="submit" id="searchsubmit" value="<?php esc_html_e( 'Search', 'saltato' ); ?>" class="btn">
	</div>
</form>
