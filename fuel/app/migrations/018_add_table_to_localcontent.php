<?php

namespace Fuel\Migrations;

class Add_Table_To_Localcontent
{
	public function up()
	{
		\DBUtil::add_fields('localcontents', array(
			'table' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
		));
	}
	public function down()
	{
		\DBUtil::drop_fields('localcontents', 'table');
	}
}
