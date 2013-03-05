<?php

class Controller_User_User extends Controller_Application {
		
	protected $auth;
	
	public function before() {
		parent::before();
		$this->auth = Auth::instance();
	}
	
	function action_create() {
		if(Input::post()) {
			Auth::create_user(Input::post('username'), Input::post('password'), Input::post('email'));
			Response::redirect('welcome/index');
		} else {
			$this->template->content = View::forge('user/create');
		}
	}
	
	function action_login() {
		if(Input::post()) {
			if ($this->auth->login()) { 
				Session::set_flash('notice', 'succses');       
			    Response::redirect('welcome/index');
			}
			
			Session::set_flash('notice', 'hui');
		} else {
			$this->template->content = View::forge('user/login');
		}
	}
	
	function  action_view() {
		$this->template->content = View::forge('user/view', array("email" => $this->auth->get_email()), false);
		//var_dump($this->auth->member(1));
	}
	
	function action_logout() {
		$this->auth->logout();
	}
}