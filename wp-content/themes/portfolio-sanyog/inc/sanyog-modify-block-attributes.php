<?php
function sanyog_modify_block_attributes($attributes, $data, $post_id) {
	if(isset($attributes['data'])){
		$attributesData = $attributes['data'];
		foreach ($attributesData as $key => $value) {
			// attributes that start with an underscore _ are set to the field keys
			if(substr($key, 0, 1) == '_' && function_exists('get_field_object')){
				$fieldObject = get_field_object($value);

				// handle acf file field
				if($fieldObject && $fieldObject['type'] == 'file'){
					$fileId = $attributes['data'][substr($key, 1)];
					// get media item
					$fileUrl = wp_get_attachment_url($fileId);

					if($fieldObject['return_format'] == 'url'){
						$attributes['data'][substr($key, 1)] = $fileUrl;
					}else if($fieldObject['return_format'] == 'array'){
						$attributes['data'][substr($key, 1)] = array(
							'id' => $fileId,
							'url' => $fileUrl,
						);
					}else if($fieldObject['return_format'] == 'id'){
						$attributes['data'][substr($key, 1)] = $fileId;
					}
				}
			}
		}
	}
	// if($data['blockName'] == 'acf/sanyog-projects-showcase') {
	// 	$projects = $attributes['data']['projects'];
	// 	$projectReturnData = [];
	// 	foreach($projects as $projectId) {
	// 		$project = (object) [
	// 			'projectId' => intval($projectId),
	// 		];
	// 		$projectReturnData[] = $project;
	// 	}
	// 	$attributes['data']['projects'] = $projectReturnData;
	// }
	return $attributes;
}
add_filter('wp_graphql_blocks_process_attributes', 'sanyog_modify_block_attributes', 0, 3);