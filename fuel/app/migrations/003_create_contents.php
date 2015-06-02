<?php

namespace Fuel\Migrations;

class Create_contents
{
	public function up()
	{
		\DBUtil::create_table('contents', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'description' => array('type' => 'text'),
			'short_description' => array('type' => 'text'),
			'image' => array('constraint' => 255, 'type' => 'varchar'),
			'page_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('contents');
	}
}