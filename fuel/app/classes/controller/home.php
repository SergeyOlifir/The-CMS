<?php
/**
 * Description of home
 *
 * @author juise_man
 */
class Controller_Home extends Controller_Application {
	
	function before() {
		$this->template = TCTheme::main_view();
		parent::before();
	}
			
	function action_index() {
            self::$current_page = "Home";
            $content = \Model_Category::find('all');
	    	$this->template->content = TCTheme::load_view('home/partials/gallery');
            $this->template->content .= \Fuel\Core\View::forge("templates/{$this::$template_name}/home/partials/categories",array('content' => $content));
	}
}

?>
