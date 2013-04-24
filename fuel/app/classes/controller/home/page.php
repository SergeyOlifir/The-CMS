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

		Session::get('lang') ? ($curr_lang = Session::get('lang')) : ($curr_lang = Config::get('language'));
		$curr_lang_id = Model_Local::query()->where('name', '=', $curr_lang)->get_one()->id;

		$config = array(
		    'pagination_url' => $base_url,
		    'total_items'    => DB::select()
		    					->from('contents')
		    					->where('page_id', '=', $pageId)
		    					->join('localcontents')
		    					->on('contents.id', '=', 'localcontents.content_id')
		    					->where('local_id', '=', $curr_lang_id)
		    					->cached(3600)
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
							->join('localcontents')
		    				->on('contents.id', '=', 'localcontents.content_id')
		    				->where('local_id', '=', $curr_lang_id)
                            ->limit($pagination->per_page)
                            ->offset($pagination->offset)
                            ->cached(3600)
                            ->execute()
                            ->as_array();
        
		$data['public_data'] = Model_Category::find($pageId)->public_data;

		$result_content = View::forge("templates/{$this->template}/pages/list", $data)->render();
		$this->response(array('data' => $result_content), 200); 
	}
	
	public function get_tile($pageId = null) {
		is_null($pageId) and $this->response(array('data' => "", 'popup' => ""), 404);

		$base_url = \Uri::base(false) . 'home/page/tile/' . $pageId;

		Session::get('lang') ? ($curr_lang = Session::get('lang')) : ($curr_lang = Config::get('language'));
		$curr_lang_id = Model_Local::query()->where('name', '=', $curr_lang)->get_one()->id;

		$config = array(
		    'pagination_url' => $base_url,
		    'total_items'    => DB::select()
		    					->from('contents')
		    					->where('page_id', '=', $pageId)
		    					->join('localcontents')
		    					->on('contents.id', '=', 'localcontents.content_id')
		    					->where('local_id', '=', $curr_lang_id)
		    					->cached(3600)
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
							->join('localcontents')
		    				->on('contents.id', '=', 'localcontents.content_id')
		    				->where('local_id', '=', $curr_lang_id)
                            ->limit($pagination->per_page)
                            ->offset($pagination->offset)
                            ->cached(3600)
                            ->execute()
                            ->as_array();
        
		$data['public_data'] = Model_Category::find($pageId)->public_data;

		$result_content = View::forge("templates/{$this->template}/pages/tile", $data)->render();
		$this->response(array('data' => $result_content), 200);
	}
	
	public function get_popup($content_id = null) {
		is_null($content_id) and $this->response(array('data' => "", 'popup' => ""), 404);
		
		Session::get('lang') ? ($curr_lang = Session::get('lang')) : ($curr_lang = Config::get('language'));
		$curr_lang_id = Model_Local::query()->where('name', '=', $curr_lang)->get_one()->id;
		
		$content = Model_Content::find($content_id);
		$localcontent = Model_Localcontent::query()
						->where('content_id', '=', $content_id)
						->where('local_id', '=', $curr_lang_id)
						->get_one();

		$result_popup = View::forge("templates/{$this->template}/pages/popup", array(
			'content' => $content,
			'localcontent' => $localcontent,
		))->render();
		$this->response(array('data' => $result_popup), 200);
	}

}

?>
