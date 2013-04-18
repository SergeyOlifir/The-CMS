<?php


class Controller_Home_Content extends Controller_Home {
	
	function before() {
		parent::before();
		self::$current_page = 'content';
	}
			
	function action_index() {
		
		$count = DB::select()
							->from('contents')
							->as_object('Model_Content')
							->cached(3600)
							->execute()
							->count();

		$base_url = \Uri::base(false) . 'home/content';
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
			
		$content = DB::select()
						->from('contents')
						->order_by('date_create', 'desc')
						->limit($pagination->per_page)
						->offset($pagination->offset)
						->as_object('Model_Content')
						->cached(3600)
						->execute();
		
		//$this->template->content = \Fuel\Core\View::forge("templates/{$this::$template_name}/content/index",array('content' => $content, 'pagination' => $pagination->render(), 'category' => ''));
	
		$this->template->content = TCTheme::load_view('content/index', array('content' => $content, 'pagination' => $pagination->render(), 'category' => ''));
	}
	
	function action_change($view = null, $category = null) {
		!isset($view) and Fuel\Core\Response::redirect('home/content');
		if ($view === 'tile') {
			\Fuel\Core\Session::set('tile', true);
		} else {
			\Fuel\Core\Session::delete('tile');
		}
		if(isset($category)) {
			Fuel\Core\Response::redirect("home/category/view/{$category}");
		}
		Fuel\Core\Response::redirect("home/content");
	}
}

?>
