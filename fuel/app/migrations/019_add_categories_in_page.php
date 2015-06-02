<?php

namespace Fuel\Migrations;

class Add_Categories_In_Page
{
	public function up()
	{
		\DBUtil::create_table('categories_in_page', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'category_id' => array('constraint' => 11, 'type' => 'int'),
			'owner_id' => array('constraint' => 11, 'type' => 'int'),
			'weight' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}
	public function down()
	{
		\DBUtil::drop_table('categories_in_page');
	}
}
