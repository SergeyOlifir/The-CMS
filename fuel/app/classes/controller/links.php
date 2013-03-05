<?php
class Controller_Links extends Controller_Administration {

	public function action_index() {
		$data['links'] = Model_Link::find('all', array(
							'order_by' => array('weight' => 'asc')
						 ));
		$data['back'] = "admin/index";
		$data['uri'] = "links/create";
		$this->template->back_button = View::forge("admin/back_button_block", $data);
		$this->template->add_button = View::forge("admin/add_button_block", $data);
		$this->template->title = "Links";
		$this->template->content = View::forge('links/index', $data);
	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('Links');

		if ( ! $data['link'] = Model_Link::find($id))
		{
			Session::set_flash('error', 'Could not find link #'.$id);
			Response::redirect('Links');
		}

		$this->template->title = "Link";
		$this->template->content = View::forge('links/view', $data);

	}

	public function action_create() {
		if (Input::method() == 'POST') {
			$val = Model_Link::validate('create');
			$config = \Config::get('settings.logo.upload');
			Upload::process($config);
			if ($val->run() && Upload::is_valid()) {
				Upload::save();
				$link = Model_Link::forge(array(
					'name' => Input::post('name'),
					'description' => Input::post('description'),
					'image' => Input::post('image'),
					'page_id' => Input::post('page_id'),
					'weight' => Input::post('weight'),
					'public' => Input::post('public') == 1 ? 1 : 0,
				));
				if ($link and $link->save()) {
					$this->SetNotice('success', 'Added link #'.$link->id.'.');
					Response::redirect('links');
				} else {
					$this->SetNotice('error', 'Could not save link.');
				}
			}
			else {
				$this->SetNotice('error', $val->error());
			}
		}
		$data['back'] = "links/index";
		$this->template->back_button = View::forge("admin/back_button_block", $data);
		$this->template->title = "Links";
		$this->template->content = View::forge('links/create');

	}

	public function action_edit($id = null) {
		is_null($id) and Response::redirect('Links');
		if ( ! $link = Model_Link::find($id)) {
			$this->SetNotice('error', 'Could not find link #'.$id);
			Response::redirect('Links');
		}
		$val = Model_Link::validate('edit');
		if ($val->run()) {
			$config = \Config::get('settings.logo.upload');
			Upload::process($config);
			$link->name = Input::post('name');
			$link->description = Input::post('description');
			$link->page_id = Input::post('page_id');
			$link->weight = Input::post('weight');
			$link->public = Input::post('public') == 1 ? 1 : 0;
			if(Upload::is_valid()) {
				Upload::save();
			}
			if ($link->save()) {
				$this->SetNotice('success', 'Updated link #' . $id);
				Response::redirect('links');
			} else {
				$this->SetNotice('error', 'Could not update link #' . $id);
			}
		} else {
			if (Input::method() == 'POST') {
				$link->name = $val->validated('name');
				$link->description = $val->validated('description');
				$link->image = $val->validated('image');
				$link->page_id = $val->validated('page_id');
				$link->weight = $val->validated('weight');
				$link->public = $val->validated('public');
				$this->SetNotice('error', $val->error());
			}
			$this->template->set_global('link', $link, false);
		}
		$data['back'] = "links/index";
		$this->template->back_button = View::forge("admin/back_button_block", $data);
		$this->template->title = "Links";
		$this->template->content = View::forge('links/edit');

	}

	public function action_delete($id = null) {
		is_null($id) and Response::redirect('Links');
		if ($link = Model_Link::find($id)) {
			$link->delete();
			$this->SetNotice('success', 'Deleted link #'.$id);
		} else {
			$this->SetNotice('error', 'Could not delete link #'.$id);
		}
		Response::redirect('links');
	}

}