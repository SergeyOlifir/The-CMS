<?php

namespace Fuel\Migrations;

class Add_weight_pages
{
	function up()
	{
		\DBUtil::add_fields('pages', array(
			'weight' => array('constraint' => 11, 'type' => 'int'),
		));
	}

	function down()
	{
		\DBUtil::drop_fields('pages', 'weight');
	}
}