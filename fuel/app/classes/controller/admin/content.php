<?php
class Controller_Admin_Content extends Controller_Admin_Administration {
	public function action_index($page_id = null) {
		is_null($page_id) and Response::redirect('Pages');
		$data['page'] = Model_Page::find($page_id);
		$data['back'] = "admin/pages/index";
		$data['uri'] = "admin/content/create/{$page_id}/1";
		$this->template->back_button = View::forge("admin/back_button_block", $data);
		$this->template->add_button = View::forge("admin/add_button_block", $data);
		$this->template->title = "Contents";
		$this->template->content = View::forge('admin/content/index', $data);
	}

	public function action_view($id = null) {
		is_null($id) and Response::redirect('Content');
		if ( ! $data['content'] = Model_Content::find($id)) {
			Session::set_flash('error', 'Could not find content #'.$id);
			Response::redirect('Content');
		}
		$this->template->title = "Content";
		$this->template->content = View::forge('admin/content/view', $data);

	}

	public function action_create($page_id = null, $local_id = null) {
		$config = \Config::get('settings.logo.upload');
		is_null($page_id) and Response::redirect('Pages');
		if (Input::method() == 'POST') {
			$val = Model_Localcontent::validate('create');
			Upload::process($config);
			if ($val->run() && Upload::is_valid()) {
				Upload::save();
				$content = Model_Content::forge(array(
					'date_create' => Date::create_from_string(Input::post('date_create'), "us")->get_timestamp(),
					'page_id' => $page_id,
				));
				if ($content and $content->save()) {
					$localcontent = Model_Localcontent::forge(array(
						'content_id' => $content->id,
						'local_id' => $local_id,
						'name' => Input::post('name'),
						'description' => Input::post('description'),
						'short_description' => Input::post('short_description'),
					));
				}
				if ($localcontent and $localcontent->save()) {
					$this->SetNotice('success', 'Added content #' . $content->id . ' (' . Model_Local::find($local_id)->name . ')');
					Response::redirect("admin/content/index/{$page_id}");
				} else {
					$this->SetNotice('error', 'Could not save content.');
				}
			} else {
				$this->SetNotice('error', $val->error());
			}
		}
		$data['back'] = "admin/content/index/{$page_id}";
		$this->template->back_button = View::forge("admin/back_button_block", $data);
		$this->template->title = "Contents";
		$this->template->content = View::forge("admin/content/create", array('page_id' => $page_id, 'curr_local' => $local_id));

	}

	public function action_edit($id = null, $local_id = null) {
		is_null($id) and Response::redirect('admin/Content');
		$config = \Config::get('settings.logo.upload');
		if ( ! $content = Model_Content::find($id)) {
			$this->SetNotice('error', 'Could not find content #'.$id);
			Response::redirect('admin/Content');
		}
		$val = Model_Localcontent::validate('edit');
		$localcontent = Model_Localcontent::query()->where('content_id', '=', $id)->where('local_id', '=', $local_id)->get_one();
		if ($val->run()) {
			Upload::process($config);
			if ($localcontent) {
				$localcontent->name = Input::post('name');
				$localcontent->description = Input::post('description');
				$localcontent->short_description = Input::post('short_description');
				$content->date_create = Date::create_from_string(Input::post('date_create'), "us")->get_timestamp();
			} else {
				$localcontent = Model_Localcontent::forge(array(
					'content_id' => $id,
					'local_id' => $local_id,
					'name' => Input::post('name'),
					'description' => Input::post('description'),
					'short_description' => Input::post('short_description'),
				));
				$content->date_create = Date::create_from_string(Input::post('date_create'), "us")->get_timestamp();
			}
			if(Upload::is_valid()) {
				Upload::save();
			}
			if ($content->save() and $localcontent->save()) {
				$this->SetNotice('success', 'Updated content #' . $id . ' (' . Model_Local::find($local_id)->name . ')');
				Response::redirect("admin/content/index/{$content->page_id}");
			} else {
				$this->SetNotice('error', 'Could not update content #' . $id);
			}
		} else {
			/*if (Input::method() == 'POST') {
				$localcontent->name = $val->validated('name');
				$localcontent->description = $val->validated('description');
				$localcontent->short_description = $val->validated('short_description');
				$content->date_create = $val->validated('date_create');
				$this->SetNotice('error', $val->error());
			}*/
			$this->SetNotice('error', $val->error());
			$this->template->set_global('content', $content, false);
		}
		$data['back'] = "admin/content/index/{$content->page_id}";
		$this->template->back_button = View::forge("admin/back_button_block", $data);
		$this->template->title = "Contents";
		$this->template->content = View::forge('admin/content/edit', array('id' => $id, 'curr_local' => $local_id));

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
		Response::redirect("admin/content/index/{$page_id}");

	}
	
	public function action_unset($id = null, $related_id = null) {
		is_null($related_id) and Response::redirect('Content');
		if ($content = Model_Content::find($id)) {
			unset($content->related_content[$related_id]);
			$content->save();
			Response::redirect("admin/content/edit/{$id}/1");
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
		Response::redirect("admin/content/edit/{$id}/1");
	}


}