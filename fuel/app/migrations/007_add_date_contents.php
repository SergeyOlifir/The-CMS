<?php

namespace Fuel\Migrations;

class Add_date_contents
{
	function up()
	{
		\DBUtil::add_fields('contents', array(
			'date_create' => array('constraint' => 11, 'type' => 'int', 'null' => true),
		));
	}

	function down()
	{
		\DBUtil::drop_fields('contents', 'date_create');
	}
}