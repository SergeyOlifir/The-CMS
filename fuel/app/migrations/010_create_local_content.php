<?php

namespace Fuel\Migrations;

class Create_local_content
{
	public function up()
	{
		\DBUtil::create_table('localcontents', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'content_id' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'local_id' => array('constraint' => 11, 'type' => 'int'),
			'name' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'description' => array('type' => 'text', 'null' => true),
			'short_description' => array('type' => 'text', 'null' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true, 'null'),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true, 'null'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('localcontents');
	}
}
