<?php
use Orm\Model;

class Model_Translition extends Model_Base {
	
	protected $current_lang_id;
	
	private $cached_id;
        
        protected static $_translition_model = 'Model_Localcontent';

        private $translated_fields_array = array();

        protected $translated_items = array();
	
	protected static $_translated_properties = array();
	
	function __construct(array $data = array(), $new = true, $view = null) {
		parent::__construct($data, $new, $view);
		$model = 'Model_Localcontent';
		$this->current_lang_id = TCLocale::get_current_leng_id();
	}
        
        public function save($cascade = null, $use_transaction = false) {
            $result = parent::save($cascade, $use_transaction);
            if($result and !empty($this->translated_fields_array)) {
                $this->translated_fields_array['content_id'] = $this->id;
                $model = Model_Localcontent::forge();
                if($model = Model_Localcontent::query()
			->where('content_id', '=', $this->id)
			->where('local_id', '=', $this->translated_fields_array['local_id'])
			->where('table', '=', $this->translated_fields_array['table'])
			->get_one()) {
                    foreach ($this->translated_fields_array as $key => $value) {
                        $model->__set($key, $value);
                    }
                } else {
                    $model = Model_Localcontent::forge($this->translated_fields_array);
                }
                return $model->save();
            }
            
            return $result;
        }

        protected function get_translitions($model) {
        if(!isset($this->current_lang_id)) {
                $this->current_lang_id = TCLocale::get_current_leng_id();
        }

        return \Fuel\Core\DB::select()
                        ->from($model::table())
                        ->where('local_id', '=', $this->current_lang_id)
                        ->where('content_id', '=', !empty($this->_data['id']) ? $this->_data['id'] : $this->cached_id)
                        ->where('table', '=', static::table())
                        ->execute()
                        ->as_array();

	}
	
	public function __set($property, $value) {
		if($property == 'id') {
			$this->cached_id = $value;
		}
		parent::__set($property, $value);
	}

	public function &get($property, array $conditions = array()) {
		$model = 'Model_Localcontent';
		if(count($this->translated_items) == 0) {
			$this->translated_items = self::get_translitions($model);
		}
                
		if(!in_array($property, array_keys(static::$_translated_properties)) or empty($this->translated_items) or !\Fuel\Core\Arr::key_exists($this->translated_items[0], $property)) {
			if(in_array($property, array_keys(static::$_translated_properties))) {
				$hh = "";
				return $hh;
			}
			return parent::get($property, $conditions);
		} else {
			return $this->translated_items[0][$property];
		}
		
	}
	
	public function get_translation($lang_id = null) {
		$model = static::$_translition['model_to'];
		return $model::query()->where('local_id', '=', $lang_id)->where(static::$_translition['key_to'], '=', $this->id)->get_one();
	}
	
	public static function get_translition_form() {
		$form = "";
		foreach (static::$_translated_properties as $key => $property) {
                        $form .= "<label>{$property['label']}</label>";
			$form .= \Fuel\Core\Form::$property['wiget']($key, '', array('placeholder' => $property['placeholder'], 'class' => 'span8'));
                        
                }
		
		return $form;
	}
        
        public function translition_form() {
		$form = "";
		foreach (static::$_translated_properties as $key => $property) {
                        $form .= "<label>{$property['label']}</label>";
			$form .= \Fuel\Core\Form::$property['wiget']($key, $this->get($key), array('placeholder' => $property['placeholder'], 'class' => 'span8'));
                }

		return $form;
	}
        
        public function save_translitions($tralnslition_fields = array(), $translition_id) {
            if(empty($tralnslition_fields) or !isset($translition_id)) {
                return false;
            }
            
            foreach ($tralnslition_fields as $key => $value) {
                if(in_array($key, array_keys(static::$_translated_properties))) {
                    $this->translated_fields_array[$key] = $value;
                }
            }
            
            if(!empty($this->translated_fields_array)) {
                $this->translated_fields_array['local_id'] = $translition_id;
                $this->translated_fields_array['table'] = static::table();
                return true;
            }
            
            return false;
            
        }
        
        public function delete_translitions() {
            if($models = Model_Localcontent::query()->where('content_id', '=', $this->id)
                    ->where('table', '=', static::table())
                    ->get()) {
                foreach ($models as $model) {
                    $model->delete();
                }
                
                return true;
            }
            
            return false;
        }

        public static function find_with_translitions($lang_id, $limit = null, $offset = null, $order_by = null, $desc_or_asc = null) {
            $model = static::$_translition_model;
            $content = DB::select()
                        ->from(static::table())
                        ->join($model::table())
                        ->on(static::table() . '.id', '=', $model::table(). ".content_id")
                        ->where('local_id', '=', $lang_id)
                        ->where('table', '=', static::table())
                        ->select_array(static::getTablesRow())
                        ->order_by($order_by ? $order_by : 'created_at', $desc_or_asc ? $desc_or_asc : 'asc');
            if(isset($limit)) {
                    $content->limit($limit);
            }

            if(isset($offset)) {
                    $content->offset($offset);
            }
            $content->as_object(get_called_class());
	    
            return $content->execute();
        }
	
	public static function get_langvige_tabs($local_id) {
		$request = \Fuel\Core\Request::active();
		$uri = $request->uri->segment(1) . DS . $request->uri->segment(2) . DS . $request->uri->segment(3);
                $seg = $request->uri->segment(5);
                if(isset($seg)) {
                    $uri .= DS . $request->uri->segment(4);
                }
		return \Fuel\Core\View::forge('tccoreviews/langtab', array('local_id' => $local_id, 'uri' => $uri))->render();
	}
}

?>
