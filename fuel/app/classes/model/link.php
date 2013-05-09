<?php
use Orm\Model;

class Model_Link extends Model_Translition
{
	protected static $_properties = array(
		'id',
		/*'name',
		'description',*/
		'image',
		'page_id',
		'weight',
		'public',
		'uri',
		'created_at',
		'updated_at',
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
	
	protected static $_has_many = array(
		'local_contents' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Locallink',
			'key_to' => 'link_id',
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
		'Orm\Observer_ImageSaver' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		)
	);

	protected static $_translition = array(
		'key_from' => 'id',
		'model_to' => 'Model_Locallink',
		'key_to' => 'link_id',
	);
	
	protected static $_to_translition_exclude = array(
		'id',
		'created_at',
		'updated_at',
	);
        
        protected static $_translated_properties = array(
		'name' => array(
			'wiget' => 'input',
			'label' => 'Имя страницы',
                        'placeholder' => 'Имя страницы',
		),
                
		'description' => array(
			'wiget' => 'textarea',
			'label' => 'Описание',
                        'placeholder' => 'Описание',
		)
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('weight', 'Weight', 'required|valid_string[numeric]');

		return $val;
	}
	
	public static function find_with_translitions_related_to_public($lang_id, $limit = null, $offset = null) {
		$link = DB::select()
                                ->from('links')
                                ->join('locallinks')
                                ->on('links.id', '=', 'locallinks.link_id')
                                ->where('local_id', '=', $lang_id)
                                ->and_where('public', '=', 1)
                                ->select('links.id', 'links.image', 'links.page_id', 'links.weight', 'links.public', 'links.created_at', 'links.updated_at')
                                ->order_by('weight', 'desc');
		if(isset($limit)) {
			$link->limit($limit);
		}
		
		if(isset($offset)) {
			$link->offset($offset);
		}
		$link->as_object('Model_Link');
		return $link->execute();
	}

}
