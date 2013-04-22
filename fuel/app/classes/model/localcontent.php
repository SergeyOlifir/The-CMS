<?php
use Orm\Model;

class Model_Localcontent extends Model
{
	protected static $_properties = array(
		'id',
		'content_id',
		'local_id',
		'name',
		'description',
		'short_description',
		'created_at',
		'updated_at',
	);
	
	protected static $_belongs_to = array(
		'page' => array(
			'key_from' => 'content_id',
			'model_to' => 'Model_Content',
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
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('description', 'Description', 'required');
		$val->add_field('short_description', 'Short Description', 'required');
		return $val;
	}
}
