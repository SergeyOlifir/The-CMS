<?php
class Controller_Content extends Controller_Administration {
	public function action_index($page_id = null) {
		is_null($page_id) and Response::redirect('Pages');
		$data['page'] = Model_Page::find($page_id);
		$data['back'] = "pages/index";
		$data['uri'] = "content/create/{$page_id}";
		$this->template->back_button = View::forge("admin/back_button_block", $data);
		$this->template->add_button = View::forge("admin/add_button_block", $data);
		$this->template->title = "Contents";
		$this->template->content = View::forge('content/index', $data);
	}

	public function action_view($id = null) {
		is_null($id) and Response::redirect('Content');
		if ( ! $data['content'] = Model_Content::find($id)) {
			Session::set_flash('error', 'Could not find content #'.$id);
			Response::redirect('Content');
		}
		$this->template->title = "Content";
		$this->template->content = View::forge('content/view', $data);

	}

	public function action_create($page_id = null) {
		$config = \Config::get('settings.logo.upload');
		is_null($page_id) and Response::redirect('Pages');
		if (Input::method() == 'POST') {
			$val = Model_Content::validate('create');
			Upload::process($config);
			if ($val->run() && Upload::is_valid()) {
				Upload::save();
				$content = Model_Content::forge(array(
					'name' => Input::post('name'),
					'description' => Input::post('description'),
					'short_description' => Input::post('short_description'),
					'date_create' => Date::create_from_string(Input::post('date_create'), "us")->get_timestamp(),
					'page_id' => $page_id,
				));
				if ($content and $content->save()) {
					$this->SetNotice('success', 'Added content #'.$content->id.'.');
					Response::redirect("content/index/{$page_id}");
				} else {
					$this->SetNotice('error', 'Could not save content.');
				}
			} else {
				$this->SetNotice('error', $val->error());
			}
		}
		$data['back'] = "content/index/{$page_id}";
		$this->template->back_button = View::forge("admin/back_button_block", $data);
		$this->template->title = "Contents";
		$this->template->content = View::forge("content/create");

	}

	public function action_edit($id = null) {
		is_null($id) and Response::redirect('Content');
		$config = \Config::get('settings.logo.upload');
		if ( ! $content = Model_Content::find($id)) {
			$this->SetNotice('error', 'Could not find content #'.$id);
			Response::redirect('Content');
		}
		$val = Model_Content::validate('edit');
		if ($val->run()) {
			Upload::process($config);
			$content->name = Input::post('name');
			$content->description = Input::post('description');
			$content->short_description = Input::post('short_description');
			$content->date_create = Date::create_from_string(Input::post('date_create'), "us")->get_timestamp();
			if(Upload::is_valid()) {
				Upload::save();
			}
			if ($content->save()) {
				$this->SetNotice('success', 'Updated content #' . $id);
				Response::redirect("content/index/{$content->page_id}");
			} else {
				$this->SetNotice('error', 'Could not update content #' . $id);
			}
		} else {
			if (Input::method() == 'POST') {
				$content->name = $val->validated('name');
				$content->description = $val->validated('description');
				$content->short_description = $val->validated('short_description');
				$content->date_create = $val->validated('date_create');
				$this->SetNotice('error', $val->error());
			}
			$this->template->set_global('content', $content, false);
		}
		$data['back'] = "content/index/{$content->page_id}";
		$this->template->back_button = View::forge("admin/back_button_block", $data);
		$this->template->title = "Contents";
		$this->template->content = View::forge('content/edit');

	}

	public function action_delete($id = null) {
		is_null($id) and Response::redirect('Content');
		$page_id = 0;
		if ($content = Model_Content::find($id)) {
			$page_id = $content->page_id;
			$content->delete();
			$this->SetNotice('success', 'Deleted content #'.$id);
		}
		else {
			$this->SetNotice('error', 'Could not delete content #'.$id);
		}
		Response::redirect("content/index/{$page_id}");

	}
	
	public function action_unset($id = null, $related_id = null) {
		is_null($related_id) and Response::redirect('Content');
		if ($content = Model_Content::find($id)) {
			unset($content->related_content[$related_id]);
			$content->save();
			Response::redirect("content/edit/{$id}");
		}
	}
	
	public function  action_set ($id = null) {
		is_null($id) and Response::redirect('Content');
		if(\Fuel\Core\Input::post() && ($content = Model_Content::find($id)) && count(\Fuel\Core\Input::post('relations')) > 0) {
			foreach (\Fuel\Core\Input::post('relations') as $related_id) {
				if($related_model = Model_Content::find((int)$related_id)) {
					$content->related_content[] = $related_model;
				}
			}
			
			$content->save();	
		}
		Response::redirect("content/edit/{$id}");
	}


}