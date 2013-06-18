<?php

namespace Fuel\Migrations;

class Add_size_logo_thumb
{
	function up()
	{
		\DBUtil::add_fields('logos', array(
			'thumb' => array('constraint' => 255, 'type' => 'varchar'),
		));
		$logos = \Model_Logo::find('all');
		foreach ($logos as $logo) {
			$query = \DB::update('logos')->where('id', '=', $logo->id)->value('thumb', $logo->origin)->execute();
		}

	}

	function down()
	{
		\DBUtil::drop_fields('logos', 'thumb');
	}
}