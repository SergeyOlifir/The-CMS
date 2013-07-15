<?php

namespace Fuel\Migrations;

class Add_logo_field_to_categories
{
	function up()
	{
		\DBUtil::add_fields('categories', array(
			'image' => array('type' => 'int', 'null' => true),
		));

	}

	function down()
	{
		\DBUtil::drop_fields('categories', 'image');
	}
}
