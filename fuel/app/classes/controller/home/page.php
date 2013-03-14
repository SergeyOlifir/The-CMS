<?php
/**
 * Description of page
 *
 * @author juise_man
 */
class Controller_Home_Page extends Controller_Homerest {
	
	function get_List($pageId = null) {
		is_null($pageId) and $this->response(array('data' => "", 'popup' => ""), 404);
		$page = Model_Page::find($pageId);
		$result_content = View::forge("templates/{$this->template}/pages/list", array('page' => $page))->render();
		$result_popup = "";//View::forge("templates/{$this->template}/pages/popup", array('page' => $page))->render();
		$this->response(array('data' => $result_content, 'popup' => $result_popup), 200);
	}
	
	public function get_tiles($pageId = null) {
		is_null($pageId) and $this->response(array('data' => "", 'popup' => ""), 404);
		$page = Model_Page::find($pageId);
		$result_content = View::forge("templates/{$this->template}/pages/tile", array('page' => $page))->render();
		$result_popup = "";//View::forge("templates/{$this->template}/pages/popup", array('page' => $page))->render();
		$this->response(array('data' => $result_content, 'popup' => $result_popup), 200);
	}
	
	public function get_popup($content_id = null) {
		is_null($content_id) and $this->response(array('data' => "", 'popup' => ""), 404);
		$content = Model_Content::find($content_id);
		$result_popup = View::forge("templates/{$this->template}/pages/popup", array('content' => $content))->render();
		$this->response(array('data' => $result_popup), 200);
	}

}

?>
