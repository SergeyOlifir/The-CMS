<?php


class Controller_Admin_Image extends Controller_Admin {
	
	function action_index() {
		return Fuel\Core\Response::forge("hui", '200');
	}
	
	function action_create($content_id = null) {
		!isset($content_id) and Fuel\Core\Response::redirect('admin');
		if($content = Model_Content::find($content_id) and Input::method() == 'POST') {
			$config = \Config::get('settings.logo.upload');
			Upload::process($config);
			if (Upload::is_valid()) {
				Upload::save();
				$image = Model_Image::forge();
				$image->owner_id = $content_id;
				$image->save();
			}
		}
		
		Fuel\Core\Response::redirect('admin/content/edit/' . $content_id);
	}
	
	public function action_delete($id = null, $page_id = null) {
		is_null($id) and Response::redirect('Content');
		if ($image = Model_Image::find($id)) {
			$image->delete();
			$this->SetNotice('success', 'Deleted image #'.$id);
		}
		else {
			$this->SetNotice('error', 'Could not delete content #'.$id);
		}
		Response::redirect("admin/content/index/{$page_id}");

	}
}

?>
