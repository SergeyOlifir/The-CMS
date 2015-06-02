<?php

namespace Fuel\Migrations;

class Add_Page_Uri_To_Links
{
	public function up()
	{
		\DBUtil::add_fields('links', array(
			'uri' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
		));
	}
	public function down()
	{
		\DBUtil::drop_fields('links', 'uri');
	}
}
