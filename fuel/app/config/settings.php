<?php

return array(
	'site_name' => 'ТМ «Рідна Житниця» - производство толокна и солодов...',
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
			'list' => array(
				'width'  => 270,
				'height' => 150,
			),
			'tile' => array(
				'width'  => 180,
				'height' => 100,
			),
		)
	),
	'galery' => array(
		'upload' => array(
			'path' => DOCROOT.'files',
			'randomize' => true,
			'normalize' => true,
			'type_whitelist' => array('image')
		),
		'sizes' => array(
			'thumb' => array(
				'width' => 150,
				'height' => 150,
			),
			'galery' => array(
				'width' => 700,
				'height' => 600,
			),
			'full' => array(
				'width' => 1024,
				'height' => 768,
			),
		),
	),
	'time_to_logout' => array(
		'time' => 4
	),
	
	'pagination' => array(
		'per_page' => 20,
	),
	
);

