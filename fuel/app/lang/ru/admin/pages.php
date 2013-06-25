<?php

return array(
	'index' => array(
		'navlist' => array(
			'list' => 'Cписок страниц',
			'add' => 'Добавить страницу',
		),
		'page-list' => array(
			'title' => 'Список созданных страниц',
			'table' => array(
				'name' => 'Название',
				'alias' => 'Alias',
				'weight' => 'Вес',
				'date_create' => 'Дата создания',
				'actions' => 'Действия',
			),
			'btn-group' => array(
				'title' => 'Action',
				'view' => 'View',
				'edit' => 'Edit',
				'delete' => 'Delete',
			),
			'null' => 'No Pages.',
		),
	),

	'create' => array(
		'navlist' => array(
			'title' => 'Создание страници',
		),
	),

	'edit' => array(
		'navlist' => array(
			'title' => 'Редактирование категории',
			'category' => 'Категории',
		),
		'relations' => array(
			'title' => 'Категории',
			'table' => array(
				'name' => 'Имя',
				'alias' => 'Алиас',
				'actions' => 'Действия',
			),
			'btn-group' => array(
				'title' => 'Action',
				'content' => 'Контент',
				'edit' => 'Edit',
				'delete' => 'Delete',
			),
			'navbtn' => array(
				'add' => 'Добавить категорию',
			),
			'add-category' => array(
				'title' => 'Доступные категории',
				'table' => array(
					'name' => 'Название',
				),
				'navbtn' => array(
					'close' => 'Close',
					'save' => 'Сохранить',
				),
			),
		),
	),

	'_form' => array(
		'title' => 'Редактирование страници',
		'input' => array(
			'alias' => 'Alias',
			'publish_date' => 'Отображать дату контента',
			'weight' => 'Вес',
			'submit' => 'Сохранить',
		),
	),
);