<?php


class Controller_Portfolio extends Controller_Home {
	
	function before() {
		parent::before();
		self::$current_page = 'Portfolio';
	}
			
	function action_index($category = null) {
		$count = 0;
		$content = array();
		if(isset($category)) {
			$count = \Fuel\Core\DB::select()->from('contents')
								->join('pages')
								->on('contents.page_id', '=', 'pages.id')
								->where('pages.alias', '=', $category)
								->select('contents.id', 'contents.name', 'contents.description', 'contents.short_description', 'contents.image', 'contents.page_id', 'contents.created_at', 'contents.updated_at', 'contents.date_create')
								->as_object('Model_Content')
								->execute()
								->count();
		} else {
			$count = DB::select()
		    					->from('contents')
								->as_object('Model_Content')
								->cached(3600)
		    					->execute()
								->count();
		}
		$base_url = \Uri::base(false) . 'portfolio';
		$config = array(
		    'pagination_url' => $base_url,
		    'total_items'    => $count,
		    'per_page'       => \Fuel\Core\Session::get('tile') ? 18 : 6,
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
			
		if(isset($category)) {
			$content = \Fuel\Core\DB::select()->from('contents')
								->join('pages')
								->on('contents.page_id', '=', 'pages.id')
								->where('pages.alias', '=', $category)
								->select('contents.id', 'contents.name', 'contents.description', 'contents.short_description', 'contents.image', 'contents.page_id', 'contents.created_at', 'contents.updated_at', 'contents.date_create')
								->order_by('date_create', 'desc')
								->limit($pagination->per_page)
								->offset($pagination->offset)
								->as_object('Model_Content')
								->execute();
		} else {
			$content = DB::select()
							->from('contents')
							->order_by('date_create', 'desc')
                            ->limit($pagination->per_page)
                            ->offset($pagination->offset)
							->as_object('Model_Content')
							->cached(3600)
                            ->execute();
		}
		
		$this->template->content = \Fuel\Core\View::forge("templates/{$this::$template_name}/pages/portfolio",array('content' => $content, 'pagination' => $pagination->render(), 'category' => $category));
	}
	
	function action_change($view = null, $category = null) {
		!isset($view) and Fuel\Core\Response::redirect('portfolio');
		if ($view === 'tile') {
			\Fuel\Core\Session::set('tile', true);
		} else {
			\Fuel\Core\Session::delete('tile');
		}
		Fuel\Core\Response::redirect("portfolio/index/{$category}");
	}
}

?>
