<?php

class Controller_Pages extends Controller_Administration 
{

	public function action_index() {
		$data['uri'] = "pages/create";
		$data['back'] = "admin/index";
		$data['pages'] = Model_Page::find('all');
		$this->template->title = "Pages";
		$this->template->back_button = View::forge("admin/back_button_block", $data);
		$this->template->add_button = View::forge("admin/add_button_block", $data);
		$this->template->content = View::forge('pages/index', $data);
	}

	public function action_view($id = null) {
		is_null($id) and Response::redirect('Pages');
		if ( ! $data['page'] = Model_Page::find($id)) {
			$this->SetNotice('error', 'Could not find page #'.$id);
			Response::redirect('Pages');
		}
		$this->template->title = "Page";
		$this->template->content = View::forge('pages/view', $data);

	}

	public function action_create() {
		if (Input::method() == 'POST') {
			$val = Model_Page::validate('create');
			if ($val->run()) {
				$page = Model_Page::forge(array(
					'name' => Input::post('name'),
					'alias' => Input::post('alias'),
					'header' => Input::post('header'),
				));
				if ($page and $page->save()) {
					$this->SetNotice('success', 'Added page #'.$page->id.'.');
					Response::redirect('pages');
				} else {
					$this->SetNotice('error', 'Could not save page.');
				}
			}
			else {
				$this->SetNotice('error', $val->error());
			}
		}
		$data['back'] = "pages/index";
		$this->template->back_button = View::forge("admin/back_button_block", $data);
		$this->template->title = "Pages";
		$this->template->content = View::forge('pages/create');

	}

	public function action_edit($id = null) {
		is_null($id) and Response::redirect('Pages');
		$data['back'] = "pages/index";
		$this->template->back_button = View::forge("admin/back_button_block", $data);
		if ( ! $page = Model_Page::find($id)) {
			$this->SetNotice('error', 'Could not find page #'.$id);
			Response::redirect('Pages');
		}
		$val = Model_Page::validate('edit');
		if ($val->run()) {
			$page->name = Input::post('name');
			$page->alias = Input::post('alias');
			$page->header = Input::post('header');
			if ($page->save())	{
				$this->SetNotice('success', 'Updated page #' . $id);
				Response::redirect('pages');
			} else {
				Session::set_flash('error', 'Could not update page #' . $id);
			}
		} else {
			if (Input::method() == 'POST') {
				$page->name = $val->validated('name');
				$page->alias = $val->validated('alias');
				$page->header = $val->validated('header');
				$this->SetNotice('error', $val->error());
			}
			$this->template->set_global('page', $page, false);
		}
		$this->template->title = "Pages";
		$this->template->content = View::forge('pages/edit');

	}

	public function action_delete($id = null) {
		is_null($id) and Response::redirect('Pages');
		if ($page = Model_Page::find($id)) {
			$page->delete();
			$this->SetNotice('success', 'Deleted page #'.$id);
		}
		else {
			$this->SetNotice('error', 'Could not delete page #'.$id);
		}
		Response::redirect('pages');
	}


}