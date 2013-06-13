<?php


class Controller_Home_Content extends Controller_Home {
	
	function before() {
		parent::before();
		//self::$current_page = 'content';
	}
			
	function action_index() {
		
		$count = Model_Content::find_with_translitions($this->lang_id)->count();

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
		Model_Content::find_with_translitions($this->lang_id);
		$pagination = Pagination::forge('pagination', $config);
			
		$content = Model_Content::find_with_translitions(1, $pagination->per_page, $pagination->offset);
		$this->template->content = TCTheme::load_view('content/index', array('content' => $content, 'pagination' => $pagination->render(), 'category' => ''));
	
	}
	
	function action_view($id = null) {
		!isset($id) and Fuel\Core\Response::redirect('/');
		if($content = Model_Content::find($id)) {
			$this->template->content = TCTheme::load_view('content/view', array('content' => $content));
		} else {
			Fuel\Core\Response::redirect('/');
		}
	}
			
	function action_change($view = null, $category = null) {
		!isset($view) and Fuel\Core\Response::redirect('home/content');
		if ($view === 'tile') {
			\Fuel\Core\Session::set('tile', true);
		} else {
			\Fuel\Core\Session::delete('tile');
		}
		if(isset($category)) {
			Fuel\Core\Response::redirect("home/pages/view/{$category}");
		}
		Fuel\Core\Response::redirect("home/content");
	}
}

?>
