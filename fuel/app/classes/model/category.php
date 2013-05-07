<?php
use Orm\Model;

class Model_Category extends Model_Translition {

	protected static $_properties = array(
		'id',
		'name',
		'alias',
		'public_data',
		'view_content',
		'created_at',
		'updated_at',
	);
	
	protected static $_has_many = array(
		'contents' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Content',
			'key_to' => 'page_id',
			'cascade_save' => true,
			'cascade_delete' => true,
		),
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
        
        protected static $_translated_properties = array(
		'name' => array(
			'wiget' => 'input',
			'label' => 'Имя страницы',
                        'placeholder' => 'Имя категории',
		),
                'header' => array(
			'wiget' => 'input',
			'label' => 'Заголовок страницы',
                        'placeholder' => 'Заголовок категории',
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('alias', 'Alias', 'required|max_length[255]');

		return $val;
	}
	
	public static function as_array() 
	{
		$result = array();
		$categories = self::find('all');
		foreach ($categories as $category) {
			$result[$category->id] = $category->name;
		}
		return $result;
	}

	public function get_sorted_content() {
		return Model_Content::query()->where('page_id', "=", $this->id)->order_by('date_create', 'desc')->get();
	}

	public function get_count_content($lang_id = null) {
		return DB::select()
			->from('contents')
			->where('page_id', '=', $this->id)
			->join('localcontents')
			->on('contents.id', '=', 'localcontents.content_id')
			->where('local_id', '=', $lang_id)
			->cached(3600)
			->execute()
			->count();
	}

}
