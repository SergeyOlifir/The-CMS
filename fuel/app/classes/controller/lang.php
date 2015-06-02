<?php
class Controller_Lang extends Controller_Application {

	public function action_index ($lang = null) {
		!isset($lang) and Response::redirect('/');
		TCLocale::set_locale_from_name($lang);
		\Fuel\Core\Response::redirect('/');

	}
}
