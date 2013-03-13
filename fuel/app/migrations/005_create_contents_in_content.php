<?php
namespace Fuel\Migrations;
class create_contents_in_content {
	function up()
	{
		\DBUtil::create_table("contents_in_content", array(
			'content_id' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => false, 'null' => false),
			'related_content_id' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => false, 'null' => false),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
		), array('content_id', 'related_content_id'));

	}

	function down()
	{
		\DBUtil::drop_table('contents_in_content');
	}
}

?>
