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
    
    public function action_view($alias = null, $view = null) {
        /*!(isset($alias)) and Fuel\Core\Response::redirect('404');
        if($page = Model_Page::query()->where('alias', '=', $alias)->get_one()) {
            //Controller_Application::$current_page = $page->alias;
	    //var_dump($page->content); die();
            //$this->template->content = $page->description;
	    $this->template->content = TCTheme::load_view('page/view', array('page' => $page));
        } else {
            Fuel\Core\Response::redirect('404');
        }
    }*/

        !(isset($alias)) and Fuel\Core\Response::redirect('404');
        $page = Model_Page::query()->where('alias', '=', $alias)->get_one();
        $count = $page->content->count();

        $base_url = \Uri::base(false) . 'home/pages/view/' . $alias;
        $config = array(
            'pagination_url' => $base_url,
            'total_items'    => $count,
            'per_page'       => $view == 'tile' ? 18 : 6,
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

        $content = $page->get_content($pagination->per_page, $pagination->offset);
        
        $this->template->content = TCTheme::load_view('page/view', array('content' => $content, 'pagination' => $pagination->render(), 'page' => $page, 'view' => $view));
    }
}

?>
