<?php
use Orm\Model;

class Model_Content extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'description',
		'short_description',
		'image',
		'page_id',
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
	
	protected static $_many_many = array(
		'related_content' => array(
			'key_from' => 'id',
			'key_through_from' => 'content_id',
			'table_through' => 'contents_in_content',
			'key_through_to' => 'related_content_id',
			'model_to' => 'Model_Content',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		)
	);
	
	protected static $_belongs_to = array(
		'page' => array(
			'key_from' => 'page_id',
			'model_to' => 'Model_Page',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		)
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
