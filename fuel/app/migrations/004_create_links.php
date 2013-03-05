<?php

namespace Fuel\Migrations;

class Create_links
{
	public function up()
	{
		\DBUtil::create_table('links', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'description' => array('type' => 'text'),
			'image' => array('constraint' => 255, 'type' => 'varchar'),
			'page_id' => array('constraint' => 11, 'type' => 'int'),
			'weight' => array('constraint' => 11, 'type' => 'int'),
			'public' => array('type' => 'bool'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('links');
	}
}