<?php
class Controller_Lang extends Controller_Application {

	public function action_index ($lang = null) {
		!isset($lang) and Response::redirect('/');
		if(isset($lang)) {	
			Session::set('lang', $lang);
			$this->template->content = Response::redirect('/');	 	
		} else {
			Response::redirect('/');
		}		

	}
}
