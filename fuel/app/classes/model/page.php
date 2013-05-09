<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sheet
 *
 * @author juise_man
 */
class Model_Page extends Model_Translition {
	protected static $_properties = array(
		'id',
		'alias',
		'publish_date',
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
	);
        
       
	protected static $_translated_properties = array(
		'name' => array(
			'wiget' => 'input',
			'label' => 'Имя страницы',
                        'placeholder' => 'Имя страницы',
		),
                'header' => array(
			'wiget' => 'input',
			'label' => 'Заголовок страницы',
                        'placeholder' => 'Заголовок страницы',
		),
		'description' => array(
			'wiget' => 'textarea',
			'label' => 'Описание',
                        'placeholder' => 'Описание',
		)
	);
	
	public function &get($property) {
	    if($property === 'category') {
		$pror = $this->get_category();
		return $pror;
	    } else {
		return parent::get($property);
	    }
	}
	
	protected function get_relatet_categories_content() {
	    $result =  \Fuel\Core\DB::select()
		    ->from(Model_Category::table())
		    ->join('categories_in_page', 'LEFT')
		    ->on(Model_Category::table() . '.id', '=', 'categories_in_page.category_id')
		    ->join(self::table(), 'LEFT')
		    ->on('categories_in_page.owner_id', '=', self::table() . '.id')
		    ->where(self::table() . '.id', 'IS', null)
		    ->or_where(self::table() . '.id', '<>', $this->id)
		    ->select_array(Model_Category::getTablesRow())
		    ->as_object('Model_Category')
		    ->execute();
	    return $result;
	  
	}
	
	protected function get_category() {
	    return \Fuel\Core\DB::select()
		    ->from(Model_Category::table())
		    ->join('categories_in_page')
		    ->on(Model_Category::table() . '.id', '=', 'categories_in_page.category_id')
		    ->join(Model_Page::table())
		    ->on('categories_in_page.owner_id', '=',Model_Page::table() . '.id')
		    ->where(Model_Page::table() . '.id', '=', $this->id)
		    ->select_array(Model_Category::getTablesRow())
		    ->as_object('Model_Category')
		    ->execute();
	}

	public function get_avalible_category() {
	    return $this->get_relatet_categories_content();
	}

	public static function as_array() {
	    $result = array();
	    $categories = self::find('all');
	    foreach ($categories as $category) {
		    $result[$category->id] = $category->name;
	    }
	    return $result;
	}

	
}

?>
