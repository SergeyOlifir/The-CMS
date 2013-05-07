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
    
    public function action_view($alias = null) {
        !(isset($alias)) and Fuel\Core\Response::redirect('404');
        if($page = Model_Page::query()->where('alias', '=', $alias)->get_one()) {
            Controller_Application::$current_page = $page->alias;
            $this->template->content = $page->description;
        } else {
            Fuel\Core\Response::redirect('404');
        }
    }
}

?>
