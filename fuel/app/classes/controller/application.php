<?php

class Controller_Application extends Controller_Template {
	public $template = 'admin';
	public static $template_name = "The42Template";
	protected $auth;
	public static $current_page = "";
		public function before() {
			parent::before();
			$this->template->title = Config::get('settings.site_name'); //"CMS";
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