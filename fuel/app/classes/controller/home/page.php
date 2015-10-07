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
		    'per_page'       => 20,
		    'uri_segment'    => 'page',
		    'template' => array(
            	'wrapper_start' => '<div class="pagination"> ',
            	'wrapper_end' => ' </div>', 
            ),
		);

		$pagination = Pagination::forge('pagination', $config);


        
		$data['public_data'] = Model_Category::find($pageId)->public_data;
		$category_alias = Model_Category::find($pageId)->alias;
		$data['contents'] = Model_Content::find_with_translitions_related_to_category($curr_lang_id, $category_alias, $pagination->per_page, $pagination->offset);
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
        
		$data['public_data'] = Model_Category::find($pageId)->public_data;
		$category_alias = Model_Category::find($pageId)->alias;
		$data['contents'] = Model_Content::find_with_translitions_related_to_category($curr_lang_id, $category_alias, $pagination->per_page, $pagination->offset);

		$result_content = View::forge("templates/{$this->template}/pages/tile", $data)->render();
		$this->response(array('data' => $result_content), 200);
	}
	
	public function get_popup($content_id = null) {
		is_null($content_id) and $this->response(array('data' => "", 'popup' => ""), 404);
		$curr_lang_id = TCLocale::get_current_leng_id();
		$content = Model_Content::find($content_id);
		$result_popup = TCTheme::load_view("content/popup", array('content' => $content))->render();
		$this->response(array('data' => $result_popup), 200);
	}

	public function get_view($alias = null, $view = null) {
        !(isset($alias)) and $this->response(array('data' => "", 'popup' => ""), 404);
        $page = Model_Page::query()->where('alias', '=', $alias)->get_one();
        $count = $page->content->count();

        $base_url = \Uri::base(false) . 'home/page/view/' . $alias;
        $config = array(
            'pagination_url' => $base_url,
            'total_items'    => $count,
            'per_page'       => $view == 'tile' ? 15 : 6,
            'uri_segment'    => 'page',
            'template' => array(
                'wrapper_start' => '<div class="pagination"> ',
                'wrapper_end' => ' </div>', 
                'previous-inactive-link' => '<a href="{uri}"> Prev </a>',
                'next-link' => '\t\t<a href="{uri}"> hui </a>\n',
                'previous-inactive' => '<span class="previous-inactive hui">\n\t{link}\n</span>\n',
            ),
        );   

        $pagination = Pagination::forge('pagination', $config);

        $data['content'] = $page->get_content($pagination->per_page, $pagination->offset);
        $data['page'] = $page;
        $data['view'] = $view;

        $result_content = TCTheme::load_view("page/view", $data)->render();
    	$this->response(array('data' => $result_content), 200);
    }

}

?>
