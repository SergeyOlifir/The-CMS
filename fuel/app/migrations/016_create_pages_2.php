<?php

namespace Fuel\Migrations;

class Create_pages_2
{
	public function up()
	{
		\DBUtil::create_table('pages', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'alias' => array('constraint' => 255, 'type' => 'varchar'),
			'publish_date' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('pages');
	}
}