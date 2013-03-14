<?php
/**
 * Description of page
 *
 * @author juise_man
 */
class Controller_Home_Page extends Controller_Homerest {
	
	function get_List($pageId = null) {
		try {
			$result_content = Cache::get('list' . $pageId);
		} catch (\CacheNotFoundException $e) {
			is_null($pageId) and $this->response(array('data' => "", 'popup' => ""), 404);
			$page = Model_Page::find($pageId);
			$result_content = View::forge("templates/{$this->template}/pages/list", array('page' => $page))->render();
			Cache::set('list' . $pageId, $result_content, 3600 * 3);
		}
		$this->response(array('data' => $result_content), 200);
	}
	
	public function get_tiles($pageId = null) {
		try {
			$result_content = Cache::get('tile' . $pageId);
		} catch (\CacheNotFoundException $e) {
			is_null($pageId) and $this->response(array('data' => "", 'popup' => ""), 404);
			$page = Model_Page::find($pageId);
			$result_content = View::forge("templates/{$this->template}/pages/tile", array('page' => $page))->render();
			Cache::set('tile' . $pageId, $result_content, 3600 * 3);
		}
		$this->response(array('data' => $result_content), 200);
	}
	
	public function get_popup($content_id = null) {
		try {
			$result_popup = Cache::get('popup' . $content_id);
		} catch (\CacheNotFoundException $e) {
			is_null($content_id) and $this->response(array('data' => "", 'popup' => ""), 404);
			$content = Model_Content::find($content_id);
			$result_popup = View::forge("templates/{$this->template}/pages/popup", array('content' => $content))->render();
			Cache::set('popup' . $content_id, $result_popup, 3600 * 3);
		}
		$this->response(array('data' => $result_popup), 200);
	}

}

?>
