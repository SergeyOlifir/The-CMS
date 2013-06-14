<?php

namespace Fuel\Migrations;

class Create_logotypes
{
	public function up()
	{
		\DBUtil::create_table('logos', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'origin' => array('constraint' => 255, 'type' => 'varchar'),
			'list' => array('constraint' => 255, 'type' => 'varchar'),
			'tile' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
		), array('id'));

		$contents = \Model_Content::find('all');
		$i = 0;
		foreach ($contents as $content) {
			\DB::insert('logos')
			->set(array(
				'origin' => $content->image,
				'list' => $content->image,
			    'tile' => $content->image,
			    'created_at' => $content->created_at,
			    'updated_at' => $content->updated_at,
			))->execute();
			$content->image = ++$i;
			$content->save();
		}

		\DBUtil::modify_fields('contents', array(
		    'image' => array('constraint' => 11, 'type' => 'int'),
		));
	}

	public function down()
	{
		\DBUtil::drop_table('logos');
	}
}