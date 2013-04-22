<?php

namespace Fuel\Migrations;

class Create_galery
{
	public function up()
	{
		\DBUtil::create_table('images', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'origin' => array('constraint' => 255, 'type' => 'varchar'),
			'thumb' => array('constraint' => 255, 'type' => 'varchar'),
			'galery' => array('constraint' => 255, 'type' => 'varchar'),
			'full' => array('constraint' => 255, 'type' => 'varchar'),
			'owner_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('images');
	}
}