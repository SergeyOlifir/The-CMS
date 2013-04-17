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
        $content = \Model_Page::find('all');

        $this->template->content = \Fuel\Core\View::forge("templates/{$this::$template_name}/home/partials/categories",array('content' => $content));

    }


    function define_gallery() {

    }

    function find_news() {

    }
}

?>
