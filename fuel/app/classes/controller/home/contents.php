<?php


class Controller_Home_Contents extends Controller_Homerest {
				
	function get_change($view = null, $category = null) {
		!isset($view) and $this->response(array('data' => "", 'popup' => ""), 404);
		if ($view === 'tile') {
			\Fuel\Core\Session::set('tile', true);
		} else {
			\Fuel\Core\Session::delete('tile');
		}
		if(isset($category)) {
			$result_content = \Fuel\Core\Response::redirect("home/page/view/{$category}/{$view}");
    		$this->response(array('data' => $result_content), 200);
		}
		\Fuel\Core\Response::redirect("home/content");

	}
}

?>
