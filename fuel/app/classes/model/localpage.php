<?php
use Orm\Model;

class Model_Localpage extends Model_Base
{
	protected static $_properties = array(
		'id',
		'page_id',
		'local_id',
		'header',
		'created_at',
		'updated_at',
	);
	
	protected static $_belongs_to = array(
		'page' => array(
			'key_from' => 'page_id',
			'model_to' => 'Model_Category',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		)
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
	);

	public static function validate($factory)
	{
		$val = Validation::instance($factory);
		$val->add_field('header', 'Header', 'required');

		return $val;
	}

}
