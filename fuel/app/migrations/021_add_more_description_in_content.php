<?php

namespace Fuel\Migrations;

class Add_more_description_in_content
{
	function up()
	{
		\DBUtil::add_fields('localcontents', array(
			'more_description' => array('type' => 'text'),
		));
	}

	function down()
	{
		\DBUtil::drop_fields('localcontents', 'more_description');
	}
}