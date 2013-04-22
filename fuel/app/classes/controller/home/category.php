<?php

class Controller_Home_Category extends Controller_Home {
	function action_view($category_alias = null) {
		!isset($category_alias) and Response::redirect('home/content');
		$count = \Fuel\Core\DB::select()->from('contents')
					->join('pages')
					->on('contents.page_id', '=', 'pages.id')
					->where('pages.alias', '=', $category_alias)
					->select('contents.id', 'contents.name', 'contents.description', 'contents.short_description', 'contents.image', 'contents.page_id', 'contents.created_at', 'contents.updated_at', 'contents.date_create')
					//->select(array_keys(Model_Content::properties()))
					->as_object('Model_Content')
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
			
		$content = DB::select()->from('contents')
						->join('pages')
						->on('contents.page_id', '=', 'pages.id')
						->where('pages.alias', '=', $category_alias)
						->select('contents.id', 'contents.name', 'contents.description', 'contents.short_description', 'contents.image', 'contents.page_id', 'contents.created_at', 'contents.updated_at', 'contents.date_create')
						->order_by('date_create', 'desc')
						->limit($pagination->per_page)
						->offset($pagination->offset)
						->as_object('Model_Content')
						->execute();
		//$this->template->content = \Fuel\Core\View::forge("templates/{$this::$template_name}/content/index",array('content' => $content, 'pagination' => $pagination->render(), 'category' => $category_alias));
		$this->template->content = TCTheme::load_view('content/index', array('content' => $content, 'pagination' => $pagination->render(), 'category' => $category_alias));
				
	}
}

?>
