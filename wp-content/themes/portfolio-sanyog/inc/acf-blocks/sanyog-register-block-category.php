<?php
function sanyog_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'my-blocks',
				'title' => __( 'My Blocks', 'sanyogshakya' ),
			),
		)
	);
}
add_filter( 'block_categories_all', 'sanyog_block_category', 10, 2);