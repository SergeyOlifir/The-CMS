<?php

class Controller_Home_Category extends Controller_Home {
	function action_view($category_alias = null) {
		!isset($category_alias) and Response::redirect('home/content');
		
		$count = Model_Content::find_with_translitions_related_to_category($this->lang_id, $category_alias)->count();
		
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
			
		$content = Model_Content::find_with_translitions_related_to_category($this->lang_id, $category_alias, $pagination->per_page, $pagination->offset);
		//$this->template->content = \Fuel\Core\View::forge("templates/{$this::$template_name}/content/index",array('content' => $content, 'pagination' => $pagination->render(), 'category' => $category_alias));
		$this->template->content = TCTheme::load_view('content/index', array('content' => $content, 'pagination' => $pagination->render(), 'category' => $category_alias));
				
	}
}

?>
