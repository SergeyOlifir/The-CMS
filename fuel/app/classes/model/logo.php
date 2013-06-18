<?php

use Orm\Model;

class Model_Logo extends Model
{
	protected static $_properties = array(
		'id',
		'origin',
		'list',
		'tile',
		'thumb',
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
		'Orm\Observer_ImageSaver' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		)
	);
	
	
	protected static $_belongs_to = array(
		'content' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Content',
			'key_to' => 'image',
			'cascade_save' => true,
			'cascade_delete' => false,
		)
	);

}

?>
