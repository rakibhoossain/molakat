<?php
function butterfly_page_callback( $control ) {
	if ( $control->manager->get_setting( 'butterfly_top_post_type' )->value() == 'page' ) {
		return true;
	}
	return false;
}

function butterfly_post_callback( $control ) {
	if ( $control->manager->get_setting( 'butterfly_top_post_type' )->value() == 'post' ) {
		return true;
	}
	return false;
}