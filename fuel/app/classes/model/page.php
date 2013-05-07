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
