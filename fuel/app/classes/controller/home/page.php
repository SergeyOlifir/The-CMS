<?php
/**
 * Description of page
 *
 * @author juise_man
 */
class Controller_Home_Page extends Controller_Homerest {
	
	function get_List($pageId = null) {
		is_null($pageId) and $this->response(array('data' => "", 'popup' => ""), 404);

		$base_url = \Uri::base(false) . 'home/page/list/' . $pageId;

		$config = array(
		    'pagination_url' => $base_url,
		    'total_items'    => DB::select()
		    					->from('contents')
		    					->where('page_id', '=', $pageId)
		    					->execute()
		    					->count(),
		    'per_page'       => 6,
		    'uri_segment'    => 'page',
		    'template' => array(
            	'wrapper_start' => '<div class="pagination"> ',
            	'wrapper_end' => ' </div>', 
            ),
		);

		$pagination = Pagination::forge('pagination', $config);

		$data['contents'] = DB::select()
							->from('contents')
							->where('page_id', '=', $pageId)
							->order_by('date_create', 'desc')
                            ->limit($pagination->per_page)
                            ->offset($pagination->offset)
                            ->execute()
                            ->as_array();
        
		$data['public_data'] = Model_Page::find($pageId)->public_data;

		$result_content = View::forge("templates/{$this->template}/pages/list", $data)->render();
		$this->response(array('data' => $result_content), 200);

		/*try {
			$result_content = Cache::get('list' . $pageId);
		} catch (\CacheNotFoundException $e) {
			is_null($pageId) and $this->response(array('data' => "", 'popup' => ""), 404);
			$page = Model_Page::find($pageId);
			$result_content = View::forge("templates/{$this->template}/pages/list", array('page' => $page))->render();
			Cache::set('list' . $pageId, $result_content, 3600 * 3);
		}
		$this->response(array('data' => $result_content), 200);*/
	}
	
	public function get_tile($pageId = null) {
		is_null($pageId) and $this->response(array('data' => "", 'popup' => ""), 404);

		$base_url = \Uri::base(false) . 'home/page/tile/' . $pageId;

		$config = array(
		    'pagination_url' => $base_url,
		    'total_items'    => DB::select()
		    					->from('contents')
		    					->where('page_id', '=', $pageId)
		    					->execute()
		    					->count(),
		    'per_page'       => 15,
		    'uri_segment'    => 'page',
		    'template' => array(
            	'wrapper_start' => '<div class="pagination"> ',
            	'wrapper_end' => ' </div>', 
            ),
		);

		$pagination = Pagination::forge('pagination', $config);

		$data['contents'] = DB::select()
							->from('contents')
							->where('page_id', '=', $pageId)
							->order_by('date_create', 'desc')
                            ->limit($pagination->per_page)
                            ->offset($pagination->offset)
                            ->execute()
                            ->as_array();
        
		$data['public_data'] = Model_Page::find($pageId)->public_data;

		$result_content = View::forge("templates/{$this->template}/pages/tile", $data)->render();
		$this->response(array('data' => $result_content), 200);

		/*try {
			$result_content = Cache::get('tile' . $pageId);
		} catch (\CacheNotFoundException $e) {
			is_null($pageId) and $this->response(array('data' => "", 'popup' => ""), 404);
			$page = Model_Page::find($pageId);
			$result_content = View::forge("templates/{$this->template}/pages/tile", array('page' => $page))->render();
			Cache::set('tile' . $pageId, $result_content, 3600 * 3);
		}
		$this->response(array('data' => $result_content), 200);*/
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
