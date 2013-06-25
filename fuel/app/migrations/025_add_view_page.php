<?php

namespace Fuel\Migrations;

class Add_view_page
{
	function up()
	{
		\DBUtil::add_fields('pages', array(
			'view_content' => array('constraint' => 255, 'type' => 'varchar'),
		));
		\DBUtil::drop_fields('categories', 'view_content');
	}

	function down()
	{
		\DBUtil::drop_fields('pages', 'view_content');
	}
}