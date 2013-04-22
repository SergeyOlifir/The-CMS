<?php
/**
 * Custom Theme helper class
 *
 * @author juise_man
 */
class TCTheme {
	
	public static $tempalte_dir;
	public static $temlate_main;

	public static function main_view() {
		self::$temlate_main = \Fuel\Core\Config::get("TCTheme.main_faile_name");
		self::$tempalte_dir = \Fuel\Core\Config::get("TCTheme.theme_folder");
		return "templates" . DS . self::$tempalte_dir . DS . self::$temlate_main;
	}
	
	public static function load_view($view, $data = null) {
		self::$temlate_main = \Fuel\Core\Config::get("TCTheme.main_faile_name");
		self::$tempalte_dir = \Fuel\Core\Config::get("TCTheme.theme_folder");
		if(isset($data)) {
			return \Fuel\Core\View::forge("templates" . DS . self::$tempalte_dir . DS . $view, $data);
		} else {
			return \Fuel\Core\View::forge("templates" . DS . self::$tempalte_dir . DS . $view);
		}
			
	}
	
	public static function render($view, $data = null) {
		self::$temlate_main = \Fuel\Core\Config::get("TCTheme.main_faile_name");
		self::$tempalte_dir = \Fuel\Core\Config::get("TCTheme.theme_folder");
		if(isset($data)) {
			return render("templates" . DS . self::$tempalte_dir . DS . $view, $data);
		} else {
			return render("templates" . DS . self::$tempalte_dir . DS . $view);
		}
	}
	
	public static function add_css($stylesheets, $attrs = array()) {
		self::$temlate_main = \Fuel\Core\Config::get("TCTheme.main_faile_name");
		self::$tempalte_dir = \Fuel\Core\Config::get("TCTheme.theme_folder");
		return \Fuel\Core\Asset::css("templates" . DS . self::$tempalte_dir . DS . $stylesheets, $attrs);
	}
	
	public static function add_js($javascripts, $attrs = array()) {
		self::$temlate_main = \Fuel\Core\Config::get("TCTheme.main_faile_name");
		self::$tempalte_dir = \Fuel\Core\Config::get("TCTheme.theme_folder");
		return \Fuel\Core\Asset::js("templates" . DS . self::$tempalte_dir . DS . $javascripts, $attrs);
	}

}

?>
