<?php
class Controller_Admin_Links extends Controller_Admin_Administration {

	public function action_index() {
		Controller_Application::$current_page = 'links';
		TCLocale::set_locale_from_name(Model_Local::find(1)->name);
		$data['links'] = Model_Link::find('all', array(
											'order_by' => array('weight' => 'asc')
										));
		$data['back'] = "admin/index";
		$data['uri'] = "admin/links/create/1";
		$this->template->back_button = View::forge("admin/back_button_block", $data);
		$this->template->add_button = View::forge("admin/add_button_block", $data);
		$this->template->title = "Links";
		$this->template->content = View::forge('admin/links/index', $data);
	}

	public function action_view($id = null)
	{
		TCLocale::set_locale_from_name(Model_Local::find(1)->name);
		is_null($id) and Response::redirect('Links');

		if ( ! $data['link'] = Model_Link::find($id))
		{
			Session::set_flash('error', 'Could not find link #'.$id);
			Response::redirect('Links');
		}

		$this->template->title = "Link";
		$this->template->content = View::forge('admin/links/view', $data);

	}

	public function action_create($local_id = null) {
		TCLocale::set_locale_from_name(Model_Local::find($local_id)->name);
		if (Input::method() == 'POST') {
			$val = Model_Locallink::validate('create');
			$config = \Config::get('settings.logo.upload');
			Upload::process($config);
			if ($val->run() && Upload::is_valid()) {
				Upload::save();
				$link = Model_Link::forge(array(
					'image' => Input::post('image'),
					'page_id' => Input::post('page_id'),
					'weight' => Input::post('weight'),
					'public' => Input::post('public') == 1 ? 1 : 0,
				));
				if ($link and $link->save()) {
					$locallink = Model_Locallink::forge(array(
						'link_id' => $link->id,
						'local_id' => $local_id,
						'name' => Input::post('name'),
						'description' => Input::post('description'),
					));
				}
				if ($locallink and $locallink->save()) {
					$this->SetNotice('success', 'Added link #' . $link->id . ' (' . Model_Local::find($local_id)->name . ')');
					Response::redirect('admin/links');
				} else {
					$this->SetNotice('error', 'Could not save link.');
				}
			}
			else {
				$this->SetNotice('error', $val->error());
			}
		}
		$data['back'] = "admin/links/index";
		$this->template->back_button = View::forge("admin/back_button_block", $data);
		$this->template->title = "Links";
		$this->template->content = View::forge('admin/links/create', array('curr_local' => $local_id));

	}

	public function action_edit($id = null, $local_id = null) {
		TCLocale::set_locale_from_name(Model_Local::find($local_id)->name);
		is_null($id) and Response::redirect('admin/Links');
		if ( ! $link = Model_Link::find($id)) {
			$this->SetNotice('error', 'Could not find link #'.$id);
			Response::redirect('admin/Links');
		}
		$val1 = Model_Link::validate('edit');
		$val2 = Model_Locallink::validate('edit');
		$locallink = Model_Locallink::query()->where('link_id', '=', $id)->where('local_id', '=', $local_id)->get_one();
		if ($val1->run()) {
			if ($val2->run()) {
				$config = \Config::get('settings.logo.upload');
				Upload::process($config);
				if ($locallink) {
					$locallink->name = Input::post('name');
					$locallink->description = Input::post('description');
					$link->page_id = Input::post('page_id');
					$link->weight = Input::post('weight');
					$link->public = Input::post('public') == 1 ? 1 : 0;
				} else {
					$locallink = Model_Locallink::forge(array(
						'link_id' => $id,
						'local_id' => $local_id,
						'name' => Input::post('name'),
						'description' => Input::post('description'),
					));
				}
				if(Upload::is_valid()) {
					Upload::save();
				}
				if ($link->save() and $locallink->save()) {
					$this->SetNotice('success', 'Updated link #' . $id . ' (' . Model_Local::find($local_id)->name . ')');
					Response::redirect('admin/links');
				} else {
					$this->SetNotice('error', 'Could not update link #' . $id);
				}
			} else {
				$this->SetNotice('error', $val2->error());
				$this->template->set_global('link', $link, false);
			}
		} else {
			/*if (Input::method() == 'POST') {
				$link->name = $val->validated('name');
				$link->description = $val->validated('description');
				$link->image = $val->validated('image');
				$link->page_id = $val->validated('page_id');
				$link->weight = $val->validated('weight');
				$link->public = $val->validated('public');
				$this->SetNotice('error', $val->error());
			}*/
			$this->SetNotice('error', $val1->error());
			$this->template->set_global('link', $link, false);
		}
		$data['back'] = "admin/links/index";
		$this->template->back_button = View::forge("admin/back_button_block", $data);
		$this->template->title = "Links";
		$this->template->content = View::forge('admin/links/edit', array('id' => $id, 'curr_local' => $local_id));

	}

	public function action_delete($id = null) {
		is_null($id) and Response::redirect('Links');
		if ($link = Model_Link::find($id)) {
			$link->delete();
			$this->SetNotice('success', 'Deleted link #'.$id);
		} else {
			$this->SetNotice('error', 'Could not delete link #'.$id);
		}
		Response::redirect('admin/links');
	}

}