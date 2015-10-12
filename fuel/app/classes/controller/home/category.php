<?php

class Controller_Home_Category extends Controller_Home {
	function action_view($category_alias = null) {
		!isset($category_alias) and Response::redirect('home/content');
		
		$count = Model_Content::find_with_translitions_related_to_category($this->lang_id, $category_alias)->count();
		$category = Model_Category::query()->where('alias', "=", $category_alias)->get_one();
		$base_url = \Uri::base(false) . 'home/category/view/' . $category_alias;
                $per_page = 12;
		$config = array(
		    'pagination_url' => $base_url,
		    'total_items'    => $count,
		    'per_page'       => $per_page,
		    'uri_segment'    => 'page',
		    'template' => array(
                        'wrapper_start' => '<div class="pagination"> ',
                        'wrapper_end' => ' </div>', 
                        'previous-inactive-link' => '<a href="{uri}"> Prev </a>',
                        'next-link' => '\t\t<a href="{uri}"> i </a>\n',
                        'previous-inactive' => '<span class="previous-inactive">\n\t{link}\n</span>\n',
                    ),
		);

		$pagination = Pagination::forge('pagination', $config);
			
		$content = Model_Content::find_with_translitions_related_to_category($this->lang_id, $category_alias, $pagination->per_page, $pagination->offset);
		
                $this->template->content = TCTheme::load_view('category/view', array('content' => $content, 
                    'pagination' => $pagination->render(), 
                    'category' => $category, 
                    'total' => (round($count / $per_page)) ? round($count / $per_page) : 1
                ));		
	}
        
        function action_change($view = null, $page = null) {
            
            !isset($view) and Fuel\Core\Response::redirect('home/content');
            if ($view === 'tile') {
                    \Fuel\Core\Session::set('tile', true);
            } else {
                    \Fuel\Core\Session::delete('tile');
            }
            if(isset($page)) {
                    Fuel\Core\Response::redirect("home/category/view/{$page}");
            }
            Fuel\Core\Response::redirect("home/content");
    }
}

?>
