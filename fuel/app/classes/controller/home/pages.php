<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pages
 *
 * @author juise_man
 */
class Controller_Home_Pages extends Controller_Home {
    
    public function action_view($alias = null, $category_alias = null) {
        !(isset($alias)) and Fuel\Core\Response::redirect('404');
        
        $page = Model_Page::query()->where('alias', '=', $alias)->get_one();
        !$page and Fuel\Core\Response::redirect('404');
        
        $count = 0;
        $content = array();
        
        //$page = Model_Page::query()->where('alias', '=', $alias)->get_one();
        
        //if(!)
        
        if(isset($category_alias)) {
            if($category = Model_Category::query()->where('alias', "=", $category_alias)->get_one()) {
                $count = Model_Content::find_with_translitions_related_to_category($this->lang_id, $category_alias)->count();
            } else {
                Fuel\Core\Response::redirect('404');
            }
        } else {
            $count = $page->content->count();
        }
        //$page = Model_Page::query()->where('alias', '=', $alias)->get_one();
        
        $per_page = 12;

        $base_url = \Uri::base(false) . 'home/pages/view/' . $alias;
        $config = array(
            'pagination_url' => $base_url,
            'total_items'    => $count,
            'per_page'       => $per_page,//Fuel\Core\Session::get('tile') == 'tile' ? 15 : 15,
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

        $content = ($category_alias) ? Model_Content::find_with_translitions_related_to_category($this->lang_id, $category_alias, $pagination->per_page, $pagination->offset) : $page->get_content($pagination->per_page, $pagination->offset);
        
        $this->template->content = TCTheme::load_view('page/view', array(
            'content' => $content, 
            'pagination' => $pagination->render(), 
            'page' => $page, 
            'view' => '',
            'current_category_alias' => $category_alias,
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
                    Fuel\Core\Response::redirect("home/pages/view/{$page}");
            }
            Fuel\Core\Response::redirect("home/content");
    }
}

?>
