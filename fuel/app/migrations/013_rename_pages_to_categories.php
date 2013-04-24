<?php
namespace Fuel\Migrations;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of 013_rename_pages_to_categories
 *
 * @author juise_man
 */
class Rename_Pages_To_Categories {
	public function up()
	{
		\Fuel\Core\DBUtil::rename_table('pages', 'categories');
	}

	public function down()
	{
		\Fuel\Core\DBUtil::rename_table('categories', 'pages');
	}
}

?>
