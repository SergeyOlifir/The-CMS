<?php
class Controller_Admin extends Controller_Application {
	public $template = 'admin';
	
	function check_admin() {
		return $this->auth->member(6);
	}
	
	function action_index () {
		if ($this->check_admin() || (Input::post() && $this->auth->login() && $this->check_admin())) {
		    $this->template->content = View::forge("admin/index");	
		} else {
		    $this->register_css("admin_login.css");
		    $this->register_js("admin-login.js");
		    $this->template->content = View::forge("admin/login");
		}
	}
	
}

