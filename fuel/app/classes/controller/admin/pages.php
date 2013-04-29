<?php

class Controller_Admin_Pages extends Controller_Admin_Administration 
{

	public function action_index() {
		TCLocale::set_locale_from_name(Model_Local::find(1)->name);
		$data['uri'] = "admin/pages/create/1";
		$data['back'] = "admin/index";
		$data['pages'] = Model_Category::find('all');
		$this->template->title = "Pages";
		$this->template->back_button = View::forge("admin/back_button_block", $data);
		$this->template->add_button = View::forge("admin/add_button_block", $data);
		$this->template->content = View::forge('admin/pages/index', $data);
	}

	public function action_view($id = null) {
		TCLocale::set_locale_from_name(Model_Local::find(1)->name);
		is_null($id) and Response::redirect('Pages');
		if ( ! $data['page'] = Model_Category::find($id)) {
			$this->SetNotice('error', 'Could not find page #'.$id);
			Response::redirect('admin/Pages');
		}
		$this->template->title = "Page";
		$this->template->content = View::forge('admin/pages/view', $data);

	}

	public function action_create($local_id = null) {
		TCLocale::set_locale_from_name(Model_Local::find($local_id)->name);
		if (Input::method() == 'POST') {
			$val = Model_Category::validate('create');
			if ($val->run()) {
				$page = Model_Category::forge(array(
					'name' => Input::post('name'),
					'alias' => Input::post('alias'),
					'public_data' => Input::post('public_data') == 1 ? 1 : 0,
					'view_content' => Input::post('view_content') == 'tile' ? 'tile' : 'list',
				));
				if ($page and $page->save()) {
					$localpage = Model_Localpage::forge(array(
						'page_id' => $page->id,
						'local_id' => $local_id,
						'header' => Input::post('header'),
					));
				}
				if ($localpage and $localpage->save()) {
					$this->SetNotice('success', 'Added page #'.$page->id.' (' . Model_Local::find($local_id)->name . ')');
					Response::redirect('admin/pages');
				} else {
					$this->SetNotice('error', 'Could not save page.');
				}
			}
			else {
				$this->SetNotice('error', $val->error());
			}
		}
		$data['back'] = "admin/pages/index";
		$this->template->back_button = View::forge("admin/back_button_block", $data);
		$this->template->title = "Pages";
		$this->template->content = View::forge('admin/pages/create', array('curr_local' => $local_id));

	}

	public function action_edit($id = null, $local_id = null) {
		TCLocale::set_locale_from_name(Model_Local::find($local_id)->name);
		is_null($id) and Response::redirect('Pages');
		$data['back'] = "admin/pages/index";
		$this->template->back_button = View::forge("admin/back_button_block", $data);
		if ( ! $page = Model_Category::find($id)) {
			$this->SetNotice('error', 'Could not find page #'.$id);
			Response::redirect('admin/Pages');
		}

		$val1 = Model_Category::validate('edit');
		$val2 = Model_Localpage::validate('edit');
		$localpage = Model_Localpage::query()->where('page_id', '=', $id)->where('local_id', '=', $local_id)->get_one();
		if ($val1->run()) {
			if ($val2->run()) {
				if ($localpage) {
					$page->name = Input::post('name');
					$page->alias = Input::post('alias');
					$localpage->header = Input::post('header');
					$page->public_data = Input::post('public_data') == 1 ? 1 : 0;
					$page->view_content = Input::post('view_content') == 'tile' ? 'tile' : 'list';
				} else {
					$localpage = Model_Localpage::forge(array(
						'page_id' => $id,
						'local_id' => $local_id,
						'header' => Input::post('header'),
					));
				}
				if ($page->save() and $localpage->save()) {
					$this->SetNotice('success', 'Updated page #' . $id);
					Response::redirect('admin/pages');
				} else {
					Session::set_flash('error', 'Could not update page #' . $id);
				}
			} else {
					$this->SetNotice('error', $val2->error());
					$this->template->set_global('page', $page, false);
			}
		} else {
			$this->SetNotice('error', $val1->error());
			$this->template->set_global('page', $page, false);
		}
		$this->template->title = "Pages";
		$this->template->content = View::forge('admin/pages/edit', array('id' => $id, 'curr_local' => $local_id));

	}

	public function action_delete($id = null) {
		is_null($id) and Response::redirect('Pages');
		if ($page = Model_Category::find($id)) {
			$page->delete();
			$this->SetNotice('success', 'Deleted page #'.$id);
		}
		else {
			$this->SetNotice('error', 'Could not delete page #'.$id);
		}
		Response::redirect('admin/pages');
	}


}