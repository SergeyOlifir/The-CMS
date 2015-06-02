<?php

use Orm\Model;

class Model_Image extends Model
{
	protected static $_properties = array(
		'id',
		'origin',
		'thumb',
		'galery',
		'full',
		'owner_id',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_GaleryImageSaver' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		)
	);
	
	
	protected static $_belongs_to = array(
		'page' => array(
			'key_from' => 'owner_id',
			'model_to' => 'Model_Content',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		)
	);

}

?>
