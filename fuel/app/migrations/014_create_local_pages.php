<?php

namespace Fuel\Migrations;

class Create_local_pages
{
	public function up()
	{
		\DBUtil::create_table('localpages', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'page_id' => array('constraint' => 11, 'type' => 'int'),
			'local_id' => array('constraint' => 11, 'type' => 'int'),
			'header' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
		), array('id'));

		$pages = \Model_Page::find('all');
		foreach ($pages as $page) {
			$localpage = \Model_Localpage::forge(
				array(
					'page_id' => $page->id,
					'local_id' => 1,
					'header' => $page->header,
			    	'created_at' => $page->created_at,
			    	'updated_at' => $page->updated_at,
				)
			);
			$localpage->save();
		}

		\DBUtil::drop_fields('pages', array(
			'header',
		));	
	}

	public function down()
	{
		\DBUtil::drop_table('localpages');

		\DBUtil::add_fields('pages', array(
			'header' => array('type' => 'text'),
		));
	}
}