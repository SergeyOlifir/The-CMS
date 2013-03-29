<?php

namespace Fuel\Migrations;

class Add_view_pages
{
	function up()
	{
		\DBUtil::add_fields('pages', array(
			'view_content' => array('constraint' => 255, 'type' => 'varchar'),
		));
	}

	function down()
	{
		\DBUtil::drop_fields('pages', 'view_content');
	}
}