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
		$curr_lang_id = TCLocale::get_current_leng_id();
		
		$config = array(
		    'pagination_url' => $base_url,
		    'total_items'    => Model_Page::find($pageId)->get_count_content($curr_lang_id),
		    'per_page'       => 6,
		    'uri_segment'    => 'page',
		    'template' => array(
            	'wrapper_start' => '<div class="pagination"> ',
            	'wrapper_end' => ' </div>', 
            ),
		);

		$pagination = Pagination::forge('pagination', $config);

		$category_alias = Model_Page::find($pageId)->alias;
		$data['contents'] = Model_Content::find_with_translitions_related_to_category($curr_lang_id, $category_alias, $pagination->per_page, $pagination->offset);
		$data['public_data'] = Model_Page::find($pageId)->public_data;

		$result_content = View::forge("templates/{$this->template}/pages/list", $data)->render();
		$this->response(array('data' => $result_content), 200); 
	}
	
	public function get_tile($pageId = null) {
		is_null($pageId) and $this->response(array('data' => "", 'popup' => ""), 404);
		$base_url = \Uri::base(false) . 'home/page/tile/' . $pageId;
		$curr_lang_id = TCLocale::get_current_leng_id();

		$config = array(
		    'pagination_url' => $base_url,
		    'total_items'    => Model_Page::find($pageId)->get_count_content($curr_lang_id),
		    'per_page'       => 15,
		    'uri_segment'    => 'page',
		    'template' => array(
            	'wrapper_start' => '<div class="pagination"> ',
            	'wrapper_end' => ' </div>', 
            ),
		);

		$pagination = Pagination::forge('pagination', $config);

		$category_alias = Model_Page::find($pageId)->alias;
		$data['contents'] = Model_Content::find_with_translitions_related_to_category($curr_lang_id, $category_alias, $pagination->per_page, $pagination->offset);
		$data['public_data'] = Model_Page::find($pageId)->public_data;

		$result_content = View::forge("templates/{$this->template}/pages/tile", $data)->render();
		$this->response(array('data' => $result_content), 200);
	}
	
	public function get_popup($content_id = null) {
		is_null($content_id) and $this->response(array('data' => "", 'popup' => ""), 404);
		$curr_lang_id = TCLocale::get_current_leng_id();
		$content = Model_Content::find($content_id);
		$result_popup = View::forge("templates/{$this->template}/pages/popup", array('content' => $content))->render();
		$this->response(array('data' => $result_popup), 200);
	}

}

?>
