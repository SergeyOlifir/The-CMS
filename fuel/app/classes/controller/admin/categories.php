<?php

class Controller_Admin_Categories extends Controller_Admin_Administration 
{
    public function before() {
		parent::before();
		Controller_Application::$current_page = "categories";
		Lang::load('admin/categories.php', null, 'ru');
    }

    public function action_index() {
	    TCLocale::set_locale_from_name(Model_Local::find(1)->name);
	    $data['uri'] = "admin/categories/create/1";
	    $data['back'] = "admin/index";
	    $data['pages'] = Model_Category::find('all');
	    $this->template->title = "Pages";
	    $this->template->content = View::forge('admin/categories/index', $data);
    }

    public function action_view($id = null) {
	    TCLocale::set_locale_from_name(Model_Local::find(1)->name);
	    is_null($id) and Response::redirect('categories');
	    if ( ! $data['page'] = Model_Category::find($id)) {
		    $this->SetNotice('error', 'Could not find page #'.$id);
		    Response::redirect('admin/Pages');
	    }
	    $this->template->title = "Page";
	    $this->template->content = View::forge('admin/categories/view', $data);

    }

    public function action_create($local_id = null) {
	TCLocale::set_locale_from_name(Model_Local::find($local_id)->name);
	if (Input::method() == 'POST') {
	    $category = Model_Category::forge(array(
		    'name' => Input::post('name'),
		    'alias' => Input::post('alias'),
		    'public_data' => Input::post('public_data') == 1 ? 1 : 0,
	    ));
	    if ($category and $category->save_translitions(\Fuel\Core\Input::post(), $local_id) and $category->save()) {                    
		$this->SetNotice('success', 'Added page #'.$category->id.' (' . Model_Local::find($local_id)->name . ')');
		Response::redirect('admin/categories');
	    } else {
		$this->SetNotice('error', "Error");
	    }
	}
	$this->template->title = "Pages";
	$this->template->content = View::forge('admin/categories/create', array('curr_local' => $local_id));

    }

    public function action_edit($id = null, $local_id = null) {
	    TCLocale::set_locale_from_name(Model_Local::find($local_id)->name);
	    is_null($id) and Response::redirect('categories');
	    if ( ! $category = Model_Category::find($id)) {
		    $this->SetNotice('error', 'Could not find page #'.$id);
		    Response::redirect('admin/categories');
	    }
	    if(\Fuel\Core\Input::post()) {
		$category->name = Input::post('name');
		$category->alias = Input::post('alias');
		$category->public_data = Input::post('public_data') == 1 ? 1 : 0;
		if ($category->save_translitions(\Fuel\Core\Input::post(), $local_id) and $category->save()) {
			$this->SetNotice('success', 'Updated page #' . $id);
			Response::redirect('admin/categories');
		} else {
			Session::set_flash('error', 'Could not update page #' . $id);
		}	
	    }

	    $this->template->set_global('page', $category, false);
	    $this->template->title = "categories";
	    $this->template->content = View::forge('admin/categories/edit', array('id' => $id, 'curr_local' => $local_id));

    }

    public function action_delete($id = null) {
	    is_null($id) and Response::redirect('categories');
	    if ($category = Model_Category::find($id)) {
		$category->delete_translitions();
		$category->delete();
		    $this->SetNotice('success', 'Deleted page #'.$id);
	    }
	    else {
		    $this->SetNotice('error', 'Could not delete page #'.$id);
	    }
	    Response::redirect('admin/categories');
    }


}