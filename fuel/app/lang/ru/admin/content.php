<?php

return array(
	'index' => array(
		'navlist' => array(
			'list' => 'Cписок контета',
			'add' => 'Добавить контент',
		),
		'page-list' => array(
			'title' => 'Список контента страницы',
			'null' => 'Контента здесь пока нет. Но это дело поправимое',
		),
	),

	'create' => array(
		'title' => 'Cоздание нового контента',
	),

	'edit' => array(
		'navlist' => array(
			'edit' => 'Редактирование контета',
			'related' => 'Связанный контент',
			'galery' => 'Галерея',
		),
		'relations' => array(
			'title' => 'Связанный контент',
			'content' => array(
				'navbtn' => array(
					'edit' => 'Редактировать',
					'delete' => 'Удалить',
				),
			),
			'navbtn' => array(
				'add' => 'Добавить связанный контент',
			),
			'add-content' => array(
				'navlist' => array(
					'name' => 'Название',
					'page' => 'Страница',
				),
				'navbtn' => array(
					'submit' => 'Сохранить',
				),
			),
		),
		'gallery' => array(
			'title' => 'Галерея',
			'null' => 'Галерея пока пуста. Для добавления картинок нажмите кнопку добавить',
			'content' => array(
				'navbtn' => array(
					'zoom' => 'Увеличить',
					'delete' => 'Удалить',
				),
			),
			'input' => 'Загрузить изображение',
			'submit' => 'Загрузить',
		),
 	),

	'view' => array(
		'title' => 'Viewing',
		'name' => 'Name:',
		'description' => 'Description:',
		'short-description' => 'Short description:',
		'image' => 'Image:',
		'page-id' => 'Page id:',
		'date' => 'Date:',
		'navbtn' => array(
			'edit' => 'Edit',
			'back' => 'Back',
		),
	),

	'_form' => array(
		'title' => 'Редактирование контента',
		'input' => array(
			'image' => 'Изображение',
			'date-create' => 'Дата создания',
			'submit' => 'Сохранить',
		),
	),
);