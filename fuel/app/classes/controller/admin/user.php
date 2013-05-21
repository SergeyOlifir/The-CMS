<?php

class Controller_Admin_User extends Controller_Admin {

	public function before() {
		parent::before();
		Controller_Application::$current_page = "users";
    }

    function action_index() {
		$users = Model_User::find('all');
		$this->template->content = View::forge('admin/user/index', array('users' => $users), false);
    }
	    
    function  action_view() {
		$this->template->content = View::forge('user/view', array("email" => $this->auth->get_email()), false);
    }
    
    function action_delete($id = null) {
		!isset($id) and \Fuel\Core\Response::redirect('admin/user/index');
		if($model = Model_User::find($id)) {
		    $model->delete();
		    $this->SetNotice('success', 'Deleted user #' . $id);
	}
	
	\Fuel\Core\Response::redirect('admin/user/index');
    }
    
    function action_group($id = null, $group = null) {
		!isset($id) and \Fuel\Core\Response::redirect('admin/user/index');
		if($model = Model_User::find($id) and isset($group)) {
		    $model->group = $group;
		    $model->save();
	}
	
		\Fuel\Core\Response::redirect('admin/user/index');
	    }
	
}