<?php
function sanyog_block_render_callback( $block ) {
	// convert name ("acf/$block['name']") into path friendly slug ("$block['name']")
	$slug = str_replace('acf/', '', $block['name']);
	$slug = str_replace('sanyog-', '', $slug);
	
	// include a template part from within the "template-parts/block" folder
	if( file_exists( get_theme_file_path("/template-parts/blocks/content-{$slug}.php") ) ) {
		include( get_theme_file_path("/template-parts/blocks/content-{$slug}.php") );
	}
}
