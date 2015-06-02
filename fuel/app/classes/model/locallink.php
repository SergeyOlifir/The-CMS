<?php
use Orm\Model;

class Model_Locallink extends Model_Base
{
	protected static $_properties = array(
		'id',
		'link_id',
		'local_id',
		'name',
		'description',
		'created_at',
		'updated_at',
	);
	
	protected static $_belongs_to = array(
		'link' => array(
			'key_from' => 'link_id',
			'model_to' => 'Model_Link',
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
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('description', 'Description', 'required');

		return $val;
	}
}
