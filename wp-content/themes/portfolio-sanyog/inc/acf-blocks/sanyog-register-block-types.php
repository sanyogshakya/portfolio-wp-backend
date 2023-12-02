<?php
add_action('acf/init', 'sanyog_register_block_types');
function sanyog_register_block_types()
{

	// Check function exists.
	if (function_exists('acf_register_block_type')) {

		// registers Title with Description block
		acf_register_block_type(array(
			'name'				=> 'sanyog-title-with-description',
			'title'				=> __('Title With Description'),
			'description'		=> __('Title with Description block.'),
			'render_callback'	=> 'sanyog_block_render_callback',
			'category'			=> 'my-blocks',
			'icon'				=> 'align-full-width',
			'keywords'			=> array('title', 'with', 'description'),
			'mode'				=> 'edit',
			'supports'			=> array(
				'mode'			=> 'false',
				'align'			=> false,
			),
		));

		// registers Experience block
		acf_register_block_type(array(
			'name'				=> 'sanyog-experience',
			'title'				=> __('Experience'),
			'description'		=> __('A block that renders your Experience List.'),
			'render_callback'	=> 'sanyog_block_render_callback',
			'category'			=> 'my-blocks',
			'icon'				=> 'align-full-width',
			'keywords'			=> array('experience', 'Job'),
			'mode'				=> 'edit',
			'supports'			=> array(
				'mode'			=> 'false',
				'align'			=> false,
			),
		));

		// registers Projects Showcase block
		acf_register_block_type(array(
			'name'				=> 'sanyog-projects-showcase',
			'title'				=> __('Projects Showcase'),
			'description'		=> __('A block that renders notable and showcased projects.'),
			'render_callback'	=> 'sanyog_block_render_callback',
			'category'			=> 'my-blocks',
			'icon'				=> 'align-full-width',
			'keywords'			=> array('projects', 'project', 'showcase', 'notable'),
			'mode'				=> 'edit',
			'supports'			=> array(
				'mode'			=> 'false',
				'align'			=> false,
			),
		));

		// registers Contact Form block
		acf_register_block_type(array(
			'name'				=> 'sanyog-contact-form',
			'title'				=> __('Contact Form'),
			'description'		=> __('A block that renders a Contact Form.'),
			'render_callback'	=> 'sanyog_block_render_callback',
			'category'			=> 'my-blocks',
			'icon'				=> 'align-full-width',
			'keywords'			=> array('contact', 'form'),
			'mode'				=> 'edit',
			'supports'			=> array(
				'mode'			=> 'false',
				'align'			=> false,
			),
		));

		// registers Technology block
		acf_register_block_type(array(
			'name'				=> 'sanyog-technologies',
			'title'				=> __('Technologies'),
			'description'		=> __('A block that showcases technology icons.'),
			'render_callback'	=> 'sanyog_block_render_callback',
			'category'			=> 'my-blocks',
			'icon'				=> 'align-full-width',
			'keywords'			=> array('technology', 'icons', 'technologies'),
			'mode'				=> 'edit',
			'supports'			=> array(
				'mode'			=> 'false',
				'align'			=> false,
			),
		));

		// registers Technology block
		acf_register_block_type(array(
			'name'				=> 'sanyog-project-listing',
			'title'				=> __('Project Listing'),
			'description'		=> __('A block that lists projects.'),
			'render_callback'	=> 'sanyog_block_render_callback',
			'category'			=> 'my-blocks',
			'icon'				=> 'align-full-width',
			'keywords'			=> array('project', 'listing'),
			'mode'				=> 'edit',
			'supports'			=> array(
				'mode'			=> 'false',
				'align'			=> false,
			),
		));

  }
}