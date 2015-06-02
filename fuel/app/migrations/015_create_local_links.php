<?php

namespace Fuel\Migrations;

class Create_local_links
{
	public function up()
	{
		\DBUtil::create_table('locallinks', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'link_id' => array('constraint' => 11, 'type' => 'int'),
			'local_id' => array('constraint' => 11, 'type' => 'int'),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'description' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
		), array('id'));

		/*$links = \Model_Link::find('all');
		foreach ($links as $link) {
			$locallink = \Model_Locallink::forge(
				array(
					'link_id' => $link->id,
					'local_id' => 1,
					'name' => $link->name,
					'description' => $link->description,
			    	'created_at' => $link->created_at,
			    	'updated_at' => $link->updated_at,
				)
			);
			$locallink->save();
		}

		\DBUtil::drop_fields('links', array(
			'name',
			'description',
		));*/	
	}

	public function down()
	{
		\DBUtil::drop_table('locallinks');

		/*\DBUtil::add_fields('links', array(
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'description' => array('type' => 'text'),
		));*/
                
	}
}