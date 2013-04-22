<?php

namespace Fuel\Migrations;

class Create_local_content
{
	public function up()
	{
		\DBUtil::create_table('localcontents', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'content_id' => array('constraint' => 11, 'type' => 'int'),
			'local_id' => array('constraint' => 11, 'type' => 'int'),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'description' => array('type' => 'text'),
			'short_description' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('localcontents');
	}
}