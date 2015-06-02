<?php

namespace Fuel\Migrations;

class Create_locals
{
	public function up()
	{
		\DBUtil::create_table('locals', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));

		$locals = \Model_Local::forge(
			array('name' => 'ru')
		);
		$locals->save();

		$locals = \Model_Local::forge(
			array('name' => 'uk')
		);
		$locals->save();

		$locals = \Model_Local::forge(
			array('name' => 'en')
		);
		$locals->save();
		
		$locals = \Model_Local::forge(
			array('name' => 'de')
		);
		$locals->save();
	}

	public function down()
	{
		\DBUtil::drop_table('locals');
	}
}