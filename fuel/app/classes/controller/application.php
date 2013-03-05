<?php

class Controller_Application extends Controller_Template {
	public $template = 'admin';
	protected $auth;
	public static $current_page = "";
		public function before() {
			parent::before();
			$this->template->title = "CMS";//Config::get('settings.site_name');
			$this->auth = Auth::instance();
		}
	
		protected function set_page_title($page_title = null) {
			$site_name = Config::get('settings.site_name');
			$this->template->title = $page_title ? "{$page_title} - {$site_name}" : $site_name;
		}
	
		protected function register_css($stylesheets, $attrs = array()) {
			Asset::css($stylesheets, $attrs, 'stylesheets');
		}
	
		protected function register_js($javascripts, $attrs = array()) {
			Asset::js($javascripts, $attrs, 'javascripts');
		}
		
		protected function SetNotice($notiseType, $notiseText) {
			Session::set_flash('notice_type', $notiseType);
			Session::set_flash('notice', $notiseText);
		}
}