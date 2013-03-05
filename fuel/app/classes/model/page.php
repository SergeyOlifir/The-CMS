<?php
use Orm\Model;

class Model_Page extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'alias',
		'header',
		'created_at',
		'updated_at',
	);
	
	protected static $_has_many = array(
		'contents' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Content',
			'key_to' => 'page_id',
			'cascade_save' => true,
			'cascade_delete' => false,
		)
	);
	
	protected static $_has_one = array(
		'link' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Link',
			'key_to' => 'page_id',
			'cascade_save' => true,
			'cascade_delete' => true,
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
		$val->add_field('alias', 'Alias', 'required|max_length[255]');
		$val->add_field('header', 'Header', 'required');

		return $val;
	}
	
	public static function as_array() 
	{
		$result = array();
		$pages = self::find('all');
		foreach ($pages as $page) {
			$result[$page->id] = $page->name;
		}
		return $result;
	}

}
