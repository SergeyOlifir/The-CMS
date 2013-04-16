<?php
class Controller_Portfolio_Project extends Controller_Home {
	function before() {
		parent::before();
		self::$current_page = "Portfolio";
	}
	
	function action_view($id = null) {
		!isset($id) and Fuel\Core\Response::redirect('portfolio');
	}
}

?>
