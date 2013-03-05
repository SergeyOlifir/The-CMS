<?php

return array(
	'site_name' => 'Житница',
	'admin_email' => 'Juise_Man',
	'admin_pass' => '8056202',
	'logo' => array(
		'upload' => array(
			'path' => DOCROOT.'files',
			'randomize' => true,
			'normalize' => true,
			'type_whitelist' => array('image')
		),
		'sizes' => array(
			'small' => array(
				'width'  => 200,
				'height' => 200
			),
		)
	),	
	'time_to_logout' => array(
		'time' => 4
	),
	
	'pagination' => array(
		'per_page' => 20,
	),
	
);

