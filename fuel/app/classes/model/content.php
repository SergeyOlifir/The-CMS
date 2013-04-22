<?php
use Orm\Model;

class Model_Content extends Model
{
	protected static $_properties = array(
		'id',
		/*'name',
		'description',
		'short_description',*/
		'image',
		'page_id',
		'date_create',
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
	
	protected static $_has_many = array(
    'images' => array(
        'key_from' => 'id',
        'model_to' => 'Model_Image',
        'key_to' => 'owner_id',
        'cascade_save' => true,
        'cascade_delete' => true,
    ),
	'local_contents' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Localcontent',
			'key_to' => 'content_id',
			'cascade_save' => true,
			'cascade_delete' => true,
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

	public function get_translation($lang_id = null) {
		return Model_Localcontent::query()->where('local_id', '=', $lang_id)->where('content_id', '=', $this->id)->get_one();
	}
}
