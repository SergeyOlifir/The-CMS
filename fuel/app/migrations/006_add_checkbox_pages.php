<?php

namespace Fuel\Migrations;

class Add_checkbox_pages
{
	function up()
	{
		\DBUtil::add_fields('pages', array(
			'public_data' => array('type' => 'bool'),
		));
	}

	function down()
	{
		\DBUtil::drop_fields('pages', 'public_data');
	}
}