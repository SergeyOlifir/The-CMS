<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of administration
 *
 * @author juise_man
 */
class Controller_Administration extends Controller_Admin {
	public function before() {
        parent::before(); 
		if(!$this->check_admin()) {
			Fuel\Core\Response::redirect("admin/index");
		}
    }
}

?>
