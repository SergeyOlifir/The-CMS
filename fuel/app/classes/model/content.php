<?php
use Orm\Model;

class Model_Content extends Model_Translition
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
			'model_to' => 'Model_Category',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
		'category' => array(
			'key_from' => 'page_id',
			'model_to' => 'Model_Category',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		)
	);
	
	protected static $_translition = array(
		'key_from' => 'id',
		'model_to' => 'Model_Localcontent',
		'key_to' => 'content_id',
	);
	
	protected static $_to_translition_exclude = array(
		'id',
		'created_at',
		'updated_at',
	);

	public static function find_with_translitions_related_to_category($lang_id, $category_alias, $limit = null, $offset = null) {
		$content = DB::select()
						->from('contents')
						->join('localcontents')
		    			->on('contents.id', '=', 'localcontents.content_id')
		    			->where('local_id', '=', $lang_id)
						->join('pages')
						->on('contents.page_id', '=', 'pages.id')
						->where('pages.alias', '=', $category_alias)
						->select('contents.id', 'contents.image', 'contents.page_id', 'contents.date_create', 'contents.created_at', 'contents.updated_at')
						->order_by('date_create', 'desc');
		if(isset($limit)) {
			$content->limit($limit);
		}
		
		if(isset($offset)) {
			$content->offset($offset);
		}
		$content->as_object('Model_Content');
		return $content->execute();
	}
}
