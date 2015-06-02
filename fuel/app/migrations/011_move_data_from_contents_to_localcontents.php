<?php

namespace Fuel\Migrations;

class Move_data_from_contents_to_localcontents
{
	public function up()
	{
		$contents = \Model_Content::find('all');
		foreach ($contents as $content) {
			\DB::insert('localcontents')
			->set(array(
				'content_id' => $content->id,
				'local_id' => 1,
			    'name' => $content->name,
			    'description' => $content->description,
			    'short_description' => $content->short_description,
			    'created_at' => $content->created_at,
			    'updated_at' => $content->updated_at,
			))->execute();
		}
		\DBUtil::drop_fields('contents', array(
			'name',
			'description',
			'short_description',
		));	
	}

	public function down()
	{
		\DBUtil::add_fields('contents', array(
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'description' => array('type' => 'text'),
			'short_description' => array('type' => 'text'),
		));
	}
}