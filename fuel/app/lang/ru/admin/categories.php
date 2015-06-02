<?php

return array(
	'index' => array(
		'navlist' => array(
			'list' => 'Cписок категорий',
			'add' => 'Добавить категорию',
		),
		'page-list' => array(
			'title' => 'Список созданных категорий',
			'table' => array(
				'name' => 'Название',
				'alias' => 'Alias',
				'date-create' => 'Дата создания',
				'date-content' => 'Дата контента',
				'view-content' => 'Вид контента',
				'actions' => 'Действия',
			),
			'btn-group' => array(
				'title' => 'Action',
				'view' => 'View',
				'edit' => 'Edit',
				'delete' => 'Delete',
			),
			'null' => 'No Pages.'
		),
	),
	
	'create' => array(
		'navlist' => array(
			'title' => 'Создание категории',
		),
	),

	'edit' => array(
		'navlist' => array(
			'title' => 'Редактирование категории',
		),
	),

	'_form' => array(
		'title' => 'Редактирование категории',
		'input' => array(
			'alias' => 'Alias',
			'view-content' => array(
				'title' => 'Вид отображения контента:',
				'list' => 'Список (list)',
				'tile' => 'Плитка (tile)',
			),
			'date-content' => 'Отображать дату контента',
			'submit' => 'Сохранить',
		),
	),
);
