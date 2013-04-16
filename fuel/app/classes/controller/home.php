<?php
/**
 * Description of home
 *
 * @author juise_man
 */
class Controller_Home extends Controller_Application {
	public $template = 'The42Template';
	
	function action_index() {
		self::$current_page = "Home";
	}
}

?>
