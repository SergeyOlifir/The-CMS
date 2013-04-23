<?php
use Orm\Model;

class Model_Translition extends Model_Base {
	
	protected $current_lang_id;
	
	private $cached_id;

	protected $translated_items = array();
	
	protected static $_to_translition_exclude = array();

	protected static $_translition = array();
	
	function __construct(array $data = array(), $new = true, $view = null) {
		parent::__construct($data, $new, $view);
		$model = static::$_translition['model_to'];
		$this->current_lang_id = TCLocale::get_current_leng_id();
		//if(empty($this->translated_items) and !$this->_is_new) {
		//	$this->translated_items = self::get_translitions($model);
		//}
	}
	
	protected function get_translitions($model) {
		//var_dump($this->_data); die();
		if(!isset($this->current_lang_id)) {
			$this->current_lang_id = TCLocale::get_current_leng_id();
		}
		return \Fuel\Core\DB::select()
				->from($model::table())
				->where('local_id', '=', $this->current_lang_id)
				->where(static::$_translition['key_to'], '=', !empty($this->_data['id']) ? $this->_data[static::$_translition['key_from']] : $this->cached_id)
				->execute()
				->as_array();
				
	}
	
	public function __set($property, $value) {
		if($property == 'id') {
			$this->cached_id = $value;
		}
		parent::__set($property, $value);
	}

	public function &get($property) {
		$model = static::$_translition['model_to'];
		if(count($this->translated_items) == 0) {
			$this->translated_items = self::get_translitions($model);
		}

		if(in_array($property, static::$_to_translition_exclude) or empty($this->translated_items) or !\Fuel\Core\Arr::key_exists($this->translated_items[0], $property)) {
			if(!in_array($property, static::$_to_translition_exclude) and in_array($property, array_keys($model::properties()))) {
				$hh = "";
				return $hh;
			}
			return parent::get($property);
		} else {
			return $this->translated_items[0][$property];
		}
		
	}
	
	public function get_translation($lang_id = null) {
		$model = static::$_translition['model_to'];
		return $model::query()->where('local_id', '=', $lang_id)->where(static::$_translition['key_to'], '=', $this->id)->get_one();
	}
	
	public static function find_with_translitions($lang_id, $limit = null, $offset = null) {
		$model = static::$_translition['model_to'];
		$content = DB::select()
						->from(static::table())
						->join($model::table())
		    			->on(static::table() . '.id', '=', $model::table(). "." . static::$_translition['key_to'])
		    			->where('local_id', '=', $lang_id)
						->select_array(static::getTablesRow())
						->order_by('date_create', 'desc');
		if(isset($limit)) {
			$content->limit($limit);
		}
		
		if(isset($offset)) {
			$content->offset($offset);
		}
		$content->as_object(get_called_class());
		return $content->execute();
	}
}

?>
